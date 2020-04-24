<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->

<?php

	if(!isset($alert)){ //s'il n'y a pas eu d'erreurs
?>
	
	<link href="<?= PATH_CSS ?>connexion.css" rel="stylesheet">
	
	<!-- Affichage du formulaire -->
	<div class="container" id="container">
        
            <div class="form-container sign-in-container">
                <form method="post" action="index.php?page=recupMdp">
                    <h1> Récupération de votre mot de passe </h1>
                    <input name="email" type="email" placeholder="Email"/>
                    <button class="valider"> Valider </button>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <a href="index.php?page=connexion" class="p-0 rounded"><button class="ghost" name="retour" id="retour"> Retour </button></a>
                    </div>
                </div>
            </div>
        
        </div>

	<?php 
	}
	?>