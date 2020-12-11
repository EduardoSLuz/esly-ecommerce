<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\DB\Sql;
use Esly\Model\Address;
use Esly\Model\Order;
use Esly\Model\Store;
use Esly\Model\User;

if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

// Page Account Requests
$app->get("/loja-{store}/account/requests/", function(Request $request, Response $response, $args) {

	$alerts = [
		"msg" => isset($_SESSION[Page::SESSION]['msg']) && !empty($_SESSION[Page::SESSION]['msg']) ? $_SESSION[Page::SESSION]['msg'] : "",
		"type" => 1,
		"time" => 1500,
	];

	$alerts['status'] = !empty($alerts['msg']) && is_numeric($alerts['type']) && $alerts['time'] > 0 ? 1 : 0;
	unset($_SESSION[Page::SESSION]['msg']);

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Pedidos"
		]
	]);

	$page->setTpl("account-requests", [
		'alerts' => $alerts,
		'orders' => Order::listAll()
	]);
	
	return $response;

});

// Page Account Requests Cancel
$app->post("/loja-{store}/account/requests/cancel/", function(Request $request, Response $response, $args) {
	
	$res = 0;
	Store::verifyStore($args["store"]);
	$orders = Order::listAll($_POST['id'], 1);

	if($orders == 0 || count($_POST) == 0) header("Location: /");

	$json = Order::jsonOrderStatus(9, $orders[0]['status']);

	if($orders[0]['idOrderStatus'] >= 2 && $orders[0]['idOrderStatus'] < 5 && $orders[0]['idOrderStatus'] != 9 && count($_POST) > 0 && $json != 0)
	{
		
		$res = Order::updateOrderSet("idOrderStatus = :STATUS, status = :JSON, dateUpdate = :DATE, timeUpdate = :TIME", [
			":ID" => intval($_POST['id']), 
			":STATUS" => 9, 
			":JSON" => json_encode($json),
			":DATE" => date("Y-m-d"),
			":TIME" => date("H:i:s")
		]);

	}

	echo intval($res);
	exit;

});

// Page Account Requests Details
$app->get("/loja-{store}/account/requests/{pedido}/", function(Request $request, Response $response, $args) {
	
	$orders = Order::listAll($args['pedido'], 1);

	if($orders == 0) header("Location: /");

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Pedido #".$args['pedido']
		]
	]);
	
	$page->setTpl("account-requests-details", [
		'orders' => $orders,
		'storeAddress' => $orders != 0 ? Store::listAll($orders[0]['idStore']) : 0
	]);
	
	return $response;

});

/* Page Account Shopping List
$app->get("/loja-{store}/account/shopping-list/", function(Request $request, Response $response, $args) {

	$shopp = true;

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$shopp === true  ? $shopp = "account-shoppinglist" : $shopp = "account-shoppinglist-default";	

	$page->setTpl($shopp, [
		
	]);
	
	return $response;

});

// Page Account Shopping List Details
$app->get("/loja-{store}/account/shopping-list/{list}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$page->setTpl("account-shoppinglist-details", [
	
	]);
	
	return $response;

});*/

// Page Account Info
$app->post("/loja-{store}/account/data/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];
	
	$nameUser = explode(' ', $_POST['NameInfo']);

	if(isset($_POST['NameInfo']) && empty($_POST['NameInfo']))
	{

		$res["msg"] = "Digite seu nome!";
		echo json_encode($res);
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		$res["msg"] = "Digite seu sobrenome!";
		echo json_encode($res);
		exit;

	} 

	if(isset($_POST['CpfInfo']) && !empty($_POST['CpfInfo']) && strlen($_POST['CpfInfo']) < 14)
	{

		$res["msg"] = "Digite um CPF válido!";
		echo json_encode($res);
		exit;

	} else if (!empty($_POST['CpfInfo']) && User::verifyCPF($_POST['CpfInfo'])){

		$res["msg"] = "CPF inválido!";
		echo json_encode($res);
		exit;

	}

	if(isset($_POST['DateInfo']) && is_numeric(str_replace('-', '', $_POST['DateInfo'])) && str_replace('-', '', $_POST['DateInfo']) < "19200101")
	{
		$res["msg"] = "Data Inválida!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['TelInfo']) && !empty($_POST['TelInfo']) && strlen($_POST['TelInfo']) != 14 && strlen($_POST['TelInfo']) != 15)
	{
		$res["msg"] = "Digite um telefone válido!";
		echo json_encode($res);
		exit;
	}
	
	if(isset($_POST['WpInfo']) && !empty($_POST['WpInfo']) && strlen($_POST['WpInfo']) != 14 && strlen($_POST['WpInfo']) != 15)
	{
		$res["msg"] = "Digite um whatsapp válido!";
		echo json_encode($res);
		exit;
	}

	$user = new User();

    $user->setData([
        'emailUser' => $_SESSION[User::SESSION]['emailUser'],
		'nameUser' => $_POST['NameInfo'],
		'cpfUser' => $_POST['CpfInfo'],
		'dateBirthUser' => $_POST['DateInfo'],
		'genreUser' => $_POST['SxInfo'],
		'telUser' => $_POST['TelInfo'],
		'wpUser' => $_POST['WpInfo']
	]);
	
	$update = $user->update();
		
	if($update)
	{

		$res = [
			"msg" => "Dados Atualizados com Sucesso.",
			"status" => 1
		];

	} else {
		$res["msg"] = "Nada Foi Atualizado!";
	}

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/account/data/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Meus Dados"
		]
	]);

	$page->setTpl("account-info", [
		"errorRegister" => User::getErrorRegister(),
        'successMsg'=> User::getSuccessMsg(),
		'userAll' => User::listAll()
	]);
	
	return $response;

});

