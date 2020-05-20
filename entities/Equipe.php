<?php

class Equipe {
	
	private $_ID_EQUIPE;
	private $_ID_GROUPE;
	private $_LIBELLE_EQUIPE;
	
	public function __construct($ID_EQUIPE,$ID_GROUPE, $LIBELLE_EQUIPE) {
		$this -> _ID_GROUPE = $ID_EQUIPE;
		$this -> _ID_CHERCHEUR = $ID_GROUPE;
		$this -> _LIBELLE_GROUPE = $LIBELLE_EQUIPE;
	}

	public function getIdEquipe() {
		return $this -> _ID_EQUIPE;
	}
	
	public function getIdGroupe() {
		return htmlspecialchars($this -> _ID_GROUPE);
	}
    
    public function getLibelleEquipe() {
		return htmlspecialchars($this -> _LIBELLE_EQUIPE);
	}
	
}

?>
