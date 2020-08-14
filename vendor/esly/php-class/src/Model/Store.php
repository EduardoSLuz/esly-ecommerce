<?php 

namespace Esly\Model;

use Esly\Model;
use Esly\DB\Sql;

class Store extends Model {

	public static function listAll($id = 0)
	{	
		
		$id > 0 ? $code = "AND st.idStore = :ID": $code = "" ; 	
		$code != '' ? $param = [":ST"=>1, ":ID" => intval($id)] : $param = [":ST"=>1];
		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT st.idStore, st.store, st.nameStore, st.cnpjStore, st.emailStore, st.telephoneStore, st.whatsappStore, st_ad.streetStore, st_ad.numberStore, st_ad.districtStore, st_ad.cepStore, st_ad.complementStore, ct.idCity, ct.nameCity, sts.nameState, sts.nickState FROM store AS st INNER JOIN store_address AS st_ad ON st.idStoreAddress = st_ad.idStoreAddress INNER JOIN city AS ct ON st_ad.idCity = ct.idCity INNER JOIN states AS sts ON ct.idState = sts.idState WHERE st.statusStore = :ST ".$code, $param);

		foreach ($results as $key => $value) {
			$array[$key] = $value;
			$array[$key]['horary'] = Store::listHorary($value['idStore'], 0);
		}
		
		return $array;
	}

	public static function listState()
	{
		$array = [];
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT distinct(sts.idState), sts.nameState FROM states AS sts INNER JOIN city AS ct ON sts.idState = ct.idState INNER JOIN store_address AS st_ad ON ct.idCity = st_ad.idCity ORDER BY sts.nameState", []);
		
		foreach ($results as $key => $value) {
			
			$array[$key] = [
				"idState" => $value['idState'],
				"nameState" => $value['nameState'],
				"city" => []
			];

			$res = $sql->select("SELECT ct.idCity, ct.nameCity FROM city AS ct INNER JOIN store_address AS st_ad ON ct.idCity = st_ad.idCity WHERE ct.idState = :CODE ORDER BY ct.nameCity", [
				":CODE" => $array[$key]['idState']
			]);

			$array[$key]['city'] = $res;

		}

		return $array;
	}

	/*
	public static function listState()
	{
		$array = [];
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idState, nameState FROM states ORDER BY nameState", []);
		
		foreach ($results as $key => $value) {
			
			$array[$key] = [
				"idState" => $value['idState'],
				"nameState" => $value['nameState'],
				"city" => []
			];

			$res = $sql->select("SELECT idCity, nameCity FROM city WHERE idState = :CODE ORDER BY nameCity", [
				":CODE" => $array[$key]['idState']
			]);

			$array[$key]['city'] = $res;

		}

		return $array;
	}
	*/

	public static function listRegion($id)
	{

		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->count("SELECT districtRegion FROM store_region WHERE idStore = :STORE", [
			":STORE" => intval($id)
		]);
		
		if($results > 0){
			
			$state = $sql->select("SELECT DISTINCT(sts.idState), sts.nameState FROM states AS sts INNER JOIN city AS ct ON sts.idState = ct.idState INNER JOIN store_region AS st_rg ON ct.idCity = st_rg.idCity WHERE st_rg.idStore = :STORE ORDER BY sts.nameState", [
				":STORE" => intval($id)
			]);
	
			foreach ($state as $kState => $vState) {
				
				$array[$kState] = $vState;
	
				$city = $sql->select("SELECT DISTINCT(ct.idCity), ct.nameCity FROM city AS ct INNER JOIN store_region AS st_rg ON ct.idCity = st_rg.idCity WHERE st_rg.idStore = :STORE AND ct.idState = :ST ORDER BY ct.nameCity", [
					":STORE" => intval($id),
					":ST" => $vState['idState']
				]);
	
				foreach ($city as $kCity => $vCity) {
	
					$array[$kState]['city'][$kCity] = $vCity;
					
					$region = $sql->select("SELECT districtRegion FROM store_region WHERE idStore = :STORE AND idCity = :CITY", [
						":STORE" => intval($id),
						":CITY" => $vCity['idCity']
					]);
	
					$array[$kState]['city'][$kCity]['regions'] = $region;
	
				}
	
			}

			return $array;

		} else {
			return 0;
		}

	}

