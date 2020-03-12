<?php

class Model
{
    static function getConnection()
    {
        $val = require_once 'application/config/db.php';
        $dsn = "mysql:dbname=".$val['dbname'].';host='.$val['host'];

        try {
            $db = new PDO( $dsn, $val['user'], $val['pass']);

            if ($db) {
                return $db;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    function loadModel($value)
    {
        require_once 'application/models/task.php';

        $task  = new task();

        $taskList  = $task->getTask(Model::getConnection(), $value);

        $vars = [ 'taskList' => $taskList ];

        return $vars;
    }

    static function validationForm($array)
    {
        foreach ($array as $key => $value) {

            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);

            $array[$key] = $value;

            if ($array[$key] == '') {
                return false;
            }
        }
        return $array;
    }

    static function checkAdmin()
    {
        if((!isset($_COOKIE['admin']) OR ($_COOKIE['admin'] == 'exit'))) {
            return false;
        } elseif($_COOKIE['admin'] == 'login') {
            return true;
        }
    }
}
