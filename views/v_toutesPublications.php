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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<div id="allPublis" class="d-flex justify-content-around align-items-center flex-column">
  <form method="post" action='index.php?page=toutesPublications' id="filterContainer" class="d-flex justify-content-center align-items-center flex-column">
    <div id="inputContainer" class="input-group m-3 d-flex">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Trier par:</label>
      </div>
      <select name="typeTri" class="custom-select" id="inputGroupSelect01" onchange="filterHandler(this)">
        <option selected>...</option>
        <option value="Equipe">Equipe</option>
        <option value="Groupe">Groupe</option>
        <option value="Auteurs">Auteurs</option>
      </select>
    </div>
    <div id="dateInput" class="d-flex justify-content-around align-items-center">
      <div class="input-group mb-3 mr-3 d-flex">
        <div class="input-group-prepend">
          <span class="input-group-text" >Du:</span>
        </div>
        <input name="dateDbt" type="text" id="datepicker1" class="form-control" aria-label="datedbt">
      </div>
      <div class="input-group mb-3 ml-3 d-flex" onmouseover="updateMinDate()">
        <div class="input-group-prepend">
          <span class="input-group-text" >Au:</span>
        </div>
        <input name="dateFin" type="text" id="datepicker2" class="form-control" aria-label="datefin">
      </div>
    </div>
    <input class="btn btn-secondary" type="submit" value="FILTRER">
</form>
  <form id="publi_container_tt" class="d-flex flex-column align-items-center">
  
  </form>
  <div id="pagination" class="m-3 mb-5"></div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
