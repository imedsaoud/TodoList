<?php

require_once __ROOT_DIR__ ."/data/connect.php";

/**
 * Camelcase...
 * Also function should probably return if everything went well
 */
function AddTodo( PDO $pdo , array $newtodo) {

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

    if ($stmt->errorCode() !== '00000') {
        echo "500 internal error";
    }

    return http_response_code(200);

}

/**
 * Return type missing
 * Also there is ALWAYS a blank line between end of code and return
 */
function GetTodo(PDO $pdo) {
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
function DeleteTodo(PDO $pdo ,$dataId) {
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

    if ($stmt->errorCode() !== '00000') {
        echo "500 internal error";
    }

    return http_response_code(200);

}

//Category Filter Function
function GetTodoPsr(PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  category = 'PSR'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

}

function GetTodoMaths(PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  category = 'Maths'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoAlgo(PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  category = 'Algo'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

//Status Filter Function

function GetTodoTodo (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  status = 'to Do'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoNeedReview (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  status = 'Need Review'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoDoing (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  status = 'doing'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoDone (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  status = 'Done'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

// Priority Filter

function GetTodoLow (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  priority = 'low'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoMedium (PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  priority = 'medium'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function GetTodoHigh(PDO $pdo) {
    $getTodo = "SELECT
                  `id`,
                  `task`,
                  `url`,
                  `priority`,
                  `category`,
                  `status`
                FROM
                  `todo`
                WHERE
                  priority = 'high'
                ;";
    $stmt = $pdo->prepare($getTodo);
    $stmt->execute();

    return $todos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}



