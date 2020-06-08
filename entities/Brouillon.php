<?php

class Brouillon {
	
	private $_id_brouillon;
	private $_donnee;
	
	public function __construct($id_brouillon,$donnee) {
		$this -> _id_brouillon = $id_brouillon;
		$this -> _donnee = $donnee;
	}

	public function getIdBrouillon() {
		return $this -> _id_brouillon;
	}
	
	public function getDonnee() {
		return $this -> _donnee;
	}
    
	
}

?>
