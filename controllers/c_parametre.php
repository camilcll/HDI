<?php

require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

	
/*if(isset($_FILES['Photo']))
{ 
     $dossier = PATH_IMAGES;
     $fichier = basename($_FILES['Photo']['name']);
     move_uploaded_file($_FILES['Photo']['tmp_name'], $dossier . $fichier);
}*/
if(isset($_SESSION['id'])){

    $id=$_SESSION['id'];
    $userDAO= new ChercheurDAO();
    $user= $userDAO->getUserById($id);
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
	$nom = htmlspecialchars($_POST['nom']);
	$email = htmlspecialchars($_POST['email']);
	//$nomFich = htmlspecialchars($_FILES['Photo']['name']);
	$id=$_SESSION['id'];
    $userDAO= new ChercheurDAO();
	$userId= $userDAO-> modifierChercheur($nom, $prenom,$email);
    
    header('Refresh:0; url=index.php?page=parametre');
}
	
	
require_once(PATH_VIEWS.$page.'.php');
?>