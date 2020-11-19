<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\User;

if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

// Page Information Company 
$app->get("/loja-{store}/info/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo1");

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Sobre"
		]
	]);

	$page->setTpl("informations-company", [
		"storeInfo" => Store::listInfoStore($args['store']),
		"info" => "lyInfo1"
	]);

	return $response;

});

// Page Information Stores 
$app->get("/loja-{store}/our-stores/", function(Request $request, Response $response, $args) {
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo2");

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Lojas"
		]
	]);
	
	$page->setTpl("informations-stores", [
		"info" => "lyInfo2",
		"listAll" => Store::listStores(),
		"nameBase" => $_SESSION[Sql::DB]['directory']
	]);
	
	return $response;

});

// Page Information Partners 
$app->get("/loja-{store}/partners/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo3");

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Parceiros"
		]
	]);

	$page->setTpl("informations-partners", [
		"storePartner" => Store::listInfoPartner($args['store']),
		"info" => "lyInfo3"
	]);
	
	return $response;

});

// Page Information Help 
$app->get("/loja-{store}/help/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo4");

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Help"
		]
	]);

	$page->setTpl("informations-help", [
		"storeHelp" => Store::listHelp($args['store']),
		"info" => "lyInfo4"
	]);
	
	return $response;

});

// Page Information Contact 
$app->post("/loja-{store}/contact/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args['store']);
	Store::checkInstitutionalStore($args['store'], "lyInfo5");

	if(isset($_POST['NameContact']) && empty($_POST['NameContact']) || !isset($_POST['NameContact']))
	{
		Store::setErrorRegister("Digite seu nome completo!");
		exit;
	}
	
	if(isset($_POST['EmailContact']) && empty($_POST['EmailContact']) || !isset($_POST['EmailContact']))
	{
		Store::setErrorRegister("Digite seu e-mail!");
		exit;
	} else if (!filter_var($_POST['EmailContact'], FILTER_VALIDATE_EMAIL)){
		Store::setErrorRegister("Digite um e-mail válido!");
		exit;
	}

	if(isset($_POST['SubjectContact']) && empty($_POST['SubjectContact']) || !isset($_POST['SubjectContact']))
	{
		Store::setErrorRegister("Digite um Assunto!");
		exit;
	}

	if(isset($_POST['MessageContact']) && empty($_POST['MessageContact']) || !isset($_POST['MessageContact']))
	{
		Store::setErrorRegister("Digite uma mensagem!");
		exit;
	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){
		Store::setErrorRegister("Confirme que você não é um robô!");
		exit;
	}

	exit;

});

$app->get("/loja-{store}/contact/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo6");

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	$page->setTpl("informations-contact", [
		"info" => "lyInfo6",
		'errorRegister' => Store::getErrorRegister(),
        'successMsg'=> Store::getSuccessMsg(),
	]);
	
	return $response;

});

// Page Information Contact Work 
$app->get("/loja-{store}/contact-work/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo7");

	$page = new Page([
		"data" => [
			"ID" => $args['store']
		]
	]);

	$page->setTpl("informations-contact-work", [
		"info" => "lyInfo7"

	]);
	
	return $response;

});

// Page Information Promotions 
$app->get("/loja-{store}/promotions/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	Store::checkInstitutionalStore($args['store'], "lyInfo5");

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"headerTitle" => "Promoções"
		]
	]);

	$page->setTpl("informations-promotions", [
		"storePromo" => Store::listPromoAdmin($args['store']),
		"info" => "lyInfo5"
	]);
	
	return $response;

});

?>