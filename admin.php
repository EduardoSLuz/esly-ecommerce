<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\PageAdmin;
use Esly\DB\Sql;
use Esly\Model\Address;
use Esly\Model\Store;
use Esly\Model\Order;
use Esly\Model\User;
use Esly\Mercato;

if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

// Page Admin 
$app->post("/admin/getnotifications/", function(Request $request, Response $response) {
	
	if(!isset($_POST['id']) || isset($_POST['id']) && !is_numeric($_POST['id']) || !isset($_SESSION[PageAdmin::STORE])) exit;	
	
	$res = PageAdmin::getNotifications();

	echo isset($_SESSION[PageAdmin::NOTIFICATIONS]['alert']) ? intval($_SESSION[PageAdmin::NOTIFICATIONS]['alert']) : 0;
	exit;

});

$app->post("/admin/alter-st/", function(Request $request, Response $response) {
	
	if(!isset($_POST['st']) || !is_numeric($_POST['st'])) header("Location: /admin/");

	$_SESSION[PageAdmin::STORE] = intval($_POST['st']);
	exit;

});

$app->get("/admin/", function(Request $request, Response $response) {

	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("index", []);
	
	return $response;

});

// Page Store 
$app->get("/admin/stores/", function(Request $request, Response $response) {

	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("stores", []);
	
	return $response;

});

// Page Store More
$app->get("/admin/stores/{id}/", function(Request $request, Response $response, $args) {
	
	header("Location: /admin/stores/");
	exit;

});

// Page Store Register
$app->post("/admin/stores/search-city/", function(Request $request, Response $response, $args) {

	Store::checkAdmin();

	$search = Store::searchCity($_POST['city'], $_POST['nick']);

	echo $search[0]['idCity'];
	exit;

});

// Page Store Register
$app->post("/admin/stores/{id}/register/", function(Request $request, Response $response, $args) {

	Store::checkAdmin($args['id']);
	
	$store = Store::listStores($args['id']);
	
	$ad = $store[0]['idStoreAddress'];
	$res = [];

	if(isset($_POST['inputCnpj']) && strlen($_POST['inputCnpj']) != 18)
	{
		Store::setErrorRegister("Cnpj Inválido!");
		exit;
	}

	if(isset($_POST['inputTelephone']) && strlen($_POST['inputTelephone']) != 15)
	{
		Store::setErrorRegister("Telefone Inválido!");
		exit;
	}

	if(isset($_POST['inputWp']) && strlen($_POST['inputWp']) != 15)
	{
		Store::setErrorRegister("Whatsapp Inválido!");
		exit;
	}

	if(isset($_POST['inputCep']) && strlen($_POST['inputCep']) != 9)
	{
		Store::setErrorRegister("Cep Inválido!");
		exit;
	}

	if(isset($_POST['selectCity']) && $_POST['selectCity'] == 0 && strlen($_POST['selectCity']) == 1 || isset($_POST['selectCity']) && strstr($_POST['selectCity'], '_') == false || !isset($_POST['selectCity']))
	{
		User::setErrorRegister("Selecione uma cidade!");
		exit;
	} else if(Store::listCities($_POST['selectCity']) == 0)
	{
		User::setErrorRegister("Erro Critico, atualize a página!");
		exit;
	} else {
		$array = Store::listCities($_POST['selectCity']);
	}

	$store = new Store();

	$store->setData([
		
		'id' => isset($args['id']) && is_numeric($args['id']) && $args['id'] > 0 ? $args['id'] : 0,
		'name' => isset($_POST['inputName']) && !empty($_POST['inputName']) ? $_POST['inputName'] : "",
		'email' => isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) ? $_POST['inputEmail'] : "",
		'cnpj' => isset($_POST['inputCnpj']) && !empty($_POST['inputCnpj']) && strlen($_POST['inputCnpj']) == 18 ? $_POST['inputCnpj'] : "",
		'tel' => isset($_POST['inputTelephone']) && !empty($_POST['inputTelephone']) && strlen($_POST['inputTelephone']) == 15 ? $_POST['inputTelephone'] : "", 
		'wp' => isset($_POST['inputWp']) && !empty($_POST['inputWp']) && strlen($_POST['inputWp']) == 15 ? $_POST['inputWp'] : "",
		'status' => isset($_POST['inputStatus']) && is_numeric($_POST['inputStatus']) && $_POST['inputStatus'] >= 0 && $_POST['inputStatus'] <= 1 ? $_POST['inputStatus'] : 0,
		'idAddress' => isset($ad) && is_numeric($ad) && $ad > 0 ? $ad : 0,
		'cep' => isset($_POST['inputCep']) && !empty($_POST['inputCep']) && strlen($_POST['inputCep']) == 9 ? $_POST['inputCep'] : "",
		'district' => isset($_POST['inputDistrict']) && !empty($_POST['inputDistrict']) ? $_POST['inputDistrict'] : "",
		'street' => isset($_POST['inputStreet']) && !empty($_POST['inputStreet']) ? $_POST['inputStreet'] : "",
		'number' => isset($_POST['inputNumber']) && !empty($_POST['inputNumber']) ? $_POST['inputNumber'] : 0,
		'complement' => isset($_POST['inputComplement']) && !empty($_POST['inputComplement']) ? $_POST['inputComplement'] : "",
		'codeCity' => isset($_POST['selectCity']) && strlen($_POST['selectCity']) > 1 && strstr($_POST['selectCity'], "_") != false ? $_POST['selectCity'] : 0,
		'city' => isset($array[0]['cidades'][0]) && !empty($array[0]['cidades'][0]) ? $array[0]['cidades'][0] : "",
		'uf' => isset($array[0]['sigla']) && !empty($array[0]['sigla']) ? $array[0]['sigla'] : ""

	]);

	$res['register'] = $store->updateRegister();
	$res['address'] = $store->updateRegisterAddress();
	
	if($res['register'] || $res['address'])
	{
		Store::setSuccessMsg("Cadastro Atualizado com Sucesso!");
	} else {
		Store::setErrorRegister("Nada Foi Atualizado!");
	}

	exit;

});

$app->get("/admin/stores/{id}/register/", function(Request $request, Response $response, $args) {
	
	Store::checkStoreAdmin($args['id']);

	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-register", [
		"errorRegister" => Store::getErrorRegister(),
        "successMsg"=> Store::getSuccessMsg(),
		"state" => Store::listState(),
		"store" => Store::listStores($args['id']),
		"cities" => Store::listCities()
	]);
	
	return $response;

});

// Page Store Info
$app->post("/admin/stores/{id}/info/store/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(isset($_POST['textInfo']) && empty($_POST['textInfo']) || !isset($_POST['textInfo']))
	{
		Store::setErrorRegister("Campo Descrição Vazio!");
		exit;
	}

	$store = new Store();

	$store->setData([
		'text' => $_POST['textInfo'],
        'id' => $args['id']
	]);

	$res = $store->updateInfoStore();

	if($res)
	{
		Store::setSuccessMsg("Informações Sobre a Empresa Atualizados com Sucesso!");
	} else {
		Store::setErrorRegister("Nada Foi Atualizado!");
	}

	exit;

});

