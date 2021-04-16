<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Esly\Page;
use Esly\Mercato;
use Esly\DB\Sql;
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
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Lojas"
		]
	]);

	$page->setTpl("index", [
		"city" => Store::listCityStore(),
	]);
	
	return $response;

});

// Page Home 
$app->post("/loja-{store}/select-product-unit/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	if(!isset($_SESSION[Cart::SESSION]))
	{
		echo 0;
	}

	if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && isset($_POST['cod']) && is_numeric($_POST['cod']) && $_POST['cod'] >= 0)
	{

		$res = Mercato::searchProductId($args['store'], $_POST['id']);

		if(isset($res['unitsMeasures'][$_POST['cod']]))
		{
			$res['unitsMeasures'][$_POST['cod']]['price'] = maskPrice($res['unitsMeasures'][$_POST['cod']]['price']);
		}

		$res = $res != 0 && isset($res['unitsMeasures'][$_POST['cod']]) ? json_encode($res['unitsMeasures'][$_POST['cod']]) : $res; 

	} else {
		echo 0;
		exit;
	}

	echo $res;
	exit;

});

$app->get("/loja-{store}/", function(Request $request, Response $response, $args) {

	$id = isset($_GET['cod']) && is_numeric($_GET['cod']) && $_GET['cod'] > 0 ? $_GET['cod'] : 0;
	$img = isset($_GET['img']) && is_numeric($_GET['img']) && $_GET['img'] == 1 ? 1 : 0;

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false
		]
	]);
	
	$page->setTpl("home", [
		"products" => Mercato::listAllProducts($args['store'], 1),
		"productsDep" => Mercato::listProductsHome($args['store'], 0, 1),
		"subTypes" => Mercato::searchProduct($args['store'], $id, 'codProduct'),
		"loading" => [
			"carouselImgs" => $img
		]
	]);
	
	return $response;

});

// Page Home 
$app->post("/loja-{store}/email-promotions/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	
	$res = ["status" => 0, "msg" => ""];

	if(!isset($_POST['emailPromo']) || $_POST['emailPromo'] == '')
	{
		
		$res["msg"] = "Digite seu email!";
		echo json_encode($res);
		exit;

	} else if (!filter_var($_POST['emailPromo'], FILTER_VALIDATE_EMAIL)){

		$res["msg"] = "Digite um e-mail válido!";
		echo json_encode($res);
		exit;

	} else if (Store::listEmailPromo("WHERE email = :EMAIL", [":EMAIL" => $_POST['emailPromo']]) != 0){

		$res["msg"] = "E-mail já cadastrado!";
		echo json_encode($res);
		exit;

	}

	$store = new Store();

	$store->setData([
        'email'=>$_POST['emailPromo']
	]);
	
	$save = $store->saveEmailPromo();
	
	$res['status'] = intval($save);
	
	if($save)
	{
		$res['msg'] = "Email Cadastro com Sucesso!";
	} else {
		$res['msg'] = "Nada Foi Inserido!";
	}

	echo json_encode($res);
	exit;

});

