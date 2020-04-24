<?php

class User {
	
	private $_ID_CHERCHEUR;
	private $_NOM;
	private $_PRENOM;
	private $_PWD;
	private $_EMAIL;
	
	public function __construct($ID_CHERCHEUR, $NOM, $PRENOM ,$PWD ,$EMAIL ) {
		$this -> _ID_CHERCHEUR = $ID_CHERCHEUR;
		$this -> _NOM = $NOM;
		$this -> _PRENOM = $PRENOM;
		$this -> _PWD = $PWD;
		$this -> _EMAIL = $EMAIL;
	}
	

	
}

?>
