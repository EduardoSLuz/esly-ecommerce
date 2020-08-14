<?php 

namespace Esly;

class Model {

	private $values = [];

	public function __call($name, $args)
	{

		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

        switch ($method) {
        	
        	case "get":
        		return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
        	break;
        	
        	case "set":
        		$this->values[$fieldName] = $args[0];
        	break;
        }
	}

	public function setData($data = array())
	{
		
		foreach ($data as $key => $value) {

			$this->{"set".$key}($value);

		}

	}

	public function getValues()
	{

		return $this->values;

	}

	public static function setCookies($name, $value, $time = 0, $path = '/', $secure = false, $httponly = false ){

		setcookie($name, $value, $time, $path, $_SERVER['HTTP_HOST'], $secure, $httponly);

	}

	public static function decryptCPF($code)
	{

		$code = substr($code, 0, 3).substr($code, 4, 3).substr($code, 8, 3).substr($code, 12);

		return $code;

	}

	public static function decryptTel($code)
	{

		$code = substr($code, 1, 2).substr($code, 5, 5).substr($code, 11);

		return $code;

	}

}

?>