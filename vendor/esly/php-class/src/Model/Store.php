<?php 

namespace Esly\Model;

use Esly\Model;
use Esly\DB\Sql;

class Store extends Model {

	public static function listAll(){
		
		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->select("SELECT * FROM store AS st INNER JOIN store_address AS st_ad ON st.idStoreAddress = st_ad.idStoreAddress", []);

		return $results;
	}
	
	public static function listAllCity(){
		
		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->select("SELECT DISTINCT cityStoreAddress, stateStoreAddress, idStoreAddress FROM store_address ORDER BY stateStoreAddress, cityStoreAddress", []);

		return $results;
	}

	public static function listSocial($store){
		
		if ($store == 0) $store = "01";

		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->select("SELECT nameStore, cnpjStore, instagramStore, facebookStore, twitterStore, youtubeStore FROM store WHERE store = :STORE", [
			":STORE" => $store
		]);

		return $results[0];

	}

	public static function verifyStore($number){

		$sql = new Sql($_SESSION["DB"]);

		$results = $sql->count("SELECT store FROM store WHERE store = :STORE", [
			":STORE" => $number
		]);

		if($results === 0) header("Location: /");

	}

}

?>