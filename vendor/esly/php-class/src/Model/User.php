<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mailer;
use Esly\DB\Sql;

class User extends Model {

	const SESSION = "User";
	const COOKIE = "Cookie_User";
	const SUCCESS_MSG = "UserSuccessMsg";
	const ERROR_REGISTER = "UserErrorRegister";
	const SECRET = "EcommerceEslyPhp7_Secret";
	const SECRET_ESLY = "EcommerceEslyPhp_Secret_Esly";
	const LOGIN_FIELDS = "nameUser, surnameUser, emailUser";

    public static function setSuccessMsg($msg){
        
        $_SESSION[User::SUCCESS_MSG] = $msg;
    
    }

    public static function getSuccessMsg()
	{

		$msg = (isset($_SESSION[User::SUCCESS_MSG]) && $_SESSION[User::SUCCESS_MSG]) ? $_SESSION[User::SUCCESS_MSG] : '';

		User::clearSuccessMsg();

		return $msg;

	}

	public static function clearSuccessMsg()
	{

		$_SESSION[User::SUCCESS_MSG] = NULL;

	}

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

	public static function listAddress($id = 0)
	{	

		$array = [];
		$ct = 0;

		$param = [ ":EMAIL" => strtolower($_SESSION[User::SESSION]['emailUser']) ];

		$code = $id !== 0 ? "AND ad.idAddress = :CODE" : "";
		if($id !== 0) $param[':CODE'] = User::decryptCode($id); 

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ad.idAddress, ad.street, ad.number, ad.district, ad.cep, ad.complement, ad.reference, ad.mainAddress, ad.idCity, ct.nameCity, sts.nickState FROM address AS ad INNER JOIN city AS ct ON ad.idCity = ct.idCity INNER JOIN states AS sts ON ct.idState = sts.idState INNER JOIN user AS us ON ad.idUser = us.idUser WHERE us.emailUser = :EMAIL $code ORDER BY ad.idAddress DESC", $param);

		$array = $results;

		foreach ($results as $key => $value) {
			$ct += 1;
			$array[$key]['idAddress'] = User::cryptCode($value['idAddress']);
			$array[$key]['ID'] = $ct; 
		}

		return $results > 0 ? $array : false;

	}

	public static function deleteAddress($code)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("DELETE FROM address WHERE idAddress = :CODE", [
			":CODE" => User::decryptCode($code)
		]);

		return $results > 0 ? true : false;

	}

	public static function activeMainAddress($code, $num)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		if($num != 0)
		{
			$results = $sql->select("SELECT idUser FROM user WHERE emailUser = :CODE", [
				":CODE" => $_SESSION[User::SESSION]['emailUser']
			]);

			$sql->query("UPDATE address SET mainAddress = :ID WHERE IdUser = :CODE", [
				":ID" => 0,
				":CODE" => $results[0]['idUser']
			]);
		}

		$sql->query("UPDATE address SET mainAddress = :ID WHERE idAddress = :CODE", [
			":ID" => $num,
			":CODE" => User::decryptCode($code)
		]);

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

	public static function getPassword($password)
	{

		$code = password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

		$code = openssl_encrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return base64_encode($code);

	}

	public static function decryptPassword($pass)
	{

		$code = base64_decode($pass);

		$code = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return $code;

	}

	public static function cryptCode($code)
	{

		$code = openssl_encrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return base64_encode($code);

	}

	public static function decryptCode($code)
	{

		$code = base64_decode($code);

		$code = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_ESLY));

		return $code;

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

		$link = "http://www.ecommerce-astemac.com.br/loja-".$store."/login/forgot-password/reset/?code=$code";

		$mailer = new Mailer($email, $email, "Redefinir senha do Astemac Ecommerce", "Forgot", array(
			"name" => $data['nameUser'],
			"link" => $link
		));				

		$mailer->send();
		
	}

	public static function listAll()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT nameUser, surnameUser, cpfUser, dateBirthUser, genreUser, telephoneUser, whatsappUser FROM user WHERE emailUser = :EMAIL ", [
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

	public static function alterPass($pass)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("UPDATE user SET passUser = :PASS WHERE emailUser = :EMAIL", [
			":PASS" => User::getPassword($pass),
			":EMAIL" => $_SESSION[User::SESSION]['emailUser']
		]);

		return $results == 1 ? true : false;

	}

}

?>