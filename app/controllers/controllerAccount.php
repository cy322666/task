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
        require_once 'app/models/task.php';

        $task = new Task;
        $vars = $task->getTask(Model::getConnection(), 'id');

        if(Model::checkAdmin()) {
            $this->view->render('Редактировать задачу', $vars);
        } else require_once 'app/views/noaccess.php';
    }

    public function actionUpdate()
    {
        require_once 'app/models/task.php';

        $task = new Task;
        $task->updateTask(Model::getConnection());

        if(Model::checkAdmin()) {
            $this->view->render('Обновление', '' );
        } else require_once 'app/views/noaccess.php';
    }

    /**
     * Обработка формы входа Админа
     */
    public function actionAccess()
    {
        $access = require_once 'app/config/admin.php';

        $this->model->loadModel('admin');

        $admin = new admin;
        $login = $admin->validationForm($_POST);

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