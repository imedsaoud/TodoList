<?php

require_once "conf.php";
require_once __ROOT_DIR__ . "/logic/mainLogic.php";

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER['REQUEST_METHOD'];

/**
 * What the fuck is that GET constant here ?
 * PSR2, write a conditionnal block...
 * Shouldn't echo anything here
 */
if($method === GET) {
    if($uri === '/' ){
        echo DefaultState($pdo);
    } else {
        http_response_code(404);
    }
}

/**
 * Shouldn't echo, $_POST checks already done elsewhere in a bad manner
 * empty is cancer
 * useless blank lines
 * 404 is an http error code, you should at least set the http error code
 */
if($method === POST) {
    if($uri === '/add' ){

        if (isset($_POST['task'])) {
            $todoTask = validate($_POST['task']);
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $todoTask)) {
                $error["task"] = 'Task can only contain letters, numbers and white spaces';

            } else {
                $newtodo["task"] = $todoTask ;
            }
        } else {
            $error["Emptytask"] = 'Task should be filled';
        }

        if (isset($_POST['url'])) {
            $todoUrl = validate($_POST['url']);
            if (!filter_var($todoUrl, FILTER_VALIDATE_URL)) {
                $error["url"] = 'Invalid url';
            } else {
                $newtodo["url"] = $todoUrl ;
            }
        } else {
            $error["Emmptyurl"] = 'Please enter url';
        }

        if (isset($_POST['category'])) {
            $todoCategory =  validate($_POST['category']);
            $newtodo['category'] = $todoCategory;
        } else {
            $error["category"] =  'Category cannot be empty';
        }

        if (isset($_POST['priority'])) {
            $todoPriority = validate($_POST['priority']);
            $newtodo["priority"] = validate($_POST['priority']);
        } else {
            $error["priority"] = 'Priority cannot be empty';
        }

        if (isset($_POST['state'])) {
            $todoState = validate($_POST['state']);
            $newtodo["state"] = $todoState;
        } else {
            $error["state"] = 'State cannot be empty';
        }

        addTodo($pdo , $newtodo);
        header("location: /");
    } elseif ($uri === '/delete') {
        $delete =  htmlspecialchars($_POST["delete"]);
        deleteTodo($pdo ,$delete);
        header("location: /");
    } else {
        http_response_code(404);
    }
}
