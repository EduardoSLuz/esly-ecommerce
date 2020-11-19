<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\Esly;

// Page Inicial 
$app->post("/web/loja-{store}/{user}/products/", function(Request $request, Response $response, $args) {

	$esly = new Esly($args);

	$esly->setProducts($_POST['products']);
	
	echo json_encode($_SESSION[Esly::RESPONSE]);
	exit;

});

?>