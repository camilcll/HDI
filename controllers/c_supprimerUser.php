<?php
require_once(PATH_MODELS.'PhotoDAO.php');
require_once(PATH_MODELS.'ChercheurDAO.php');
require_once(PATH_ENTITY.'Chercheur.php');

$vip = "";
if (!$_SESSION['logged']) {
    header('Refresh:0; url=index.php?page=connexion');
    exit();
}

if(isset($_SESSION['id'])){
	$userDAO = new ChercheurDAO();
	$user = $userDAO -> getById(htmlspecialchars($_SESSION['id']));
	$photoDAO = new PhotoDAO();
	$photo = $photoDAO->getPhoto(htmlspecialchars($_SESSION['id']));
	

	if (isset($_POST['Supp'])) {
		$user=$userDAO -> supprimerChercheur($_SESSION['id']);
		$photoDAO = new PhotoDAO();
		$photoDAO -> supprimerPhoto($_SESSION['id']);
		
		header('Refresh:0; url=index.php?page=panneauConfig');
	}
}

// Appel de la vue
require_once(PATH_VIEWS.$page.'.php');
?>