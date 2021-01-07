<?php 

namespace Esly\Model;

use Esly\Model;
use Esly\DB\Sql;
use Esly\Model\Cart;

class Store extends Model {

	const SIGN = "eslyecommerce_by_eduardosluz";

	public static function listAll($id = 0)
	{	
		
		$id > 0 ? $code = "AND st.idStore = :ID": $code = "" ; 	
		$code != '' ? $param = [":ST"=>1, ":ID" => intval($id)] : $param = [":ST"=>1];
		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT st.idStore, st.store, st.nameStore, st.cnpjStore, st.emailStore, st.telephoneStore, st.whatsappStore, st.statusStore, st_ad.idStoreAddress, st_ad.streetStore, st_ad.numberStore, st_ad.districtStore, st_ad.cepStore, st_ad.complementStore FROM store AS st INNER JOIN store_address AS st_ad WHERE st.statusStore = :ST ".$code, $param);

		foreach ($results as $key => $value) {
			$array[$key] = $value;
			$array[$key]['cnpjStore'] = Store::decryptCode($value['cnpjStore']);
			$array[$key]['telephoneStore'] = Store::decryptCode($value['telephoneStore']);
			$array[$key]['whatsappStore'] = Store::decryptCode($value['whatsappStore']);
			$array[$key]['horary'] = Store::listHorary($value['idStore'], 0);
		}
		
		return $array;
	}

	public static function listStores($id = 0)
	{	
		
		$code = $id > 0 ? "WHERE st.idStore = :ID": "" ;
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT st.idStore, st.store, st.nameStore, st.cnpjStore, st.emailStore, st.telephoneStore, st.whatsappStore, st.statusStore, st_ad.idStoreAddress, st_ad.streetStore, st_ad.numberStore, st_ad.districtStore, st_ad.cepStore, st_ad.complementStore, st_ad.codeCity, st_ad.city, st_ad.uf FROM store AS st INNER JOIN store_address AS st_ad ON st.idStore = st_ad.idStore $code", $param);

		if(is_array($select) && count($select) > 0)
		{
			
			foreach ($select as $key => $value) {
				$array[$key] = $value;
				$array[$key]['cnpjStore'] = Store::decryptCode($value['cnpjStore']);
				$array[$key]['telephoneStore'] = Store::decryptCode($value['telephoneStore']);
				$array[$key]['whatsappStore'] = Store::decryptCode($value['whatsappStore']);
				$array[$key]['horary'] = Store::listHorary($value['idStore']);
				$array[$key]['src'] = "/resources/clients/".$_SESSION[Sql::DB]['directory']."/stores/loja-".$array[$key]['store']."/";
			}

		}
		
		return is_array($array) && count($array) > 0 ? $array : 0;
	}

	public static function countStores()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idStore, store FROM store WHERE statusStore = :STATUS", [":STATUS" => 1]);

