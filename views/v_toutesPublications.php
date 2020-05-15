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

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>

<div id="allPublis" class="d-flex justify-content-around align-items-center flex-column">
  <div id="filterContainer">

  </div>
  <div id="publi_container_tt" class="" ></div>
  <div id="pagination" class="pagination"></div>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
