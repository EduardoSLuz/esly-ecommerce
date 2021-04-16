<?php

namespace Esly;

use Esly\DB\Sql;
use Esly\DB\Temp;
use Esly\Model;
use Esly\Model\Cart;
use Esly\Model\Order;

class Mercato extends Model{

    const USER = "Mercato";
    const PASS = "Mercato@7056";
    const URL = "http://mercatosistemas.com.br:";
    const OPTS = ["products" => "/dados_produtos", "newOrder" => "/Pedido_Novo", "sltOrder" => "/Pedido_Consulta"];
    
    public static function listMercato($id = 0, $query = "", $param = [])
	{
		
		$conn = $id > 0 ? "AND " : "WHERE ";
		$query = !empty($query) ? $conn.$query : "";
		
		if($id > 0) 
		{
			$query = "WHERE idMercato = :ID ".$query;
			$param = array_merge($param, [":ID" => $id]);
		}

		$sql = new Temp();

		$select = $sql->select("SELECT * FROM mercato $query", $param);

		return is_array($select) && count($select) > 0 ? $select : 0; 
		
    }
    
    public static function updateMercato($id = 0, $sets = "", $query = "", $param = [])
	{
	
		$conn = $id > 0 ? "AND " : "WHERE ";
		$query = !empty($query) ? $conn.$query : "";

		if($id > 0) 
		{
			$query = "WHERE idMercato = :ID ".$query;
			$param = array_merge($param, [":ID" => $id]);
		}

		$sql = new Temp();

		$update = $sql->count("UPDATE mercato SET $sets $query", $param);

		return $update > 0 ? true : false; 
		
	}

    public static function getUrl($opts)
    {

        $url = "";

        if(isset(Mercato::OPTS[$opts]) && isset($_SESSION[Sql::DB]))
        {   
            
            $select = Mercato::listMercato(0, "idCompany = :ID", [':ID' => $_SESSION[Sql::DB]['idCompany']]);

            $url = is_array($select) && count($select) == 1 ? Mercato::URL.$select[0]['port'].Mercato::OPTS[$opts] : "";

        } 

        return $url != "" ? $url : 0;
    }

