<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\Mercato;
use Esly\DB\Sql;
use Esly\Model\Address;
use Esly\Model\Cart;
use Esly\Model\Order;
use Esly\Model\Store;
use Esly\Model\User;

if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

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


//Page Mercato Download 
$app->get("/mercato/loja-{store}/", function(Request $request, Response $response, $args) {
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();

	Store::verifyStore($args['store']);
	
	Mercato::getProducts($args['store']);
	
	var_dump("SUCESSO");
	exit;	

});

/*
$app->get("/mercato/loja-{store}/search/", function(Request $request, Response $response, $args) {
	
	$dados = Mercato::listAllProducts($args['store']);

	$s = isset($_GET['s']) ? $_GET['s'] : "";

	foreach ($dados as $key => $value) {
		
		if($s != "" && strstr($value['descricao'], strtoupper($s)) || $s == "")
		{	

			/*echo "
			Cod Produto : ".$value['cod_produto']." <br>
			Produto : ".$value['descricao']." <br>
			Preço : R$".$value['precovenda']." por ".$value['unidaderef']."  <br>
			Preço de Promoção : ".$value['precopromocaoterm']." <br>
			Código de Barras : ".$value['cod_barra']." <br>
			Quantidade Variavel : ".$value['quantvariavel']." <br>
			Bloqueia Multiplicação : ".$value['bloqueiamultiplicacao']." <br>
			Leve X : ".$value['levex']." <br>
			Pague Y : ".$value['paguey']." <br>
			Permite Desconto : ".$value['permitedesconto']." <br>
			Só vende INTEIRO : ".$value['sovendeinteiro']." <br>
			Só embalagem fechada Varejo : ".$value['soembfechadava']." <br>
			Só embalagem fechada Atacado : ".$value['soembfechadaat']." <br>
			Desconto Máximo: ".$value['descontomax']." <br>
			Desconto: ".$value['desconto']." <br>
			Preço por caixa: ".$value['precoporcaixa']." <br>
			Quantidade por caixa: ".$value['quantporcaixa']." <br>
			Produto Composto: ".$value['produtocomposto']." <br>
			<img src='data:image/png;base64,".$value['imagem']."' alt='Produtos'>
			<hr>
			";

			var_dump($value);
		}

	}

	exit;

});

$app->get("/mercato/loja-{store}/departaments/", function(Request $request, Response $response, $args) {
	
	$dados = Mercato::filterDepartamentsProducts($args['store']);
	var_dump($dados);
	exit;

}); */

// Page Home 
$app->get("/loja-{store}/", function(Request $request, Response $response, $args) {

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);
	
	$page->setTpl("home", [
		"state" => Store::listState(),
		"imgPromo" => Store::listImgsPromo($args['store']),
		"products" => Mercato::listAllProducts($args['store'], 1)
	]);
	
	return $response;

});

// Page Search Menu 
$app->post("/loja-{store}/menu/", function(Request $request, Response $response, $args) {
	
	$HTML = "";
	$search = $_POST['product'] != "" ? Mercato::searchProduct($args['store'], strtoupper($_POST['product'])) : 0;
	
	if($search != 0){
		
		foreach ($search as $key => $value) {
			
			$priceFinal = $value['pricePromo'] > 0 && $value['pricePromo'] < $value['price'] ? $value['pricePromo'] : $value['price'];
			
			if($key < 10)
			{
				$HTML .= '
				<a href="/loja-'.$args['store'].'/product/'.$value['description'].'/" class="list-group-item list-group-item-action py-2">
					<p class="row my-0">
						<span class="col-md-10">'.$value['description'].'</span>
						<span class="col-md-2 text-right">R$ '.maskPrice($priceFinal).'</span>
					</p>
				</a>';
			}
			
		}

	}

	echo $HTML;
	exit;

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
		"info" => "allStore",
		"nameBase" => $_SESSION[Sql::DB]['directory']
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
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	// GET PARAMETERS
	$search = isset($_GET['s']) && !empty($_GET['s']) ? $_GET['s'] : NULL;
	$or = isset($_GET['order']) && $_GET['order'] > 0 && $_GET['order'] < 6 ? $_GET['order'] : 0;
	$subs = isset($_GET['subs']) ? $_GET['subs'] : "";
	$mark = isset($_GET['mark']) ? $_GET['mark'] : "";
	$pages = !isset($_GET['page']) ? 1 : $_GET['page'];
	$filter = isset($_GET['min']) && isset($_GET['max']) ? ["min" => floatval($_GET['min']), "max" => floatval($_GET['max']) ] : 0;
	
	$res = $search != NULL ? Mercato::searchPageProduct($args['store'], $search, $subs, $mark, $filter) : 0;
	$res = $or != 0 && $res != 0 ? Mercato::filterSearchProducts($res, $or) : $res;

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"s" => $search,
			"ft" => $res != 0 ? true : false
		]
	]);

	$page->setTpl('search', [
		"search" => [
			"s" => $search,
			"or" => $or,
			"subs" => $subs, 
			"mark" => $mark, 
			"filter" => $filter, 
			"page" => $pages,
			"pages" => $res != 0 ? Mercato::getSearchPage($res, $pages) : 0,
			"marks" => $res != 0 ? Mercato::getMarksProduct($res) : 0,
			"filterPrice" => $res != 0 ? Mercato::getPriceProduct($res) : 0,
			"res" => $res
		],
	]);
	
	return $response;

});

