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

$app->post("/loja-{store}/checkout/cart/product/{product}/add/", function(Request $request, Response $response, $args) {

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];
	$product = Mercato::searchFieldProduct($args['store'], $args['product'], 'codProduct');
	
	if($product !== NULL && isset($_POST['qtd']) && $_POST['qtd'] > 0 && isset($_POST['type']) && $_POST['type'] >= 0)
	{
		$subtype = [
			"id" => isset($_POST['subtype']) && is_numeric($_POST['subtype']) && $_POST['subtype'] >= 0 ? $_POST['subtype'] : 0,
			"desc" => isset($product['subTypes']['types'][$_POST['subtype']]) && isset($product['subTypes']['status']) && $product['subTypes']['status'] == 1 ? $product['subTypes']['types'][$_POST['subtype']] : ""
		];
		$product['qtd'] = $_POST['qtd'];
		$product['unitOrigin'] = isset($product['unitsMeasures'][0]) ? $product['unitsMeasures'][0] : 0;
		$product['unitsMeasures'] = is_numeric($_POST['type']) && $_POST['type'] < count($product['unitsMeasures']) && isset($product['unitsMeasures'][$_POST['type']]) ? [0 => $product['unitsMeasures'][$_POST['type']]] : $product['unitsMeasures'];

		$add = Cart::addItem($product, $subtype);

		if($add === true && $_SESSION[Cart::SESSION]['idCart'] > 0) unset($_SESSION[Cart::SESSION]);

		$res = $add !== true ? $add : ['status' => 1, 'msg' => 'Produto Adicionado ao Carrinho'];

	}
	
	echo json_encode($res);
	exit;

});

$app->post("/loja-{store}/checkout/cart/product/{product}/update/", function(Request $request, Response $response, $args) {
	
	if(isset($_POST['qtd']) && isset($args['product']))
	{
		
		$product = [
			"id" => isset($_SESSION[User::SESSION]) ? $args['product'] : $_POST['id'], 
			"quantity" => $_POST['qtd'],
			"store" => $args['store']
		];

		$update = Cart::updateItem($product);

		if($update === true && isset($_SESSION[Cart::SESSION]['idCart']) && $_SESSION[Cart::SESSION]['idCart'] > 0) unset($_SESSION[Cart::SESSION]);
		
		$res = $update !== true ? $update : ['status' => 1, 'msg' => 'Item Atualizado com Sucesso'];  

		echo json_encode($res);
		exit;

	} 

	$args['product'] = !isset($_SESSION[User::SESSION]) && isset($_POST['id']) ? $_POST['id'] : $args['product']; 

	$update = Cart::updateItemSimilar($args['product'], $_POST['check']);

	if(isset($_POST['check']) && $update !== false && isset($_SESSION[Cart::SESSION]['idCart']) && $_SESSION[Cart::SESSION]['idCart'] > 0) unset($_SESSION[Cart::SESSION]);
	
	$res = $update !== true ? ['status' => 0, 'msg' => 'Erro Crítico'] : ['status' => 1, 'msg' => 'Item Atualizado com Sucesso'];

	echo json_encode($res);
	exit;

});

$app->post("/loja-{store}/checkout/cart/product/{product}/delete/", function(Request $request, Response $response, $args) {
	
	if(isset($_SESSION[Cart::SESSION]) && count($_SESSION[Cart::SESSION]['items']) > 0 && isset($_POST['qtd']))
	{

		$res = false;

		if(isset($args['product']) && $args['product'] > 0 && $_POST['qtd'] == 1 || isset($args['product']) && $args['product'] == 0 && $_POST['qtd'] == 0 || !isset($_SESSION[User::SESSION]) && isset($_POST['id']) && $_POST['id'] >= 0 && $_POST['qtd'] == 1)
		{
			$args['product'] = !isset($_SESSION[User::SESSION]) && isset($_POST['id']) ? $_POST['id'] : $args['product']; 
			$res = Cart::deleteItem($args['product']); 
		} 

		if($res != false) unset($_SESSION[Cart::SESSION]);
		
	} 

	echo isset($res) ? intval($res) : 0;
	exit;

});

