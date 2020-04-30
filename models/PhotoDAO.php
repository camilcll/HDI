<?php
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Photo.php');
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

class PhotoDAO extends DAO {

	// Retourne un tableau d'images ou null
   public function getPhotos()
		//retourne un tableau d'image
	{
		$i=0;
		$res = $this->queryAll('select * from PHOTO');
		if($res == false)
			$photos=array();
		else
		{
			foreach($res as $p)
			{
				$photos[$i]= new Photo($p['photoId'], $p['nomFich']);
				$i++;
				
			}
			return $photos;
		}
		return null;
	}


	// Retourne un tableau d'images ou null
   public function getPhoto($id)
		//retourne un tableau d'image
	{
		$i=0;
		$res = $this->queryAll('select * from PHOTO where photoId=?', array ($id));
		if($res ===false)
		{
			$photo=null;
		
		}
		else{
			$photo=new Photo($res[0]['photoId'], $res[0]['nomFich']);
			
		}
		return $photo;
	}

	// Ajoute la photo en base et retourne son ID
	public function ajouterPhoto($nomFich) {

        // Récupération d'un identifiant libre
        $res = $this -> queryRow('SELECT MAX(photoId) FROM Photo');
        $photoId = $res['MAX(photoId)'] + 1;

        // Ajoute la photo
        $this -> queryBdd("INSERT INTO PHOTO(photoId, nomFich) VALUES (?, ?)", array($photoId, $nomFich));
        return $photoId;

    }

    
	
	public function supprimerPhoto($id) {
		return $this -> _requete("DELETE FROM PHOTO WHERE photoId = ?", array($id));
	}

	public function modifierPhoto($nomFich)
	{
        $id=$_SESSION['id'];
        // Modifier la photo
        $this -> queryBdd("UPDATE from PHOTO set nomFich=? WHERE photoId = ?" , array($id));

	}
	
	
}
?>