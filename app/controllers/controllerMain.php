<?php
require_once 'app/core/Controller.php';

class controllerMain extends Controller
{
    public function actionIndex()
    {
        $vars = $this->model->loadModel('task', 'all', $_GET['page']);
        if(!$_SESSION['admin']) {
            $content = $this->view->render('Главная страница', $vars);
        } else header( "Location: account/admin");
    }

    function actionSort()
    {
        $vars = $this->model->loadModel('task', 'sort', $_GET['page']);
        if(!$_SESSION['admin']) {
            $content = $this->view->render('Сортировка на главной', $vars);
        } else header( "Location: account/admin");
    }
}