<?php

require_once "connect.php";


function addTodo(PDO $pdo){
    $add_todo = "INSERT INTO 
  `todo`
      (`todo_task`,
      `todo_url`,
      `todo_priority`,
      `todo_category`,
      `todo_status`)
  VALUES
    (:todo_content,
    :todo_git,
    :todo_priority,
    :todo_category,
    :todo_status)   
  ;";
    $done = 'To Do';
    $stmt = $pdo->prepare($add_todo);
    $stmt->bindValue(":todo_task", $_POST["todo_content"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_url", $_POST["todo_git"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_priority", $_POST["todo_priority"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_category", $_POST["todo_category"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_state", $done, \PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../public/index.php");
}


function getTodo(PDO $pdo){
    $getTodo = "SELECT
                  `todo_task`,
                  `todo_url`,
                  `todo_priority`,
                  `todo_category`,
                  `todo_status`
                FROM
                  `todo`
                ORDER BY
                  todo_id DESC
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();
    return $todos = $stmt->fetch(\PDO::FETCH_ASSOC);
}



