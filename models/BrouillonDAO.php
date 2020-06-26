<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Brouillon.php');

class BrouillonDAO extends DAO {
	
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
		$this -> _requete("INSERT INTO BROUILLON (id_brouillon,id_chercheur, id, donnee) 
						   VALUES (?, ?, ?, ?)", array($id_brouillon, $id_chercheur, $ID, $jsonString));
		return $id_brouillon;
	}


	public function getBrouillon()
    {
		//recupere la derniere version du brouillon avec l'id
		$res = $this -> queryRow('SELECT MAX(id) FROM BROUILLON');
		$id = $res['MAX(id)'];

		$id_chercheur= $_SESSION['id'];
    	// recuperer le dernier brouillon effectuer par le chercheur
		$donnee = $this -> _requete("SELECT donnee FROM BROUILLON WHERE id_chercheur=? AND id= ?
						   VALUES (?, ?)", array($id_chercheur, $id));
		return $donnee;
	}
    
}   
?>