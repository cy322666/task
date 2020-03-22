<?php

require_once 'app/core/Controller.php';

class controllerTask extends Controller
{
    public function actionCreate()
    {
        $this->view->render('Создать задачу', '' );
    }

    public function actionAdd()
    {
        include_once 'app/models/task.php';
        $task = new task();

        $result = $this->model->validationForm($_POST);

        if($result) {
            $add = $task->addTask( $_POST);

            if($add) {
                $this->view->render('Задача успешно добавлена',  'К задачам');
            } else $this->view->render('Задача не добавлена, ошибка', 'ИсправитьВернуться');
        } else {
            $this->view->render('Заполните корректно данные', 'Исправить');
        }
    }
}