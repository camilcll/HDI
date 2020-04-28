<?php require_once(PATH_VIEWS.'alert.php');

if(isset($_GET['id'])){
	$cDAO = new CherheurDAO();
    $chercheur = $cDAO -> getById(htmlspecialchars($_GET['id']));
    $c= $chercheur->getIdChercheur();
	
}




require_once(PATH_VIEWS.$page.'.php');
?>