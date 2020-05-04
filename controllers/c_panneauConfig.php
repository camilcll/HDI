<?php require_once(PATH_VIEWS.'alert.php');


if (!$_SESSION['logged']) {
    header('Refresh:0; url=index.php?page=connexion');
    exit();
}


require_once(PATH_VIEWS.$page.'.php');
?>