<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

/*if (isset($_POST['recupEmail'])){
    $recupEmail = htmlspecialchars ($_POST['recupEmail']);

    $userBD = new ChercheurDAO(DEBUG);
    $chercheur = $userBD->recupEmail($userBD);
    
    if ($utilisateur != null){
        $utilisateurUserId = $utilisateur->getIdUtilisateur();
        $utilisateurUserMdp = $utilisateur->getMdp();

        $to = $userId;
        $subject = "Mot de passe oublié";
        $messagee = "Cliquez sur ce lien pour réinitialiser votre mot de passe : https://www.open-tennis.jokaria.fr/index.php?page=recupmdp&nu=".$utilisateurUserId."&no=".$utilisateurUserMdp."&osef";
        $headers = 'From: open-tennis-lyon@jokaria.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $messagee, $headers);

        $message = 'mdp_renvoye';
    }
}*/


if(isset($erreur))
{
	$alert=choixAlert($erreur);
}

	
require_once(PATH_VIEWS.$page.'.php');
?>