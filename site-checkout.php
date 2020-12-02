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
	
	if($product !== NULL && isset($_POST['qtd']) && $_POST['qtd'] > 0)
	{
		
		$product['qtd'] = $_POST['qtd'];

		$add = Cart::addItem($product);

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

	$nameUser = explode(' ', $_POST['modalInputName']);

	if(isset($_POST['modalInputName']) && empty($_POST['modalInputName']))
	{

		Cart::setErrorRegister("Digite seu nome!");
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		Cart::setErrorRegister("Digite seu sobrenome!");
		exit;

	} 

	if(isset($_POST['modalInputCpf']) && strlen($_POST['modalInputCpf']) < 14 || !isset($_POST['modalInputCpf']))
	{

		Cart::setErrorRegister("Digite um CPF válido!");
		exit;

	} else if (!empty($_POST['modalInputCpf']) && User::verifyCPF($_POST['modalInputCpf'])){

		Cart::setErrorRegister("CPF inválido!");
		exit;

	}

	if(isset($_POST['modalInputDateBirth']) && empty($_POST['modalInputDateBirth']) || isset($_POST['modalInputDateBirth']) && is_numeric(str_replace('-', '', $_POST['modalInputDateBirth'])) && str_replace('-', '', $_POST['modalInputDateBirth']) < "19200101" || !isset($_POST['modalInputDateBirth']))
	{
		Cart::setErrorRegister("Data Inválida!");
		exit;
	}

	if(isset($_POST['modalInputTelephone']) && strlen($_POST['modalInputTelephone']) != 14 && strlen($_POST['modalInputTelephone']) != 15 || !isset($_POST['modalInputTelephone']))
	{
		Cart::setErrorRegister("Digite um telefone válido!");
		exit;
	}

	
	if(isset($_POST['modalInputWhatsapp']) && strlen($_POST['modalInputWhatsapp']) != 14 && strlen($_POST['modalInputWhatsapp']) != 15 || !isset($_POST['modalInputWhatsapp']))
	{
		Cart::setErrorRegister("Digite um whatsapp válido!");
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
	
	$res = $user->update();

	if($res)
	{
		Cart::setSuccessMsg("Dados Atualizados com Sucesso.");
	} else {
		Cart::setErrorRegister("Nada Foi Atualizado!");
	}

	echo $res ? 1 : 0;
	exit;

});

$app->post("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {
	
	Store::verifyStore($args["store"]);

	$user = User::verifyData();
	
	echo $user ? 1 : 0;
	exit;

});

$app->get("/loja-{store}/checkout/cart/", function(Request $request, Response $response, $args) {

	if(isset($_SESSION[User::SESSION]) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['idCart'] != 0) unset($_SESSION[Cart::SESSION]);
	
	$page = new Page([
		"refreshCart" => 0,
		"data" => [
			"ID" => $args['store'],
			"ct" => false,
			"ft" => false,
			"headerTitle" => "Carrinho"
		]
	]);
	
	$_SESSION[Page::SESSION] = "/loja-".$args['store']."/checkout/cart/";
	
	$page->setTpl("cart", [
        'successMsg'=> Cart::getSuccessMsg(),
		'errorRegister' => Cart::getErrorRegister(),
		'freight' => isset($_SESSION['cartFreigth']) ? $_SESSION['cartFreigth'] : 0
	]);
	
	return $response;

});

// Page Checkout
$app->post("/loja-{store}/checkout/delivery-pickup/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	unset($_SESSION[Order::SESSION]);

	$nameUser = explode(' ', $_POST['inputName']);

	if(isset($_POST['inputName']) && empty($_POST['inputName']) || !isset($nameUser[0]) || empty($nameUser[0]) || $nameUser[0] == ' ')
	{

		Order::setErrorRegister("Digite seu nome!");
		exit;

	} else if(!isset($nameUser[1]) || empty($nameUser[1]) || $nameUser[1] == ' '){

		Order::setErrorRegister("Digite seu sobrenome!");
		exit;
	} 

	if(isset($_POST['inputType']) && $_POST['inputType'] == 0 || !isset($_POST['inputType']))
	{
		Order::setErrorRegister("Escolha se ira retirar ou entregar!");
		exit;
	}

	if(isset($_POST['inputType']) && $_POST['inputType'] == 2 && !isset($_POST['inputFreight']))
	{
		Order::setErrorRegister("Selecione um tipo de entrega!");
		exit;
	}

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		
		Order::createOrder();

		$_SESSION[Order::SESSION]['type'] = intval($_POST['inputType']);
		$_SESSION[Order::SESSION]['typeFreight'] = isset($_POST['inputFreight']) && $_POST['inputType'] == 2 ? $_POST['inputFreight'] : 0;
		$_SESSION[Order::SESSION]['resp'] = $_POST['inputName'];

		echo intval($_POST['inputType']);

	} else {
		echo 0;
	}

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

	if(isset($_POST['inputAddress']) && $_POST['inputAddress'] == 0 || isset($_POST['inputAddress']) && empty($_POST['inputAddress']) || !isset($_POST['inputAddress']))
	{
		Order::setErrorRegister("Selecione um endereço para entrega!");
		exit;
	}

	if(isset($_POST['price']) && $_POST['price'] == " " || isset($_POST['price']) && empty($_POST['price']) || !isset($_POST['price']))
	{
		Order::setErrorRegister("Algo deu errado, favor atualize a página!");
		exit;
	}

	if(isset($_POST['inputAddress']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0){

		$_SESSION[Order::SESSION]['freight'] = intval($_POST['price']);
		$_SESSION[Order::SESSION]['address'] = intval($_POST['inputAddress']);
		
		echo 1;

	} else{
		echo 0;
	}
	
	exit;

});

