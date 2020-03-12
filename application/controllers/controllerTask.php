<?php

//namespace application\controllers;

//use application\core\Controller;

require_once 'application/core/Controller.php';

class controllerTask extends Controller
{
    public function actionCreate()
    {
        $this->view->render('Создать задачу', '' );
    }

    public function actionNewTask()
    {
        $result = Model::validationForm($_POST);

        if($result) {
            $vals = [
                'label' => 'Задача успешно добавлена',
                'button' => 'К Задачам'
            ];
            $this->view->render('Успешно',  $vals);
        } else {

            $vals = [
                'label' => 'Заполните корректно данные',
                'button' => 'Исправить'
            ];
            $this->view->render('Ошибка', $vals);
        }
    }
}