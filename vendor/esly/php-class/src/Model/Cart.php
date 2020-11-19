<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Model\User;
use Esly\DB\Sql;

class Cart extends Model {

	const SESSION = "Cart";

	public static function checkCart()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		if(isset($_SESSION[User::SESSION]))
		{
	
			$id = User::getId();

			if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0)
			{

				while(isset($_SESSION[Cart::SESSION]))
				{
					
					$select = Cart::listCartSet("WHERE idUser = :ID AND statusCart = :STATUS", [":ID" => $id, ":STATUS" => 1]);

					if($select != 0 && is_array($select) && count($select) > 0)
					{
						
						$cart = $select[0];

						if(is_array($_SESSION[Cart::SESSION]['items']) && count($_SESSION[Cart::SESSION]['items']) > 0)
						{

							foreach ($_SESSION[Cart::SESSION]['items'] as $key => $value) {
								
								if($value['idCartItem'] == 0)
								{

									$insert = Cart::insertCartItemSet( "idCart, codBars, codProduct, descProduct, quantity, similar, unitReference, priceItem, totalItem, image", ":ID, :BARCODE, :COD, :DESC, :QTD, :SIM, :UN, :PRICE, :TOTAL, :IMG", [ 
										":ID" => intval($cart['idCart']),
										":BARCODE" => $value['codBars'],
										":COD" => $value['codProduct'],
										":DESC" => $value['descProduct'],
										":QTD" => $value['quantity'],
										":SIM" => $value['similar'],
										":UN" => $value['unitReference'],
										":PRICE" => $value['priceItem'],
										":TOTAL" => $value['totalItem'],
										":IMG" => $value['image']
									]);

								}

							}

						}

						unset($_SESSION[Cart::SESSION]);

					} else {

						$insert = Cart::insertCartSet( "idUser, statusCart, dateUpdate", ":ID, :STATUS, :DATE", [ ":ID" => intval($id), ":STATUS" => 1, ":DATE" => date("Y-m-d") ] );
						
					}
					
				}

			}

