<?php
require_once 'app/core/Controller.php';

class controllerMain extends Controller
{
    public function actionIndex()
    {
        include_once 'app/models/task.php';
        include_once 'app/models/user.php';

        $task = new task();
        $user = new user();

        $vars = $task->getContent('all', $_GET['page']);
        $vars['user'] = $user->navbarLabel();
        $content = $this->view->render('Главная страница', $vars);
    }

    public function actionSort()
    {
        $vars = $this->model->loadModel('task', 'sort', $_GET['page']);

        $content = $this->view->render('Сортировка', $vars);
    }
}