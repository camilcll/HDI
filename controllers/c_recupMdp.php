<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');


if(isset($erreur))
{
	$alert=choixAlert($erreur);
}

	
require_once(PATH_VIEWS.$page.'.php');
?>