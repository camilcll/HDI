<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');

class ChercheurDAO extends DAO {
	
    public function connexion($EMAIL, $PWD) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE EMAIL = ? AND PWD = ?", array($EMAIL, $PWD));
		if ($ligne) {
			return new Chercheur($ligne['ID_CHERCHEUR'], $ligne['NOM'], $ligne['PRENOM'], $ligne['PWD'], $ligne['EMAIL']);
		}
		else {
			return false;
        }
    }
    
    public function getUserByUsername($EMAIL) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE EMAIL = ? ", array($EMAIL));
		if ($ligne) {
			return new Chercheur($ligne['ID_CHERCHEUR'], $ligne['NOM'], $ligne['PRENOM'], $ligne['PWD'], $ligne['EMAIL']);
		
		}
		else {
			return false;
        }
    }
    public function getUsernameById($id) {
		
		$ligne = $this -> queryRow("SELECT LOGIN FROM CHERCHEUR WHERE ID_CHERCHEUR = ? ", array($id));
		if ($ligne) {
            return new Chercheur($ligne['ID_CHERCHEUR'], $ligne['NOM'], $ligne['PRENOM'], $ligne['PWD'], $ligne['EMAIL']);
		}
		else {
			return false;
        }
    }
    
    public function getUserById($id) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE ID_CHERCHEUR = ?", array($id));
		if ($ligne) {
			return new Chercheur($ligne['ID_CHERCHEUR'], $ligne['NOM'], $ligne['PRENOM'], $ligne['PWD'], $ligne['EMAIL']);
		}
		else {
			return false;
        }
    }

    public function creerUser($NOM, $PRENOM, $PWD, $EMAIL)
    {
    	// Récupération d'un identifiant libre
        $res = $this -> queryRow('SELECT MAX(ID_CHERCHEUR) FROM CHERCHEUR');
		$userID = $res['MAX(ID_CHERCHEUR)'] + 1;
		
		// Ajout du VIP en base
		$this -> _requete("INSERT INTO CHERCHEUR (ID_CHERCHEUR, NOM, PRENOM, PWD, EMAIL) VALUES (?, ?, ?,?,?)", array($userID,$NOM, $PRENOM, $PWD, $EMAIL));
		return $userID;
    }

}

?>
