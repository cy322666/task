<?php

require_once 'app/core/Model.php';

class admin Extends Model
{
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

    static function checkAdmin()
    {
        if ((!isset($_COOKIE['admin']) OR ($_COOKIE['admin'] == 'exit'))) {
            return false;
        } elseif ($_COOKIE['admin'] == 'login') {
            return true;
        }
    }


}