// Page Departaments 
$app->get("/loja-{store}/departaments/", function(Request $request, Response $response, $args) {
	
	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("departaments", [
		"products" => Mercato::listAllProducts($args['store'], 1)
	]);
	
	return $response;

});

// Page Departaments Products 
$app->get("/loja-{store}/departaments/{departaments}-{category}/", function(Request $request, Response $response, $args) {
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	if(empty($args['departaments']) || !isset($args['departaments'])) header("/loja-".$args['store']."/");

	$dep = $args['departaments'];
	$cat = $args['category'] != 0 || !empty($args['category']) ? $args['category'] : "";
	$subs = isset($_GET['subs']) ? $_GET['subs'] : "";
	$mark = isset($_GET['mark']) ? $_GET['mark'] : "";
	$pages = !isset($_GET['page']) ? 1 : $_GET['page'];
	$or = isset($_GET['order']) && $_GET['order'] > 0 && $_GET['order'] < 6 ? $_GET['order'] : 0;
	$filter = isset($_GET['min']) && isset($_GET['max']) ? ["min" => floatval($_GET['min']), "max" => floatval($_GET['max']) ] : 0;

	$res = $dep != "" ? Mercato::searchPageDepartament($args['store'], $dep, $cat, $mark, $subs, $filter) : 0;
	$res = $or != 0 && $res != 0 ? Mercato::filterSearchProducts($res, $or) : $res;

	$category = Mercato::getDepartaments($args['store'], $dep, $cat);

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => $res != 0 ? true : false
		]
	]);

	$page->setTpl("departaments-product", [
		"dep" => [
			"name" => $args["departaments"],
			"cat" => $cat != "" ? $cat : 0,
			"category" => $category,
			"or" => $or,
			"subs" => $subs, 
			"mark" => $mark, 
			"marks" => $res != 0 ? Mercato::getMarksProduct($res) : 0,
			"filter" => $filter, 
			"filterPrice" => $res != 0 ? Mercato::getPriceProduct($res) : 0,
			"page" => $pages,
			"pages" => $res != 0 ? Mercato::getSearchPage($res, $pages) : 0,
			"products" => $res
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

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	$product = Mercato::searchFieldProduct($args['store'], $args['product'], "description");

	if($product == 0) header("Location: /loja-".$args['store']."/");
	
	$dep = Mercato::searchPageDepartament($args['store'], $product['departament'], $product['category']);

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);

	$page->setTpl("product-details", [
		"product" => $product,
		"views" => Mercato::listAllProducts($args['store'], 1),
		"departament" => $dep
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
		'orders' => Order::listAll()
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
	
	$orders = Order::listAll($args['pedido'], true);
	
	$page->setTpl("account-requests-details", [
		'orders' => $orders,
		'storeAddress' => $orders != 0 ? Store::listAll($orders[0]['idStore']) : 0
	]);
	
	return $response;

});

/* Page Account Shopping List
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

});*/

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


/* Page Account User Inactive
$app->get("/loja-{store}/account/desactive/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	if(!isset($_SESSION[User::SESSION]))
	{
		header("Location: /");
		exit;
	} else{

		User::desactive();
		header("Location: /loja-".$args['store']."/logout/");
		exit;
	}

});*/

$app->post("/loja-{store}/checkout/cart/product/{product}/add/", function(Request $request, Response $response, $args) {

	$product = Mercato::searchFieldProduct($args['store'], $args['product'], 'codProduct');
	
	if($product !== NULL && isset($_POST['qtd']) && $_POST['qtd'] > 0)
	{
		$product['priceFinal'] = $product['pricePromo'] != 0 && $product['pricePromo'] < $product['price'] ? $product['pricePromo'] : $product['price'];
		$product['quantity'] = $_POST['qtd'];

		if(Cart::addItem($product) != false) unset($_SESSION[Cart::SESSION]);

	}
	
	exit;

});

$app->post("/loja-{store}/checkout/cart/product/{product}/update/", function(Request $request, Response $response, $args) {

	if(isset($_POST['qtd']) && isset($args['product']))
	{
		
		$product = [
			"id" => $args['product'], 
			"quantity" => $_POST['qtd']
		];

		if(Cart::updateItem($product) != false) unset($_SESSION[Cart::SESSION]);

		exit;

	} 
	

	if(isset($_POST['check']) && Cart::updateItemSimilar($args['product'], $_POST['check']) != false) unset($_SESSION[Cart::SESSION]);
	
	exit;

});

$app->post("/loja-{store}/checkout/cart/product/{product}/delete/", function(Request $request, Response $response, $args) {
	
	if(isset($_SESSION[Cart::SESSION]) && count($_SESSION[Cart::SESSION]['items']) > 0 && isset($_POST['qtd']))
	{
		
		$res = false;

		if(isset($args['product']) && $args['product'] > 0 && $_POST['qtd'] == 1)
		{
			$res = Cart::deleteItem($args['product']); 
		} else if(isset($args['product']) && $args['product'] == 0 && $_POST['qtd'] == 0){
			$res = Cart::deleteItem($args['product']);
			echo $res;
		}

		if($res != false) unset($_SESSION[Cart::SESSION]);
		
	} 
	
	exit;

});

// Page Cart
$app->post("/loja-{store}/checkout/cart/freigth/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	if(isset($_POST['inputFreigth']) && strlen($_POST['inputFreigth']) <> 9)
	{
		echo "Digite um Cep válido";
		exit;
	}

	$cep = Cart::consultFreigth($_POST['inputFreigth'], $args['store']);

	if($cep == false){
		echo "Cep não existente na base de dados!";
		unset($_SESSION['cartFreigth']);
	} else {
		echo 1;
		$_SESSION['cartFreigth'] = $cep;
	}
	
	exit;

});

$app->post("/loja-{store}/checkout/cart/promo/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	if(isset($_POST['inputPromo']) && empty($_POST['inputPromo']))
	{

		Cart::setErrorRegister("Digiter um cupom!");
		header("Location: /loja-".$args['store']."/checkout/cart/");
		exit;

	}

	if(Cart::verifyPromo($_POST['inputPromo']) != false) unset($_SESSION[Cart::SESSION]);
	
	header("Location: /loja-".$args['store']."/checkout/cart/");
	exit;

});

