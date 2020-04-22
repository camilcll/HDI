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
	</head> 
	<body>
		<!-- En-tête -->
		<header class="header"; style="background-color:#3CB371;">
			<section class="container" >
				<div class = "row" >
					<div class = "col-md-2 col-sm-2 col-xs-12">
						<img src="<?= PATH_LOGO ?>" alt="<?= LOGO ?>" class="img-circle" style="width:45%">
					</div>
					<div class="col-md-10 col-sm-10 col-xs-12">
						<h2><?= TITRE ?></h2>
					</div>
				</div>
			</section>
		</header>
		<!-- Vue -->
			<section class="container">
				<div class = "row">
