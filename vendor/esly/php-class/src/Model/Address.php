<?php

namespace Esly\Model;

use Esly\DB\Sql;
use Esly\Model;
use Esly\Model\User;

class Address extends Model {

    CONST REGISTER_VALUES = "addressValues";
    CONST URL_MAPS = "https://maps.googleapis.com/maps/api";
    CONST API_MAPS = [ "geo" => "/geocode", "dis" => "/distancematrix"];
    CONST KEY_MAPS = "AIzaSyDAoZuo_KOLUuoYx4OtQufZU2kAUPRa2-g";

    public static function getRegisterValues()
    {

        if(!isset($_SESSION[Address::REGISTER_VALUES]))
        {
            $array = [
                "cityAddress" => 0,
                "cepAddress" => "",
                "districtAddress" => "",
                "streetAddress" => "",
                "numberAddress" => "",
                "complementAddress" => ""
            ];
        } else {
            
            $array = $_SESSION[Address::REGISTER_VALUES];
            unset($_SESSION[Address::REGISTER_VALUES]);
        }

        return $array;

    }

    public static function listAddress($id = 0)
	{	

		$array = [];

		$param = [ ":ID" => User::getId() ];

		$code = $id !== 0 ? "AND idAddress = :CODE" : "";
		if($id !== 0) $param[':CODE'] = !is_numeric($id) ? Address::decryptCode($id) : $id; 

		$sql = new Sql($_SESSION[Sql::DB]);

		$results = $sql->select("SELECT idAddress, place_id, street, number, district, cep, complement, mainAddress, city, uf FROM address WHERE idUser = :ID $code ORDER BY idAddress DESC", $param);

        if(is_array($results) && count($results) > 0)
        {

            foreach ($results as $key => $value) {

                $value['ID'] = $value['idAddress'];
                $value['idAddress'] = User::cryptCode($value['idAddress']);
		        $array[$key] = $value;

            }
    
        }

		return is_array($array) && count($array) > 0 ? $array : false;

    }
    
    public static function listAddressFreigth($id = 0, $store = 0)
    {

        $store = intval($store);
        $array = [];

        $select = $store > 0 ? Address::listAddress($id) : 0;

        if(is_array($select) && count($select) > 0)
        {

            foreach ($select as $key => $value) {

                $value['code'] = $value['idAddress'];
                $value['idAddress'] = Address::decryptCode($value['idAddress']);
                $value['freight'] = Store::listFreightByCep($store, "", $value['idAddress']);
                $min = 0;

                if(isset($value['freight']['details'][0]['name']))
                {
                    foreach ($value['freight']['details'] as $kDet => $vDet) {
                        
                        if($kDet == 0) $min = floatval($vDet['value']);
                        if($kDet > 0 && $min > floatval($vDet['value'])) $min = floatval($vDet['value']);
                        
                    }
                }

                $value['minFreight'] = $min;
                $array[$key] = $value;
                
            }

        }

        return is_array($array) && count($array) > 0 ? $array : 0;

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
        
        $res = 0;
        $code = !is_numeric($code) ? User::decryptCode($code) : $code;
        $sql = new Sql($_SESSION[Sql::DB]);

        $select = Address::listAddress($code);

        if(is_array($select) && count($select) == 1)
        {

            if($num >= 0 && $num <= 1)
            {

                $results = User::listAll();

                $teste = $sql->count("UPDATE address SET mainAddress = :ID WHERE idUser = :CODE", [
                    ":ID" => 0,
                    ":CODE" => $results['idUser']
                ]);

            }

            $res = $sql->count("UPDATE address SET mainAddress = :ID WHERE idAddress = :CODE", [
                ":ID" => $num,
                ":CODE" => $code
            ]);

        }
        
        return $res == 1 ? true : false;

    }

    public static function checkAddress()
    {
        $ID = User::listAll();

		$sql = new Sql($_SESSION[Sql::DB]);

        $results = $sql->count("SELECT idUser FROM address WHERE idUser = :ID", [
            ":ID" => $ID['idUser']
        ]);

        return $results >= 0 && $results < 5 ? false : true; 

    }
    
    public function update()
    {

		$sql = new Sql($_SESSION[Sql::DB]);

        $results = $sql->count("UPDATE address SET place_id = :PLACEID, street = :STREET, number = :NUMBER, district = :DISTRICT, cep = :CEP, complement = :COMPLEMENT, mainAddress = :MAINADD, city = :CITY, uf = :UF WHERE idAddress = :ID", [
            ":ID" => Address::decryptCode($this->getidAddress()),
            ":PLACEID" => $this->getplace_id(),
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":MAINADD" => $this->getmainAddress(),
            ":CITY" => $this->getcity(),
            ":UF" => $this->getuf()
        ]);
            
        $res = Address::activeMainAddress($this->getidAddress(), $this->getmainAddress());

        return $results > 0 || $res ? true : false;

    }

    public function save()
    {
        
        $sql = new Sql($_SESSION[Sql::DB]);

        $id = User::getId();

        $results = $sql->count("INSERT INTO address (idUser, place_id, street, number, district, cep, complement, mainAddress, city, uf) VALUES (:ID, :PLACEID, :STREET, :NUMBER, :DISTRICT, :CEP, :COMPLEMENT, :MAINADD, :CITY, :UF)", [
            ":ID" => $id,
            ":PLACEID" => $this->getplace_id(),
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":MAINADD" => $this->getmainAddress(),
            ":CITY" => $this->getcity(),
            ":UF" => $this->getuf()
        ]);

        if($results == 1)
        {
            
            $res = $sql->select("SELECT idAddress FROM address WHERE idUser = :ID ORDER BY idAddress DESC LIMIT 1", [
                ":ID" => $id
            ]);
            
            if(is_array($res) && count($res) == 1) Address::activeMainAddress(Address::cryptCode($res[0]['idAddress']), $this->getmainAddress());

        } 

        unset($_SESSION[Address::REGISTER_VALUES]);

        return isset($res) && $results == 1 ? true : false;
        
    }

