<?php

class Model
{
    private function connectDB()
    {
        $val = include_once 'app/config/db.php';
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

    public function loadModel($name, $key, $page)
    {
        $path  = 'app/models/'.$name;
        require_once $path.'.php';

        $dbh   = $this->connectDB();
        $model = new $name;
        $vars  = $model->getContent($dbh, $key, $page);

        return $vars;
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

    static function arrPrint($array)
    {
        echo "<pre>"; print_r($array); echo "</pre>";
    }

    /**
     * Возвращает строку от урла
     * @return string
     */
    static function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}
