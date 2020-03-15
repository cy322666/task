<?php

require_once 'app/core/Controller.php';

class controllerTask extends Controller
{
    public function actionCreate()
    {
        $this->view->render('Создать задачу', '' );
    }

    public function actionNew()
    {
        $this->model->loadModel('task');

        $task   = new task;
        $result = $task->validationForm($_POST);

        if($result) {
            $add = $task->addTask($this->model->connectDB(), $_POST);

            if($add) {
                $this->view->render('Задача успешно добавлена',  'К задачам');
            } else $this->view->render('Задача не добавлена, ошибка', 'ИсправитьВернуться');
        } else {
            $this->view->render('Заполните корректно данные', 'Исправить');
        }
    }
}