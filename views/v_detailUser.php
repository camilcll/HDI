<?php
require_once(PATH_VIEWS . 'header.php');
require_once(PATH_ENTITY.'Chercheur.php'); 
require_once(PATH_MODELS.'ChercheurDAO.php');

?>
<?php
if (!isset($alert)) {  //tant qu'il n'a a pas d'erreurs
?>
<div>
	<form method="get" <?= 'action="index.php?page=detailUser&id='.$user->getIdChercheur().'"' ?> >
    <h3> <?php  echo '<img src="'.PATH_AVATAR .$photo->getNomFich().'" '; ?> </h3>
	<h3><?= $user->getPrenom().' '.$user->getNom() ?> </h3>
	</br>
	
    </form>                   
</div>

<div>
	<form method="post" action="" >
		<button name ="supprimer" class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Supprimer</button>
	</form>
</div> 

<?php
}
?>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); ?>