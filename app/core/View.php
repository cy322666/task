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
        if($vars['countPage']) {
            $navbar = 'app/views/navbar.php';
        }
        if($vars['page']) {
            $pager = 'app/views/pager.php';
        }
        $content = 'app/views/layouts/'.$this->path.'.php';

        require_once 'app/views/template.php';
    }
}