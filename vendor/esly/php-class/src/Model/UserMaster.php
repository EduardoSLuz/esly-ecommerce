<?php

namespace Esly\Model;

use Esly\Model;
use Esly\Mailer;
use Esly\DB\Temp;
use Esly\Model\User;

class UserMaster extends Model {

	const SESSION = "USER-MASTER";

	public static function listUser($id = 0, $query = "", $param = [])
	{
		
		$conn = $id > 0 ? "AND " : "WHERE ";
		$query = !empty($query) ? $conn.$query : "";
		
		if($id > 0) 
		{
			$query = "WHERE idUser = :ID ".$query;
			$param = array_merge($param, [":ID" => $id]);
		}

		$sql = new Temp();

		$select = $sql->select("SELECT * FROM user $query", $param);

		return is_array($select) && count($select) > 0 ? $select : 0; 
		
	}
	
	public function login()
	{
		
		$user = UserMaster::listUser(0, "email = :EMAIL AND password = :PASS", [':EMAIL' => $this->getemail(), ':PASS' => UserMaster::cryptCode($this->getpass())]);

		if($user != 0 && count($user) == 1)
		{

			$_SESSION[UserMaster::SESSION] = ["email" => $user[0]['email'], "login" => true];

			if(isset($_SESSION[User::SESSION])) unset($_SESSION[User::SESSION]);

			$_SESSION[User::SESSION] = [
				"nameUser" => strstr($user[0]['email'], "@", true),
				"surnameUser" => "Master",
				"emailUser" => $user[0]['email'],
				"admin" => 2,
				"data" => 0
			];

		}

		return isset($_SESSION[UserMaster::SESSION]) && $_SESSION[UserMaster::SESSION]['login'] ? true : false;

	}

}

?>