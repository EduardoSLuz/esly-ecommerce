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

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		exit;

	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{

		User::setErrorRegister("Digite uma senha!");
		exit;

	}

	
	$login = User::login($_POST['emailUser'], $_POST['passUser']);

	if(is_string($login))
	{

		User::setErrorRegister($login);
		exit;

	}

	if(isset($_POST['checkRemember']))
	{
		
		User::saveLogin($_POST['emailUser']);
		
	}
	
	$url = Page::PageRedirect();
	if(is_numeric($url))User::setSuccessMsg("Login feito com sucesso!");
	
	echo !is_numeric($url) ? $url : 1;
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
	
	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		exit;

	} else if(User::verifyUser($_POST['emailUser'])) {

		User::setErrorRegister("E-mail não cadastrado!");
		exit;

	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){

		User::setErrorRegister("Confirme que você não é um robô!");
		exit;

	}

	$res = User::getForgot($_POST['emailUser'], $args['store']);
	
	if($res != false)
	{
		User::setSuccessMsg("Foi enviado um e-mail para sua caixa de entrada, nele você ira verificar como restaurar/mudar sua senha.");
		echo 1;

	} else {
		User::setErrorRegister("Ocorreu um erro ao mandar o e-mail, favor tentar novamente ou entre em contato com o suporte do site!");
	}

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
		exit;

	} 
	
	if(isset($_POST['PassNewCfInfo']) && empty($_POST['PassNewCfInfo']))
	{
		
		User::setErrorRegister("Confirme sua nova senha!");
		exit;
		
	} else if($_POST['PassNewCfInfo'] != $_POST['PassNewInfo']) {

		User::setErrorRegister("Nova senha não é igual a senha a baixo!");
		exit;

	}
	
	if(User::alterPass($_POST['PassNewCfInfo'], $_SESSION['forgot']['emailUser']) == false || !isset($_SESSION['forgot']) )
	{
		User::setErrorRegister("Ocorreu um erro ao tentar atualizar sua senha! tente novamente mais tarde, se persistir favor entrar em contato com o suporte!");
		exit;
	} else {
		User::setSuccessMsg("Senha alterada com sucesso! Agora é só fazer o login.");
	}

	echo 1;
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

	if (!isset($_POST['emailUser']) || $_POST['emailUser'] == '')
	{
		
		User::setErrorRegister("Digite seu e-mail!");
		exit;

	} else if (!filter_var($_POST['emailUser'], FILTER_VALIDATE_EMAIL)){

		User::setErrorRegister("Digite um e-mail válido!");
		exit;

	} else if (User::verifyUser($_POST['emailUser']) === false){

		User::setErrorRegister("Ja existe um usário com esse e-mail!");
		exit;

	}

	if (!isset($_POST['passUser']) || $_POST['passUser'] == '')
	{

		User::setErrorRegister("Digite uma senha!");
		exit;

	}

	if (!isset($_POST['passRepeatUser']) || $_POST['passRepeatUser'] == '' || $_POST['passUser'] != $_POST['passRepeatUser'])
	{

		User::setErrorRegister("Confirme sua senha!");
		exit;

	}

	if(User::reCaptcha($_POST["g-recaptcha-response"]) === false){

		User::setErrorRegister("Confirme que você não é um robô!");
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
		exit;

	}

	if(is_string(User::login($_POST['emailUser'], $_POST['passUser'])))
	{

		User::setErrorRegister("Ocorreu um erro crítico, favor entrar em contato com o suporte do site.");
		exit;

	}
	
	$url = Page::PageRedirect();
	if(is_numeric($url))User::setSuccessMsg("Usuário Cadastrado com Sucesso.");
	
	echo !is_numeric($url) ? $url : 1;
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