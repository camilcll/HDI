<?php
require_once(PATH_MODELS.'ChercheurDAO.php');
require_once(PATH_MODELS.'PhotoDAO.php');

if (!$_SESSION['logged']) {
    header('Refresh:0; url=index.php?page=connexion');
    exit();
}

if(isset($_GET['id'])){
	$userDAO = new ChercheurDAO();
	$user = $userDAO -> getById(htmlspecialchars($_GET['id']));
	$photoDAO= new PhotoDAO();
    $photo= $photoDAO ->getPhoto(htmlspecialchars($_GET['id']));
    
    if(isset($_POST['supprimer']))
    {
        
            
                $user=$userDAO -> supprimerChercheur($_GET['id']);
                $photo=$photoDAO -> supprimerPhoto($_GET['id']);
                
                header('Refresh:0; url=index.php?page=panneauConfig');
            
        
    }

}

// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}





// Appel de la vue
require_once(PATH_VIEWS.$page.'.php');
?>