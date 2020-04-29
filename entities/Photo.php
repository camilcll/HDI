<?php
class Photo {
    private $_photoID;
    private $_nomFich;
    
	
    public function __construct($photoID, $nomFich) {
        $this -> _photoID = $photoID;
        $this -> _nomFich = $nomFich;
    }
	
    
    public function getPhotoId() {
        return $this -> _photoID;
    }
    
    public function getNomFich() {
        return $this -> _nomFich;
    }
}
?>