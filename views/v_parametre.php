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

<link href="<?= PATH_CSS ?>settings.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="container py-5">
    <form  method="post" action="index.php?page=parametre" enctype="multipart/form-data">
        <ul class="nav nav-tabs">
          <li class="active">
              <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
          </li>

          <li class="">
              <a class="nav-link" data-toggle="tab" href="#info">Informations complémentaires</a>
          </li>
        </ul>
        

      <div id="myTabContent" class="tab-content">
        <div id="profile" class="tab-pane active">
        <!-- partie avatar -->
          <div class="d-flex justify-content-center align-items-center flex-column">
            <div id="pp" class="d-flex justify-content-center align-items-center bg-secondary rounded m-3 p-3">
            <img id="avatarPreview" src="" alt="">
              <?php

              if($avatar !== null){
                echo '<img src="'.PATH_AVATAR .$avatar->getNomFich().'" alt="avatar" class="rounded rfp" id="avatarpp">';
              }
              else{
                echo '<i id="noUser" class="fa fa-user-circle-o rfp"></i>';
              }
             ?> 
            </div>
            <input id="tid" type="hidden" name="tid" value=""/>
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <div class="d-flex justify-content-around align-items-center">
              <label id="btnAvatar" class="btn btn-secondary m-3"">
                <input type="file" name="avatar" value="modifier" onchange="openFile(event)" accept="image/*">
                <i class="fa fa-upload "></i>
                Charger un avatar
              </label>
              <i id="trash" class="fa fa-trash-o" onclick="sendTrash(<?=$user->getIdChercheur()?>)"></i>
            </div>
          </div>

        <!-- partie form profile -->
          <div class="form-label-group m-3">
            <p>Nom</p>
            <input type="text" name="nom" value="<?=$user->getNom() ?>" class="form-control" placeholder="Nom de l'utilisateur" required autofocus>
          </div>
          <div class="form-label-group m-3">
            <p>Prenom</p>
            <input type="text" name="prenom" value="<?=$user->getPrenom() ?>"class="form-control" placeholder="Prenom de l'utilisateur" required autofocus>
          </div>
          <div class="form-label-group m-3">
            <p>Mail </p>
            <input type="mail" name="email" value="<?=$user->getEmail() ?>" class="form-control" placeholder="Adresse mail" required autofocus>
          </div>
          <div class="form-label-group m-3">
            <p>Renseignez votre id Hal</p>
            <input type="text" id="idhal" name="idhal" value="<?=$user->getIdHal() ?>" class="form-control" placeholder="idHal" required autofocus>
            <label> <a href="https://hal.archives-ouvertes.fr/user" >Pas encore d'idhal, créer s'en un </a></label>
          </div>
          <div class="form-label-group m-3">
            <p>Renseignez votre id ORCID</p>
            <input type="text" id="orcid" name="orcid"  class="form-control" placeholder="orcid id"  >
          </div>
          <div>
            <img onclick="javascript:visibilite('pwd'); return false;" src="<?= PATH_IMAGES ?>key.png" style="width: 25px;height: 25px;"> 
            <a href="" onclick="javascript:visibilite('pwd'); return false;" ><label style="font-size:14px;">Mot de Passe </label></a>
          </div>
          

          <div class="form-label-group m-3" id="pwd" style="display:none;">
            <p> Veuillez saisir votre ancien mot de passe </p>
            <input type="text" class="form-control" name="ancien" value=""/>
            <p> Entrer le nouveau mot de passe</p>
            <input type="password" class="form-control" name="nouveau1" value=""/>
            <p> Confirmer le nouveau mot de passe</p>
            <input type="password" class="form-control" name="nouveau2" value=""/>
          </div>


          <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold m-5" type="submit">Modifier</button>    
        </div>
        <!-- partie info comple -->

        <div id="info" class="tab-pane" >
            <div class="form-group-group">
              <div class="form-label-group m-3">
                <p>Renseignez votre équipe de recherche</p>
                <SELECT class="form-control" name="forequipe" >
                  <option selected="selected"></option>
                  <option value="tribo">1- Tribologie Physico-Chimie et Dynamique des Interfaces</option>
                  <option value="dyna">2- Dynamique des Systèmes Complexes</option>
                  <option value="mec">3- Mécanique des Matériaux et Procédés</option>
                  <option value="geo">4- Géomatériaux et Constructions Durables</option>
                </SELECT>
              </div>
              <div class="form-label-group m-3">
                <p>Renseignez votre groupe</p>
                <input type="text" id="groupe" name="groupe"  class="form-control" placeholder="ex: jj">
              </div>
            </div>
        </div>

      </div> <!-- fin div tab mycontent-->
        

    </form>
   
</div>

<?php require_once(PATH_VIEWS.'footer.php');?>