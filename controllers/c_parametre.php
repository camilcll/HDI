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

    if(isset($_POST['idHal']))
    {
        $_SESSION['idHal']=$_POST['idHal'];
    }

    $userDAO= new ChercheurDAO();
    $user= $userDAO->getUserById($id);
    $user1=$userDAO->getUserById($id);
    $photo = new PhotoDAO();
    $avatar = $photo->getPhoto($id);


}



if(!empty($_REQUEST['tid'])){
    $tid = htmlspecialchars($_POST['tid']);
    unlink(glob(PATH_AVATAR.'u_'.$tid.'_avatar.*')[0]);
    $photo->supprimerPhoto($tid);
}


if(!empty($_FILES['avatar'])){
    $uploadir = PATH_AVATAR;
    $uploadfile = 'u_'.$id.'_avatar';
    $taille_maxi = 500000;
    $taille = filesize($_FILES['avatar']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg' ,'.jfif','.webp');
    $extension = strtolower('.'.pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION)); 

    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, jfif ou webp';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros, nous acceptons les fichiers inferieurs a 500ko';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {   
        if($avatar===null)
        {   
            $uploadfile = $uploadfile.$extension;
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadir.$uploadfile)) {
                $photoID = $photo-> ajouterPhoto($uploadfile,$id);
            } else {
                echo "Erreur upload";
            }
        }
        else{
            $oldAvatarPath = $avatar->getNomFich();
            //echo $oldAvatarPath."<br><br>";
            $newAvatarPath = $uploadir.$uploadfile.$extension;
            //echo $newAvatarPath."<br><br>";
            $uploadfile=$uploadfile.'.'.pathinfo($oldAvatarPath,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES['avatar']['tmp_name'],$uploadir.$uploadfile)) {
                rename($uploadir.$uploadfile,$newAvatarPath);
                $uploadfile = pathinfo($uploadfile,PATHINFO_FILENAME).$extension;
                //echo $uploadfile."<br><br>";
                $photo-> modifierPhoto($uploadfile,$id);
                
            } else {
                echo "Erreur upload";
            }
        }
    }
}


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