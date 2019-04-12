<?php

require_once __ROOT_DIR__ ."/data/connect.php";


function addTodo( PDO $pdo , array $newtodo) {


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
    $stmt = $pdo->prepare($add_todo);
    $stmt->bindValue(":task", $newtodo["task"],\PDO::PARAM_STR);
    $stmt->bindValue(":url", $newtodo["url"] , \PDO::PARAM_STR);
    $stmt->bindValue(":priority", $newtodo["priority"] , \PDO::PARAM_STR);
    $stmt->bindValue(":category", $newtodo["category"] , \PDO::PARAM_STR);
    $stmt->bindValue(":state", $newtodo["state"], \PDO::PARAM_STR);
    $stmt->execute();

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



