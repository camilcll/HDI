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
				$photos[$i]= new Photo($p['photoID'], $p['nomFich']);
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

		$res = $this->queryAll('select * from PHOTO where photoID=?', array ($id));
		if(empty($res))
		{
			$photo=null;
		
		}
		else{
			$photo=new Photo($res[0][0], $res[0][1]);
			
		}
		return $photo;
	}

	// Ajoute la photo en base et retourne son ID
	public function ajouterPhoto($nomFich,$photoId) {
        // Ajoute la photo
        return $this -> queryBdd("INSERT INTO PHOTO(photoID, nomFich) VALUES (?, ?)", array($photoId, $nomFich));
    }

    
	
	public function supprimerPhoto($id) {
		return $this -> _requete("DELETE FROM PHOTO WHERE photoID = ?", array($id));
	}

	public function modifierPhoto($nomFich,$id)
	{
        // Modifier la photo
        return $this -> queryBdd("UPDATE `PHOTO` SET `nomFich`=? WHERE `photoID`=?" , array($nomFich,$id));

	}
	
	
}
?>