<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

/*if (isset($_POST['identifiant']))
{
	if($_POST['identifiant']=LOGADMIN)
	{
		if (password_verify($_POST['password'],MDPADMIN))
		{
			$alert=choixAlert('ok_connexion');
			$_SESSION['logged']=true;
		}
		else
		{
			$alert=choixAlert('erreur_mdp');
		}
	}
	else
	{
		$alert=choixAlert('erreur_id');
	}
}*/


if (isset($_POST['email']))
{
	$EMAIL = htmlspecialchars($_POST['email']);
	//si l'utilisateur est l'administrateur alors variable session admin passe a true
	

		 $uDao = new UserDAO();
		$userBD = $uDao->getUserByUsername($EMAIL);
		if (!$userBD) $alert=choixAlert('erreur_id');
		if (!isset($_POST['password']) || $_POST['password']!=$userBD->getPwd()) $alert = choixAlert('erreur_mdp');
		else {
			$alert = choixAlert('ok_connexion');
			$_SESSION['logged'] = true;
		}

		//$identite=$userBD->getUsername();
  
}

if(isset($erreur))
{
	$alert=choixAlert($erreur);
}

	
require_once(PATH_VIEWS.$page.'.php');
?>