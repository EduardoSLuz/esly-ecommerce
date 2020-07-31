<?php 
session_start();

use Slim\Factory\AppFactory;

require_once("vendor/autoload.php");

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
require_once("functions.php");
require_once("site.php");

$app->run();

?>