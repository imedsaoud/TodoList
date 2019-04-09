<?php
require_once "../logic/mainLogic.php";


$url = $_SERVER["REQUEST_URI"];




if($url === '/' ){
     echo DefaultState($pdo);

} else {
    echo "404 not found";
}