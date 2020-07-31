<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\User;

// Page Inicial 
$app->get("/", function(Request $request, Response $response) {
	
	$page = new Page([
		"footer" => false,
		"data" => [
			"links" => [
				"HTTP" => $_SERVER['HTTP_HOST'] 
			],
			"login" => false,
			"type" => 0
		]
	]);

	$page->setTpl("index", [
		"stores" => Store::listAll(),
		"cityStore" => Store::listAllCity(),
		"socialStore" => Store::listSocial(0),
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Home 
$app->get("/loja-{store}/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);
	
	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST'] 
			],
			"login" => false
		]
	]);

	$page->setTpl("home", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
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

// Page Information Company 
$app->get("/loja-{store}/info/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-company", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Stores 
$app->get("/loja-{store}/our-stores/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-stores", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Partners 
$app->get("/loja-{store}/partners/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-partners", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Help 
$app->get("/loja-{store}/help/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-help", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Contact 
$app->get("/loja-{store}/contact/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-contact", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Contact Work 
$app->get("/loja-{store}/contact-work/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-contact-work", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Information Promotions 
$app->get("/loja-{store}/promotions/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("informations-promotions", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
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
		
		User::saveLogin($_POST['emailUser'], $_POST['passUser']);
		
	}

	header("Location: /loja-".$args['store']."/account/requests/");
	exit;

});

$app->get("/loja-{store}/login/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("login", [
		"errorRegister" => User::getErrorRegister(),
        'registerValues'=> User::getRegisterValues(),
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Logout
$app->get("/loja-{store}/logout/", function(Request $request, Response $response, $args) {
	
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
		header("Location: /loja-".$args['store']."/register/");
		exit;

	}

	header("Location: /loja-".$args['store']."/login/forgot-password/");
	exit;

});

// Page Forgot Password
$app->get("/loja-{store}/login/forgot-password/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => false
		]
	]);

	$page->setTpl("forgot-password", [
		"errorRegister" => User::getErrorRegister(),
        'registerValues'=> User::getRegisterValues(),
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
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
	
	if($user->save() === false){

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

	Store::verifyStore($args["store"]);

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => false
		]
	]);

	$page->setTpl("register", [
		"errorRegister" => User::getErrorRegister(),
        'registerValues'=> User::getRegisterValues(),
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
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
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$pedidos === true  ? $pedidos = "account-requests" : $pedidos = "account-requests-default";	

	$page->setTpl($pedidos, [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Account Requests Details
$app->get("/loja-{store}/account/requests/{pedido}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("account-requests-details", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Account Shopping List
$app->get("/loja-{store}/account/shopping-list/", function(Request $request, Response $response, $args) {

	$shopp = true;

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$shopp === true  ? $shopp = "account-shoppinglist" : $shopp = "account-shoppinglist-default";	

	$page->setTpl($shopp, [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Account Shopping List Details
$app->get("/loja-{store}/account/shopping-list/{list}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("account-shoppinglist-details", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

// Page Account Address
$app->get("/loja-{store}/account/address/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("account-address", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
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