<?php 

namespace Esly;

class Model {

	private $values = [];
	const SUCCESS_MSG = "SuccessMsg";
	const ERROR_REGISTER = "ErrorRegister";
	const SECRET = "EcommerceEslyPhp7_Secret";
	const SECRET_ESLY = "EcommerceEslyPhp_Secret_Esly";

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

	public static function setSuccessMsg($msg){
        
        $_SESSION[Model::SUCCESS_MSG] = $msg;
    
    }

    public static function getSuccessMsg()
	{

		$msg = (isset($_SESSION[Model::SUCCESS_MSG]) && $_SESSION[Model::SUCCESS_MSG]) ? $_SESSION[Model::SUCCESS_MSG] : '';

		Model::clearSuccessMsg();

		return $msg;

	}

	public static function clearSuccessMsg()
	{

		$_SESSION[Model::SUCCESS_MSG] = NULL;

	}

	public static function setErrorRegister($msg){
        
        $_SESSION[Model::ERROR_REGISTER] = $msg;
    
    }

    public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[Model::ERROR_REGISTER]) && $_SESSION[Model::ERROR_REGISTER]) ? $_SESSION[Model::ERROR_REGISTER] : '';

		Model::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[Model::ERROR_REGISTER] = NULL;

	}

	public function getValues()
	{

		return $this->values;

	}

	public static function setCookies($name, $value, $time = 0, $path = '/', $secure = false, $httponly = false ){

		setcookie($name, $value, $time, $path, $_SERVER['HTTP_HOST'], $secure, $httponly);

	}

	public static function getPassword($password)
	{

		$code = password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

		$code = openssl_encrypt($code, 'AES-128-CBC', pack("a16", Model::SECRET), 0, pack("a16", Model::SECRET_ESLY));

		return base64_encode($code);

	}

	public static function decryptPassword($pass)
	{

		$code = base64_decode($pass);

		$code = openssl_decrypt($code, 'AES-128-CBC', pack("a16", Model::SECRET), 0, pack("a16", Model::SECRET_ESLY));

		return $code;

	}

	public static function cryptCode($code)
	{

		$code = openssl_encrypt($code, 'AES-128-CBC', pack("a16", Model::SECRET), 0, pack("a16", Model::SECRET_ESLY));

		return base64_encode($code);

	}

	public static function decryptCode($code)
	{

		$code = base64_decode($code);

		$code = openssl_decrypt($code, 'AES-128-CBC', pack("a16", Model::SECRET), 0, pack("a16", Model::SECRET_ESLY));

		return $code;

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

	public static function decryptCep($code)
	{

		$code = substr($code, 0, 5).substr($code, 6);

		return $code;

	}

}

?>