$app->get("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {

	unset($_SESSION[Cart::SESSION]);

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl("cart", [
		'errorRegister' => Cart::getErrorRegister(),
		'freigth' => isset($_SESSION['cartFreigth']) ? $_SESSION['cartFreigth'] : 0
	]);
	
	if(isset($_SESSION['cartFreigth'])) unset($_SESSION['cartFreigth']);

	return $response;

});

// Page Checkout
$app->post("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	unset($_SESSION[Order::SESSION]);
	Store::verifyStore($args["store"]);

	$nameUser = explode(' ', $_POST['inputName']);

	if(isset($_POST['inputName']) && empty($_POST['inputName']))
	{

		Order::setErrorRegister("Digite seu nome!");
		header("Location: /loja-".$args['store']."/checkout/delivery-pickup/");
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		Order::setErrorRegister("Digite seu sobrenome!");
		header("Location: /loja-".$args['store']."/checkout/delivery-pickup/");
		exit;

	} 

	if(isset($_POST['inputType']) && $_POST['inputType'] == 1 && !isset($_POST['inputFreigth']))
	{
		Order::setErrorRegister("Selecione um tipo de entrega!");
		header("Location: /loja-".$args['store']."/checkout/delivery-pickup/");
		exit;
	}

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		Order::createOrder();

		$_SESSION[Order::SESSION]['type'] = intval($_POST['inputType']);
		if(isset($_POST['inputFreigth']) && intval($_POST['inputFreigth']) > 0 && $_POST['inputType'] > 0) $_SESSION[Order::SESSION]['freigth'] = Cart::getDelivery($_POST['inputFreigth']);
		$_SESSION[Order::SESSION]['freigth']['type'] = $_POST['inputType'] == 1 ? intval($_POST['inputFreigth']) : 0;
		$_SESSION[Order::SESSION]['freigth']['nameRes'] = $_POST['inputName'];

		if($_POST['inputType'] == 1){
			header("Location: /loja-".$args['store']."/checkout/address/");
		} else {
			header("Location: /loja-".$args['store']."/checkout/horary/");
		}

	} else {
		header("Location: /loja-".$args['store']."/checkout/delivery-pickup/");
	}

	exit;

});

$app->get("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl("checkout", [
		'errorRegister' => Order::getErrorRegister(),
		'freigth' => Cart::listFreigth($args['store']),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 1
	]);
	
	return $response;

});

// Page Checkout Address
$app->post("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('type');

	if(isset($_POST['inputAddress']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0){

		$_SESSION[Order::SESSION]['address'] = intval($_POST['inputAddress']);
		header("Location: /loja-".$args['store']."/checkout/horary/");

	} else{
		header("Location: /");
	}
	
	exit;

});

