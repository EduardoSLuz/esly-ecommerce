<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mailer;
use Esly\DB\Sql;
use Esly\DB\Temp;
use Esly\Model\Cart;
use Esly\Model\Order;
use Esly\Model\Store;
use Esly\Mercato;

class Company extends Model {

	const SESSION = "COMPANY-MASTER";
	
	public static function listCompany($id = 0, $query = "", $param = [])
	{
		
		$conn = $id > 0 ? "AND " : "WHERE ";
		$query = !empty($query) ? $conn.$query : "";
		
		if($id > 0) 
		{
			$query = "WHERE idCompany = :ID ".$query;
			$param[":ID"] = $id;
		}

		$sql = new Temp();

		$select = $sql->select("SELECT * FROM company $query", $param);
		
		if(is_array($select) && count($select) > 0)
		{

			$data = [];

			foreach ($select as $key => $value) {

				$value['mercato'] = isset($value['idCompany']) ? Mercato::listMercato(0, "idCompany = :ID", [':ID' => $value['idCompany']]) : 0;
				$value['idCompany'] = Company::cryptCode($value['idCompany']);
				$value['db_pass'] = Company::decryptCode($value['db_pass']);

				if(isset($value['mercato'][0]))
				{
					$value['mercato'][0]['idCompany'] = $value['idCompany'];
					$value['mercato'][0]['idMercato'] = Company::cryptCode($value['mercato'][0]['idMercato']);
				}

				$data[] = $value;

			}

		}

		return isset($data) ? $data : 0; 
		
	}

	public static function updateCompany($sets = "", $query = "", $param = [])
	{
		
		if(!empty(trim($sets)))
		{
			$sql = new Temp();

			$select = $sql->count("UPDATE company SET $sets $query", $param);
		}

		return isset($select) && $select > 0 ? true : false; 
		
	}

	public static function updateListProducts($id = 0, $now = 0)
	{

		$company = Company::listCompany($id, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
				
				$value['idCompany'] = Company::decryptCode($value['idCompany']);
            	$data = Mercato::listMercato(0, "idCompany = :ID", [':ID' => $value['idCompany']]);
					
				if(isset($data[0]['dateList']) && $data[0]['dateList'] == NULL && $data[0]['status'] == 1  || isset($data[0]['dateList']) && isset($data[0]['time']) && floatval(date("YmdH.i")) - floatval(date("YmdH.i", strtotime($data[0]['dateList']))) >= $data[0]['time'] && $data[0]['status'] == 1 || $now == 1)
				{

					Company::updateCompany("status = :STATUS, code = :CODE", "WHERE idCompany = :ID", [':STATUS' => 0, ':CODE' => 501, ':ID' => $value['idCompany']]);

					$_SESSION[Sql::DB] = $value;

					$his = Mercato::getHistoric();
					
					$store = Store::listAll();

					if(is_array($store) && count($store) > 0)
					{

						$dateInit = date('Y-m-d H:i:s');

						foreach ($store as $kStore => $vStore) {
							
							if(isset($vStore['statusStore']) && $vStore['statusStore'] == 1)
							{

								$date = date("d/m/Y H:i:s");

								$res = Mercato::getProducts($vStore['idStore']);

								$his[$vStore['idStore']][] = $res ? $date.": LOJA ".$vStore['idStore']." - LISTA DE PRODUTOS ATUALIZADA COM SUCESSO" : $date.": LOJA ".$vStore['idStore']." - NENHUMA LISTA FOI ATUALIZADA";
							}

						}
						
						$list = $res ? ", dateUpdate = :DATE" : "";
						$update = Mercato::updateMercato($data[0]['idMercato'], "dateList = :DATE $list", "", [':DATE'=>$dateInit]);

					}

					if(isset($update) && $update){
						Company::updateCompany("status = :STATUS, code = :CODE", "WHERE idCompany = :ID", [':STATUS' => 1, ':CODE' => 0, ':ID' => $value['idCompany']]);
						Mercato::setHistoric($his);	
					} 
					
				}

			}
			
		}

