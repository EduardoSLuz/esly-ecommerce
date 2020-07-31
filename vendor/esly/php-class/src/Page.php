<?php 

namespace Esly;

use Rain\Tpl;
use Esly\DB\Temp;
use Esly\DB\Sql;

class Page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"header" => true,
		"footer" => true,
		"prime" => [
			"type" => 1
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

		Tpl::configure( $config );

		if(!isset($_SESSION["DB"]))
		{
			Page::verifyPage();	
		}

		$this->options["data"]["layout"] = Page::layoutPage();

		$this->tpl = new Tpl;

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

		$_SESSION["DB"] = $results[0];

	}

	private static function layoutPage(){

		$layout = [];

		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->select("SELECT desLayout, classLayout FROM layout", []);
		
		foreach ($results as $key => $value) {
			
			$layout[$value["desLayout"]] = $value["classLayout"];

		}

		return $layout;

	}

}

?>