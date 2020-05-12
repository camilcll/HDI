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

//halId_s files_s citationFull_s abstract_s producedDate_s

?>

<a href="#publi_container"><button id="scrllDown" type="button" class="btn btn-dark">Voir les dernières publications</button></a>


<div id="main" class = "d-flex justify-content-center p-0 m-0">
  <iframe src="https://www.ec-lyon.fr/sites/all/modules/custom/ecl_tour/vendor/index.html" allowfullscreen="true"></iframe>
</div>

<div id="second" class="mt-4">
  <aside class="float-left d-flex flex-column justify-content-center m-3">
    <div id="aside_cont" class="d-flex justify-content-center align-items-center flex-column rounded-lg m-3">
      <a href="https://hal.archives-ouvertes.fr/LTDS/" class="d-flex justify-content-center align-items-center flex-column">
        <h3 class="text-dark">Publication du LTDS</h3>
        <img src="<?= PATH_IMAGES ?>logo_hal.jpg" alt="">
      </a>
    </div>  
  </aside>
  <div id="publi_container" class="d-flex justify-content-center align-items-center flex-column ml-3">
    <h1>Dernières publications</h1>
    
  </div>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>