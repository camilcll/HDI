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
<script>
$(document).ready(function () {
    
    $.getJSON('https://api.archives-ouvertes.fr/search/?q=manuel+cobian&fl=*&sort=producedDate_tdate+desc', function (data) {
        console.log($(data.response.docs)[0]);
        (data.response.docs).forEach(element => {
            $("#mespub_container").append('<div class="publi m-4 rounded-lg p-3">' + element["citationFull_s"] + '.' +'</div>')
        });
        
    });

});
</script>

<button class=pull-right name="depot"> <a href="index.php?page=depot"> Déposer </a> </button>

<div id="mespub_container" class="d-flex justify-content-center align-items-center flex-column ml-3">
    <h1>Mes publications </h1>
    
  </div>

<?php require_once(PATH_VIEWS.'footer.php'); ?>