$app->get("/loja-{store}/checkout/address/", function(Request $request, Response $response, $args) {
	
	/*
	if(isset($_SESSION[Order::SESSION]))
	{ 
		var_dump($_SESSION[Order::SESSION]); 
		exit;
	}
	*/

	Cart::verifyRegister($args['store']);
	Order::verifyOrder('type', 1);

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
		'address' => Address::listAddressFreigth(0, ["store" => $args['store'], "type" => $_SESSION[Order::SESSION]['typeFreight']]),
		"cities" => Store::listCityStore(),
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

	if(isset($_POST['inputCheckoutHorary']) && Order::validDate($_POST['inputCheckoutHorary']) == false || !isset($_POST['inputCheckoutHorary']))
	{
		Order::setErrorRegister("Selecione um Horário de Entrega!");
		exit;
	}

	if(isset($_POST['init']) && Order::validTime($_POST['init']) == false || !isset($_POST['init']) || isset($_POST['final']) && Order::validTime($_POST['final']) == false || !isset($_POST['final']) || isset($_POST['price']) && $_POST['price'] == "" || !isset($_POST['price']) || isset($_POST['id']) && empty($_POST['id']) || isset($_POST['id']) && $_POST['id'] < 1 || isset($_POST['id']) && $_POST['id'] > 7 || !isset($_POST['id']) || isset($_POST['type']) && $_POST['type'] == "" || isset($_POST['type']) && $_POST['type'] != 0 && $_POST['type'] != 1 || !isset($_POST['type']))
	{
		Order::setErrorRegister("Erro Crítico, favor atualizar a página!");
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

		echo 1;

	} else{	
		echo 0;
	}	

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

	$total = ($_SESSION[Cart::SESSION]['totalCart'] + $_SESSION[Order::SESSION]['freight'] + $_SESSION[Order::SESSION]['horary']['price']); 

	if(isset($_POST['inputType']) && empty($_POST['inputType']) || !isset($_POST['inputType']))
	{
		Order::setErrorRegister("Selecione uma forma de pagamento!");
		exit;
	}

	if(isset($_POST['inputMoney']) && empty(Order::decryptMoney($_POST['inputMoney'])))
	{
		Order::setErrorRegister("Digite o valor do troco!");
		exit;
	} else if(isset($_POST['inputMoney']) && Order::decryptMoney($_POST['inputMoney']) < $total)
	{
		Order::setErrorRegister("O valor do troco não pode ser menor que o total do pedido!");
		exit;
	} else if(isset($_POST['inputMoney']) && strlen($_POST['inputMoney']) >= 4 && substr($_POST['inputMoney'], -1, 1) != 0 && substr($_POST['inputMoney'], -1, 1) != 5)
	{
		Order::setErrorRegister("Valor do troco muito quebrado!");
		exit;
	}

	if(isset($_POST['inputType']) && isset($_SESSION[Cart::SESSION]) && $_SESSION[Cart::SESSION]['items'] != 0)
	{
		
		$pay = Store::listPay($_POST['inputType'], 0, "py.idPayment");

		$_SESSION[Order::SESSION]['payment'] = $pay != 0 ? $pay[0]: 0;

		if($_SESSION[Order::SESSION]['payment'] != 0) $_SESSION[Order::SESSION]['payment']['changePay'] = isset($_POST['inputMoney']) && !empty(Order::decryptMoney($_POST['inputMoney'])) ? Order::decryptMoney($_POST['inputMoney']) : 0;

		echo 1;

	} else{	
		echo 0;
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

	if(isset($_SESSION[Cart::SESSION]) && isset($_POST['inputObsProduct']) && Cart::updateObs($_POST['inputObsProduct'])) 
	{

		$_SESSION[Cart::SESSION]['obs'] = $_POST['inputObsProduct'];

		Order::setSuccessMsg("Observação Atualizada Com sucesso!");

	} else {
		Order::setErrorRegister("Nada Foi Atualizado!");
	}

	exit;

});

$app->post("/loja-{store}/checkout/resume/", function(Request $request, Response $response, $args) {

	Store::verifyStore($args["store"]);
	Order::verifyOrder('payment');

	$orders = isset($_SESSION[Order::SESSION]) ? $_SESSION[Order::SESSION] : 0;
	$cart = isset($_SESSION[Cart::SESSION]) ? $_SESSION[Cart::SESSION] : 0;
	$status = Order::listOrdersStatus(1);
	$status = [ "orderStatus" => [
		0 => Order::configJsonOrderStatus($status[0]['descStatus'])
	] ]; 

	//if($orders == 0 || $cart == 0 || intval($store) < 1 || $horary == 0) header("Location: /");
	
	if($orders['type'] == 2){
		$typeFreight = $orders['typeFreight'] == 1 ? "Express" : "Normal";
	} else {
		$typeFreight = "Sem Frete";
	}

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
		"freight" => $typeFreight,
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
		Order::setErrorRegister("Alguns valores estão incorretos, favor refazer o pedido!");
		exit;
	}

	$res = $order->save(1);

	echo intval($res);
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