<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\DB\Sql;
use Esly\Model\Store;
use Esly\Model\User;

if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

// Page Login 
$app->post("/loja-{store}/login/", function(Request $request, Response $response, $args) {

	$_SESSION["registerValues"] = $_POST;
		
	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		$res["msg"] = "Digite seu e-mail!";
		echo json_encode($res);
		exit;
	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{
		$res["msg"] = "Digite uma senha!";
		echo json_encode($res);
		exit;
	}

	$login = User::login($_POST['emailUser'], $_POST['passUser']);

	if(is_string($login))
	{
		$res["msg"] = $login;
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['checkRemember']))
	{
		User::saveLogin($_POST['emailUser']);
	}
	
	$res = [
		"msg" => "Login Feito com Sucesso",
		"status" => 1
	];

	$res['url'] = Page::PageRedirect();
	$_SESSION[Page::SESSION]['msg'] = is_numeric($res['url']) ? "Login feito com sucesso!" : "Bora finalizar o pedido?";

	echo json_encode($res);
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
	
	if(isset($_COOKIE[User::COOKIE])) User::setCookies(User::COOKIE, "", time() - 3600);
	session_destroy();

	header("Location: /loja-".$args['store']."/");
	exit;

});

// Page Forgot Password
$app->post("/loja-{store}/login/forgot-password/", function(Request $request, Response $response, $args) {

	$_SESSION["registerValues"] = $_POST;

	Store::verifyStore($args["store"]);
	
	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO', 'fixed' => 0];

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		$res["msg"] = "Digite seu e-mail!";
		echo json_encode($res);
		exit;

	} else if(User::verifyUser($_POST['emailUser'])) {
		
		$res["msg"] = "E-mail não cadastrado!";
		echo json_encode($res);
		exit;
	
	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){
		$res["msg"] = "Confirme que você não é um robô!";
		echo json_encode($res);
		exit;
	}

	$forgot = User::getForgot($_POST['emailUser'], $args['store']);
	
	if($forgot != false)
	{
		
		$res = [
		 	'msg' => "Foi enviado um e-mail para sua caixa de entrada, nele você ira verificar como restaurar/mudar sua senha.",
			'status' => 1,
			'fixed' => 1
		];

	} else {
		$res["msg"] = "Ocorreu um erro ao mandar o e-mail, favor tentar novamente ou entre em contato com o suporte do site!";
	}

	echo json_encode($res);
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
	
	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if(isset($_POST['PassNewInfo']) && empty($_POST['PassNewInfo']))
	{
		$res["msg"] = "Digite uma nova senha!";
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
	
	if(User::alterPass($_POST['PassNewCfInfo'], $_SESSION['forgot']['emailUser']) == false || !isset($_SESSION['forgot']) )
	{
		
		$res["msg"] = "Ocorreu um erro ao tentar atualizar sua senha! tente novamente mais tarde, se persistir favor entrar em contato com o suporte!";

	} else {
		
		$res = [
			"msg" => "Senha alterada com sucesso! Agora é só fazer o login.",
			"status" => 1
		];

	}

	echo json_encode($res);
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
		"forgotCode" => isset($_SESSION['forgot']['code']) ? $_SESSION['forgot']['code'] : ""
	]);
	
	return $response;

});

// Page Register
$app->post("/loja-{store}/register/", function(Request $request, Response $response, $args) {

	$_SESSION["registerValues"] = $_POST;
	
	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{

		$res["msg"] = "Digite seu e-mail!";
		echo json_encode($res);
		exit;

	} else if (!filter_var($_POST['emailUser'], FILTER_VALIDATE_EMAIL)){

		$res["msg"] = "Digite um e-mail válido!";
		echo json_encode($res);
		exit;

	} else if (User::verifyUser($_POST['emailUser']) === false){

		$res["msg"] = "Já existe um usário com esse e-mail!";
		echo json_encode($res);
		exit;

	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{
		$res["msg"] = "Digite uma senha!";
		echo json_encode($res);
		exit;
	}

	if (!isset($_POST['passRepeatUser']) || $_POST['passRepeatUser'] == '' || $_POST['passUser'] != $_POST['passRepeatUser'])
	{
		$res["msg"] = "Confirme sua senha!";
		echo json_encode($res);
		exit;
	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){
		$res["msg"] = "Confirme que você não é um robô!";
		echo json_encode($res);
		exit;
	}

	$user = new User();

    $user->setData([
        'emailUser'=>$_POST['emailUser'],
        'passUser'=>$_POST['passUser']
    ]);
	
	if($user->save() === false)
	{
		$res["msg"] = "Erro no cadastro, tente novamente! se persistir esse erro entre em contato com o suporte do site.";
		echo json_encode($res);
		exit;
	}

	if(is_string(User::login($_POST['emailUser'], $_POST['passUser'])))
	{
		$res["msg"] = "Ocorreu um erro crítico, favor entrar em contato com o suporte do site.";
		echo json_encode($res);
		exit;
	}
	
	$res = [
		"msg" => "Registro Feito com Sucesso",
		"status" => 1,
		"url" => Page::PageRedirect()
	];

	$_SESSION[Page::SESSION]['msg'] = is_numeric($res['url']) ? "Registro Feito com Sucesso!" : "Bora Fazer um Pedido?";

	echo json_encode($res);
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

?>