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

	public function creerPublication($jsonString, $id_publication)
    {
		$id_chercheur= $_SESSION['id'];
    	// Ajout du brouillon en base
		$this -> _requete("INSERT INTO PUBLICATION (id_publication, contenu) VALUES (?, ?)", array($id_publication, $jsonString));
		return $id_chercheur;
	}
    
}   
?>