<?php 

namespace Esly;

use Rain\Tpl;
use Esly\DB\Temp;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\Cart;
use Esly\Model\User;

class Page {

	const SESSION = "Page_EslyEcommerce";
	private $valid = 1;
	private $tpl;
	private $options = [];
	private $defaults = [
		"header" => true,
		"footer" => true,
		"login" => 0,
		"refreshCart" => 0,
		"prime" => [
			"type" => 1,
			"wp" => true,
			"ct" => true,
			"ft" => true,
			"headerTitle" => "Loja"
		]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/")
	{

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
    		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir ,
    		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
    		"debug"         => false
		);

		Tpl::configure($config);

		$data = Page::setPageError();

		if(is_array($data) && count($data) > 0)
		{
			// Set Data Globals
			$this->tpl = new Tpl;
			$this->setData($data);
			$this->tpl->draw($data['error']['page']);
			$this->valid = 0;
			exit;
		}

		if(isset($this->options["data"]["ID"])) Store::verifyStore($this->options["data"]["ID"]);	
		
		if(isset($this->options["data"]["ID"]) && $this->options["data"]["ID"] != 0)
		{ 
			// API Mercato
			$this->options["data"]["departaments"] = Mercato::getDepartaments($this->options["data"]["ID"]);
			$this->options["data"]["list"] = Mercato::listAllProducts($this->options["data"]["ID"]);
		}
			
		// Cart
		$this->options["data"]["cart"] = Cart::checkCart($this->options["data"]["ID"], $this->options["refreshCart"]);
	
		// Page 
		if(isset($_SESSION[Page::SESSION]['url']) && $this->options["login"] != 1) unset($_SESSION[Page::SESSION]['url']);
		$this->options["data"]["layout"] = Page::layoutPage($this->options["data"]["ID"]);
	
		// Store
		$this->options["data"]["horary"] = Store::listHorary($this->options["data"]["ID"]);
		$this->options["data"]["HTTP"] = $_SERVER['HTTP_HOST'];
		$this->options["data"]["imgs"] = Store::listImagesStore($this->options["data"]["ID"]);
		$this->options["data"]["layoutHeader"] = Store::listLayoutHeader($this->options["data"]["ID"], 1);
		$this->options["data"]["storeAll"] = Store::listStores(0);
		$this->options["data"]["store"] = Store::listStores($this->options["data"]["ID"]);
		$this->options["data"]["storeHorary"] = Store::listHoraryStore($this->options["data"]["ID"]);
		$this->options["data"]["storeInstitution"] = Store::listInstitution($this->options["data"]["ID"]);
		$this->options["data"]["storeRegion"] = Store::listFreight($this->options["data"]["ID"], 1);
		$this->options["data"]["storeSocial"] = Store::listInfoSocial($this->options["data"]["ID"]);
		$this->options["data"]["storePayment"] = Store::listPayment($this->options["data"]["ID"]);
		$this->options["data"]["layoutColor"] = Store::listLayoutColor($this->options["data"]["ID"]);

		//User
		$this->options["data"]["userValues"] = User::checkLogin($this->options["login"]) ? $_SESSION[User::SESSION] : ['login' => false];
		
		// Verify Store
		if($this->options["data"]["ID"] == 0 && is_array($this->options["data"]["store"]) && count($this->options["data"]["store"]) > 0)
		{
			
			$ct = 0;
			$store = Store::countStores();
			
			if($store != 0 && is_array($store) && count($store) == 1)
			{
				$this->valid = 0;
				header("Location: /loja-".$store[0]['store']."/");
				exit;	
			} 

		}

		// Set Data Globals
		$this->tpl = new Tpl;
		$this->setData($this->options["prime"]);
 		$this->setData($this->options["data"]);

		if($this->options["header"]) $this->tpl->draw("header");

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

	public function __destruct()
	{
		
		if($this->options["footer"] && $this->valid == 1) $this->tpl->draw("footer");

	}

	public static function verifyPage()
	{
		
		$sql = new Temp;	

		$https = strstr($_SERVER['HTTP_HOST'], "www.") != false ? substr($_SERVER['HTTP_HOST'], 4) : $_SERVER['HTTP_HOST'];

		$results = $sql->select("SELECT idCompany, db_name, db_user, db_pass, directory, status, code FROM company WHERE host = :HOST", [
			":HOST" => $https
		]);

		if(is_array($results) && count($results) == 1)
		{

			$_SESSION[Sql::DB] = $results[0];
			
		} else {

			unset($_SESSION[Sql::DB]);

		}	

		return is_array($results) && count($results) == 1  ? $results[0] : 0;


	}

	private static function setPageError()
	{

		$array = [];

		$verify = Page::verifyPage();

		if($verify != 0 && $verify['status'] == 0 || $verify == 0)
		{

			$status = isset($verify['code']) ? $verify['code'] : "404";

			$array = [
				"error" => Page::msgError($status)
			];

		}

		return $array;

	}

	private static function msgError($num = 0)
	{

		$array = [
			"color" => isset($_SESSION[Sql::DB]) ? Store::listLayoutColor() : 0,
			"imgs" => isset($_SESSION[Sql::DB]) ? Store::listImagesStore() : 0,
			"page" => "error"
		];

		switch ($num) {

			case 404:
				$array['msg'] = "Dominio não cadastrado!";
				$array['icon'] = "fas fa-ghost";
			break;

			case 500:
				$array['msg'] = "O site está em ajustes no momento!";
				$array['icon'] = "fas fa-tools";
			break;
			
			default:
				$array['msg'] = "Ocorreu um erro no site!";
				$array['icon'] = "fas fa-exclamation-triangle";
			break;

		}

		return $array;

	}

	private static function layoutPage($id){

		$query = $id > 0 ? "WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);
		
		$results = $sql->select("SELECT lyFooter1, lyFooter2, lyFooter3, lyFooter4, lyFooter5, lyFooter6, lyFooter7, lyFooter8 FROM layout_footer $query", $param);
			
		return is_array($results) && count($results) > 0 ? $results[0] : 0;
			
	}

	public static function PageRedirect()
	{

		if(isset($_SESSION[Page::SESSION]['url']))
		{

			$url = $_SESSION[Page::SESSION]['url'];

			unset($_SESSION[Page::SESSION]['url']);

		}

		return isset($url) ? $url : 0;

	}

}

?>