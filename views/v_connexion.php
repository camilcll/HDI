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
                <form method="post" action="index.php?page=connexion">
                    <h1> Se Connecter </h1>
                    <input name="email" type="email" placeholder="Email"/>
                    <input name="password" type="password" placeholder="Password"/>
                    <a href="index.php?page=recupMdp">Forgot your password</a>
                    <button class="valider"> Valider </button>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Bienvenue !</h1>
                        <p>Vous n'avez pas encore de compte utilisateur, vous pouvez créer un nouveau</p>
                        <a href="index.php?page=inscription" class="p-0 rounded"><button class="ghost" id="signIn"> S'inscrire </button></>
                    </div>
                </div>
            </div>
        
        </div>


	<?php 
	}
	?>
