<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mailer;
use Esly\DB\Sql;

class User extends Model {

	const SESSION = "User";
	const COOKIE = "Cookie_User";
	const LOGIN_FIELDS = "nameUser, surnameUser, emailUser, admin";

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

	public static function verifyUser($email, $id = 0)
	{	

		$code = $id > 0 && is_numeric($id) ? "AND idUser != :ID" : "";
		$param = $id > 0 && is_numeric($id) ? [":EMAIL"=>$email, ":ID" => intval($id)] : [":EMAIL"=>$email];  

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("SELECT emailUser FROM user WHERE emailUser = :EMAIL $code", $param);

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

		User::setCookies(User::COOKIE, "", time() + (60*60*24*30));

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

	public static function getDevice()
	{

		$device = substr(strstr(strstr($_SERVER["HTTP_USER_AGENT"], ')', true), '('), 1);

		return $device;

	}

	public static function saveDevice()
	{

		$sql = new Sql($_SESSION[Sql::DB]);
		
		$results = $sql->select("SELECT idUserDevice FROM user_device AS us_dv INNER JOIN user AS us ON us_dv.idUser = us.idUser WHERE us.emailUser = :EMAIL AND us_dv.device = :DEVICE", [
			":EMAIL" => $_SESSION[User::SESSION]['emailUser'],
			":DEVICE" => User::getDevice()
		]);

		if(count($results) > 0)
		{
			$sql->query("UPDATE user_device SET dateAccess = :DATE, timeAccess = :TIME WHERE idUserDevice = :ID", [
				":DATE" => date("Y-m-d"),
				":TIME" => date("H:i:s"),
				":ID" => $results[0]['idUserDevice']
			]);
		} else{
			
			$result = $sql->select("SELECT idUser FROM user WHERE emailUser = :EMAIL", [
				":EMAIL" => $_SESSION[User::SESSION]['emailUser']
			]);

			$sql->query("INSERT INTO user_device (idUser, device, dateAccess, timeAccess) VALUES (:ID, :DEVICE, :DATE, :TIME)", [
				":ID" => $result[0]['idUser'],
				":DEVICE" => User::getDevice(),
				":DATE" => date("Y-m-d"),
				":TIME" => date("H:i:s")
			]);

		}

	}

	public static function login($email, $pass)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ".User::LOGIN_FIELDS.", passUser, statusUser FROM user WHERE emailUser = :EMAIL", [
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

			if($data['statusUser'] == 0) $sql->query("UPDATE user SET statusUser = :ID WHERE emailUser = :EMAIL", [":ID" => 1, ":EMAIL" => $data['emailUser']]);

			unset($data['passUser']);
			unset($data['statusUser']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();
			User::saveDevice();
			
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
			User::saveDevice();
			
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

	public static function desactive()
	{

		if(!isset($_SESSION[User::SESSION]['emailUser']))
		{
			throw new \Exception("O SITE NÃO PODE EXECUTAR O QUE VOCÊ ESTA TENTANDO FAZER!");
			exit;	
		}

		$sql = new Sql($_SESSION[Sql::DB]);

		$sql->query("UPDATE user SET statusUser = :ID WHERE emailUser = :EMAIL", [
			":ID" => 0,
			":EMAIL" => $_SESSION[User::SESSION]['emailUser']
		]);

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

		$st = Store::listStores($store);

		$mailer = new Mailer($email, $data['nameUser'], "Redefinir Senha - ".utf8_decode($st[0]['nameStore'])." E-Commerce", "forgot", array(
			"name" => $data['nameUser'],
			"link" => $link,
			"store" => [
				"ID" => $st[0]['store'],
				"nameStore" => $st[0]['nameStore'],
				"nameBase" =>$_SESSION[Sql::DB]['directory'],
				"HTTP" => $_SERVER['HTTP_HOST'],
				"social" => Store::listInfoSocial()
			]
		), utf8_decode($st[0]['nameStore']));	
		
		$res = $mailer->send();
		
		return $res;
		
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

	public static function verifyCPF($code, $id = 0)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT emailUser, cpfUser FROM user WHERE cpfUser = :CODE AND idUser != :ID", [
			":CODE" => User::cryptCode(User::decryptCPF($code)),
			":ID" => $id != 0 ? intval($id) : User::getId()
		]);
		
		return count($results) > 0 ? true : false;

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

		$sql->query("INSERT INTO user (nameUser, emailUser, passUser, recoveryUser, statusUser, dateInsert, timeInsert) VALUES(:NAMEUSER, :EMAIL, :PASS, :CODE, :STATUS, :DTIN, :TMIN)", [
			":NAMEUSER" => User::nameSave($this->getemailUser()),
			":EMAIL" => strtolower($this->getemailUser()),
			":PASS" => User::getPassword($this->getpassUser()),
			":CODE" => User::getCodeRecovery($this->getemailUser()),
			":DTIN" => date("Y-m-d"),
			":TMIN" => date("H:i:s"),
			":STATUS" => 1
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
		} 

		return $results > 0 ? true : false;

	}

	public function updateUser()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->count("UPDATE user SET nameUser = :NAME, surnameUser = :SURNAME, emailUser = :EMAIL, telephoneUser = :TEL, whatsappUser = :WP, genreUser = :GENRE, cpfUser = :CPF, dateBirthUser = :BIRTH, admin = :ADM, statusUser = :STATUS WHERE idUser = :ID", [
			":NAME" => $this->getname(),
			":SURNAME" => $this->getsurname(),
			":EMAIL" => $this->getemail(),
			":TEL" => $this->gettelephone(),
			":WP" => $this->getwhatsapp(),
			":GENRE" => $this->getgenre(),
			":CPF" => $this->getcpf(),
			":BIRTH" => $this->getbirth(),
			":ADM" => $this->getadmin(),
			":STATUS" => $this->getstatus(),
			":ID" => $this->getidUser()
		]);

		return $select > 0 ? true : false;

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


	public static function getId()
	{

		$results = [];

		if(isset($_SESSION[User::SESSION]['emailUser']))
		{
			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->select("SELECT idUser FROM user WHERE emailUser = :EMAIL", [
				":EMAIL" => $_SESSION[User::SESSION]['emailUser']
			]);
		}
 
		return count($results) > 0 ? $results[0]['idUser'] : 0;

	}

	public static function getData()
	{

		$id = User::getId();
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT nameUser, surnameUser, emailUser, telephoneUser, whatsappUser, genreUser, cpfUser, dateBirthUser, statusUser  FROM user WHERE idUser = :ID", [
			":ID" => $id
		]);

