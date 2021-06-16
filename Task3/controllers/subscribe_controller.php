<?php

include ("lib/subscription.php");
class Subscribe_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        require "models/subscribe_model.php";
        $this->model = new Subscribe_model();
        $this->model->connect();
        $this->view->subscriptionAdded = false;
        $this->addSubscriber();
        $this->view->render('subscribe');
    }

    private function endsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        return substr( $haystack, -$length ) === $needle;
    }

    private function addSubscriber(){
        $this->view->cb_agreeTerms = false;
    if(count($_POST)>0) {
        if(!isset($_POST["cb_agreeTerms"]))
            $this->view->agreedTerms = false;
        else {
            if($_POST["cb_agreeTerms"] == "on")
                $this->view->cb_agreeTerms = true;
            $this->view->agreedTerms = true;
        }
        if(!isset($_POST["email"]))
            $this->view->enteredEmail = false;
        else {
            if($_POST["email"]=="")
                $this->view->enteredEmail = false;
            else {
                $this->view->enteredEmail = true;
                $this->view->email = $_POST["email"];
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                $this->view->enteredValidEmail = false;
                else {
                    $this->view->enteredValidEmail = true;
                    if($this->endsWith($_POST["email"], "co"))
                        $this->view->enteredColumbianEmail = true;
                    else{
                        $subscription = new \JuniorDeveloper\Task3\subscription();
                        $subscription->setEmail($_POST["email"]);
                        $this->model->addSubscriber($subscription);
                        $this->view->subscriptionAdded = true;
                    }
                }
            }
        }
    }
    }
}