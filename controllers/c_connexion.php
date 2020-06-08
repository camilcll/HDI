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

		    $password= sha1($_POST['password']);
			$uDao = new ChercheurDAO();
			$userBD = $uDao->getUserByUsername($EMAIL);
			if (!$userBD) 
			{
				$alert=choixAlert('erreur_id');
				?>  <META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php?page=connexion"> <?php
			}
			else {
			if (!isset($_POST['password']) || $password!=$userBD->getPwd()) 
			{
				$alert = choixAlert('erreur_id');
				?>  <META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php?page=connexion"> <?php
			}
			else {
				$alert = choixAlert('ok_connexion');
				$_SESSION['logged'] = true;
				$_SESSION['id']=$userBD->getIdChercheur();
				$_SESSION['last_time']=time();
				?>  <META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php"> <?php
			}
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