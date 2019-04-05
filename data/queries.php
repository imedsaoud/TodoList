<?php

require_once "connect.php";



if(count($_POST) > 0){

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
    $done= 'todo';
    $stmt = $pdo->prepare($add_todo);
    $stmt->bindValue(":todo_task", $_POST["todo_content"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_url", $_POST["todo_git"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_priority", $_POST["todo_priority"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_category", $_POST["todo_category"], \PDO::PARAM_STR);
    $stmt->bindValue(":todo_state", $_POST["todo_state"], \PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../public/index.php");




} else {
    echo "nik";
}


