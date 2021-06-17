<?php


class Index_controller extends Controller
{

    /**
     * indexController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        session_start();
        require_once "models/index_model.php";
        $this->model = new Index_model();
        $this->model->connect();
        //var_dump($_POST);
        if (isset($_POST["delete"])) {
            if (count($_POST) > 1) {
                $this->massDelete();
            }
        }
        //aggresive use of db :(
        $updateProvidersList = true/*false*/;
        if(isset($_POST["search"])){
            $updateProvidersList = true;
                $_SESSION["search"] = $_POST["searchText"];
        }
        if(isset($_SESSION["search"]))
            $this->view->searchText = $_SESSION["search"];
        if(isset($_GET['provider']))
            if($_GET['provider']!='')
                $updateProvidersList = true;
        if(!isset($_SESSION['providers']))
            $updateProvidersList = true;
        if(isset($_GET['sort'])){
            $updateProvidersList = true;
            if (isset ($_SESSION["sort"] )){
                $sort = explode(" ", $_SESSION["sort"]);
                if(count ($sort)>1){
                    if($sort[1]=="ASC"){
                        $_SESSION["sort"] = $_GET['sort']." "."DESC";
                    }else{
                        $_SESSION["sort"] = $_GET['sort']." "."ASC";
                    }
                }else{
                    $_SESSION["sort"] = $_GET['sort']." "."ASC";
                }
            }else{
                $_SESSION["sort"] = $_GET['sort']." "."ASC";
            }
        }
        if($updateProvidersList){
            $filter2 = NULL;
            if(isset($_SESSION["search"]))
                if($_SESSION["search"]!="")
                    $filter2 = $_SESSION["search"];
            $_SESSION["providers"] = $this->model->getProviders($filter2);
        }

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $this->view->pageno = $pageno;
        $provider = '';
        if(isset($_GET['provider'])) {
            $provider = $_GET['provider'];
            $_SESSION["provider"] = $_GET['provider'];
        }else{
            if(isset($_SESSION["provider"]))
                if($_SESSION["provider"] != '')
                    $provider = $_SESSION["provider"];
        }
        $this->view->total_pages = $this->model->getTotalPages($_SESSION["sort"] ?? NULL, $provider != '' ? $provider : NULL, isset($_SESSION["search"]) && $_SESSION["search"] != ""? $_SESSION["search"] : NULL, $pageno);
        $this->view->Subscriptions = $this->model->getList($_SESSION["sort"] ?? NULL, $provider != '' ? $provider : NULL,isset($_SESSION["search"]) && $_SESSION["search"] != ""? $_SESSION["search"] : NULL, $pageno);
        $this->view->Providers = $_SESSION["providers"];
       // var_dump($this->view->Providers);
        $this->view->render('index');
    }

    private function massDelete()
    {
        $array = [];
        foreach ($_POST as  $key => $value) {
            if (intval($key) > 0)
                array_push($array, $key);
        }
        $this->model->massDelete($array);
    }
}