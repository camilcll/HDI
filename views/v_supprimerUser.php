<?php
require_once(PATH_MODELS . 'ChercheurDAO.php');
require_once(PATH_MODELS . 'PhotoDAO.php');
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Chercheur.php');
require_once(PATH_ENTITY . 'Photo.php');
require_once(PATH_VIEWS . 'alert.php'); 
?>
<div class="contact-form2">
<div>
	<h3> Vous supprimez l'utilisateur : <?= $user->getPrenom().' '.$user->getNom() ?> </h3>
</div>

<div>
	<form method="post" <?= 'action="index.php?page=supprimerUser"' ?> >
	Vous allez supprimer cet utilisateur, êtes vous sûrs de vouloir faire cela ?
		<input type='hidden' name='Supp'>
		<button class="btn btn-danger" style="float: center;"type="submit">Supprimer</button></input>
	</form>
</div>
</div>

<? require_once(PATH_VIEWS.'footer.php') ?>