		return isset($res) && $res ? true : false;

	}

	public static function updateListProductsold()
	{

		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{

			foreach ($company as $key => $value) {
				
            	$data = Mercato::listMercato(0, "idCompany = :ID", [':ID' => $value['idCompany']]);

				if($data != 0 && $data[0]['dateLast'] == NULL || $data != 0 && date("YmdHi") - date("YmdHi", strtotime($data[0]['dateLast'].$data[0]['horaryList'])) > 10000)
				{

					$_SESSION[Sql::DB] = $value;

					$his = Mercato::getHistoric();
					
					$store = Store::listAll();

					if(is_array($store) && count($store) > 0)
					{

						$dateInit = date('Y-m-d');
						
						foreach ($store as $kStore => $vStore) {
							
							$date = date("d/m/Y H:i:s");

							$res = Mercato::getProducts($vStore['idStore']);

							$his[$vStore['idStore']][] = $res ? $date.": LOJA ".$vStore['idStore']." - LISTA DE PRODUTOS ATUALIZADA COM SUCESSO" : $date.": LOJA ".$vStore['idStore']." - NENHUMA LISTA FOI ATUALIZADA";

						}

						$update = Mercato::updateMercato($data[0]['idMercato'], "dateLast = :DATE", "", [':DATE'=>$dateInit]);

					}

					if(isset($update) && $update) Mercato::setHistoric($his);
					
				}

			}
			
		}

		return isset($res) && $res ? true : false;

	}

	public static function updateOrdersPaid()
	{
		
		$ct = 0;
		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
				
				$value['db_pass'] = Company::decryptCode($value['db_pass']);
				$_SESSION[Sql::DB] = $value;
					
				$orders = Order::selectOrder(0, 'WHERE paid = :CODE AND codOrder > :CODE AND idOrderStatus >= :INI AND idOrderStatus <= :FIN', [":CODE" => 0, ":INI" => 6, ":FIN" => 7]);
				
				if(is_array($orders) && count($orders) > 0)
				{

					foreach ($orders as $kOrders => $vOrders) {
						
						$data = Mercato::selectOrders($vOrders['codOrder']);
						
						if($data != 0 && $data[0]['status'] == 9 || $data != 0 && $data[0]['status'] == 5) 
						{
							Order::updateOrderSet("paid = :CODE", [":CODE" => 1, ":ID" => $vOrders['idOrder']]);
							$ct += 1;
						}
					}

				}
				
			}
			
		}

		return $ct > 0 ? true : false;

	}

	public static function update_get()
	{

		$array = [];
		//$dir = scandir("resources/clients/astemac/stores/loja-01/imgs/products");
		
		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);
		
		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
		
				$_SESSION[Sql::DB] = $value;

				$store = Store::listStores();

				if(is_array($store) && count($store) > 0)
				{

					foreach ($store as $kStore => $vStore) {
						
						$dir = "resources/clients/".$_SESSION[Sql::DB]['directory']."/stores/loja-".$vStore['store']."/imgs/products";

						$products = Mercato::listAllProducts($vStore['idStore']);

						if(is_array($products) && count($products) > 0)
						{

							foreach ($products as $kProducts => $vProducts) {
								
								$file = substr($vProducts['image'], 1);

								if(strstr($vProducts['image'], $dir) && file_exists($file))
								{

									$nameImage = "ESLYIMAGE#".$vProducts['barCode']."#".$vProducts['codProduct']."#".str_replace([" ", "\\", "/"], "_", $vProducts['description']);
									//$nameImage = Store::cryptCode($nameImage);

									rename($file, $dir."/".$nameImage.strstr($file, '.'));

									/* CONVERT IN WEBP - PHP 7.4 WARNING
									$image = imagecreatefromstring(file_get_contents($file));
									ob_start();
									imagejpeg($image,NULL,100);
									$cont = ob_get_contents();
									ob_end_clean();
									imagedestroy($image);
									$content = imagecreatefromstring($cont);
									$output = $dir.'/'.$nameImage.'.webp';
									imagewebp($content,$output);
									imagedestroy($content);
									*/

								} 

							}

						}

					}

				}

			}

		}

		return $array;
	
	}

	/*

	public static function update_get()
	{

		// ESSE UPDATE_GET ARRUMAR OS PRODUTOS QUE VINHAM COM UNITSMEASURES ERRADOS E COLOCAVA SUBTYPE PARA AQUELES QUE NAO TINHAM

		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
				
				$_SESSION[Sql::DB] = $value;

				$store = Store::listStores();

				if(is_array($store) && count($store) > 0)
				{

					foreach ($store as $kStore => $vStore) {
						
						$products = Mercato::listAllProducts($vStore['idStore']);

						if(is_array($products) && count($products) > 0)
						{

							$data = [];

							foreach ($products as $kProducts => $vProducts) {
								
								$data[$kProducts] = $vProducts;

								if(isset($vProducts['unitsMeasures']) && count($vProducts['unitsMeasures']) > 0)
								{

									foreach ($vProducts['unitsMeasures'] as $kUnits => $vUnits) {
										
										if(is_numeric($kUnits))
										{
											if(!isset($vUnits['id'])) $vUnits['id'] = $kUnits + 1;
											if(!isset($vUnits['status'])) $vUnits['status'] = 1;

											$data[$kProducts]['unitsMeasures'][$kUnits] = $vUnits;
										} else {
											unset($data[$kProducts]['unitsMeasures'][$kUnits]);
										}
										
									}
																		
								}

								if(!isset($data[$kProducts]['subTypes'])) $data[$kProducts]['subTypes'] = [
									"description" => "",
									"status" => 0,
									'types' => [0 => "Padrão"]
								];
								
							}

							if(isset($data) && is_array($data) && count($data) > 0)
							{
								Mercato::saveJson($data, $vStore['idStore'], "ST", 1);
								Mercato::getProductDepartaments($vStore['idStore']);
								$res = true;
							}

						}

					}

				}

			}
			
		}

		return isset($res) && $res ? true : false;

	}

	public static function updateStockProducts()
	{

		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
				
				$_SESSION[Sql::DB] = $value;
					
				$orders = Order::selectOrder(0, 'WHERE checkStock = :CODE', [":CODE" => 0]);
				
				if(is_array($orders) && count($orders) > 0)
				{

					foreach ($orders as $kOrders => $vOrders) {

						$store = $vOrders['idStore'];

						$products = Mercato::listAllProducts($store);
						$productsDep = Mercato::listAllProducts($store, 1);
						$items = Cart::listCartItemSet("WHERE idCart = :ID", [':ID' => $vOrders['idCart']]);
						
						if(is_array($items) && count($items) > 0 && is_array($products) && count($products) > 0 && is_array($productsDep) && count($productsDep) > 0)
						{

							foreach ($items as $kItems => $vItems) {
								
								$pro = Mercato::searchProductId($store, $vItems['codProduct']);
								$newVal = is_array($pro) && count($pro) > 0 && $pro['stock'] > 0 && ($pro['stock'] - $vItems['quantity']) >= 0 ? floatval($pro['stock'] - $vItems['quantity']) : false;  

								if($newVal !== false) 
								{
									Mercato::updateProduct($products, 0, 'codProduct', $vItems['codProduct'], 'stock', $newVal);
									Mercato::updateProductDepartaments($productsDep, 0, 'codProduct', $vItems['codProduct'], 'stock', $newVal);
								}	
							}
							
							if(is_array($products) && count($products) > 0) Mercato::saveProducts($products, $store);
							if(is_array($productsDep) && count($productsDep) > 0) Mercato::saveProducts($productsDep, $store);
							
						}
						
						// PAREI AQUI : FALTA COLOCAR UM UPDATE PARA ATUALUZAR O PEDIDO, PARA NÃO EXECUTAR MAIS ESSA CHECAGEM
						
					}

				}
				
			}
			
		}

	}
	*/

}

?>