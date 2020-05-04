<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

$_SESSION['last_time']=time();

if (isset($_POST['email']) && !empty($_POST['email']))
{
	$EMAIL = htmlspecialchars($_POST['email']);
	//si l'utilisateur est l'administrateur alors variable session admin passe a true
	
	if (isset($_POST['password']) && !empty($_POST['password']))
	{
			$uDao = new ChercheurDAO();
			$userBD = $uDao->getUserByUsername($EMAIL);
			if (!$userBD) $alert=choixAlert('erreur_id');
			if (!isset($_POST['password']) || $_POST['password']!=$userBD->getPwd()) $alert = choixAlert('erreur_mdp');
			else {
				$alert = choixAlert('ok_connexion');
				$_SESSION['logged'] = true;
				$_SESSION['id']=$userBD->getIdChercheur();
				$_SESSION['last_time']=time();
				//header('Refresh:0; url=index.php?id='.$chercheur.'page=accueil');
			}

			//$identite=$userBD->getUsername();
		}
	
  
}

if(isset($erreur))
{
	$alert=choixAlert($erreur);
}

	
require_once(PATH_VIEWS.$page.'.php');
?>