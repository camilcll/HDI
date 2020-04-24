<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'User.php');


if(isset($erreur))
{
	$alert=choixAlert($erreur);
}

	
require_once(PATH_VIEWS.$page.'.php');
?>