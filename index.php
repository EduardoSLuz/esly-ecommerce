<?php 
setlocale(LC_TIME, "portuguese-brazilian", "ptb.UTF-8", "pt_BR");
date_default_timezone_set('America/Campo_Grande');
header('Content-Type: text/html; charset=utf-8');

use Slim\Factory\AppFactory;

require_once("vendor/autoload.php");

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

session_start();

// Add routes
require_once("functions.php");
require_once("site.php");
require_once("site-info.php");
require_once("site-login.php");
require_once("site-checkout.php");
require_once("site-account.php");
require_once("admin.php");
require_once("master.php");

//require_once("api.php");

$app->run();

?>