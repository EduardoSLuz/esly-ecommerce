<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\Mercato;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\Address;
use Esly\Model\User;

// Page Inicial 
$app->get("/", function(Request $request, Response $response) {
	
	$page = new Page([
		"data" => [
			"ID" => 0,
			"type" => 0,
			"ft" => false
		]
	]);

	$page->setTpl("index", [
		"state" => Store::listState(),
	]);
	
	return $response;

});

// Page Inicial 
$app->get("/mercato/loja-{store}/", function(Request $request, Response $response, $args) {
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

	Store::verifyStore($args['store']);
	
	if(Mercato::verifyProductJson($args['store']) == false) Mercato::getProducts($args['store']);
	
	var_dump("SUCESSO");
	exit;	

	/*foreach ($dados as $key => $value) {
		echo "
		Produto : ".$value['descricao']." <br>
		Preço : R$".number_format($value['precopdv'], 2, ',', '.')." por ".$value['unidaderef']."  <br>
		Preço de Promoção : ".number_format($value['precopromocaoterm'], 2, ',', '.')." <br>
		Código de Barras : ".$value['cod_barra']." <br>
		<hr>
		";

		if($key == 10) break; 
	}*/

});

$app->get("/mercato/loja-{store}/search/", function(Request $request, Response $response, $args) {
	
	$dados = Mercato::listAllProdutos($args['store']);

	$s = isset($_GET['s']) ? $_GET['s'] : "";

	foreach ($dados as $key => $value) {
		
		if($s != "" && strstr($value['descricao'], strtoupper($s)) || $s == "")
		{
			echo "
			Produto : ".$value['descricao']." <br>
			Preço : R$".number_format($value['precopdv'], 2, ',', '.')." por ".$value['unidaderef']."  <br>
			Preço de Promoção : ".number_format($value['precopromocaoterm'], 2, ',', '.')." <br>
			Código de Barras : ".$value['cod_barra']." <br>
			<hr>
			";

		}

	}

	exit;

});

// Page Home 
$app->get("/loja-{store}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("home", [
		"state" => Store::listState()
	]);
	
	return $response;

});

// Page Information Company 
$app->get("/loja-{store}/info/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	$page->setTpl("informations-company", [
		"storeInfo" => Store::listInfoStore($args['store']),
		"info" => "infoStore"
	]);

	return $response;

});

// Page Information Stores 
$app->get("/loja-{store}/our-stores/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);
	
	Store::checkInstitutionalStore($args['store'], "allStore");
	
	$page->setTpl("informations-stores", [
		"info" => "allStore"
	]);
	
	return $response;

});

// Page Information Partners 
$app->get("/loja-{store}/partners/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);
	
	Store::checkInstitutionalStore($args['store'], "partnerStore");

	$page->setTpl("informations-partners", [
		"storePartner" => Store::listPartner(),
		"info" => "partnerStore"
	]);
	
	return $response;

});

// Page Information Help 
$app->get("/loja-{store}/help/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	Store::checkInstitutionalStore($args['store'], "helpStore");

	$page->setTpl("informations-help", [
		"storeHelp" => Store::listHelp(),
		"info" => "helpStore"
	]);
	
	return $response;

});

// Page Information Contact 
$app->get("/loja-{store}/contact/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	Store::checkInstitutionalStore($args['store'], "contactStore");

	$page->setTpl("informations-contact", [
		"info" => "contactStore"
	]);
	
	return $response;

});

// Page Information Contact Work 
$app->get("/loja-{store}/contact-work/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	Store::checkInstitutionalStore($args['store'], "workStore");

	$page->setTpl("informations-contact-work", [
		"info" => "workStore"

	]);
	
	return $response;

});

// Page Information Promotions 
$app->get("/loja-{store}/promotions/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	Store::checkInstitutionalStore($args['store'], "promotionStore");
	
	$page->setTpl("informations-promotions", [
		"storePromo" => Store::listPromo(),
		"info" => "promotionStore"
	]);
	
	return $response;

});