// Page Account Info Password
$app->post("/loja-{store}/account/data/password/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if(isset($_POST['PassInfo']) && empty($_POST['PassInfo']))
	{

		$res["msg"] = "Digite sua senha atual!";
		echo json_encode($res);
		exit;

	} else if(User::verifyPass($_POST['PassInfo']) === false)
	{

		$res["msg"] = "Senha Atual Inválida!";
		echo json_encode($res);
		exit;

	}

	if(isset($_POST['PassNewInfo']) && empty($_POST['PassNewInfo']))
	{

		$res["msg"] = "Digite uma nova senha!";
		echo json_encode($res);
		exit;

	} else if($_POST['PassNewInfo'] == $_POST['PassInfo'])
	{

		$res["msg"] = "Nova senha não pode ser igual a sua atual!";
		echo json_encode($res);
		exit;

	}
	
	if(isset($_POST['PassNewCfInfo']) && empty($_POST['PassNewCfInfo']))
	{
		
		$res["msg"] = "Confirme sua nova senha!";
		echo json_encode($res);
		exit;
		
	} else if($_POST['PassNewCfInfo'] != $_POST['PassNewInfo']) {

		$res["msg"] = "Nova senha não é igual a senha a baixo!";
		echo json_encode($res);
		exit;

	}

	$alter = User::alterPass($_POST['PassNewCfInfo']);

	if($alter)
	{
		
		$res = [
			"msg" => "Senha alterada com sucesso!",
			"status" => 1
		];
		
	} else{
		$res["msg"] = "Falha ao alterar a senha! Tente novamente mais tarde, se persistir o erro contatar o suporte do site!";
	}

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/account/data/password/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Alterar Senha"
		]
	]);

	$page->setTpl("account-info-password", [
		'errorRegister' => User::getErrorRegister(),
        'successMsg'=> User::getSuccessMsg(),
	]);
	
	return $response;

});

// Page Account Address
$app->post("/loja-{store}/account/address/update/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	$code = isset($_POST['ckAd']) ? 1 : 0;

	$res = Address::activeMainAddress($_POST['adCode'], $code);

	header("Location: /loja-".$args['store']."/account/address/");
	exit;

});

$app->post("/loja-{store}/account/address/delete/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	$delete = Address::deleteAddress($_POST['adCode']);

	if($delete)
	{

		$res = [
			"msg" => "Endereço Apagado Com Successo!",
			"status" => 1
		];
			
	} else {
		$res["msg"] = "Erro no servidor, favor atualizar a página!";
	}

	echo json_encode($res);
	exit;

});	

