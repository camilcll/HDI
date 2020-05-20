<?php

class Groupe {
	
	private $_ID_GROUPE;
	private $_ID_CHERCHEUR;
	private $_LIBELLE_GROUPE;
	
	public function __construct($ID_GROUPE,$ID_CHERCHEUR, $LIBELLE_GROUPE) {
		$this -> _ID_GROUPE = $ID_GROUPE;
		$this -> _ID_CHERCHEUR = $ID_CHERCHEUR;
		$this -> _LIBELLE_GROUPE = $LIBELLE_GROUPE;
	}

	public function getIdChercheur() {
		return $this -> _ID_CHERCHEUR;
	}
	
	public function getIdGroupe() {
		return htmlspecialchars($this -> _ID_GROUPE);
	}
    
    public function getLibelleGroupe() {
		return htmlspecialchars($this -> _LIBELLE_GROUPE);
	}
	
}

?>
