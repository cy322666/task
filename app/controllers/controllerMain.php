<?php

require_once 'app/core/Controller.php';

class controllerMain extends Controller
{
    public function actionIndex()
    {
        if(!$_SESSION['admin']) {

            $this->model->loadModel('task');

            $task = new task;
            $vars = $task->getContent('all', $_GET['page']);

            Model::arrPrint($vars);

            $content = $this->view->render('Главная страница', $vars);

            Model::arrPrint($content);

        } else header( "Location: account/admin");
    }

    function actionSort()
    {
        $this->model->loadModel('task');
        $task = new task;

        $page = $task->getPage($_GET);
        $vars = $task->getTask($this->model->connectDB(), 'sort', $page);

        $content = $this->view->render('Сортировка на главной', $vars);
    }

}