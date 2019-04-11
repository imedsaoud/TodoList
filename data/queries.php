<?php

require_once "connect.php";


function addTodo( PDO $pdo) {

    var_dump($_POST);
    $add_todo = "INSERT INTO `todo`
                      (
                       `task`,
                       `url`,
                       `priority`,
                       `category`,
                       `status`
                       )
                VALUES
                      (
                       :task,
                       :url,
                       :priority,
                       :category,
                       :state
                       )   
                  ;";
    $done = 'To Do';
    $stmt = $pdo->prepare($add_todo);
    $stmt->bindValue(":task", $_POST["task"],\PDO::PARAM_STR);
    $stmt->bindValue(":url", $_POST["url"] , \PDO::PARAM_STR);
    $stmt->bindValue(":priority", $_POST["priority"] , \PDO::PARAM_STR);
    $stmt->bindValue(":category", $_POST["category"] , \PDO::PARAM_STR);
    $stmt->bindValue(":state", $_POST["status"], \PDO::PARAM_STR);
    $stmt->execute();
    header("Location: /" );

    exit;
}


function getTodo(PDO $pdo){
    $getTodo = "SELECT
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                ORDER BY
                  id DESC
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();
    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}