		return is_array($select) && count($select) > 0 ? $select : 0;

	}

	public static function listCityStore($id = 0)
	{

		$stores = Store::listStores($id);
		$array = [];

		if($stores != 0)
		{

			$data = [];

			foreach ($stores as $key => $value) {
				
				if($value['statusStore'])
				{
					$data[$key] = [
						"code" => $value['codeCity'],
						"cep" => $value['cepStore'],
						"details" => $value['codeCity'] != 0 ? Store::listCities($value['codeCity'])[0] : 0
					]; 
				}

			}

			if(count($data) > 0)
			{
				sort($data);

				foreach ($data as $key => $value) {
					
					if($value["code"] != 0)
					{
						
						if(!isset($array[strstr($value['code'], "_", true)])) $array[strstr($value['code'], "_", true)] = [
							"uf" => $value['details']['sigla'],
							"state" => $value['details']['nome'],
							"city" => []
						];

						if(!isset($array[strstr($value['code'], "_", true)]['city'][substr(strstr($value['code'], "_"), 1)])) $array[strstr($value['code'], "_", true)]['city'][substr(strstr($value['code'], "_"), 1)] = $value["details"]["cidades"][0];

					}
					
				}

				ksort($array);
			}

		}

		return is_array($array) && count($array) > 0 ?  $array : 0;

	}

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

	public static function listHorary($id = 0)
	{
		$array = [];
		$data = [];

		$horary = Store::listHoraryStore($id);

		if(is_array($horary) && count($horary) > 0)
		{

			foreach ($horary[0]['details'] as $key => $value) {
				
				if(isset($data['horary'][0]['init'])){
					
					$data['dayNameFinal'] = $value['name'];
					
					if($value['horary'][0]['init'] == $data['horary'][0]['init'] && $value['horary'][0]['final'] == $data['horary'][0]['final'] && $value['horary'][1]['init'] == $data['horary'][1]['init'] && $value['horary'][1]['final'] == $data['horary'][1]['final'])
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

		}
		
		return is_array($array) && count($array) > 0 ? $array : 0;

	}

	public static function listDeliveryType($id)
	{

		$sql = new Sql($_SESSION[Sql::DB]);
		
		$results = $sql->select("SELECT distinct(dvt.idDeliveryType), dvt.nameType FROM delivery_type AS dvt INNER JOIN delivery_horary AS dvh ON dvt.idDeliveryType = dvh.idDeliveryType INNER JOIN horary AS hr ON dvh.idHorary = hr.idHorary WHERE hr.idStore = :STORE", [
			":STORE" => intval($id)
		]);

		return $results > 0 ? $results : false;

	}

	public static function listInstitution($id = 0)
	{

		$query = $id > 0 ? "WHERE ly_in.idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT ly_in.lyInfo1, ly_in.lyInfo2, ly_in.lyInfo3, ly_in.lyInfo4, ly_in.lyInfo5, ly_in.lyInfo6, ly_in.lyInfo7, st.store FROM layout_info AS ly_in INNER JOIN store AS st ON ly_in.idStore = st.idStore $query", $param);

		return is_array($results) && count($results) > 0 ? $results : 0;

	}

	public static function listPayment($id = 0)
	{
		
		$query = $id > 0 ? "WHERE py.idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$array = [];
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT py.idPayment, py.idStore, py.description, py.type, py_tp.idPaymentType, py_tp.name, py_tp.src FROM payment AS py INNER JOIN payment_type AS py_tp ON py.idPaymentType = py_tp.idPaymentType $query", $param);

		if(is_array($results) && count($results) > 0)
		{

			foreach ($results as $key => $value) {

				if(!isset($array[$value['idStore']])) $array[$value['idStore']] = [ 
					0 => [
						"name" => "Por Retirada",
						"types" => []
					],
					1 => [
						"name" => "Por Entrega",
						"types" => []
					],
					2 => [
						"name" => "No Site",
						"types" => []
					],
				];

				switch ($value['type']) {
					case 1:
						$array[$value['idStore']][0]["types"][count($array[$value['idStore']][0]["types"])] = [
							"pay" => $value['name'],
							"desc" => $value['description'],
							"archive" => $value['src'],
							"src" => "/resources/imgs/cards-payment/".$value['src']
						];
					break;
	
					case 2:
						$array[$value['idStore']][1]["types"][count($array[$value['idStore']][1]["types"])] = [
							"pay" => $value['name'],
							"desc" => $value['description'],
							"archive" => $value['src'],
							"src" => "/resources/imgs/cards-payment/".$value['src']
						];
					break;
	
					case 3:
						$array[$value['idStore']][2]["types"][count($array[$value['idStore']][2]["types"])] = [
							"pay" => $value['name'],
							"desc" => $value['description'],
							"archive" => $value['src'],
							"src" => "/resources/imgs/cards-payment/".$value['src']
						];
					break;
				}

			}

			sort($array);

		}

		return is_array($array) && count($array) > 0 ? $array : 0;
		
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

		if(Store::checkInstitutionalStore($id, "lyInfo1"))
		{

			$array = [];

			$sql = new Sql($_SESSION[Sql::DB]);

			$results = $sql->select("SELECT textInfoStore FROM store_info WHERE idStore = :ID", [
				":ID" => intval($id)
			]);

			$array = count($results) > 0 ? explode("&#013;", $results[0]['textInfoStore']) : 0; 

			return $array;

		}

	}

	public static function listHelp($id)
	{
		$query = $id > 0 ? "WHERE idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idStoreHelp, titleHelpStore, textHelpStore FROM store_help ".$query."ORDER BY idStore, idStoreHelp", $param);

		return count($results) > 0 ? $results : 0;

	}

	public static function listEmailPromo($query, $param)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT email, dateInsert, timeInsert FROM promotions_email $query", $param);

		return is_array($results) && count($results) > 0 ? $results : 0;

	}

	public function saveEmailPromo()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$save = $sql->count("INSERT INTO promotions_email (idPromoEmail, email, dateInsert, timeInsert) VALUES (:ID, :EMAIL, :DTIN, :TMIN)", [
			":ID" => NULL,
			":EMAIL" => $this->getemail(),
			":DTIN" => date("Y-m-d"),
			":TMIN" => date("H:i:s")
		]);

		return $save > 0 ? true : false;

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

			if($results === 0) {
				header("Location: /");
				exit;
			}

		}

	}

	public static function listImgsPromo($id)
	{

		$array = [];
		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT src, link FROM store_imgs WHERE type = :TYPE AND idStore = :STORE",[
			":TYPE" => "promo",
			":STORE" => intval($id)
		]);

		if(count($results) > 0)
		{
			foreach($results as $kRes => $vRes){

				if(file_exists($vRes['src']))
				{
					$array[count($array)] = $vRes;
				}

			}
		} else{
			$array[count($array)] = [
				"src" => "resources/clients/astemac/stores/loja-01/imgs/index.png",
				"link" => "/loja-$id/"
			];
		}

		return $array;		

	}

	// ADMIN 
	public static function checkAdmin($id = 0)
	{
		if(!isset($_SESSION[User::SESSION]) || isset($_SESSION[User::SESSION]) && $_SESSION[User::SESSION]['admin'] < 1 || $id != 0 && strlen($id) < 2)
		{
			header("Location: /");
		}

		if(intval($id) > 0)
		{
			Store::checkStoreAdmin($id);
		}
	}
	
	public static function checkStoreAdmin($id)
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->count("SELECT idStore FROM store WHERE idStore = :ID", [
			":ID" => intval($id)
		]);
		
		if($select < 1)
		{
			header("Location: /");
			//throw new \Exception("Access Denied");
		}

	}

	public function updateRegister()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE store SET nameStore = :NAME, cnpjStore = :CNPJ, emailStore = :EMAIL, telephoneStore = :TEL, whatsappStore = :WP, statusStore = :STATUS WHERE idStore = :ID", [
			"NAME" => $this->getname(),
			"CNPJ" => !empty($this->getcnpj()) ? Store::cryptCode(Store::decryptCnpj($this->getcnpj())) : "",
			"EMAIL" => $this->getemail(),
			"TEL" => !empty($this->gettel()) ? Store::cryptCode(Store::decryptTel($this->gettel())) : "",
			"WP" => !empty($this->getwp()) ? Store::cryptCode(Store::decryptTel($this->getwp())) : "",
			"STATUS" => intval($this->getstatus()),
			"ID" => intval($this->getid())
		]);

		return $update == 1 ? true : false;

	}

	public function updateRegisterAddress()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE store_address SET streetStore = :STREET, numberStore = :NUM, districtStore = :DIS, cepStore = :CEP, complementStore = :COM, codeCity = :COD, city = :CITY, uf = :UF WHERE idStoreAddress = :ID", [
			"STREET" => $this->getstreet(),
			"NUM" => $this->getnumber(),
			"DIS" => $this->getdistrict(),
			"CEP" => !empty($this->getcep()) ? Store::decryptCep($this->getcep()) : "",
			"COM" => $this->getcomplement(),
			"COD" => $this->getcodeCity(),
			"CITY" => $this->getcity(),
			"UF" => $this->getuf(),
			"ID" => intval($this->getidAddress())
		]);

		return $update == 1 ? true : false;

	}

	public function updateInfoStore()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE store_info SET textInfoStore = :TEXT WHERE idStore = :ID", [
			":TEXT" => Store::decryptLineBreak($this->gettext()),
			":ID" => intval($this->getid())
		]);

		return $update == 1 ? true : false;

	}

	public function updateInfoHelp()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE store_help SET titleHelpStore = :TITLE, textHelpStore = :TEXT WHERE idStoreHelp = :ID", [
			":TITLE" => $this->gettitle(),
			":TEXT" => Store::decryptLineBreak($this->getdesc()),
			":ID" => intval($this->getidHelp())
		]);

		return $update == 1 ? true : false;

	}

	public function saveInfoHelp()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO store_help VALUES (NULL, :ID, :TITLE, :TEXT)", [
			":ID" => intval($this->getid()),
			":TITLE" => $this->gettitle(),
			":TEXT" => Store::decryptLineBreak($this->getdesc())
		]);

		return $insert == 1 ? true : false;

	}

	public function deleteInfoHelp()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM store_help WHERE idStoreHelp = :HELP AND idStore = :ID", [
			":HELP" => intval($this->getidHelp()),
			":ID" => intval($this->getid()),
		]);

		return $delete == 1 ? true : false;

	}

	public function updateInfoPromo()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE promotions SET idPromoType = :TYPE, title = :TITLE, description = :TEXT, code = :CODE, value = :VAL, valueType = :VALTYPE WHERE idPromo = :ID AND idStore = :STORE", [
			":TYPE" => $this->getidPromoType(),
			":TITLE" => $this->gettitle(),
			":TEXT" => Store::decryptLineBreak($this->getdesc()),
			":CODE" => $this->getcode(),
			":VAL" => floatval($this->getvalue()),
			":VALTYPE" => intval($this->getvalueType()),
			":ID" => intval($this->getidPromo()),
			":STORE" => intval($this->getid())
		]);
		
		return $update == 1 ? true : false;

	}

	public function saveInfoPromo()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO promotions VALUES (NULL, :TYPE, :STORE, :TITLE, :TEXT, :CODE, :VAL, :VALTYPE)", [
			":TYPE" => $this->getidPromoType(),
			":STORE" => intval($this->getid()),
			":TITLE" => $this->gettitle(),
			":TEXT" => Store::decryptLineBreak($this->getdesc()),
			":CODE" => $this->getcode(),
			":VAL" => floatval($this->getvalue()),
			":VALTYPE" => intval($this->getvalueType())
		]);

		return $insert == 1 ? true : false;

	}
	
	public function deleteInfoPromo()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM promotions WHERE idPromo = :PROMO AND idStore = :ID", [
			":PROMO" => intval($this->getidPromo()),
			":ID" => intval($this->getid()),
		]);

		return $delete == 1 ? true : false;

	}

	public function updateInfoPartner()
	{

		$param = [
			":NAME" => $this->getname(),
			":LINK" => $this->getlink(),
			":IDPAR" => intval($this->getidPartner()),
			":ID" => intval($this->getid())
		];
		$query = !empty($this->getfile()) ? ", file = :FILE" : "";
		
		if(!empty($this->getfile())) $param[":FILE"] = $this->getfile();

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE partners SET name = :NAME, link = :LINK".$query." WHERE idPartner = :IDPAR AND idStore = :ID", $param);
		
		return $update == 1 ? true : false;

	}

	public function saveInfoPartner()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO partners VALUES (NULL, :ID, :NAME, :LINK, :FILE)", [
			":ID" => intval($this->getid()),
			":NAME" => $this->getname(),
			":LINK" => strtolower($this->getlink()),
			":FILE" => $this->getfile(),
		]);

		return $insert == 1 ? true : false;

	}

	public function deleteInfoPartner()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM partners WHERE idPartner = :PAR AND idStore = :ID", [
			":PAR" => intval($this->getidPartner()),
			":ID" => intval($this->getid()),
		]);

		return $delete == 1 ? true : false;

	}

	public function updateInfoSocial()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE social SET idSocialType = :TYPE, link = :LINK WHERE idSocial = :SOCIAL AND idStore = :ID", [
			":TYPE" => intval($this->gettype()), 
			":LINK" => strtolower($this->getlink()), 
			":SOCIAL" => intval($this->getidSocial()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function saveInfoSocial()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO social VALUES (NULL, :TYPE, :ID, :LINK)", [
			":TYPE" => intval($this->gettype()),
			":ID" => intval($this->getid()),
			":LINK" => strtolower($this->getlink())
		]);

		return $insert == 1 ? true : false;

	}

	public function deleteInfoSocial()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM social WHERE idSocial = :SOCIAL AND idStore = :ID", [
			":SOCIAL" => intval($this->getidSocial()),
			":ID" => intval($this->getid()),
		]);

		return $delete == 1 ? true : false;

	}

	public function updatePayOption()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE payment SET idPaymentType = :PAY, description = :DESC, type = :TYPE WHERE idPayment = :PAYMENT AND idStore = :ID", [
			":PAY" => intval($this->getpay()), 
			":DESC" => Store::decryptLineBreak($this->getdesc()), 
			":TYPE" => intval($this->gettype()), 
			":PAYMENT" => intval($this->getidPay()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function savePayOption()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO payment VALUES (NULL, :PAY, :ID, :DESC, :TYPE)", [
			":PAY" => intval($this->getpay()), 
			":ID" => intval($this->getid()), 
			":DESC" => Store::decryptLineBreak($this->getdesc()), 
			":TYPE" => intval($this->gettype()), 
		]);

		return $insert == 1 ? true : false;

	}

	public function deletePayOption()
	{
		
		$sql = new Sql($_SESSION[Sql::DB]);

		$delete = $sql->count("DELETE FROM payment WHERE idPayment = :PAY AND idStore = :ID", [
			":PAY" => intval($this->getidPay()),
			":ID" => intval($this->getid()),
		]);

		return $delete == 1 ? true : false;

	}

	public function updateLayoutHeader()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE layout_header SET description = :DESC, departament = :DEP, link = :LINK, type = :TYPE, status = :STATUS WHERE idLayoutHeader = :LAYOUT AND idStore = :ID", [
			":DESC" => $this->getdesc(), 
			":DEP" => $this->getdep(), 
			":LINK" => $this->getlink(), 
			":TYPE" => intval($this->gettype()), 
			":STATUS" => intval($this->getstatus()), 
			":LAYOUT" => intval($this->getidLayoutHeader()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function updateLayoutInfo()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE layout_info SET ".$this->getly()." = :LY WHERE idLayoutInfo = :LAYOUT AND idStore = :ID", [
			":LY" => $this->getck(), 
			":LAYOUT" => intval($this->getidLayoutInfo()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function updateLayoutFooter()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE layout_footer SET ".$this->getly()." = :LY WHERE idLayoutFooter = :LAYOUT AND idStore = :ID", [
			":LY" => $this->getck(), 
			":LAYOUT" => intval($this->getidLayoutFooter()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function updateLayoutColor()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE layout_color SET options = :OPTS, theme = :THEME WHERE idLayoutColor = :LAYOUT AND idStore = :ID", [
			":OPTS" => json_encode($this->getoptions()), 
			":LAYOUT" => intval($this->getidLayoutColor()), 
			":THEME" => intval($this->getthemeColor()), 
			":ID" => intval($this->getid()), 
		]);
		
		return $update == 1 ? true : false;

	}

	public function updateFreight()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE freight SET codeCity = :CODE, district = :DIS, cep = :CEP, city = :CITY, uf = :UF, onlyCity = :ONLY, details = :DET WHERE idFreight = :FREIGHT AND idStore = :ID", [
			":CODE" => $this->getcodeCity(), 
			":DIS" => $this->getdistrict(), 
			":CEP" => $this->getcep(), 
			":CITY" => $this->getcity(), 
			":UF" => $this->getuf(), 
			":ONLY" => intval($this->getonly()), 
			":DET" => json_encode($this->getdetails()), 
			":FREIGHT" => intval($this->getidFreight()), 
			":ID" => intval($this->getid())
		]);
		
		return $update == 1 ? true : false;

	}

	public function saveFreight()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("INSERT INTO freight VALUES (NULL, :ID, :CODE, :DIS, :CEP, :CITY, :UF, :ONLY, :DET)", [
			":ID" => intval($this->getid()),
			":CODE" => $this->getcodeCity(), 
			":DIS" => $this->getdistrict(), 
			":CEP" => $this->getcep(), 
			":CITY" => $this->getcity(), 
			":UF" => $this->getuf(), 
			":ONLY" => intval($this->getonly()), 
			":DET" => json_encode($this->getdetails())
		]);
		
		return $insert == 1 ? true : false;

	}

	public function deleteFreight()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$insert = $sql->count("DELETE FROM freight WHERE idFreight = :FREIGHT AND idStore = :ID", [
			":ID" => intval($this->getid()),
			":FREIGHT" => intval($this->getidFreight())
		]);
		
		return $insert == 1 ? true : false;

	}

	public function updateHorary()
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$update = $sql->count("UPDATE horary_prime SET details = :DET WHERE idHorary = :HORARY AND idStore = :ID", [
			":DET" => json_encode($this->getdetails()), 
			":HORARY" => intval($this->getidHorary()), 
			":ID" => intval($this->getid())
		]);
		
		return $update == 1 ? true : false;

	}

	public static function searchCity($city, $uf)
	{

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT ct.idCity FROM city AS ct INNER JOIN states AS sts ON ct.idState = sts.idState WHERE ct.nameCity=:CITY AND sts.nickState = :NICK", [
			":CITY" => $city,
			":NICK" => $uf
		]);

		return count($select) == 1 ? $select : 0;	

	}

	public static function listInfoAdmin($id = 0)
	{

		$query = $id > 0 ? "WHERE idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT textInfoStore FROM store_info ".$query."ORDER BY idStore", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listPromoAdmin($id = 0)
	{

		$query = $id > 0 ? "WHERE idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idPromo, idPromoType, title, description, code, value, valueType FROM promotions ".$query."ORDER BY idStore", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listPromoTypeAdmin($id = 0)
	{

		$array = [ 
			0 => [
				"name" => "Cupom de Desconto",
				"promo" => []
			],
			1 => [
				"name" => "Frete Grátis",
				"promo" => []
			]
		];

		$query = $id > 0 ? "WHERE idPromoType = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idPromoType, type, description FROM promotions_type ".$query, $param);

		foreach ($select as $key => $value) {
			
			switch ($value['type']) {
				
				case 1:
					$array[0]['promo'][count($array[0]['promo'])] = $value;
				break;

				case 2:
					$array[1]['promo'][count($array[1]['promo'])] = $value;
				break;
				
			}

		}

		return count($select) > 0 ? $array : 0;

	}

	public static function listInfoPartner($id = 0)
	{

        $nameBase = $_SESSION[Sql::DB]['directory'];
		$array = [];
		$query = $id > 0 ? "WHERE idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idPartner, name, link, file FROM partners ".$query."ORDER BY name", $param);
		
		if(count($select) > 0)
		{

			foreach ($select as $key => $value) {
				
				$value['file'] = !empty($value['file']) ? $value['file'] : "ERRO";

				$value['src'] = file_exists("resources/clients/$nameBase/stores/loja-$id/imgs/partners/".$value['file']) ? "/resources/clients/$nameBase/stores/loja-$id/imgs/partners/".$value['file'] : "/resources/imgs/logos/default.png";

				$array[$key + 1] = $value;

			}

		}

		return count($select) > 0 ? $array : 0;

	}

	public static function listInfoSocial($id = 0)
	{

		$query = $id > 0 ? "WHERE sc.idStore = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];
		$array = [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT sc.idSocial, sc.idStore, sc.link, sc_tp.idSocialType, sc_tp.name, sc_tp.icon FROM social AS sc INNER JOIN social_type AS sc_tp ON sc.idSocialType = sc_tp.idSocialType $query", $param);

		if(is_array($select) && count($select) > 0)
		{

			foreach ($select as $key => $value) {
				
				if(!isset($array[$value['idStore']])) $array[$value['idStore']] = [];
				
				$array[$value['idStore']][count($array[$value['idStore']])] = $value;

			}

			sort($array);

		}

		return count($array) > 0 ? $array : 0;

	}

	public static function listInfoSocialType($id = 0)
	{

		$query = $id > 0 ? "WHERE idSocialType = :ID " : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idSocialType, name, icon FROM social_type $query", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listPay($id = 0, $type = 0, $field = "py.idStore")
	{

		$array = [
			1 => [ 
			"name" => "Retirada",
			"pays" => [],
			],
			2 => [ 
			"name" => "Entrega",
			"pays" => [],
			],
			3 => [ 
			"name" => "Online",
			"pays" => [],
			] 
		];

		$query = $id > 0 ? " WHERE $field = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT py.idPayment, py.description, py.type, py_tp.idPaymentType, py_tp.name, py_tp.src FROM payment AS py INNER JOIN payment_type AS py_tp ON py.idPaymentType = py_tp.idPaymentType".$query." ORDER BY py.type, py_tp.name", $param);

		if(count($select) > 0 && $type != 0)
		{
			foreach ($select as $key => $value) {
				
				$array[$value['type']]['pays'][count($array[$value['type']]['pays'])] = $value;

			}
		} else {
			$array = $select;
		}

		return count($select) > 0 ? $array : 0;

	}

	public static function listPayType($id = 0)
	{

		$query = $id > 0 ? "WHERE idPaymentType = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT * FROM payment_type".$query, $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listLayoutHeader($id = 0, $type = 0)
	{

		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];
		$order = $type > 0 ? "ORDER BY status DESC, description" : "";

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idLayoutHeader, description, departament, link, type, status FROM layout_header $query $order", $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listLayoutInfo($id = 0)
	{

		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idLayoutInfo, lyInfo1, lyInfo2, lyInfo3, lyInfo4, lyInfo5, lyInfo6, lyInfo7 FROM layout_info".$query, $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function listLayoutFooter($id = 0)
	{

		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idLayoutFooter, lyFooter1, lyFooter2, lyFooter3, lyFooter4, lyFooter5, lyFooter6, lyFooter7, lyFooter8 FROM layout_footer".$query, $param);

		return count($select) > 0 ? $select : 0;

	}

	public static function configJsonLayoutColor($array)
	{

		$data = [];	
		$nameBase = "resources/json/".Store::cryptCode(Store::SIGN)."LY.json";
		
		if(file_exists($nameBase))
		{
			$file = file($nameBase);
			$data = json_decode($file[0], true);
		
			if(is_array($data) && count($data) == 5)
			{

				foreach ($array as $kArray => $vArray) {
					foreach ($vArray as $key => $value) {
						if(isset($data[$kArray]['options'][$key]['value'])) $data[$kArray]['options'][$key]['value'] = $value;
					}
				}

			} else {
				$data = [];
			}

		}

        return count($data) == 5 ? $data : 0;

	}

	public static function listLayoutColor($id = 0)
	{

		$array = [];
		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idLayoutColor, options, theme FROM layout_color".$query, $param);

		if(count($select) > 0)
		{
			foreach ($select as $key => $value) {
				$value['options'] = json_decode($value['options'], true); 
				$array[$key] = $value;
			}
		}

		return count($select) > 0 ? $array : 0;

	}

	public static function listLayoutTheme($id = 0)
	{

		$data = [];
		$array = [];
		$nameBase = "resources/json/".Store::cryptCode(Store::SIGN)."LYTM.json";

		if(file_exists($nameBase))
		{
			$file = file($nameBase);
			$array = json_decode($file[0], true);

			if(is_array($array) && count($array) == 6 && $id > 0 && $id <= 6)
			{

				foreach ($array as $key => $value) {
					
					if($key == $id)
					{
						$data = $value;
					}

				}

			} else {
				$data = $array;
			}

		}

		return is_array($data) && count($data) > 0 ? $data : 0;

	}

	public static function listCities($id = 0)
	{

		$array = [];
		$nameBase = "resources/json/".Store::cryptCode(Store::SIGN)."CT.json";
		
		if(file_exists($nameBase))
		{
			$file = file($nameBase);
			$array = json_decode($file[0], true);
			$array = $array['estados'];

			if(strlen($id) > 1 && strstr($id, '_') != false)
			{

				$id = explode("_", $id);

				$array = isset($array[$id[0]]['cidades'][$id[1]]) ? [
					0 => [
						"sigla" => $array[$id[0]]['sigla'],
						"nome" => $array[$id[0]]['nome'],
						"cidades" => [ 0 => $array[$id[0]]['cidades'][$id[1]]]
					]
				] : $array;

			}
		}

		return count($array) > 0 ? $array : 0;

	}

	public static function configJsonFreight($array)
	{

		$data = [];	
		$nameBase = "resources/json/".Store::cryptCode(Store::SIGN)."FT.json";
		
		if(file_exists($nameBase))
		{
			$file = file($nameBase);
			$data = json_decode($file[0], true);

			if(is_array($data) && count($data) > 0)
			{
				$data["freight"][0]['value'] = floatval($array[0]['value']);
				$data["freight"][0]['status'] = intval($array[0]['status']);
				$data["freight"][1]['value'] = floatval($array[1]['value']);
				$data["freight"][1]['status'] = intval($array[1]['status']);
			}
		
		}

        return count($data) > 0 ? $data : 0;

	}

	public static function listFreight($id = 0, $type = 0)
	{

		$array = [];
		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idFreight, idStore, codeCity, district, cep, city, uf, onlyCity, details FROM freight".$query, $param);

		if(count($select) > 0)
		{
			
			if($type > 0)
			{

				foreach ($select as $key => $value) {
					
					if(!isset($array[$value['idStore']])) $array[$value['idStore']] = [
						"idStore" => $value['idStore'],
						"city" => []
					];

					if(!isset($array[$value['idStore']]['city'][$value['codeCity']])) $array[$value['idStore']]['city'][$value['codeCity']] = [
						"name" => $value['city'],
						"uf" => $value['uf'],
						"codeCity" => $value['codeCity'],
						"onlyCity" => $value['onlyCity'],
						"regions" => []
					]; 
					
					$array[$value['idStore']]['city'][$value['codeCity']]['regions'][count($array[$value['idStore']]['city'][$value['codeCity']]['regions'])] = [
						"district" => $value['district'],
						"cep" => $value['cep']
					]; 

					sort($array[$value['idStore']]['city'][$value['codeCity']]['regions']);

					if($key == count($select) - 1) sort($array[$value['idStore']]['city']);
					
				}

				sort($array);

			} else {

				foreach ($select as $key => $value) {
					$value['details'] = json_decode($value['details'], true); 
					$value['details'] = $value['details']['freight']; 
					$array[$key] = $value;
				}

			}

		}

		return count($array) > 0 ? $array : 0;

	}

	public static function listFreightCep($data = 0, $type = 0)
	{

		if(is_array($data) && count($data) > 0)
		{
			
			$array = [];
			$query = $data > 0 ? " WHERE cep = :CEP AND idStore = :ID" : "";
			$param = $data > 0 ? [":CEP" => strlen($data['cep']) == 9 ? Store::decryptCep($data['cep']) : $data['cep'], ":ID" => intval($data['id']) ] : [];

			$sql = new Sql($_SESSION[Sql::DB]);

			$select = $sql->select("SELECT idFreight, codeCity, district, cep, city, uf, onlyCity, details FROM freight".$query, $param);

			if(count($select) > 0)
			{
				
				foreach ($select as $key => $value) {
					$value['details'] = json_decode($value['details'], true); 
					$value['details'] = $value['details']['freight']; 
					$array[$key] = $value;
				}
				
				$array = is_array($array) && count($array) > 0 ? $array[0] : 0;

			} else if($type != 0) {

				$cep = Cart::consultCep($data['cep']);

				if($cep != false)
				{
					
					$select = $sql->select("SELECT idFreight, idStore, codeCity, district, cep, city, uf, onlyCity, details FROM freight WHERE district LIKE :DIS AND city = :CITY AND idStore = :STORE OR city = :CITY AND onlyCity = :ONLY AND idStore = :STORE", [
						":DIS" => "%".$cep['bairro']."%",
						":CITY" => $cep['localidade'],
						":STORE" => intval($data['id']),
						":ONLY" => 1
					]);

					foreach ($select as $key => $value) {
						$value['details'] = json_decode($value['details'], true); 
						$value['details'] = $value['details']['freight']; 
						$array[$key] = $value;
					}

					$array = is_array($array) && count($array) > 0 ? $array[0] : 0;

				} else {
					$array = 0;
				}

			} else {

				return 0;

			}

			return is_array($array) && count($array) > 0 ? $array : 0;
			
			
		} else{
			return 0;
		}

	}

	public static function listHoraryStore($id = 0, $type = 0, $modality = "horary")
	{

		$array = [];
		$data = [];
		$query = $id > 0 ? " WHERE idStore = :ID" : "";
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idHorary, idStore, details FROM horary_prime".$query, $param);

		if(count($select) > 0)
		{
			foreach ($select as $key => $value) {
				$value['details'] = json_decode($value['details'], true); 
				$value['details'] = $value['details']['horary']; 
				$array[$key] = $value;

				if($type != 0){

					$date = date("Y-m-d");
					$horary = [];

					for($i=1; $i <= 7; $i++) { 
						$horary[$i] = [
							"day" => date("N", strtotime($date)),
							"date" => $date
						];
						$date = date("Y-m-d", strtotime("+1 days", strtotime($date)));
					}

					$data[$key] = $value;

					foreach ($horary as $kHorary => $vHorary) {
						
						$array[$key]['details'][$vHorary['day']]['date'] = $vHorary['date'];
						
						if($modality != "")
						{
							$data[$key]['details'][$kHorary] = [
								"name" => $array[$key]['details'][$vHorary['day']]['name'],
								"id" => date("N", strtotime($array[$key]['details'][$vHorary['day']]['date'])),
								"date" => $array[$key]['details'][$vHorary['day']]['date'],
								"modality" => $modality,
								"horary" => [
									0 => [
										"init" => $array[$key]['details'][$vHorary['day']][$modality][0]['init'],
										"final" => $array[$key]['details'][$vHorary['day']][$modality][0]['final'],
										"value" => $array[$key]['details'][$vHorary['day']][$modality][0]['value'],
										"status" => date("YmdHi") <= date("YmdHi", strtotime($array[$key]['details'][$vHorary['day']]['date'].$array[$key]['details'][$vHorary['day']][$modality][0]['final'])) ? 1 : 0
									],
									1 => [
										"init" => $array[$key]['details'][$vHorary['day']][$modality][1]['init'],
										"final" => $array[$key]['details'][$vHorary['day']][$modality][1]['final'],
										"value" => $array[$key]['details'][$vHorary['day']][$modality][1]['value'],
										"status" => date("YmdHi") <= date("YmdHi", strtotime($array[$key]['details'][$vHorary['day']]['date'].$array[$key]['details'][$vHorary['day']][$modality][1]['final'])) ? 1 : 0
									]
								]
							];
						} else {
							$data[$key]['details'][$kHorary] = $array[$key]['details'][$vHorary['day']];
						}

					}

				} else {
					$data[$key] = $value;
				}

			}
		}

		return count($select) > 0 ? $data : 0;

	}

	public static function configJsonHorary($array)
	{

		$types = [1 => "horary", 2 => "delivery", 3 => "withdrawal"];
		$new = [];
		$data = Store::listHoraryStore($array['idStore']);
		
		if($data != 0 && is_array($data) && count($data) > 0)
		{
			$data[0]['details'][$array['day']][$types[$array['type']]][0]["init"] = $array['horary'][0]['init'];
			$data[0]['details'][$array['day']][$types[$array['type']]][0]["final"] = $array['horary'][0]['final'];
			$data[0]['details'][$array['day']][$types[$array['type']]][0]["value"] = $array['horary'][0]['value'];
			
			$data[0]['details'][$array['day']][$types[$array['type']]][1]["init"] = $array['horary'][1]['init'];
			$data[0]['details'][$array['day']][$types[$array['type']]][1]["final"] = $array['horary'][1]['final'];
			$data[0]['details'][$array['day']][$types[$array['type']]][1]["value"] = $array['horary'][1]['value'];

			$new['horary'] = $data[0]['details'];
		}

        return count($data) > 0 ? $new : 0;

	}

	public static function listImagesStore($id = 0)
	{

		$array = ["ctPromo" => 0];
		$nameBase = $_SESSION[Sql::DB]['directory'];
		$src = [
			"global" => "resources/clients/$nameBase/imgs/",
			"store" => "resources/clients/$nameBase/stores/loja-$id/imgs/",
			"default" => "resources/imgs/logos/default.png"
		];

		$data = [
			0 => [
				"file" => "logo.png",
				"src" => $src['global']
			],
			1 => [
				"file" => "index.png",
				"src" => $src['global']
			],
			2 => [
				"file" => "logo.png",
				"src" => $src['store']
			],
			3 => [
				"file" => "login.png",
				"src" => $src['store']
			],
			4 => [
				"file" => "loja$id.png",
				"src" => $src['store']
			],
			5 => [
				"file" => "logo-mobile.png",
				"src" => $src['store']
			],
			6 => [
				"file" => "logo-mobile.png",
				"src" => $src['global']
			],
			"promotions" => [
				"file" => "home-promo",
				"src" => $src['store']
			]
		];
		
		foreach ($data as $key => $value) {
			
			if(is_numeric($key))
			{
				$array[$key] = ['file' => $value['file'], 'src' => "", 'origin' => $value['src'].$value['file']];
				$array[$key]['src'] = file_exists($array[$key]['origin']) ? "/".$array[$key]['origin'] : $src['default'];
				
			} else if($key == "promotions"){

				$array[$key] = [];

				for ($i=1; $i <= 10 ; $i++) { 
					
					$array[$key][$i] = ['file' => $value['file'], 'src' => "/".$value['src'].$value['file'].$i.".png", 'origin' => $value['src'].$value['file'].$i.".png"];
					$array[$key][$i]['src'] = file_exists($value['src'].$value['file'].$i.".png") ? "/".$value['src'].$value['file'].$i.".png" : "";
					
					if($array[$key][$i]['src'] != "") $array['ctPromo'] += 1;

				}

				$array['src'] = $src;

			}

		}
		
		return is_array($array) && count($array) > 0 ? $array : 0;

	}

	public static function configJsonPayment($array)
	{

		$data = [];	
		
		$data['payment'] = [
			"idPayment" => $array['idPayment'],
			"pay" => $array['name'],
			"description" => $array['description'],
			"type" => $array['type'],
			"image" => $array['src'],
		];

        return count($data) > 0 ? $data : 0;

	}

}

?>