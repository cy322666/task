<?php

    //namespace application\core;

    class View
    {
        public $path;
        public $route;
        public $layout = 'default';

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
            $path = 'application/views/layouts/'.$this->path.'.php';

            //echo '<pre>PATH LAYOUTS'; print_r($path); echo '</pre>';

            require_once $path;
        }
    }