// Page Search Menu 
$app->post("/loja-{store}/menu/", function(Request $request, Response $response, $args) {
	
	$ct = 0;
	$HTML = "";
	$search = $_POST['product'] != "" ? Mercato::searchProduct($args['store'], strtoupper($_POST['product'])) : 0;
	
	if($search != 0){
		
		foreach ($search as $key => $value) {
			
			if($value['stock'] > 0)
			{
				$ct += 1;
				$priceFinal = $value['pricePromo'] > 0 && $value['pricePromo'] < $value['price'] ? $value['pricePromo'] : $value['price'];
				
				if($ct < 10)
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

	}

	echo $HTML;
	exit;

});

// Page Search 
$app->get("/loja-{store}/search/", function(Request $request, Response $response, $args) {
	
	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	// GET PARAMETERS
	$search = isset($_GET['s']) && !empty($_GET['s']) ? $_GET['s'] : NULL;
	$id = isset($_GET['cod']) && is_numeric($_GET['cod']) && $_GET['cod'] > 0 ? $_GET['cod'] : 0;
	$or = isset($_GET['order']) && $_GET['order'] > 0 && $_GET['order'] < 6 ? $_GET['order'] : 0;
	$subs = isset($_GET['subs']) ? $_GET['subs'] : "";
	$mark = isset($_GET['mark']) ? $_GET['mark'] : "";
	$pages = !isset($_GET['page']) ? 1 : $_GET['page'];
	$filter = isset($_GET['min']) && isset($_GET['max']) ? ["min" => floatval($_GET['min']), "max" => floatval($_GET['max']) ] : 0;
	
	$res = $search != NULL ? Mercato::searchPageProduct($args['store'], $search, $subs, $mark, $filter, 1) : 0;
	$res = $or != 0 && $res != 0 ? Mercato::filterSearchProducts($res, $or) : $res;

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"s" => $search,
			"ft" => $res != 0 ? true : false,
			"headerTitle" => "Pesquisa"
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
		"subTypes" => Mercato::searchProduct($args['store'], $id, 'codProduct')
	]);
	
	return $response;

});

// Page Departaments 
$app->get("/loja-{store}/departaments/", function(Request $request, Response $response, $args) {
	
	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false,
			"headerTitle" => "Departamentos"
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
	$id = isset($_GET['cod']) && is_numeric($_GET['cod']) && $_GET['cod'] > 0 ? $_GET['cod'] : 0;
	$cat = $args['category'] != 0 || trim($args['category']) != "" ? $args['category'] : "";
	$subs = isset($_GET['subs']) ? $_GET['subs'] : "";
	$mark = isset($_GET['mark']) ? $_GET['mark'] : "";
	$pages = !isset($_GET['page']) ? 1 : $_GET['page'];
	$or = isset($_GET['order']) && $_GET['order'] > 0 && $_GET['order'] < 6 ? $_GET['order'] : 0;
	$filter = isset($_GET['min']) && isset($_GET['max']) ? ["min" => floatval($_GET['min']), "max" => floatval($_GET['max']) ] : 0;

	$res = $dep != "" ? Mercato::searchPageDepartament($args['store'], $dep, $cat, $mark, $subs, $filter, 1) : 0;
	$res = $or != 0 && $res != 0 ? Mercato::filterSearchProducts($res, $or) : $res;

	$category = Mercato::getDepartaments($args['store'], $dep, $cat);

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => $res != 0 ? true : false,
			"headerTitle" => "Departamentos"
		]
	]);

	$page->setTpl("departaments-product", [
		"dep" => [
			"name" => $args["departaments"],
			"cat" => trim($cat) != "" ? $cat : 0,
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
		],
		"subTypes" => Mercato::searchProduct($args['store'], $id, 'codProduct')
	]);
	
	return $response;

});

// Page Product
$app->get("/loja-{store}/product/{product}/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	$product = Mercato::searchFieldProductHome($args['store'], $args['product'], "description");
	$id = isset($_GET['cod']) && is_numeric($_GET['cod']) && $_GET['cod'] > 0 ? $_GET['cod'] : 0;
	
	if($product == 0 || isset($product['stock']) && $product['stock'] == 0) header("Location: /loja-".$args['store']."/");
	
	$dep = Mercato::searchPageDepartament($args['store'], $product['departament'], $product['category'], "", "", 0, 1);

	$page = new Page([
		"data" => [
			"ID" => $args['store'],
			"ft" => false,
			"headerTitle" => "Produto"
		]
	]);

	$page->setTpl("product-details", [
		"product" => $product,
		"views" => Mercato::listAllProducts($args['store'], 1),
		"departament" => $dep,
		"subTypes" => Mercato::searchProduct($args['store'], $id, 'codProduct'),
		"productsDep" => Mercato::listProductsHome($args['store'], 0, 1)
	]);
	
	return $response;

});