$app->post("/admin/stores/{id}/info/help/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		if(isset($_POST['inputTitleHelp']) && empty($_POST['inputTitleHelp']) || !isset($_POST['inputTitleHelp']))
		{
			Store::setErrorRegister("Digite um Título!");
			exit;
		}

		if(isset($_POST['inputDescHelp']) && empty($_POST['inputDescHelp']) || !isset($_POST['inputDescHelp']))
		{
			Store::setErrorRegister("Digite uma Descrição!");
			exit;
		}
	}

	$store = new Store();

	$store->setData([
		'title' => isset($_POST['inputTitleHelp']) && !empty($_POST['inputTitleHelp']) ? $_POST['inputTitleHelp'] : "",
		'desc' => isset($_POST['inputDescHelp']) && !empty($_POST['inputDescHelp']) ? $_POST['inputDescHelp'] : "",
        'idHelp' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->saveInfoHelp();
			$msg = $res ? "Pergunta Frequente Inserida com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $store->updateInfoHelp();
			$msg = $res ? "Pergunta Frequente Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deleteInfoHelp();
			$msg = $res ? "Pergunta Frequente Deletada com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/stores/{id}/info/promo/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 0 || !isset($_POST['selectTypePromo']))
		{
			Store::setErrorRegister("Tipo Inválido!");
			exit;
		}

		if(isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 1 && empty($_POST['inputCuponPromo']))
		{
			Store::setErrorRegister("Digite o código do cupom!");
			exit;
		}

		if(isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 1 && $_POST['inputValueCuponPromo'] <= 0 || isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 1 && empty($_POST['inputValueCuponPromo']))
		{
			Store::setErrorRegister("Digite um desconto válido!");
			exit;
		}

		if(isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 3 && $_POST['inputInfoPromoFreight'] <= 0 || isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] == 3 && empty($_POST['inputInfoPromoFreight']))
		{
			Store::setErrorRegister("Digite um valor válido!");
			exit;
		}

		if(isset($_POST['inputTitlePromo']) && empty($_POST['inputTitlePromo']) || !isset($_POST['inputTitlePromo']))
		{
			Store::setErrorRegister("Digite um Título!");
			exit;
		}

		if(isset($_POST['inputDescPromo']) && empty($_POST['inputDescPromo']) || !isset($_POST['inputDescPromo']))
		{
			Store::setErrorRegister("Digite uma Descrição!");
			exit;
		}

	}

	if(isset($_POST['inputValueCuponPromo']) && !empty($_POST['inputValueCuponPromo']) && floatval($_POST['inputValueCuponPromo']) > 0 && $_POST['selectTypePromo'] == 1)
	{
		$value = $_POST['inputValueCuponPromo'];
	} else if(isset($_POST['inputInfoPromoFreight']) && !empty($_POST['inputInfoPromoFreight']) && floatval($_POST['inputInfoPromoFreight']) > 0 && $_POST['selectTypePromo'] == 3){
		$value = $_POST['inputInfoPromoFreight'];
	} else {
		$value = 0;
	}

	$store = new Store();

	$store->setData([
		'idPromo' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'idPromoType' => isset($_POST['selectTypePromo']) && $_POST['selectTypePromo'] > 0 ? $_POST['selectTypePromo'] : 0,
		'title' => isset($_POST['inputTitlePromo']) && !empty($_POST['inputTitlePromo']) ? $_POST['inputTitlePromo'] : "",
		'desc' => isset($_POST['inputDescPromo']) && !empty($_POST['inputDescPromo']) ? $_POST['inputDescPromo'] : "",
		'code' => isset($_POST['inputCuponPromo']) && !empty($_POST['inputCuponPromo']) && $_POST['selectTypePromo'] == 1 ? $_POST['inputCuponPromo'] : "",
		'value' => $value,
		'valueType' => isset($_POST['selectTypeCuponPromo']) && $_POST['selectTypeCuponPromo'] > 0 && $_POST['selectTypePromo'] == 1 ? $_POST['selectTypeCuponPromo'] : 1, 
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->saveInfoPromo();
			$msg = $res ? "Promoção Inserida com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $store->updateInfoPromo();
			$msg = $res ? "Promoção Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deleteInfoPromo();
			$msg = $res ? "Promoção Deletada com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/stores/{id}/info/promo-email/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);
	
	$res = ['status' => 0, 'msg' => "Error"];

	if(isset($_POST) && count($_POST) > 0)
	{
		
		$array = [];
		
		foreach ($_POST as $key => $value) {
			
			if(strstr($key, 'check-') != false)
			{
				$array[] = intval(str_replace("check-", "", $key));
			}

		}

		if(is_array($array) && count($array) == 0)
		{
			$res['msg'] = "Nenhuma Promoção Selecionada!";
			echo json_encode($res);
			exit;
		}

	} else {
		$res['msg'] = "Nenhuma Promoção Selecionada!";
		echo json_encode($res);
		exit;
	}

	$res = ['status' => 1, 'msg' => "Funcionou!"];
	echo json_encode($res);
	exit;

});

$app->post("/admin/stores/{id}/info/partner/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['inputNamePartner']) && empty($_POST['inputNamePartner']) || !isset($_POST['inputNamePartner']))
		{
			Store::setErrorRegister("Digite o nome do parceiro!");
			exit;
		}

		if(isset($_POST['inputLinkPartner']) && empty($_POST['inputLinkPartner']) || !isset($_POST['inputLinkPartner']))
		{
			Store::setErrorRegister("Digite o link do site oficial do parceiro!");
			exit;
		}

		if(isset($_POST['inputLinkPartner']) && stristr($_POST['inputLinkPartner'], 'https://') != false)
		{
			Store::setErrorRegister('Digite o link sem o "https://" !');
			exit;
		}

	}

	if($_POST['type'] == 1 || isset($_FILES['inputImgPartner']) && !empty($_FILES['inputImgPartner']['tmp_name']))
	{

		if(isset($_FILES['inputImgPartner']) && empty($_FILES['inputImgPartner']['tmp_name']))
		{
			Store::setErrorRegister('Insira um logo do parceiro!');
			exit;
		}

		if(isset($_FILES['inputImgPartner']) && substr($_FILES['inputImgPartner']['type'], 0, 5) != "image" && substr($_FILES['inputImgPartner']['type'], 6) != "png" && substr($_FILES['inputImgPartner']['type'], 6) != "jpeg")
		{
			Store::setErrorRegister('Formato do arquivo inválido!');
			exit;
		}

	}
	
	$store = new Store();

	$store->setData([
		"id" => $args['id'],
		"idPartner" => isset($_POST['id']) && intval($_POST['id']) > 0 ? $_POST['id'] : 0,
		"name" => isset($_POST['inputNamePartner']) && !empty($_POST['inputNamePartner']) ? $_POST['inputNamePartner'] : "",
		"link" => isset($_POST['inputLinkPartner']) && !empty($_POST['inputLinkPartner']) ? "https://".$_POST['inputLinkPartner'] : "",
		"file" => isset($_FILES['inputImgPartner']) && !empty($_FILES['inputImgPartner']['name']) ? substr(Store::cryptCode($_FILES['inputImgPartner']['name'].date("Y-m-d H:i:s")), 0, 200).strstr($_FILES['inputImgPartner']['name'], ".") : "" 
	]);

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->saveInfoPartner();
			$msg = $res ? "Parceiro Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $store->updateInfoPartner();
			$msg = $res ? "Parceiro Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deleteInfoPartner();
			$msg = $res ? "Parceiro Deletado com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	$nameBase = $_SESSION[Sql::DB]['directory'];
	$dir = isset($_POST['arc']) && !empty($_POST['arc']) ? "resources/clients/$nameBase/stores/loja-".$args['id']."/imgs/partners/".$_POST['arc'] : "";

	if(isset($_FILES['inputImgPartner']) && !empty($_FILES['inputImgPartner']['tmp_name']) && !empty($dir) && $res)
	{	

		if(file_exists($dir)){
			unlink($dir);
		}
		move_uploaded_file($_FILES['inputImgPartner']['tmp_name'], "resources/clients/$nameBase/stores/loja-".$args['id']."/imgs/partners/".$store->getfile());

	}

	if($_POST['type'] == 3 && !empty($dir) && file_exists($dir) && $res)
	{
		unlink($dir);
	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}
	
	$array = [
		"res" => intval($res),
		"name" => $_POST['type'] == 1 ? "ERRO" : $store->getfile(),
		"file" => "/resources/clients/$nameBase/stores/loja-".$args['id']."/imgs/partners/".$store->getfile()
	];

	echo json_encode($array);
	exit;
	
});

$app->post("/admin/stores/{id}/info/social/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['selectSocialType']) && $_POST['selectSocialType'] <= 0 || !isset($_POST['selectSocialType']))
		{
			Store::setErrorRegister("Selecione uma Rede Social!");
			exit;
		}

		if(isset($_POST['inputLinkSocial']) && empty($_POST['inputLinkSocial']) || !isset($_POST['inputLinkSocial']))
		{
			Store::setErrorRegister("Digite o link da Rede Social!");
			exit;
		}

		if(isset($_POST['inputLinkSocial']) && stristr($_POST['inputLinkSocial'], 'https://') != false)
		{
			Store::setErrorRegister('Digite o link sem o "https://" !');
			exit;
		}

	}

	$store = new Store();

	$store->setData([
		'id' => $args['id'],
		'idSocial' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
		'type' => isset($_POST['selectSocialType']) && $_POST['selectSocialType'] > 0 ? $_POST['selectSocialType'] : 0,
		'link' => isset($_POST['inputLinkSocial']) && !empty($_POST['inputLinkSocial']) ? "https://".$_POST['inputLinkSocial'] : ""
	]);

	$array = [
		"id" => $store->getid(),
		"idSocial" => $store->getidSocial(),
		"type" => $store->gettype(),
		"link" => $store->getlink(),
	];

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->saveInfoSocial();
			$msg = $res ? "Rede Social Inserida com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $store->updateInfoSocial();
			$msg = $res ? "Rede Social Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deleteInfoSocial();
			$msg = $res ? "Rede Social Deletada com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/stores/{id}/info/", function(Request $request, Response $response, $args) {
	
	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-info", [
		"errorRegister" => Store::getErrorRegister(),
        "successMsg"=> Store::getSuccessMsg(),
		"storeInfo" => Store::listInfoAdmin($args['id']),
		"storeHelp" => Store::listHelp($args['id']),
		"storePromo" => Store::listPromoAdmin($args['id']),
		"storePromoType" => Store::listPromoTypeAdmin(),
		"storePartner" => Store::listInfoPartner($args['id']),
		"storeSocial" => Store::listInfoSocial($args['id']),
		"storeSocialType" => Store::listInfoSocialType()
	]);
	
	return $response;

});