    private static function getData($url, $param = "")
    {

        $data = 0;

        if(!empty($url))
        {
            $param = $param != "" ? "?".$param : $param; 

            $Ch = curl_init($url.$param);

            curl_setopt($Ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($Ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($Ch, CURLOPT_USERPWD, Mercato::USER.":".Mercato::PASS);

            $data = curl_exec($Ch);

            $data = json_decode($data, true);

        }

        return is_array($data) && count($data) > 0 ? $data : 0;

    }

    public static function selectOrders($id = 0)
    {

        $data = [];
        $param = $id > 0 ? "pedido=".$id : "pedido=sittodos";
        $url = Mercato::getUrl('sltOrder');

        if($url == 0 && is_numeric($url)) return 0;

        $orders = Mercato::getData($url, $param);

        if($orders != 0)
        {

            foreach ($orders as $key => $value) {

                $data[$key] = [
                    "codClient" => $value['COD_CLIENTE'],
                    "dateOrder" => $value['DATA_PEDIDO'],
                    "contact" => $value['CONTATO'],
                    "obs" => $value['OBS'],
                    "client" => $value['CLIENTE'],
                    "street" => $value['ENDERECO'],
                    "telephone" => $value['TELEFONE'],
                    "whatsapp" => $value['CELULAR'],
                    "cnpj" => $value['CNPJ'],
                    "uf" => $value['UF'],
                    "cep" => $value['CEP'],
                    "number" => $value['NUMERO'],
                    "district" => $value['BAIRRO'],
                    "city" => $value['CIDADE'],
                    "status" => $value['SITUACAO'],
                    "email" => $value['EMAIL'],
                    "codUser" => $value['COD_USUARIO'],
                    "validity" => $value['VALIDADE'],
                    "delivered" => $value['IND_ENTREGUE'],
                    "subtotal" => $value['VALOR_SUBTOTAL'],
                    "addition" => $value['VALOR_ACRESCIMO'],
                    "discount" => $value['VALOR_DESCONTO'],
                    "total" => $value['VALOR_TOTAL'],
                    "codOrder" => $value['NUM_PEDIDO'],
                    "idOrder" => $value['PEDIDO_LOCAL'],
                    "typeOrder" => $value['TIPO_PEDIDO'],
                    "dateUpdate" => $value['DATA_ULT_ALTERACAO']
                ];    

                foreach ($value['ITENS'] as $kItens => $vItens) {
                    
                    $data[$key]['items'][$kItens] = [
                        "item" => $vItens['SEQ_ITEM'], 
                        "codProduct" => $vItens['COD_PRODUTO'], 
                        "typePromotion" => $vItens['TIPO_PROMOCAO'], 
                        "quantity" => $vItens['QTD'], 
                        "price" => $vItens['VALOR_UNIT'], 
                        "total" => $vItens['VALOR_TOTAL']
                    ];

                }

            }

        }

        return is_array($data) && count($data) > 0 ? $data : 0;

    }

    public static function getHistoric($nameBase = 0)
    {
        
        $nameBase = $nameBase != 0 && is_string($nameBase) ? $nameBase : $_SESSION[Sql::DB]['directory'];

        if(file_exists("resources/clients/".$nameBase."/json/Historic.json"))
        {
            $file = file("resources/clients/".$nameBase."/json/Historic.json");
        }
        
        return isset($file) ? json_decode($file[0], true) : [];
        
    }

    public static function setHistoric($data)
    {
        
        $json = is_string($data) && json_decode($data, true) !== null ? $data : json_encode($data);

        $nameBase = $_SESSION[Sql::DB]['directory'];
        $file = "resources/clients/".$nameBase."/json/Historic.json";
        
        $fh = fopen($file, 'w');
        
        fwrite($fh, $json);
        
        fclose($fh);

        return file_exists($file) ? true : false;
        
    }

    public static function getImgsProducts($cod, $text)
    {
        $desc = "resources/imgs/products/desc/".strstr(strtoupper($text), ' ', true).".png";
        $codBar = "resources/imgs/products/cod/$cod.png";
        
        if(file_exists($codBar))
        {   
            return "/".$codBar;
        } else if(file_exists($desc)){
            return "/".$desc;
        } else {
            return "/resources/imgs/products/default.png";
        }

    }

    public static function getProducts($id = 0, $exists = 0)
    {

        $array = [];
        $data = [];

        $url = Mercato::getUrl("products");

        if($url == 0 && is_numeric($url)) return 0;

        $products = Mercato::getData($url);

        if($products != 0)
        {

            foreach ($products as $key => $value) {

                $array[$key] = $value["DESCRICAO"].$value["PLU"];
    
            }

            sort($array);

            foreach ($array as $kArray => $vArray) {
            
                foreach ($products as $kDados => $vDados) {
                    
    
                    if($vArray == $vDados['DESCRICAO'].$vDados['PLU'] && $vDados['PRECO'] > 0) //&& $vDados['QTD_ESTOQUE_ATUAL'] > 0)
                    {
    
                        $data[$kArray] = [
                            "idStore" => $vDados['ID_LOJA'],
                            "departament" => $vDados['CATEGORIA'] == "" ? "GERAL" : $vDados['CATEGORIA'],
                            "category" => $vDados['DEPARTAMENTO'] == "" ? "GERAL" : $vDados['DEPARTAMENTO'],
                            "subcategory" => $vDados['SUBCATEGORIA'] == "" ? "GERAL" : $vDados['SUBCATEGORIA'],
                            "mark" => $vDados['MARCA'],
                            "unit" => isset($vDados['UNIDADE']) ? $vDados['UNIDADE'] : "UN",
                            "volume" => $vDados['VOLUME'],
                            "barCode" => $vDados['CODIGO_BARRAS'],
                            "name" => $vDados['NOME'],
                            "dateRegister" => $vDados['DATA_CADASTRO'],
                            "dateUpdate" => $vDados['DATA_ULTIMA_ALTERACAO'],
                            "price" => $vDados['PRECO'],
                            "pricePromo" => $vDados['PRECO_PROMOCAO'],
                            "priceFinal" => $vDados['PRECO_PROMOCAO'] > 0 && $vDados['PRECO_PROMOCAO'] < $vDados['PRECO'] ? $vDados['PRECO_PROMOCAO'] : $vDados['PRECO'],
                            "stock" => $vDados['QTD_ESTOQUE_ATUAL'],
                            "stockMin" => $vDados['QTD_ESTOQUE_MINIMO'],
                            "description" => $vDados['DESCRICAO'],
                            "codProduct" => $vDados['PLU'],
                            "priceBuy" => $vDados['PRECO_COMPRA'],
                            "validityNext" => $vDados['VALIDADE_PROXIMA'],
                            "priceAttacked" => $vDados['PRECO_ATACADO'],
                            "quantityAttacked" => $vDados['QTD_ATACADO'],
                            "image" => $vDados['IMAGEM_URL'] != NULL ? $vDados['IMAGEM_URL'] : Mercato::getImgsProducts($vDados['CODIGO_BARRAS'], $vDados['DESCRICAO'])
                        ];
    
                        $data[$kArray]['description'] = str_replace("&", "e", str_replace("/", ".", $data[$kArray]['description'])); 
                        $data[$kArray]['departament'] = str_replace("&", "e", str_replace("/", ".", $data[$kArray]['departament'])); 
                        $data[$kArray]['category'] = str_replace("&", "e", str_replace("/", ".", $data[$kArray]['category'])); 
                        $data[$kArray]['subcategory'] = str_replace("&", "e", str_replace("/", ".", $data[$kArray]['subcategory'])); 
    
                        break;
    
                    } 
                }
        
            }
            
        }

        if(count($data) > 0)
        {
            Mercato::saveJson($data, $id, "ST", 0, $exists);
            Mercato::getProductDepartaments($id);
        }

        return is_array($data) && count($data) > 0 ? true : false;
        
    }

    public static function saveJson($data, $id, $type, $direct = 0, $exists = 0)
    {

        $nameBase = $_SESSION[Sql::DB]['directory'];
        $archive = "resources/clients/".$nameBase."/json/".intval($id).Mercato::cryptCode($nameBase.intval($id)).$type.".json";
        $subTypes = [ "description" => "", "status" => 0, 'types' => [0 => "Padrão"] ];

        if(file_exists($archive))
        {   

            if($type == "ST" && $direct == 0)
            {

                $products = Mercato::listAllProducts($id);
                $products = is_array($products) && count($products) > 0 ? $products : [];

                if($exists == 1) $products = Mercato::removeProductsExists($products, $data);

                foreach ($data as $key => $value) {
                   
                    $ct = 0;
                    
                    $measures = [
                        'id' => 1,
                        'name' => $value['unit'],
                        'valueStock' => 1,
                        'price' => $value['priceFinal'],
                        'freeFill' => 0,
                        'automaticUpdate' => 0,
                        'status' => 1,
                    ];

                    if(is_array($products) && count($products) > 0)
                    {
                        
                        foreach ($products as $kProduct => $vProduct) {
                            
                            if($value['codProduct'] == $vProduct['codProduct'])
                            {
    
                                if(isset($vProduct['unitsMeasures']) && is_array($vProduct['unitsMeasures']))
                                {
                                                                     
                                    $vProduct['unitsMeasures'][0] = [
                                        'id' => isset($vProduct['unitsMeasures'][0]['id']) ? $vProduct['unitsMeasures'][0]['id'] : $measures['id'],
                                        'name' => $measures['name'],
                                        'valueStock' => $measures['valueStock'],
                                        'price' => $measures['price'],
                                        'freeFill' => isset($vProduct['unitsMeasures'][0]['freeFill']) && is_numeric($vProduct['unitsMeasures'][0]['freeFill']) ? $vProduct['unitsMeasures'][0]['freeFill'] : 0,
                                        'automaticUpdate' => 0,
                                        'status' => isset($vProduct['unitsMeasures'][0]['status']) ? $vProduct['unitsMeasures'][0]['status'] : $measures['status']
                                    ];

                                    $units = $vProduct['unitsMeasures'];
                                    
                                    if(count($vProduct['unitsMeasures']) > 1)
                                    {
                                        
                                        foreach ($vProduct['unitsMeasures'] as $kUnits => $vUnits) {
                                        
                                            if($vUnits['automaticUpdate'] == 1)
                                            {
    
                                                $vUnits['price'] = isset($value['priceFinal']) && isset($vUnits['valueStock']) ? floatval($value['priceFinal'] * $vUnits['valueStock']) : $vUnits['price']; 
    
                                                $units[$kUnits] = $vUnits;
    
                                            }
    
                                        }
                                        
                                    }
    
                                    $value['unitsMeasures'] = $units;
    
                                } else {
                                    $value['unitsMeasures'] = [0 => $measures];
                                }
                                
                                $value['image'] = $vProduct['image'];
                                $value['subTypes'] = isset($vProduct['subTypes']) ? $vProduct['subTypes'] : $subTypes;
                                $products[$kProduct] = $value;
                                $ct = 1;
                                break;
    
                            } 
    
                        }

                    }

                    if($ct == 0)
                    {
                        $value['unitsMeasures'] = [0 => $measures];
                        $value['subTypes'] = $subTypes;
                        $products[] = $value;
                    } 

                }

                $data = Mercato::removeDuplicate($products);

            }

            rename($archive, "resources/clients/$nameBase/json/backup/".intval($id).Mercato::cryptCode($nameBase.intval($id)).$type.".json");

        } else if(!file_exists($archive) && is_array($data)) {

            $products = [];

            if($type == "ST" && $direct == 0)
            {

                foreach ($data as $key => $value) {
                
                    $value['unitsMeasures'] = [ 
                        0 => [
                        'id' => 1,
                        'name' => $value["unit"],
                        'valueStock' => 1,
                        'price' => $value["priceFinal"],
                        'freeFill' => 0,
                        'automaticUpdate' => 0,
                        'status' => 1
                        ]
                    ];
    
                    $value['subTypes'] = $subTypes;
    
                    $products[] = $value;
    
                }

                $data = Mercato::removeDuplicate($products);

            }

        }

        $data = is_array($data) && count($data) > 0 ? json_encode($data) : $data;

        $fh = fopen($archive, 'w');
        fwrite($fh, $data);
        fclose($fh);

    }

    public static function removeProductsExists($products, $list, $field = "codProduct")
    {

        $data = [];

        if(is_array($list) && count($list) > 0)
        {
            foreach ($list as $key => $value) {
            
                if(is_array($products) && count($products) > 0)
                {
                    foreach ($products as $kProducts => $vProducts) {
                        if($vProducts[$field] == $value[$field]) $data[] = $vProducts;
                    }
                }
    
            }
        }

        return count($data) > 0 ? $data : $products;

    }

    public static function removeDuplicate($data, $field = "codProduct")
    {

        $cod = [];
        $array = [];

        foreach ($data as $key => $value) {
            
            if(!isset($cod[$value[$field]]))
            {
                $array[] = $value;
                $cod[$value[$field]] = $value[$field];
            }

        }

        return is_array($array) && count($array) > 0 ? $array : $data;

    }

    public static function setOrder($id)
    {

        $url = Mercato::getUrl("newOrder");
        $order = Mercato::organizeOrder($id);

        var_dump($order);
        exit;

        if($order != 0 && is_array($order) && count($order) > 0 && is_string($url))
        { 

            $param = "cod_usuario=1&json_pedidos=".json_encode($order)."&dt_ult_atualizacao=".date("d/m/Y H:i:s");

            $data = Mercato::getData($url, $param);

            if($data != 0 && is_array($data) && count($data) > 0)
            {

                $update = Order::updateOrderSet( "codOrder = :CODE", [ ":ID" => intval($id), ":CODE" => $data[0]['PEDIDO'] ] );

            }

        }

        return isset($update) && $update ? true : false;

    }

    public static function organizeOrder($id)
    {

        $array = [];
        $data = [];

        $order = Order::listAll($id, 1);
        $items = Cart::organizeItems($order[0]['cart']['items'], $order[0]['idStore']);

        if(is_array($order) && count($order) > 0 && $items != 0)
        {

            $order = $order[0];

            foreach ($items as $key => $value) {
                
                $data[$key] = [
                    "SEQ_ITEM" => $key + 1,    
                    "COD_PRODUTO" => $value['codProduct'],
                    "QTD" => floatval($value['stock']),
                    "VALOR_UNIT" => $value['priceItem'], //number_format($value['priceItem'], 2, '.', ''),
                    "VALOR_TOTAL" => $value['totalItem'], // number_format($value['totalItem'], 2, '.', ''),
                    "TIPO_PROMOCAO" => "N"
                ];

            }

            $array = [
                0 => [
                    "PEDIDO_LOCAL" => $order["idOrder"],
                    "COD_CLIENTE" => $order["idUser"],
                    "TIPO_PEDIDO" => "P",
                    "DATA_PEDIDO" => date("d/m/Y", strtotime($order['dateInsert'])),
                    "CONTATO" => "",
                    "OBS" => $order['cart']['obsCart'],
                    "PEDIDO" => isset($order['codOrder']) && $order['codOrder'] != 0 && $order['codOrder'] != 9 ? $order['codOrder'] : "",
                    "IND_ENTREGUE" => "N",
                    "CLIENTE" => $order['nameUser']." ".$order['surnameUser'],
                    "ENDERECO" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["street"] : $order['infoStore']['streetStore'],
                    "TELEFONE" => $order['infoUser']['telephoneUser'],
                    "CELULAR" => $order['infoUser']['whatsappUser'],
                    "CNPJ" => $order['infoUser']['cpfUser'],
                    "UF" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["uf"] : $order['infoStore']['uf'],
                    "CEP" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["cep"] : $order['infoStore']['cepStore'],
                    "NUMERO" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["number"] : $order['infoStore']['numberStore'],
                    "BAIRRO" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["district"] : $order['infoStore']['districtStore'],
                    "CIDADE" => isset($order['address'][1]) && count($order['address'][1]) > 0 ? $order['address'][1]["city"] : $order['infoStore']['city'],
                    "SITUACAO" => 3,
                    "EMAIL" => $order['infoUser']['emailUser'],
                    "COD_USUARIO" => 1,
                    "VALIDADE" => 30,
                    "VALOR_SUBTOTAL" => number_format($order['subtotal'], 2, '.', ''),
                    "VALOR_ACRESCIMO" => 0,
                    "VALOR_DESCONTO" => 0,
                    "VALOR_TOTAL" => number_format($order['subtotal'], 2, '.', ''),
                    "ITENS" => $data,
                    "PGTO" => []
                ]
            ];

        }

        return is_array($array) && count($array) > 0 ? $array : 0;

    }

    public static function getProductDepartaments($id)
    {

        $array = [];
        $dep = Mercato::getDepartaments($id);
        $products = Mercato::listAllProducts($id);
        
            
        foreach ($dep as $kDep => $vDep) {
            
            $array[$kDep] = $vDep;
            
            foreach ($vDep['category'] as $kCategory => $vCategory) {
                
                $array[$kDep]['category'][$kCategory]['products'] = [];
                
                foreach ($products as $kProducts => $vProducts) {
                    
                    if($vProducts['category'] == $vCategory['name'] && $vProducts['departament'] == $vDep['name'] || $vCategory['name'] == "GERAL" && $vProducts['category'] == "" || $vDep['name'] == "GERAL" && $vProducts['departament'] == "") 
                    {
                        $array[$kDep]['category'][$kCategory]['products'][count($array[$kDep]['category'][$kCategory]['products'])] = $vProducts;
                    }

                }

            }

        }

        if(count($array) > 0)
        {
            Mercato::saveJson($array, $id, "DP");
        }

        return is_array($array) && count($array) > 0 ? true : false;

    }

    public static function verifyProductJson($id = 0)
    {
        
        $nameBase = $_SESSION[Sql::DB]['directory'];

        return file_exists("resources/clients/".$nameBase."/json/".intval($id).Mercato::cryptCode($nameBase.intval($id))."ST.json");

    }

    public static function listAllProducts($id, $type = 0)
    {

        $json = $type == 0 ? "ST" : "DP";

        $nameBase = $_SESSION[Sql::DB]['directory'];
        $archive = "resources/clients/".$nameBase."/json/".intval($id).Mercato::cryptCode($nameBase.intval($id)).$json.".json";

        if(file_exists($archive))
        {
            $file = file("resources/clients/".$nameBase."/json/".intval($id).Mercato::cryptCode($nameBase.intval($id)).$json.".json");
        }    
        
        return isset($file) ? json_decode($file[0], true) : [];

    }

    public static function listProductsHome($store, $type = 0, $option = 0)
    {

        $products = $option == 0 ? Mercato::listAllProducts($store, $type) : Mercato::listProductsDepartaments($store);

        if(is_array($products) && count($products) > 0)
        {
            
            $data = [];

            if($option != 0)
            {
                
                $data = $products;

                foreach ($products as $key => $value) {
                    
                    if(is_array($value['products']) && count($value['products']) > 0)
                    {
                        
                        foreach ($value['products'] as $kPro => $vPro) {
                            
                            $vPro['image'] = file_exists(substr($vPro['image'], 1)) ? $vPro['image'] : "/resources/imgs/products/default.png";
                            $data[$key]['products'][$kPro]['image'] = $vPro['image'];

                            if(is_array($vPro['unitsMeasures']) && count($vPro['unitsMeasures']) > 0)
                            {
        
                                $units = [];

                                foreach ($vPro['unitsMeasures'] as $kUnits => $vUnits) {
                                    $units[$vUnits['id']] = $vUnits;
                                    $units[$vUnits['id']]['id'] = $kUnits;
                                    $units[$vUnits['id']]['uni'] = $vPro['unitsMeasures'][0]['name'];
                                    if($vUnits['status'] == 0) unset($units[$vUnits['id']]);
                                }
                                
                                ksort($units);
            
                                $data[$key]['products'][$kPro]['unitsMeasures'] = $units;
            
                            }

                            if($vPro['stock'] <= 0) unset($data[$key]['products'][$kPro]);

                        }
                        
                    }
                    
                }

            } else {
                
                $data = $products;

                foreach ($products as $key => $value) {
                
                    $value['image'] = file_exists(substr($value['image'], 1)) ? $value['image'] : "/resources/imgs/products/default.png";
                    $data[$key]['image'] = $value['image'];

                    if(is_array($value['unitsMeasures']) && count($value['unitsMeasures']) > 0)
                    {
    
                        $units = [];
    
                        foreach ($value['unitsMeasures'] as $kUnits => $vUnits) {
                            $units[$vUnits['id']] = $vUnits;
                            $units[$vUnits['id']]['id'] = $kUnits;
                            $units[$vUnits['id']]['uni'] = $value['unitsMeasures'][0]['name'];
                            if($vUnits['status'] == 0) unset($units[$vUnits['id']]);
                        }
                        
                        ksort($units);
    
                        $data[$key]['unitsMeasures'] = $units;
    
                    }

                    if($value['stock'] <= 0) unset($data[$key]);
                    
                }

            }

        }

        return isset($data) ? $data : 0;

    }

    public static function listProductsDepartaments($store = 0)
    {

        $array = [];
        $products = Mercato::listAllProducts($store, 1);

        if(is_array($products) && count($products) > 0)
        {

            foreach ($products as $key => $value) {
                
                $array[$key] = [
                    "name" => $value['name'],
                    "products" => []
                ];

                if(is_array($value['category']) && count($value['category']) > 0)
                {   

                    foreach ($value['category'] as $kCat => $vCat) {
                        
                        if(is_array($vCat['products']) && count($vCat['products']) > 0)
                        {

                            foreach ($vCat['products'] as $kPro => $vPro) {
                                
                                if($vPro['stock'] > 0)
                                {
                                    $array[$key]['products'][] = $vPro;
                                }

                            }

                        }
                        
                    }

                }

                $array[$key]['status'] = is_array($array[$key]['products']) && count($array[$key]['products']) > 0 ? 1 : 0;

            }
            
        }

        return is_array($array) && count($array) > 0 ? $array : 0;

    }    

    public static function filterProductsRandom($id)
    {

        $array = [];
        $products = Mercato::listAllProducts($id);
        $rand_keys = array_rand($products, 10);

        for ($i=0; $i < 10; $i++) { 
            
            $array[$i] = $products[$rand_keys[$i]];

        }

        foreach ($products as $key => $value) {
		
            if(strstr($value['descricao'], 'MACA TURMA'))
            {	
                $array[count($array)] = $value;
            }
    
        }

        return $array;

    }

    public static function searchProduct($id, $cod, $field = 'description', $type = 0, $fil = 1, $mode = 0)
    {

        $kMaster = ['ct' => 0, 'position' => 0, 'number' => 1, 'total' => 0];
        $array = [];
        $products = $mode == 0 ? Mercato::listAllProducts($id) : Mercato::listProductsHome($id, 0, 0);

        foreach ($products as $key => $value) {
            
            if($value[$field] == $cod || empty($cod) || strstr(strtolower($value[$field]), strtolower($cod)) !== false){

                if($type == 1)
                {
                    
                    if($kMaster['ct'] == 15)
                    {   
                        $kMaster = ['ct' => 0, 'position' => $kMaster['position'] + 1, 'number' => $kMaster['number'] + 1, 'total' => $kMaster['total']];
                    }

                    $value['number'] = $kMaster['number'];
                    $array[$kMaster['number']][] = $value;
                    
                    $kMaster['ct'] += 1;
                    $kMaster['total'] += 1;

                } else {
                    $array[] = $value;
                } 

            }

        }

        if($type == 1) $array = ['total' => isset($kMaster['total']) ? $kMaster['total'] : 0, 'products' => isset($array[$fil]) ? $array[$fil] : 0, 'number' => $kMaster['number'], 'fil' => $fil ]; 

        return is_array($array) && count($array) > 0 ? $array : 0;

    }

    public static function searchProductId($store, $id)
    {

        $array = [];
        $products = Mercato::listAllProducts($store);

        foreach ($products as $key => $value) {
            
            if($value['codProduct'] == $id)
            {
                
                $array = $value;
                break;
                
            }

        }

        return count($array) > 0 ? $array : 0; 

    }

    public static function searchPageProduct($id, $text, $subs = "", $mark = "", $price = 0, $mode = 0)
    {

        $number = 50;
        $data = [];
        $array = [];
        $i = 1;
        $ct = $number;

        $product = Mercato::searchProduct($id, strtoupper($text), 'description', 0, 1, $mode);

        if($product != 0)
        {
            
            if($mark != ""){

                $mark = explode(",", $mark);

                foreach ($mark as $key => $value) {
                    
                    foreach ($product as $kProduct => $vProduct) {
                        
                        if($value == $vProduct['mark'] && $subs != "" && strstr($vProduct['description'], strtoupper($subs)) != false && $price != 0 && $vProduct['priceFinal'] >= $price['min'] && $vProduct['priceFinal'] <= $price['max'] 
                        || $value == $vProduct['mark'] && $subs != "" && strstr($vProduct['description'], strtoupper($subs)) != false && $price == 0
                        || $value == $vProduct['mark'] && $price != 0 && $vProduct['priceFinal'] >= $price['min'] && $vProduct['priceFinal'] <= $price['max'] && $subs == ""
                        || $value == $vProduct['mark'] && $price == 0 && $subs == "")
                        {
                            $array[count($array)] = $vProduct;
                        }

                    }

                }

            } else {
                
                foreach ($product as $kProduct => $vProduct) {
                        
                    if($subs != "" && strstr($vProduct['description'], strtoupper($subs)) != false && $price != 0 && $vProduct['priceFinal'] >= $price['min'] && $vProduct['priceFinal'] <= $price['max'] 
                    || $subs != "" && strstr($vProduct['description'], strtoupper($subs)) != false && $price == 0
                    || $price != 0 && $vProduct['priceFinal'] >= $price['min'] && $vProduct['priceFinal'] <= $price['max'] && $subs == "" 
                    || $price == 0 && $subs == "")
                    {
                        $array[count($array)] = $vProduct;
                    }

                }

            }

            foreach ($array as $key => $value) {
            
                if($key >= $ct){
                    $i += 1;
                    $ct += $number;
                }
    
                $value['page'] = $i;
                $data[$key] = $value;
    
            }
            
        }

        return count($data) > 0 ? $data : 0;

    }

    public static function searchDepartament($id, $dep, $category, $mode = 0)
    {

        $array = [];
        $products = $mode == 0 ? Mercato::listAllProducts($id) : Mercato::listProductsHome($id, 0, 0);

        foreach ($products as $key => $value) {
            
            if($value['departament'] == $dep && !empty($category) && $value['category'] == $category
            || $value['departament'] == $dep && empty($category))
            {
                $array[count($array)] = $value;
            }

        }

        return count($array) > 0 ? $array : 0; 

    }

    public static function searchPageDepartament($id, $departament, $category, $mark = "", $subs = "", $price = 0, $mode = 0)
    {

        $number = 50;
        $data = [];
        $array = [];
        $i = 1;
        $ct = $number;

        $dep = Mercato::searchDepartament($id, strtoupper($departament), strtoupper($category), $mode);

        if($dep != 0)
        {
            
            if($mark != ""){

                $mark = explode(",", $mark);

                foreach ($mark as $key => $value) {
                    
                    foreach ($dep as $kDep => $vDep) {
                        
                        if($value == $vDep['mark'] && $subs != "" && strstr($vDep['description'], strtoupper($subs)) != false && $price != 0 && $vDep['priceFinal'] >= $price['min'] && $vDep['priceFinal'] <= $price['max'] 
                        || $value == $vDep['mark'] && $subs != "" && strstr($vDep['description'], strtoupper($subs)) != false && $price == 0
                        || $value == $vDep['mark'] && $price != 0 && $vDep['priceFinal'] >= $price['min'] && $vDep['priceFinal'] <= $price['max'] && $subs == ""
                        || $value == $vDep['mark'] && $price == 0 && $subs == "")
                        {
                            $array[count($array)] = $vDep;
                        }

                    }

                }

            } else {
                
                foreach ($dep as $kDep => $vDep) {
                        
                    if($subs != "" && strstr($vDep['description'], strtoupper($subs)) != false && $price != 0 && $vDep['priceFinal'] >= $price['min'] && $vDep['priceFinal'] <= $price['max'] 
                    || $subs != "" && strstr($vDep['description'], strtoupper($subs)) != false && $price == 0
                    || $price != 0 && $vDep['priceFinal'] >= $price['min'] && $vDep['priceFinal'] <= $price['max'] && $subs == "" 
                    || $price == 0 && $subs == "")
                    {
                        $array[count($array)] = $vDep;
                    }

                }

            }

            foreach ($array as $key => $value) {
            
                if($key >= $ct){
                    $i += 1;
                    $ct += $number;
                }
    
                $value['page'] = $i;
                $data[$key] = $value;
    
            }
            
        }

        return count($data) > 0 ? $data : 0;

    }

    public static function searchFieldProduct($id, $cod, $field)
    {

        $array = [];
        $products = Mercato::listAllProducts($id);

        foreach ($products as $key => $value) {
            
            if($value[$field] == $cod){

                $array = $value;
                break;
            }

        }

        return count($array) > 0 ? $array : 0;

    }

    public static function searchFieldProductHome($store, $cod, $field)
    {

        $array = [];
        $products = Mercato::listProductsHome($store, 0, 0);

        foreach ($products as $key => $value) {
            
            if($value[$field] == $cod){

                $array = $value;
                break;
            }

        }

        return count($array) > 0 ? $array : 0;

    }

    public static function updateProduct($products = 0, $store = 0, $field, $cod, $fieldAlt, $newVal, $save = 0)
    {

        $products = $products == 0 ? Mercato::listAllProducts($store) : $products;

        if(is_array($products) && count($products) > 0)
        {
            
            foreach ($products as $key => $value) {
            
                if($value[$field] == $cod && isset($fieldAlt) && isset($newVal)){

                    $products[$key][$fieldAlt] = $newVal;
                    break;

                }
    
            } 

            $res = $save == 1 ? $res = Mercato::saveProducts($products, $store) : $products;

        }

        return isset($res) ? $res : 0;

    }

    public static function updateProductDepartaments($products = 0, $store = 0, $field, $cod, $fieldAlt, $newVal, $save = 0)
    {

        $products = $products == 0 ? Mercato::listAllProducts($store, 1) : $products;
        
        if(is_array($products) && count($products) > 0)
        {
            
            foreach ($products as $key => $value) {
                
                if(is_array($value['category']) && count($value['category']) > 0)
                {
                    
                    foreach ($value['category'] as $kCat => $vCat) {
            
                        if(is_array($vCat['products']) && count($vCat['products']) > 0)
                        {
                            
                            foreach ($vCat['products'] as $kProduct => $vProduct) {
                                
                                if($vProduct[$field] == $cod && isset($fieldAlt) && isset($newVal)){
                            
                                    $products[$key]['category'][$kCat]['products'][$kProduct][$fieldAlt] = $newVal;
                                    break;
                
                                }
        
                            }
        
                        }
            
                    } 

                }

            }

            $res = $save == 1 ? $res = Mercato::saveProducts($products, $store, 'DP') : $products;

        }

        return isset($res) ? $res : 0;

    }

    public static function updateAllProducts($products = 0, $store = 0, $field, $cod, $fieldAlt, $newVal, $save = 0)
    {
        
        if($products == 0)
        {
            $products = [ 0 => Mercato::listAllProducts($store), 1 => Mercato::listAllProducts($store, 1) ];            
        }

        if(is_array($products) && count($products) > 1)
        {
            $Pro = Mercato::updateProduct($products[0], $store, $field, $cod, $fieldAlt, $newVal, $save);
            $ProDep = Mercato::updateProductDepartaments($products[1], $store, $field, $cod, $fieldAlt, $newVal, $save);
        }
        
        return [0 => isset($Pro) ? $Pro : 0, 1 => isset($ProDep) ? $ProDep : 0];

    }

    public static function saveProducts($products, $store = 0, $type = "ST")
    {

        $json = is_array($products) && count($products) > 0 ? json_encode($products) : $products;

        $tp = $type != "ST" ? "DP" : "ST";

        $nameBase = $_SESSION[Sql::DB]['directory'];
        $archive = "resources/clients/".$nameBase."/json/".intval($store).Mercato::cryptCode($nameBase.intval($store)).$tp.".json";

        if(file_exists($archive))
        {
            
            $fh = fopen($archive, 'w');
        
            fwrite($fh, $json);
        
            fclose($fh);

        }    
        
        return isset($fh) ? true : false;
        
    }

    public static function saveAllProducts($products, $store = 0)
    {

        if(is_array($products) && count($products) > 1)
        {
            $save = Mercato::saveProducts($products[0], $store, "ST");
            $saveDep = Mercato::saveProducts($products[1], $store, "DP");
        }
        
        return [0 => isset($save) ? $save : false, 1 => isset($saveDep) ? $saveDep : false];
        
    }

    public static function getMarksProduct($products)
    {

        $array = [];

        foreach ($products as $key => $value) {
            
            //if(empty($value['mark']))$value['mark'] = "GERAL";

            if(!isset($array[$value['mark']]) && !empty($value['mark'])) $array[$value['mark']] = $value['mark'];
            
        }
        
        sort($array);

        return count($array) > 0 ? $array : 0;

    }

    public static function getPriceProduct($products)
    {

        $array = [];
        $data = [];
        
        if(count($products) > 0)
        {
            
            foreach ($products as $key => $value) {
            
                $array[count($array)] = $value['priceFinal'];
                
            }
    
            sort($array);

            $data = ["min" => number_format(floatval($array[0]), 2), "max" => number_format(floatval($array[count($array) - 1]), 2)];

        }

        return count($data) > 0 ? $data : 0;

    }

    public static function getSearchPage($products, $page = 0)
    {   

        $page = $page == 0 ? 1 : $page;

        $array = [];

        foreach ($products as $key => $value) {
            
            if(!isset($array[$value['page']]) && ($page - $value['page']) >= 0 && ($page - $value['page']) <= 4 || !isset($array[$value['page']]) && $value['page'] - $page >= 0 && $value['page'] - $page <= 4){
                $array[$value['page']] = ["page" => $value['page'], "number" => $value['page']];
            } else if(!isset($array[$value['page']]) && $value['page'] - $page == 5){
                
                $array[$value['page']] = ["page" => $value['page'], "number" => "..."];
                $array[$value['page'] + 1] = ["page" => $value['page'], "number" => "Próxima"];

            }    
        }

        return count($array) > 0 ? $array : 0;

    }

    public static function filterSearchProducts($products, $type = 4)
    {

        $number = 50; 
        $i = 1;
        $ct = $number;
        $data = [];
        $array = [];

        foreach ($products as $key => $value) {
            
            if($type == 2 || $type == 3)
            {
                $array[$key] = ["priceFinal" => $value['priceFinal'], "description" => $value['description'], "codProduct" => $value['codProduct'] ];
            } else if($type == 4 || $type == 5){
                $array[$key] = [ "description" => $value['description'], "priceFinal" => $value['priceFinal'], "codProduct" => $value['codProduct'] ];
            }
            
        }

        if($type == 2 || $type == 4) 
        {
            sort($array);
        } else if($type == 3 || $type == 5){
            rsort($array);
        }
        
        foreach ($array as $key => $value) {
            
            if($key >= $ct){
                $i += 1;
                $ct += $number;
            }
            
            foreach ($products as $kProducts => $vProducts) {
                
                if($vProducts['codProduct'] == $value['codProduct'])
                {
                    $vProducts['page'] = $i;
                    $data[$key] = $vProducts;
                    break;
                }

            }

        }

        return count($data) > 0 ? $data : 0;

    }

    public static function getDepartaments($id, $dep = "", $category = "")
    {
        
        $top = -30;
        $data = [];
        $array = [];
        $products = Mercato::listAllProducts($id);

        if(is_array($products) && count($products) > 0)
        {

            foreach ($products as $key => $value) {
            
                if(!empty($dep) && $value['departament'] == $dep || $dep == "")
                {
                    if($value['departament'] == "") $value['departament'] = "GERAL";
                    if($value['category'] == "") $value['category'] = "GERAL";
    
                    if(!isset($array[$value['departament']]) && $value['stock'] > 0 && $value['price'] > 0) $array[$value['departament']] = [
                        "name" => $value['departament'],
                        "category" => []
                    ];
    
                    if(!isset($array[$value['departament']]["category"][$value['category']]) && $value['stock'] > 0 && $value['price'] > 0) $array[$value['departament']]["category"][$value['category']] = [
                        "name" => $value['category']
                    ];
                }
                
            }
    
            sort($array);
    
            if(!empty($dep) && count($array) > 0)
            {
    
                foreach ($array[0]['category'] as $key => $value) {
                    
                    if($value['name'] != $category) 
                    {
                        $data[count($data)] = $value;
                    } 
        
                }
    
                sort($data);
    
            } else {
                
                foreach ($array as $key => $value) {
               
                    if(count($array) >= 11) 
                    {
                        $value['topMax'] = (-30) - (100 * 12);
                    } 
                    
                    $value['top'] = $top; 
                    sort($value['category']);
                    $data[count($data)] = $value;
                    $top -= 100;
        
                }
    
            }

        }
        
        return count($data) > 0 ? $data : 0;
    }

}

?>