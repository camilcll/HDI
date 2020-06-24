<?php

class Publication {
	
	private $_id_publication;
	private $_contenu;
	
	public function __construct($id_publication,$contenu) {
		$this -> _id_publication = $id_publication;
		$this -> _contenu = $contenu;
	}

	public function getIdPublication() {
		return $this -> _id_publication;
	}

	public function getContenu() {
		return $this -> _contenu;
	}
}

?>
