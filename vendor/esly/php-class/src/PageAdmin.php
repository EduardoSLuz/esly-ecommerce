<?php 

namespace Esly;

use Rain\Tpl;
use Esly\Page;
use Esly\DB\Temp;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\Order;
use Esly\Model\User;


class PageAdmin {

	const STORE = "ADMIN-STORE";
	const NOTIFICATIONS = "ADMIN-NOTIFICATIONS";

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"login" => 0,
		"id" => 0,
		"data"=>[]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/admin/"){
		
		if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
    		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir ,
    		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
    		"debug"         => false
		 );

		Tpl::configure( $config );

		//Global
		if(!isset($_SESSION[PageAdmin::STORE])) $_SESSION[PageAdmin::STORE] = 0; 
		if(!isset($_SESSION[PageAdmin::NOTIFICATIONS])) $_SESSION[PageAdmin::NOTIFICATIONS] = PageAdmin::getNotifications(); 
		$this->options["data"]["st"] = $_SESSION[PageAdmin::STORE];
		$this->options["data"]["notifications"] = isset($_SESSION[PageAdmin::NOTIFICATIONS]) ? $_SESSION[PageAdmin::NOTIFICATIONS] : 0;
		
		$orsQuery = isset($_SESSION[PageAdmin::STORE]) && $_SESSION[PageAdmin::STORE] > 0 ? "AND" : "WHERE";
		$this->options["data"]["orsPending"] =  Order::selectOrder($_SESSION[PageAdmin::STORE], "$orsQuery idOrderStatus = :STATUS", [":STATUS" => 2]);
		$this->options["data"]["orsCanceled"] =  Order::selectOrder($_SESSION[PageAdmin::STORE], "$orsQuery idOrderStatus = :STATUS", [":STATUS" => 9]);

		//Store
		Store::checkAdmin($this->options["id"]);
		$this->options["data"]["stores"] = Store::listStores(0, 1);
		$this->options["data"]["imgs"] = Store::listImagesStore(0);
		if($this->options["id"] > 0 && is_numeric($this->options["id"])) $this->options["data"]["id"] = $this->options["id"];

		//User
		$this->options["data"]["userValues"] = User::checkLogin($this->options["login"]) ? $_SESSION[User::SESSION] : ['login' => false];
	
		$this->tpl = new Tpl;

		// Set Data Globals
 		$this->setData($this->options["data"]);

		if($this->options["header"] === true) $this->tpl->draw("header");
	
	}

	private function setData($data = array())
	{
		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}

	public function setTpl($name, $data = array(), $returnHTML = false)
	{
 		$this->setData($data);

 		return $this->tpl->draw($name, $returnHTML);
	}

	public function __destruct(){
		
		if($this->options["footer"] === true) $this->tpl->draw("footer");

	}

	public static function getNotifications()
	{

		$data = [
			"store" => isset($_SESSION[PageAdmin::STORE]) ? $_SESSION[PageAdmin::STORE] : 0, 
			"total" => 0, 
			"details" => [], 
			"play" => 1, 
			"href" => "/resources/audio/success.mp3", 
			"alert" => 0
		];

		if(isset($_SESSION[PageAdmin::STORE]))
		{
			
			$orsQuery = isset($_SESSION[PageAdmin::STORE]) && $_SESSION[PageAdmin::STORE] > 0 ? "AND" : "WHERE";
			$orsNw = Order::selectOrder($_SESSION[PageAdmin::STORE], "$orsQuery idOrderStatus = :STATUS", [":STATUS" => 2]);			

			$data["details"][count($data["details"])] = [
				"desc" => $orsNw != 0 && is_array($orsNw) && count($orsNw) > 1 ? "Pedidos Novos" : "Pedido Novo",
				"qtd" => $orsNw != 0 && is_array($orsNw) ? count($orsNw) : 0,
				"icon" => "fas fa-clipboard-list",
				"link" => $orsNw != 0 && is_array($orsNw) ? "/admin/orders/?status=2&ini=".$orsNw[0]['dateInsert']."&fin=".$orsNw[count($orsNw) - 1]['dateInsert'] : "/admin/orders/?status=2",
				"status" => 1
			];

			$orsCl = Order::selectOrder($_SESSION[PageAdmin::STORE], "$orsQuery idOrderStatus = :STATUS AND dateUpdate = :DATE", [":STATUS" => 9, ":DATE" => date("Y-m-d")]);			
			$data["details"][count($data["details"])] = [
				"desc" => $orsCl != 0 && is_array($orsCl) && count($orsCl) > 1 ? "Pedidos Cancelados (Hoje)" : "Pedido Cancelado (Hoje)",
				"qtd" => $orsCl != 0 && is_array($orsCl) ? count($orsCl) : 0,
				"icon" => "far fa-thumbs-down",
				"link" => $orsCl != 0 && is_array($orsCl) ? "/admin/orders/?status=9&ini=".$orsCl[0]['dateInsert']."&fin=".$orsCl[count($orsCl) - 1]['dateInsert'] : "/admin/orders/?status=9",
				"status" => 1
			];

			$orsPd = Order::selectOrder($_SESSION[PageAdmin::STORE], "$orsQuery idOrderStatus != :STATUS AND paid = :PAID", [":STATUS" => 9, ":PAID" => 0 ]);			

			$data["details"][count($data["details"])] = [
				"desc" => $orsPd != 0 && is_array($orsPd) && count($orsPd) > 1 ? "Pedidos Pendentes" : "Pedido Pendente",
				"qtd" => $orsPd != 0 && is_array($orsPd) ? count($orsPd) : 0,
				"icon" => "fas fa-exclamation",
				"link" => $orsPd != 0 && is_array($orsPd) ? "/admin/orders/?paid=0&ini=".$orsPd[0]['dateInsert']."&fin=".$orsPd[count($orsPd) - 1]['dateInsert'] : "/admin/orders/?paid=0",
				"status" => 0
			];

			$us = User::selectUser(0, "WHERE dateInsert >= :INI AND dateInsert <= :FINAL AND admin = :CODE", [":INI" => date("Y-m-01"), ":FINAL" => date("Y-m-d"), ":CODE" => 0]);			

			$data["details"][count($data["details"])] = [
				"desc" => $us != 0 && is_array($us) && count($us) > 1 ? "Usuários Registrados" : "Usuário Registrado",
				"qtd" => $us != 0 && is_array($us) ? count($us) : 0,
				"icon" => "fas fa-user-plus",
				"link" => "/admin/users/",
				"status" => 2,
				"alert" => isset($_SESSION[PageAdmin::NOTIFICATIONS]['details'][3]['qtd']) && is_array($us) && intval(count($us)) > intval($_SESSION[PageAdmin::NOTIFICATIONS]['details'][3]['qtd']) ? 1 : 0 
			];

			foreach ($data["details"] as $key => $value) {
				
				if($value['status'] == 1 && $value['qtd'] > 0)
				{
					$data['total'] += $value['qtd'];
				} else if($value['status'] == 0 && $value['qtd'] > 0)
				{
					$data['total'] += 1;
				}

			}

			$data["alert"] = isset($_SESSION[PageAdmin::NOTIFICATIONS]['details'][0]['qtd']) && is_array($orsNw) && intval(count($orsNw)) > intval($_SESSION[PageAdmin::NOTIFICATIONS]['details'][0]['qtd']) && $_SESSION[PageAdmin::NOTIFICATIONS]['store'] == $data['store'] ? 1 : 0; 

			$_SESSION[PageAdmin::NOTIFICATIONS] = $data;
			
			return $data;

		}

	}

}

?>