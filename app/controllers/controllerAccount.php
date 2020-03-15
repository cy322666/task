<?php

use application\core\Controller;

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

    public function actionAccess()
    {
        $result = Model::validationForm($_POST);
        $access = require_once 'app/config/admin.php';

        if (($result AND ($access['login'] == $result['login']) AND
            ($access['pass'] == $result['pass']))) {

            $vars = $this->model->loadModel('all');
            setcookie('admin', 'login', 0, '/');
            $this->view->render('Hello, Admin!', $vars );

        } else {
            $vals = [
                'label' => 'Неправильный логин или пароль!',
                'button' => 'Вернуться'
            ];
            $this->view->render('Ошибка', $vals);
        }
    }

    public function actionAdmin()
    {
        $vars = $this->model->loadModel('all');

        if(Model::checkAdmin()) {
            $this->view->render('Hello, Admin!', $vars );
        } else require_once 'app/views/noaccess.php';

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