$app->get("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('type');

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl("checkout-address", [
		'address' => Address::listAddressFreigth($_SESSION[Order::SESSION]['freigth']['type'], 1),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 2
	]);
	
	return $response;

});

// Page Checkout Horary
$app->post("/loja-{store}/checkout/horary/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('cart');

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0){
		
		$_SESSION[Order::SESSION]['horary'] = Cart::getHoraryDelivery($_POST['inputType']);
		$_SESSION[Order::SESSION]['horary']['date'] = $_POST['inputDate'];
		header("Location: /loja-".$args['store']."/checkout/payment/");

	} else if(!isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0){
	
		Order::setErrorRegister("Selecione um Horário de Entrega!");
		header("Location: /loja-".$args['store']."/checkout/horary/");
	
	} else{
		header("Location: /");
	}	

	exit;

});

$app->get("/loja-{store}/checkout/horary/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('cart');


	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl("checkout-horary", [
		'errorRegister' => Order::getErrorRegister(),
		'cartHorary' => Cart::listHorary($args['store']),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 3
	]);
	
	return $response;

});

// Page Checkout Payment
$app->post("/loja-{store}/checkout/payment/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('horary');

	$total = ($_SESSION[Cart::SESSION]['totalCart'] + $_SESSION[Order::SESSION]['freigth']['freigth'] + $_SESSION[Order::SESSION]['horary']['price']); 

	if(!isset($_POST['inputType']) || $_POST['inputType'] == 0)
	{
		
		Order::setErrorRegister("Selecione uma forma de pagamento!");
		header("Location: /loja-".$args['store']."/checkout/payment/");

	} else if(isset($_POST['inputMoney']) && floatval(str_replace(',', '.', str_replace('.', '', $_POST['inputMoney']))) < $total){

		Order::setErrorRegister("Digite um valor maior ou igual ao valor total do pedido!");
		header("Location: /loja-".$args['store']."/checkout/payment/");

	} else if(isset($_POST['inputMoney']) && $_POST['inputMoney'] != "" && substr($_POST['inputMoney'], -1, 1) != 0 && substr($_POST['inputMoney'], -1, 1) != 5){

		Order::setErrorRegister("Não é permitido valores muito quebrados!");
		header("Location: /loja-".$args['store']."/checkout/payment/");

	} else {
		
		$pay = Cart::getPayment($_POST['inputType']);

		$_SESSION[Order::SESSION]['payment'] = [
			'id' => $pay['idStorePayment'],
			'value' => isset($_POST['inputMoney']) && $_POST['inputMoney'] > 0 && !empty($_POST['inputMoney']) ? floatval(str_replace(',', '.', str_replace('.', '', $_POST['inputMoney']))) : 0,
			'name' => $pay['namePay'],
			'type' => $pay['typePayStore']
		];

		header("Location: /loja-".$args['store']."/checkout/resume/");

	}

	exit;

});

$app->get("/loja-{store}/checkout/payment/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('horary');

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl('checkout-payment', [
		'cartPay' => Cart::listPayment($_SESSION[Order::SESSION]['type'], $args['store']),
		'errorRegister' => Order::getErrorRegister(),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 4
	]);
	
	return $response;

});

// Page Checkout Resume
$app->post("/loja-{store}/checkout/resume/obs/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);
	Order::verifyOrder('payment');

	if(isset($_SESSION[Cart::SESSION]) && isset($_POST['obs']) && Cart::updateObs($_POST['obs'])) 
	{

		$_SESSION[Cart::SESSION]['obs'] = $_POST['obs']; 
		echo "
		<div class='alert alert-success alert-dismissible fade show text-left' role='alert'>
					
		<span>Observação atualizada com sucesso!</span>
		
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>

		</div>";

	} else {

		echo "
		<div class='alert alert-danger alert-dismissible fade show text-left' role='alert'>
					
		<span>Nada foi atualizado!</span>
		
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		</button>

		</div>";

	}

	exit;

});

$app->post("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);
	Order::verifyOrder('payment');

	$order = new Order($args["store"]);

	$order->save();
	exit;

});

$app->get("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {
	
	Cart::verifyRegister($args['store']);
	Order::verifyOrder('payment');

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false
		]
	]);

	$page->setTpl('checkout-resume', [
		'cartHorary' => Cart::listHorary($args['store'], $_SESSION[Order::SESSION]['horary']['id']),
		'errorRegister' => Order::getErrorRegister(),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderAddress' => Address::listAddress(Address::cryptCode($_SESSION[Order::SESSION]['address'])),
		'orderLink' => 5
	]);
	
	return $response;

});

?>