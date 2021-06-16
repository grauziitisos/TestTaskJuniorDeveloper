<?php


class Controller
{
    protected View $view;
    protected Model $model;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel ($name){
        $path = 'models/'.$name.'_model.php';
        $modelName = ucfirst($name).'_model';
        $this->model = new $modelName;
    }
}