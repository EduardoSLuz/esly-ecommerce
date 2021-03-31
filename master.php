<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\PageMaster;
use Esly\Model\Company;
use Esly\Model\UserMaster;
use Esly\Mercato;

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

$app->post("/master/companies/companies_register/", function(Request $request, Response $response) {

	if(!isset($_POST['code']) || isset($_POST['code']) && Company::decryptCode($_POST['code']) != "BaiacuMasterCompany") exit;

	$register = isset($_POST['register']) && is_string($_POST['register']) ? Company::decryptCode($_POST['register']) : 0;

	$res = $register !== 0 ? Company::listCompany($register) : 0;
	
	if(isset($res[0]['idCompany']) )
	{
		$res[0]['dateCreate'] = date("H:i d/m/Y", strtotime($res[0]['dateCreate'])); 
		$res[0]['dateUpdate'] = date("H:i d/m/Y", strtotime($res[0]['dateUpdate'])); 
	}

	echo isset($res[0]['idCompany']) ? json_encode($res[0]) : 0;
	exit;

});

$app->post("/master/companies/register/", function(Request $request, Response $response) {

	if(!isset($_SESSION[UserMaster::SESSION]) || isset($_SESSION[UserMaster::SESSION]['login']) && $_SESSION[UserMaster::SESSION]['login'] !== true || !isset($_POST['cod']) || isset($_POST['cod']) && !is_string($_POST['cod'])) exit;
	
	$res = ['msg' => "Erro de Validação!", 'status' => 0];

	if(!isset($_POST['inputModalCompanyRegisterHost']) || isset($_POST['inputModalCompanyRegisterHost']) && empty(trim($_POST['inputModalCompanyRegisterHost'])))
	{
		$res['msg'] = "Host Inválido!";
		echo json_encode($res);
		exit;
	
	} else if(isset($_POST['inputModalCompanyRegisterHost']) && strtolower(substr($_POST['inputModalCompanyRegisterHost'], 0, 4)) == "www.")
	{
		$res['msg'] = "Host náo pode ter www!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['inputModalCompanyRegisterDBName']) || isset($_POST['inputModalCompanyRegisterDBName']) && empty(trim($_POST['inputModalCompanyRegisterDBName'])))
	{
		$res['msg'] = "DB_NAME Inválido!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['inputModalCompanyRegisterDBUser']) || isset($_POST['inputModalCompanyRegisterDBUser']) && empty(trim($_POST['inputModalCompanyRegisterDBUser'])))
	{
		$res['msg'] = "DB_USER Inválido!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['inputModalCompanyRegisterDBPass']) || isset($_POST['inputModalCompanyRegisterDBPass']) && empty(trim($_POST['inputModalCompanyRegisterDBPass'])))
	{
		$res['msg'] = "DB_PASS Inválido!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['inputModalCompanyRegisterDirectory']) || isset($_POST['inputModalCompanyRegisterDirectory']) && empty(trim($_POST['inputModalCompanyRegisterDirectory'])))
	{
		$res['msg'] = "Directory Inválido!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['selectModalCompanyRegisterStatus']) || isset($_POST['selectModalCompanyRegisterStatus']) && !is_numeric($_POST['selectModalCompanyRegisterStatus']) || isset($_POST['selectModalCompanyRegisterStatus']) && intval($_POST['selectModalCompanyRegisterStatus']) < 0)
	{
		$res['msg'] = "Status Inválido!";
		echo json_encode($res);
		exit;
	}

	if(!isset($_POST['selectModalCompanyRegisterCode']) || isset($_POST['selectModalCompanyRegisterCode']) && !is_numeric($_POST['selectModalCompanyRegisterCode']) || isset($_POST['selectModalCompanyRegisterCode']) && intval($_POST['selectModalCompanyRegisterCode']) < 0)
	{
		$res['msg'] = "Aviso Inválido!";
		echo json_encode($res);
		exit;
	}

	$update = Company::updateCompany("host = :HOST, db_name = :DBN, db_user = :DBU, db_pass = :DBP, directory = :DIR, status = :STATUS, code = :CODE", "WHERE idCompany = :ID", [
		':HOST' => $_POST['inputModalCompanyRegisterHost'], 
		':DBN' => $_POST['inputModalCompanyRegisterDBName'], 
		':DBU' => $_POST['inputModalCompanyRegisterDBUser'], 
		':DBP' => Company::cryptCode($_POST['inputModalCompanyRegisterDBPass']), 
		':DIR' => $_POST['inputModalCompanyRegisterDirectory'], 
		':STATUS' => $_POST['selectModalCompanyRegisterStatus'], 
		':CODE' => $_POST['selectModalCompanyRegisterCode'], 
		':ID' => Company::decryptCode($_POST['cod'])
	]);

	$date = $update ? Company::updateCompany("dateUpdate = :DTUP", "WHERE idCompany = :ID", [ ':DTUP' => date("Y-m-d H:i:s"), ':ID' => Company::decryptCode($_POST['cod'])]) : false;

	$res = ['msg' => $update && $date ? "Dados da Empresa Atualizados com Sucesso!" : "Nada foi Atualizado!", 'status' => $update && $date ? 1 : 0];
	echo json_encode($res);
	exit;

});

$app->post("/master/companies/mercato/", function(Request $request, Response $response) {

	if(!isset($_SESSION[UserMaster::SESSION]) || isset($_SESSION[UserMaster::SESSION]['login']) && $_SESSION[UserMaster::SESSION]['login'] !== true || !isset($_POST['cod']) || isset($_POST['cod']) && !is_string($_POST['cod']) || !isset($_POST['type']) || isset($_POST['type']) && $_POST['type'] <= 0) exit;

	$res = ['msg' => "Erro de Validação!", 'status' => 0];
	$type = $_POST['type'];

	if($type == 1)
	{	

		if(!isset($_POST['inputModalCompanyMercatoPort']) || isset($_POST['inputModalCompanyMercatoPort']) && !is_numeric($_POST['inputModalCompanyMercatoPort']) || isset($_POST['inputModalCompanyMercatoPort']) && intval($_POST['inputModalCompanyMercatoPort']) <= 0)
		{
			$res['msg'] = "Porta Inválida!";
			echo json_encode($res);
			exit;
		}

		if(!isset($_POST['inputModalCompanyMercatoTime']) || isset($_POST['inputModalCompanyMercatoTime']) && !is_numeric($_POST['inputModalCompanyMercatoTime']) || isset($_POST['inputModalCompanyMercatoTime']) && intval($_POST['inputModalCompanyMercatoTime']) <= 0)
		{
			$res['msg'] = "Time Inválido!";
			echo json_encode($res);
			exit;
		}

		if(!isset($_POST['selectModalCompanyMercatoStatus']) || isset($_POST['selectModalCompanyMercatoStatus']) && !is_numeric($_POST['selectModalCompanyMercatoStatus']) || isset($_POST['selectModalCompanyMercatoStatus']) && intval($_POST['selectModalCompanyMercatoStatus']) < 0)
		{
		$res['msg'] = "Status Inválido!";
		echo json_encode($res);
		exit;
		}

		$update = Mercato::updateMercato(0, "port = :PORT, time = :TIME, status = :STATUS", "idCompany = :ID", [':PORT' => $_POST['inputModalCompanyMercatoPort'], ':TIME' => $_POST['inputModalCompanyMercatoTime'], ':STATUS' => $_POST['selectModalCompanyMercatoStatus'], ':ID' => Company::decryptCode($_POST['cod'])]);

		if($update) $msg = "Dados do Mercato Atualizados com Sucesso!";

	} else if($type == 2)
	{
		
		$update = Company::updateListProducts(Company::decryptCode($_POST['cod']), 1);
		
		if($update) $msg = "Lista de Produtos Atualizada com Sucesso!";

	}

	$res = ['msg' => isset($msg) ? $msg : "Nada foi Atualizado!", 'status' => isset($msg) ? 1 : 0];
	echo json_encode($res);
	exit;

});

$app->get("/master/companies/", function(Request $request, Response $response) {

	$admin = new PageMaster([
		"login" => 1
	]);

	$admin->setTpl("companies", [
	]);
	
	return $response;

});

$app->post("/master/services/", function(Request $request, Response $response) {

	exit; 

	if(!isset($_POST['id']) || !isset($_POST['type']) || isset($_POST['id']) && UserMaster::decryptCode($_POST['id']) != 'BAIACU') exit;

	switch ($_POST['type']) {
		case 0:
			$resp = Company::updateListProducts();
			$msg = $resp ? "LISTAS DE PRODUTOS ATUALIZADAS" : "NENHUMA LISTA FOI ATUALIZADA";
		break;

		case 1:
			$resp = Company::updateOrdersPaid();
			$msg = $resp ? "SITUAÇÃO DE PAGAMENTO DE ALGUNS PEDIDOS FORAM ATUALIZADAS" : "NENHUMA SITUAÇÃO DO PEDIDO FOI ATUALIZADA";
		break;
		
		default:
			exit;
		break;
	}

	$res = ['msg' => isset($msg) ? $msg : "ERRO ALGO DEU ERRADO!", 'status' => $resp ? 1 : 0];
	$res['msg'] = $res['msg']." - ".date("H:i:s d/m/Y");

	echo json_encode($res); 
	exit;

});


$app->get("/master/update-images-products/", function(Request $request, Response $response) {

	if(!isset($_SESSION[UserMaster::SESSION]))
	{
		header("Location: /");
		exit;
	}

	var_dump(Company::update_get());
	exit;

	$res = Company::update_get();
	echo $res ? "Update feito com Sucesso!" : "Update Já Feito ou Inválido!";
	exit;

});

$app->post("/cron-jobs/list-products/", function(Request $request, Response $response) {

	if(!isset($_POST['key']) || isset($_POST['key']) && Company::decryptCode($_POST['key']) != "BaiacuListProducts") exit;

	$res = Company::updateListProducts();

	echo $res ? "OK" : "NOT OK";
	exit;	

});

$app->post("/cron-jobs/orders-paid/", function(Request $request, Response $response) {

	if(!isset($_POST['key']) || isset($_POST['key']) && Company::decryptCode($_POST['key']) != "BaiacuOrdersPaid") exit;

	$res = Company::updateOrdersPaid();
	
	echo $res ? "OK" : "NOT OK";
	exit;	

});

?>