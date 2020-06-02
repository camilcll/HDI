<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

print_r($_POST);


require_once(PATH_VIEWS.$page.'.php');
?>