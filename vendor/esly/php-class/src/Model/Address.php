<?php

namespace Esly\Model;

use Esly\DB\Sql;
use Esly\Model;
use Esly\Model\User;

class Address extends Model {

    CONST REGISTER_VALUES = "addressValues";

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
                "complementAddress" => "",
                "referenceAddress" => ""
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

		$results = $sql->select("SELECT idAddress, street, number, district, cep, complement, reference, mainAddress, city, uf, codeCity FROM address WHERE idUser = :ID $code ORDER BY idAddress DESC", $param);

        if(is_array($results) && count($results) > 0)
        {

            foreach ($results as $key => $value) {

                $value['idAddress'] = User::cryptCode($value['idAddress']);
		        $array[$key] = $value;

            }
    
        }

		return is_array($array) && count($array) > 0 ? $array : false;

    }
    
    public static function listAddressFreigth($id = 0, $opts = [])
    {

        $ct = 0;
        $array = [];

        $select = Address::listAddress($id);

        if(is_array($select) && count($select) > 0)
        {

            foreach ($select as $key => $value) {

                $value['freight'] = Store::listFreightCep(["cep" => $value['cep'], "id" => $opts['store']], 1);
                $value['code'] = $value['idAddress'];
                $value['idAddress'] = Address::decryptCode($value['idAddress']);

                $value['freight'] = is_array($value['freight']) && count($value['freight']) > 0 && isset($value['freight']['details'][$opts['type']]) && $value['freight']['details'][$opts['type']]['status'] == 1 ? floatval($value['freight']['details'][$opts['type']]['value']) : 0;

                $ct += $value['freight'] != 0 ? 1 : 0;

                $array[$key] = $value;

            }

        }

        return is_array($array) && count($array) > 0 && $ct > 0 ? $array : 0;

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

        $results = $sql->count("UPDATE address SET  street = :STREET, number = :NUMBER, district = :DISTRICT, cep = :CEP, complement = :COMPLEMENT, reference = :REFERENCE, mainAddress = :MAINADD, city = :CITY, uf = :UF, codeCity = :CODE WHERE idAddress = :ID", [
            ":ID" => Address::decryptCode($this->getidAddress()),
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":REFERENCE" => $this->getreference(),
            ":MAINADD" => $this->getmainAddress(),
            ":CITY" => $this->getcity(),
            ":UF" => $this->getuf(),
            ":CODE" => $this->getcode()
        ]);
            
        $res = Address::activeMainAddress($this->getidAddress(), $this->getmainAddress());

        return $results > 0 || $res ? true : false;

    }

    public function save()
    {
        
        $sql = new Sql($_SESSION[Sql::DB]);

        $id = User::getId();

        $results = $sql->count("INSERT INTO address (idUser, street, number, district, cep, complement, reference, mainAddress, city, uf, codeCity) VALUES (:ID, :STREET, :NUMBER, :DISTRICT, :CEP, :COMPLEMENT, :REFERENCE, :MAINADD, :CITY, :UF, :CODE)", [
            ":ID" => $id,
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":REFERENCE" => $this->getreference(),
            ":MAINADD" => $this->getmainAddress(),
            ":CITY" => $this->getcity(),
            ":UF" => $this->getuf(),
            ":CODE" => $this->getcode()
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

        $update = $sql->count("UPDATE address SET street = :STREET, number = :NUM, district = :DIS, cep = :CEP, complement = :COM, reference = :REF, codeCity = :COD, city = :CITY, uf = :UF WHERE idAddress = :ADR AND idUser = :ID", [
            ":STREET" => $this->getstreet(),
            ":NUM" => $this->getnumber(),
            ":DIS" => $this->getdistrict(),
            ":CEP" => $this->getcep(),
            ":COM" => $this->getcomplement(),
            ":REF" => $this->getreference(),
            ":COD" => $this->getcodeCity(),
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

		$select = $sql->select("SELECT idAddress, idUser, street, number, district, cep, complement, reference, mainAddress, codeCity, city, uf FROM address $code", $param);
        
		return count($select) > 0 ? $select : 0;

    }

     
}

?>