		return count($results) == 1 ? $results : 0;

	}

	public static function listUsers($id = 0, $pm = [])
	{	

		$array = [];
		
		$code = $id > 0 ? "WHERE us.idUser = :ID": "WHERE us.admin = :ADMIN AND us.statusUser = :STATUS" ;
		$code = $code." AND us.admin != 2";

		if($id > 0)
		{
			$param[":ID"] = intval($id);
		} else {
			
			$param = [
				":ADMIN" => isset($pm[":ADMIN"]) ? $pm[":ADMIN"] : 0,
				":STATUS" => isset($pm[":STATUS"]) ? $pm[":STATUS"] : 1
			];

		}

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT DISTINCT us.idUser, us.nameUser, us.surnameUser, us.emailUser, us.telephoneUser, us.whatsappUser, us.genreUser, us.cpfUser, us.dateBirthUser, us.admin, us.statusUser FROM user AS us $code ORDER BY us.nameUser", $param);

		if(count($select) > 0)
		{
			foreach ($select as $key => $value) {
				$value['telephoneUser'] = User::decryptCode($value['telephoneUser']);
				$value['whatsappUser'] = User::decryptCode($value['whatsappUser']);
				$value['cpfUser'] = User::decryptCode($value['cpfUser']);

				if($id > 0)
				{

					$param = [
						":ID" => intval($value['idUser']),
						":STORE" => 0,
						":STATUS" => 0,
						":INI" => date("Y-m-01"),
						":FIN" => date("Y-m-d"),
					];
					$param = array_merge($param, $pm);

					if(isset($param[':STATUS']) && $param[':STATUS'] > 0)
					{
						$code = "AND ors_st.idOrderStatus = :STATUS";
					} else {
						$code = "";
						unset($param[':STATUS']);
					}
					
					// DEVICES
					$device = $sql->select("SELECT idUserDevice, device, dateAccess, timeAccess FROM user_device WHERE idUser = :ID", [
						":ID" => intval($value['idUser'])
					]);
						
					$value['devices'] = is_array($device) && count($device) > 0 ? $device : 0;

					// ADDRESS
					$address = $sql->select("SELECT idAddress, street, number, district, cep, complement, reference, mainAddress, codeCity, city, uf FROM address WHERE idUser = :ID", [
						":ID" => intval($value['idUser'])
					]);

					$value['address'] = is_array($address) && count($address) > 0 ? $address : 0;

					// ORDERS
					$order = $sql->select("SELECT ors.idOrder, ors.dateInsert, ors.timeInsert, ors.paid, ors.freight, ors.dateHorary, ors.timeInitial, ors.timeFinal, ors.total, ors_st.idOrderStatus, ors_st.descStatus FROM orders AS ors INNER JOIN orders_status AS ors_st ON ors.idOrderStatus = ors_st.idOrderStatus WHERE ors.idUser = :ID AND ors.idStore = :STORE AND ors.dateInsert >= :INI AND ors.dateInsert <= :FIN $code ORDER by ors.dateInsert", $param);  	

					$value['orders'] = is_array($order) && count($order) > 0 ? $order : 0; 

				} else if(isset($pm['desc']) && !empty($pm['desc']) && $id == 0){
					
					if(strstr(strtolower($value['nameUser']." ".$value['surnameUser']), $pm['desc']) != false) $array[count($array)] = $value;

					continue;
					
				}

				$array[$key] = $value;

			}
		}

		return count($array) > 0 ? $array : 0;

	}

	public static function listAllUsers($id = 0)
	{

		$array = [];
		$code = $id > 0 ? "WHERE idUser = :ID": "" ;
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT nameUser, surnameUser, emailUser, telephoneUser, whatsappUser, genreUser, cpfUser, dateBirthUser, admin, statusUser FROM user $code", $param);

		if(count($select) > 0)
		{
			foreach ($select as $key => $value) {
				$value['telephoneUser'] = User::decryptCode($value['telephoneUser']);
				$value['whatsappUser'] = User::decryptCode($value['whatsappUser']);
				$value['cpfUser'] = User::decryptCode($value['cpfUser']);

				$array[$key] = $value;
			}
		}

		return count($select) > 0 ? $array : 0;

	}

	public static function selectUser($store = 0, $query = "", $param = [])
	{

		$query = $store > 0 ? "WHERE idUser = :ID ".$query: $query ;
		$param = $store > 0 ? array_merge([":ID" => intval($store)], $param) : $param;

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idUser, dateInsert FROM user $query", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function verifyData()
	{

		$res = 0;
		$user = User::getData();

		if($user != 0)
		{
			$user = $user[0];

			if(empty($user['nameUser']) || empty($user['surnameUser']) || empty($user['cpfUser']) || empty($user['telephoneUser']) || empty($user['whatsappUser']) || empty($user['dateBirthUser']))
			{
				$res = 1;
			}

		}

		return $res == 1 ? true : false;

	}

}

?>