// Page Cart
$app->post("/loja-{store}/checkout/cart/freigth/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['msg' => "ERRO CRÍTICO!", 'status' => 0];

	if(isset($_POST['inputFreigth']) && strlen($_POST['inputFreigth']) <> 9)
	{
		$res['msg'] = "Digite um Cep válido";
		unset($_SESSION['cartFreigth']);
		echo json_encode($res);
		exit;
	}

	$cep = Store::listFreightByCep($args['store'], $_POST['inputFreigth']);

	if($cep == 0)
	{
		$res['msg'] = "CEP INVÁLIDO OU INEXISTENTE NA BASE DE DADOS!";
		unset($_SESSION['cartFreigth']);
	} else {
		$res = ['msg' => 'OK', 'status' => 1]; 
		$_SESSION['cartFreigth'] = $cep;
	}

	echo json_encode($res);	
	exit;

});

/*
// Page Cart
$app->post("/loja-{store}/checkout/cart/freigth/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	if(isset($_POST['inputFreigth']) && strlen($_POST['inputFreigth']) <> 9)
	{
		echo "Digite um Cep válido";
		unset($_SESSION['cartFreigth']);
		exit;
	}

	$cep = Store::listFreightCep(['cep'=>$_POST['inputFreigth'], 'id' => $args['store']], 1);

	if($cep == false || $cep == 0){
		echo "Cep não existente na base de dados!";
		unset($_SESSION['cartFreigth']);
	} else {
		echo 1;
		$_SESSION['cartFreigth'] = $cep;
	}
	
	exit;

});
*/

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

$app->post("/loja-{store}/checkout/cart/account/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	$nameUser = explode(' ', $_POST['modalInputName']);

	if(isset($_POST['modalInputName']) && empty($_POST['modalInputName']))
	{

		$res['msg'] = "Digite seu nome!";
		echo json_encode($res);
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		$res['msg'] = "Digite seu sobrenome!";
		echo json_encode($res);
		exit;

	} 

	if(isset($_POST['modalInputCpf']) && strlen($_POST['modalInputCpf']) < 14 || !isset($_POST['modalInputCpf']))
	{

		$res['msg'] = "Digite um CPF válido!";
		echo json_encode($res);
		exit;

	} else if (!empty($_POST['modalInputCpf']) && User::verifyCPF($_POST['modalInputCpf'])){

		$res['msg'] = "CPF inválido!";
		echo json_encode($res);
		exit;

	}

	if(isset($_POST['modalInputDateBirth']) && empty($_POST['modalInputDateBirth']) || isset($_POST['modalInputDateBirth']) && is_numeric(str_replace('-', '', $_POST['modalInputDateBirth'])) && str_replace('-', '', $_POST['modalInputDateBirth']) < "19200101" || !isset($_POST['modalInputDateBirth']))
	{
		$res['msg'] = "Data Inválida!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['modalInputTelephone']) && strlen($_POST['modalInputTelephone']) != 14 && strlen($_POST['modalInputTelephone']) != 15 || !isset($_POST['modalInputTelephone']))
	{
		$res['msg'] = "Digite um telefone válido!";
		echo json_encode($res);
		exit;
	}

	
	if(isset($_POST['modalInputWhatsapp']) && strlen($_POST['modalInputWhatsapp']) != 14 && strlen($_POST['modalInputWhatsapp']) != 15 || !isset($_POST['modalInputWhatsapp']))
	{
		$res['msg'] = "Digite um whatsapp válido!";
		echo json_encode($res);
		exit;
	}

	$user = new User();

    $user->setData([
        'emailUser' => $_SESSION[User::SESSION]['emailUser'],
		'nameUser' => $_POST['modalInputName'],
		'cpfUser' => $_POST['modalInputCpf'],
		'dateBirthUser' => $_POST['modalInputDateBirth'],
		'genreUser' => $_POST['modalSelectGenre'],
		'telUser' => $_POST['modalInputTelephone'],
		'wpUser' => $_POST['modalInputWhatsapp']
	]);
	
	$update = $user->update();

	if($update)
	{

		$res = [ 
			'msg' => "Dados Atualizados com Sucesso!",
			'status' => 1
		];
		
	} else {
		$res['msg'] = "Nada Foi Atualizado!";
	}

	echo json_encode($res);
	exit;

});

