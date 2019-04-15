<?php

require_once __ROOT_DIR__ ."/data/connect.php";

/**
 * Camelcase...
 * Also function should probably return if everything went well
 */
function addTodo( PDO $pdo , array $newtodo) {
    $add_todo = "INSERT INTO `todo` (
                       `task`,
                       `url`,
                       `priority`,
                       `category`,
                       `status`
                   ) VALUES (
                       :task,
                       :url,
                       :priority,
                       :category,
                       :state
                   );";

    $stmt = $pdo->prepare($add_todo);
    $stmt->bindValue(":task", $newtodo["task"],\PDO::PARAM_STR);
    $stmt->bindValue(":url", $newtodo["url"] , \PDO::PARAM_STR);
    $stmt->bindValue(":priority", $newtodo["priority"] , \PDO::PARAM_STR);
    $stmt->bindValue(":category", $newtodo["category"] , \PDO::PARAM_STR);
    $stmt->bindValue(":state", $newtodo["state"], \PDO::PARAM_STR);
    $stmt->execute();
}

/**
 * Return type missing
 * Also there is ALWAYS a blank line between end of code and return
 */
function getTodo(PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
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

/**
 * space between ) and {
 * should returns if things went well
 * sql queries organisation sucks
 * Probably should add limit 1 to delete queries when deleting 1 elements... Allows to avoid annoying bugs
 */
function deleteTodo(PDO $pdo ,$dataId) {
    $deleteTodo = "DELETE FROM 
                      `todo`
                    WHERE 
                      id = :id
                    LIMIT 
                      1
                  ;";
    $stmt = $pdo->prepare($deleteTodo);
    $stmt->bindValue(":id",$dataId ,\PDO::PARAM_STR);
    $stmt->execute();
}

