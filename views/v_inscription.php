<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->

<?php
	if(!isset($alert)){ //s'il n'y a pas eu d'erreurs
?>

    <link href="<?= PATH_CSS ?>connexion.css" rel="stylesheet">
	
	<div class="container" id="container">
			<div class="form-container sign-in-container">
                <form method="post" action="index.php?page=inscription">
                    <h1> Creer un compte </h1>
                    <input name="nom" type="text" placeholder="Nom"/>
                    <input type="text" name="prenom" placeholder="Prénom"/>
                    <input type="password" name="pwd"placeholder="Password"/>
                    <input type="email" name="email"placeholder="Email"/>
                    
                    <button> S'inscrire </button>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
					<div class="overlay-panel overlay-right">
                        <h1>Bon retour !</h1>
                        <p>Veuillez vous connecter avec vos informations personnelles</p>
                        <a href="index.php?page=connexion" class="p-0 rounded"><button class="ghost" name="valider" id="signIn"> Se connecter </button></a>
                    </div>
                    
                </div>
            </div>
        
	</div>
	
	<?php 
	}
	?>
