<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mercato;
use Esly\Model\User;
use Esly\DB\Sql;

class Cart extends Model {

	const SESSION = "Cart";

	public static function checkCart($store = 0, $refresh = 0)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		if(isset($_SESSION[User::SESSION]) && !isset($_SESSION[User::SESSION]['data']))
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
									
									$item = Cart::listCartItemSet("WHERE idCart = :ID AND codProduct = :COD", [':ID' => intval($cart['idCart']), ':COD' => $value['codProduct']]);

									if($item != 0 && isset($item[0]['unitReference']) && strtolower($item[0]['unitReference']) !== strtolower($value['unitReference'])) continue;
									
									$product = isset($value['codProduct']) && $value['codProduct'] > 0 ? Mercato::searchFieldProduct($store, $value['codProduct'], 'codProduct') : 0;

									if(is_array($item) && count($item) > 0 && $product != 0)
									{
										
										$unit = Cart::selectUnitMeasure($product['unitsMeasures'], "name", $value['unitReference']);
										$maxQtd = $value['stock'] > 0 && isset($unit['valueStock']) ? intval(str_replace(".", ",", $product['stock']/$unit['valueStock'])) : 0;

										$update = Cart::updateCartItemSet("priceItem = :PRICE, quantity = :QTD, stock = :STOCK, totalItem = (:PRICE * :QTD)", "WHERE idCartItem = :ID", [
											":PRICE" => floatval($value['priceItem']),
											":QTD" => ($item[0]['stock'] + $value['stock']) <= $product['stock'] ? intval($item[0]['quantity'] + $value['quantity']) : $maxQtd,
											":STOCK" => ($item[0]['stock'] + $value['stock']) <= $product['stock'] ? floatval($item[0]['stock'] + $value['stock']) : floatval($product['stock']),
											":ID" => intval($item[0]['idCartItem'])
										]);

									} else {
										
										$insert = Cart::insertCartItemSet( "idCart, codBars, codProduct, descProduct, quantity, stock, similar, unitReference, priceItem, totalItem, image", ":ID, :BARCODE, :COD, :DESC, :QTD, :STOCK, :SIM, :UN, :PRICE, :TOTAL, :IMG", [ 
											":ID" => intval($cart['idCart']),
											":BARCODE" => $value['codBars'],
											":COD" => $value['codProduct'],
											":DESC" => $value['descProduct'],
											":QTD" => intval($value['quantity']),
											":STOCK" => floatval($value['stock']),
											":SIM" => $value['similar'],
											":UN" => $value['unitReference'],
											":PRICE" => $value['priceItem'],
											":TOTAL" => $value['totalItem'],
											":IMG" => $value['image']
										]);

									}

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
					
					$count = Cart::refreshCart($select[0]['items'], $store, $refresh);

					$total = $count != 0 && isset($count['total']) ? $count['total'] : 0;
					$totalItems = $count != 0 && isset($count['quantity']) ? $count['quantity'] : 0;
					$itemsCart = $count != 0 && isset($count['items']) ? $count['items'] : 0;

					$update = Cart::updateCartSet($sets = "subtotalCart = :TOTAL, totalCart = :TOTAL, dateUpdate = :DATE", "WHERE idCart = :ID", [ ":TOTAL" => floatval($total), ":DATE" => date("Y-m-d"), ":ID" => intval($select[0]['idCart']) ] );

