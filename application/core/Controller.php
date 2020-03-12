<?php

    abstract class Controller
    {
        public $route;
        public $view;
        public $model;

        public function __construct($route)
        {
            require_once 'View.php';
            require_once 'Model.php';

            $this->route = $route;

            $this->model = new Model();
            $this->view  = new View($route);
        }

        public function loadModel($name)
        {
            $path = 'application/models/'.ucfirst($name);

            return new $path;
        }

    }