			while(!isset($_SESSION[Cart::SESSION]))
			{

				$select = Cart::listCartSet("WHERE idUser = :ID AND statusCart = :STATUS", [":ID" => $id, ":STATUS" => 1]);

				if($select != 0 && count($select) == 1)
				{

					$total = 0;
					$totalItems = 0;

					if($select[0]['items'] != 0 && is_array($select[0]['items']))
					{
						foreach ($select[0]['items'] as $key => $value) {
							$total += $value['totalItem'];
							$totalItems += $value['quantity'];
						}
					}
					
					$update = Cart::updateCartSet($sets = "subtotalCart = :TOTAL, totalCart = :TOTAL, dateUpdate = :DATE", "WHERE idCart = :ID", [ ":TOTAL" => floatval($total), ":DATE" => date("Y-m-d"), ":ID" => intval($select[0]['idCart']) ] );

					$_SESSION[Cart::SESSION] = [
						"idCart" => $select[0]['idCart'],
						"idPromo" => $select[0]['idStorePromo'],
						"totalCart" => floatval($total),
						"items" => is_array($select[0]['items']) && count($select[0]['items']) > 0 ? $select[0]['items'] : 0,
						"totalItems" => $totalItems,
						"promoInfo" => 0,
						"promo" => 0,
						"obs" => $select[0]['obsCart'] 
					];


				} else if($select != 0 && count($select) > 1){

					$update = Cart::updateCartSet($sets = "statusCart = :ST", "WHERE idUser = :ID AND statusCart = :STATUS", [ ":ST" => 0, ":ID" => $id, ":STATUS" => 1 ] );

				} else {

					$insert = Cart::insertCartSet( "idUser, statusCart, dateUpdate", ":ID, :STATUS, :DATE", [ ":ID" => intval($id), ":STATUS" => 1, ":DATE" => date("Y-m-d") ] );

				}

			}


		} else {

			if(!isset($_SESSION[Cart::SESSION]))
			{
				
				$_SESSION[Cart::SESSION] = [
					"idCart" => 0,
					"idPromo" => 0,
					"totalCart" => 0,
					"items" => 0,
					"totalItems" => 0,
					"promoInfo" => 0,
					"promo" => 0,
					"obs" => ""
				];

			} else if($_SESSION[Cart::SESSION]) {

				if(isset($_SESSION[Cart::SESSION]['items']) && is_array($_SESSION[Cart::SESSION]['items']) && count($_SESSION[Cart::SESSION]['items']) >= 0)
				{

					$total = 0;
					$totalItems = 0;

					foreach ($_SESSION[Cart::SESSION]['items'] as $key => $value) {
						$total += $value['totalItem'];
						$totalItems += $value['quantity'];
					}

					$_SESSION[Cart::SESSION]['totalCart'] = $total;
					$_SESSION[Cart::SESSION]['totalItems'] = $totalItems;

				}

			}

		}

		return isset($_SESSION[Cart::SESSION]) ? $_SESSION[Cart::SESSION] : false;

		/*
		$_SESSION[Cart::SESSION] = [
			"idCart" => $results[0]['idCart'],
			"idPromo" => $results[0]['idStorePromo'],
			"totalCart" => floatval($total),
			"items" => count($res) > 0 ? $res : 0,
			"totalItems" => $totalItems,
			"promoInfo" => $results[0]['idStorePromo'] > 0 ? ["id" => $results[0]['idStorePromo'], "title" => $results[0]['titlePromoStore'], "code" => $results[0]['codePromoStore'], "value" => $results[0]['disPromoStore']] : 0,
			"promo" => $results[0]['idStorePromo'] > 0 && $results[0]['disPromoStore'] > 0 ? ($results[0]['disPromoStore'] / 100) * $results[0]['totalCart'] : 0,
			"obs" => $results[0]['obsCart'] 
		];
		*/

	}

	public static function insertCartSet($sets, $values, $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("INSERT INTO cart ($sets) VALUES ($values)", $param);

		return $results == 1 ? $results : 0;

	}

	public static function insertCartItemSet($sets, $values, $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("INSERT INTO cart_item ($sets) VALUES ($values)", $param);

		return $results == 1 ? $results : 0;

	}

	public static function addItem($item)
	{

		if(isset($_SESSION[User::SESSION]))
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->count("INSERT INTO cart_item (idCart, codBars, codProduct, descProduct, quantity, unitReference, priceItem, totalItem, image) VALUES (:ID, :BARCODE, :COD, :DESC, :QTD, :UN, :PRICE, :TOTAL, :IMG)", [
				":ID" => $_SESSION[Cart::SESSION]['idCart'],
				":BARCODE" => $item['barCode'],
				":COD" => intval($item['codProduct']),
				":DESC" => strtoupper($item['description']),
				":QTD" => intval($item['quantity']),
				":UN" => strtoupper($item['unit']),
				":PRICE" => $item['priceFinal'],
				":TOTAL" => ($item['priceFinal'] * $item['quantity']),
				":IMG" => $item['image']
			]);

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){
			
			if($_SESSION[Cart::SESSION]["items"] == 0) $_SESSION[Cart::SESSION]["items"] = [];

			$_SESSION[Cart::SESSION]["items"][count($_SESSION[Cart::SESSION]["items"])] = [
				"idCart" => 0,
				"idCartItem" => 0,
				"codBars" => $item['barCode'],
				"codProduct" => intval($item['codProduct']),
				"descProduct" => strtoupper($item['description']),
				"quantity" => intval($item['quantity']),
				"similar" => 0,
				"unitReference" => strtoupper($item['unit']),
				"priceItem" => $item['priceFinal'],
				"totalItem" => ($item['priceFinal'] * $item['quantity']),
				"image" => $item['image']
			];

		}

		return isset($results) && $results == 1 ? true : false;

	}

	public static function updateItem($item){
		
		if(isset($_SESSION[User::SESSION]))
		{
			
			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->count("UPDATE cart_item SET quantity = :QTD, totalItem = (priceItem * :QTD) WHERE idCartItem = :ID", [
				":QTD" => intval($item['quantity']),
				":ID" => $item['id']
			]);

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){

			$_SESSION[Cart::SESSION]['items'][$item['id']]['quantity'] = $item['quantity'];
			$_SESSION[Cart::SESSION]['items'][$item['id']]['totalItem'] = ($_SESSION[Cart::SESSION]['items'][$item['id']]['priceItem'] * $item['quantity']);

		}

		return isset($results) && $results == 1 ? true : false;
		
	}

	public static function updateItemSimilar($id, $status){
		
		if(isset($_SESSION[User::SESSION]))
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->count("UPDATE cart_item SET similar = :STATUS WHERE idCartItem = :ID", [
				":STATUS" => intval($status),
				":ID" => $id
			]);

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){
			
			$_SESSION[Cart::SESSION]['items'][$id]['similar'] = $status;

		}

		return isset($results) && $results == 1 ? true : false;
		
	}

	public static function updateObs($obs)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE cart SET obsCart = :OBS WHERE idCart = :ID", [
			":OBS" => $obs,
			":ID" => $_SESSION[Cart::SESSION]['idCart']
		]);

		return $results == 1 ? true : false;

	}

	public static function updateCartSet($sets = "", $where = "WHERE idCart = :ID", $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE cart SET $sets $where", $param);

		return $results == 1 ? $results : 0;

	}

	public static function deleteItem($id){
		
		if(isset($_SESSION[User::SESSION]))
		{
		
			$sql = new Sql($_SESSION[Sql::DB]);

			$param = $id > 0 ? [":CART" => $_SESSION[Cart::SESSION]['idCart'], ":ID" => $id] : [":CART" => $_SESSION[Cart::SESSION]['idCart']];
			$code = $id > 0 ? " AND idCartItem = :ID" : "";

			$results = $sql->count("DELETE FROM cart_item WHERE idCart = :CART".$code, $param);
		
		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){

			if($id != "")
			{
				unset($_SESSION[Cart::SESSION]['items'][$id]);
			} 

			if($id == "" || $id != "" && count($_SESSION[Cart::SESSION]['items']) == 0) unset($_SESSION[Cart::SESSION]); 

		}

		return isset($results) && $results > 0 ? true : false;
		
	}

	public static function verifyPromo($cupon)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idStorePromo, titlePromoStore, codePromoStore FROM store_promo WHERE codePromoStore = :PROMO", [
			":PROMO" => $cupon
		]);

		$res = count($results) == 1 ? $results[0]['idStorePromo'] : 0;

		if($res == 0) Cart::setErrorRegister("Cupom: $cupon inválido!");

		$update = $sql->count("UPDATE cart SET idStorePromo = :PROMO WHERE idCart = :ID", [
			":PROMO" => $res,
			":ID" => $_SESSION[Cart::SESSION]['idCart']
		]);

		return $update == 1 ? true : false;
		
	}

	public static function consultFreigth($cep, $store){

		$cep = Cart::consultCep($cep);
		$array = [];

		if($cep == false) return false;

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT sts.nickState, ct.idCity, ct.nameCity FROM states AS sts INNER JOIN city as ct ON sts.idState = ct.idState WHERE sts.nickState = :STATE AND ct.nameCity = :CITY", [
			":STATE" => $cep['uf'],
			":CITY" => $cep['localidade']
		]);

		if(count($results) > 0)
		{

			$res = $sql->select("SELECT dv_tp.idDeliveryType, MIN(dv_hr.priceTime), MIN(dv_hr.priceTime2), dv_tp.nameType, dv.freigth FROM delivery as dv INNER JOIN delivery_type AS dv_tp ON dv.idDeliveryType = dv_tp.idDeliveryType INNER JOIN horary AS hr ON dv.idStore = hr.idStore INNER JOIN delivery_horary AS dv_hr ON hr.idHorary = dv_hr.idHorary WHERE dv.idCity = :CITY AND hr.idStore = :STORE GROUP BY dv_tp.idDeliveryType", [
				":CITY" => $results[0]['idCity'], 
				":STORE" => intval($store)
			]);

			if(count($res) > 0)
			{
				foreach ($res as $key => $value) {
					$value['priceTotal'] = $value['MIN(dv_hr.priceTime)'] < $value['MIN(dv_hr.priceTime2)'] ? $value['MIN(dv_hr.priceTime)'] : $value['MIN(dv_hr.priceTime2)'];
					$value['priceTotal'] = floatval($value['priceTotal'] + $value['freigth']); 
					$res[$key] = $value;
				}

				$results[0]['freigth'] = $res;

			}

			return $results;

		} else {

			return false;

		}

	}

	public static function consultCep($cep)
	{

		$cep = strlen($cep) == 9 ? Cart::decryptCep($cep) : $cep;

		$link = "viacep.com.br/ws/$cep/json";

		$ch = curl_init($link);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$response = curl_exec($ch);

		curl_close($ch);

		$data = json_decode($response, true);

		return count($data) == 1 && isset($data['erro']) ? false : $data;

	}

	public static function verifyRegister($store = 0)
	{

		if($store == 0 || !isset($_SESSION[Cart::SESSION]) || $_SESSION[Cart::SESSION]['items'] == 0)
		{
			
			unset($_SESSION[Order::SESSION]);
			header("Location: /");

		}

		$user = User::getData();
		
		if($user != 0)
		{

			if(empty($user[0]['nameUser']) || empty($user[0]['surnameUser']) || empty($user[0]['cpfUser']) || empty($user[0]['telephoneUser']) || empty($user[0]['whatsappUser']) || empty($user[0]['dateBirthUser']))
			{
				
				User::setErrorRegister("Complete seu cadastro!");
				header("Location: /loja-".$store."/account/data/");
				exit;

			} 

		} else {
			header("Location: /");
			exit;
		}

	}

	public static function listFreight($id = 0){

		$array = [];
		$query = $id > 0 ? "WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM freight $query", $param);

		if(is_array($select) && count($select) > 0)
		{

			$data = [
				0 => [],
				1 => []
			];

			foreach ($select as $key => $value) {
				
				$value['details'] = json_decode($value['details'], true);
				$value['details'] = $value['details']['freight'];

				if($value['details'][0]['status'] == 1)
				{
					$data[0][count($data[0])] = [
						"name" => $value['details'][0]['name'],
						"value" => $value['details'][0]['value']
					];
				}

				if($value['details'][1]['status'] == 1)
				{
					$data[1][count($data[1])] = [
						"name" => $value['details'][1]['name'],
						"value" => $value['details'][1]['value']
					];
				}
				
			}

			foreach ($data as $key => $value) {

				if(is_array($value) && count($value))
				{
					asort($value);
					sort($value);
					$array[$key] = $value[0];
				} else {
					$array[$key] = 0;
				}

			}

		}

		return is_array($array) && count($array) > 0 ? $array : 0;

	}

	public static function listPriceHorary($id = 0, $type = 0, $modality = "horary")
	{
		
		$array = [];
		$select = Store::listHoraryStore($id, $type, $modality);
		
		if(is_array($select) && count($select) > 0)
		{

			foreach ($select[0]['details'] as $key => $value) {
				
				if($value['horary'][0]['status'] == 1) $array[count($array)] = floatval($value['horary'][0]['value']);
				if($value['horary'][1]['status'] == 1) $array[count($array)] = floatval($value['horary'][1]['value']);

			}

			asort($array);
			sort($array);

		}		

		return is_array($select) && count($select) > 0 ? $array : 0;

	}

	public static function listAll($id = 0)
	{

		$code = $id > 0 ? "WHERE idCart = :ID": "" ;
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM cart $code", $param);

		if(count($select) > 0 && $id > 0)
		{

			$items = $sql->select("SELECT idCartItem, codBars, codProduct, descProduct, quantity, similar, unitReference, priceItem, discount, totalItem FROM cart_item WHERE idCart = :ID", $param);

			$select[0]['items'] = is_array($items) && count($items) > 0 ? $items : 0;

		}

		return count($select) > 0 ? $select : 0;

	}

	public static function listCartSet($sets = "", $param = [])
	{

		$array = [];
		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM cart $sets", $param);

		if(count($select) > 0)
		{

			foreach ($select as $key => $value) {
				
				$items = $sql->select("SELECT idCartItem, codBars, codProduct, descProduct, quantity, similar, unitReference, priceItem, discount, totalItem, image FROM cart_item WHERE idCart = :ID", [ ':ID' => $value['idCart'] ] );

				$value['items'] = is_array($items) && count($items) > 0 ? $items : 0;

				$array[$key] = $value;

			}

		}

		return count($array) > 0 ? $array : 0;

	}

	public static function organizeItems($items)
	{

		$array = [];
		$data = [];
		$products = [];

		if(is_array($items) && count($items) > 0)
		{

			foreach ($items as $key => $value) {
				
				if(!isset($array[$value['codProduct']])) $array[$value['codProduct']] = $value['codProduct']; 

			}

			sort($array);

			foreach ($array as $kArray => $vArray) {
				
				foreach ($items as $key => $value) {
					
					if($vArray == $value['codProduct'])
					{

						if(!isset($data[$value['codProduct']]))
						{
							$data[$value['codProduct']] = $value;
						} else {
							$data[$value['codProduct']]["quantity"] += $value['quantity'];
							$data[$value['codProduct']]["discount"] += $value['discount'];
							$data[$value['codProduct']]["totalItem"] += $value['totalItem'];
						}

					}

				}

			}

			sort($data);
			
			foreach ($data as $key => $value) {

				$value['priceItem'] = ($value['totalItem']/$value['quantity']);

				$products[$key] = $value;
			}

		}

		return is_array($products) && count($products) > 0 ? $products : 0;

	}
	
}

?>