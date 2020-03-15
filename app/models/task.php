<?php

require_once 'app/core/Model.php';

class task extends Model
{
    function __construct()
    {
        echo 'task';
    }

    /**
     * @param $connect Model объект PDO
     * @param $value
     * @return mixed возвращает массив задач из БД
     *
     * ['countTask'] количество задач
     * ['номер страницы']
     *  label надпись
     *  ['массив 3 задач']
     *
     */
    public function getTask($connect, $value, $page)
    {
        switch ($value) {

            case 'all':
                $query = $connect->query("SELECT * FROM `task_default`");
                break;

            case 'sort':
                if($_GET == 'up') {
                    $sort = 'ASC';
                } else {
                    $sort = 'DESC';
                }
                $query = $connect->query("SELECT * FROM `task_default` ORDER BY " . $_GET['value'] . " " .$sort);

                echo "SELECT * FROM `task_default` ORDER BY " . $_GET['value'] . " " .$sort;
                break;

            case 'id':
                $query = $connect->query("SELECT * FROM `task_default` WHERE `id` = " . $_GET['id']);//
                break;
        }

        if ($query) {
            $array = $query->fetchAll();
            $task  = $this->getVars($array, $page);

            return $task;
        } else {
            echo 'Задач нет!';//static error
        }
    }

    private function getVars($array, $page)
    {
        for($i = 0, $value = 0, $j = 0; $i < count($array); $i++, $j++) {

            if($j % 3 == 0) {
                ++$value;
            }
            $taskList[$value][] = $array[$i];
        }

        $task['countTask'] = count($array);
        $task['countPage'] = $value;
        $task['page'] = $page;
        $task['task'] = $taskList[$page];

        return$task;
    }

    public function updateTask($connect)
    {
        $vals = '';

        foreach ($_POST as $value => $key) {
            $vals .= '`'.$key."` = '".$value."', ";
        }
        $query = $connect->query("UPDATE `task_default` ". $vals ."SET WHERE `id` = ".$_GET['id']);

        if($query) {
            return $query->fetchAll();
        }
    }

    function getPage($array)
    {
        if($_GET['page']) {

            $page = $_GET['page'];
            unset($_GET['page']);

        } else {
            $page = 1;
        }

//        if($_GET) {
//            $val = '&';
//        } else {
//            $val = '?';
//        }

        return $page;
            //'val'  => $val
    }

    public function addTask($connect, $array)
    {
        $values = "`id` = ".$array['text'].", `name` = ".$array['name'].", `email` = ".$array['email'];
        $connect->query("INSERT INTO `task_default` (" . $values . " )");
    }
}