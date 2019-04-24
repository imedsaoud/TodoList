<?php

require_once __ROOT_DIR__ . "/conf.php";
require_once __ROOT_DIR__ . "/data/queries.php";

function render(array $content) :string {
    ob_start();
    require_once __ROOT_DIR__ . "/templates/base.php";

    return ob_get_clean();
}

function DefaultState (PDO $pdo): string  {
    $todosContent = GetTodo($pdo);
    $dataTodos = ([
        "content" => $todosContent
    ]);
    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();

    return render(["content" => $content]);
}

function validate(string $str): string {
    return trim(htmlspecialchars($str));
}


function CategoryFilter (PDO $pdo, $uri): string {
    if ($uri === "/Psr") {
        $todosContent = GetTodoPsr($pdo);
    } elseif ($uri === "/Maths") {
        $todosContent = GetTodoMaths($pdo);
    } elseif ($uri === "/Algo") {
        $todosContent = GetTodoAlgo($pdo);
    } else{
        $todosContent = GetTodo($pdo);
    }

    $dataTodos = ([
        "content" => $todosContent
    ]);
    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();

    return render(["content" => $content]);
}

function StatusFilter(PDO $pdo, $uri): string {
    if ($uri === "/Todo") {
        $todosContent = GetTodoTodo($pdo);
    } elseif ($uri === "/Doing") {
        $todosContent = GetTodoDoing($pdo);
    } elseif ($uri === "/NeedReview") {
        $todosContent = GetTodoNeedReview($pdo);
    } else{
        $todosContent = GetTodoDone($pdo);
    }

    $dataTodos = ([
        "content" => $todosContent
    ]);
    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();

    return render(["content" => $content]);
}

function PriorityFilter(PDO $pdo, $uri): string {
    if ($uri === "/Low") {
        $todosContent = GetTodoLow($pdo);
    } elseif ($uri === "/Medium") {
        $todosContent = GetTodoMedium($pdo);
    } else  {
        $todosContent = GetTodoHigh($pdo);
    }

    $dataTodos = ([
        "content" => $todosContent
    ]);
    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();

    return render(["content" => $content]);
}

