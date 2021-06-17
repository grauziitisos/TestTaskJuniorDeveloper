<?php
require ('lib/Controller.php');
require ('lib/View.php');
require ('lib/Model.php');
require ('lib/Database.php');
include ('controllers/index_controller.php');
$controller = new Index_controller();
//$controller->loadModel('index');