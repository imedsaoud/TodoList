<?php

require_once "../data/queries.php";


function render(array $content)  {
    ob_start();
    require_once "../templates/base.php";
    return ob_get_clean();
}




function DefaultState (PDO $pdo) {
    $todosContent = getTodo($pdo);

    ob_start();
    require_once "../templates/home.php";
    $content = ob_get_contents();


    return render(["content" => $content]);
}










