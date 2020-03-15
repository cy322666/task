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
    public function getTask($connect, $value)
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

            for($i = 0, $page = 0, $j = 0; $i < count($array); $i++, $j++) {
                if($j % 3 == 0) {
                    ++$page;
                    $taskList[$page]['label'] = $page;
                }
                $taskList[$page][] = $array[$i];
            }
            $taskList[1]['countTask'] = $i;

            return $taskList;
        }
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

    public function addTask($connect, $array)
    {
        $values = "`id` = ".$array['text'].", `name` = ".$array['name'].", `email` = ".$array['email'];
        $connect->query("INSERT INTO `task_default` (" . $values . " )");
    }
}