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


<div id="allPublis" class="d-flex justify-content-around align-items-center flex-column">
  <div id="filterContainer">

  </div>
  <div id="publi_container_tt" class="pagination-container" >
    <div data-page="1" >
          <div class="publi m-4 rounded-lg p-3">udjc</div>
    </div>
    <div data-page="2" style="display:none;">
        <div class="publi m-4 rounded-lg p-3">qqqqqqq</div>
    </div>
    <div data-page="3" style="display:none;">
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde exercitationem enim quae tempore quam nihil suscipit eius nisi expedita laudantium in culpa delectus reprehenderit illo voluptatum maiores velit, quidem atque!</div>
    </div>
    <div data-page="4" style="display:none;">
        <div class="publi m-4 rounded-lg p-3">bjsw</div>
    </div>
    <div data-page="5" style="display:none;">
        <div class="publi m-4 rounded-lg p-3">skwswkkwkw</div>
    </div>

    <div id="pgContainer" class="pagination pagination-centered pagination-large">
      <nav class="d-flex justify-content-center align-items-center" aria-label="Page navigation example">  
        <ul class="page_control pagination pagination-centered pagination-large pg-blue">
            <li class="page-item " data-page="-" tabindex="-1" ><a class="page-link" href="#" >&lt;</a></li>
            <li class="page-item active" data-page="1"><a class="page-link" href="#" >1<span class="sr-only">(current)</span></a></li>
            <li class="page-item " data-page="2"><a class="page-link" href="#" >2</a></li>
            <li class="page-item " data-page="3"><a class="page-link" href="#" >3</a></li>
            <li class="page-item " data-page="4"><a class="page-link" href="#" >4</a></li>
            <li class="page-item " data-page="5"><a class="page-link" href="#" >5</a></li>
            <li class="page-item " data-page="+"><a class="page-link" href="#" >&gt;</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
