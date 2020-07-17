<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$Teste = new Esly\Teste();

	echo $Teste->helloWorld();

});

$app->run();

?>