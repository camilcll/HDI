<?php

require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'PhotoDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');
require_once(PATH_ENTITY . 'Photo.php');
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

if (!$_SESSION['logged']) {
    header('Refresh:0; url=index.php?page=connexion');
    exit();
}


if(isset($_SESSION['id'])){

    $id=$_SESSION['id'];
    $userDAO= new ChercheurDAO();
    $user= $userDAO->getUserById($id);
    $user1=$userDAO->getUserById($id);
}

/*if(isset($_FILES['Photo'])){
    $dossier = PATH_AVATAR;
    $fichier = basename($_FILES['Photo']['name']);
    move_uploaded_file($_FILES['Photo']['tmp_name'], $dossier . $fichier);
    
}*/


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) ) {
    $prenom = htmlspecialchars($_POST['prenom']);
	$nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    //$nomFich = htmlspecialchars($_FILES['Photo']['name']);

            $userDAO= new ChercheurDAO();
            $userID= $userDAO-> modifierChercheur($nom, $prenom,$email);
            
            header('Refresh:0; url=index.php?page=parametre');

    
}

if (isset($_POST['ancien']))
    {
        $ancien=$_POST['ancien'];
        
                if( $ancien==$user->getPwd()){
                    if (isset($_POST['nouveau1']) && isset($_POST['nouveau2']))
                        {
                            $n1=$_POST['nouveau1'];
                            $n2=$_POST['nouveau2'];
                            if(!empty($n1) && !empty($n2)){
                                    
                                    if ($n1==$n2)
                                    {
                                        if(empty($ancien))
                                        {
                                            $alert=choixAlert('new_mdp_non');
                                        }else{
                                            //$userI=$user-> modifierChercheur($nom, $prenom,$email);
                                            $userId= $userDAO-> updatePwd($n1); 
                                            $alert=choixAlert('mdp_ok');
                                            header('Refresh:0; url=index.php?page=parametre'); 
                                        }
                                    }else{
                                        $alert=choixAlert('new_mdp_non');
                                    }
                                }
                        }
                
            }

    }

    /*test*/


	
	
require_once(PATH_VIEWS.$page.'.php');
?>