<?php
    class Router
    {
        public $routes;

        public function __construct()
        {
            $this->routes = include_once(ROOT.'/application/config/routes.php');

            //echo '<pre>URI : '; print_r( Router::getURI()); echo '</pre>';

            foreach ($this->routes as $uriPattern => $array)
            {
                if (preg_match("-$uriPattern-", Router::getURI()))
                {
                    return $this->route = $array;
                }
            }
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

        static function getPage()
        {
            if($_GET['activePage']) {
                $page = $_GET['activePage'];
                unset($_GET['activePage']);

            } else {
                $page = '1';
            }

            if($_GET) {
                $val = '&';
            } else {
                $val = '?';
            }

            return [
                'page' => $page,
                'val'  => $val
            ];
        }

        //принимает от фронт контроллера
        public function run()
        {
            if($this->route)
            {
                //значит в массиве с маршрутами есть совпадение с частью урл. т.е. мы на этой странице
//                echo "+";
//                echo '<pre>ПАТТЕРН = GETURI : '; print_r($this->route); echo '</pre>';

                $controllerName = 'controller'.ucfirst($this->route['controller']);

                //echo '<br> Class: '.$controllerName;

                //подключиТЬ файл - класс контроллера
                $controllerPath = 'application/controllers/'.$controllerName;

                //echo '<pre>PATH КОНТРОЛЛЕРА : '; print_r($controllerPath); echo '</pre>';

                if(file_exists($controllerPath.'.php'))
                {
                    include_once($controllerPath.'.php');

                    $action = 'action'.ucfirst($this->route['action']);

                    //var_dump($action);

                    $controller = new $controllerName($this->route);
                    $controller->$action();
                }
            } //else echo '!file';
        }
    }
