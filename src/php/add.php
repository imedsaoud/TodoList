<?php

require_once "connect.php";
header("Location: ../index.php");
var_dump($_POST['todo_priority']);

if(count($_POST) > 0){

  $add_todo = "INSERT INTO 
  `todo`
      (`todo_content`,
      `todo_git`,
      `todo_priority`,
      `todo_status`)
  VALUES
    (:todo_content,
    :todo_git,
    :todo_priority,
    :todo_status)   
  ;";
  $done= 'todo';
  $stmt = $pdo->prepare($add_todo);
  $stmt->bindValue(":todo_content", $_POST["todo_content"], \PDO::PARAM_STR);
  $stmt->bindValue(":todo_git", $_POST["todo_git"], \PDO::PARAM_STR);
  $stmt->bindValue(":todo_priority", $_POST["todo_priority"], \PDO::PARAM_STR);
  $stmt->bindValue(":todo_status", $done, \PDO::PARAM_STR);
  $stmt->execute();




} else {
  echo "nik";
}