$app->post("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	$res = ['msg' => "Erro Fatal!", 'status' => 0, 'type' => 1];

	$limit = Cart::listCartConfigSet("WHERE idStore = :ID", [":ID" => intval($args['store'])]);
	
	if(isset($limit[0]['allowMin']) && isset($limit[0]['valueMin']) && $limit[0]['allowMin'] == 1 && $_SESSION[Cart::SESSION]['totalCart'] <= $limit[0]['valueMin'])
	{
		$res['msg'] = 'Valor minímo para o pedido deve ser: R$ '.maskPrice($limit[0]['valueMin']);
		echo json_encode($res);
		exit;
	}

	$user = User::verifyData();
	
	if($user == 1)
	{
		$res = ['msg' => "Falta Completar Cadastro!", 'status' => 0, 'type' => 2];
		echo json_encode($res);
		exit;
	}

	$res = ['msg' => "OK", 'status' => 1, 'type' => 0];
	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {

	if(isset($_SESSION[User::SESSION]) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] != 0) unset($_SESSION[Cart::SESSION]);
	
	$alerts = [
		"msg" => isset($_SESSION[Page::SESSION]['msg']) && !empty($_SESSION[Page::SESSION]['msg']) ? $_SESSION[Page::SESSION]['msg'] : "",
		"type" => 1,
		"time" => 2000,
	];

	$alerts['status'] = !empty($alerts['msg']) && is_numeric($alerts['type']) && $alerts['time'] > 0 ? 1 : 0;
	unset($_SESSION[Page::SESSION]['msg']);

	$page = new Page([
		"refreshCart" => 0,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Carrinho"
		]
	]);
	
	$_SESSION[Page::SESSION]['url'] = "/loja-".$args['store']."/checkout/cart/";
	
	$page->setTpl("cart", [
		'alerts' => $alerts,
		'freight' => isset($_SESSION['cartFreigth']) ? $_SESSION['cartFreigth'] : 0
	]);
	
	return $response;

});

// Page Checkout
$app->post("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	unset($_SESSION[Order::SESSION]);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	$nameUser = explode(' ', $_POST['inputName']);

	if(isset($_POST['inputName']) && empty($_POST['inputName']) || !isset($nameUser[0]) || empty($nameUser[0]) || $nameUser[0] == ' ')
	{

		$res['msg'] = "Digite seu nome!";
		echo json_encode($res);
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		$res['msg'] = "Digite seu sobrenome!";
		echo json_encode($res);
		exit;
		
	} 

	if(isset($_POST['inputType']) && $_POST['inputType'] == 0 || !isset($_POST['inputType']))
	{
		$res['msg'] = "Escolha se ira retirar ou entregar!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		
		Order::createOrder();

		$_SESSION[Order::SESSION]['type'] = intval($_POST['inputType']);
		$_SESSION[Order::SESSION]['resp'] = $_POST['inputName'];

		$res = [
			'msg' => "Tudo Ok!",
			'status' => 1,
			'options' => intval($_POST['inputType']),
		];

	} else {
		$res['options'] = 0;
	}

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);

	if(isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['totalItems'] == 0 || isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['totalCart'] == 0) 
	{
		unset($_SESSION[Cart::SESSION]);
		Cart::checkCart($args["store"], 1);
		header("Location: /loja-".$args['store']."/");
	}

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Checkout"
		]
	]);

	$page->setTpl("checkout", [
		'errorRegister' => Order::getErrorRegister(),
		'freight' => Cart::listFreight($args['store']),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 1
	]);
	
	return $response;

});