$app->post("/loja-{store}/account/address/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		$res["msg"] = "Erro no servidor, favor atualizar a página!";
		echo json_encode($res);
		exit;
	}
	
	if(!isset($_POST['code']) || isset($_POST['code']) && $_POST['type'] == 2 && Address::listAddress($_POST['code']) == false)
	{
		header("Location: /loja-".$args['store']."/account/address/");
		exit;
	}

	if($_POST['type'] != 3)
	{

		$ad = Address::listAddress();
		
		if(is_array($ad) && count($ad) == 4)
		{
			$res["msg"] = "Você não pode cadastrar mais de 4 endereços!";
			echo json_encode($res);
			exit;
		}

		if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0 && strlen($_POST['cityAddress']) == 1 || isset($_POST['cityAddress']) && strstr($_POST['cityAddress'], '_') == false || !isset($_POST['cityAddress']))
		{
			
			$res["msg"] = "Selecione uma cidade!";
			echo json_encode($res);
			exit;

		} else if(Store::listCities($_POST['cityAddress']) == 0)
		{
			
			$res["msg"] = "Erro Critico, atualize a página!";
			echo json_encode($res);
			exit;
			
		} else {
			$array = Store::listCities($_POST['cityAddress']);
		}

		if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']) || !isset($_POST['cepAddress']))
		{
			
			$res["msg"] = "Digite seu CEP!";
			echo json_encode($res);
			exit;

		} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

			$res["msg"] = "CEP incompleto!";
			echo json_encode($res);
			exit;

		}

		if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']) || !isset($_POST['districtAddress']))
		{
			$res["msg"] = "Digite seu bairro!";
			echo json_encode($res);
			exit;
		}

		if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']) || !isset($_POST['streetAddress']))
		{
			$res["msg"] = "Digite sua rua!";
			echo json_encode($res);
			exit;
		}

		if(isset($_POST['numberAddress']) && empty($_POST['numberAddress']) || !isset($_POST['numberAddress']) )
		{
			$res["msg"] = "Digite o número da sua residência/empresa!";
			echo json_encode($res);
			exit;
		}

	}

	$address = new Address;

	$address->setData([
		"idAddress" => isset($_POST['code']) ? $_POST['code'] : 0,
		"cep" => isset($_POST['cepAddress']) && !empty($_POST['cepAddress']) && strlen($_POST['cepAddress']) == 9 ? $_POST['cepAddress'] : "", 
		"district" => isset($_POST['districtAddress']) && !empty($_POST['districtAddress']) ? $_POST['districtAddress'] : "", 
		"street" => isset($_POST['streetAddress']) && !empty($_POST['streetAddress']) ? $_POST['streetAddress'] : "", 
		"number" => isset($_POST['numberAddress']) && !empty($_POST['numberAddress']) ? $_POST['numberAddress'] : 0, 
		"complement" => isset($_POST['complementAddress']) && !empty($_POST['complementAddress']) ? $_POST['complementAddress'] : "", 
		"reference" => isset($_POST['referenceAddress']) && !empty($_POST['referenceAddress']) ? $_POST['referenceAddress'] : "", 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0,
		'city' => isset($array[0]['cidades'][0]) && !empty($array[0]['cidades'][0]) ? $array[0]['cidades'][0] : "",
		'uf' => isset($array[0]['sigla']) && !empty($array[0]['sigla']) ? $array[0]['sigla'] : "",
		'code' => isset($_POST['cityAddress']) && strlen($_POST['cityAddress']) > 1 && strstr($_POST['cityAddress'], "_") != false ? $_POST['cityAddress'] : 0
	]);

	switch ($_POST['type']) {
		
		case 1:
			$addr = $address->save();	
			$res['msg'] = $addr !== false ? "Endereço Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$addr = $address->update();
			$res['msg'] = $addr !== false ? "Endereço Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $address->deleteFreight();
			$msg = $res ? "Endereço Excluido com Sucesso!" : "Nada Foi Excluído!";
		break;*/

		default:
			$res["msg"] = "Erro no servidor, favor atualizar a página!";
			echo json_encode($res);
			exit;
		break;

	}
	
	if($addr)
	{
		$res['status'] = 1;
	} 

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/account/address/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Endereços"
		]
	]);

	$page->setTpl("account-address", [
		"userAddress" => Address::listAddress(),
		'errorRegister' => Address::getErrorRegister(),
        'successMsg' => Address::getSuccessMsg(),
		"cities" => Store::listCityStore()
		]);
	
	return $response;

});

