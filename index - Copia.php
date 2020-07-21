<?php 

require_once("vendor/autoload.php");
require_once("functions.php");

use \Slim\Slim;

$app = new \Slim\Slim;

$app->config('debug', true);

require_once("site.php");

$app->run();

?>