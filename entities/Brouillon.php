<?php

class Brouillon {
	
	private $_id_brouillon;
	private $_id_chercheur;
	private $_id;
	private $_donnee;
	
	public function __construct($id_brouillon,$id_chercheur, $id,$donnee) {
		$this -> _id_brouillon = $id_brouillon;
		$this -> _id_chercheur = $id_chercheur;
		$this -> _id = $id;
		$this -> _donnee = $donnee;
	}

	public function getIdBrouillon() {
		return $this -> _id_brouillon;
	}

	public function getIdChercheur() {
		return $this -> _id_chercheur;
	}

	public function getId() {
		return $this -> _id;
	}
	
	public function getDonnee() {
		return $this -> _donnee;
	}
    
	
}

?>