// Page Store Payment
$app->post("/admin/stores/{id}/payment/option/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		if(isset($_POST['selectPayOption']) && $_POST['selectPayOption'] == 0 || !isset($_POST['selectPayOption']))
		{
			Store::setErrorRegister("Selecione uma opção de pagamento!");
			exit;
		}

		if(isset($_POST['selectPayType']) && $_POST['selectPayType'] == 0 || !isset($_POST['selectPayType']))
		{
			Store::setErrorRegister("Selecione um tipo!");
			exit;
		}
		
	}

	$store = new Store();

	$store->setData([
		'pay' => isset($_POST['selectPayOption']) && $_POST['selectPayOption'] > 0 ? $_POST['selectPayOption'] : 0,
		'type' => isset($_POST['selectPayType']) && $_POST['selectPayType'] > 0 ? $_POST['selectPayType'] : 0,
		'desc' => isset($_POST['inputPayDesc']) && !empty($_POST['inputPayDesc']) ? $_POST['inputPayDesc'] : "",
        'idPay' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->savePayOption();
			$msg = $res ? "Opção de Pagamento Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $store->updatePayOption();
			$msg = $res ? "Opção de Pagamento Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deletePayOption();
			$msg = $res ? "Opção de Pagamento Deletado com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/stores/{id}/payment/", function(Request $request, Response $response, $args) {
	
	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-payment", [
		"errorRegister" => Store::getErrorRegister(),
		"successMsg"=> Store::getSuccessMsg(),
		"storePay" => Store::listPay($args['id']),
		"storePayType" => Store::listPayType()
	]);
	
	return $response;

});

