<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

print_r($_SESSION);

define('ROOT', dirname(__FILE__));

require ROOT . '/app/core/Model.php';
require ROOT . '/app/core/Router.php';

$router = new Router;
$router->run();


