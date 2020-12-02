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
			"ft" => false
		]
	]);

	$page->setTpl("index", [
		"state" => Store::listCityStore(),
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
		"products" => Mercato::listAllProducts($args['store'], 1),
		"productsDep" => Mercato::listProductsDepartaments($args['store'])
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
			"ft" => $res != 0 ? true : false,
			"headerTitle" => "Departamentos"
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

// Page Product
$app->get("/loja-{store}/product/{product}/", function(Request $request, Response $response, $args) {

	if(!isset($_SESSION[Sql::DB])) Page::verifyPage();
	Store::verifyStore($args['store']);

	$product = Mercato::searchFieldProduct($args['store'], $args['product'], "description");

	if($product == 0 || isset($product['stock']) && $product['stock'] == 0) header("Location: /loja-".$args['store']."/");
	
	$dep = Mercato::searchPageDepartament($args['store'], $product['departament'], $product['category']);

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
		"departament" => $dep
	]);
	
	return $response;

});