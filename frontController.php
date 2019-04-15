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

        if (empty($_POST['task'])) {
            echo 'Task should be filled';
        } else {
            $todoTask = validate($_POST['task']);
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $todoTask)) {
                echo 'Task can only contain letters, numbers and white spaces';
            } else {
                $newtodo["task"] = $todoTask ;
            }
        }

        if (empty($_POST['url'])) {
            echo 'Please enter url';
        } else {
            $todoUrl = validate($_POST['url']);
            if (!filter_var($todoUrl, FILTER_VALIDATE_URL)) {
                echo 'Invalid url';
            } else {
                $newtodo["url"] = $todoUrl ;
            }
        }

        if (empty($_POST['category'])) {
            echo  'Category cannot be empty';
        } else {
            $todoCategory =  validate($_POST['category']);
            $newtodo['category'] = $todoCategory;
        }


        if (empty($_POST['priority'])) {
            echo 'Priority cannot be empty';
        } else {
            $todoPriority = validate($_POST['priority']);
            $newtodo["priority"] = validate($_POST['priority']);
        }

        if (empty($_POST['state'])) {
            echo 'State cannot be empty';
        } else {
            $todoState = validate($_POST['state']);
            $newtodo["state"] = $todoState;
        }

        addTodo($pdo , $newtodo);;
        header("location: /");

    } elseif ($uri === '/delete') {
        $delete =  htmlspecialchars($_POST["delete"]);
        deleteTodo($pdo ,$delete);
        header("location: /");
    } else {
        echo "404 not found";
    }
}


