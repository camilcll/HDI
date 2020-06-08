<?php
require_once(PATH_MODELS.'ChercheurDAO.php');
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

	
if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && isset($_POST['pwd']) && !empty($_POST['nom']) && isset($_POST['email']) )
{

	if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['pwd']) && empty($_POST['email']))
	{
		$alert = choixAlert('con_vide');
	}else{

		$alert = choixAlert('con_vide');
		$NOM = htmlspecialchars($_POST['nom']);
		$PRENOM = htmlspecialchars($_POST['prenom']);
		$PWD = sha1(htmlspecialchars($_POST['pwd']));
		$EMAIL = htmlspecialchars($_POST['email']);

		$userDAO= new ChercheurDAO();
		$UserID= $userDAO -> creerUser($NOM, $PRENOM, $PWD, $EMAIL);
		header('Refresh:0; url=index.php?page=connexion');
	}
}
	
	
require_once(PATH_VIEWS.$page.'.php');
?>