// Page Checkout Address
$app->post("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('type', 1);

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if(isset($_POST['inputAddress']) && $_POST['inputAddress'] == 0 || isset($_POST['inputAddress']) && empty($_POST['inputAddress']) || !isset($_POST['inputAddress']))
	{
		$res["msg"] = "Selecione um endereço para entrega!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['price']) && empty(trim($_POST['price'])) && !is_numeric($_POST['price']) || isset($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] < 0 || !isset($_POST['price']))
	{
		$res["msg"] = "Operação Não Permitida!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['inputAddress']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0){

		$_SESSION[Order::SESSION]['freight'] = floatval($_POST['price']);
		$_SESSION[Order::SESSION]['typeFreight'] = isset($_POST['key']) ? intval($_POST['key']) : 0;
		$_SESSION[Order::SESSION]['nameFreight'] = isset($_POST['name']) ? $_POST['name'] : "Normal";
		$_SESSION[Order::SESSION]['address'] = intval($_POST['inputAddress']);
		
		$res = [
			"msg" => "Order Update Successfully",
			"status" => 1,
			"options" => 1
		];

	} else {
		$res['options'] = 0;
	}
	
	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('type', 1);
	
	$cep = isset($_GET['c']) && is_numeric($_GET['c']) && $_GET['c'] > 0 ? $_GET['c'] : 0; 

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Checkout"
		]
	]);

	$page->setTpl("checkout-address", [
        'successMsg'=> Order::getSuccessMsg(),
		'errorRegister' => Order::getErrorRegister(),
		'address' => Address::listAddressFreigth(0, $args['store']),
		'freight' => $cep != 0 ? Store::listFreightByCep($args['store'], "", $cep) : 0,
		'priceHorary' => Cart::listPriceHorary(0, 1, "delivery"),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 2
	]);
	
	return $response;

});

// Page Checkout Horary
$app->post("/loja-{store}/checkout/horary/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('resp', "");

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	if(isset($_POST['inputCheckoutHorary']) && Order::validDate($_POST['inputCheckoutHorary']) == false || !isset($_POST['inputCheckoutHorary']))
	{
		$res['msg'] = "Selecione um Horário de Entrega!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['init']) && Order::validTime($_POST['init']) == false || !isset($_POST['init']) || isset($_POST['final']) && Order::validTime($_POST['final']) == false || !isset($_POST['final']) || isset($_POST['price']) && $_POST['price'] == "" || !isset($_POST['price']) || isset($_POST['id']) && empty($_POST['id']) || isset($_POST['id']) && $_POST['id'] < 1 || isset($_POST['id']) && $_POST['id'] > 7 || !isset($_POST['id']) || isset($_POST['type']) && $_POST['type'] == "" || isset($_POST['type']) && $_POST['type'] != 0 && $_POST['type'] != 1 || !isset($_POST['type']))
	{
		$res['msg'] = "Erro Crítico, favor atualizar a página!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['inputCheckoutHorary']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		
		$_SESSION[Order::SESSION]['horary'] = [
			"date" => $_POST['inputCheckoutHorary'],
			"init" => $_POST['init'],
			"final" => $_POST['final'],
			"price" => $_POST['price'],
			"id" => $_POST['id'],
			"type" => $_POST['type']
		];

		$res = [
			"msg" => "Order Update Successfully",
			"status" => 1,
			"options" => 1
		];

	} else{	
		$res['options'] = 0;
	}	

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/checkout/horary/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('resp', "");

	$order = isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0;
	$array = [0 => "", 1 => "withdrawal", 2 => "delivery"];

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Checkout"
		]
	]);
			
	$page->setTpl("checkout-horary", [
		'errorRegister' => Order::getErrorRegister(),
		'cartHorary' => Store::listHoraryStore($args['store'], 1, $array[$order != 0 ? $order["type"] : $order]),
		'order' => $order,
		'orderLink' => 3
	]);
	
	return $response;

});

