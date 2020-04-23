<?php

class User {
	
	private $_ID_CHERCHEUR;
	private $_NOM;
	private $_PRENOM;
	private $_LOGIN;
	private $_PWD;
	private $_EMAIL;
	
	public function __construct($ID_CHERCHEUR, $NOM, $PRENOM,$LOGIN ,$PWD ,$EMAIL ) {
		$this -> _ID_CHERCHEUR = $ID_CHERCHEUR;
		$this -> _NOM = $NOM;
		$this -> _PRENOM = $PRENOM;
		$this -> _LOGIN = $LOGIN;
		$this -> _PWD = $PWD;
		$this -> _EMAIL = $EMAIL;
	}
	
	public function getUserID() {
		return $this -> _ID_CHERCHEUR;
	}
	
	public function getUsername() {
		return htmlspecialchars($this -> _LOGIN);
	}
    
    public function getPassword() {
		return htmlspecialchars($this -> _PWD);
	}
	
}

?>
