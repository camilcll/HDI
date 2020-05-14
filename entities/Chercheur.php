<?php

class Chercheur {
	
	private $_ID_CHERCHEUR;
	private $_NOM;
	private $_PRENOM;
	private $_PWD;
	private $_EMAIL;
	private $_IDHAL;
	
	public function __construct($ID_CHERCHEUR, $NOM, $PRENOM ,$PWD ,$EMAIL, $IDHAL ) {
		$this -> _ID_CHERCHEUR = $ID_CHERCHEUR;
		$this -> _NOM = $NOM;
		$this -> _PRENOM = $PRENOM;
		$this -> _PWD = $PWD;
		$this -> _EMAIL = $EMAIL;
		$this -> _IDHAL = $IDHAL;
	}

	public function getIdChercheur() {
		return $this -> _ID_CHERCHEUR;
	}
	
	public function getNom() {
		return htmlspecialchars($this -> _NOM);
	}
    
    public function getPrenom() {
		return htmlspecialchars($this -> _PRENOM);
	}
	public function getPwd() {
		return htmlspecialchars($this -> _PWD);
	}
	
	public function getEmail() {
		return htmlspecialchars($this -> _EMAIL);
	}

	public function getIdHal() {
		return htmlspecialchars($this -> _IDHAL);
	}
	

	
}

?>