// Page Checkout Payment
$app->post("/loja-{store}/checkout/payment/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('horary');

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	$total = ($_SESSION[Cart::SESSION]['totalCart'] + $_SESSION[Order::SESSION]['freight'] + $_SESSION[Order::SESSION]['horary']['price']); 

	if(isset($_POST['inputType']) && empty($_POST['inputType']) || !isset($_POST['inputType']))
	{
		$res['msg'] = "Selecione uma forma de pagamento!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['inputMoney']) && empty(Order::decryptMoney($_POST['inputMoney'])))
	{
		$res['msg'] = "Digite o valor do troco!";
		echo json_encode($res);
		exit;
	} else if(isset($_POST['inputMoney']) && Order::decryptMoney($_POST['inputMoney']) < $total)
	{
		$res['msg'] = "O valor do troco não pode ser menor que o total do pedido!";
		echo json_encode($res);
		exit;
	} else if(isset($_POST['inputMoney']) && strlen($_POST['inputMoney']) >= 4 && substr($_POST['inputMoney'], -1, 1) != 0 && substr($_POST['inputMoney'], -1, 1) != 5)
	{
		$res['msg'] = "Valor do troco muito quebrado!";
		echo json_encode($res);
		exit;
	}

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		
		$pay = Store::listPay($_POST['inputType'], 0, "py.idPayment");

		$_SESSION[Order::SESSION]['payment'] = $pay != 0 ? $pay[0]: 0;

		if($_SESSION[Order::SESSION]['payment'] != 0) $_SESSION[Order::SESSION]['payment']['changePay'] = isset($_POST['inputMoney']) && !empty(Order::decryptMoney($_POST['inputMoney'])) ? Order::decryptMoney($_POST['inputMoney']) : 0;

		$res = [
			"msg" => "Order Update Successfully",
			"status" => 1,
			"options" => 1
		];

	} else{	
		$res['options'] = 0;
	}
	
	echo json_encode($res);
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
			"ft" => false,
			"headerTitle" => "Checkout"
		]
	]);

	$page->setTpl('checkout-payment', [
		'errorRegister' => Order::getErrorRegister(),
		'cartPay' => Store::listPay($args['store'], 1),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderLink' => 4
	]);
	
	return $response;

});

// Page Checkout Resume
$app->post("/loja-{store}/checkout/resume/obs/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('payment');

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];
	
	if(isset($_SESSION[Cart::SESSION]) && isset($_POST['inputObsProduct']) && Cart::updateObs($_POST['inputObsProduct'])) 
	{

		$_SESSION[Cart::SESSION]['obs'] = $_POST['inputObsProduct'];

		$res = [
			'msg' => "Observação Atualizada Com sucesso!",
			'status' => 1
		];

	} else {
		$res['msg'] = "Nada Foi Atualizado!";
	}

	echo json_encode($res);
	exit;

});

