<?php

require_once 'app/core/Controller.php';

class controllerMain extends Controller
{
    /**
     * При переходе на главную
     * Если сессия админа, то перебрасывает на админку
     */
    public function actionIndex()
    {
        if(!$_SESSION['admin']) {
            $this->model->loadModel('task');
            $task = new task;

            $page = $task->getPage($_GET);
            $vars = $task->getTask($this->model->connectDB(), 'all', $page);

            $this->view->render('Главная страница', $vars);

        } else header( "Location: account/admin");
    }

    function actionSort()
    {
        $this->model->loadModel('task');
        $task = new task;

        $page = $task->getPage($_GET);
        $vars = $task->getTask($this->model->connectDB(), 'sort', $page);

        $this->view->render('Сортировка на главной', $vars);
    }

}