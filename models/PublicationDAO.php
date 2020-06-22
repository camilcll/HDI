<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Publication.php');

class PublicationDAO extends DAO {
	
    public function creerBrouillon($jsonString) {
		
		$ligne = $this -> queryRow("", array());
		if ($ligne) {
			return new Brouillon($ligne['id_brouillon'], $ligne['id_chercheur'], $ligne['id'], $ligne['donnee']);
		}
		else {
			return false;
        }
	}

	public function creerDonnee($jsonString, $id_brouillon)
    {

		$res = $this -> queryRow('SELECT MAX(id) FROM BROUILLON');
		$ID = $res['MAX(id)'] + 1;

		$id_chercheur= $_SESSION['id'];
    	// Ajout du brouillon en base
		$this -> _requete("INSERT INTO BROUILLON (id_brouillon,id_chercheur, id, donnee) VALUES (?, ?, ?, ?)", array($id_brouillon, $id_chercheur, $ID, $jsonString));
		return $id_brouillon;
	}
    
}   
?>