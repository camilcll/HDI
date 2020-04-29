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

if(isset($_FILES['Photo'])){
    $dossier = PATH_AVATAR;
    $fichier = 'u'.$_SESSION['id'].'_'.basename($_FILES['Photo']['name']);
    $taille_maxi = 100000;
    $taille = filesize($_FILES['Photo']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['Photo']['name'], '.'); 
    //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier, 
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['Photo']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
    }
    else
    {
        echo $erreur;
    }
}


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
	$nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    
    if (isset($_POST['ancien']))
    {
        $ancien=$_POST['ancien'];
        if(!empty($ancien))
            {
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
                                            $userId= $userDAO-> modifierChercheur($nom, $prenom,$email);
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

    }else{

    
            //$nomFich = htmlspecialchars($_FILES['Photo']['name']);
            $id=$_SESSION['id'];
            $userDAO= new ChercheurDAO();
            $userId= $userDAO-> modifierChercheur($nom, $prenom,$email);
            
            header('Refresh:0; url=index.php?page=parametre');

    }
}


	
	
require_once(PATH_VIEWS.$page.'.php');
?>