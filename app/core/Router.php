<?php

class Router
{
    public $routes;

    public function __construct()
    {
        $this->routes = include_once(ROOT.'/app/config/routes.php');

        foreach ($this->routes as $uriPattern => $array)
        {
            if (preg_match("-$uriPattern-", Model::getURI()))
            {
                return $this->route = $array;
            }
        }
    }


    /**
     * работает с route - это массив
     * который получаем по ключу (getURI)
     * из файла config/routes.php/
     */
    public function run()
    {
        if($this->route)
        {
            $controllerName = 'controller'.ucfirst($this->route['controller']);
            $controllerPath = 'app/controllers/'.$controllerName;

            if(file_exists($controllerPath.'.php'))
            {
                include_once($controllerPath.'.php');

                $action = 'action'.ucfirst($this->route['action']);

                $controller = new $controllerName($this->route);
                $controller->$action();
            }
        } //else echo '!file';
    }
}
