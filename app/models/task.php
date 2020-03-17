<?php

require_once 'app/core/Model.php';

class task extends Model
{
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
    public function getTask($dbh, $value, $page)
    {
        switch ($value) {

            case 'all':
                $sth = $dbh->prepare("SELECT * FROM `task_default`");
                $sth->execute();

                break;

            case 'sort':
                if($_GET == 'up') $sort = 'ASC';
                    else $sort = 'DESC';

                $sth = $dbh->prepare("SELECT * FROM `task_default` ORDER BY " . $_GET['value'] . " " .$sort);
                $sth->execute();
                $array = $sth->fetch(PDO::FETCH_ASSOC);

                break;

            case 'id':
                $sth = $dbh->prepare("SELECT * FROM `task_default` WHERE `id` = :id");
                $sth->execute(['id' => $_GET['id']]);
                $array = $sth->fetch(PDO::FETCH_ASSOC);

                break;
        }

        if($array) {
            if($value != 'id') {
                $array = $this->getVars($array, $page);
            }
            return $array;
        } else return 'Задач нет!';//static error
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
        foreach ($_POST as $key => $value) {
            if($value) {
                if($value == 'checkbox') {
                    $vars .= "`status` = 'completed', ";
                } else {
                    $vars .= '`'.$key."` = '".$value."', ";
                }
            }
        }
        $vars = trim($vars, ', ');

        $sth = $dbh->prepare("UPDATE `task_default` SET `name` = :name WHERE `id` = :id");
        $sth->execute(array('name' => 'Виноград', 'id' => 22));

        echo $vars;
        //$query = $connect->query( ". $vars ."SET WHERE `id` = ".$_GET['id']);

//        if($query) {
//            return $query->fetchAll();
//        }
    }

    function getPage($array)
    {
        if($_GET['page']) {
            $page = $_GET['page'];
            unset($_GET['page']);

        } else $page = 1;

        return $page;
    }

    public function addTask($connect, $array)
    {
        $keys   = "`text`, `name`, `email`";
        $values = "'".$array['text']."', '".$array['user']."', '".$array['email']."'";

        $request = $connect->query("INSERT INTO `task_default` (".$keys.") VALUES (".$values.") ");

        if($request){
            return true;
        } else return false;
    }

    public function validationForm($array)
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
}