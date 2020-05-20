<?php

class Chercheur {
	
	private $_ID_CHERCHEUR;
	private $_NOM;
	private $_PRENOM;
	private $_PWD;
	private $_EMAIL;
	private $_IDHAL;
	private $_ORCID_ID;
	
	public function __construct($ID_CHERCHEUR, $NOM, $PRENOM ,$PWD ,$EMAIL, $IDHAL, $ORCID_ID ) {
		$this -> _ID_CHERCHEUR = $ID_CHERCHEUR;
		$this -> _NOM = $NOM;
		$this -> _PRENOM = $PRENOM;
		$this -> _PWD = $PWD;
		$this -> _EMAIL = $EMAIL;
		$this -> _IDHAL = $IDHAL;
		$this -> _ORCID_ID = $ORCID_ID;
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
	
	public function getOrcidId() {
		return htmlspecialchars($this -> _ORCID_ID);
	}
	
}

?>
