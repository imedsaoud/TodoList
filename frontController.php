<?php
require_once "conf.php";
require_once __ROOT_DIR__ . "/logic/mainLogic.php";



$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER['REQUEST_METHOD'];






if($method === GET){
    if($uri === '/' ){
        echo DefaultState($pdo);

    } else {
        echo "404 not found";
    }
}


if($method === POST){
    if($uri === '/add' ){

        queryCheckAdd($_POST , $pdo );
        header("location: /");

    } else {
        echo "404 not found";
    }
}
