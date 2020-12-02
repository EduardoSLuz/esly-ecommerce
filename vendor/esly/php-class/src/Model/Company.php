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
			$param = array_merge($param, [":ID" => $id]);
		}

		$sql = new Temp();

		$select = $sql->select("SELECT * FROM company $query", $param);

		return is_array($select) && count($select) > 0 ? $select : 0; 
		
	}

	public static function updateListProducts()
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
					
					$store = Store::listStores();

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

	}

	public static function updateOrdersPaid()
	{
		
		$company = Company::listCompany(0, "status = :ST", [":ST" => 1]);

		if(is_array($company) && count($company) > 0)
		{
			
			foreach ($company as $key => $value) {
				
				$_SESSION[Sql::DB] = $value;
					
				$orders = Order::selectOrder(0, 'WHERE paid = :CODE AND codOrder > :CODE AND idOrderStatus >= :INI AND idOrderStatus <= :FIN', [":CODE" => 0, ":INI" => 6, ":FIN" => 7]);
				
				if(is_array($orders) && count($orders) > 0)
				{

					foreach ($orders as $kOrders => $vOrders) {
						
						$data = Mercato::selectOrders($vOrders['codOrder']);
						
						if($data != 0 && $data[0]['status'] == 9) Order::updateOrderSet("paid = :CODE", [":CODE" => 1, ":ID" => $vOrders['idOrder']]);
						
					}

				}
				
			}
			
		}

	}

	/*
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