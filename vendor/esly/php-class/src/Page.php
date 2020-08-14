<?php 

namespace Esly;

use Rain\Tpl;
use Esly\DB\Temp;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\User;

class Page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"header" => true,
		"footer" => true,
		"login" => 0,
		"prime" => [
			"type" => 1,
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/")
	{

		if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
    		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir ,
    		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
    		"debug"         => false
		 );

		Tpl::configure($config);

		if(isset($this->options["data"]["ID"])) Store::verifyStore($this->options["data"]["ID"]);	
		
		// Arrays Globals
		$this->options["data"]["deliveryHorary"] = Store::listDeliveryHorary($this->options["data"]["ID"]);
		$this->options["data"]["deliveryType"] = Store::listDeliveryType($this->options["data"]["ID"]);
		$this->options["data"]["horary"] = Store::listHorary($this->options["data"]["ID"], 0);
		$this->options["data"]["HTTP"] = $_SERVER['HTTP_HOST'];
		$this->options["data"]["layout"] = Page::layoutPage($this->options["data"]["ID"]);
		$this->options["data"]["store"] = Store::listAll($this->options["data"]["ID"]);
		$this->options["data"]["storeApp"] = Store::listSocial(2);
		$this->options["data"]["storeHorary"] = Store::listHorary($this->options["data"]["ID"]);
		$this->options["data"]["storeInstitution"] = Store::listInstitution($this->options["data"]["ID"]);
		$this->options["data"]["storeRegion"] = Store::listRegion($this->options["data"]["ID"]);
		$this->options["data"]["storeSocial"] = Store::listSocial();
		$this->options["data"]["storePayment"] = Store::listPayment($this->options["data"]["ID"]);
		$this->options["data"]["userValues"] = User::checkLogin($this->options["login"]) ? $_SESSION[User::SESSION] : ['login' => false];
		
		if($this->options["data"]["ID"] != 0) $this->options["data"]["storeAll"] = Store::listAll();
		
		$this->tpl = new Tpl;
		 
		// Set Data Globals
		$this->setData($this->options["prime"]);
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

	public function __destruct()
	{
		
		if($this->options["footer"] === true) $this->tpl->draw("footer");

	}

	private static function verifyPage()
	{
		
		$sql = new Temp;	

		$results = $sql->select("SELECT db_name, db_user, db_pass FROM host WHERE host = :HOST", [
			":HOST" => $_SERVER['HTTP_HOST']  
		]);

		if(count($results) === 1)
		{

			$_SESSION[Sql::DB] = $results[0];
			
			return true;

		} else {
			
			throw new \Exception("DOMINIO NÃO CADASTRADO");
			exit;

		}

	}

	private static function layoutPage($id){

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ly.txLayout, ly.txH1Layout, ly.txH2Layout, ly.txH3Layout, ly.txFooterLayout, ly.bgLayout, ly.bgH1Layout, ly.bgH2Layout, ly.bgH3Layout, ly.bgFooterLayout, ly.btnLayout, ly.btnH1Layout, ly.btnH2Layout, ly.btnH3Layout, ly.colorLayout, ly_ft.socialLayout, ly_ft.suportLayout, ly_ft.institutionalLayout, ly_ft.paymentLayout, ly_ft.appLayout, ly_ft.securityLayout, ly_ft.promotionLayout, ly_ft.detailLayout FROM layout AS ly INNER JOIN layout_footer AS ly_ft ON ly.idLayout = ly_ft.idLayout WHERE ly.idStore = :ID", [
			":ID" => intval($id)
		]);
			
		return $results[0];
			
	}

}

?>