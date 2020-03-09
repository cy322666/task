<?php

    abstract class Controller
    {
        public $route;
        public $view;

        public function __construct($route)
        {
            require_once 'View.php';

            $this->route = $route;
            $this->view = new View($route);

            //$this->model = $this->loadModel($route['controller']);

            var_dump($this->route);
        }

        public function loadModel($name)
        {
            $path = 'application/models/'.ucfirst($name);

                return new $path;

            var_dump($path);
        }

    }