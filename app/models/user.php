<?php


class user extends Model
{
    public function accessLogin()
    {
        $admin = $this->checkAdmin();

        if ($admin['admin'] == false) {
            $result = $this->validationForm($_POST);

            if ($result) {
                $access = require_once 'app/config/admin.php';

                if ($access['login'] == $_POST['login'] AND
                    $access['pass'] == $_POST['pass']) {

                    $admin['label'] = 'Вы успешно вошли';
                    $admin['href'] = 'admin';
                    $admin['button'] = 'Задачи';
                } else {
                    $admin['label'] = 'Неправильный логин или пароль';
                    $admin['href'] = 'login';
                    $admin['button'] = 'Назад';
                }
            } else {
                $admin['label'] = 'Введенные данные содержат ошибку';
                $admin['href'] = 'login';
                $admin['button'] = 'Исправить';
            }
        } else {
            $admin['label'] = 'Вы уже вошли в кабинет';
            $admin['href'] = 'admin';
            $admin['button'] = 'Задачи';
        }
        return $admin;
    }

    public function navbarLabel() {
        $admin  = $this->checkAdmin();

        if(!$admin['admin']) {
            //не вошли
            $admin['label'] = 'Вход';
            $admin['href'] = 'account/login';
            return $admin;

        } else {
            $admin['label'] = 'Выход';
            $admin['href'] = '/task';
            return $admin;
        }
    }

    public function feedbackAdmin() {

    }

    private function checkAdmin()
    {
        if($_SESSION['admin'] == true) {
            return $vars = [
                'admin'=> true,
                'label' => '',
                'href' => ''
            ];
        } else return $vars = [
            'admin'=> false,
            'label' => '',
            'href' => ''
        ];
    }
}