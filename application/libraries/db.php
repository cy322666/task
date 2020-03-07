<?php
//DB.class.php

    class DB {

        function __construct($db_acces)
        {
            $this->db_name = $db_acces['db_name'];
            $this->db_user = $db_acces['db_user'];
            $this->db_pass = $db_acces['db_pass'];
            $this->db_host = $db_acces['db_host'];
        }

        function connect()
        {
            $this->connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

            if(!$this->connect)
            {
                file_put_contents('errors.txt', date('l jS \of F Y h:i:s A'). "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error()."\n", FILE_APPEND);
            } else {
                echo 'connect db';
                mysqli_set_charset($this->connect, 'utf8');
            }

        }

        function query($query)
        {
            $result = mysqli_query($this->connect, $query);

            if(!$result) file_put_contents('errors.txt', date('l jS \of F Y h:i:s A'). "Произошла ошибка при выполнении запроса \n", FILE_APPEND);

            else {

                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if($rows)
                {
                    foreach ($rows as $row)
                    {
                        $arr[] = $row;
                    }
                    return $arr;
                }
            }
        }
    }
?>