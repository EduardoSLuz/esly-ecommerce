<?php

namespace Esly\Model;

use Esly\Mailer;
use Esly\Model;
use Esly\Model\Address;
use Esly\Model\Cart;
use Esly\Model\Store;
use Esly\Model\User;
use Esly\DB\Sql;
use Esly\Mercato;

class Order extends Model {

	const SESSION = "Order";

	public function save($type = 0)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO orders( idOrder, idCart, idOrderStatus, idPromo, idStore, idUser, nameRes, dateHorary, timeInitial, timeFinal, priceHorary, freight, typeFreight, priceFreight, typeModality, changePay, discount, subtotal, total, paid, dateUpdate, timeUpdate, dateInsert, timeInsert, payment, address, status) VALUES (NULL, :CART, :STATUS, :PROMO, :STORE, :USER, :NAME, :DTHOR, :TIMEINI, :TIMEFIN, :PRICEHOR, :FREIGHT, :TYPEFREIGHT, :PRICEFREIGHT, :TYPEMOD, :CHANGE, :DIS, :SUBTOTAL, :TOTAL, :PAID, :DTUP, :TMUP, :DTIN, :TMIN, :PAY, :ADD, :STS)", [
			":CART" => $this->getidCart(),
			":STATUS" => $this->getidOrderStatus(),
			":PROMO" => $this->getidPromo(),
			":STORE" => $this->getidStore(),
			":USER" => $this->getidUser(),
			":NAME" => $this->getnameRes(),
			":DTHOR" => $this->getdateHorary(),
			":TIMEINI" => $this->gettimeInitial(),
			":TIMEFIN" => $this->gettimeFinal(),
			":PRICEHOR" => $this->getpriceHorary(),
			":FREIGHT" => $this->getfreight(),
			":TYPEFREIGHT" => $this->gettypeFreight(),
			":PRICEFREIGHT" => $this->getpriceFreight(),
			":TYPEMOD" => $this->gettypeModality(),
			":CHANGE" => $this->getchangePay(),
			":DIS" => $this->getdiscount(),
			":SUBTOTAL" => $this->getsubtotal(),
			":TOTAL" => $this->gettotal(),
			":PAID" => $this->getpaid(),
			":DTUP" => $this->getdateUpdate(),
			":TMUP" => $this->gettimeUpdate(),
			":DTIN" => $this->getdateInsert(),
			":TMIN" => $this->gettimeInsert(),
			":PAY" => $this->getpayment(),
			":ADD" => $this->getaddress(),
			":STS" => $this->getstatus()
		]);

		if($insert > 0 && $type != 0)
		{	
			$array = ["idStore" => $this->getidStore(), "idCart" => $this->getidCart(), "idUser" => $this->getidUser()];
			Order::orderExists($array);
		}

		return $insert > 0 ? true : false;

	}

	public static function orderExists($array)
	{

		$data = [];
		$sql = new Sql($_SESSION[Sql::DB]);

		if(is_array($array) && count($array) == 3)
		{

			$select = $sql->select("SELECT idOrder, status, idCart, idUser FROM orders WHERE idStore = :STORE AND idCart = :CART AND idUser = :USER AND idOrderStatus = :STATUS", [
				":STORE" => intval($array['idStore']),
				":CART" => $array['idCart'],
				":USER" => $array['idUser'],
				":STATUS" => 1
			 ]);
			 
			if(count($select) > 0)
			{

				$data = $select[0];

				$desc = Order::listOrdersStatus(2);

				$data['status'] = json_decode($data['status'], true);
				$data['status']['orderStatus'][count($data['status']['orderStatus'])] = Order::configJsonOrderStatus($desc[0]['descStatus']);

				$updateCart = $sql->count("UPDATE cart SET statusCart = :STATUS, dateUpdate = :DATE WHERE idCart = :CART AND idUser = :USER", [
					":STATUS" => 0,
					":DATE" => date("Y-m-d"),
					":CART" => $data['idCart'],
					":USER" => $data['idUser']
				]);

				if($updateCart > 0) unset($_SESSION[Cart::SESSION]);

				$updateOrder = $sql->count("UPDATE orders SET idOrderStatus = :STATUS, status = :JSON WHERE idOrder = :ORDER AND idUser = :USER", [
					":STATUS" => 2,
					":JSON" => json_encode($data['status']),
					":ORDER" => $data['idOrder'],
					":USER" => $data['idUser']
				]);

				if($updateOrder > 0) unset($_SESSION[Order::SESSION]);

				return $updateCart > 0 && $updateOrder > 0 ? true : false;

			}

		}

		return false;

	}

	public static function createOrder()
	{

		if(!isset($_SESSION[Order::SESSION]))
		{
			$_SESSION[Order::SESSION] = [
				"cart" => $_SESSION[Cart::SESSION]['idCart'],
				"type" => 0,
				"typeFreight" => 0,
				"resp" => "",
				"freight" => 0,
				"address" => 0,
				"horary" => 0,
				"payment" => 0,  
			];
		} 

	}

	public static function verifyOrder($campo, $value = 0)
	{

		if(!isset($_SESSION[Order::SESSION]) || $_SESSION[Order::SESSION][$campo] == $value)
		{
			unset($_SESSION[Order::SESSION]);
			header("Location: /");
			exit;
		}

	}

	public static function listAll($id = 0, $type = 0)
	{

		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);
		$query = $id != 0 ? "WHERE ors.idOrder = :ORDER" : "WHERE ors.idUser = :ID";
		$param = $id != 0 ? [] : [":ID" => intval(User::getId())];

		if($id > 0) $param[':ORDER'] = intval($id) ;

		$select = $sql->select("SELECT ors.idOrder, ors.idCart, ors.idStore, ors.idPromo, ors.idUser, ors.codOrder, ors.dateInsert, ors.timeInsert, ors.paid, ors.typeModality, ors.typeFreight, ors.freight, ors.changePay, ors.dateHorary, ors.timeInitial, ors.timeFinal, ors.nameRes, ors.address, ors.payment, ors.status, ors.dateUpdate, ors.timeUpdate, ors.priceFreight, ors.priceHorary, ors.discount, ors.subtotal, ors.total, ors_st.idOrderStatus, ors_st.descStatus, us.nameUser, us.surnameUser, pm.idPromoType, pm.title, pm.value, pm.valueType FROM orders AS ors INNER JOIN orders_status AS ors_st ON ors.idOrderStatus = ors_st.idOrderStatus INNER JOIN user AS us ON ors.idUser = us.idUser LEFT JOIN promotions AS pm ON ors.idPromo = pm.idPromo $query ORDER by ors.dateInsert, ors.timeInsert", $param);

		if(count($select) > 0)
		{

			foreach ($select as $key => $value) {
				
				if($type > 0)
				{
					
					$store = Store::listStores($value['idStore']);

					$value['infoStore'] = $store != 0 ? $store[0] : 0;

					$user = User::listAllUsers($value['idUser']);

					$value['infoUser'] = $user != 0 ? $user[0] : 0;

					$address = isset($value['address']) && !empty($value['address']) ? json_decode($value['address'], true) : 0;

					$value['address'] = $address != 0 ? $address['address'] : $address;

					$cart = Cart::listAll($value['idCart']);

					$value['cart'] = $cart[0];

					$value['status'] = json_decode($value['status'], true);

					$value['status'] = $value['status']['orderStatus'];

				}

				$payment = isset($value['payment']) && !empty($value['payment']) ? json_decode($value['payment'], true) : 0;

				$value['payment'] = $payment != 0 ? $payment['payment'] : $payment;		
				
				$array[$key] = $value;

			}

			krsort($array);
			
		}

		return count($array) > 0 ? $array : 0;

	}

	public static function listOrdersStatus($id = 0)
	{

		$code = $id > 0 ? "WHERE idOrderStatus = :ID": "" ;
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM orders_status $code", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listOrders($id = 0, $pm = [], $type = 0, $horary = 0)
	{

		$dates = $horary == 1 ? "WHERE ors.dateHorary >= :INI AND ors.dateHorary <= :FIN" : "WHERE ors.dateInsert >= :INI AND ors.dateInsert <= :FIN";
		
		$code = $id > 0 ? "WHERE ors.idOrder = :ID": $dates;
		$code .= isset($pm[":STORE"]) && $pm[":STORE"] > 0 ? " AND ors.idStore = :STORE" : "";

		if(isset($pm[":STORE"]) && $pm[":STORE"] == 0)
		{
			unset($pm[":STORE"]);
		} 
		
		$code .= isset($pm[":PAID"]) ? " AND ors.paid = :PAID" : "";
		if(!isset($pm[":PAID"]))
		{
			unset($pm[":PAID"]);
		} 

		if($type != 0)
		{
			$code .= isset($pm[':STATUS']) && $pm[':STATUS'] != 9 ? " AND ors.idOrderStatus != 9" : ""; 
		}

		if($id > 0)
		{
			$param = [":ID" => intval($id)];
		} else {
			$param = [
				":STATUS" => 0,
				":INI" => date("Y-m-01"),
				":FIN" => date("Y-m-d")
			];
			$param = array_merge($param, $pm);
		}

		if(isset($param[':STATUS']) && $param[':STATUS'] > 0)
		{
			$code .= " AND ors_st.idOrderStatus = :STATUS";
		} else {
			unset($param[':STATUS']);
		}

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT ors.idOrder, ors.idCart, ors.idStore, ors.idPromo, ors.idUser, ors.codOrder, ors.dateInsert, ors.timeInsert, ors.paid, ors.typeModality, ors.typeFreight, ors.freight, ors.changePay, ors.dateHorary, ors.timeInitial, ors.timeFinal, ors.nameRes, ors.address, ors.payment, ors.status, ors.dateUpdate, ors.timeUpdate, ors.priceFreight, ors.priceHorary, ors.discount, ors.subtotal, ors.total, ors_st.idOrderStatus, ors_st.descStatus, us.nameUser, us.surnameUser, pm.idPromoType, pm.title, pm.value, pm.valueType FROM orders AS ors INNER JOIN orders_status AS ors_st ON ors.idOrderStatus = ors_st.idOrderStatus INNER JOIN user AS us ON ors.idUser = us.idUser LEFT JOIN promotions AS pm ON ors.idPromo = pm.idPromo $code ORDER by ors.dateInsert DESC, ors.timeInsert DESC", $param);

		if(count($select) > 0)
		{

			$promo = 0;

			if($id > 0)
			{
				
				$store = Store::listStores($select[0]['idStore']);

				$select[0]['infoStore'] = $store != 0 ? $store[0] : 0;

				$user = User::listAllUsers($select[0]['idUser']);

				$select[0]['infoUser'] = $user != 0 ? $user[0] : 0;

				$address = isset($select[0]['address']) && !empty($select[0]['address']) ? json_decode($select[0]['address'], true) : 0;

				$select[0]['address'] = $address != 0 ? $address['address'] : $address;

				$payment = isset($select[0]['payment']) && !empty($select[0]['payment']) ? json_decode($select[0]['payment'], true) : 0;

				$select[0]['payment'] = $payment != 0 ? $payment['payment'] : $payment;

				$cart = Cart::listAll($select[0]['idCart']);

				$select[0]['cart'] = $cart[0];

			} else {

				foreach ($select as $key => $value) {
					$user = User::listAllUsers($select[$key]['idUser']);
					$select[$key]['infoUser'] = $user != 0 ? $user[0] : 0;
				}

			}
			
		}

		return count($select) > 0 ? $select : 0;

	}

	public static function updateOrderSet($sets = 0, $param = 0)
	{

		if($sets !== 0 && is_array($param) && count($param) > 0)
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$update = $sql->count("UPDATE orders SET $sets WHERE idOrder = :ID", $param);

			return $update > 0 ? true : false;

		}

		return false;

	}

	public function insertCartItem()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO cart_item (idCart, codBars, codProduct, descProduct, quantity, similar, unitReference, priceItem, discount, totalItem, image) VALUES (:CART, :COD, :PR, :DESC, :QTD, :SIM, :UNIT, :PRICE, :DIS, :TOTAL, :IMG)", [
			":CART" => intval($this->getcart()),
			":COD" => $this->getbarCode(),
			":PR" => $this->getproduct(),
			":DESC" => $this->getdesc(),
			":QTD" => floatval($this->getqtd()),
			":SIM" => 0,
			":UNIT" => $this->getunit(),
			":PRICE" => floatval($this->getprice()),
			":DIS" => floatval($this->getdis()),
			":TOTAL" => floatval($this->getprice() * $this->getqtd()),
			":IMG" => $this->getimg()
		]);

		return $insert > 0 ? true : false;

	}

	public function updateCartItem()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE cart_item SET codBars = :COD, codProduct = :PR, descProduct = :DESC, quantity = :QTD, unitReference = :UNIT, priceItem = :PRICE, discount = :DIS, totalItem = (:PRICE * :QTD) - :DIS, image = :IMG WHERE idCartItem = :ID AND idCart = :CART", [
			":COD" => $this->getbarCode(),
			":PR" => $this->getproduct(),
			":DESC" => $this->getdesc(),
			":QTD" => floatval($this->getqtd()),
			":UNIT" => $this->getunit(),
			":PRICE" => floatval($this->getprice()),
			":DIS" => floatval($this->getdis()),
			":IMG" => $this->getimg(),
			":ID" => intval($this->getid()),
			":CART" => intval($this->getcart())
		]);

		return $update > 0 ? true : false;

	}

	public static function deleteCartItem($id = 0)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM cart_item WHERE idCartItem = :ID", [
			":ID" => intval($id)
		]);

		return $delete > 0 ? true : false;

	}

	public static function selectOrder($store = 0, $query = "", $param = [])
	{

		$query = $store > 0 ? "WHERE idStore = :STORE ".$query: $query ;
		$param = $store > 0 ? array_merge([":STORE" => intval($store)], $param) : $param;

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idOrder, idStore, idCart, dateInsert, codOrder FROM orders $query", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function refreshOrder($id = 0)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT ors.idOrder, ors.idCart, ors.idPromo, ors.idStore, ors.idUser, ors.priceHorary, ors.priceFreight, ors.subtotal, ors.typeFreight, ors.typeModality, ors.address, pm.idPromoType, pm.value, pm.valueType FROM orders AS ors LEFT JOIN promotions AS pm ON ors.idPromo = pm.idPromo WHERE ors.idOrder = :ID", [
			":ID" => intval($id)
		]);

		if(is_array($select) && count($select) == 1)
		{

			$order = $select[0];
			$order['address'] = json_decode($order['address'], true);
			
			if($order['priceFreight'] == 0 && $order['typeModality'] == 2)
			{

				$order['priceFreight'] = Store::listFreightCep(['cep' => $order['address']['address'][1]['cep'], 'id' => $order['idStore']], 1);
				$order['priceFreight'] = $order['priceFreight']['details'][$order['typeFreight']]['value'];
			}

			$array = ["promo" => 0, "freight" => $order['priceFreight'], "subtotal" => 0, "disItems" => 0];

			$items = $sql->select("SELECT totalItem, discount, priceItem, quantity FROM cart_item WHERE idCart = :CART", [
				":CART" => intval($order['idCart'])
			]);

			if(is_array($items) && count($items) > 0)
			{

				foreach ($items as $key => $value) {
					
					$array['subtotal'] += floatval($value['priceItem'] * $value['quantity']);
					$array['disItems'] += floatval($value['discount']);

				}

			}

			if($order['idPromo'] > 0)
			{
				switch ($order['idPromoType']) {
					case 1:
						$array["promo"] = $order['valueType'] == 2 ? floatval(($order['subtotal'] / 100) * $order['value']) : floatval($order['value']);
					break;

					case 3 :
						$array["freight"] = floatval($order['subtotal']) >= floatval($order['value']) ? 0 : $order['priceFreight'];
					break;	
				}	
			}

			$array['discount'] = (floatval($array['disItems']) + floatval($array['promo'])) <= floatval($array['subtotal']) ? floatval($array['disItems']) + floatval($array['promo']) : floatval($array['disItems']);
			$array['total'] = (floatval($array['subtotal']) - floatval($array['discount'])) + floatval($array['freight']) + floatval($order['priceHorary']); 

			$updateCart = $sql->count("UPDATE cart SET subtotalCart = :SUB, totalCart = :TOTAL, discountCart = :DIS, dateUpdate = :DT WHERE idCart = :CART", [
				":SUB" => $array['subtotal'],
				":TOTAL" => floatval($array['subtotal'] - $array['disItems']),
				":DIS" => $array['disItems'],
				":DT" => date("Y-m-d"),
				":CART" => intval($order['idCart'])
			]);

			$updateOrder = $sql->count("UPDATE orders SET priceFreight = :FREIGHT, discount = :DIS, subtotal = :SUB, total = :TOTAL, dateUpdate = :DTUP, timeUpdate = :TMUP WHERE idOrder = :ID", [
				":FREIGHT" => $array['freight'],
				":DIS" => $array['discount'],
				":SUB" => $array['subtotal'],
				":TOTAL" => $array['total'],
				":DTUP" => date("Y-m-d"),
				":TMUP" => date("H:i"),
				":ID" => intval($id)
			]);

			return true;

		} else {
			return false;
		}

	}

	public static function configJsonOrderStatus($status = "")
	{

		if(isset($status))
		{
			
			$array = [
				"name" => isset($status) && !empty($status) ? $status : "Sem Status",
				"date" => date("Y-m-d"),
				"time" => date("H:i:s"),
			];

		} else {
			$array = 0;
		}

		return $array;

	}

	public static function jsonOrderStatus($code = 0, $status)
	{

		$array = [];

		if($code > 0 && is_array($status) && count($status) > 0)
		{
			
			$desc = Order::listOrdersStatus($code);

			$status[count($status)] = Order::configJsonOrderStatus($desc[0]['descStatus']);
			$array = [ 'orderStatus' => $status ];

		}

		return is_array($array) && count($array) > 0 ? $array : 0;

	}

	public static function configJsonAddressOrder($store, $address)
	{

		$data = [];	
		$nameBase = "resources/json/".Store::cryptCode(Store::SIGN)."AD.json";
		
		$adStore = Store::listStores($store);
		$adOrder = $address != 0 ? Address::listAddress(Address::cryptCode($address)) : 0;

		if(file_exists($nameBase) && $adStore != 0)
		{
			$file = file($nameBase);
			$data = json_decode($file[0], true);

			if(is_array($data) && count($data) > 0)
			{
				
				// ADDRESS STORE
				$data['address'][0] = [
					"street" => $adStore[0]['streetStore'],
					"number" => $adStore[0]['numberStore'],
					"district" => $adStore[0]['districtStore'],
					"cep" => $adStore[0]['cepStore'],
					"complement" => $adStore[0]['complementStore'],
					"reference" => "",
					"city" => $adStore[0]['city'],
					"uf" => $adStore[0]['uf'],
					"codeCity" => $adStore[0]['codeCity']
				];

				// ADDRESS STORE
				if(is_array($adOrder) && count($adOrder) > 0)
				{
					$data['address'][1] = [
						"street" => $adOrder[0]['street'],
						"number" => $adOrder[0]['number'],
						"district" => $adOrder[0]['district'],
						"cep" => $adOrder[0]['cep'],
						"complement" => $adOrder[0]['complement'],
						"reference" => $adOrder[0]['reference'],
						"city" => $adOrder[0]['city'],
						"uf" => $adOrder[0]['uf'],
						"codeCity" => $adOrder[0]['codeCity']
					];
				} else {

					unset($data['address'][1]);

				}
				
			}
		
		}

        return count($data) > 0 ? $data : 0;

	}
	
	public static function alterOrderByStatus($id, $status)
	{

		$res = false;
        $order = Order::listAll($id, 1);

		if($order != 0 && $status > 0 && $status <= 9)
		{

			switch ($status) {
				
				case 3:

					$res = ["id" => $status, "description"=>"Pedido Em Separação", "icon"=>"fas fa-clipboard-list", "color"=>"success", "status"=>1];

				break;	

				case 4:

					$send = Mercato::setOrder($id);
					
					$res = $send ? ["id" => $status, "description"=>"Pedido Separado", "icon"=>"fas fa-shopping-basket", "color"=>"success", "status"=>1] : ["id" => 0, "description"=>"Falha ao Enviar Pedido Para o Servidor", "icon"=>"fas fa-exclamation-triangle", "color"=>"danger", "status"=>0];

					if($send)
					{
						
						$products = [0 => Mercato::listAllProducts($order[0]['idStore']), 1 => Mercato::listAllProducts($order[0]['idStore'], 1)];

						$items = Cart::listCartItemSet("WHERE idCart = :ID", [':ID' => $order[0]['idCart']]);

						if(is_array($items) && count($items) > 0 && is_array($products) && count($products) > 0)
						{
							
							foreach ($items as $key => $value) {
								
								$search = Mercato::searchFieldProduct($order[0]['idStore'], $value['codProduct'], 'codProduct');

								if($search['stock'] > 0 && $search['stock'] >= $value['quantity'])
								{
									$newVal = floatval($search['stock'] - $value['quantity']);
									$products = Mercato::updateAllProducts($products, $order[0]['idStore'], 'codProduct', $value['codProduct'], 'stock', $newVal, 0);
								}

							}

							if(is_array($products) && $products[0] != 0 && $products[1] != 0)
							{
								$save = Mercato::saveAllProducts($products, $order[0]['idStore']);
							}

						}
						
					}

					if($send && $order[0]['typeModality'] == 1)
					{	
						
						$email = Order::orderAlert($id, ["title"=>"Pedido #".$id." - Está Separado", "text" => "Seu pedido está separado e pronto para ser retirado, aguardamos você para vir buscá-lo. Para mais informações do pedido clique no botão abaixo para acessar seu pedido.", "subject"=>"Seu Pedido Já Pode Ser Retirado", "link"=>$_SERVER['HTTP_HOST']."/loja-01/account/requests/".$id."/"]); 

					}
					

					if(isset($email) && $email == false)
					{
						$res = ["id" => 0, "description"=>"Falha ao Enviar E-mail Alertando o Cliente", "icon"=>"fas fa-exclamation-triangle", "color"=>"danger", "status"=>0];
					}

				break;	

				case 5:

					$email = Order::orderAlert($id, ["title"=>"Pedido #".$id." - Em Rota", "text" => "Seu pedido está em rota para entrega, fique atento que logo o entregador chega no seu endereço. Para mais informações do pedido clique no botão abaixo para acessar seu pedido.", "subject"=>"Seu Pedido Está a Caminho Para Entrega", "link"=>$_SERVER['HTTP_HOST']."/loja-01/account/requests/".$id."/"]); 

					$res = $email ? ["id" => $status, "description"=>"Pedido Em Rota", "icon"=>"fas fa-truck", "color"=>"success", "status"=>1] : ["id" => 0, "description"=>"Falha ao Enviar Email Para o Cliente, Tente Novamente!", "icon"=>"fas fa-exclamation-triangle", "color"=>"danger", "status"=>0];

				break;

				case 6:

					$res = ["id" => $status, "description"=>"Pedido Entregue", "icon"=>"fas fa-check", "color"=>"success", "status"=>1];

				break;

				case 7:

					$res = ["id" => $status, "description"=>"Pedido Retirado", "icon"=>"fas fa-check", "color"=>"success", "status"=>1];

				break;

				case 9:

					if($order[0]['idOrderStatus'] >= 4)
					{
						
						$products = [0 => Mercato::listAllProducts($order[0]['idStore']), 1 => Mercato::listAllProducts($order[0]['idStore'], 1)];

						$items = Cart::listCartItemSet("WHERE idCart = :ID", [':ID' => $order[0]['idCart']]);

						if(is_array($items) && count($items) > 0 && is_array($products) && count($products) > 0)
						{
							
							foreach ($items as $key => $value) {
								
								$search = Mercato::searchFieldProduct($order[0]['idStore'], $value['codProduct'], 'codProduct');

								if($search['stock'] >= 0)
								{
									$newVal = floatval($search['stock'] + $value['quantity']);
									$products = Mercato::updateAllProducts($products, $order[0]['idStore'], 'codProduct', $value['codProduct'], 'stock', $newVal, 0);
								}

							}

							if(is_array($products) && $products[0] != 0 && $products[1] != 0)
							{
								$save = Mercato::saveAllProducts($products, $order[0]['idStore']);
							}

						}
						
					}

					$email = Order::orderAlert($id, ["title"=>"Pedido #".$id." - Cancelado", "text" => "Seu pedido foi cancelado pela loja. Se você não foi avisado ou não pediu o cancelamento tente entrar em contato com a loja. Para mais informações do pedido clique no botão abaixo para acessar seu pedido.", "subject"=>"Seu Pedido Foi Cancelado Pela Loja", "link"=>$_SERVER['HTTP_HOST']."/loja-01/account/requests/".$id."/"]); 

					$res = $email ? ["id" => $status, "description"=>"Pedido Cancelado", "icon"=>"fas fa-times", "color"=>"danger", "status"=>1] : ["id" => 0, "description"=>"Falha ao Enviar Email Para o Cliente, Tente Novamente!", "icon"=>"fas fa-exclamation-triangle", "color"=>"danger", "status"=>0];

				break;

			}

		} 

		return $res != false && is_array($res) ? $res : false;

	}

	public static function orderAlert($id, $array = [])
	{

		$res = false;
        $order = Order::listOrders($id);

		if($order != 0 && isset($_SESSION[User::SESSION]) && is_array($array) && count($array) == 4)
		{

			$store = $order[0]['infoStore'];
			
			if($store != 0) 
			{
				$order[0]['infoUser']['nameUser'] = utf8_decode($order[0]['infoUser']['nameUser']);
				$store['social'] = Store::listInfoSocial($order[0]['idStore']);
			}	
			if(isset($store['social']) && is_array($store['social']))
			{	
				

				$param = [
					"name" => $order[0]['infoUser']['nameUser'],
					"title" => $array['title'],
					"text" => $array['text'],
					"link" => $array['link'],
					"store" => $store,
					"nameBase" => $_SESSION[Sql::DB]['directory'],
					"HTTP" => $_SERVER['HTTP_HOST']
				];

				$mailer = new Mailer($order[0]['infoUser']['emailUser'], $order[0]['infoUser']['nameUser'], utf8_decode($array['subject']), "orderAlert", $param, utf8_decode($store['nameStore']));				
		
				$res = $mailer->send();

			}

		}

		return $res;

	}
	
}

?>