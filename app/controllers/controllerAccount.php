<?php

require_once 'app/core/Controller.php';

class controllerAccount extends Controller
{
    public function actionLogin()
    {
        $this->view->render('Вход', '' );
    }

    public function actionAdmin()
    {
        include_once 'app/models/task.php';
        include_once 'app/models/user.php';

        $task = new task();
        $user = new user();

        $vars = $task->getContent('all', $_GET['page']);
        $vars['user'] = $user->navbarLabel();
        $content = $this->view->render('Главная страница', $vars);
    }

    public function actionEdit()
    {
        include_once 'app/models/task.php';

        $task = new task;
        $vars = $task->addTask('id', '');
        $content = $this->view->render('Обновление задачи', $vars);

        $this->view->render('Редактировать задачу', $vars);
    }

    public function actionUpdate()
    {
        include_once 'app/models/task.php';

        $task = new task;
        $vars = $task->updateTask('id', '');
        $content = $this->view->render('Обновление задачи', $vars);
    }

    /**
     * Обработка формы входа Админа
     */
    public function actionAccess()
    {
        include_once 'app/models/task.php';
        include_once 'app/models/user.php';

        $task = new task();
        $user = new user();

        $admin = $user->accessLogin();

        if($admin['admin'] == true) {
            $vars = $task->getContent('all', $_GET['page']);
            $vars['user'] = $user->navbarLabel();
            $content = $this->view->render('Главная страница', $vars);

            $this->view->render('Hello, Admin!', $vars);
        } else {
            //$user->feedbackAdmin();
            $this->view->path = 'account/feedback';
            $this->view->render('Отправка формы', $admin);
        }
    }


    public function actionSort()
    {
        $vars = $this->model->loadModel('sort');

        $this->view->render('Сортировка', $vars );
    }

    public function actionExit()
    {
        $vars = $this->model->loadModel('all');

        $this->view->render('Главная страница', $vars);
    }
}