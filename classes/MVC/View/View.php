<?php

namespace mvc\View;

class View
{
    private $controller;
    private $model;

    public function __construct($controller, $model)
    {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output()
    {
        return $this->model->title;
    }
}
