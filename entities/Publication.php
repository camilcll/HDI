<?php

class Publication {
	
	private $_ID_PUBLICATION;
	private $_contenu;
	
	public function __construct($ID_PUBLICATION,$contenu) {
		$this -> _ID_PUBLICATION = $ID_PUBLICATION;
		$this -> _contenu = $contenu;
	}

	public function getIdPublication() {
		return $this -> _ID_PUBLICATION;
	}

	public function getContenu() {
		return $this -> _contenu;
	}

    
	
}

?>
