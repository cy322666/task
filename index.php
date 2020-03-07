<?php

    define('ROOT', dirname(__FILE__));

    require_once ROOT . '/Components/Router.php';

    $router = new Router();

    echo '<pre>'; print_r($router); echo '</pre>';

    $router->run();


