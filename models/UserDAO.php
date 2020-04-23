<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'User.php');

class UserDAO extends DAO {
	
    public function connexion($LOGIN, $PWD) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE LOGIN = ? AND PWD = ?", array($LOGIN, $PWD));
		if ($ligne) {
				return new CHERCHEUR($ligne['ID_CHERCHEUR'], $ligne['LOGIN'], $ligne['PWD']);
		}
		else {
			return false;
        }
    }
    
    public function getUserByUsername($LOGIN) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE LOGIN = ? ", array($LOGIN));
		if ($ligne) {
            return new User($ligne['ID_CHERCHEUR'], $ligne['LOGIN'], $ligne['PWD']);
		}
		else {
			return false;
        }
    }
    public function getUsernameById($id) {
		
		$ligne = $this -> queryRow("SELECT LOGIN FROM CHERCHEUR WHERE ID_CHERCHEUR = ? ", array($id));
		if ($ligne) {
            return new User($ligne['ID_CHERCHEUR'], $ligne['LOGIN'], $ligne['PWD']);
		}
		else {
			return false;
        }
    }
    
    public function getUserById($id) {
		
		$ligne = $this -> queryRow("SELECT * FROM CHERCHEUR WHERE ID_CHERCHEUR = ?", array($id));
		if ($ligne) {
				return new User($ligne['ID_CHERCHEUR'], $ligne['LOGIN'], $ligne['PWD']);
		}
		else {
			return false;
        }
    }

    /*public function creerUser($username, $password)
    {
    	// Récupération d'un identifiant libre
        $res = $this -> queryRow('SELECT MAX(userID) FROM User');
		$userID = $res['MAX(userID)'] + 1;
		
		// Ajout du VIP en base
		$this -> _requete("INSERT INTO User (userID, username, password) VALUES (?, ?, ?)", array($userID,$username, $password));
		return $userID;
    }*/

}

?>
