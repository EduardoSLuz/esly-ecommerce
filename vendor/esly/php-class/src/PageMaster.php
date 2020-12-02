<?php 

namespace Esly;

use Rain\tpl;
use Esly\Page;
use Esly\DB\Temp;
use Esly\DB\Sql;
use Esly\Model\Company;
use Esly\Model\Order;
use Esly\Model\UserMaster;


class PageMaster {

	const PAGE = "MASTER-PAGE";
	const NOTIFICATIONS = "MASTER-NOTIFICATIONS";

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"login" => 0,
		"data"=>[]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/master/"){
		
		if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

		$this->options = array_merge($this->defaults, $opts);

		PageMaster::verifyLogin($this->options['login']);

		$config = array(
    		"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir ,
    		"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
    		"debug"         => false
		 );

		Tpl::configure( $config );

		if(!isset($_SESSION[PageMaster::PAGE])) $_SESSION[PageMaster::PAGE] = "BAIACU";
		
		//Company
		$this->options["data"]["company"] = Company::listCompany();
	
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

	public function __destruct()
	{
		
		if($this->options["footer"] === true) $this->tpl->draw("footer");

	}

	public static function verifyPage()
	{

		if(!isset($_SESSION[PageMaster::PAGE]) || isset($_SESSION[PageMaster::PAGE]) && $_SESSION[PageMaster::PAGE] != 'BAIACU')
		{
			header("Location: /");
		}

	}

	public static function verifyLogin($login)
	{
		
		switch ($login) {
			
			case 0:
				
				if(isset($_SESSION[UserMaster::SESSION]))
				{
					header("Location: /master/home/");
					exit;
				}

			break;

			case 1:
				
				if(!isset($_SESSION[UserMaster::SESSION])) 
				{
					header("Location: /");
					exit;
				}

			break;
			
			default:
				header("Location: /");
				exit;
			break;

		}
		
	}

}

?>