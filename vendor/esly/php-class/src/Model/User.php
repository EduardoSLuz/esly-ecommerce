<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mailer;
use Esly\DB\Sql;

class User extends Model {

	const SESSION = "User";
	const COOKIE = "Cookie_User";
	const LOGIN_FIELDS = "nameUser, surnameUser, emailUser";

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

	public static function verifyUser($email)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("SELECT emailUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $email
		]);

		return $results === 0 ? true : false;

	}

	public static function saveLogin($email)
	{	
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $email
		]);

		$array = [
			"code" => User::cryptCode($results[0]['idUser'])
		];

		$array = serialize($array);

		User::setCookies(User::COOKIE, $array, time() + (60*60*24*30));

	}

	public static function checkLogin($store = 0)
	{

		if(isset($_COOKIE[User::COOKIE]) && !isset($_SESSION[User::SESSION]) && isset($_SESSION[Sql::DB]))
		{

			$data = unserialize($_COOKIE[User::COOKIE]);

			User::loginCode($data['code']);

		}

		if(isset($_SESSION[User::SESSION]))
		{
			
			if($store == 1)
			{
				header("Location: /loja-".$store."/");
				exit;
			} 

			$_SESSION[User::SESSION]['login'] = true;

			return true;		
		
		} else{

			if($store == 2)
			{
				header("Location: /loja-".$store."/");
				exit;
			}

			return false;
		
		}

	}

	public static function login($email, $pass)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ".User::LOGIN_FIELDS.", passUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => strtolower($email)
		]);

		if (count($results) === 0)
		{
			return "Email inválido ou não existe!";
		}

		$data = $results[0];

		if (password_verify($pass, User::decryptPassword($data['passUser'])) === true)
		{

			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return true;

		} else {
			
			return "Senha inválida ou não existe!";

		}

	}

	public static function loginCode($code)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ".User::LOGIN_FIELDS." FROM user WHERE idUser = :ID", [
			":ID" => User::decryptCode($code)
		]);

		if(count($results) === 1)
		{

			$user = new User();

			$data = $results[0];

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();
			
			return true;
		
		} else{

			return false;

		}

	}

	public static function refreshLogin()
	{
		
		if(isset($_SESSION[User::SESSION])){

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->select("SELECT ".User::LOGIN_FIELDS." FROM user WHERE emailUser = :EMAIL", [
				":EMAIL" => $_SESSION[User::SESSION]['emailUser']
			]);

			if(count($results) == 1)
			{

				$user = new User();

				$user->setData($results[0]);

				$_SESSION[User::SESSION] = $user->getValues();

			}

		}

	}

	public static function getCodeRecovery($code)
	{

		return $code = User::getPassword($code.date("d-Y-m TH:i:s"));	

	}

	public static function getForgot($email, $store)
	{
		$email = strtolower($email);
		$sql = new Sql($_SESSION[Sql::DB]);
		
		$results = $sql->select("SELECT nameUser, recoveryUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $email
		]);

		if(count($results) === 0){

			throw new \Exception("Não foi possível recuperar a senha, e-mail inválido.");

		}	

		$data = $results[0];

		$code = serialize($data['recoveryUser']);

		$link = "http://".$_SERVER['HTTP_HOST']."/loja-".$store."/login/forgot-password/reset/?code=$code";

		$st = Store::listAll($store);

		$mailer = new Mailer($email, $data['nameUser'], "Redefinir senha no ".$st[0]['nameStore']." E-Commerce", "forgot", array(
			"name" => $data['nameUser'],
			"link" => $link,
			"store" => [
				"nameStore" => $st[0]['nameStore'],
				"nameBase" => strstr($_SESSION[Sql::DB]['db_name'], '-', true),
				"HTTP" => $_SERVER['HTTP_HOST'],
				"social" => Store::listSocial()
			]
		));				

		$mailer->send();
		
	}

	public static function listAll()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idUser, nameUser, surnameUser, cpfUser, dateBirthUser, genreUser, telephoneUser, whatsappUser FROM user WHERE emailUser = :EMAIL ", [
			":EMAIL" => $_SESSION[User::SESSION]['emailUser']
		]);

		if(count($results) === 1)
		{
			$data = $results[0];
			
			$data['cpfUser'] = User::decryptCode($data['cpfUser']);
			$data['telephoneUser'] = User::decryptCode($data['telephoneUser']);
			$data['whatsappUser'] = User::decryptCode($data['whatsappUser']);

			return $data;
		}

	}

	public static function verifyCPF($code)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT emailUser, cpfUser FROM user WHERE cpfUser = :CODE ", [
			":CODE" => User::cryptCode(User::decryptCPF($code))
		]);
		
		return count($results) > 0 && $results[0]['emailUser'] != $_SESSION[User::SESSION]['emailUser']  ? true : false;

	}

	public static function verifyPass($pass)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT passUser FROM user WHERE emailUser = :EMAIL ", [
			":EMAIL" => $_SESSION[User::SESSION]['emailUser']
		]);

		if(count($results) == 1)
		{
			$data = $results[0];

			return password_verify($pass, User::decryptPassword($data['passUser'])) === true ? true : false; 

		}

	}

	public static function removeNumber($string)
	{

		return preg_replace("/[!0-9]/", "", $string);

	}

	public static function nameSave($name)
	{

		$name = substr(ucwords(strtolower(strstr($name, "@", true))), 0, 9);

		return $name;

	}

	public function save(){

		$sql = new Sql($_SESSION[Sql::DB]);

		$sql->query("INSERT INTO user (nameUser, emailUser, passUser, recoveryUser) VALUES(:NAMEUSER, :EMAIL, :PASS, :CODE)", [
			":NAMEUSER" => User::nameSave($this->getemailUser()),
			":EMAIL" => strtolower($this->getemailUser()),
			":PASS" => User::getPassword($this->getpassUser()),
			":CODE" => User::getCodeRecovery($this->getemailUser())
		]);

		$results = $sql->count("SELECT emailUser FROM user WHERE emailUser = :EMAIL", [
			":EMAIL" => $this->getemailUser()
		]);

		return $results === 1 ? true : false;

	}

	public function update()
	{	

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE user SET nameUser = :NAMEUSER, surnameUser = :SURNAME, telephoneUser = :TEL, whatsappUser = :WP, genreUser = :GENRE, cpfUser = :CODE, dateBirthUser = :DATEBIRTH WHERE emailUser = :EMAIL", [
			":NAMEUSER" => ucfirst(strtolower(strstr($this->getnameUser(), " ", true))),
			":SURNAME" => ucwords(strtolower(substr(strstr($this->getnameUser(), " "), 1))),
			":TEL" => $this->gettelUser() != '' ? User::cryptCode(User::decryptTel($this->gettelUser())) : '',
			":WP" => $this->getwpUser() != '' ? User::cryptCode(User::decryptTel($this->getwpUser())) : '',
			":GENRE" => $this->getgenreUser(),	
			":CODE" => $this->getcpfUser() != '' ? User::cryptCode(User::decryptCPF($this->getcpfUser())) : '',
			":DATEBIRTH" => $this->getdateBirthUser(),
			":EMAIL" => $this->getemailUser()
		]);

		if($results > 0)
		{

			User::refreshLogin();
			User::setSuccessMsg("Dados atualizados com sucesso!");

		} else{
			User::setErrorRegister("Não a nada a ser atualizado!");
		}

	}

	public static function alterPass($pass, $type = 0)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		if($type === 0)
		{	

			$results = $sql->count("UPDATE user SET passUser = :PASS WHERE emailUser = :EMAIL", [
				":PASS" => User::getPassword($pass),
				":EMAIL" => isset($_SESSION[User::SESSION]['emailUser']) ? $_SESSION[User::SESSION]['emailUser'] : 0
			]);

		} else{
			$results = $sql->count("UPDATE user SET passUser = :PASS, recoveryUser = :CODE WHERE emailUser = :EMAIL", [
				":PASS" => User::getPassword($pass),
				":CODE" => User::getCodeRecovery($type),
				":EMAIL" => $type
			]);
		}

		return $results == 1 ? true : false;

	}

	public static function checkRecovery($code)
	{

		$code = unserialize($code);

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT emailUser FROM user WHERE recoveryUser = :CODE", [
			":CODE" => $code
		]);

		if(count($results) == 1){
			$_SESSION['forgot'] = ['emailUser' => $results[0]['emailUser']];
		}

		return count($results) == 1 ? true : false;

	}

}

?>