// Page Store Layout
$app->post("/admin/stores/{id}/layout/header/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		if(isset($_POST['inputDescDep']) && empty($_POST['inputDescDep']) || !isset($_POST['inputDescDep']))
		{
			Store::setErrorRegister("Digite a descrição do cabeçalho!");
			exit;
		}

		if(isset($_POST['selectTypeDep']) && $_POST['selectTypeDep'] == 0 || !isset($_POST['selectTypeDep']))
		{
			Store::setErrorRegister("Selecione um tipo!");
			exit;
		}

		if(isset($_POST['selectStatusDep']) && $_POST['selectStatusDep'] != 0 && $_POST['selectStatusDep'] != 1 || !isset($_POST['selectStatusDep']))
		{
			Store::setErrorRegister("Selecione um status!");
			exit;
		}

		if($_POST['selectTypeDep'] == 1)
		{
			if(isset($_POST['selectDepHeader']) && is_numeric($_POST['selectDepHeader']) && $_POST['selectDepHeader'] == 0 || isset($_POST['selectDepHeader']) && empty($_POST['selectDepHeader']) || !isset($_POST['selectDepHeader']))
			{
				Store::setErrorRegister("Selecione um departamento!");
				exit;
			}
		}
		else if($_POST['selectTypeDep'] == 2)
		{
			if(isset($_POST['inputLinkDep']) && empty($_POST['inputLinkDep']) || !isset($_POST['inputLinkDep']))
			{
				Store::setErrorRegister("Digite um link da página!");
				exit;
			}

			if(isset($_POST['inputLinkDep']) && stristr($_POST['inputLinkDep'], 'https://') != false)
			{
				Store::setErrorRegister('Digite o link sem o "https://" !');
				exit;
			}
		
		}
	}

	if(isset($_POST['inputLinkDep']) && !empty($_POST['inputLinkDep']) && $_POST['type'] != 3 && $_POST['selectTypeDep'] == 2)
	{
		$_POST['inputLinkDep'] = "https://".$_POST['inputLinkDep'];
	} else if(isset($_POST['inputLinkDep']) && $_POST['type'] != 3 && $_POST['selectTypeDep'] == 1){
		
		$https = strstr($_SERVER['HTTP_HOST'], "www.") != false ? substr($_SERVER['HTTP_HOST'], 4) : $_SERVER['HTTP_HOST'];
		$_POST['inputLinkDep'] = "https://$https/loja-".$args['id']."/departaments/".$_POST['selectDepHeader']."-0/";
	
	}

	$store = new Store();

	$store->setData([
		'desc' => isset($_POST['inputDescDep']) && !empty($_POST['inputDescDep']) ? $_POST['inputDescDep'] : "",
		'type' => isset($_POST['selectTypeDep']) && $_POST['selectTypeDep'] > 0 ? $_POST['selectTypeDep'] : 0,
		'status' => isset($_POST['selectStatusDep']) && $_POST['selectStatusDep'] >= 0 && $_POST['selectStatusDep'] <= 1 ? $_POST['selectStatusDep'] : 0,
		'dep' => isset($_POST['selectDepHeader']) && !is_numeric($_POST['selectDepHeader']) && $_POST['selectTypeDep'] == 1 ? $_POST['selectDepHeader'] : 0,
		'link' => isset($_POST['inputLinkDep']) && !empty($_POST['inputLinkDep']) ? $_POST['inputLinkDep'] : "",
        'idLayoutHeader' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $store->savePayOption();
			$msg = $res ? "Opção de Pagamento Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;*/

		case 2:
			$res = $store->updateLayoutHeader();
			$msg = $res ? "Cabeçalho Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $store->deletePayOption();
			$msg = $res ? "Opção de Pagamento Deletado com Sucesso!" : "Nada Foi Deletado!";
		break;*/
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/stores/{id}/layout/info/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		if(isset($_POST['ly']) && empty($_POST['ly']) || !isset($_POST['ly']) || isset($_POST['ly']) && !empty($_POST['ly']) && strstr($_POST['ly'], "lyInfo") == false)
		{
			Store::setErrorRegister("Algo deu errado, favor atualizar a página!");
			exit;
		}

	}
	

	$store = new Store();

	$store->setData([
		'ly' => isset($_POST['ly']) && !empty($_POST['ly']) ? $_POST['ly'] : "",
        'ck' => isset($_POST['ck']) && $_POST['ck'] >= 0 && $_POST['ck'] <= 1 ? $_POST['ck'] : "",
        'idLayoutInfo' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $store->savePayOption();
			$msg = $res ? "Opção de Pagamento Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;*/

		case 2:
			$res = $store->updateLayoutInfo();
			$msg = $res ? "Opção Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $store->deletePayOption();
			$msg = $res ? "Opção de Pagamento Deletado com Sucesso!" : "Nada Foi Deletado!";
		break;*/
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/stores/{id}/layout/footer/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		if(isset($_POST['ly']) && empty($_POST['ly']) || !isset($_POST['ly']) || isset($_POST['ly']) && !empty($_POST['ly']) && strstr($_POST['ly'], "lyFooter") == false)
		{
			Store::setErrorRegister("Algo deu errado, favor atualizar a página!");
			exit;
		}

	}
	

	$store = new Store();

	$store->setData([
		'ly' => isset($_POST['ly']) && !empty($_POST['ly']) ? $_POST['ly'] : "",
        'ck' => isset($_POST['ck']) && $_POST['ck'] >= 0 && $_POST['ck'] <= 1 ? $_POST['ck'] : "",
        'idLayoutFooter' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'id' => $args['id']
	]);

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $store->savePayOption();
			$msg = $res ? "Opção de Pagamento Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;*/

		case 2:
			$res = $store->updateLayoutFooter();
			$msg = $res ? "Opção Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $store->deletePayOption();
			$msg = $res ? "Opção de Pagamento Deletado com Sucesso!" : "Nada Foi Deletado!";
		break;*/
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/stores/{id}/layout/color/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	$array = [];

	if($_POST['type'] != 3)
	{
		
		if(count($_POST) > 20)
		{
			
			foreach ($_POST as $key => $value) {
				
				if($key != "id" && $key != "type" && $key != "selectThemeColor" && strstr($key, "_") != false && ctype_lower(str_replace("_", "", $key)) && strstr($value, "#") != false)
				{
					
					if(!isset($array[strstr($key, "_", true)])) $array[strstr($key, "_", true)] = [];

					if(!isset($array[strstr($key, "_", true)][substr(strstr($key, "_"), 1)])) $array[strstr($key, "_", true)][substr(strstr($key, "_"), 1)] = $value;

				} else if($key != "id" && $key != "type" && $key != "selectThemeColor") {
					Store::setErrorRegister("Erro fatal, favor atualizar a página!");
					exit;
				}

			}

			$array = Store::configJsonLayoutColor($array);

		} else {
			Store::setErrorRegister("Erro no envio, favor atualizar a página!");
			exit;
		}

		if(is_array($array) && count($array) < 5 || $array == 0)
		{
			Store::setErrorRegister("Erro ao executar script, favor atualizar a página!");
			exit;
		}

	}
	
	$store = new Store();

	$store->setData([
        'options' => isset($array) && is_array($array) && count($array) == 5 ? $array : "",
        'idLayoutColor' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
        'themeColor' => isset($_POST['selectThemeColor']) && $_POST['selectThemeColor'] > 0 && $_POST['selectThemeColor'] <= 6 ? $_POST['selectThemeColor'] : 0,
        'id' => $args['id']
	]);

	/*$test = [
		"options" => $store->getoptions(),
		"idLayoutColor" => $store->getidLayoutColor(),
		"id" => $store->getid()
	];

	var_dump($test);
	exit;*/

	switch ($_POST['type']) {
		
		case 2:
			$res = $store->updateLayoutColor();
			$msg = $res ? "Cores Atualizadas com Sucesso!" : "Nada Foi Atualizado!";
		break;

		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/stores/{id}/layout/", function(Request $request, Response $response, $args) {

	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$color = Store::listLayoutColor($args['id']);
	if(isset($color[0]['options']) && isset($_GET['themeColor']) && is_numeric($_GET['themeColor']) && $_GET['themeColor'] > 0 && $_GET['themeColor'] <= 6) $color[0]['options'] = Store::listLayoutTheme($_GET['themeColor']);

	$admin->setTpl("stores-layout", [
		"errorRegister" => Store::getErrorRegister(),
		"successMsg"=> Store::getSuccessMsg(),
		"storeLayoutHeader" => Store::listLayoutHeader($args['id']),
		"storeLayoutInfo" => Store::listLayoutInfo($args['id']),
		"storeLayoutFooter" => Store::listLayoutFooter($args['id']),
		"storeLayoutColor" => $color, 
		"storeDep" => Mercato::getDepartaments($args['id'])
	]);
	
	return $response;

});

// Page Store Freigth
$app->post("/admin/stores/{id}/freight/freight/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	$array = [];

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['inputFreightCep']) && strlen($_POST['inputFreightCep']) == 9)
		{
			$cep = Store::listFreightCep(['cep' => $_POST['inputFreightCep'], 'id' => $args['id']], 1);
			$cep = $cep['idFreight'] == $_POST['id'] ? 0 : $cep;
		}

		if(!isset($_POST['inputFreightCity']) && isset($_POST['inputFreightDistrict']) && empty($_POST['inputFreightDistrict']) || !isset($_POST['inputFreightDistrict']))
		{
			Store::setErrorRegister("Digite o nome do bairro!");
			exit;
		}

		if(isset($_POST['selectFreightCity']) && $_POST['selectFreightCity'] == 0 && strlen($_POST['selectFreightCity']) == 1 || isset($_POST['selectFreightCity']) && strstr($_POST['selectFreightCity'], '_') == false || !isset($_POST['selectFreightCity']))
		{
			Store::setErrorRegister("Selecione uma cidade!");
			exit;
		} else if(Store::listCities($_POST['selectFreightCity']) == 0)
		{
			Store::setErrorRegister("Erro Critico, atualize a página!");
			exit;
		}

		if(isset($_POST['inputFreightCep']) && !empty($_POST['inputFreightCep']) && strlen($_POST['inputFreightCep']) != 9 || !isset($_POST['inputFreightCep']))
		{
			Store::setErrorRegister("Digite o resto do CEP!");
			exit;
		} else if(isset($_POST['inputFreightCep']) && strlen($_POST['inputFreightCep']) == 9 && $cep != 0)
		{
			Store::setErrorRegister("Já existe um frete cadastrado com esse cep!");
			exit;
		}

		if(isset($_POST['selectFreightType']) && $_POST['selectFreightType'] != 0 && $_POST['selectFreightType'] != 1 || !isset($_POST['selectFreightType']) || isset($_POST['selectFreightStatus0']) && $_POST['selectFreightStatus0'] != 0 && $_POST['selectFreightStatus0'] != 1 || !isset($_POST['selectFreightStatus0']) || isset($_POST['selectFreightStatus0']) && $_POST['selectFreightStatus0'] != 0 && $_POST['selectFreightStatus0'] != 1 || !isset($_POST['selectFreightStatus0']))
		{
			Store::setErrorRegister("Ocorreu um problema, favor atualizar página!");
			exit;
		}

		if(isset($_POST['inputFreightValue0']) && isset($_POST['inputFreightValue1']))
		{
			$array = Store::configJsonFreight([
				0 => [
					"value" => !empty($_POST['inputFreightValue0']) && is_numeric($_POST['inputFreightValue0']) ? $_POST['inputFreightValue0'] : 0,
					"status" => isset($_POST['selectFreightStatus0']) && $_POST['selectFreightStatus0'] >= 0 && $_POST['selectFreightStatus0'] <= 1 ? $_POST['selectFreightStatus0'] : 0 
				], 
				1 => [
					"value" => !empty($_POST['inputFreightValue1']) && is_numeric($_POST['inputFreightValue1']) ? $_POST['inputFreightValue1'] : 0,
					"status" => isset($_POST['selectFreightStatus1']) && $_POST['selectFreightStatus1'] >= 0 && $_POST['selectFreightStatus1'] <= 1 ? $_POST['selectFreightStatus1'] : 0 
				]
			]);
			$address = Store::listCities($_POST['selectFreightCity']);
		} else {
			Store::setErrorRegister("Erro Fatal, favor atualizar página! Se persistir falar com o suporte técnico!");
			exit;
		}

	}

	$store = new Store();

	$store->setData([
        'idFreight' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
		'id' => $args['id'],
		'codeCity' => isset($_POST['selectFreightCity']) && strlen($_POST['selectFreightCity']) > 1 && strstr($_POST['selectFreightCity'], "_") != false ? $_POST['selectFreightCity'] : 0,
		'district' => isset($_POST['inputFreightDistrict']) && !empty($_POST['inputFreightDistrict']) ? $_POST['inputFreightDistrict'] : "",
		'cep' => isset($_POST['inputFreightCep']) && !empty($_POST['inputFreightCep']) && strlen($_POST['inputFreightCep']) == 9 ? Store::decryptCep($_POST['inputFreightCep']) : "",
		'city' => isset($address[0]['cidades'][0]) && !empty($address[0]['cidades'][0]) ? $address[0]['cidades'][0] : "",
		'uf' => isset($address[0]['sigla']) && !empty($address[0]['sigla']) ? $address[0]['sigla'] : "",
		'only' => isset($_POST['inputFreightCity']) ? 1 : 0,
        'details' => isset($array) && is_array($array) && count($array) > 0 ? $array : ""
	]);

	/*$test = [
		'idFreight' => $store->getidFreight(), 
		'id' => $store->getid(),
		'codeCity' => $store->getcodeCity(),
		'district' => $store->getdistrict(),
		'cep' => $store->getcep(),
		'city' => $store->getcity(),
		'uf' => $store->getuf(),
		'only' => $store->getonly(),
        'details' => $store->getdetails()
	];

	var_dump($test);
	exit;*/

	switch ($_POST['type']) {
		
		case 1:
			$res = $store->saveFreight();
			$msg = $res ? "Frete Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 2:
			$res = $store->updateFreight();
			$msg = $res ? "Frete Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = $store->deleteFreight();
			$msg = $res ? "Frete Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;

		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/stores/{id}/freight/", function(Request $request, Response $response, $args) {

	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-freight", [
		"errorRegister" => Store::getErrorRegister(),
		"successMsg"=> Store::getSuccessMsg(),
		"cities" => Store::listCities(),
		"storeFreight" => Store::listFreight($args['id']),
	]);
	
	return $response;

});

