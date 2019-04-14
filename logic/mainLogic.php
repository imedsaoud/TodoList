<?php

require_once "../data/queries.php";
require_once "../conf.php";



function render(array $content): string   {
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







