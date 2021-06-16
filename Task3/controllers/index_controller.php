<?php


class Index_controller extends Controller
{

    /**
     * indexController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        require "models/index_model.php";
        $this->model = new Index_model();
        $this->model->connect();

        $this->view->Subscriptions = $this->model->getList(NULL, NULL);
        $this->view->render('index');
    }


}