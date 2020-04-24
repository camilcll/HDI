<?php
require_once(PATH_MODELS.'UserDAO.php');
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

	
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pwd']) && isset($_POST['email']))
{
	$NOM = htmlspecialchars($_POST['nom']);
	$PRENOM = htmlspecialchars($_POST['prenom']);
	$PWD = htmlspecialchars($_POST['pwd']);
	$EMAIL = htmlspecialchars($_POST['email']);

	$userDAO= new UserDAO();
	$UserID= $userDAO -> creerUser($NOM, $PRENOM, $PWD, $EMAIL);
	header('Refresh:0; url=index.php?page=connexion');
}
	
	
require_once(PATH_VIEWS.$page.'.php');
?>