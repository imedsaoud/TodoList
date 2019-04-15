<?php

/**
 * It's useless to declare a function inside a logical block... Also, only one line
 * Also, only one empty line between php tag and code / commentary start
 */
function validate($str) {
    return trim(htmlspecialchars($str));
}

/**
 * This part of code shouldn't echo anything
 * It's all the more useless as it recheck what has already been checked in /frontController
 * Empty is the worst check ever on variables... Find something else
 */
if ($method === 'POST') {
    if (empty($_POST['task'])) {
        echo 'Task should be filled';
    } else {
        $todoTask = validate($_POST['task']);
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
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

    addTodo($pdo , $newtodo);
}
