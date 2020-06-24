<?php require_once(PATH_VIEWS.'alert.php');
require_once(PATH_MODELS.'ChercheurDAO.php');

if (!$_SESSION['logged']) {
    header('Refresh:0; url=index.php?page=connexion');
    exit();
}

if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

$userDAO= new ChercheurDAO();
$user=$userDAO->getChercheur();
	
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pwd']) && isset($_POST['email']) )
{

	if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['pwd']) && empty($_POST['email']))
	{
		$alert = choixAlert('con_vide');
	}else{

		$NOM = htmlspecialchars($_POST['nom']);
		$PRENOM = htmlspecialchars($_POST['prenom']);
		$PWD = htmlspecialchars($_POST['pwd']);
		$EMAIL = htmlspecialchars($_POST['email']);

		
        $UserID= $userDAO -> creerUser($NOM, $PRENOM, $PWD, $EMAIL);
        header('Refresh:0; url=index.php?page=panneauConfig');
	}
}


require_once(PATH_VIEWS.$page.'.php');
?>