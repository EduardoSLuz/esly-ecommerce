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
			$results = User::listAll();

			$sql->query("UPDATE address SET mainAddress = :ID WHERE IdUser = :CODE", [
				":ID" => 0,
				":CODE" => $results['idUser']
			]);
		}

		$sql->query("UPDATE address SET mainAddress = :ID WHERE idAddress = :CODE", [
			":ID" => $num,
			":CODE" => User::decryptCode($code)
		]);

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

        $results = $sql->count("UPDATE address SET idCity = :CITY, street = :STREET, number = :NUMBER, district = :DISTRICT, cep = :CEP, complement = :COMPLEMENT, reference = :REFERENCE, mainAddress = :MAINADD WHERE idAddress = :ID", [
            ":ID" => Address::decryptCode($this->getidAddress()),
            ":CITY" => $this->getcity(),
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":REFERENCE" => $this->getreference(),
            ":MAINADD" => $this->getmainAddress(),
        ]);

        if($results > 0)
        {
            
            Address::setSuccessMsg("ENDEREÇO ATUALIZADO COM SUCESSO!");
            Address::activeMainAddress($this->getidAddress(), $this->getmainAddress());

        } else {
		    Address::setErrorRegister("NADA FOI ATUALIZADO!");
        }

    }

    public function save()
    {
        
        $sql = new Sql($_SESSION[Sql::DB]);

        $res = User::listAll();

        $results = $sql->count("INSERT INTO address (idCity, idUser, street, number, district, cep, complement, reference, mainAddress) VALUES (:CITY, :ID, :STREET, :NUMBER, :DISTRICT, :CEP, :COMPLEMENT, :REFERENCE, :MAINADD)", [
            ":ID" => $res['idUser'],
            ":CITY" => $this->getcity(),
            ":STREET" => $this->getstreet(),
            ":NUMBER" => $this->getnumber(),
            ":DISTRICT" => $this->getdistrict(),
            ":CEP" => Address::decryptCep($this->getcep()),
            ":COMPLEMENT" => $this->getcomplement(),
            ":REFERENCE" => $this->getreference(),
            ":MAINADD" => $this->getmainAddress(),
        ]);

        if($results == 1)
        {
            
            $res = $sql->select("SELECT idAddress FROM address WHERE idUser = :ID ORDER BY idAddress DESC LIMIT 1", [
                ":ID" => $res['idUser']
            ]);
            
            Address::setSuccessMsg("ENDEREÇO INSERIDO COM SUCESSO!");
            Address::activeMainAddress(Address::cryptCode($res[0]['idAddress']), $this->getmainAddress());

        } else {
		    Address::setErrorRegister("NADA FOI INSERIDO!");
        }

        unset($_SESSION[Address::REGISTER_VALUES]);
        
    }
     
}

?>