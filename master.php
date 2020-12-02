<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\PageMaster;
use Esly\Model\Company;
use Esly\Model\UserMaster;

$app->post("/master/", function(Request $request, Response $response) {

	PageMaster::verifyPage();

	$res = ["status" => 0, "msg" => ""];

	if(!isset($_POST['emailMaster']) || isset($_POST['emailMaster']) && empty($_POST['emailMaster']))
	{
		
		$res["msg"] = "Digite seu email!";
		echo json_encode($res);
		exit;

	} else if (!filter_var($_POST['emailMaster'], FILTER_VALIDATE_EMAIL)){
		
		$res["msg"] = "Digite um e-mail válido!";
		echo json_encode($res);
		exit;
	
	} else if(UserMaster::listUser(0, "email = :EMAIL", [":EMAIL" => $_POST['emailMaster']]) == 0){

		$res["msg"] = "E-mail Inválido!";
		echo json_encode($res);
		exit;

	}

	if (!isset($_POST['passMaster']) || $_POST['passMaster'] == '')
	{

		$res["msg"] = "Digite sua senha!";
		echo json_encode($res);
		exit;

	}

	$user = new UserMaster();

	$user->setData([
		"email" => isset($_POST['emailMaster']) && !empty($_POST['emailMaster']) ? $_POST['emailMaster'] : "",
		"pass" => isset($_POST['passMaster']) && !empty($_POST['passMaster']) ? $_POST['passMaster'] : ""
	]);

	$result = $user->login();

	if($result)
	{
		$res = ['status' => 1, 'msg'=>"Login Aceito!"];
		echo json_encode($res);
	} else{
		$res["msg"] = "Login Inválido!";
		echo json_encode($res);
	}

	exit;

});

$app->get("/master/", function(Request $request, Response $response) {

	$admin = new PageMaster([
		"header" => false,
		"footer" => false
	]);

	$admin->setTpl("login", []);
	
	return $response;

});

$app->get("/master/logout/", function(Request $request, Response $response) {

	unset($_SESSION[UserMaster::SESSION]);

	header("Location: /");
	exit;

});

$app->get("/master/home/", function(Request $request, Response $response) {

	$admin = new PageMaster([
		"login" => 1
	]);

	$admin->setTpl("index", []);
	
	return $response;

});

$app->post("/master/services/", function(Request $request, Response $response) {

	if(!isset($_POST['id']) || !isset($_POST['type']) || isset($_POST['id']) && UserMaster::decryptCode($_POST['id']) != 'BAIACU') exit;

	switch ($_POST['type']) {
		case 0:
			Company::updateListProducts();
		break;

		case 1:
			Company::updateOrdersPaid();
		break;
		
		default:
			exit;
		break;
	}

	exit;

});

?>