$app->post("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('payment');

	$res = ['status' => 0, 'msg' => 'ERRO CRÍTICO'];

	$orders = isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0;
	$cart = isset($_SESSION[Cart::SESSION]) ? $_SESSION[Cart::SESSION] : 0;
	$status = Order::listOrdersStatus(1);
	$status = [ "orderStatus" => [
		0 => Order::configJsonOrderStatus($status[0]['descStatus'])
	] ]; 

	//if($orders == 0 || $cart == 0 || intval($store) < 1 || $horary == 0) header("Location: /");

	$total = floatval(floatval($cart['totalCart']) + $orders['freight'] + floatval($orders['horary']['price']));
	$date = date("Y-m-d");
	$time = date("H:i:s");

	$order = new Order();

	$order->setData([
		"idCart" => isset($cart) && $cart['idCart'] != 0 ? $cart['idCart'] : 0,
		"idOrderStatus" => 1,
		"idPromo" => 0,
		"idStore" => intval($args['store']),
		"idUser" => User::getId(),
		"nameRes" => isset($orders) && !empty($orders['resp']) ? $orders['resp'] : "",
		"dateHorary" => isset($orders) && Order::validDate($orders['horary']['date']) ? $orders['horary']['date'] : "",
		"timeInitial" => isset($orders) && Order::validTime($orders['horary']['init']) ? $orders['horary']['init'] : "",
		"timeFinal" => isset($orders) && Order::validTime($orders['horary']['final']) ? $orders['horary']['final'] : "",
		"priceHorary" => isset($orders) && is_numeric($orders['horary']['price']) ? floatval($orders['horary']['price']) : 0,
		"freight" => isset($orders['nameFreight']) && $orders['typeFreight'] == 2 && !empty(trim($orders['nameFreight'])) ? $orders['nameFreight'] : "Sem Frete",
		"typeFreight" => isset($orders) && $orders['type'] == 2 && $orders['typeFreight'] >= 0 && $orders['typeFreight'] <= 1 ? $orders['typeFreight'] : 0,
		"priceFreight" => isset($orders) && $orders['type'] == 2 && !empty($orders['freight']) && is_numeric($orders['freight']) ? floatval($orders['freight']) : 0,
		"typeModality" => isset($orders) && $orders['type'] != 0 ? $orders['type'] : 0,
		"changePay" => isset($orders) && is_numeric($orders['payment']['changePay']) ? $orders['payment']['changePay'] : 0,
		"discount" => 0,
		"subtotal" => floatval($cart['totalCart']),
		"total" => $total,
		"paid" => 0,
		"dateUpdate" => $date,
		"timeUpdate" => $time,
		"dateInsert" => $date,
		"timeInsert" => $time,
		"payment" => json_encode(Store::configJsonPayment($orders['payment'])),
		"address" => json_encode(Order::configJsonAddressOrder($args['store'], $orders['address'])),
		"status" => json_encode($status)
	]);

	if($order->getidCart() <= 0 || $order->getidStore() != intval($args['store']) || $order->getidUser() <= 0 || empty($order->getnameRes()))
	{
		$res['msg'] = "Alguns valores estão incorretos, favor refazer o pedido!";
		echo json_encode($res);
		exit;
	}

	$save = $order->save(1);

	if($save) 
	{	
		
		$res = ['msg' => "Order Update Successfully!", 'status' => 1, 'options' => 1];
		$_SESSION[Page::SESSION]['msg'] = "Pedido Feito com Sucesso";
	
	} else {
		$res = ['msg' => "Erro ao Inserir o Pedido!", 'status' => 0, 'options' => 0];
	}

	echo json_encode($res);
	exit;

});

$app->get("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('payment');

	if(isset($_SESSION[Order::SESSION]['cart']))
	{
		unset($_SESSION[Cart::SESSION]);
		Cart::checkCart($args["store"], 1);
		$_SESSION[Order::SESSION]['cart'] = isset($_SESSION[Cart::SESSION]) ? $_SESSION[Cart::SESSION] : $_SESSION[Order::SESSION]['cart'];
	}

	$page = new Page([
		"login" => 2,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Checkout"
		]
	]);

	$page->setTpl('checkout-resume', [
		'errorRegister' => Order::getErrorRegister(),
		"successMsg"=> Order::getSuccessMsg(),
		'order' => isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0,
		'orderAddress' => Address::listAddress(Address::cryptCode($_SESSION[Order::SESSION]['address'])),
		'orderLink' => 5
	]);
	
	return $response;

});

?>