    public function updateAddress()
    {
     
        $sql = new Sql($_SESSION[Sql::DB]);

        $update = $sql->count("UPDATE address SET place_id = :PLACEID, street = :STREET, number = :NUM, district = :DIS, cep = :CEP, complement = :COM, city = :CITY, uf = :UF WHERE idAddress = :ADR AND idUser = :ID", [
            ":PLACEID" => $this->getplace_id(),
            ":STREET" => $this->getstreet(),
            ":NUM" => $this->getnumber(),
            ":DIS" => $this->getdistrict(),
            ":CEP" => $this->getcep(),
            ":COM" => $this->getcomplement(),
            ":CITY" => $this->getcity(),
            ":UF" => $this->getuf(),
            ":ADR" => $this->getidAddress(),
            ":ID" => $this->getidUser()
        ]);

        return $update > 0 ? true : false;
        
    }

    public static function listAll($id = 0)
    {
        
		$code = $id > 0 ? "WHERE idAddress = :ID": "" ;
		$param = $id > 0 ? [":ID" => intval($id)] : [];

		$sql = new Sql($_SESSION[Sql::DB]);

		$select = $sql->select("SELECT idAddress, idUser, street, number, district, cep, complement, mainAddress, city, uf FROM address $code", $param);
        
		return count($select) > 0 ? $select : 0;

    }

    public static function getUrlMaps($api, $type = "json")
    {

        return isset(Address::API_MAPS[$api]) ? Address::URL_MAPS.Address::API_MAPS[$api]."/".$type : 0;

    }

    private static function getDataMaps($url, $param = "", $data = 0)
    {

        if(!empty($url))
        {
            $param = $param != "" ? "?".$param : $param; 

            $Ch = curl_init($url.$param);

            curl_setopt($Ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($Ch, CURLOPT_SSL_VERIFYPEER, true);
            //curl_setopt($Ch, CURLOPT_USERPWD, Mercato::USER.":".Mercato::PASS);

            $data = curl_exec($Ch);

            $data = json_decode($data, true);

        }

        return is_array($data) && count($data) > 0 ? $data : 0;

    }

    public static function getGeocodeMaps($code)
    {
        $url = Address::getUrlMaps("geo");
        $param = "address=$code&language=pt_br&region=br&key=".Address::KEY_MAPS; 
        $json = Address::getDataMaps($url, $param);
        
        return isset($json['results']) && isset($json['status']) && $json['status'] == "OK" ? $json['results'][0] : 0;

    }

    public static function getDistanceMatrizMaps($origin, $destiny)
    {

        $url = Address::getUrlMaps("dis");
        $param = "origins=place_id:$origin&destinations=place_id:$destiny&language=pt_br&region=br&key=".Address::KEY_MAPS; 
        $json = Address::getDataMaps($url, $param);

        return isset($json['rows']) && isset($json['status']) && $json['status'] == "OK" ? $json : 0;

    }

    public static function getViaCep($code)
    {

        $cep = Address::getDataMaps("viacep.com.br/ws/".Address::decryptCep($code)."/json/");

        return is_array($cep) && isset($cep['cep']) && !isset($cep['erro']) ? $cep : 0;

    }

    public static function getAddressByCep($cep, $number = 1)
    {

        if(isset($cep) && Address::validCep($cep))
        {
            
            $addr = Address::getViaCep($cep);
            $args = $addr != 0 ? str_replace(" ", "+", $addr['logradouro'].", ".$number.", ".$addr['cep']) : $cep;
            $json = Address::getGeocodeMaps($args);

            if($json != 0)
            {

                $data = count($json['address_components']) == 7 ? [
                    'country' => isset($json['address_components'][5]['long_name']) ? $json['address_components'][5]['long_name'] : "",
                    'city' => isset($json['address_components'][3]['short_name']) ? $json['address_components'][3]['short_name'] : "",
                    'state' => isset($json['address_components'][4]['long_name']) ? $json['address_components'][4]['long_name'] : "",
                    'uf' => isset($json['address_components'][4]['short_name']) ? $json['address_components'][4]['short_name'] : "",
                    'district' => isset($addr['bairro']) ? $addr['bairro'] : "",
                    'street' => isset($json['address_components'][1]['short_name']) ? $json['address_components'][1]['short_name'] : "",
                    'formated_address' => isset($json['formatted_address']) ? $json['formatted_address'] : ""
                ] : [
                    'country' => isset($json['address_components'][3]['long_name']) ? $json['address_components'][3]['long_name'] : "",
                    'city' => isset($json['address_components'][1]['short_name']) ? $json['address_components'][1]['short_name'] : "",
                    'state' => isset($json['address_components'][2]['long_name']) ? $json['address_components'][2]['long_name'] : "",
                    'uf' => isset($json['address_components'][2]['short_name']) ? $json['address_components'][2]['short_name'] : "",
                    'district' => isset($addr['bairro']) ? $addr['bairro'] : "",
                    'street' => isset($json['address_components'][0]['short_name']) ? $json['address_components'][0]['short_name'] : "",
                    'formated_address' => isset($json['formatted_address']) ? $json['formatted_address'] : ""
                ];

                $data['place_id'] = isset($json['place_id']) ? $json['place_id'] : "";

            }

            return isset($data) ? $data : 0;

        }

    }
     
}

?>