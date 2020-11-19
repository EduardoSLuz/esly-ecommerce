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

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Pedidos"
		]
	]);

	$page->setTpl("account-requests", [
		'successMsg'=> User::getSuccessMsg(),
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

	$nameUser = explode(' ', $_POST['NameInfo']);

	if(isset($_POST['NameInfo']) && empty($_POST['NameInfo']))
	{

		User::setErrorRegister("Digite seu nome!");
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		User::setErrorRegister("Digite seu sobrenome!");
		exit;

	} 

	if(isset($_POST['CpfInfo']) && !empty($_POST['CpfInfo']) && strlen($_POST['CpfInfo']) < 14)
	{

		User::setErrorRegister("Digite um CPF válido!");
		exit;

	} else if (!empty($_POST['CpfInfo']) && User::verifyCPF($_POST['CpfInfo'])){

		User::setErrorRegister("CPF inválido!");
		exit;

	}

	if(isset($_POST['DateInfo']) && is_numeric(str_replace('-', '', $_POST['DateInfo'])) && str_replace('-', '', $_POST['DateInfo']) < "19200101")
	{

		User::setErrorRegister("Data Inválida!");
		exit;

	}

	if(isset($_POST['TelInfo']) && !empty($_POST['TelInfo']) && strlen($_POST['TelInfo']) != 14 && strlen($_POST['TelInfo']) != 15)
	{

		User::setErrorRegister("Digite um telefone válido!");
		exit;

	}
	
	if(isset($_POST['WpInfo']) && !empty($_POST['WpInfo']) && strlen($_POST['WpInfo']) != 14 && strlen($_POST['WpInfo']) != 15)
	{

		User::setErrorRegister("Digite um whatsapp válido!");
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
	
	$res = $user->update();

	if($res)
	{
		User::setSuccessMsg("Dados Atualizados com Sucesso.");
	} else {
		User::setErrorRegister("Nada Foi Atualizado!");
	}

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

	if(isset($_POST['PassInfo']) && empty($_POST['PassInfo']))
	{

		User::setErrorRegister("Digite sua senha atual!");
		exit;

	} else if(User::verifyPass($_POST['PassInfo']) === false)
	{

		User::setErrorRegister("Senha Atual Inválida!");
		exit;

	}

	if(isset($_POST['PassNewInfo']) && empty($_POST['PassNewInfo']))
	{

		User::setErrorRegister("Digite uma nova senha!");
		exit;

	} else if($_POST['PassNewInfo'] == $_POST['PassInfo'])
	{

		User::setErrorRegister("Nova senha não pode ser igual a sua atual!");
		exit;

	}
	
	if(isset($_POST['PassNewCfInfo']) && empty($_POST['PassNewCfInfo']))
	{
		
		User::setErrorRegister("Confirme sua nova senha!");
		exit;
		
	} else if($_POST['PassNewCfInfo'] != $_POST['PassNewInfo']) {

		User::setErrorRegister("Nova senha não é igual a senha a baixo!");
		exit;

	}

	$res = User::alterPass($_POST['PassNewCfInfo']);

	if(User::alterPass($_POST['PassNewCfInfo']))
	{
		User::setSuccessMsg("Senha alterada com sucesso!.");
	} else{
		User::setErrorRegister("Falha ao alterar a senha! Tente novamente mais tarde, se persistir o erro contatar o suporte do site!");
	}

	var_dump($res);
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

	$res = Address::deleteAddress($_POST['adCode']);

	if($res)
	{
		User::setSuccessMsg("Endereço Apagado Com Successo!");
	} else {
		User::setErrorRegister("Erro no servidor, favor atualizar a página!");
	}

	echo $res ? 1 : 0;
	exit;

});	

$app->post("/loja-{store}/account/address/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	if(!isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0 || isset($_POST['type']) && empty($_POST['type']))
	{
		User::setErrorRegister("Erro no servidor, favor atualizar a página!");
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
			User::setErrorRegister("Você não pode cadastrar mais de 4 endereços!");
			exit;
		}

		if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0 && strlen($_POST['cityAddress']) == 1 || isset($_POST['cityAddress']) && strstr($_POST['cityAddress'], '_') == false || !isset($_POST['cityAddress']))
		{
			User::setErrorRegister("Selecione uma cidade!");
			exit;
		} else if(Store::listCities($_POST['cityAddress']) == 0)
		{
			User::setErrorRegister("Erro Critico, atualize a página!");
			exit;
		} else {
			$array = Store::listCities($_POST['cityAddress']);
		}

		if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']) || !isset($_POST['cepAddress']))
		{
			User::setErrorRegister("Digite seu CEP!");
			exit;
		} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

			User::setErrorRegister("CEP incompleto!");
			exit;
		}

		if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']) || !isset($_POST['districtAddress']))
		{
			User::setErrorRegister("Digite seu bairro!");
			exit;
		}

		if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']) || !isset($_POST['streetAddress']))
		{
			User::setErrorRegister("Digite sua rua!");
			exit;
		}

		if(isset($_POST['numberAddress']) && empty($_POST['numberAddress']) || !isset($_POST['numberAddress']) )
		{
			User::setErrorRegister("Digite o número da sua residência/empresa!");
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

	$data = [
		"idAddress" => $address->getidAddress(),
		"cep" => $address->getcep(),
		"district" => $address->getdistrict(),
		"street" => $address->getstreet(),
		"number" => $address->getnumber(),
		"complement" => $address->getcomplement(),
		"reference" => $address->getreference(),
		"mainAddress" => $address->getmainAddress(),
		"city" => $address->getcity(),
		"uf" => $address->getuf(),
		"code" => $address->getcode()
	];

	switch ($_POST['type']) {
		
		case 1:
			$res = $address->save();	
			$msg = $res ? "Endereço Inserido com Sucesso!" : "Nada Foi Inserido!";
		break;

		case 2:
			$res = $address->update();
			$msg = $res ? "Endereço Atualizado com Sucesso!" : "Nada Foi Atualizado!";
		break;

		/*case 3:
			$res = $address->deleteFreight();
			$msg = $res ? "Endereço Excluido com Sucesso!" : "Nada Foi Excluído!";
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