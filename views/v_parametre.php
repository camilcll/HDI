<?php require_once(PATH_VIEWS.'header.php');?>


<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<form method="post" action="index.php?page=parametre" name="formParam">
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#config">Panneau de configuration</a>
    </li>

    </ul>
    <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade show active py-4 px-4" id="profile">
        <div class="form-label-group">
            <p>Nom</p>
            <input type="text" name="nom" id="" class="form-control" placeholder="Nom de l'utilisateur" required autofocus>
        </div>
        <div class="form-label-group">
            <p>Prenom</p>
            <input type="text" name="prenom" id="" class="form-control" placeholder="Prenom de l'utilisateur" required autofocus>
        </div>
        <div class="form-label-group">
            <p>Mail </p>
            <input type="mail" name="email" id="" class="form-control" placeholder="Adresse mail" required autofocus>
        </div>
    
        
    </div>
    <div class="tab-pane fade py-4 px-4" id="config">
        <div class="form-group-group">
        </div>
    </div>

    </div>
    <button style="margin-top: 30px"class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Modifier</button>

</form>

<style  type="text/css">
   
   .formParam{
       position:relative;
   }
  .form-label-group {
	position: relative;
	margin-bottom: 1rem;
  }
  
  
</style>

<?php require_once(PATH_VIEWS.'footer.php');?>