<?php

    class Router
    {
        private $routes;

        public function __construct()
        {
            $routesPath   = ROOT.'/config/routes.php';

            print_r($routesPath);

            $this->routes = include($routesPath);
        }

        /**
         * Возвращает строку от урла
         * @return string
         */
        private function getURI()
        {
            if(!empty($_SERVER['REQUEST_URI']))
            {
                return trim($_SERVER['REQUEST_URI'], '/');//шо такое реквест ури
            }
        }


        //принимает от фронт контроллера
        public function run()
        {
            //проверить наличие запроса в роутес.пхп

            echo '<pre>URI : '; print_r($this->getURI()); echo '</pre>';

            foreach ($this->routes as $uriPattern => $path)
            {
                echo "<br>путь : $path";

                echo '<pre>'; print_r("$uriPattern"); echo '</pre>';

                if(preg_match("-$uriPattern-", $this->getURI()))
                {
                    //значит в массиве с маршрутами есть совпадение с частью урл. т.е. мы на этой странице
                    echo "+";

                    $segments = explode('/', $path);

                    echo '<pre>СЕГМЕНТ : '; print_r($segments); echo '</pre>';

                    $controllerName = 'controller'.ucfirst($segments[0]);
                    $actionName     = 'action'.ucfirst($segments[0]);

                    echo '<br> Class: '.$controllerName;
                    echo '<br> Action: '.$actionName;

                    //подключиТЬ файл - класс контроллера
                    $controllerFile = ROOT.'/Controllers/'.$controllerName.'.php';

                    echo '<pre>ФАЙЛ КОНТРОЛЛЕРА : '; print_r($controllerFile); echo '</pre>';

                    if(file_exists($controllerFile))
                    {
                        include_once ($controllerFile);

                        echo '<pre>КОНТРОЛЛЕР СУЩЕСТВУЕТ';
                    }

                    //создать объект, вызвать метод (экшн)
                    $controllerObject = new $controllerName;
                    $result           = $controllerObject->$actionName();

                    if($result != null)
                    {
                        break;
                    }
                }
            }
        }
    }