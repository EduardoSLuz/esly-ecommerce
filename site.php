<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use \Esly\Page;

// Page Inicial 
$app->get("/", function(Request $request, Response $response) {
    
	$page = new Page([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("index", [
	]);
	
	return $response;

});

// Page Home 
$app->get("/loja-{store}/", function(Request $request, Response $response, $args) {
    
	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"] 
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
				"idStore" => $args["store"]
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

// Page Information Company 
$app->get("/loja-{store}/info/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
				"idStore" => $args["store"]
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
$app->get("/loja-{store}/login/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"]
			],
			"login" => true
		]
	]);

	$page->setTpl("login", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Forgot Password
$app->get("/loja-{store}/forgot-password/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"]
			],
			"login" => false
		]
	]);

	$page->setTpl("forgot-password", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => false
		]
	]);
	
	return $response;

});

// Page Register
$app->get("/loja-{store}/register/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"]
			],
			"login" => false
		]
	]);

	$page->setTpl("register", [
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

// Page Account Shopping List Details
$app->get("/loja-{store}/account/data/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"links" => [
				"idStore" => $args["store"],
				"HTTP" => $_SERVER['HTTP_HOST']
			],
			"login" => true
		]
	]);

	$page->setTpl("account-info", [
		"buttons" => [
			"wp" => true,
			"ct" => true,
			"ft" => true
		]
	]);
	
	return $response;

});

?>