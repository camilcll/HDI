<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->

<?php
	if(!isset($alert)){ //s'il n'y a pas eu d'erreurs
?>
	
	
	
	<!-- Affichage du formulaire -->
	<div class="container" id="container">
        
            <div class="form-container sign-in-container">
                <form method="post" action="index.php?page=connexion">
                    <h1> Se Connecter </h1>
                    <input name="identifiant" type="text" placeholder="Identifiant"/>
                    <input name="password" type="password" placeholder="Password"/>
                    <a href="#">Forgot your password</a>
                    <button class="valider"> Valider </button>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Bienvenue !</h1>
                        <!--<p>Veuillez entrer vos informations personnelles afin de vous connecter</p>-->
                    </div>
                </div>
            </div>
        
        </div>
		
		<style type="text/css">

* {
    box-sizing: border-box;
}

h1{
    font-weight: bold;
    margin: 0;
}
p {
    font-size: 12px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 10px 0 20px;
}
h1 {
	font-size: 25px;
}

a{

    color: #333;
    font-size: 12px;
    text-decoration: none;
    margin: 12px 0;
}

.container{

    background: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    position: relative;
    overflow: hidden;
    width: 730px;
    max-width: 100%;
    min-height: 450px;
    margin-top:-65px;
}

.form-container form{

    background: #fff;
    display:flex;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-top:15px;

}

.social-container {

    margin: 20px 0;

}

.social-container a{
    border: 1px solid #ddd;
    border-radius: 50px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 4Opx;
    width: 40px;
}

.form-container input{
    background: #eee;
    border:none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.valider{
    border-radius: 20px;
    border: 1px solid #99182c;
    background:#AB1515 ;
    color:#fff;
    font-size: 12px;
    font-weight: bold;
    padding: 10px 35px;
    letter-spacing:1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}
/*obtenir un effet sur le clique*/
button:active{
    transform: scale(0.95);
}
button:focus{
    outline: none;
}


.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;

}

.sign-in-container{
    left: 0;
    width: 50%;
    z-index: 2;

}

.overlay-container {
    position:absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition:  transform 0.6s ease-in-out;
    z-index: 100;
}
.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}


.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}

.overlay{
    background: #99182c;
    background: -webkit-linear-gradient(to right, #ff4b2b, #99182c);
    background: linear-gradient(to right, #ff4b2b, #99182c);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #ffffff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}
.overlay-panel {

    position: absolute;
    top:0;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0 40px;
    height: 100%;
    width: 50%;
    text-align: center;
    transform: translateX(0);
    transition: transform 0.6 ease-in-out;
}

.overlay-right {
    right:0;
    transform: translateX(0);
}
/*Animation */


/*deplacer connecter à droite */

.container.right-panel-active.sign-in-container{
    transform: translateX(100%);
}
.container.right-panel-active .overlay {
    transform: translateX(50%);
}

@keyframes show {
    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
}
		</style>
	<?php 
	}
	?>
