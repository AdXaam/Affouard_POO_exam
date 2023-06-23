<?php
require 'autoload.php';


if(!array_key_exists("controller", $_GET) &&
    !array_key_exists("action", $_GET)) {
    header('Location: index.php?controller=default&action=home');
}

if($_GET["controller"] == 'default'){
    $controller = new DefaultController();
    if($_GET["action"] == "home"){
        $controller->home();
    }
    if($_GET["action"]== 'not-found'){
        $controller->notFound();
    }
}

if ($_GET["controller"] == "moto"){
    $controller = new MotoController();
    if ($_GET["action"] == "list"){
        $controller->displayAll();
    }
    if ($_GET["action"] == "detail" && array_key_exists( 'id', $_GET)){
        $controller->displayOne($_GET["id"]);
    }
}
