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
<h1 style="margin-bottom: 30px;">Panneau de configuration</h1> 



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- <ul class="nav nav-pills flex-column">
        <li class="nav-item"><a href="#ajouterU" class="nav-link active" data-target="allSection" data-toggle="pill" >Ajouter un utilisateur</a></li>
        <li class="nav-item"><a href="#supprimerU" >Supprimer un utilisateur</a></li>
        <li class="nav-item"><a href="#ajouterP">Ajouter une publication</a></li>
        <li class="nav-item"><a href="#supprimer P">Supprimer une publication</a></li>
    </ul>


    <div id="myPillContent" class="pill-content">
            <div class="pill-pane fade in active" id="ajouterU">
                    <p>test</p>
            </div>
            <div class="pill-pane fade in active" id="supprimerU">
                    <p>supppppp</p>
            </div>
    </div> -->

    <div class="container py-5" style="margin-top: -300px;">
    <form  method="post" action="index.php?page=parametre" name="formParam">
        <ul class="nav nav-pills flex-column" style="float:left">
            <li class="active"><a href="#ajouterU" class="nav-link active"  data-toggle="pill" >Ajouter un utilisateur</a></li>
            <li><a class="nav-link" data-toggle="pill" href="#supprimerU" >Supprimer un utilisateur</a></li>
            <li><a class="nav-link" data-toggle="pill" href="#ajouterP">Ajouter une publication</a></li>
            <li><a class="nav-link" data-toggle="pill" href="#supprimer P">Supprimer une publication</a></li>

        </ul>
        

        <div id="myTabContent" class="pill-content" style="margin:390px; font-size:14px;">
            <!-- partie profile -->
            <div class="pill-pane fade in active" id="ajouterU">
            

                <div class="form-label-group m-3">
                    <p>Nom</p>
                    <input type="text" name="nom" id=""  class="form-control" placeholder="Nom de l'utilisateur" required autofocus>
                </div>
                <div class="form-label-group m-3">
                    <p>Prenom</p>
                    <input type="text" name="prenom" id="" class="form-control" placeholder="Prenom de l'utilisateur" required autofocus>
                </div>
                <div class="form-label-group m-3">
                    <p>Mail </p>
                    <input type="mail" name="email" id=""  class="form-control" placeholder="Adresse mail" required autofocus>
                </div>
                <div class="form-label-group m-3">
                    <p>Password </p>
                    <input type="password" name="pwd" id=""  class="form-control" placeholder="ex:1234" required autofocus>
                </div>
                <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold m-5" type="submit"> Ajouter </button>
            
            
            <!-- partie panneau de configuration -->   
            </div>
            <div class="pill-pane fade " id="supprimerU">
                <div class="form-label-group m-3">
                    <p>Password </p>
                    <input type="password" name="pwd" id=""  class="form-control" placeholder="ex:1234" required autofocus>
                </div>
                </div>
            </div>
        </div>

    </form>
</div>

<style>

</style>

