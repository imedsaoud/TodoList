<?php

require_once "conf.php";
require_once __ROOT_DIR__ . "/logic/mainLogic.php";

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER['REQUEST_METHOD'];

/**
 * Shouldn't echo anything here
 */
if($method === "GET") {
    if($uri === '/' ){
        echo DefaultState($pdo);
    } elseif ($uri === '/All' ) {
        echo CategoryFilter($pdo , $uri);
    } elseif ($uri === '/Psr') {
        echo CategoryFilter($pdo, $uri);
    } elseif ($uri === '/Maths') {
        echo CategoryFilter($pdo, $uri);
    } elseif ($uri === '/Algo') {
        echo CategoryFilter($pdo, $uri);
    } elseif ($uri === '/Doing') {
        echo StatusFilter($pdo,$uri);
    } elseif ($uri === '/Done') {
        echo StatusFilter($pdo,$uri);
    } elseif ($uri === '/Todo') {
        echo StatusFilter($pdo,$uri);
    } elseif ($uri === '/NeedReview') {
        echo StatusFilter($pdo,$uri);
    } elseif ($uri === '/Low') {
        echo PriorityFilter($pdo,$uri);
    } elseif ($uri === '/High') {
        echo PriorityFilter($pdo,$uri);
    } elseif ($uri === '/Medium') {
        echo PriorityFilter($pdo,$uri);
    } else {
        http_response_code(404);
    }
}

if ($method === "POST") {
    if ($uri === '/add' ) {

        if (isset($_POST['task'])) {
            $todoTask = validate($_POST['task']);
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $todoTask)) {
                $error["task"] = 'Task can only contain letters, numbers and white spaces';
            } else {
                $newtodo["task"] = $todoTask ;
            }
        }

        if (isset($_POST['url'])) {
            $todoUrl = validate($_POST['url']);
            if (!filter_var($todoUrl, FILTER_VALIDATE_URL)) {
                $error["url"] = 'Invalid url';
            } else {
                $newtodo["url"] = $todoUrl ;
            }
        }

        if (isset($_POST['category'])) {
            $todoCategory =  validate($_POST['category']);
            $newtodo['category'] = $todoCategory;
        }

        if (isset($_POST['priority'])) {
            $todoPriority = validate($_POST['priority']);
            $newtodo["priority"] = validate($_POST['priority']);
        }

        if (isset($_POST['state'])) {
            $todoState = validate($_POST['state']);
            $newtodo["state"] = $todoState;
        }
        if($error > 0 ) {
            var_dump($error);
        } else {
            AddTodo($pdo , $newtodo);
            header("location: /");
        }
    } elseif ($uri === '/delete') {
        $delete =  htmlspecialchars($_POST["delete"]);
        DeleteTodo($pdo ,$delete);
        header("location: /");
    } else {
        http_response_code(404);
    }
}

