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
		"header" => true,
		"footer" => true,
		"data" => [
			"links" => [
				"idStore" => $args["store"] 
			],
			"login" => true
		]
	]);

	$page->setTpl("home", [
		"links" => [
			"idStore" => $args["store"]
		],
		"login" => true
	]);
	
	return $response;

});

// Page Search 
$app->get("/loja-{store}/search/", function(Request $request, Response $response, $args) {
	
	// GET PARAMETERS
	if(isset($_GET)) $search = $_GET["s"];

	$page = new Page([
		"header" => true,
		"footer" => true,
		"data" => [
			"links" => [
				"idStore" => $args["store"]
			],
			"login" => true
		]
	]);

	$page->setTpl("search", [
		"links" => [
			"idStore" => $args["store"]
		],
		"login" => true,
		"search" => [
			"s" => $search
		]
	]);
	
	return $response;

});

?>