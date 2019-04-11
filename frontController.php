<?php
require_once "../logic/mainLogic.php";


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
         addTodo($pdo);

    } else {
        echo "404 not found";
    }
}