// Page Store Horary
$app->post("/admin/stores/{id}/horary/horary/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	$array = [];

	if($_POST['type'] >= 1 && $_POST['type'] <= 3)
	{
		
		if(isset($_POST['inputHoraryInit0']) && empty($_POST['inputHoraryInit0']) || !isset($_POST['inputHoraryInit0']) || isset($_POST['inputHoraryFinal0']) && empty($_POST['inputHoraryFinal0']) || !isset($_POST['inputHoraryFinal0']))
		{
			Store::setErrorRegister("Insira os valores no periodo 1!");
			exit;
		}

		if(isset($_POST['inputHoraryInit1']) && empty($_POST['inputHoraryInit1']) || !isset($_POST['inputHoraryInit1']) || isset($_POST['inputHoraryFinal1']) && empty($_POST['inputHoraryFinal1']) || !isset($_POST['inputHoraryFinal1']))
		{
			Store::setErrorRegister("Insira os valores no periodo 2!");
			exit;
		}

		if($_POST['inputHoraryInit0'] != "00:00" || $_POST['inputHoraryFinal0'] != "00:00")
		{

			if($_POST['inputHoraryInit0'] >= $_POST['inputHoraryFinal0'])
			{
				Store::setErrorRegister("Periodo 1 não pode iniciar com o horário igual ou superior ao horário final do periodo!");
				exit;
			}

			if($_POST['inputHoraryInit0'] >= $_POST['inputHoraryInit1'] && $_POST['inputHoraryInit0'] <= $_POST['inputHoraryFinal1'])
			{
				Store::setErrorRegister("O periodo 1 não pode iniciar com um horário dentro do periodo 2!");
				exit;
			}

		}

		if($_POST['inputHoraryInit1'] != "00:00" || $_POST['inputHoraryFinal1'] != "00:00")
		{

			if($_POST['inputHoraryInit1'] >= $_POST['inputHoraryFinal1'])
			{
				Store::setErrorRegister("Periodo 2 não pode iniciar com o horário igual ou superior ao horário final do periodo!");
				exit;
			}

			if($_POST['inputHoraryInit1'] >= $_POST['inputHoraryInit0'] && $_POST['inputHoraryInit1'] <= $_POST['inputHoraryFinal0'])
			{
				Store::setErrorRegister("O periodo 2 não pode iniciar com um horário dentro do periodo 1!");
				exit;
			}

		}

		if(isset($_POST['id']) && isset($_POST['day']) && isset($_POST['inputHoraryValue0']) && isset($_POST['inputHoraryValue1']) && $_POST['id'] > 0 && $_POST['day'] > 0 && $_POST['day'] <= 7)
		{

			$array = Store::configJsonHorary([
				"id" => $_POST['id'],
				"idStore" => $args['id'],
				"day" => $_POST['day'],
				"type" => $_POST['type'],
				"horary" => [
					0 => [
						"init" => $_POST['inputHoraryInit0'],
						"final" => $_POST['inputHoraryFinal0'],
						"value" => is_numeric($_POST['inputHoraryValue0']) ? floatval($_POST['inputHoraryValue0']) : 0,
					],
					1 => [
						"init" => $_POST['inputHoraryInit1'],
						"final" => $_POST['inputHoraryFinal1'],
						"value" => is_numeric($_POST['inputHoraryValue1']) ? floatval($_POST['inputHoraryValue1']) : 0,
					]
				]
			]);
			
		} else {
			Store::setErrorRegister("Erro Fatal, favor atualize a página!");
			exit;
		}

	}

	$store = new Store();

	$store->setData([
        'idHorary' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
		'id' => $args['id'],
        'details' => isset($array) && is_array($array) && count($array) > 0 ? $array : ""
	]);

	/*$test = [
		'idHorary' => $store->getidHorary(), 
		'id' => $store->getid(),
        'details' => $store->getdetails()
	];

	var_dump($test);
	exit;*/

	if($_POST['type'] >= 1 && $_POST['type'] <= 3)
	{
		$res = $store->updateHorary();
		$msg = $res ? "Horário Atualizado com Sucesso!" : "Nada Foi Atualizado!";
	} else {
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/stores/{id}/horary/", function(Request $request, Response $response, $args) {
	
	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-horary", [
		"errorRegister" => Store::getErrorRegister(),
		"successMsg"=> Store::getSuccessMsg(),
		"storeHorary" => Store::listHoraryStore($args['id'])
	]);
	
	return $response;

});

// Page Store Images
$app->post("/admin/stores/{id}/images/images/", function(Request $request, Response $response, $args) {
	
	Store::checkAdmin($args['id']);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3 || isset($_FILES['inputImg']) && !empty($_FILES['inputImg']['tmp_name']))
	{
		
		if(isset($_POST['origin']) && empty($_POST['origin']) || !isset($_POST['origin']))
		{
			Store::setErrorRegister('Erro Fatal, favor atualizar a página!!');
			exit;
		}

		if(strlen($_POST['origin']) < 28)
		{
			Store::setErrorRegister('Erro, favor atualizar a página!!');
			exit;
		}

		if(isset($_FILES['inputImg']) && empty($_FILES['inputImg']['tmp_name']))
		{
			Store::setErrorRegister('Insira uma imagem!!');
			exit;
		}

		if(isset($_FILES['inputImg']) && substr($_FILES['inputImg']['type'], 0, 5) != "image" && substr($_FILES['inputImg']['type'], 6) != "png" && substr($_FILES['inputImg']['type'], 6) != "jpeg")
		{
			Store::setErrorRegister('Formato do arquivo inválido!');
			exit;
		}

	}

	if($_POST['type'] >= 1 && $_POST['type'] <= 2 && isset($_FILES['inputImg']) && !empty($_FILES['inputImg']['tmp_name']) && !empty($_POST['origin']))
	{	

		if(file_exists($_POST['origin'])){
			unlink($_POST['origin']);
		}
		move_uploaded_file($_FILES['inputImg']['tmp_name'], $_POST['origin']);
		$res = true;

	} else if($_POST['type'] == 3 && !empty($_POST['origin'])){

		if(file_exists($_POST['origin'])){
			unlink($_POST['origin']);
			$res = true;
		} else{
			$res = false;
		}

	} else{
		$res = false;
	}
	
	switch ($_POST['type']) {
		
		case 1:
			$msg = $res ? "Imagem Inserida com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$msg = $res ? "Imagem Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$msg = $res ? "Imagem Deletada com Sucesso!" : "Nada Foi Deletado!";
		break;
		
		default:
			Store::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Store::setSuccessMsg($msg);
	} else {
		Store::setErrorRegister($msg);
	}
	
	$array = [
		"res" => intval($res),
		"src" => isset($_POST['origin']) && !empty($_POST['origin']) ? "/".$_POST['origin']."?" : ""
	];

	echo json_encode($array);
	exit;
	
});

$app->get("/admin/stores/{id}/images/", function(Request $request, Response $response, $args) {
	
	$admin = new PageAdmin([
		"id" => $args['id'],
		"login" => 2
	]);

	$admin->setTpl("stores-images", [
		"errorRegister" => Store::getErrorRegister(),
		"successMsg"=> Store::getSuccessMsg(),
		"storeImgs" => Store::listImagesStore($args['id'])
	]);
	
	return $response;

});

// Page Order Horary
$app->get("/admin/orders-horary/", function(Request $request, Response $response) {

	$param = [
		":STORE" => isset($_GET['store']) && $_GET['store'] > 0 ? $_GET['store'] : $_SESSION[PageAdmin::STORE],
		":STATUS" => isset($_GET['status']) && $_GET['status'] > 0 ? $_GET['status'] : 0,
		":PAID" => isset($_GET['paid']) && is_numeric($_GET['paid']) ? $_GET['paid'] : 0,
		":INI" => isset($_GET['ini']) && $_GET['ini'] != "0000-00-00" ? $_GET['ini'] : date("Y-m-01"),
		":FIN" => isset($_GET['fin']) && $_GET['fin'] != "0000-00-00" ? $_GET['fin'] : date("Y-m-d"),
	];

	$array = [
		"store" => $param[":STORE"],
		"status" => $param[":STATUS"],
		"paid" => $param[":PAID"],
		"ini" => $param[":INI"],
		"fin" => $param[":FIN"],
	];
	
	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("orders-horary", [
		"stores" => Store::listStores(),
		"orders" => Order::listOrders(0, $param, 1, 1),
		"ordersStatus" => Order::listOrdersStatus(),
		"param" => $array
	]);
	
	return $response;

});