/* Page Account Address Edit
$app->post("/loja-{store}/account/address/edit/", function(Request $request, Response $response, $args) {

	var_dump($_POST);
	exit;

	Store::verifyStore($args["store"]);

	if(!isset($_SESSION['userAddress']) || isset($_SESSION['userAddress']) && Address::listAddress($_SESSION['userAddress']) == false)
	{
		header("Location: /loja-".$args['store']."/account/address/");
	}

	if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0 && strlen($_POST['cityAddress']) == 1 || isset($_POST['cityAddress']) && strstr($_POST['cityAddress'], '_') == false || !isset($_POST['cityAddress']))
	{
		Address::setErrorRegister("Selecione uma cidade!");
		exit;
	} else if(Store::listCities($_POST['cityAddress']) == 0)
	{
		Address::setErrorRegister("Erro Critico, atualize a página!");
		exit;
	} else {
		$array = Store::listCities($_POST['cityAddress']);
	}

	if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']))
	{

		Address::setErrorRegister("Digite seu CEP!");
		exit;

	} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

		Address::setErrorRegister("CEP incompleto!");
		exit;

	}

	if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']))
	{

		Address::setErrorRegister("Digite seu bairro!");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite sua rua!");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite o número da sua residência/empresa!");
		exit;

	}

	$address = new Address;

	$address->setData([
		"idAddress" => $_SESSION['userAddress'],
		"cep" => $_POST['cepAddress'], 
		"district" => $_POST['districtAddress'], 
		"street" => $_POST['streetAddress'], 
		"number" => $_POST['numberAddress'], 
		"complement" => $_POST['complementAddress'], 
		"reference" => $_POST['referenceAddress'], 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0,
		'city' => isset($array[0]['cidades'][0]) && !empty($array[0]['cidades'][0]) ? $array[0]['cidades'][0] : "",
		'uf' => isset($array[0]['sigla']) && !empty($array[0]['sigla']) ? $array[0]['sigla'] : "",
		'code' => isset($_POST['cityAddress']) && strlen($_POST['cityAddress']) > 1 && strstr($_POST['cityAddress'], "_") != false ? $_POST['cityAddress'] : 0
	]);

	$res = $address->update();
	
	if($res)
	{
		Address::setSuccessMsg("Endereço Atualizado com Sucesso.");

	} else {
		Address::setErrorRegister("Nada Foi Atualizado.");
	}

	var_dump($res);
	exit;

});

$app->get("/loja-{store}/account/address/edit/", function(Request $request, Response $response, $args) {

	$id = $_GET['code'];
	$userAddress = Address::listAddress($id);

	if($userAddress == false) header("Location: /loja-".$args['store']."/account/address/");

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$page->setTpl("account-address-edit", [
		'errorRegister' => Address::getErrorRegister(),
        'successMsg'=> Address::getSuccessMsg(),
		"cities" => Store::listCityStore(),
		"userAddress" => $userAddress,
		"codeAddress" => $_GET['code']
	]);

	$_SESSION['userAddress'] = $userAddress[0]['idAddress'];
	
	return $response;

});

// Page Account Address New
$app->post("/loja-{store}/account/address/new/", function(Request $request, Response $response, $args) {

	var_dump($_POST);
	exit;

	$_SESSION[Address::REGISTER_VALUES] = $_POST;

	Store::verifyStore($args["store"]);
	
	if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0 && strlen($_POST['cityAddress']) == 1 || isset($_POST['cityAddress']) && strstr($_POST['cityAddress'], '_') == false || !isset($_POST['cityAddress']))
	{
		Address::setErrorRegister("Selecione uma cidade!");
		exit;
	} else if(Store::listCities($_POST['cityAddress']) == 0)
	{
		Address::setErrorRegister("Erro Critico, atualize a página!");
		exit;
	} else {
		$array = Store::listCities($_POST['cityAddress']);
	}

	if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']))
	{

		Address::setErrorRegister("Digite seu CEP!");
		exit;

	} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

		Address::setErrorRegister("CEP incompleto!");
		exit;

	}

	if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']))
	{

		Address::setErrorRegister("Digite seu bairro!");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite sua rua!");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite o número da sua residência/empresa!");
		exit;

	}

	if(Address::checkAddress())
	{
		
		Address::setErrorRegister("Você ja possui cinco endereços e não pode cadastrar mais nenhum!");
		exit;

	}

	$address = new Address;

	$address->setData([
		"cep" => $_POST['cepAddress'], 
		"district" => $_POST['districtAddress'], 
		"street" => $_POST['streetAddress'], 
		"number" => $_POST['numberAddress'], 
		"complement" => $_POST['complementAddress'], 
		"reference" => $_POST['referenceAddress'], 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0,
		'city' => isset($array[0]['cidades'][0]) && !empty($array[0]['cidades'][0]) ? $array[0]['cidades'][0] : "",
		'uf' => isset($array[0]['sigla']) && !empty($array[0]['sigla']) ? $array[0]['sigla'] : "",
		'code' => isset($_POST['cityAddress']) && strlen($_POST['cityAddress']) > 1 && strstr($_POST['cityAddress'], "_") != false ? $_POST['cityAddress'] : 0
	]);

	$res = $address->save();	
	
	if($res)
	{
		User::setSuccessMsg("Enderenço Inserido com Sucesso.");
		echo 1;
	} else {
		User::setErrorRegister("Nada Foi Inserido!");
	}

	exit;

});

$app->get("/loja-{store}/account/address/new/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$page->setTpl("account-address-new", [
		'errorRegister' => Address::getErrorRegister(),
        'registerValues' => Address::getRegisterValues(),
		"cities" => Store::listCityStore()
	]);

	return $response;

});

 Page Account User Inactive
$app->get("/loja-{store}/account/desactive/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	if(!isset($_SESSION[User::SESSION]))
	{
		header("Location: /");
		exit;
	} else{

		User::desactive();
		header("Location: /loja-".$args['store']."/logout/");
		exit;
	}

});*/

?>