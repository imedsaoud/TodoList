<?php



function render() {
    ob_start();
    require_once "../templates/base.php";
    return ob_get_clean();
}





