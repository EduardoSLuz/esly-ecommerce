<?php

namespace Esly;

use Esly\Model;
use Esly\DB\Sql;
use Esly\DB\Temp;

class Esly {

    private $host = [];
    private $store;

    const RESPONSE = "ResponseEslyJson";

    public function __construct($opts = [])
	{
        
        $_SESSION[Esly::RESPONSE] = [
            "Msg" => "ARQUIVO RECEBIDO COM SUCESSO!",
            "Error" => false
        ];

        $sql = new Temp;	

		$results = $sql->select("SELECT id, db_name, db_user, db_pass FROM host WHERE host = :HOST", [
			":HOST" => $_SERVER['HTTP_HOST'] 
        ]);
        
        if(count($results) == 1){
            
            $this->host = $results[0];
            $this->store = $opts['store'];

        } else {
            echo "Dominio não cadastrado";
			exit;
        }

		$results = $sql->select("SELECT idHost FROM user WHERE codUser = :COD AND idHost = :HOST", [
            ":COD" => $opts['user'],
            ":HOST" => $this->host['id'] 
        ]);

        if(count($results) == 0){
            echo "Usuário Inválido!";
			exit; 
        }

    }

    public function setProducts($json, $qtd = 0)
    {
        
        if(Esly::verifyJson($json) == false){
	        echo json_encode($_SESSION[Esly::RESPONSE]);
            exit;
        };

        $nameBase = strstr($this->host['db_name'], "-", true);
        $path = "resources/clients/".$nameBase."/json/".Model::cryptCode($nameBase.intval($this->host['id']))."ST.json";

        if(file_exists($path)){

        } else {

            Esly::verifyJsonProducts($json);

            $fh = fopen($path, 'w');
        
            fwrite($fh, $json);
            
            fclose($fh);
        }

    }

    public static function verifyJson($json)
    {

        if(Esly::is_json($json) == false)
        {
            $_SESSION[Esly::RESPONSE]["Msg"] = "JSON INVALIDO";
            $_SESSION[Esly::RESPONSE]["Error"] = true;

            return false;
        }

        return true;

    }

    public static function verifyJsonProducts($json){

        $json = json_decode($json, true);
        
        foreach ($json as $kJson => $vJson) {
            
            if(!is_int($kJson)){ }

        }
        var_dump($json);
        exit;

    }

    public static function is_json($json)
    {
        json_decode($json);
        return json_last_error() == JSON_ERROR_NONE ? true : false;
    }
    
}

?>