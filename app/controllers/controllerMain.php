<?php

require_once 'app/core/Controller.php';

class controllerMain extends Controller
{
    function actionIndex()
    {
        $this->model->loadModel('task');
        $task = new task;
        $vars = $task->getTask($this->model->connectDB(), 'all');

        //Model::arrPrint($vars);

        $this->view->render('Главная страница', $vars );
    }

    function actionSort()
    {
        $vars = $this->model->loadModel('sort');

        $this->view->render('Сортировка на главной', $vars);
    }

}