// Page Order
$app->get("/admin/orders/", function(Request $request, Response $response) {

	$param = [
		":STORE" => isset($_GET['store']) && $_GET['store'] > 0 ? $_GET['store'] : $_SESSION[PageAdmin::STORE],
		":STATUS" => isset($_GET['status']) && $_GET['status'] > 0 ? $_GET['status'] : 0,
		":PAID" => isset($_GET['paid']) && is_numeric($_GET['paid']) ? $_GET['paid'] : 0,
		":INI" => isset($_GET['ini']) && $_GET['ini'] != "0000-00-00" ? $_GET['ini'] : date("Y-m-01"),
		":FIN" => isset($_GET['fin']) && $_GET['fin'] != "0000-00-00" ? $_GET['fin'] : date("Y-m-d"),
	];

	$array = [
		"store" => $param[":STORE"],
		"status" => $param[":STATUS"],
		"paid" => $param[":PAID"],
		"ini" => $param[":INI"],
		"fin" => $param[":FIN"],
	];
	
	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("orders", [
		"stores" => Store::listStores(),
		"orders" => Order::listOrders(0, $param, 1),
		"ordersStatus" => Order::listOrdersStatus(),
		"param" => $array
	]);
	
	return $response;

});

// Page Order Detail
$app->post("/admin/orders/{id}/products/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0) header("Location: /admin/orders/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['selectProductOrder']) && $_POST['selectProductOrder'] <= 0 || !is_numeric($_POST['selectProductOrder']) || !isset($_POST['selectProductOrder']) || Mercato::searchProductId($orders[0]['idStore'], $_POST['selectProductOrder']) == 0)
		{
			Order::setErrorRegister("Selecione um produto!");
			exit;
		}

		if(isset($_POST['inputQtdOrder']) && $_POST['inputQtdOrder'] <= 0 || !is_numeric($_POST['inputQtdOrder']) || !isset($_POST['inputQtdOrder']))
		{
			Order::setErrorRegister("Digite uma quantidade válida do produto!");
			exit;
		}

		if(isset($_POST['inputDescOrder']) && $_POST['inputDescOrder'] < 0 || !is_numeric($_POST['inputDescOrder']) || !isset($_POST['inputDescOrder']))
		{
			Order::setErrorRegister("Digite um desconto válida do produto!");
			exit;
		}

		$product = Mercato::searchProductId($orders[0]['idStore'], $_POST['selectProductOrder']);

	}

	$ors = new Order();

	$ors->setData([
		"id" => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
		"cart" => isset($_POST['cart']) && $_POST['cart'] > 0 ? $_POST['cart'] : 0,
		"barCode" => isset($product['barCode']) && !empty($product['barCode']) ? $product['barCode'] : "",
		"product" => isset($product['codProduct']) && $product['codProduct'] > 0 ? $product['codProduct'] : 0,
		"desc" => isset($product['name']) && !empty($product['name']) ? $product['name'] : "",
		"qtd" => isset($_POST['inputQtdOrder']) && $_POST['inputQtdOrder'] > 0 ? $_POST['inputQtdOrder'] : 0,
		"unit" => isset($product['unit']) && !empty($product['unit']) ? $product['unit'] : "",
		"price" => isset($product['priceFinal']) && $product['priceFinal'] > 0 ? $product['priceFinal'] : 0,
		"dis" => isset($_POST['inputDescOrder']) && floatval($_POST['inputDescOrder']) <= (floatval($product['priceFinal']) * floatval($_POST['inputQtdOrder'])) ? $_POST['inputDescOrder'] : 0,
		"img" => isset($product['image']) && !empty($product['image']) ? $product['image'] : ""
	]);

	switch ($_POST['type']) {
		
		case 1:
			$res = $ors->insertCartItem();
			$msg = $res ? "Item Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 2:
			$res = $ors->updateCartItem();
			$msg = $res ? "Item Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$res = Order::deleteCartItem($ors->getid());
			$msg = $res ? "Item Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;

		default:
			Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Order::refreshOrder($args['id']);
		Order::setSuccessMsg($msg);
	} else {
		Order::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/orders/{id}/payment/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0) header("Location: /admin/orders/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['selectTypePayOrder']) && $_POST['selectTypePayOrder'] == 0 || !is_numeric($_POST['selectTypePayOrder']) || !isset($_POST['selectTypePayOrder']))
		{
			Order::setErrorRegister("Selecione uma opção de pagamento!");
			exit;
		}

		if(isset($_POST['inputOrderPay']) && $_POST['inputOrderPay'] <= 0 || isset($_POST['inputOrderPay']) && !is_numeric($_POST['inputOrderPay']))
		{
			Order::setErrorRegister("Digite um troco válido!");
			exit;
		} else if(isset($_POST['inputOrderPay']) && floatval($_POST['inputOrderPay']) < floatval($orders[0]['total'])){
			Order::setErrorRegister("Troco tem que ser maior que o valor total do pedido!");
			exit;
		}

	}

	$pay = Store::listPay($_POST['selectTypePayOrder'], 0, "py.idPayment");
	$pay = Store::configJsonPayment($pay[0]);

	$array = [
		":ID" => intval($args['id']),
		":PAYMENT" => isset($pay) && is_array($pay) ? json_encode($pay) : "",
		":PAY" => isset($_POST['inputOrderPay']) && $_POST['inputOrderPay'] > 0 && is_numeric($_POST['inputOrderPay']) && floatval($_POST['inputOrderPay']) >= floatval($orders[0]['total']) ? floatval($_POST['inputOrderPay']) : 0
	];

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $ors->insertCartItem();
			$msg = $res ? "Item Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		case 2:
			$res = Order::updateOrderSet("changePay = :PAY, payment = :PAYMENT", $array);
			$msg = $res ? "Pagamento Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $user->deleteFreight();
			$msg = $res ? "Frete Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		default:
			Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Order::refreshOrder($args['id']);
		Order::setSuccessMsg($msg);
	} else {
		Order::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/orders/{id}/horary/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0) header("Location: /admin/orders/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['dateHoraryOrder']) && empty($_POST['dateHoraryOrder']) || $_POST['dateHoraryOrder'] < date("Y-m-d") || !isset($_POST['dateHoraryOrder']))
		{
			Order::setErrorRegister("Digite uma data válida!");
			exit;
		}

		if(isset($_POST['priceHoraryOrder']) && $_POST['priceHoraryOrder'] < 0 || $_POST['priceHoraryOrder'] == "" || !is_numeric($_POST['priceHoraryOrder']) || !isset($_POST['priceHoraryOrder']))
		{
			Order::setErrorRegister("Digite um valor válido pro agendamento!");
			exit;
		} 

	}

	$array = [
		":ID" => intval($args['id']),
		":INIT" => isset($_POST['timeInitOrder']) ? $_POST['timeInitOrder'] : 0,
		":FINAL" => isset($_POST['timeFinalOrder']) ? $_POST['timeFinalOrder'] : 0,
		":PRICE" => isset($_POST['priceHoraryOrder']) && is_numeric($_POST['priceHoraryOrder']) && $_POST['priceHoraryOrder'] >= 0 ? floatval($_POST['priceHoraryOrder']): 0,
		":DATE" => isset($_POST['dateHoraryOrder']) && !empty($_POST['dateHoraryOrder']) && $_POST['dateHoraryOrder'] >= date("Y-m-d") ? $_POST['dateHoraryOrder'] : 0,
	];

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $ors->insertCartItem();
			$msg = $res ? "Item Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		case 2:
			$res = Order::updateOrderSet("dateHorary = :DATE, timeInitial = :INIT, timeFinal = :FINAL, priceHorary = :PRICE", $array);
			$msg = $res ? "Agendamento Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $user->deleteFreight();
			$msg = $res ? "Frete Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		default:
			Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Order::refreshOrder($args['id']);
		Order::setSuccessMsg($msg);
	} else {
		Order::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/orders/{id}/promo/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0) header("Location: /admin/orders/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['selectPromoOrder']) && $_POST['selectPromoOrder'] == 0 || !is_numeric($_POST['selectPromoOrder']) || !isset($_POST['selectPromoOrder']))
		{
			Order::setErrorRegister("Selecione uma promoção!");
			exit;
		}

	}

	$array = [
		":ID" => intval($args['id']),
		":PROMO" => isset($_POST['selectPromoOrder']) && $_POST['selectPromoOrder'] > 0 && is_numeric($_POST['selectPromoOrder']) ? $_POST['selectPromoOrder'] : 0,
	];

	switch ($_POST['type']) {
		
		/*case 1:
			$res = $ors->insertCartItem();
			$msg = $res ? "Item Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		case 2:
			$res = Order::updateOrderSet("idPromo = :PROMO", $array);
			$msg = $res ? "Promoção Atualizada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		case 3:
			$array[':PROMO'] = 0;
			$res = Order::updateOrderSet("idPromo = :PROMO", $array);
			$msg = $res ? "Promoção Retirada com Sucesso!" : "Nada Foi Atualizado!";
		break;

		default:
			Order::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		Order::refreshOrder($args['id']);
		Order::setSuccessMsg($msg);
	} else {
		Order::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/orders/{id}/status/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0 || !isset($_POST['status']) || !is_numeric($_POST['status']))
	{
		header("Location: /admin/orders/");
	} else {

		$status = Order::listOrdersStatus($_POST['status']);
		$json = $status != 0 ? Order::configJsonOrderStatus($status[0]['descStatus']) : 0;

		$details = json_decode($orders[0]['status'], true);

		if($json != 0 && $status[0]['descStatus'] != $details["orderStatus"][count($details["orderStatus"]) - 1]['name']) $details["orderStatus"][count($details["orderStatus"])] = $json;

	}
	
	$array = [
		":ID" => isset($args['id']) && $args['id'] > 0 && is_numeric($args['id']) ? intval($args['id']) : 0,
		":STATUS" => isset($_POST['status']) && $_POST['status'] > 0 && is_numeric($_POST['status']) ? intval($status[0]['idOrderStatus']) : 1,
		":DET" => json_encode($details)
	];

	if($array[':ID'] > 0 && $array[':STATUS'] > 0 )
	{
		$res = Order::alterOrderByStatus($args['id'], $_POST['status']);

		if($res != false && isset($res['status']) && $res['status'] == 1)
		{
			Order::updateOrderSet("idOrderStatus = :STATUS, status = :DET", $array);
		}

	} else {
		$res = 0;
		exit;
	}
	
	if($res != false)
	{
		Order::refreshOrder($args['id']);
	} 

	echo $res != false ? json_encode($res) : 0;
	exit;

});

$app->post("/admin/orders/{id}/alert/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listOrders($args['id']);

	if($orders == 0)
	{
		header("Location: /admin/orders/");
	}

	$res = Order::orderAlert($args['id'], ["title"=>"Pedido #".$args['id']." - Informações Alteradas", "text" => "Seu pedido teve algumas informações alteradas, para ver o que foi alterado acesse o pedido clicando no botão abaixo (certifique-se de estar logado no site para conseguir acessar o link), se você não estiver em acordo com o que foi alterado, entre em contato com a nossa loja.", "subject"=>"Seu Pedido Sofreu Alterações", "link"=>"http://www.ecommerce-astemac.com.br/loja-01/account/requests/".$args['id']."/"]);

	if($res)
	{
		Order::setSuccessMsg("E-mail Enviado!");
		echo 1;
	} else {
		Order::setErrorRegister("Erro! Nada Foi Enviado.");
	}

	exit;

});

$app->get("/admin/orders/{id}/", function(Request $request, Response $response, $args) {

	$orders = Order::listOrders($args['id']);
	$types = [1 => "horary", 2 => "delivery", 3 => "withdrawal"];

	if($orders == 0) header("Location: /admin/orders/");

	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("orders-details", [
		"errorRegister" => Order::getErrorRegister(),
		"successMsg"=> Order::getSuccessMsg(),
		"orders" => $orders,
		"ordersStatus" => Order::listOrdersStatus(),
		"products" => Mercato::listAllProducts($orders[0]['infoStore']['store']),
		"pays" => Store::listPay($orders[0]['idStore'], 1),
		"horary" => Store::listHoraryStore($orders[0]['idStore'], 1, $types[$orders[0]['typeModality']]),
		"promotions" => Store::listPromoAdmin()
	]);
	
	return $response;

});

// Page User
$app->get("/admin/users/", function(Request $request, Response $response) {

	$param = [
		":ADMIN" => isset($_GET['type']) && $_GET['type'] >= 0 && $_GET['type'] <= 2 ? $_GET['type'] : 0,
		":STATUS" => isset($_GET['status']) && $_GET['status'] >= 0 && $_GET['status'] <= 1 ? $_GET['status'] : 1,
		"desc" => isset($_GET['desc']) && !empty($_GET['desc']) ? strtolower($_GET['desc']) : "",
	];

	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("users", [
		"userData" => User::listUsers(0, $param)
	]);
	
	return $response;

});

// Page User Detail
$app->post("/admin/users/{id}/details/", function(Request $request, Response $response, $args) {
	
	if(User::listUsers($args['id']) == 0) header("Location: /admin/users/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		User::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	if($_POST['type'] != 3)
	{
		
		$nameUser = explode(' ', $_POST['inputName']);

		if(isset($_POST['inputName']) && empty($_POST['inputName']))
		{
			User::setErrorRegister("Digite seu nome!");
			exit;
		} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){
			User::setErrorRegister("Digite seu sobrenome!");
			exit;
		} 

		if (!isset($_POST['inputEmail']) || $_POST['inputEmail'] == '')
		{
			User::setErrorRegister("Digite seu e-mail!");
			exit;
		} else if (!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)){
			User::setErrorRegister("Digite um e-mail válido!");
			exit;
		} else if (User::verifyUser($_POST['inputEmail'], $args['id']) === false){
			User::setErrorRegister("Ja existe um usário com esse e-mail!");
			exit;
		}

		if(isset($_POST['inputCpf']) && !empty($_POST['inputCpf']) && strlen($_POST['inputCpf']) < 14)
		{
			User::setErrorRegister("Digite um CPF válido!");
			exit;
		} else if (!empty($_POST['inputCpf']) && User::verifyCPF($_POST['inputCpf'], $args['id'])){
			User::setErrorRegister("CPF inválido!");
			exit;
		}

		if(isset($_POST['inputDateBirth']) && is_numeric(str_replace('-', '', $_POST['inputDateBirth'])) && str_replace('-', '', $_POST['inputDateBirth']) < "19200101")
		{
			User::setErrorRegister("Data Inválida!");
			exit;
		}

		if(isset($_POST['inputTelephone']) && !empty($_POST['inputTelephone']) && strlen($_POST['inputTelephone']) < 15)
		{
			User::setErrorRegister("Digite um telefone válido!");
			exit;
		}
		
		if(isset($_POST['inputWp']) && !empty($_POST['inputWp']) && strlen($_POST['inputWp']) < 15)
		{
			User::setErrorRegister("Digite um whatsapp válido!");
			exit;
		}

		if(isset($_POST['selectGenre']) && $_POST['selectGenre'] == 0 || !isset($_POST['selectGenre']) || isset($_POST['selectGenre']) && !is_numeric($_POST['selectGenre']))
		{
			User::setErrorRegister("Selecione um gênero!");
			exit;
		}

		if(isset($_POST['selectStatus']) && $_POST['selectStatus'] != 0 && $_POST['selectStatus'] != 1 || !isset($_POST['selectStatus']) || isset($_POST['selectStatus']) && !is_numeric($_POST['selectStatus']))
		{
			User::setErrorRegister("Status Inválido!");
			exit;
		}

		if(isset($_POST['selectType']) && $_POST['selectType'] != 0 && $_POST['selectType'] != 1 || !isset($_POST['selectType']) || isset($_POST['selectType']) && !is_numeric($_POST['selectType']))
		{
			User::setErrorRegister("Tipo Inválido!");
			exit;
		}

	}

	$user = new User();

	$user->setData([
		'idUser' => $args['id'],
		'name' => isset($_POST['inputName']) && isset($nameUser[0]) && !empty($nameUser[0]) && strstr($nameUser[0], " ") == false ? ucfirst(strtolower(strstr($_POST['inputName'], " ", true))) : "",
		'surname' => isset($_POST['inputName']) && isset($nameUser[1]) && !empty($nameUser[1]) && strstr($nameUser[1], " ") == false ? ucwords(strtolower(substr(strstr($_POST['inputName'], " "), 1))) : "",
		'email' => isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) && filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL) ? strtolower($_POST['inputEmail']) : "",
		'cpf' => isset($_POST['inputCpf']) && !empty($_POST['inputCpf']) && strlen($_POST['inputCpf']) == 14 ? User::cryptCode(User::decryptCPF($_POST['inputCpf'])) : "",
		'status' => isset($_POST['selectStatus']) && $_POST['selectStatus'] >= 0 && $_POST['selectStatus'] <= 1 && is_numeric($_POST['selectStatus']) ? intval($_POST['selectStatus']) : 0,
		'telephone' => isset($_POST['inputTelephone']) && !empty($_POST['inputTelephone']) && strlen($_POST['inputTelephone']) == 15 ? User::cryptCode(User::decryptTel($_POST['inputTelephone'])) : "", 
		'whatsapp' => isset($_POST['inputWp']) && !empty($_POST['inputWp']) && strlen($_POST['inputWp']) == 15 ? User::cryptCode(User::decryptTel($_POST['inputWp'])) : "",
		'genre' => isset($_POST['selectGenre']) && $_POST['selectGenre'] != 0 && is_numeric($_POST['selectGenre']) ? intval($_POST['selectGenre']) : 0,
		'admin' => isset($_POST['selectType']) && $_POST['selectType'] >= 0 && $_POST['selectType'] <= 1 && is_numeric($_POST['selectType']) ? intval($_POST['selectType']) : 0,
		'birth' => isset($_POST['inputDateBirth']) && is_numeric(str_replace('-', '', $_POST['inputDateBirth'])) && str_replace('-', '', $_POST['inputDateBirth']) > "19200101" ? $_POST['inputDateBirth'] : NULL

	]);

	/*$test = [
		'idUser' => $user->getidUser(),
		'name' => $user->getname(),
		'surname' => $user->getsurname(),
		'email' => $user->getemail(),
		'cpf' => $user->getcpf(),
		'status' => $user->getstatus(),
		'telephone' => $user->gettelephone(),
		'whatsapp' => $user->getwhatsapp(),
		'genre' => $user->getgenre(),
		'admin' => $user->getadmin(),
		'birth' => $user->getbirth()
	];
	
	var_dump($test);
	exit;*/
	
	switch ($_POST['type']) {
		
		/*case 1:
			$res = $user->saveFreight();
			$msg = $res ? "Frete Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		case 2:
			$res = $user->updateUser();
			$msg = $res ? "Usuário Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $user->deleteFreight();
			$msg = $res ? "Frete Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		default:
			User::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		User::setSuccessMsg($msg);
	} else {
		User::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->post("/admin/users/{id}/address/", function(Request $request, Response $response, $args) {
	
	if(User::listUsers($args['id']) == 0) header("Location: /admin/users/");

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		User::setErrorRegister("Erro no servidor, favor atualizar a página!");
		exit;
	}

	$array = [];

	if($_POST['type'] != 3)
	{
		
		if(isset($_POST['inputUserAddressStreet']) && empty($_POST['inputUserAddressStreet']) || !isset($_POST['inputUserAddressStreet']))
		{
			User::setErrorRegister("Digite o nome da rua!");
			exit;
		}

		if(isset($_POST['inputUserAddressNumber']) && empty($_POST['inputUserAddressNumber']) || !isset($_POST['inputUserAddressNumber']))
		{
			User::setErrorRegister("Digite um número!");
			exit;
		} else if(isset($_POST['inputUserAddressNumber']) && filter_var($_POST['inputUserAddressNumber'], FILTER_SANITIZE_NUMBER_INT) == "")
		{
			User::setErrorRegister("Digite um número válido!");
			exit;
		}

		if(isset($_POST['inputUserAddressCep']) && empty($_POST['inputUserAddressCep']) || !isset($_POST['inputUserAddressCep']))
		{
			User::setErrorRegister("Digite o Cep!");
			exit;
		}

		if(isset($_POST['inputUserAddressCep']) && !empty($_POST['inputUserAddressCep']) && strlen($_POST['inputUserAddressCep']) != 9 || !isset($_POST['inputUserAddressCep']))
		{
			User::setErrorRegister("Digite o resto do CEP!");
			exit;
		}

		if(isset($_POST['inputUserAddressDistrict']) && empty($_POST['inputUserAddressDistrict']) || !isset($_POST['inputUserAddressDistrict']))
		{
			User::setErrorRegister("Digite o nome do bairro!");
			exit;
		}

		if(isset($_POST['selectUserCity']) && $_POST['selectUserCity'] == 0 && strlen($_POST['selectUserCity']) == 1 || isset($_POST['selectUserCity']) && strstr($_POST['selectUserCity'], '_') == false || !isset($_POST['selectUserCity']))
		{
			User::setErrorRegister("Selecione uma cidade!");
			exit;
		} else if(Store::listCities($_POST['selectUserCity']) == 0)
		{
			User::setErrorRegister("Erro Critico, atualize a página!");
			exit;
		} else {
			$array = Store::listCities($_POST['selectUserCity']);
		}

	}

	$address = new Address();

	$address->setData([
        'idAddress' => isset($_POST['id']) && $_POST['id'] > 0 ? $_POST['id'] : 0,
		'idUser' => $args['id'],
		'codeCity' => isset($_POST['selectUserCity']) && strlen($_POST['selectUserCity']) > 1 && strstr($_POST['selectUserCity'], "_") != false ? $_POST['selectUserCity'] : 0,
		'street' => isset($_POST['inputUserAddressStreet']) && !empty($_POST['inputUserAddressStreet']) ? $_POST['inputUserAddressStreet'] : "",
		'number' => isset($_POST['inputUserAddressNumber']) && !empty($_POST['inputUserAddressNumber']) && filter_var($_POST['inputUserAddressNumber'], FILTER_SANITIZE_NUMBER_INT) != "" ? $_POST['inputUserAddressNumber'] : "",
		'district' => isset($_POST['inputUserAddressDistrict']) && !empty($_POST['inputUserAddressDistrict']) ? $_POST['inputUserAddressDistrict'] : "",
		'cep' => isset($_POST['inputUserAddressCep']) && !empty($_POST['inputUserAddressCep']) && strlen($_POST['inputUserAddressCep']) == 9 ? address::decryptCep($_POST['inputUserAddressCep']) : "",
		'complement' => isset($_POST['inputUserAddressComplement']) && !empty($_POST['inputUserAddressComplement']) ? $_POST['inputUserAddressComplement'] : "",
		'reference' => isset($_POST['inputUserAddressReference']) && !empty($_POST['inputUserAddressReference']) ? $_POST['inputUserAddressReference'] : "",
		'city' => isset($array[0]['cidades'][0]) && !empty($array[0]['cidades'][0]) ? $array[0]['cidades'][0] : "",
		'uf' => isset($array[0]['sigla']) && !empty($array[0]['sigla']) ? $array[0]['sigla'] : "",
	]);

	/*$test = [
		'idAddress' => $address->getidAddress(), 
		'idUser' => $address->getidUser(),
		'codeCity' => $address->getcodeCity(),
		'street' => $address->getstreet(),
		'number' => $address->getnumber(),
		'district' => $address->getdistrict(),
		'cep' => $address->getcep(),
		'complement' => $address->getcomplement(),
		'reference' => $address->getreference(),
		'city' => $address->getcity(),
		'uf' => $address->getuf()
	];
	*/
	
	switch ($_POST['type']) {
		
		/*case 1:
			$res = $address->saveFreight();
			$msg = $res ? "Frete Inserido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		case 2:
			$res = $address->updateAddress();
			$msg = $res ? "Endereço Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $address->deleteFreight();
			$msg = $res ? "Frete Excluido com Sucesso!" : "Nada Foi Atualizado!";
		break;*/

		default:
			User::setErrorRegister("Erro no servidor, favor atualizar a página!");
			exit;
		break;

	}

	if($res)
	{
		User::setSuccessMsg($msg);
	} else {
		User::setErrorRegister($msg);
	}

	echo intval($res);
	exit;

});

$app->get("/admin/users/{id}/", function(Request $request, Response $response, $args) {
	
	/*var_dump(Order::listOrdersStatus());
	exit;*/

	$param = [
		":STORE" => isset($_GET['store']) && $_GET['store'] > 0 ? $_GET['store'] : 1,
		":STATUS" => isset($_GET['status']) && $_GET['status'] > 0 ? $_GET['status'] : 0,
		":INI" => isset($_GET['ini']) && $_GET['ini'] != "0000-00-00" ? $_GET['ini'] : date("Y-m-01"),
		":FIN" => isset($_GET['fin']) && $_GET['fin'] != "0000-00-00" ? $_GET['fin'] : date("Y-m-d"),
	];

	if(User::listUsers($args['id']) == 0) header("Location: /admin/users/");

	$admin = new PageAdmin([
		"login" => 2
	]);

	$admin->setTpl("users-details", [
		"errorRegister" => User::getErrorRegister(),
		"successMsg"=> User::getSuccessMsg(),
		"cities" => Store::listCities(),
		"stores" => Store::listStores(),
		"ordersStatus" => Order::listOrdersStatus(),
		"userData" => User::listUsers($args['id'], $param)
	]);
	
	return $response;

});

?>