	public static function listSocial($status = 1)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT nameSocial, linkSocial, iconSocial FROM social WHERE statusSocial = :ID ORDER BY nameSocial", [
			":ID" => $status
		]);

		return $results;

	}

	public static function listHorary($id = 0, $type = 1)
	{
		$array = [];
		$data = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT dayName, dayCode, timeInitial, timeFinal, timeInitial2, timeFinal2  FROM horary WHERE idStore = :ID ORDER BY dayCode", [
			":ID" => intval($id)
		]);
		
		if(count($results) > 0)
		{

			if($type == 1){

				return $results;

			} else {

				foreach ($results as $key => $value) {
				
					if(isset($data['timeInitial'])){
						
						$data['dayNameFinal'] = $value['dayName'];
						
						if($value['timeInitial'] == $data['timeInitial'] && $value['timeFinal'] == $data['timeFinal'] && $value['timeInitial2'] == $data['timeInitial2'] && $value['timeFinal2'] == $data['timeFinal2'])
						{
							
							$array[count($array) - 1]['dayNameFinal'] = $data['dayNameFinal'];
	
						} else{
							$data['status'] = 0;
							$array[count($array) - 1]['status'] = $data['status'];
						}
	
					} 
	
					if(isset($array[count($array) - 1]) && $array[count($array) - 1]['status'] == 0 || !isset($array[count($array) - 1]))
					{
						$data = $value;
						$data['status'] = 1;
						$array[count($array)] = $data;
					}
					
				}
	
				return $array;

			}

		} else {
			return 0;	
		}
		

	}

	public static function listDeliveryType($id)
	{

		$sql = new Sql($_SESSION[Sql::DB]);
		
		$results = $sql->select("SELECT distinct(dvt.idDeliveryType), dvt.nameType FROM delivery_type AS dvt INNER JOIN delivery_horary AS dvh ON dvt.idDeliveryType = dvh.idDeliveryType INNER JOIN horary AS hr ON dvh.idHorary = hr.idHorary WHERE hr.idStore = :STORE", [
			":STORE" => intval($id)
		]);

		return $results > 0 ? $results : false;

	}

	public static function listDeliveryHorary($id)
	{

		$array =[];

		$sql = new Sql($_SESSION[Sql::DB]);

		$type = Store::listDeliveryType($id);

		foreach ($type as $kType => $vType) {

			$array[$kType] = $vType;

			$results = $sql->select("SELECT dvh.timeHorary, dvh.timeHorary2, hr.idHorary, hr.dayName, hr.dayCode, hr.timeInitial, hr.timeFinal, hr.timeInitial2, hr.timeFinal2 FROM delivery_type AS dvt INNER JOIN delivery_horary AS dvh ON dvt.idDeliveryType = dvh.idDeliveryType INNER JOIN horary AS hr ON dvh.idHorary = hr.idHorary WHERE hr.idStore = :STORE ORDER BY hr.dayCode", [
				":STORE" => intval($id)
			]);

			$array[$kType]['horary'] = $results;

		}
		
		return $type > 0 ? $array : false;

	}

	public static function listInstitution($id)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT infoStore, allStore, partnerStore, helpStore, promotionStore, contactStore, workStore FROM store_institutional WHERE idStore = :ID", [
			":ID" => intval($id)
		]);

		return $results;

	}

	public static function listPayment($id)
	{
		
		$array = [0 => [], 1 => [], 2 => []];
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT namePayStore, linkPayStore, typePayStore FROM store_payment WHERE idStore = :ID", [
			":ID" => intval($id)
		]);

		foreach ($results as $key) {
			
			switch ($key['typePayStore']) {
				case 1:
					$array[0][count($array[0])] = $key;
				break;

				case 2:
					$array[1][count($array[1])] = $key;
				break;

				case 3:
					$array[2][count($array[2])] = $key;
				break;
			}

		}

		return $array;
		
	}

	public static function checkInstitutionalStore($id, $campo)
	{
		
		$results = Store::listInstitution($id);
			
		if($results[0][$campo] == 0)
		{

			throw new \Exception("Você não tem permissão para acessar o conteudo dessa pagina!");

		} else{
			return true;
		}

	}

	public static function listInfoStore($id)
	{

		if(Store::checkInstitutionalStore($id, "infoStore"))
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->select("SELECT textInfoStore FROM store_info", []);

			return $results;

		}

	}

	public static function listPartner()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT namePartnerStore, linkPartnerStore, srcPartnerStore FROM store_partner ORDER BY namePartnerStore", []);

		return $results;

	}

	public static function listHelp()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idStoreHelp, titleHelpStore, textHelpStore FROM store_help", []);

		return $results;

	}

	public static function listPromo()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idStorePromo, titlePromoStore, textPromoStore FROM store_promo", []);

		return $results;

	}

	public static function verifyStore($number)
	{

		if($number !== 0)
		{

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->count("SELECT store FROM store WHERE store = :STORE AND statusStore = :ST", [
				":STORE" => $number,
				":ST" => 1
			]);

			if($results === 0) header("Location: /");

		}

	}

}

?>