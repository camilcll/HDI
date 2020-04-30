<!DOCTYPE html>
<html>
	<head>
		<title><?= TITRE ?></title>
		<link rel="icon" width="200" type="image/png" href="<?= PATH_LOGO ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="<?= LANG ?>"/>
		<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0"/> 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
		
		<link href="<?= PATH_CSS ?>css.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>jquery-3.1.1.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>monjs.js"></script>
		<script type="text/javascript" src="<?= PATH_SCRIPTS ?>main.js"></script>

	</head> 
	<body>
		<!-- En-tête -->
		<header class="mb-0 sticky-top">
			<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark m-0 rounded-0">
				<img src="<?= PATH_LOGO ?>" width="50" class="d-inline-block align-center mb-3 mx-2" alt="">
				<img src="<?= PATH_IMAGES ?>/logo_LTDS.png" width="100" class="d-inline-block align-center mb-3 mx-2" alt="">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
					<li class="nav-item mx-3">
						<a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="index.php?page=toutesPublications">Toutes les publications</a>
					</li>
					<?php if(isset($_SESSION['logged']) && $_SESSION['id']!=1) { ?>
					<li class="nav-item mx-3">
						<a class="nav-link" href="#">Mes publications</a>
					</li>
					<?php } ?>
					<li  class="nav-item mx-3">
						<a class="nav-link" href="#" style="">A propos</a>
					</li>
					<?php if(isset($_SESSION['logged'])) { ?>
					<li class="nav-item mx-3">
						<a class="nav-link" href="index.php?page=parametre">Paramètres</a>
					</li>
					<?php if($_SESSION['id'] == 1){ ?>
					<li class="nav-item mx-3">
						<a class="nav-link" href="index.php?page=panneauConfig">Panneau de configuration </a>
					</li>

					<?php } ?>
					
					<?php } ?>
					
					</ul>
					<ul class="nav navbar-nav navbar-right ">
							<?php if(isset($_SESSION['logged'])) { ?>
								<li <?php echo ($page=='deconnexion' ? 'class="active"':'')?>>
									<a href="index.php?page=deconnexion" class="p-0 rounded">
										<button class="btn m-0 rounded" type="submit"><?=MENU_DECONNEXION ?></button>
									</a>
								</li>
							<?php }else {  ?>	
								<li <?php echo ($page=='connexion' ? 'class="active"':'')?>>
									<a href="index.php?page=connexion" class="p-0 rounded">
										<button class="btn m-0 rounded" type="submit"><?= MENU_CONNEXION ?></button>
									</a>
								</li>
								
							<?php } ?>
    				</ul>
				</div>
			</nav>
		</header>
		<!-- Vue -->
			<section class="d-flex justify-content-center align-items-center flex-column p-0 m-0 bg-light">
				
