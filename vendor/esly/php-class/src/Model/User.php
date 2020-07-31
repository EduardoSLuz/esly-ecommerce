<?php

namespace Esly\Model;

use Esly\Model;
use Esly\DB\Sql;

class User extends Model {

	const SESSION = "User";
	const ERROR_REGISTER = "UserErrorRegister";
	const SECRET = "EcommerceEslyPhp7_Secret";
	const SECRET_ESLY = "EcommerceEslyPhp_Secret_Esly";

    public static function setErrorRegister($msg){
        
        $_SESSION[User::ERROR_REGISTER] = $msg;
    
    }

    public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;

	}

	public static function getRegisterValues()
	{

		if(isset($_SESSION['registerValues']))
		{	
			
			$data = $_SESSION['registerValues'];
			$_SESSION["registerValues"] = User::clearRegisterValues($_SESSION["registerValues"]);

		} else{
			$data = ["emailUser" => "" ];
		}

		return $data;

	}

	public static function clearRegisterValues($array)
	{
		
		foreach ($array as $key => $value) {
			$array[$key] = "";
		}
		
		return $array;

	}

	public static function reCaptcha($response)
	{
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array(
			"secret" => "6LevbfwUAAAAAKxIMdCzHnoB8Kygb_Hi9NrJ5GBf",
			"response"=> $response,
			"remoteip"=> $_SERVER["REMOTE_ADDR"]
		)));

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$recaptcha = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $recaptcha["success"];

	}

	public static function getPasswordHash($password)
	{

		$code = password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

		$code = openssl_encrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return base64_encode($code);

	}

	public static function decryptPasswordHash($pass)
	{

		$code = base64_decode($pass);

		$code = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return $code;

	}

	public static function verifyUser($email)
	{

		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->count("SELECT emailUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $email
		]);

		return $results === 0 ? true : false;

	}

	public static function saveLogin($email, $pass)
	{	

		$array = [
			"email" => $email,
			"code" => User::getPasswordHash($pass) 
		];

		$array = serialize($array);

		User::setCookies('Cookie_User', $array, time() + (60*60*24*30));

	}

	public static function login($email, $pass)
	{

		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->select("SELECT emailUser, passUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => strtolower($email)
		]);

		if (count($results) === 0)
		{
			return "Email inválido ou não existe!";
		}

		$data = $results[0];

		if (password_verify($pass, User::decryptPasswordHash($data['passUser'])) === true)
		{

			$user = new User();

			$data['passUser'] = "@";

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return true;

		} else {
			
			return "Senha inválida ou não existe!";

		}

	}

	public function save(){

		$sql = new Sql($_SESSION["DB"]);

		$sql->query("INSERT INTO user VALUES(NULL, :EMAIL, :PASS)", [
			":EMAIL" => strtolower($this->getemailUser()),
			":PASS" => User::getPasswordHash($this->getpassUser())
		]);

		$results = $sql->count("SELECT emailUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $this->getemailUser()
		]);

		return $results === 1 ? true : false;

	}

}

?>