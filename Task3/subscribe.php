<?php
require ('lib/Controller.php');
require ('lib/View.php');
require ('lib/Model.php');
require ('lib/Database.php');
include ('controllers/subscribe_controller.php');
$controller = new Subscribe_controller();
//$controller->loadModel('subscribe');