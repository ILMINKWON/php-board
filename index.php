<?php
    include_once('./core/config.php');
    include_once('./core/lib.php');

    if(isset($_POST['action'])){
        include_once('./actions/board.php');
        exit;
    }

    include_once('./pages/templete/header.php');
    include_once("./pages/board/{$page}.php");
    include_once('./pages/templete/footer.php');


