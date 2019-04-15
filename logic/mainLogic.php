<?php

/**
 * Out of fucking nowhere...
 * First you need configuration as it allows you to have absolute path to root directory
 * Then you bring the rest because... You know where you can reach them
 */
require_once "../conf.php";
require_once "../data/queries.php";

/**
 * fucking wtf space for no reason
 */
function render(array $content) :string {
    ob_start();
    require_once __ROOT_DIR__ . "/templates/base.php";

    return ob_get_clean();
}

function DefaultState (PDO $pdo): string  {
    $todosContent = getTodo($pdo);
    $dataTodos = ([
        "content" => $todosContent
    ]);
    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();

    return render(["content" => $content]);
}

function validate($str) {
    return trim(htmlspecialchars($str));
}
