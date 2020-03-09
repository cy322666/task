<?php

//namespace application\controllers;

//use application\core\Controller;

require_once 'application/core/Controller.php';

class controllerAccount extends Controller
{
    public function actionLogin()
    {
            echo 'in actionLogin';
            $this->view->render('Вход');
//            $db = mysqli_connect('localhost', 'cy322666', 'jd5xugLMrr', 'phpmyadmin');
//            $db = new PDO('mysql:dbname=phpmyadmin;host=127.0.0.1','cy322666','jd5xugLMrr', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
//
//            //if($db) var_dump($db);
//
//            /*
//             * по ГЕТ может прилетать номер страницы
//             * изначально кидаем на 1
//             * если итог деления меньше 1 то страница 1
//             * затем выводим -1 и +1 страницы
//             * в принципе соединение с бд нужно всегда
//             * надо инициализировать повыше после всех проверок страниц
//             */
//
//            $query = $db->query("SELECT * FROM `task_default`");
//            $query = $query->fetchAll();
//            var_dump($query);
//
//            echo '</br>COUNT TASK : '.count($query);
//            echo '</br>COUNT PAGE : '.count($query) / 3;
//
//            $page = '1';
//            //к примеру пришел стр 1
//            $countPages = round(count($query)) / 3;
//
//            if($countPages == $page)
//            {
//                echo $page.' page';
//
//            } elseif($countPages <= 1) echo '1';
//
//
//            echo '<pre>'; print_r($query); echo '</pre>';
        }
    }