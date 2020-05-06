<?php require_once(PATH_VIEWS.'header.php');?>


<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<?php
if( isset($_SESSION['id']))
{
  if((time() - $_SESSION['last_time']) > 3600) //Time in Seconds
  {
    header('Refresh:0; url=index.php?page=deconnexion');
    
  }
  else{
    $_SESSION['last_time']= time();
  }
}

?>

<button class=pull-right name="depot"> <a href="index.php?page=depot"> Déposer </a> </button>

<?php require_once(PATH_VIEWS.'footer.php'); ?>