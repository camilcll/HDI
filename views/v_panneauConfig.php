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


    <div class="container py-5" >
    <form  method="post" action="index.php?page=panneauConfig" name="formParam">
        <ul class="nav nav-tabs" >
            <li class="active"><a href="#ajouterU" class="nav-link active"  data-toggle="tab" >Ajouter un utilisateur</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#supprimerU" >Supprimer un utilisateur</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#ajouterP">Ajouter une publication</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#supprimer P">Supprimer une publication</a></li>

        </ul>
        

        <div id="myTabContent" class="tab-content" >
            <!-- partie profile -->
            <div class="tab-pane fade in active" id="ajouterU">
            

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
            <div class="tab-pane fade " id="supprimerU">
                <div class="form-label-group m-3">
                <?php
                    if($user!=null){
                        echo '<div class = "row"><table class="table"><thead class="thead-dark"><tr><th scope="col">ID</th><th scope="col">Nom</th><th scope="col">Prénom</th><th> </th></tr></thead><tbody>';
                        foreach ($user as $users) {

                            echo '<td><a href="index.php?page=detailUser&id=';
                            echo $users->getIdChercheur();
                            echo '" style="display:block;width:100%;height:100%" >'.$users->getIdChercheur().'</a></td>';
                            echo '<td><a href="index.php?page=detailUser&id=';
                            echo $users->getIdChercheur();
                            echo '" style="display:block;width:100%;height:100%;">'.$users->getNom().'</a></td><td><a href="index.php?page=detailUser&id=';
                            echo $users->getIdChercheur();
                            echo '" style="display:block;width:100%;height:100%">'.$users->getPrenom().'</a></tr>';
                        }
                        echo '</tbody></table></div>';
                    
                    }else{ ?>
                        <script>alert("<?php echo htmlspecialchars('Aucun VIP ne correspond à cette recherche', ENT_QUOTES); ?>")</script>
                        <?php
                        header('Refresh:0; url=index.php');
                    } 
                    
                ?>
              
                </div>
                </div>
            </div>
        </div>

    </form>
</div>

<style>

</style>

