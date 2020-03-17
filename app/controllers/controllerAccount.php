<?php

require_once 'app/core/Controller.php';

class controllerAccount extends Controller
{
    public function actionLogin()
    {
        $this->view->render('Вход', '' );
    }

    public function actionEdit()
    {
        $this->model->loadModel('task');

        $task = new task;
        $vars = $task->getTask($this->model->connectDB(), 'id', '');

        $this->view->render('Редактировать задачу', $vars);
    }

    public function actionUpdate()
    {
        $this->model->loadModel('task');

        $task = new task;
        $vars = $task->updateTask($this->model->connectDB(), 'id', '');

            $this->view->render('Обновление', '' );
    }

    /**
     * Обработка формы входа Админа
     */
    public function actionAccess()
    {
        $access = require_once 'app/config/admin.php';

        $this->model->loadModel('task');

        $task = new task;
        $login = Model::validationForm($_POST);

        if($login) {
            if (($login AND ($access['login'] == $login['login']) AND
                ($access['pass'] == $login['pass']))) {

                    $this->model->loadModel('task');
                    $task = new task;

                    $page = $task->getPage($_GET);
                    $vars = $task->getTask($this->model->connectDB(), 'all', $page);

                    $_SESSION['admin'] = true;

                    $this->view->render('Hello, Admin!', 'В админку');
            } else {
                $this->view->render('Неправильный логин или пароль!', 'Вернуться');
            }
        }
    }

    public function actionAdmin()
    {
        $this->model->loadModel('task');
        $task = new task;

        $page = $task->getPage($_GET);
        $vars = $task->getTask($this->model->connectDB(), 'all', $page);

        $this->view->render('Кабинет Администратора', $vars);

    }

    public function actionSort()
    {
        $vars = $this->model->loadModel('sort');

        if(Model::checkAdmin()) {
            $this->view->render('Сортировка', $vars );
        } else require_once 'app/views/noaccess.php';
    }

    public function actionExit()
    {
        $vars = $this->model->loadModel('all');

        $this->view->render('Главная страница', $vars);
    }
}