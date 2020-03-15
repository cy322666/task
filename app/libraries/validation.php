<?php

    class validation
    {
        static function checkValidationForm($array)
        {
            foreach ($array as $value => $key)
            {
                $result[$key] = trim($value);
                $result[$key] = stripslashes($value);
                $result[$key] = htmlspecialchars($value);
            }

            return $result;
        }
    }