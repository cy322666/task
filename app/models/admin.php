<?php

class admin
{
    static function checkAdmin()
    {
        if ((!isset($_COOKIE['admin']) OR ($_COOKIE['admin'] == 'exit'))) {
            return false;
        } elseif ($_COOKIE['admin'] == 'login') {
            return true;
        }
    }
}
