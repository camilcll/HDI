<?php

require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'PhotoDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');
require_once(PATH_ENTITY . 'Photo.php');

if(!isset($_SESSION['idHal']))
{
    ?> <script>alert(" <?php echo htmlspecialchars('Veuillez entrer votre idHal dans les parametres', ENT_QUOTES);?> ")</script> <?php
}else {
    
}


require_once(PATH_VIEWS.$page.'.php');
?>