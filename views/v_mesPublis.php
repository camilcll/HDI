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
            $("#mespub_container").append(
              ' <tr><td style="vertical-align: middle"><input name="" id="" value="" type="checkbox" class="checkbox-docid"></td><td colspan="2"><div class="publi m-4 rounded-lg p-3">' + element["citationFull_s"] + '.' +'</div></td></tr>')
        });
        
    });

});
</script>

<button class=pull-right name="depot"> <a href="index.php?page=depot"> Déposer </a> </button>

<div  class="d-flex justify-content-center align-items-center flex-column ml-3">
    <h1>Mes publications </h1>
    <table class="table table-hover"><tbody id="mespub_container"> 

    </tbody></table>
  </div>

<?php require_once(PATH_VIEWS.'footer.php'); ?>