					$_SESSION[Cart::SESSION] = [
						"idCart" => $select[0]['idCart'],
						"idPromo" => $select[0]['idStorePromo'],
						"totalCart" => floatval($total),
						"items" => is_array($itemsCart) && count($itemsCart) > 0 ? $itemsCart : 0,
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

			} else {

				if(isset($_SESSION[Cart::SESSION]['items']) && is_array($_SESSION[Cart::SESSION]['items']) && count($_SESSION[Cart::SESSION]['items']) >= 0)
				{

					$count = Cart::refreshCart($_SESSION[Cart::SESSION]['items'], $store, $refresh);

					$total = $count != 0 && isset($count['total']) ? $count['total'] : 0;
					$totalItems = $count != 0 && isset($count['quantity']) ? $count['quantity'] : 0;

					$_SESSION[Cart::SESSION]['totalCart'] = $total;
					$_SESSION[Cart::SESSION]['totalItems'] = $totalItems;
					$_SESSION[Cart::SESSION]['items'] = $count != 0 && isset($count['items']) ? $count['items'] : $_SESSION[Cart::SESSION]['items'];

				}

			}

		}

		// unset($_SESSION[Cart::SESSION]);


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

	public static function refreshCart($items = [], $store = 0, $refresh = 0)
	{
		
		$array = [];

		if(is_array($items) && count($items) > 0 && $store > 0)
		{
			
			$array = [
				"quantity" => 0,
				"total" => 0
			];

			foreach ($items as $key => $value) {
				
				$product = isset($value['codProduct']) && $value['codProduct'] > 0 ? Mercato::searchFieldProduct($store, $value['codProduct'], 'codProduct') : 0;
				
				if($product != 0)
				{
					
					$unit = Cart::selectUnitMeasure($product['unitsMeasures'], "name", $value['unitReference']);
					$maxQtd = $value['stock'] > 0 && isset($unit['valueStock']) ? intval(str_replace(".", ",", $product['stock']/$unit['valueStock'])) : 0;
					
					if($value['quantity'] > 0) 
					{
						$items[$key]['lastQtd'] = $value['quantity'];
					} else {
						$value['quantity'] = isset($value['lastQtd']) ? $value['lastQtd'] : 1;
						$value['stock'] = isset($value['lastQtd']) && isset($unit['valueStock']) && $value['stock'] > $product['stock'] ? ($unit['valueStock'] * $value['lastQtd']) : $value['stock'];
					}	

					if(isset($unit['freeFill']) && $unit['freeFill'] == 1)
					{	
					
						$maxQtd = 1;
						$value['stock'] = $items[$key]['stock']; 
						$items[$key]['quantity'] = $value['stock'] <= $product['stock'] && $value['stock'] > 0 ? intval($value['quantity']) : $maxQtd;
						$items[$key]['totalItem'] = $value['stock'] <= $product['stock'] && $value['stock'] > 0 ? floatval($value['priceItem'] * $value['stock']) : floatval($value['priceItem'] * $product['stock']);
					
					} else {
						$items[$key]['quantity'] = $value['stock'] <= $product['stock'] && $value['stock'] > 0 ? intval($value['quantity']) : $maxQtd;
						$items[$key]['totalItem'] = $value['stock'] <= $product['stock'] && $value['stock'] > 0 ? floatval($value['priceItem'] * $value['quantity']) : floatval($value['priceItem'] * $maxQtd);
					}
					
					$items[$key]['unitPrime'] = $unit;
					$items[$key]['unitOrigin'] = $product['unitsMeasures'][0];
					$value['quantity'] = $items[$key]['quantity'];

					if($product['stock'] > 0)
					{
						$array['quantity'] += $value['quantity']; 
						$array['total'] += $value['totalItem'];
						unset($items[$key]['details']);
				
					} else if($product['stock'] == 0 || $maxQtd < 1)
					{

						if($refresh != 0 && isset($_SESSION[User::SESSION]))
						{

							unset($items[$key]);

							$delete = isset($value['idCartItem']) && $value['idCartItem'] > 0 ? Cart::deleteCartItemSet("WHERE idCartItem = :ID", [':ID' => $value['idCartItem']]) : 0;

						} else{

							$items[$key]['details'] = "Produto Indisponível na Loja $store";
							
						}

					}

				}

			}

			$array['items'] = $items;

		}

		return is_array($array) && count($array) > 0 ? $array : 0;

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

		$unitItem = isset($item['unitsMeasures'][0]) ? $item['unitsMeasures'][0] : 0;

		if(is_array($unitItem) && isset($unitItem['valueStock']) && $unitItem['freeFill'] == 1) $unitItem['valueStock'] = 1;

		if(isset($_SESSION[User::SESSION]) && isset($_SESSION[Cart::SESSION]) && is_array($unitItem))
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$product = Cart::listCartItemSet("WHERE idCart = :ID AND codProduct = :COD", [':ID' => $_SESSION[Cart::SESSION]['idCart'], ':COD' => $item['codProduct']]);

			if(is_array($product) && count($product) > 0)
			{
				
				if(strtolower($product[0]['unitReference']) != strtolower($unitItem['name'])) return ['status' => 0, 'msg' => "Você já tem esse produto no carrinho com outra unidade de medida!"];

				$stockTotal = floatval($product[0]['stock'] + ($item['qtd'] * $unitItem['valueStock']));

				if($stockTotal <= $item['stock'] && $item['stock'] > 0)
				{

					$results = Cart::updateCartItemSet("codBars = :BARS, descProduct = :DESC, quantity = :QTD, stock = :STOCK, unitReference = :UN, priceItem = :PRICE, totalItem = (:PRICE * :QTD), image = :IMG", "WHERE idCartItem = :ID", [
						':BARS' => $item['barCode'],
						':DESC' => $item['description'],
						':QTD' => isset($unitItem['valueStock']) && $unitItem['freeFill'] == 1 ? 1 : ($product[0]['quantity'] + $item['qtd']),
						':STOCK' => formatPrice($stockTotal),
						':UN' => $unitItem['name'],
						':PRICE' => $unitItem['price'],
						':IMG' => $item['image'],
						':ID' => $product[0]['idCartItem']
					]);

				} else {
					
					$msg =  $stockTotal - $item['stock'] >= 0 && $product[0]['stock'] == $item['stock'] ? "Limite do Produto Atingido" : "Você só pode adicionar mais: ".($item['stock'] - $product[0]['stock'])." ".$item['unitOrigin']['name'];

					return ['status' => 0, 'msg' => $msg];

				}

			} else if($item['stock'] > 0){

				$results = Cart::insertCartItemSet( "idCart, codBars, codProduct, descProduct, quantity, stock, unitReference, priceItem, totalItem, image", ":ID, :BARCODE, :COD, :DESC, :QTD, :STOCK, :UN, :PRICE, :TOTAL, :IMG", [ 
					":ID" => $_SESSION[Cart::SESSION]['idCart'],
					":BARCODE" => $item['barCode'],
					":COD" => intval($item['codProduct']),
					":DESC" => strtoupper($item['description']),
					":QTD" => isset($unitItem['valueStock']) && $unitItem['freeFill'] == 1 ? 1 : intval($item['qtd']),
					":STOCK" => formatPrice($item['qtd'] * $unitItem['valueStock']),
					":UN" => $unitItem['name'],
					":PRICE" => $unitItem['price'],
					":TOTAL" => ($unitItem['price'] * $item['qtd']),
					":IMG" => $item['image']
				]);

			} else {
				return ['status' => 0, 'msg' => "Produto Inválido"];
			}
			

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0 && is_array($unitItem)){
			
			$ct = ['res' => 0, 'key' => 0];

			if($_SESSION[Cart::SESSION]["items"] == 0 || is_array($_SESSION[Cart::SESSION]["items"]) && count($_SESSION[Cart::SESSION]["items"]) == 0) 
			{
				$_SESSION[Cart::SESSION]["items"] = 0;
			} else{

				foreach ($_SESSION[Cart::SESSION]["items"] as $key => $value) {
					
					if($value['codProduct'] == $item['codProduct']) 
					{	

						if(strtolower($value['unitReference']) != strtolower($unitItem['name'])) return ['status' => 0, 'msg' => "Você já tem esse produto no carrinho com outra unidade de medida!"];
						
						$stockTotal = floatval($value['stock'] + ($item['qtd'] * $unitItem['valueStock']));

						if($stockTotal <= $item['stock'] && $item['stock'] > 0)
						{
							$ct = ['res' => 1, 'key' => $key];
						} else{
							
							$msg = $stockTotal - $item['stock'] >= 0 && $value['stock'] == $item['stock'] ? "Limite do Produto Atingido" : "Você só pode adicionar mais: ".($item['stock'] - $value['stock'])." ".$item['unitOrigin']['name'];

							return ['status' => 0, 'msg' => $msg];
						
						}

					}

				}

			}	

			if(isset($ct['res']) && isset($ct['key']) && $ct['res'] == 1)
			{
				
				$qtd = $_SESSION[Cart::SESSION]["items"][$ct['key']]['quantity'];
				$stockTotal = floatval($_SESSION[Cart::SESSION]["items"][$ct['key']]['stock'] + ($item['qtd'] * $unitItem['valueStock']));

				$_SESSION[Cart::SESSION]["items"][$ct['key']] = [
					"idCart" => 0,
					"idCartItem" => 0,
					"codBars" => $item['barCode'],
					"codProduct" => intval($item['codProduct']),
					"descProduct" => strtoupper($item['description']),
					"quantity" => isset($unitItem['valueStock']) && $unitItem['freeFill'] == 1 ? 1 : intval($qtd + $item['qtd']),
					"stock" => formatPrice($stockTotal),
					"similar" => 0,
					"unitReference" => $unitItem['name'],
					"priceItem" => $unitItem['price'],
					"totalItem" => floatval($unitItem['price'] * $stockTotal),
					"image" => $item['image']
				];

				$results = isset($_SESSION[Cart::SESSION]["items"][$ct['key']]) && is_array($_SESSION[Cart::SESSION]["items"][$ct['key']]) ? 1 : 0;

			} else if($item['stock'] > 0){

				if($_SESSION[Cart::SESSION]["items"] == 0) $_SESSION[Cart::SESSION]["items"] = [];
				
				$_SESSION[Cart::SESSION]["items"][] = [
					"idCart" => 0,
					"idCartItem" => 0,
					"codBars" => $item['barCode'],
					"codProduct" => intval($item['codProduct']),
					"descProduct" => strtoupper($item['description']),
					"quantity" => isset($unitItem['valueStock']) && $unitItem['freeFill'] == 1 ? 1 : intval($item['qtd']),
					"stock" => formatPrice($item['qtd'] * $unitItem['valueStock']),
					"similar" => 0,
					"unitReference" => $unitItem['name'],
					"priceItem" => $unitItem['price'],
					"totalItem" => floatval($unitItem['price'] * $item['qtd']),
					"image" => $item['image']
				];

				$results = is_array($_SESSION[Cart::SESSION]["items"]) && count($_SESSION[Cart::SESSION]["items"]) > 0 ? 1 : 0;

			} else {
				return ['status' => 0, 'msg' => "Produto Inválido"];
			}

		}

		return isset($results) && $results == 1 ? true : ['status' => 0, 'msg' => "Ocorreu um Erro"];

	}

	public static function selectUnitMeasure($units, $field = "name", $code = "UN")
	{

		$array = [];

		if(is_array($units) && count($units) > 0 && isset($code))
		{

			foreach ($units as $key => $value) {
				
				if($value[$field] == $code)
				{
					$array = $value;
					break;
				}

			}

		}

		return is_array($array) && count($array) > 0 ? $array : 0;
 
	}

	public static function updateItem($item){
		
		if(isset($_SESSION[User::SESSION]))
		{
			
			$product = Cart::listCartItemSet("WHERE idCartItem = :ID", [":ID" => $item['id']]);
			
			$itens = isset($product[0]) ? Mercato::searchFieldProduct($item['store'], $product[0]['codProduct'], 'codProduct') : 0;

			$unit = Cart::selectUnitMeasure($itens['unitsMeasures'], "name", $product[0]['unitReference']);

			$stock = isset($product[0]['stock']) && isset($product[0]['quantity']) && $product[0]['quantity'] > 0 ? floatval($product[0]['stock']/$product[0]['quantity']) : 0;
			$newStock = $stock > 0 ? ($stock * $item['quantity']) : 0;

			if(isset($unit['freeFill']) && $unit['freeFill'] == 1) 
			{
				$newStock = $item['quantity'];
				$item['quantity'] = 1;
			}

			if($newStock > 0 && $itens['stock'] > 0 && $newStock <= $itens['stock'])
			{

				$results = $item['quantity'] == $product[0]['quantity'] && isset($unit['freeFill']) && $unit['freeFill'] == 0 ? 1 : Cart::updateCartItemSet("quantity = :QTD, stock = :STOCK, totalItem = :TOTAL", "WHERE idCartItem = :ID", [
					":QTD" => floatval($item['quantity']),
					":TOTAL" => isset($unit['freeFill']) && $unit['freeFill'] == 1 ? formatPrice($unit['price'] * $newStock) : formatPrice($product[0]['priceItem'] * $item['quantity']), 
					":STOCK" => $newStock,
					":ID" => intval($item['id'])
				]);

			} else {

				return ['status' => 0, 'msg' => "Limite do Produto Atingido", 'number' => isset($unit['freeFill']) && $unit['freeFill'] == 1 ? $product[0]['stock'] : $product[0]['quantity']];

			}

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){

			$product = $_SESSION[Cart::SESSION]['items'][$item['id']];

			$itens = isset($product['codProduct']) ? Mercato::searchFieldProduct($item['store'], $product['codProduct'], 'codProduct') : 0;

			$unit = Cart::selectUnitMeasure($itens['unitsMeasures'], "name", $product['unitReference']);

			$stock = isset($product['stock']) && isset($product['quantity']) && $product['quantity'] > 0 ? floatval($product['stock']/$product['quantity']) : 0;
			$newStock = $stock > 0 ? ($stock * $item['quantity']) : 0;

			if(isset($unit['freeFill']) && $unit['freeFill'] == 1) 
			{
				$newStock = $item['quantity'];
				$item['quantity'] = 1;
			}

			if($newStock > 0 && $itens['stock'] > 0 && $newStock <= $itens['stock'])
			{
				
				$_SESSION[Cart::SESSION]['items'][$item['id']]['quantity'] = $item['quantity'];
				$_SESSION[Cart::SESSION]['items'][$item['id']]['stock'] = $newStock;
				$_SESSION[Cart::SESSION]['items'][$item['id']]['totalItem'] = isset($unit['freeFill']) && $unit['freeFill'] == 1 ? formatPrice($unit['price'] * $newStock) : formatPrice($_SESSION[Cart::SESSION]['items'][$item['id']]['priceItem'] * $item['quantity']);

				$results = isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'][$item['id']]['quantity'] == $item['quantity'] ? 1 : 0;

			} else{
				
				return ['status' => 0, 'msg' => "Limite do Produto Atingido", 'number' => isset($unit['freeFill']) && $unit['freeFill'] == 1 ? $product['stock'] : $product['quantity']];

			}
			

		}

		return isset($results) && $results == 1 ? true : ['status' => 0, 'msg' => "Ocorreu um Erro"];
		
	}

	public static function updateItemSimilar($id, $status){
		
		if(isset($_SESSION[User::SESSION]))
		{

			$results = Cart::updateCartItemSet("similar = :STATUS", "WHERE idCartItem = :ID", [
				":STATUS" => intval($status),
				":ID" => $id
			]);

		} else if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] == 0){
			
			$_SESSION[Cart::SESSION]['items'][$id]['similar'] = $status;

			$results = isset($_SESSION[Cart::SESSION]['items'][$id]['similar']) && $_SESSION[Cart::SESSION]['items'][$id]['similar'] == $status ? 1 : 0;

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

	public static function updateCartItemSet($sets = "", $where = "WHERE idCartItem = :ID", $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE cart_item SET $sets $where", $param);

		return $results == 1 ? $results : 0;

	}

	public static function updateCartConfigSet($sets = "", $where = "WHERE idCartConfig = :ID", $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE cart_config SET $sets $where", $param);

		return $results == 1 ? $results : 0;

	}

	private static function deleteCartItemSet($where = "WHERE idCartItem = :ID", $param = [])
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("DELETE FROM cart_item $where", $param);

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

			$items = $sql->select("SELECT idCartItem, codBars, codProduct, descProduct, quantity, stock, similar, unitReference, priceItem, discount, totalItem FROM cart_item WHERE idCart = :ID", $param);

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
				
				$items = Cart::listCartItemSet("WHERE idCart = :ID", [ ':ID' => $value['idCart'] ]);

				$value['items'] = is_array($items) && count($items) > 0 ? $items : 0;

				$array[$key] = $value;

			}

		}

		return count($array) > 0 ? $array : 0;

	}

	public static function listCartItemSet($query = "", $param = [])
	{

		$array = [];
		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM cart_item $query", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listCartConfigSet($sets = "", $param = [])
	{

		$array = [];
		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idCartConfig, valueMin, allowMin FROM cart_config $sets", $param);

		return count($select) > 0 ? $select : 0;

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