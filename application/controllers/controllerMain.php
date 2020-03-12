<?php

//namespace application\controllers;

//use application\core\Controller;

require_once 'application/core/Controller.php';

class controllerMain extends Controller
{
    function actionIndex()
    {
        $vars = $this->model->loadModel('all');

        $this->view->render('Главная страница', $vars );
    }

    function actionSort()
    {
        $vars = $this->model->loadModel('sort');

        $this->view->render('Сортировка на главной', $vars);
    }

}