<?php
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

	

	
	
require_once(PATH_VIEWS.$page.'.php');
?>