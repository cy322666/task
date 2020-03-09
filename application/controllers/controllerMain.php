<?php

//namespace application\controllers;

//use application\core\Controller;

require_once 'application/core/Controller.php';

class controllerMain extends Controller
{
    function actionIndex()
    {
        $this->view->render('Главная страница','');
    }

    function actionSort()
    {

        require_once ROOT. '/application/views/header.php';
    }
}