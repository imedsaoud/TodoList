<?php
require_once "../logic/mainLogic.php";

$url = $_SERVER["REQUEST_URI"];
$method = strtoupper($_SERVER["REQUEST_METHOD"]);



if($url !== '/' ){
    echo "404 not found";
} else {

    echo render();
}