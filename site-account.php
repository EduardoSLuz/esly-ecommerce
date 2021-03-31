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

	if($orders == 0 || isset($_SESSION[User::SESSION]['emailUser']) && isset($orders[0]['infoUser']['emailUser']) && $orders[0]['infoUser']['emailUser'] != $_SESSION[User::SESSION]['emailUser']) header("Location: /");

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

	if(isset($_SESSION[User::SESSION]['data']))
	{
		header("Location: /");
		exit;
	}

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

	if(isset($_SESSION[User::SESSION]['data']))
	{
		header("Location: /");
		exit;
	}

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

	$json_addr = isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) == 9 && isset($_POST['numberAddress']) && $_POST['numberAddress'] > 0 ? Address::getAddressByCep($_POST['cepAddress'], $_POST['numberAddress']) : 0;

	if($json_addr == 0)
	{
		$res["msg"] = "Endereço Inválido!";
		echo json_encode($res);
		exit;
	}

	$address = new Address;

	$address->setData([
		"idAddress" => isset($_POST['code']) ? $_POST['code'] : 0,
		"cep" => isset($_POST['cepAddress']) && !empty($_POST['cepAddress']) && strlen($_POST['cepAddress']) == 9 ? $_POST['cepAddress'] : "", 
		"district" => isset($_POST['districtAddress']) && !empty($_POST['districtAddress']) ? $_POST['districtAddress'] : "", 
		"street" => isset($_POST['streetAddress']) && !empty($_POST['streetAddress']) ? $_POST['streetAddress'] : "", 
		"number" => isset($_POST['numberAddress']) && !empty($_POST['numberAddress']) ? $_POST['numberAddress'] : 0, 
		"complement" => isset($_POST['complementAddress']) && !empty($_POST['complementAddress']) ? $_POST['complementAddress'] : "", 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0,
		'city' => isset($json_addr['city']) ? $json_addr['city'] : "",
		'uf' => isset($json_addr['uf']) ? $json_addr['uf'] : "",
		'place_id' => isset($json_addr['place_id']) ? $json_addr['place_id'] : ""
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

	if(isset($_SESSION[User::SESSION]['data']))
	{
		header("Location: /");
		exit;
	}

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
        'successMsg' => Address::getSuccessMsg()
	]);
	
	return $response;

});

$app->post("/geocoding_api_for_cep", function(Request $request, Response $response, $args) {

	if(!isset($_POST['cod']) || isset($_POST['cod']) && $_POST['cod'] != 2621) exit;

	if(isset($_POST['cep']) && Address::validCep($_POST['cep']) && $_POST['cod'] == 2621)
	{
		
		$data = Address::getAddressByCep($_POST['cep']);

		echo $data != 0 ? json_encode($data) : 0;

	}

	exit;

});

?>