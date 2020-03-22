<?php

class Controller
{
    public $route;
    public $view;
    public $model;

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;

        echo 'ПЕЧАТЬ ROUTER, VIEW, CONTROLLER';
        Model::arrPrint($this->route);

        $this->model = new Model();
        $this->view  = new View($route);

        Model::arrPrint($this->model);
        Model::arrPrint($this->view);
    }
}