// Page Search 
$app->get("/loja-{store}/search/", function(Request $request, Response $response, $args) {
	
	// GET PARAMETERS
	if(isset($_GET['s']) && !empty($_GET['s'])){

		$pageSearch = "search";
		$search = $_GET["s"] ;

	} else{

		$pageSearch = "search-error";
		$search = "" ;

	} 

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("$pageSearch", [
		"search" => [
			"s" => $search
		],
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Departaments 
$app->get("/loja-{store}/departaments/", function(Request $request, Response $response, $args) {
	
	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("departaments", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Departaments Products 
$app->get("/loja-{store}/{departaments}-{idDepartaments}/", function(Request $request, Response $response, $args) {
	
	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("departaments-product", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		],
		"departament" => $args["departaments"]
	]);
	
	return $response;

});

// Page Login 
$app->post("/loja-{store}/login/", function(Request $request, Response $response, $args) {

	$_SESSION["registerValues"] = $_POST;
	
	Store::verifyStore($args["store"]);

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		header("Location: /loja-".$args['store']."/login/");
		exit;

	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{

		User::setErrorRegister("Digite uma senha!");
		header("Location: /loja-".$args['store']."/login/");
		exit;

	}

	$login = User::login($_POST['emailUser'], $_POST['passUser']);

	if(is_string($login))
	{

		User::setErrorRegister($login);
		header("Location: /loja-".$args['store']."/login/");
		exit;

	}

	if(isset($_POST['checkRemember']))
	{
		
		User::saveLogin($_POST['emailUser']);
		
	}

	User::setSuccessMsg("Login feito com sucesso!");
	header("Location: /loja-".$args['store']."/account/requests/");
	exit;

});

$app->get("/loja-{store}/login/", function(Request $request, Response $response, $args) {
	
	$page = new Page([
		"login" => 1,
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("login", [
		'errorRegister' => User::getErrorRegister(),
        'successMsg'=> User::getSuccessMsg(),
		'registerValues' => User::getRegisterValues()
	]);
	
	return $response;

});

// Page Logout
$app->get("/loja-{store}/logout/", function(Request $request, Response $response, $args) {
	
	if(isset($_COOKIE[User::COOKIE])) User::setCookies(User::COOKIE, $array, time() - 3600);
	session_destroy();

	header("Location: /loja-".$args['store']."/");
	exit;

});

// Page Forgot Password
$app->post("/loja-{store}/login/forgot-password/", function(Request $request, Response $response, $args) {

	$_SESSION["registerValues"] = $_POST;

	Store::verifyStore($args["store"]);
	
	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		header("Location: /loja-".$args['store']."/login/forgot-password/");
		exit;

	} else if(User::verifyUser($_POST['emailUser'])) {

		User::setErrorRegister("E-mail não cadastrado!");
		header("Location: /loja-".$args['store']."/login/forgot-password/");
		exit;

	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){

		User::setErrorRegister("Confirme que você não é um robô!");
		header("Location: /loja-".$args['store']."/login/forgot-password/");
		exit;

	}

	User::getForgot($_POST['emailUser'], $args['store']);
	
	User::setSuccessMsg("Foi enviado um e-mail para sua caixa de entrada, nele você ira verificar como restaurar/mudar sua senha.");
	header("Location: /loja-".$args['store']."/login/forgot-password/");
	exit;

});

$app->get("/loja-{store}/login/forgot-password/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 1,
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("forgot-password", [
		"errorRegister" => User::getErrorRegister(),
        'successMsg'=> User::getSuccessMsg(),
        'registerValues'=> User::getRegisterValues(),
	]);
	
	return $response;

});

// Page Forgot Password Reset
$app->post("/loja-{store}/login/forgot-password/reset/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	
	if(isset($_POST['PassNewInfo']) && empty($_POST['PassNewInfo']))
	{

		User::setErrorRegister("Digite uma nova senha!");
		header("Location: /loja-".$args['store']."/login/forgot-password/reset/?code=".$_SESSION['forgot']['code']);
		exit;

	} 
	
	if(isset($_POST['PassNewCfInfo']) && empty($_POST['PassNewCfInfo']))
	{
		
		User::setErrorRegister("Confirme sua nova senha!");
		header("Location: /loja-".$args['store']."/login/forgot-password/reset/?code=".$_SESSION['forgot']['code']);
		exit;
		
	} else if($_POST['PassNewCfInfo'] != $_POST['PassNewInfo']) {

		User::setErrorRegister("Nova senha não é igual a senha a baixo!");
		header("Location: /loja-".$args['store']."/login/forgot-password/reset/?code=".$_SESSION['forgot']['code']);
		exit;

	}
	
	if(User::alterPass($_POST['PassNewCfInfo'], $_SESSION['forgot']['emailUser']) == false)
	{
		User::setErrorRegister("Ocorreu um erro ao tentar atualizar sua senha! tente novamente mais tarde, se persistir favor entrar em contato com o suporte!");
		header("Location: /loja-".$args['store']."/login/forgot-password/reset/?code=".$_SESSION['forgot']['code']);
		exit;
	} else {
		User::setSuccessMsg("Senha alterada com sucesso! agora é só fazer o login.");
	}

	header("Location: /loja-".$args['store']."/login/");
	exit;

});

$app->get("/loja-{store}/login/forgot-password/reset/", function(Request $request, Response $response, $args) {

	if(!isset($_GET['code']) || $_GET['code'] == "" || User::checkRecovery($_GET['code']) == false) header("Location: /");
	$_SESSION['forgot']['code'] = $_GET['code'];

	$page = new Page([
		"login" => 1,
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("forgot-password-reset", [
		"errorRegister" => User::getErrorRegister(),
	]);
	
	return $response;

});

// Page Register
$app->post("/loja-{store}/register/", function(Request $request, Response $response, $args) {
	
	$_SESSION["registerValues"] = $_POST;
	
	Store::verifyStore($args["store"]);

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	} else if (!filter_var($_POST['emailUser'], FILTER_VALIDATE_EMAIL)){

		User::setErrorRegister("Digite um e-mail válido!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	} else if (User::verifyUser($_POST['emailUser']) === false){

		User::setErrorRegister("Ja existe um usário com esse e-mail!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{

		User::setErrorRegister("Digite uma senha!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	if (!isset($_POST['passRepeatUser']) || $_POST['passRepeatUser'] == '' || $_POST['passUser'] != $_POST['passRepeatUser'])
	{

		User::setErrorRegister("Confirme sua senha!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){

		User::setErrorRegister("Confirme que você não é um robô!");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	$user = new User();

    $user->setData([
        'emailUser'=>$_POST['emailUser'],
        'passUser'=>$_POST['passUser']
    ]);
	
	if($user->save() === false)
	{

		User::setErrorRegister("Erro no cadastro, tente novamente! se persistir esse erro entre em contato com o suporte do site.");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	if(is_string(User::login($_POST['emailUser'], $_POST['passUser'])))
	{

		User::setErrorRegister("Ocorreu um erro crítico, favor entrar em contato com o suporte do site.");
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}
		
	header("Location: /loja-".$args['store']."/account/requests/");
	exit;

});

$app->get("/loja-{store}/register/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 1,
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("register", [
		"errorRegister" => User::getErrorRegister(),
        'registerValues'=> User::getRegisterValues(),
	]);
	
	return $response;

});

// Page Product
$app->get("/loja-{store}/product/{product}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("product-details", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Account Requests
$app->get("/loja-{store}/account/requests/", function(Request $request, Response $response, $args) {

	$pedidos = true;

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$pedidos === true  ? $pedidos = "account-requests" : $pedidos = "account-requests-default";	

	$page->setTpl($pedidos, [
        'successMsg'=> User::getSuccessMsg(),
	]);
	
	return $response;

});

// Page Account Requests Details
$app->get("/loja-{store}/account/requests/{pedido}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$page->setTpl("account-requests-details", [
	
	]);
	
	return $response;

});

// Page Account Shopping List
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

});

// Page Account Info
$app->post("/loja-{store}/account/data/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$nameUser = explode(' ', $_POST['NameInfo']);

	if(isset($_POST['NameInfo']) && empty($_POST['NameInfo']))
	{

		User::setErrorRegister("Digite seu nome!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		User::setErrorRegister("Digite seu sobrenome!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	} 

	if(isset($_POST['CpfInfo']) && !empty($_POST['CpfInfo']) && strlen($_POST['CpfInfo']) < 14)
	{

		User::setErrorRegister("Digite um CPF válido!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	} else if (!empty($_POST['CpfInfo']) && User::verifyCPF($_POST['CpfInfo'])){

		User::setErrorRegister("CPF inválido!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	}

	if(isset($_POST['DateInfo']) && is_numeric(str_replace('-', '', $_POST['DateInfo'])) && str_replace('-', '', $_POST['DateInfo']) < "19200101")
	{

		User::setErrorRegister("Data Inválida!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	}

	if(isset($_POST['TelInfo']) && !empty($_POST['TelInfo']) && strlen($_POST['TelInfo']) < 15)
	{

		User::setErrorRegister("Digite um telefone válido!");
		header("Location: /loja-".$args['store']."/account/data/");
		exit;

	}
	
	if(isset($_POST['WpInfo']) && !empty($_POST['WpInfo']) && strlen($_POST['WpInfo']) < 15)
	{

		User::setErrorRegister("Digite um whatsapp válido!");
		header("Location: /loja-".$args['store']."/account/data/");
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
	
	$user->update();

	header("Location: /loja-".$args['store']."/account/data/");
	exit;

});

$app->get("/loja-{store}/account/data/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
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
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;

	} else if(User::verifyPass($_POST['PassInfo']) === false)
	{

		User::setErrorRegister("Senha Atual Inválida!");
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;

	}

	if(isset($_POST['PassNewInfo']) && empty($_POST['PassNewInfo']))
	{

		User::setErrorRegister("Digite uma nova senha!");
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;

	} else if($_POST['PassNewInfo'] == $_POST['PassInfo'])
	{

		User::setErrorRegister("Nova senha não pode ser igual a sua atual!");
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;

	}
	
	if(isset($_POST['PassNewCfInfo']) && empty($_POST['PassNewCfInfo']))
	{
		
		User::setErrorRegister("Confirme sua nova senha!");
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;
		
	} else if($_POST['PassNewCfInfo'] != $_POST['PassNewInfo']) {

		User::setErrorRegister("Nova senha não é igual a senha a baixo!");
		header("Location: /loja-".$args['store']."/account/data/password/");
		exit;

	}

	if(User::alterPass($_POST['PassNewCfInfo']))
	{
		User::setSuccessMsg("Senha alterada com sucesso!.");
	} else{
		User::setErrorRegister("Falha ao alterar a senha! Tente novamente mais tarde, se persistir o erro contatar o suporte do site!");
	}

	header("Location: /loja-".$args['store']."/account/data/password/");
	exit;

});

$app->get("/loja-{store}/account/data/password/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
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

	Address::activeMainAddress($_POST['adCode'], $code);

	header("Location: /loja-".$args['store']."/account/address/");
	exit;

});

$app->post("/loja-{store}/account/address/delete/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = Address::deleteAddress($_POST['adCode']);

	if($res)
	{
		header("Location: /loja-".$args['store']."/account/address/");
		exit;
	} else {
		header("Location: /");
		exit;
	}

});

$app->get("/loja-{store}/account/address/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
		]
	]);

	$page->setTpl("account-address", [
		"userAddress" => Address::listAddress(),
		'errorRegister' => Address::getErrorRegister(),
        'successMsg' => Address::getSuccessMsg()
	]);
	
	return $response;

});

// Page Account Address Edit
$app->post("/loja-{store}/account/address/edit/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	if(!isset($_SESSION['userAddress']) || isset($_SESSION['userAddress']) && Address::listAddress($_SESSION['userAddress']) == false)
	{
		header("Location: /loja-".$args['store']."/account/address/");
	}
	
	if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0)
	{

		Address::setErrorRegister("Selecione uma cidade!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	}

	if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']))
	{

		Address::setErrorRegister("Digite seu CEP!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

		Address::setErrorRegister("CEP incompleto!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	}

	if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']))
	{

		Address::setErrorRegister("Digite seu bairro!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite sua rua!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite o número da sua residência/empresa!");
		header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
		exit;

	}

	$address = new Address;

	$address->setData([
		"idAddress" => $_SESSION['userAddress'],
		"city" => $_POST['cityAddress'], 
		"cep" => $_POST['cepAddress'], 
		"district" => $_POST['districtAddress'], 
		"street" => $_POST['streetAddress'], 
		"number" => $_POST['numberAddress'], 
		"complement" => $_POST['complementAddress'], 
		"reference" => $_POST['referenceAddress'], 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0
	]);

	$address->update();

	header("Location: /loja-".$args['store']."/account/address/edit/?code=".$_SESSION['userAddress']);
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
		"state" => Store::listState(),
		"userAddress" => $userAddress
	]);

	$_SESSION['userAddress'] = $userAddress[0]['idAddress'];
	
	return $response;

});

// Page Account Address New
$app->post("/loja-{store}/account/address/new/", function(Request $request, Response $response, $args) {

	$_SESSION[Address::REGISTER_VALUES] = $_POST;

	Store::verifyStore($args["store"]);
	
	if(isset($_POST['cityAddress']) && $_POST['cityAddress'] == 0)
	{

		Address::setErrorRegister("Selecione uma cidade!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	if(isset($_POST['cepAddress']) && empty($_POST['cepAddress']))
	{

		Address::setErrorRegister("Digite seu CEP!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	} else if(isset($_POST['cepAddress']) && strlen($_POST['cepAddress']) < 9){

		Address::setErrorRegister("CEP incompleto!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	if(isset($_POST['districtAddress']) && empty($_POST['districtAddress']))
	{

		Address::setErrorRegister("Digite seu bairro!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite sua rua!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	if(isset($_POST['streetAddress']) && empty($_POST['streetAddress']))
	{

		Address::setErrorRegister("Digite o número da sua residência/empresa!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	if(Address::checkAddress())
	{
		
		Address::setErrorRegister("Você ja possui cinco endereços e não pode cadastrar mais nenhum!");
		header("Location: /loja-".$args['store']."/account/address/new/");
		exit;

	}

	$address = new Address;

	$address->setData([
		"city" => $_POST['cityAddress'], 
		"cep" => $_POST['cepAddress'], 
		"district" => $_POST['districtAddress'], 
		"street" => $_POST['streetAddress'], 
		"number" => $_POST['numberAddress'], 
		"complement" => $_POST['complementAddress'], 
		"reference" => $_POST['referenceAddress'], 
		"mainAddress" => isset($_POST['mainAddress']) ? 1 : 0
	]);

	$address->save();	

	header("Location: /loja-".$args['store']."/account/address/");
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
		"state" => Store::listState(),
	]);

	return $response;

});

// Page Cart
$app->get("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {

	$typeCheckout = true;

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$typeCheckout === true ? $typeCheckout = "cart" : $typeCheckout = "cart-default"; 
	
	$page->setTpl($typeCheckout, [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Checkout
$app->get("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("checkout", [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Checkout Address
$app->get("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("checkout-address", [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Checkout Horary
$app->get("/loja-{store}/checkout/horary/", function(Request $request, Response $response, $args) {

	$typeCheckout = true;

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$typeCheckout === true ? $typeCheckout = "checkout-horary-delivery" : $typeCheckout = "checkout-horary"; 

	$page->setTpl($typeCheckout, [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Checkout Payment
$app->get("/loja-{store}/checkout/payment/", function(Request $request, Response $response, $args) {

	$typeCheckout = true;

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$typeCheckout === true ? $typeCheckout = "checkout-payment-delivery" : $typeCheckout = "checkout-payment"; 

	$page->setTpl($typeCheckout, [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Checkout Resume
$app->get("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {

	$typeCheckout = true;

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$typeCheckout === true ? $typeCheckout = "checkout-resume-delivery" : $typeCheckout = "checkout-resume"; 

	$page->setTpl($typeCheckout, [
		"buttons" => [
			"wp" => true,
			"ct" => false,
			"ft" => false
		]
	]);
	
	return $response;

});
?>