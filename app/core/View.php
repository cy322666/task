<?php

class View
{
    public $path;
    public $route;

    /**
     * View constructor.
     * @param $route - массив с маршрутом
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path  = $this->route['controller'].'/'.$this->route['action'];
    }

    public function render($title, $vars = [])
    {
        require_once 'app/views/template.php';

        $viewFile = 'app/views/layouts/'.$this->path.'.php';

        require_once $viewFile;
    }
}