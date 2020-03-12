<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//
//echo '11';


//use application\core\Router;

define('ROOT', dirname(__FILE__));

require ROOT . '/application/core/Router.php';

error_reporting(0);

$router = new Router();
$router->run();


