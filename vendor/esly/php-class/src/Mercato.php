<?php

namespace Esly;

use Esly\DB\Sql;
use Esly\Model;

class Mercato extends Model{

    public static function getProducts($id = 0)
    {

        if(isset($_SESSION[Sql::DB]))
        {

            $sql = new Sql($_SESSION[Sql::DB]);
            
            $results = $sql->select("SELECT ip, protocol, port FROM store_mercato WHERE idStore = :STORE", [
                ":STORE" => intval($id)
            ]);

            if(count($results) == 0)
            {
                throw new \Exception("NENHUM REGISTRO ENCONTRADO!");
			    exit;
            } else{
                $results = $results[0];
            }

        } else {
            throw new \Exception("ERRO DE VALIDAÇÃO!");
			exit;
        }

        $Url = $results['protocol']."://".$results['ip'].":".$results['port']."/web/dados/produtos";
        $Ch = curl_init($Url);

        curl_setopt($Ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Ch, CURLOPT_SSL_VERIFYPEER, false);

        $dados = curl_exec($Ch);
        //asort($Dados);

        curl_close($Ch);

        $array = [];
        $data = [];
        $dados = json_decode($dados, true);

        foreach ($dados as $key => $value) {

            $array[$key] = $value["descricao"];

        }
    
        sort($array);
    
        foreach ($array as $kArray => $vArray) {
            
            foreach ($dados as $kDados => $vDados) {
                if($vArray == $vDados['descricao'])
                {
                    $data[$kArray] = $vDados;
                    break;
                } 
            }
    
        }

        $data = json_encode($data);
        $nameBase = strstr($_SESSION[Sql::DB]['db_name'], '-', true);

        $fh = fopen("resources/clients/".$nameBase."/json/".Mercato::cryptCode($nameBase.intval($id)).".json", 'w');
        
        fwrite($fh, $data);
        
        fclose($fh);

    }

    public static function verifyProductJson($id = 0)
    {
        
        $nameBase = strstr($_SESSION[Sql::DB]['db_name'], '-', true);

        return file_exists("resources/clients/".$nameBase."/json/".Mercato::cryptCode($nameBase.intval($id)).".json");

    }

    public static function listAllProdutos($id)
    {

        $nameBase = strstr($_SESSION[Sql::DB]['db_name'], '-', true);
        $file = file("resources/clients/".$nameBase."/json/".Mercato::cryptCode($nameBase.intval($id)).".json");
        
        return json_decode($file[0], true);

    }

}

?>