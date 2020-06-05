<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Brouillon.php');

class BrouillonDAO extends DAO {
	
    public function creerBrouillon($brouillon) {
		
		$ligne = $this -> queryRow("", array());
		if ($ligne) {
			return new Brouillon($ligne['id_brouillon'], $ligne['donnee']);
		}
		else {
			return false;
        }
	}
    
}   
?>