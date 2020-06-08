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

<style>
    .collapsible {
    cursor: pointer;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    }



    .collapsible:after {
    font-weight: bold;
    float: left;
    margin-left: 5px;
    }



    .content {
    padding: 0 18px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    }
</style>
<h3> Dépôt </h3>

<div class="render">

<form method="post" action="/my-handling-form-page">


    <div class="form-group row">
        <label class=" col-md-3 control-label required" for="type"> Type de document </label>
        <div class="col-md-9">
            <select name="type" id="type" class="form-control input-sm" onchange="changementType();" >
                <option selected="selected" ></option>
                <optgroup label="Publications">
                    <option value="article">Article dans une revue</option>
                    <option value="comm">Communication dans un congrès</option>
                    <option value="poster">Poster</option>
                    <option value="ouvrage">Ouvrage (y compris édition critique et traduction)</option>
                    <option value="chapOuvrage">Chapitre d'ouvrage</option>
                    <option value="directionOuvrage">Direction d'ouvrage, Proceedings, Dossier</option>
                    <option value="brevet">Brevet</option>
                    <option value="autrePub">Autre publication</option>
                </optgroup>

                <optgroup label="Documents non publiés">
                    <option value="prePub">Pré-publication, Document de travail</option>
                    <option value="rapport">Rapport</option>
                </optgroup>

                <optgroup label="Travaux universitaires">
                    <option value="these">Thèse</option>
                    <option value="hdr">HDR</option>
                    <option value="cours">Cours</option>
                </optgroup>

                <optgroup label="Données de recherche">
                    <option value="image">Image</option>
                    <option value="video">Vidéo</option>
                    <option value="son">Son</option>
                    <option value="carte">Carte</option>
                    <option value="logiciel">Logiciel</option>
                </optgroup>
            </select>
        </div>
    </div>

    <div class="form-group row" id="title-element">
        <label class="col-md-3 control-label required" for="title"> Titre </label>
        <div class="textarea-group" style="margin-bottom:10px;">
            <textarea name="title" class="form-control input-sm" style="border-bottom-right-radius:0;" rows="3" cols="80"></textarea>
        </div>
    </div>

    <div class="form-group row meta-complete" id="subTitle-element" style="display:none;">
        <div class="col-md-9">
            <label class="col-md-3 control-label optional" for="subTitle"> Sous-Titre </label>
        </div>
        <div class="textarea-group" style="margin-bottom:10px;">
            <textarea name="title" class="form-control input-sm" style="border-bottom-right-radius:0;" rows="3" cols="80"></textarea>
        </div>
    </div>

    <div class="for-group row" id="domain-element">
        <label class="col-md-3 control-label required" for="domain">Domaine</label>
        <div id="panel_domain" style="margin-bottom:10px;"> 
            <div class="clearfix" style="max-height:260px; overflow:auto;">
            <ul class="tree">
                <li style="display : list-item;">
                    <input id="chim" style="display: none;" type="checkbox" value="chim">
                    <label style="margin-bottom: 2px; margin-right: 5px;" for="chim"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
                    <span class="collapsible" style="cursor: pointer;">Chimie</span>
                        <ul class="content" >
                        <li style="display : list-item;"><input id="chim.anal" style="display: none;" type="hidden" value="chim.anal"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.anal"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie analytique</span></li>
                        <li style="display : list-item;"><input id="chim.cata" style="display: none;" type="hidden" value="chim.cata"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.cata"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Catalyse</span></li>
                        <li style="display : list-item;"><input id="chim.chem" style="display: none;" type="hidden" value="chim.chem"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.chem"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chemo-informatique</span></li>
                        <li style="display : list-item;"><input id="chim.coor" style="display: none;" type="hidden" value="chim.coor"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.coor"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie de coordination</span></li>
                        <li style="display : list-item;"><input id="chim.cris" style="display: none;" type="hidden" value="chim.cris"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.cris"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cristallographie</span></li>
                        <li style="display : list-item;"><input id="chim.geni" style="display: none;" type="hidden" value="chim.geni"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.geni"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie chimique</span></li>
                        <li style="display : list-item;"><input id="chim.inor" style="display: none;" type="hidden" value="chim.inor"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.inor"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie inorganique</span></li>
                        <li style="display : list-item;"><input id="chim.mate" style="display: none;" type="hidden" value="chim.mate"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.mate"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matériaux</span></li>
                        <li style="display : list-item;"><input id="chim.orga" style="display: none;" type="hidden" value="chim.orga"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.orga"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie organique</span></li>
                        <li style="display : list-item;"><input id="chim.othe" style="display: none;" type="hidden" value="chim.othe"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.othe"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre</span></li>
                        <li style="display : list-item;"><input id="chim.poly" style="display: none;" type="hidden" value="chim.poly"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.poly"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Polymères</span></li>
                        <li style="display : list-item;"><input id="chim.radio" style="display: none;" type="hidden" value="chim.radio"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.radio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Radiochimie</span></li>
                        <li style="display : list-item;"><input id="chim.theo" style="display: none;" type="hidden" value="chim.theo"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.theo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie théorique et/ou physique</span></li>
                        <li style="display : list-item;"><input id="chim.ther" style="display: none;" type="hidden" value="chim.ther"><label style="margin-bottom: 2px; margin-right: 5px;" for="chim.ther"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie thérapeutique</span></li>
                        </ul>
                </li>
                <li style="display : list-item;">
                <input id="info" style="display: none;" type="checkbox" value="info">
                <label style="margin-bottom: 2px; margin-right: 5px;" for="info"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
                <span class="collapsible" style="cursor: pointer;">Informatique [cs]</span>
                    <ul class="content" >
                        <li style="display : list-item;"><input id="info.eiah" style="display: none;" type="hidden" value="info.eiah"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.eiah"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Environnements Informatiques pour l'Apprentissage Humain</span></li>
                        <li style="display : list-item;"><input id="info.info-ai" style="display: none;" type="hidden" value="info.info-ai"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ai"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Intelligence artificielle [cs.AI]</span></li>
                        <li style="display : list-item;"><input id="info.info-ao" style="display: none;" type="hidden" value="info.info-ao"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ao"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Arithmétique des ordinateurs</span></li>
                        <li style="display : list-item;"><input id="info.info-ar" style="display: none;" type="hidden" value="info.info-ar"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ar"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Architectures Matérielles [cs.AR]</span></li>
                        <li style="display : list-item;"><input id="info.info-au" style="display: none;" type="hidden" value="info.info-au"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-au"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Automatique</span></li>
                        <li style="display : list-item;"><input id="info.info-bi" style="display: none;" type="hidden" value="info.info-bi"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-bi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Bio-informatique [q-bio.QM]</span></li>
                        <li style="display : list-item;"><input id="info.info-bt" style="display: none;" type="hidden" value="info.info-bt"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-bt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biotechnologie</span></li>
                        <li style="display : list-item;"><input id="info.info-cc" style="display: none;" type="hidden" value="info.info-cc"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Complexité [cs.CC]</span></li>
                        <li style="display : list-item;"><input id="info.info-ce" style="display: none;" type="hidden" value="info.info-ce"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ce"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ingénierie, finance et science [cs.CE]</span></li>
                        <li style="display : list-item;"><input id="info.info-cg" style="display: none;" type="hidden" value="info.info-cg"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géométrie algorithmique [cs.CG]</span></li>
                        <li style="display : list-item;"><input id="info.info-cl" style="display: none;" type="hidden" value="info.info-cl"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Informatique et langage [cs.CL]</span></li>
                        <li style="display : list-item;"><input id="info.info-cr" style="display: none;" type="hidden" value="info.info-cr"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cryptographie et sécurité [cs.CR]</span></li>
                        <li style="display : list-item;"><input id="info.info-cv" style="display: none;" type="hidden" value="info.info-cv"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cv"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Vision par ordinateur et reconnaissance de formes [cs.CV]</span></li>
                        <li style="display : list-item;"><input id="info.info-cy" style="display: none;" type="hidden" value="info.info-cy"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-cy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ordinateur et société [cs.CY]</span></li>
                        <li style="display : list-item;"><input id="info.info-db" style="display: none;" type="hidden" value="info.info-db"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-db"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Base de données [cs.DB]</span></li>
                        <li style="display : list-item;"><input id="info.info-dc" style="display: none;" type="hidden" value="info.info-dc"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-dc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Calcul parallèle, distribué et partagé [cs.DC]</span></li>
                        <li style="display : list-item;"><input id="info.info-dl" style="display: none;" type="hidden" value="info.info-dl"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-dl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Bibliothèque électronique [cs.DL]</span></li>
                        <li style="display : list-item;"><input id="info.info-dm" style="display: none;" type="hidden" value="info.info-dm"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-dm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mathématique discrète [cs.DM]</span></li>
                        <li style="display : list-item;"><input id="info.info-ds" style="display: none;" type="hidden" value="info.info-ds"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ds"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Algorithme et structure de données [cs.DS]</span></li>
                        <li style="display : list-item;"><input id="info.info-es" style="display: none;" type="hidden" value="info.info-es"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-es"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes embarqués</span></li>
                        <li style="display : list-item;"><input id="info.info-gl" style="display: none;" type="hidden" value="info.info-gl"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-gl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Littérature générale [cs.GL]</span></li>
                        <li style="display : list-item;"><input id="info.info-gr" style="display: none;" type="hidden" value="info.info-gr"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-gr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Synthèse d'image et réalité virtuelle [cs.GR]</span></li>
                        <li style="display : list-item;"><input id="info.info-gt" style="display: none;" type="hidden" value="info.info-gt"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-gt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Informatique et théorie des jeux [cs.GT]</span></li>
                        <li style="display : list-item;"><input id="info.info-hc" style="display: none;" type="hidden" value="info.info-hc"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-hc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Interface homme-machine [cs.HC]</span></li>
                        <li style="display : list-item;"><input id="info.info-ia" style="display: none;" type="hidden" value="info.info-ia"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ia"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ingénierie assistée par ordinateur</span></li>
                        <li style="display : list-item;"><input id="info.info-im" style="display: none;" type="hidden" value="info.info-im"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-im"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Imagerie médicale</span></li>
                        <li style="display : list-item;"><input id="info.info-ir" style="display: none;" type="hidden" value="info.info-ir"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ir"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Recherche d'information [cs.IR]</span></li>
                        <li style="display : list-item;"><input id="info.info-it" style="display: none;" type="hidden" value="info.info-it"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-it"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie de l'information [cs.IT]</span></li>
                        <li style="display : list-item;"><input id="info.info-iu" style="display: none;" type="hidden" value="info.info-iu"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-iu"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Informatique ubiquitaire</span></li>
                        <li style="display : list-item;"><input id="info.info-lg" style="display: none;" type="hidden" value="info.info-lg"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-lg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Apprentissage [cs.LG]</span></li>
                        <li style="display : list-item;"><input id="info.info-lo" style="display: none;" type="hidden" value="info.info-lo"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-lo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Logique en informatique [cs.LO]</span></li>
                        <li style="display : list-item;"><input id="info.info-ma" style="display: none;" type="hidden" value="info.info-ma"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ma"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Système multi-agents [cs.MA]</span></li>
                        <li style="display : list-item;"><input id="info.info-mc" style="display: none;" type="hidden" value="info.info-mc"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-mc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Informatique mobile</span></li>
                        <li style="display : list-item;"><input id="info.info-mm" style="display: none;" type="hidden" value="info.info-mm"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-mm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Multimédia [cs.MM]</span></li>
                        <li style="display : list-item;"><input id="info.info-mo" style="display: none;" type="hidden" value="info.info-mo"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-mo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Modélisation et simulation</span></li>
                        <li style="display : list-item;"><input id="info.info-ms" style="display: none;" type="hidden" value="info.info-ms"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ms"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Logiciel mathématique [cs.MS]</span></li>
                        <li style="display : list-item;"><input id="info.info-na" style="display: none;" type="hidden" value="info.info-na"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-na"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Analyse numérique [cs.NA]</span></li>
                        <li style="display : list-item;"><input id="info.info-ne" style="display: none;" type="hidden" value="info.info-ne"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ne"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Réseau de neurones [cs.NE]</span></li>
                        <li style="display : list-item;"><input id="info.info-ni" style="display: none;" type="hidden" value="info.info-ni"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ni"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Réseaux et télécommunications [cs.NI]</span></li>
                        <li style="display : list-item;"><input id="info.info-oh" style="display: none;" type="hidden" value="info.info-oh"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-oh"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre [cs.OH]</span></li>
                        <li style="display : list-item;"><input id="info.info-os" style="display: none;" type="hidden" value="info.info-os"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-os"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Système d'exploitation [cs.OS]</span></li>
                        <li style="display : list-item;"><input id="info.info-pf" style="display: none;" type="hidden" value="info.info-pf"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-pf"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Performance et fiabilité [cs.PF]</span></li>
                        <li style="display : list-item;"><input id="info.info-et" style="display: none;" type="hidden" value="info.info-et"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-et"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Technologies Émergeantes [cs.ET]</span></li>
                        <li style="display : list-item;"><input id="info.info-pl" style="display: none;" type="hidden" value="info.info-pl"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-pl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Langage de programmation [cs.PL]</span></li>
                        <li style="display : list-item;"><input id="info.info-rb" style="display: none;" type="hidden" value="info.info-rb"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-rb"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Robotique [cs.RO]</span></li>
                        <li style="display : list-item;"><input id="info.info-ro" style="display: none;" type="hidden" value="info.info-ro"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ro"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Recherche opérationnelle [cs.RO]</span></li>
                        <li style="display : list-item;"><input id="info.info-sc" style="display: none;" type="hidden" value="info.info-sc"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-sc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Calcul formel [cs.SC]</span></li>
                        <li style="display : list-item;"><input id="info.info-sd" style="display: none;" type="hidden" value="info.info-sd"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-sd"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Son [cs.SD]</span></li>
                        <li style="display : list-item;"><input id="info.info-se" style="display: none;" type="hidden" value="info.info-se"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-se"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie logiciel [cs.SE]</span></li>
                        <li style="display : list-item;"><input id="info.info-ti" style="display: none;" type="hidden" value="info.info-ti"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ti"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Traitement des images [eess.IV]</span></li>
                        <li style="display : list-item;"><input id="info.info-ts" style="display: none;" type="hidden" value="info.info-ts"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-ts"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Traitement du signal et de l'image [eess.SP]</span></li>
                        <li style="display : list-item;"><input id="info.info-tt" style="display: none;" type="hidden" value="info.info-tt"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-tt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Traitement du texte et du document</span></li>
                        <li style="display : list-item;"><input id="info.info-wb" style="display: none;" type="hidden" value="info.info-wb"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-wb"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Web</span></li>
                        <li style="display : list-item;"><input id="info.info-fl" style="display: none;" type="hidden" value="info.info-fl"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-fl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie et langage formel [cs.FL]</span></li>
                        <li style="display : list-item;"><input id="info.info-si" style="display: none;" type="hidden" value="info.info-si"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-si"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Réseaux sociaux et d'information [cs.SI]</span></li>
                        <li style="display : list-item;"><input id="info.info-sy" style="display: none;" type="hidden" value="info.info-sy"><label style="margin-bottom: 2px; margin-right: 5px;" for="info.info-sy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes et contrôle [cs.SY]</span></li>
                    </ul>
                </li>
                <li style="display : list-item;">
                <input id="math" style="display: none;" type="checkbox" value="math">
                <label style="margin-bottom: 2px; margin-right: 5px;" for="math"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
                <span class="collapsible" style="cursor: pointer;">Mathématiques [math]</span>
                    <ul class="content">
                        <li style="display : list-item;"><input id="math.math-ac" style="display: none;" type="hidden" value="math.math-ac"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ac"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Algèbre commutative [math.AC]</span></li>
                        <li style="display : list-item;"><input id="math.math-ag" style="display: none;" type="hidden" value="math.math-ag"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ag"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géométrie algébrique [math.AG]</span></li>
                        <li style="display : list-item;"><input id="math.math-ap" style="display: none;" type="hidden" value="math.math-ap"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ap"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Equations aux dérivées partielles [math.AP]</span></li>
                        <li style="display : list-item;"><input id="math.math-at" style="display: none;" type="hidden" value="math.math-at"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-at"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Topologie algébrique [math.AT]</span></li>
                        <li style="display : list-item;"><input id="math.math-ca" style="display: none;" type="hidden" value="math.math-ca"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ca"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Analyse classique [math.CA]</span></li>
                        <li style="display : list-item;"><input id="math.math-co" style="display: none;" type="hidden" value="math.math-co"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-co"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Combinatoire [math.CO]</span></li>
                        <li style="display : list-item;"><input id="math.math-ct" style="display: none;" type="hidden" value="math.math-ct"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ct"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Catégories et ensembles [math.CT]</span></li>
                        <li style="display : list-item;"><input id="math.math-cv" style="display: none;" type="hidden" value="math.math-cv"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-cv"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Variables complexes [math.CV]</span></li>
                        <li style="display : list-item;"><input id="math.math-dg" style="display: none;" type="hidden" value="math.math-dg"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-dg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géométrie différentielle [math.DG]</span></li>
                        <li style="display : list-item;"><input id="math.math-ds" style="display: none;" type="hidden" value="math.math-ds"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ds"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes dynamiques [math.DS]</span></li>
                        <li style="display : list-item;"><input id="math.math-fa" style="display: none;" type="hidden" value="math.math-fa"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-fa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Analyse fonctionnelle [math.FA]</span></li>
                        <li style="display : list-item;"><input id="math.math-gm" style="display: none;" type="hidden" value="math.math-gm"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-gm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mathématiques générales [math.GM]</span></li>
                        <li style="display : list-item;"><input id="math.math-gn" style="display: none;" type="hidden" value="math.math-gn"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-gn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Topologie générale [math.GN]</span></li>
                        <li style="display : list-item;"><input id="math.math-gr" style="display: none;" type="hidden" value="math.math-gr"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-gr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie des groupes [math.GR]</span></li>
                        <li style="display : list-item;"><input id="math.math-gt" style="display: none;" type="hidden" value="math.math-gt"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-gt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Topologie géométrique [math.GT]</span></li>
                        <li style="display : list-item;"><input id="math.math-ho" style="display: none;" type="hidden" value="math.math-ho"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ho"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Histoire et perspectives sur les mathématiques [math.HO]</span></li>
                        <li style="display : list-item;"><input id="math.math-it" style="display: none;" type="hidden" value="math.math-it"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-it"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie de l'information et codage [math.IT]</span></li>
                        <li style="display : list-item;"><input id="math.math-kt" style="display: none;" type="hidden" value="math.math-kt"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-kt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">K-théorie et homologie [math.KT]</span></li>
                        <li style="display : list-item;"><input id="math.math-lo" style="display: none;" type="hidden" value="math.math-lo"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-lo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Logique [math.LO]</span></li>
                        <li style="display : list-item;"><input id="math.math-mg" style="display: none;" type="hidden" value="math.math-mg"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-mg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géométrie métrique [math.MG]</span></li>
                        <li style="display : list-item;"><input id="math.math-mp" style="display: none;" type="hidden" value="math.math-mp"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-mp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique mathématique [math-ph]</span></li>
                        <li style="display : list-item;"><input id="math.math-na" style="display: none;" type="hidden" value="math.math-na"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-na"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Analyse numérique [math.NA]</span></li>
                        <li style="display : list-item;"><input id="math.math-nt" style="display: none;" type="hidden" value="math.math-nt"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-nt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie des nombres [math.NT]</span></li>
                        <li style="display : list-item;"><input id="math.math-oa" style="display: none;" type="hidden" value="math.math-oa"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-oa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Algèbres d'opérateurs [math.OA]</span></li>
                        <li style="display : list-item;"><input id="math.math-oc" style="display: none;" type="hidden" value="math.math-oc"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-oc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Optimisation et contrôle [math.OC]</span></li>
                        <li style="display : list-item;"><input id="math.math-pr" style="display: none;" type="hidden" value="math.math-pr"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-pr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Probabilités [math.PR]</span></li>
                        <li style="display : list-item;"><input id="math.math-qa" style="display: none;" type="hidden" value="math.math-qa"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-qa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Algèbres quantiques [math.QA]</span></li>
                        <li style="display : list-item;"><input id="math.math-ra" style="display: none;" type="hidden" value="math.math-ra"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-ra"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Anneaux et algèbres [math.RA]</span></li>
                        <li style="display : list-item;"><input id="math.math-rt" style="display: none;" type="hidden" value="math.math-rt"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-rt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie des représentations [math.RT]</span></li>
                        <li style="display : list-item;"><input id="math.math-sg" style="display: none;" type="hidden" value="math.math-sg"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-sg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géométrie symplectique [math.SG]</span></li>
                        <li style="display : list-item;"><input id="math.math-sp" style="display: none;" type="hidden" value="math.math-sp"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-sp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie spectrale [math.SP]</span></li>
                        <li style="display : list-item;"><input id="math.math-st" style="display: none;" type="hidden" value="math.math-st"><label style="margin-bottom: 2px; margin-right: 5px;" for="math.math-st"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Statistiques [math.ST]</span></li>
                    </ul>
                </li>
                <li style="display : list-item;">
                <input id="nlin" style="display: none;" type="checkbox" value="nlin"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
				<span class="collapsible" style="cursor: pointer;">Science non linéaire [physics]</span>
                    <ul class="content">
                        <li style="display : list-item;"><input id="nlin.nlin-ao" style="display: none;" type="hidden" value="nlin.nlin-ao"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin.nlin-ao"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Adaptation et Systèmes auto-organisés [nlin.AO]</span></li>
                        <li style="display : list-item;"><input id="nlin.nlin-cd" style="display: none;" type="hidden" value="nlin.nlin-cd"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin.nlin-cd"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Dynamique Chaotique [nlin.CD]</span></li>
                        <li style="display : list-item;"><input id="nlin.nlin-cg" style="display: none;" type="hidden" value="nlin.nlin-cg"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin.nlin-cg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Automates cellulaires et gaz sur réseau [nlin.CG]</span></li>
                        <li style="display : list-item;"><input id="nlin.nlin-ps" style="display: none;" type="hidden" value="nlin.nlin-ps"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin.nlin-ps"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Formation de Structures et Solitons [nlin.PS]</span></li>
                        <li style="display : list-item;"><input id="nlin.nlin-si" style="display: none;" type="hidden" value="nlin.nlin-si"><label style="margin-bottom: 2px; margin-right: 5px;" for="nlin.nlin-si"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes Solubles et Intégrables [nlin.SI]</span></li>
                    </ul>
                </li>
                <li style="display : list-item;">
                <input id="phys" style="display: none;" type="checkbox" value="phys">
                <label style="margin-bottom: 2px; margin-right: 5px;" for="phys"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
                <span class="collapsible" style="cursor: pointer;">Physique [physics]</span>
                    <ul class="content">
                        <li style="display : list-item;"><input id="phys.astr" style="display: none;" type="checkbox" value="phys.astr"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
						<span class="collapsible" style="cursor: pointer;">Astrophysique [astro-ph]</span>
                            <ul class="content">
                                <li style="display : list-item;"><input id="phys.astr.co" style="display: none;" type="hidden" value="phys.astr.co"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.co"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cosmologie et astrophysique extra-galactique [astro-ph.CO]</span></li>
                                <li style="display : list-item;"><input id="phys.astr.ep" style="display: none;" type="hidden" value="phys.astr.ep"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.ep"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Planétologie et astrophysique de la terre [astro-ph.EP]</span></li>
                                <li style="display : list-item;"><input id="phys.astr.ga" style="display: none;" type="hidden" value="phys.astr.ga"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.ga"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Astrophysique galactique [astro-ph.GA]</span></li>
                                <li style="display : list-item;"><input id="phys.astr.he" style="display: none;" type="hidden" value="phys.astr.he"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.he"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Phénomènes cosmiques de haute energie [astro-ph.HE]</span></li>
                                <li style="display : list-item;"><input id="phys.astr.im" style="display: none;" type="hidden" value="phys.astr.im"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.im"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Instrumentation et méthodes pour l'astrophysique [astro-ph.IM]</span></li>
                                <li style="display : list-item;"><input id="phys.astr.sr" style="display: none;" type="hidden" value="phys.astr.sr"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.astr.sr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Astrophysique stellaire et solaire [astro-ph.SR]</span></li>
                            </ul>
                        </li>
                        <li style="display : list-item;"><input id="phys.cond" style="display: none;" type="checkbox" value="phys.cond"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
						<span class="collapsible" style="cursor: pointer;">Matière Condensée [cond-mat]</span>
                            <ul class="content">
                                <li style="display : list-item;"><input id="phys.cond.cm-ds-nn" style="display: none;" type="hidden" value="phys.cond.cm-ds-nn"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-ds-nn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes désordonnés et réseaux de neurones [cond-mat.dis-nn]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-gen" style="display: none;" type="hidden" value="phys.cond.cm-gen"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-gen"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre [cond-mat.other]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-ms" style="display: none;" type="hidden" value="phys.cond.cm-ms"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-ms"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Science des matériaux [cond-mat.mtrl-sci]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-msqhe" style="display: none;" type="hidden" value="phys.cond.cm-msqhe"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-msqhe"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systèmes mésoscopiques et effet Hall quantique [cond-mat.mes-hall]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-s" style="display: none;" type="hidden" value="phys.cond.cm-s"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-s"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Supraconductivité [cond-mat.supr-con]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-sce" style="display: none;" type="hidden" value="phys.cond.cm-sce"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-sce"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Electrons fortement corrélés [cond-mat.str-el]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-scm" style="display: none;" type="hidden" value="phys.cond.cm-scm"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-scm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matière Molle [cond-mat.soft]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.cm-sm" style="display: none;" type="hidden" value="phys.cond.cm-sm"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.cm-sm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique statistique [cond-mat.stat-mech]</span></li>
                                <li style="display : list-item;"><input id="phys.cond.gas" style="display: none;" type="hidden" value="phys.cond.gas"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.cond.gas"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gaz Quantiques [cond-mat.quant-gas]</span></li></ul></li>
                                <li style="display : list-item;"><input id="phys.grqc" style="display: none;" type="hidden" value="phys.grqc"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.grqc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Relativité Générale et Cosmologie Quantique [gr-qc]</span></li>
                                <li style="display : list-item;"><input id="phys.hexp" style="display: none;" type="hidden" value="phys.hexp"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.hexp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des Hautes Energies - Expérience [hep-ex]</span></li>
                                <li style="display : list-item;"><input id="phys.hlat" style="display: none;" type="hidden" value="phys.hlat"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.hlat"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des Hautes Energies - Réseau [hep-lat]</span></li>
                                <li style="display : list-item;"><input id="phys.hphe" style="display: none;" type="hidden" value="phys.hphe"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.hphe"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des Hautes Energies - Phénoménologie [hep-ph]</span></li>
                                <li style="display : list-item;"><input id="phys.hthe" style="display: none;" type="hidden" value="phys.hthe"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.hthe"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des Hautes Energies - Théorie [hep-th]</span></li>
                                <li style="display : list-item;"><input id="phys.meca" style="display: none;" type="checkbox" value="phys.meca"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Mécanique [physics]</span>
                                    <ul class="content">    
                                        <li style="display : list-item;"><input id="phys.meca.acou" style="display: none;" type="hidden" value="phys.meca.acou"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.acou"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Acoustique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.biom" style="display: none;" type="hidden" value="phys.meca.biom"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.biom"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biomécanique [physics.med-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.geme" style="display: none;" type="hidden" value="phys.meca.geme"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.geme"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie mécanique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.mefl" style="display: none;" type="hidden" value="phys.meca.mefl"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.mefl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des fluides [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.mema" style="display: none;" type="hidden" value="phys.meca.mema"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.mema"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des matériaux [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.msmeca" style="display: none;" type="hidden" value="phys.meca.msmeca"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.msmeca"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matériaux et structures en mécanique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.solid" style="display: none;" type="hidden" value="phys.meca.solid"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.solid"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des solides [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.stru" style="display: none;" type="hidden" value="phys.meca.stru"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.stru"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des structures [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.ther" style="display: none;" type="hidden" value="phys.meca.ther"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.ther"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Thermique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.meca.vibr" style="display: none;" type="hidden" value="phys.meca.vibr"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.meca.vibr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Vibrations [physics.class-ph]</span></li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="phys.mphy" style="display: none;" type="hidden" value="phys.mphy"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.mphy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique mathématique [math-ph]</span></li>
                                <li style="display : list-item;"><input id="phys.nexp" style="display: none;" type="hidden" value="phys.nexp"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.nexp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Nucléaire Expérimentale [nucl-ex]</span></li>
                                <li style="display : list-item;"><input id="phys.nucl" style="display: none;" type="hidden" value="phys.nucl"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.nucl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Nucléaire Théorique [nucl-th]</span></li>
                                <li style="display : list-item;"><input id="phys.phys" style="display: none;" type="checkbox" value="phys.phys"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Physique [physics]</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="phys.phys.phys-acc-ph" style="display: none;" type="hidden" value="phys.phys.phys-acc-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-acc-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des accélérateurs [physics.acc-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-ao-ph" style="display: none;" type="hidden" value="phys.phys.phys-ao-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-ao-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Atmosphérique et Océanique [physics.ao-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-atm-ph" style="display: none;" type="hidden" value="phys.phys.phys-atm-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-atm-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Agrégats Moléculaires et Atomiques [physics.atm-clus]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-atom-ph" style="display: none;" type="hidden" value="phys.phys.phys-atom-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-atom-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Atomique [physics.atom-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-bio-ph" style="display: none;" type="hidden" value="phys.phys.phys-bio-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-bio-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biophysique [physics.bio-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-chem-ph" style="display: none;" type="hidden" value="phys.phys.phys-chem-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-chem-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chimie-Physique [physics.chem-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-class-ph" style="display: none;" type="hidden" value="phys.phys.phys-class-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-class-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Classique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-comp-ph" style="display: none;" type="hidden" value="phys.phys.phys-comp-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-comp-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Numérique [physics.comp-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-data-an" style="display: none;" type="hidden" value="phys.phys.phys-data-an"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-data-an"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Analyse de données, Statistiques et Probabilités [physics.data-an]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-ed-ph" style="display: none;" type="hidden" value="phys.phys.phys-ed-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-ed-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Enseignement de la physique [physics.ed-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-flu-dyn" style="display: none;" type="hidden" value="phys.phys.phys-flu-dyn"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-flu-dyn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Dynamique des Fluides [physics.flu-dyn]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-gen-ph" style="display: none;" type="hidden" value="phys.phys.phys-gen-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-gen-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Générale [physics.gen-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-geo-ph" style="display: none;" type="hidden" value="phys.phys.phys-geo-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-geo-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géophysique [physics.geo-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-hist-ph" style="display: none;" type="hidden" value="phys.phys.phys-hist-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-hist-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Histoire de la Physique [physics.hist-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-ins-det" style="display: none;" type="hidden" value="phys.phys.phys-ins-det"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-ins-det"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Instrumentations et Détecteurs [physics.ins-det]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-med-ph" style="display: none;" type="hidden" value="phys.phys.phys-med-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-med-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Médicale [physics.med-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-optics" style="display: none;" type="hidden" value="phys.phys.phys-optics"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-optics"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Optique [physics.optics]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-plasm-ph" style="display: none;" type="hidden" value="phys.phys.phys-plasm-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-plasm-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique des plasmas [physics.plasm-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-pop-ph" style="display: none;" type="hidden" value="phys.phys.phys-pop-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-pop-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique : vulgarisation [physics.pop-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-soc-ph" style="display: none;" type="hidden" value="phys.phys.phys-soc-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-soc-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique et Société [physics.soc-ph]</span></li>
                                        <li style="display : list-item;"><input id="phys.phys.phys-space-ph" style="display: none;" type="hidden" value="phys.phys.phys-space-ph"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.phys.phys-space-ph"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique de l'espace [physics.space-ph]</span></li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="phys.qphy" style="display: none;" type="hidden" value="phys.qphy"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.qphy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physique Quantique [quant-ph]</span></li>
                                <li style="display : list-item;"><input id="phys.hist" style="display: none;" type="hidden" value="phys.hist"><label style="margin-bottom: 2px; margin-right: 5px;" for="phys.hist"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Articles anciens</span></li>
                            </ul>
                        </li>
                        <li style="display : list-item;"><input id="scco" style="display: none;" type="checkbox" value="scco"><label style="margin-bottom: 2px; margin-right: 5px;" for="scco"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
						<span class="collapsible" style="cursor: pointer;">Sciences cognitives</span>
                            <ul class="content">
                                <li style="display : list-item;"><input id="scco.comp" style="display: none;" type="hidden" value="scco.comp"><label style="margin-bottom: 2px; margin-right: 5px;" for="scco.comp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Informatique</span></li>
                                <li style="display : list-item;"><input id="scco.ling" style="display: none;" type="hidden" value="scco.ling"><label style="margin-bottom: 2px; margin-right: 5px;" for="scco.ling"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Linguistique</span></li>
                                <li style="display : list-item;"><input id="scco.neur" style="display: none;" type="hidden" value="scco.neur"><label style="margin-bottom: 2px; margin-right: 5px;" for="scco.neur"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Neurosciences</span></li>
                                <li style="display : list-item;"><input id="scco.psyc" style="display: none;" type="hidden" value="scco.psyc"><label style="margin-bottom: 2px; margin-right: 5px;" for="scco.psyc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Psychologie</span></li>
                            </ul>
                        </li>
                        <li style="display : list-item;"><input id="sde" style="display: none;" type="checkbox" value="sde"><label style="margin-bottom: 2px; margin-right: 5px;" for="sde"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
							<span class="collapsible" style="cursor: pointer;">Sciences de l'environnement</span>
                            <ul class="content">
                                <li style="display : list-item;"><input id="sde.be" style="display: none;" type="hidden" value="sde.be"><label style="margin-bottom: 2px; margin-right: 5px;" for="sde.be"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biodiversité et Ecologie</span></li>
                                <li style="display : list-item;"><input id="sde.es" style="display: none;" type="hidden" value="sde.es"><label style="margin-bottom: 2px; margin-right: 5px;" for="sde.es"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Environnement et Société</span></li>
                                <li style="display : list-item;"><input id="sde.mcg" style="display: none;" type="hidden" value="sde.mcg"><label style="margin-bottom: 2px; margin-right: 5px;" for="sde.mcg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Milieux et Changements globaux</span></li>
                                <li style="display : list-item;"><input id="sde.ie" style="display: none;" type="hidden" value="sde.ie"><label style="margin-bottom: 2px; margin-right: 5px;" for="sde.ie"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ingénierie de l'environnement</span></li>
                            </ul>
                        </li>
                        <li style="display : list-item;"><input id="sdu" style="display: none;" type="checkbox" value="sdu"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label>
						<span class="collapsible" style="cursor: pointer;">Planète et Univers [physics]</span>
                            <ul class="content">
                                <li style="display : list-item;"><input id="sdu.astr" style="display: none;" type="checkbox" value="sdu.astr"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Astrophysique [astro-ph]</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="sdu.astr.co" style="display: none;" type="hidden" value="sdu.astr.co"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.co"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cosmologie et astrophysique extra-galactique [astro-ph.CO]</span></li>
                                        <li style="display : list-item;"><input id="sdu.astr.ep" style="display: none;" type="hidden" value="sdu.astr.ep"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.ep"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Planétologie et astrophysique de la terre [astro-ph.EP]</span></li>
                                        <li style="display : list-item;"><input id="sdu.astr.ga" style="display: none;" type="hidden" value="sdu.astr.ga"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.ga"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Astrophysique galactique [astro-ph.GA]</span></li>
                                        <li style="display : list-item;"><input id="sdu.astr.he" style="display: none;" type="hidden" value="sdu.astr.he"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.he"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Phénomènes cosmiques de haute energie [astro-ph.HE]</span></li>
                                        <li style="display : list-item;"><input id="sdu.astr.im" style="display: none;" type="hidden" value="sdu.astr.im"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.im"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Instrumentation et méthodes pour l'astrophysique [astro-ph.IM]</span></li>
                                        <li style="display : list-item;"><input id="sdu.astr.sr" style="display: none;" type="hidden" value="sdu.astr.sr"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.astr.sr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Astrophysique stellaire et solaire [astro-ph.SR]</span></li></ul></li>
                                        <li style="display : list-item;"><input id="sdu.envi" style="display: none;" type="hidden" value="sdu.envi"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.envi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Interfaces continentales, environnement</span></li>
                                        <li style="display : list-item;"><input id="sdu.ocean" style="display: none;" type="hidden" value="sdu.ocean"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.ocean"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Océan, Atmosphère</span></li>
                                        <li style="display : list-item;"><input id="sdu.other" style="display: none;" type="hidden" value="sdu.other"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.other"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre</span></li>
                                        <li style="display : list-item;"><input id="sdu.stu" style="display: none;" type="checkbox" value="sdu.stu"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences de la Terre</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdu.stu.ag" style="display: none;" type="hidden" value="sdu.stu.ag"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.ag"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géologie appliquée</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.cl" style="display: none;" type="hidden" value="sdu.stu.cl"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.cl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Climatologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.gc" style="display: none;" type="hidden" value="sdu.stu.gc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.gc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géochimie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.gl" style="display: none;" type="hidden" value="sdu.stu.gl"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.gl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Glaciologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.gm" style="display: none;" type="hidden" value="sdu.stu.gm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.gm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géomorphologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.gp" style="display: none;" type="hidden" value="sdu.stu.gp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.gp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géophysique [physics.geo-ph]</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.hy" style="display: none;" type="hidden" value="sdu.stu.hy"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.hy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Hydrologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.me" style="display: none;" type="hidden" value="sdu.stu.me"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.me"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Météorologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.mi" style="display: none;" type="hidden" value="sdu.stu.mi"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.mi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Minéralogie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.oc" style="display: none;" type="hidden" value="sdu.stu.oc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.oc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Océanographie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.pe" style="display: none;" type="hidden" value="sdu.stu.pe"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.pe"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pétrographie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.pg" style="display: none;" type="hidden" value="sdu.stu.pg"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.pg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Paléontologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.pl" style="display: none;" type="hidden" value="sdu.stu.pl"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.pl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Planétologie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.st" style="display: none;" type="hidden" value="sdu.stu.st"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.st"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Stratigraphie</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.te" style="display: none;" type="hidden" value="sdu.stu.te"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.te"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Tectonique</span></li>
                                                <li style="display : list-item;"><input id="sdu.stu.vo" style="display: none;" type="hidden" value="sdu.stu.vo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdu.stu.vo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Volcanologie</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="sdv" style="display: none;" type="checkbox" value="sdv"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences du Vivant [q-bio]</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="sdv.aen" style="display: none;" type="hidden" value="sdv.aen"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.aen"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Alimentation et Nutrition</span></li>
                                        <li style="display : list-item;"><input id="sdv.ba" style="display: none;" type="checkbox" value="sdv.ba"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ba"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biologie animale</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.ba.mvsa" style="display: none;" type="hidden" value="sdv.ba.mvsa"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ba.mvsa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Médecine vétérinaire et santé animal</span></li>
                                                <li style="display : list-item;"><input id="sdv.ba.zi" style="display: none;" type="hidden" value="sdv.ba.zi"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ba.zi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Zoologie des invertébrés</span></li>
                                                <li style="display : list-item;"><input id="sdv.ba.zv" style="display: none;" type="hidden" value="sdv.ba.zv"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ba.zv"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Zoologie des vertébrés</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bbm" style="display: none;" type="checkbox" value="sdv.bbm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biochimie, Biologie Moléculaire</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.bbm.bc" style="display: none;" type="hidden" value="sdv.bbm.bc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.bc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biochimie [q-bio.BM]</span></li>
                                                <li style="display : list-item;"><input id="sdv.bbm.bm" style="display: none;" type="hidden" value="sdv.bbm.bm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.bm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biologie moléculaire</span></li>
                                                <li style="display : list-item;"><input id="sdv.bbm.bp" style="display: none;" type="hidden" value="sdv.bbm.bp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.bp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biophysique</span></li>
                                                <li style="display : list-item;"><input id="sdv.bbm.bs" style="display: none;" type="hidden" value="sdv.bbm.bs"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.bs"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biologie structurale [q-bio.BM]</span></li>
                                                <li style="display : list-item;"><input id="sdv.bbm.gtp" style="display: none;" type="hidden" value="sdv.bbm.gtp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.gtp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génomique, Transcriptomique et Protéomique [q-bio.GN]</span></li>
                                                <li style="display : list-item;"><input id="sdv.bbm.mn" style="display: none;" type="hidden" value="sdv.bbm.mn"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bbm.mn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Réseaux moléculaires [q-bio.MN]</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bc" style="display: none;" type="checkbox" value="sdv.bc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bc"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biologie cellulaire</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.bc.bc" style="display: none;" type="hidden" value="sdv.bc.bc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bc.bc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Organisation et fonctions cellulaires [q-bio.SC]</span></li>
                                                <li style="display : list-item;"><input id="sdv.bc.ic" style="display: none;" type="hidden" value="sdv.bc.ic"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bc.ic"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Interactions cellulaires [q-bio.CB]</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bdd" style="display: none;" type="checkbox" value="sdv.bdd"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdd"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biologie du développement</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.bdd.eo" style="display: none;" type="hidden" value="sdv.bdd.eo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdd.eo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Embryologie et organogenèse</span></li>
                                                <li style="display : list-item;"><input id="sdv.bdd.gam" style="display: none;" type="hidden" value="sdv.bdd.gam"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdd.gam"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gamétogenèse</span></li>
                                                <li style="display : list-item;"><input id="sdv.bdd.mor" style="display: none;" type="hidden" value="sdv.bdd.mor"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdd.mor"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Morphogenèse</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bdlr" style="display: none;" type="checkbox" value="sdv.bdlr"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdlr"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biologie de la reproduction</span>
                                            <ul class="content>
                                                <li style="display : list-item;"><input id="sdv.bdlr.ra" style="display: none;" type="hidden" value="sdv.bdlr.ra"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdlr.ra"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Reproduction asexuée</span></li>
                                                <li style="display : list-item;"><input id="sdv.bdlr.rs" style="display: none;" type="hidden" value="sdv.bdlr.rs"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bdlr.rs"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Reproduction sexuée</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bibs" style="display: none;" type="hidden" value="sdv.bibs"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bibs"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Bio-Informatique, Biologie Systémique [q-bio.QM]</span></li>
                                        <li style="display : list-item;"><input id="sdv.bid" style="display: none;" type="checkbox" value="sdv.bid"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bid"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biodiversité</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.bid.evo" style="display: none;" type="hidden" value="sdv.bid.evo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bid.evo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Evolution [q-bio.PE]</span></li>
                                                <li style="display : list-item;"><input id="sdv.bid.spt" style="display: none;" type="hidden" value="sdv.bid.spt"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bid.spt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Systématique, phylogénie et taxonomie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.bio" style="display: none;" type="hidden" value="sdv.bio"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biotechnologies</span></li>
                                        <li style="display : list-item;"><input id="sdv.bv" style="display: none;" type="checkbox" value="sdv.bv"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bv"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Biologie végétale</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.bv.ap" style="display: none;" type="hidden" value="sdv.bv.ap"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bv.ap"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Amélioration des plantes</span></li>
                                                <li style="display : list-item;"><input id="sdv.bv.bot" style="display: none;" type="hidden" value="sdv.bv.bot"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bv.bot"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Botanique</span></li>
                                                <li style="display : list-item;"><input id="sdv.bv.pep" style="display: none;" type="hidden" value="sdv.bv.pep"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.bv.pep"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Phytopathologie et phytopharmacie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.can" style="display: none;" type="hidden" value="sdv.can"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.can"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cancer</span></li>
                                        <li style="display : list-item;"><input id="sdv.ee" style="display: none;" type="checkbox" value="sdv.ee"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ee"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Ecologie, Environnement</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.ee.bio" style="display: none;" type="hidden" value="sdv.ee.bio"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ee.bio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Bioclimatologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.ee.eco" style="display: none;" type="hidden" value="sdv.ee.eco"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ee.eco"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ecosystèmes</span></li>
                                                <li style="display : list-item;"><input id="sdv.ee.ieo" style="display: none;" type="hidden" value="sdv.ee.ieo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ee.ieo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Interactions entre organismes</span></li>
                                                <li style="display : list-item;"><input id="sdv.ee.sant" style="display: none;" type="hidden" value="sdv.ee.sant"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ee.sant"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Santé</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.eth" style="display: none;" type="hidden" value="sdv.eth"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.eth"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ethique</span></li>
                                        <li style="display : list-item;"><input id="sdv.gen" style="display: none;" type="checkbox" value="sdv.gen"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.gen"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Génétique</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.gen.ga" style="display: none;" type="hidden" value="sdv.gen.ga"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.gen.ga"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génétique animale</span></li>
                                                <li style="display : list-item;"><input id="sdv.gen.gh" style="display: none;" type="hidden" value="sdv.gen.gh"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.gen.gh"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génétique humaine</span></li>
                                                <li style="display : list-item;"><input id="sdv.gen.gpl" style="display: none;" type="hidden" value="sdv.gen.gpl"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.gen.gpl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génétique des plantes</span></li>
                                                <li style="display : list-item;"><input id="sdv.gen.gpo" style="display: none;" type="hidden" value="sdv.gen.gpo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.gen.gpo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génétique des populations [q-bio.PE]</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.ib" style="display: none;" type="checkbox" value="sdv.ib"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ib"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Ingénierie biomédicale</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.ib.bio" style="display: none;" type="hidden" value="sdv.ib.bio"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ib.bio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biomatériaux</span></li>
                                                <li style="display : list-item;"><input id="sdv.ib.ima" style="display: none;" type="hidden" value="sdv.ib.ima"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ib.ima"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Imagerie</span></li>
                                                <li style="display : list-item;"><input id="sdv.ib.mn" style="display: none;" type="hidden" value="sdv.ib.mn"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ib.mn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Médecine nucléaire</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.ida" style="display: none;" type="hidden" value="sdv.ida"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ida"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ingénierie des aliments</span></li>
                                        <li style="display : list-item;"><input id="sdv.imm" style="display: none;" type="checkbox" value="sdv.imm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Immunologie</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.imm.all" style="display: none;" type="hidden" value="sdv.imm.all"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm.all"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Allergologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.imm.ia" style="display: none;" type="hidden" value="sdv.imm.ia"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm.ia"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Immunité adaptative</span></li>
                                                <li style="display : list-item;"><input id="sdv.imm.ii" style="display: none;" type="hidden" value="sdv.imm.ii"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm.ii"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Immunité innée</span></li>
                                                <li style="display : list-item;"><input id="sdv.imm.imm" style="display: none;" type="hidden" value="sdv.imm.imm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm.imm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Immunothérapie</span></li>
                                                <li style="display : list-item;"><input id="sdv.imm.vac" style="display: none;" type="hidden" value="sdv.imm.vac"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.imm.vac"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Vaccinologie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.mhep" style="display: none;" type="checkbox" value="sdv.mhep"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Médecine humaine et pathologie</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.mhep.aha" style="display: none;" type="hidden" value="sdv.mhep.aha"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.aha"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Anatomie, Histologie, Anatomopathologie [q-bio.TO]</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.chi" style="display: none;" type="hidden" value="sdv.mhep.chi"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.chi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Chirurgie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.csc" style="display: none;" type="hidden" value="sdv.mhep.csc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.csc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Cardiologie et système cardiovasculaire</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.derm" style="display: none;" type="hidden" value="sdv.mhep.derm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.derm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Dermatologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.em" style="display: none;" type="hidden" value="sdv.mhep.em"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.em"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Endocrinologie et métabolisme</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.geg" style="display: none;" type="hidden" value="sdv.mhep.geg"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.geg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gériatrie et gérontologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.geo" style="display: none;" type="hidden" value="sdv.mhep.geo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.geo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gynécologie et obstétrique</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.heg" style="display: none;" type="hidden" value="sdv.mhep.heg"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.heg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Hépatologie et Gastroentérologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.hem" style="display: none;" type="hidden" value="sdv.mhep.hem"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.hem"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Hématologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.me" style="display: none;" type="hidden" value="sdv.mhep.me"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.me"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Maladies émergentes</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.mi" style="display: none;" type="hidden" value="sdv.mhep.mi"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.mi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Maladies infectieuses</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.os" style="display: none;" type="hidden" value="sdv.mhep.os"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.os"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Organes des sens</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.ped" style="display: none;" type="hidden" value="sdv.mhep.ped"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.ped"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pédiatrie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.phy" style="display: none;" type="hidden" value="sdv.mhep.phy"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.phy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Physiologie [q-bio.TO]</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.psm" style="display: none;" type="hidden" value="sdv.mhep.psm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.psm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Psychiatrie et santé mentale</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.psr" style="display: none;" type="hidden" value="sdv.mhep.psr"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.psr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pneumologie et système respiratoire</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.rsoa" style="display: none;" type="hidden" value="sdv.mhep.rsoa"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.rsoa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Rhumatologie et système ostéo-articulaire</span></li>
                                                <li style="display : list-item;"><input id="sdv.mhep.un" style="display: none;" type="hidden" value="sdv.mhep.un"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mhep.un"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Urologie et Néphrologie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.mp" style="display: none;" type="checkbox" value="sdv.mp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Microbiologie et Parasitologie</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.mp.bac" style="display: none;" type="hidden" value="sdv.mp.bac"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp.bac"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Bactériologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mp.myc" style="display: none;" type="hidden" value="sdv.mp.myc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp.myc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mycologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mp.par" style="display: none;" type="hidden" value="sdv.mp.par"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp.par"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Parasitologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mp.pro" style="display: none;" type="hidden" value="sdv.mp.pro"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp.pro"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Protistologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.mp.vir" style="display: none;" type="hidden" value="sdv.mp.vir"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.mp.vir"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Virologie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.neu" style="display: none;" type="checkbox" value="sdv.neu"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.neu"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Neurosciences [q-bio.NC]</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="sdv.neu.nb" style="display: none;" type="hidden" value="sdv.neu.nb"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.neu.nb"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Neurobiologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.neu.pc" style="display: none;" type="hidden" value="sdv.neu.pc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.neu.pc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Psychologie et comportements</span></li>
                                                <li style="display : list-item;"><input id="sdv.neu.sc" style="display: none;" type="hidden" value="sdv.neu.sc"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.neu.sc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sciences cognitives</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.ot" style="display: none;" type="hidden" value="sdv.ot"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.ot"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre [q-bio.OT]</span></li>
                                        <li style="display : list-item;"><input id="sdv.sa" style="display: none;" type="checkbox" value="sdv.sa"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences agricoles</span>
                                            <ul class="content">    
                                                <li style="display : list-item;"><input id="sdv.sa.aep" style="display: none;" type="hidden" value="sdv.sa.aep"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.aep"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Agriculture, économie et politique</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.agro" style="display: none;" type="hidden" value="sdv.sa.agro"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.agro"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Agronomie</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.hort" style="display: none;" type="hidden" value="sdv.sa.hort"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.hort"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Horticulture</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.sds" style="display: none;" type="hidden" value="sdv.sa.sds"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.sds"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Science des sols</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.sf" style="display: none;" type="hidden" value="sdv.sa.sf"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.sf"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sylviculture, foresterie</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.spa" style="display: none;" type="hidden" value="sdv.sa.spa"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.spa"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Science des productions animales</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.sta" style="display: none;" type="hidden" value="sdv.sa.sta"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.sta"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sciences et techniques de l'agriculture</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.stp" style="display: none;" type="hidden" value="sdv.sa.stp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.stp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sciences et techniques des pêches</span></li>
                                                <li style="display : list-item;"><input id="sdv.sa.zoo" style="display: none;" type="hidden" value="sdv.sa.zoo"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sa.zoo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Zootechnie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.sp" style="display: none;" type="checkbox" value="sdv.sp"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sp"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences pharmaceutiques</span>
                                            <ul class="content">    
                                                <li style="display : list-item;"><input id="sdv.sp.med" style="display: none;" type="hidden" value="sdv.sp.med"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sp.med"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Médicaments</span></li>
                                                <li style="display : list-item;"><input id="sdv.sp.pg" style="display: none;" type="hidden" value="sdv.sp.pg"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sp.pg"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pharmacie galénique</span></li>
                                                <li style="display : list-item;"><input id="sdv.sp.pharma" style="display: none;" type="hidden" value="sdv.sp.pharma"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.sp.pharma"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pharmacologie</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="sdv.spee" style="display: none;" type="hidden" value="sdv.spee"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.spee"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Santé publique et épidémiologie</span></li>
                                        <li style="display : list-item;"><input id="sdv.tox" style="display: none;" type="checkbox" value="sdv.tox"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.tox"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Toxicologie</span>
                                            <ul class="content">    
                                                <li style="display : list-item;"><input id="sdv.tox.eco" style="display: none;" type="hidden" value="sdv.tox.eco"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.tox.eco"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Ecotoxicologie</span></li>
                                                <li style="display : list-item;"><input id="sdv.tox.tca" style="display: none;" type="hidden" value="sdv.tox.tca"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.tox.tca"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Toxicologie et chaîne alimentaire</span></li>
                                                <li style="display : list-item;"><input id="sdv.tox.tvm" style="display: none;" type="hidden" value="sdv.tox.tvm"><label style="margin-bottom: 2px; margin-right: 5px;" for="sdv.tox.tvm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Toxicologie végétale et mycotoxicologie</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="shs" style="display: none;" type="checkbox" value="shs"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences de l'Homme et Société</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="shs.anthro-bio" style="display: none;" type="hidden" value="shs.anthro-bio"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.anthro-bio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Anthropologie biologique</span></li>
                                        <li style="display : list-item;"><input id="shs.anthro-se" style="display: none;" type="hidden" value="shs.anthro-se"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.anthro-se"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Anthropologie sociale et ethnologie</span></li>
                                        <li style="display : list-item;"><input id="shs.archeo" style="display: none;" type="hidden" value="shs.archeo"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.archeo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Archéologie et Préhistoire</span></li>
                                        <li style="display : list-item;"><input id="shs.archi" style="display: none;" type="hidden" value="shs.archi"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.archi"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Architecture, aménagement de l'espace</span></li>
                                        <li style="display : list-item;"><input id="shs.art" style="display: none;" type="hidden" value="shs.art"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.art"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Art et histoire de l'art</span></li>
                                        <li style="display : list-item;"><input id="shs.class" style="display: none;" type="hidden" value="shs.class"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.class"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Etudes classiques</span></li>
                                        <li style="display : list-item;"><input id="shs.demo" style="display: none;" type="hidden" value="shs.demo"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.demo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Démographie</span></li>
                                        <li style="display : list-item;"><input id="shs.droit" style="display: none;" type="hidden" value="shs.droit"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.droit"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Droit</span></li>
                                        <li style="display : list-item;"><input id="shs.eco" style="display: none;" type="hidden" value="shs.eco"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.eco"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Economies et finances</span></li>
                                        <li style="display : list-item;"><input id="shs.edu" style="display: none;" type="hidden" value="shs.edu"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.edu"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Education</span></li>
                                        <li style="display : list-item;"><input id="shs.envir" style="display: none;" type="hidden" value="shs.envir"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.envir"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Etudes de l'environnement</span></li>
                                        <li style="display : list-item;"><input id="shs.genre" style="display: none;" type="hidden" value="shs.genre"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.genre"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Etudes sur le genre</span></li>
                                        <li style="display : list-item;"><input id="shs.geo" style="display: none;" type="hidden" value="shs.geo"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.geo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géographie</span></li>
                                        <li style="display : list-item;"><input id="shs.gestion" style="display: none;" type="hidden" value="shs.gestion"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.gestion"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gestion et management</span></li>
                                        <li style="display : list-item;"><input id="shs.hisphilso" style="display: none;" type="hidden" value="shs.hisphilso"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.hisphilso"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Histoire, Philosophie et Sociologie des sciences</span></li>
                                        <li style="display : list-item;"><input id="shs.hist" style="display: none;" type="hidden" value="shs.hist"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.hist"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Histoire</span></li>
                                        <li style="display : list-item;"><input id="shs.info" style="display: none;" type="hidden" value="shs.info"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.info"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sciences de l'information et de la communication</span></li>
                                        <li style="display : list-item;"><input id="shs.langue" style="display: none;" type="hidden" value="shs.langue"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.langue"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Linguistique</span></li>
                                        <li style="display : list-item;"><input id="shs.litt" style="display: none;" type="hidden" value="shs.litt"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.litt"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Littératures</span></li>
                                        <li style="display : list-item;"><input id="shs.museo" style="display: none;" type="hidden" value="shs.museo"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.museo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Héritage culturel et muséologie</span></li>
                                        <li style="display : list-item;"><input id="shs.musiq" style="display: none;" type="hidden" value="shs.musiq"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.musiq"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Musique, musicologie et arts de la scène</span></li>
                                        <li style="display : list-item;"><input id="shs.phil" style="display: none;" type="hidden" value="shs.phil"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.phil"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Philosophie</span></li>
                                        <li style="display : list-item;"><input id="shs.psy" style="display: none;" type="hidden" value="shs.psy"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.psy"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Psychologie</span></li>
                                        <li style="display : list-item;"><input id="shs.relig" style="display: none;" type="hidden" value="shs.relig"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.relig"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Religions</span></li>
                                        <li style="display : list-item;"><input id="shs.scipo" style="display: none;" type="hidden" value="shs.scipo"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.scipo"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Science politique</span></li>
                                        <li style="display : list-item;"><input id="shs.socio" style="display: none;" type="hidden" value="shs.socio"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.socio"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Sociologie</span></li>
                                        <li style="display : list-item;"><input id="shs.stat" style="display: none;" type="hidden" value="shs.stat"><label style="margin-bottom: 2px; margin-right: 5px;" for="shs.stat"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Méthodes et statistiques</span></li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="spi" style="display: none;" type="checkbox" value="spi"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Sciences de l'ingénieur [physics]</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="spi.acou" style="display: none;" type="hidden" value="spi.acou"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.acou"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Acoustique [physics.class-ph]</span></li>
                                        <li style="display : list-item;"><input id="spi.auto" style="display: none;" type="hidden" value="spi.auto"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.auto"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Automatique / Robotique</span></li>
                                        <li style="display : list-item;"><input id="spi.elec" style="display: none;" type="hidden" value="spi.elec"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.elec"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Electromagnétisme</span></li>
                                        <li style="display : list-item;"><input id="spi.fluid" style="display: none;" type="hidden" value="spi.fluid"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.fluid"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Milieux fluides et réactifs</span></li>
                                        <li style="display : list-item;"><input id="spi.gproc" style="display: none;" type="hidden" value="spi.gproc"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gproc"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie des procédés</span></li>
                                        <li style="display : list-item;"><input id="spi.mat" style="display: none;" type="hidden" value="spi.mat"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.mat"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matériaux</span></li>
                                        <li style="display : list-item;"><input id="spi.meca" style="display: none;" type="checkbox" value="spi.meca"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Mécanique [physics.med-ph]</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="spi.meca.biom" style="display: none;" type="hidden" value="spi.meca.biom"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.biom"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Biomécanique [physics.med-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.geme" style="display: none;" type="hidden" value="spi.meca.geme"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.geme"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie mécanique [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.mefl" style="display: none;" type="hidden" value="spi.meca.mefl"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.mefl"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des fluides [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.mema" style="display: none;" type="hidden" value="spi.meca.mema"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.mema"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des matériaux [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.msmeca" style="display: none;" type="hidden" value="spi.meca.msmeca"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.msmeca"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matériaux et structures en mécanique [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.solid" style="display: none;" type="hidden" value="spi.meca.solid"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.solid"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des solides [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.stru" style="display: none;" type="hidden" value="spi.meca.stru"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.stru"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Mécanique des structures [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.ther" style="display: none;" type="hidden" value="spi.meca.ther"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.ther"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Thermique [physics.class-ph]</span></li>
                                                <li style="display : list-item;"><input id="spi.meca.vibr" style="display: none;" type="hidden" value="spi.meca.vibr"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.meca.vibr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Vibrations [physics.class-ph]</span></li>
                                            </ul>
                                        </li>
                                        <li style="display : list-item;"><input id="spi.nano" style="display: none;" type="hidden" value="spi.nano"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.nano"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Micro et nanotechnologies/Microélectronique</span></li>
                                        <li style="display : list-item;"><input id="spi.nrj" style="display: none;" type="hidden" value="spi.nrj"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.nrj"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Energie électrique</span></li>
                                        <li style="display : list-item;"><input id="spi.opti" style="display: none;" type="hidden" value="spi.opti"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.opti"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Optique / photonique</span></li>
                                        <li style="display : list-item;"><input id="spi.other" style="display: none;" type="hidden" value="spi.other"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.other"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autre</span></li>
                                        <li style="display : list-item;"><input id="spi.plasma" style="display: none;" type="hidden" value="spi.plasma"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.plasma"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Plasmas</span></li>
                                        <li style="display : list-item;"><input id="spi.signal" style="display: none;" type="hidden" value="spi.signal"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.signal"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Traitement du signal et de l'image [eess.SP]</span></li>
                                        <li style="display : list-item;"><input id="spi.tron" style="display: none;" type="hidden" value="spi.tron"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.tron"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Electronique</span></li>
                                        <li style="display : list-item;"><input id="spi.gciv" style="display: none;" type="checkbox" value="spi.gciv"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Génie civil</span>
                                            <ul class="content">
                                                <li style="display : list-item;"><input id="spi.gciv.ch" style="display: none;" type="hidden" value="spi.gciv.ch"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.ch"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Construction hydraulique</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.cd" style="display: none;" type="hidden" value="spi.gciv.cd"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.cd"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Construction durable</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.dv" style="display: none;" type="hidden" value="spi.gciv.dv"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.dv"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Dynamique, vibrations</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.ec" style="display: none;" type="hidden" value="spi.gciv.ec"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.ec"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Eco-conception</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.gcn" style="display: none;" type="hidden" value="spi.gciv.gcn"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.gcn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Génie civil nucléaire</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.geotech" style="display: none;" type="hidden" value="spi.gciv.geotech"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.geotech"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Géotechnique</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.it" style="display: none;" type="hidden" value="spi.gciv.it"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.it"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Infrastructures de transport</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.mat" style="display: none;" type="hidden" value="spi.gciv.mat"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.mat"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Matériaux composites et construction</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.rhea" style="display: none;" type="hidden" value="spi.gciv.rhea"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.rhea"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Réhabilitation</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.risq" style="display: none;" type="hidden" value="spi.gciv.risq"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.risq"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Risques</span></li>
                                                <li style="display : list-item;"><input id="spi.gciv.struct" style="display: none;" type="hidden" value="spi.gciv.struct"><label style="margin-bottom: 2px; margin-right: 5px;" for="spi.gciv.struct"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Structures</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="stat" style="display: none;" type="checkbox" value="stat"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Statistiques [stat]</span>
                                    <ul class="content">
                                        <li style="display : list-item;"><input id="stat.ot" style="display: none;" type="hidden" value="stat.ot"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.ot"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Autres [stat.ML]</span></li>
                                        <li style="display : list-item;"><input id="stat.ap" style="display: none;" type="hidden" value="stat.ap"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.ap"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Applications [stat.AP]</span></li>
                                        <li style="display : list-item;"><input id="stat.co" style="display: none;" type="hidden" value="stat.co"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.co"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Calcul [stat.CO]</span></li>
                                        <li style="display : list-item;"><input id="stat.me" style="display: none;" type="hidden" value="stat.me"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.me"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Méthodologie [stat.ME]</span></li>
                                        <li style="display : list-item;"><input id="stat.th" style="display: none;" type="hidden" value="stat.th"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.th"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Théorie [stat.TH]</span></li>
                                        <li style="display : list-item;"><input id="stat.ml" style="display: none;" type="hidden" value="stat.ml"><label style="margin-bottom: 2px; margin-right: 5px;" for="stat.ml"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Machine Learning [stat.ML]</span></li>
                                    </ul>
                                </li>
                                <li style="display : list-item;"><input id="qfin" style="display: none;" type="checkbox" value="qfin"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin"><span class="caret" style="margin-top: 0px;"></span><i class="glyphicon glyphicon-folder-close"></i></label><span class="collapsible" style="cursor: pointer;">Économie et finance quantitative [q-fin]</span>
                                    <ul class="content">    
                                        <li style="display : list-item;"><input id="qfin.cp" style="display: none;" type="hidden" value="qfin.cp"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.cp"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Finance quantitative [q-fin.CP]</span></li>
                                        <li style="display : list-item;"><input id="qfin.gn" style="display: none;" type="hidden" value="qfin.gn"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.gn"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Finance [q-fin.GN]</span></li>
                                        <li style="display : list-item;"><input id="qfin.pm" style="display: none;" type="hidden" value="qfin.pm"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.pm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gestion de portefeuilles [q-fin.PM]</span></li>
                                        <li style="display : list-item;"><input id="qfin.pr" style="display: none;" type="hidden" value="qfin.pr"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.pr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Pricing [q-fin.PR]</span></li>
                                        <li style="display : list-item;"><input id="qfin.rm" style="display: none;" type="hidden" value="qfin.rm"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.rm"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Gestion des risques [q-fin.RM]</span></li>
                                        <li style="display : list-item;"><input id="qfin.st" style="display: none;" type="hidden" value="qfin.st"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.st"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Econométrie de la finance [q-fin.ST]</span></li>
                                        <li style="display : list-item;"><input id="qfin.tr" style="display: none;" type="hidden" value="qfin.tr"><label style="margin-bottom: 2px; margin-right: 5px;" for="qfin.tr"><i class="glyphicon glyphicon-file" style="margin-left: 13px; cursor: default;"></i></label><span class="libelle click" style="cursor: pointer;">Microstructure des marchés [q-fin.TR]</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>`
                </li>
                </ul>
            </div>
        </div>
    </div>

<!-- Resume -->
    <div class="form-group row  meta-complete" id="abstract-element" style="display: none;">
        <label class="col-md-3 control-label optional" for="abstract">Résumé</label>
        <div class="col-md-9">
            <span class="help-block">Vous pouvez renseigner le résumé en plusieurs langues : choisir la langue et cliquer sur + pour ajouter une nouvelle langue</span>
                <div class="textarea-group" style="margin-bottom : 10px;">
                    <textarea name="abstract[en]" class="meta-complete form-control input-sm" id="abstract" lang="en" style="border-bottom-right-radius: 0; " rows="9" cols="80" hasshiftvalue=""></textarea>
                        
                </div>
                <div class="textarea-group" style="margin-bottom : 10px;">
                    <textarea name="abstract[fr]" class="meta-complete form-control input-sm" id="abstract" lang="fr" style="border-bottom-right-radius: 0; " rows="9" cols="80" hasshiftvalue=""></textarea>
                        
                </div>
        </div>
    </div>

<!-- Langue document -->
    <div class="from-group row" id="language-element">
        <label class="col-md-3 control-label required" for="language">
            Langue du document
        </label>
        <div class="col-md-9">
            <select name="language" class="form-control input-sm" id="language">
                <option selected="selected" value="en">anglais</option>
                <option value="fr">français</option>
                <option value="de">allemand</option>
                <option value="it">italien</option>
                <option value="es">espagnol</option>
                <option value="ab">abkhaze</option>
                <option value="aa">afar</option>
                <option value="af">afrikaans</option>
                <option value="ak">akan</option>
                <option value="sq">albanais</option>
                <option value="am">amharique</option>
                <option value="ar">arabe</option>
                <option value="an">aragonais</option>
                <option value="hy">arménien</option>
                <option value="as">assamais</option>
                <option value="av">avar</option>
                <option value="ae">avestique</option>
                <option value="ay">aymara</option>
                <option value="az">azéri</option>
                <option value="ba">bachkir</option>
                <option value="bm">bambara</option>
                <option value="eu">basque</option>
                <option value="bn">bengali</option>
                <option value="bi">bichelamar</option>
                <option value="be">biélorusse</option>
                <option value="my">birman</option>
                <option value="bs">bosniaque</option>
                <option value="br">breton</option>
                <option value="bg">bulgare</option>
                <option value="ca">catalan</option>
                <option value="ch">chamorro</option>
                <option value="zh">chinois</option>
                <option value="si">cinghalais</option>
                <option value="ko">coréen</option>
                <option value="kw">cornique</option>
                <option value="co">corse</option>
                <option value="cr">cree</option>
                <option value="hr">croate</option>
                <option value="da">danois</option>
                <option value="dz">dzongkha</option>
                <option value="eo">espéranto</option>
                <option value="et">estonien</option>
                <option value="ee">éwé</option>
                <option value="fo">féroïen</option>
                <option value="fj">fidjien</option>
                <option value="fi">finnois</option>
                <option value="fy">frison occidental</option>
                <option value="gd">gaélique écossais</option>
                <option value="gl">galicien</option>
                <option value="cy">gallois</option>
                <option value="lg">ganda</option>
                <option value="ka">géorgien</option>
                <option value="el">grec</option>
                <option value="kl">groenlandais</option>
                <option value="gn">guarani</option>
                <option value="gu">gujarati</option>
                <option value="ht">haïtien</option>
                <option value="ha">haoussa</option>
                <option value="he">hébreu</option>
                <option value="hz">héréro</option>
                <option value="hi">hindi</option>
                <option value="ho">hiri motu</option>
                <option value="hu">hongrois</option>
                <option value="io">ido</option>
                <option value="ig">igbo</option>
                <option value="id">indonésien</option>
                <option value="ia">interlingua</option>
                <option value="ie">interlingue</option>
                <option value="iu">inuktitut</option>
                <option value="ik">inupiaq</option>
                <option value="ga">irlandais</option>
                <option value="is">islandais</option>
                <option value="ja">japonais</option>
                <option value="jv">javanais</option>
                <option value="kn">kannada</option>
                <option value="kr">kanouri</option>
                <option value="ks">kashmiri</option>
                <option value="kk">kazakh</option>
                <option value="km">khmer</option>
                <option value="ki">kikuyu</option>
                <option value="ky">kirghize</option>
                <option value="kv">komi</option>
                <option value="kg">kongo</option>
                <option value="kj">kuanyama</option>
                <option value="ku">kurde</option>
                <option value="lo">lao</option>
                <option value="la">latin</option>
                <option value="lv">letton</option>
                <option value="li">limbourgeois</option>
                <option value="ln">lingala</option>
                <option value="lt">lituanien</option>
                <option value="lu">luba-katanga</option>
                <option value="lb">luxembourgeois</option>
                <option value="mk">macédonien</option>
                <option value="ms">malais</option>
                <option value="ml">malayalam</option>
                <option value="dv">maldivien</option>
                <option value="mg">malgache</option>
                <option value="mt">maltais</option>
                <option value="gv">manx</option>
                <option value="mi">maori</option>
                <option value="mr">marathe</option>
                <option value="mh">marshall</option>
                <option value="mn">mongol</option>
                <option value="na">nauruan</option>
                <option value="nv">navaho</option>
                <option value="nd">ndébélé du Nord</option>
                <option value="nr">ndébélé du Sud</option>
                <option value="ng">ndonga</option>
                <option value="nl">néerlandais</option>
                <option value="ne">népalais</option>
                <option value="no">norvégien</option>
                <option value="nb">norvégien bokmål</option>
                <option value="nn">norvégien nynorsk</option>
                <option value="ny">nyanja</option>
                <option value="oc">occitan</option>
                <option value="oj">ojibwa</option>
                <option value="or">oriya</option>
                <option value="om">oromo</option>
                <option value="os">ossète</option>
                <option value="ug">ouïghour</option>
                <option value="ur">ourdou</option>
                <option value="uz">ouzbek</option>
                <option value="ps">pachto</option>
                <option value="pi">pali</option>
                <option value="pa">pendjabi</option>
                <option value="fa">persan</option>
                <option value="ff">peul</option>
                <option value="pl">polonais</option>
                <option value="pt">portugais</option>
                <option value="qu">quechua</option>
                <option value="rm">romanche</option>
                <option value="ro">roumain</option>
                <option value="rn">roundi</option>
                <option value="ru">russe</option>
                <option value="rw">rwanda</option>
                <option value="se">sami du Nord</option>
                <option value="sm">samoan</option>
                <option value="sg">sangho</option>
                <option value="sa">sanskrit</option>
                <option value="sc">sarde</option>
                <option value="sr">serbe</option>
                <option value="sh">serbo-croate</option>
                <option value="st">sesotho</option>
                <option value="sn">shona</option>
                <option value="sd">sindhi</option>
                <option value="cu">slavon d’église</option>
                <option value="sk">slovaque</option>
                <option value="sl">slovène</option>
                <option value="so">somali</option>
                <option value="su">soundanais</option>
                <option value="sv">suédois</option>
                <option value="sw">swahili</option>
                <option value="ss">swati</option>
                <option value="tg">tadjik</option>
                <option value="tl">tagalog</option>
                <option value="ty">tahitien</option>
                <option value="ta">tamoul</option>
                <option value="tt">tatar</option>
                <option value="cs">tchèque</option>
                <option value="ce">tchétchène</option>
                <option value="cv">tchouvache</option>
                <option value="te">télougou</option>
                <option value="th">thaï</option>
                <option value="bo">tibétain</option>
                <option value="ti">tigrigna</option>
                <option value="to">tonguien</option>
                <option value="ts">tsonga</option>
                <option value="tn">tswana</option>
                <option value="tr">turc</option>
                <option value="tk">turkmène</option>
                <option value="tw">twi</option>
                <option value="uk">ukrainien</option>
                <option value="ve">venda</option>
                <option value="vi">vietnamien</option>
                <option value="vo">volapuk</option>
                <option value="wa">wallon</option>
                <option value="wo">wolof</option>
                <option value="xh">xhosa</option>
                <option value="yi">yiddish</option>
                <option value="ii">yi de Sichuan</option>
                <option value="yo">yoruba</option>
                <option value="za">zhuang</option>
                <option value="zu">zoulou</option>
            </select>
        </div>
    </div>


    <div class="form-group row  meta-complete" id="researchdata-element" style="display: none;">
        <label class="col-md-3 control-label optional" for="researchdata">Données associées</label>
        <div class="col-md-9"><span class="help-block">Ajoutez l'identifiant <a href="http://www.doi.org/" target="_blank">DOI</a> fourni par l'entrepôt où vos données sont archivées.</span>
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="researchdata[]" class="meta-complete form-control input-sm" id="researchdata" style=" " type="text" value="" ><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick='fct5eb3d1b4d6f85(this, "researchdata");' type="button" data-original-title="Ajouter" data-toggle="tooltip" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span></div>
            </div>
        </div>
        <div class="form-group row  meta-complete" id="writingDate-id-element" style="display: none;">
            <label class="col-md-3 control-label optional" for="writingDate-id">Date de production/écriture</label>
            <div class="col-md-9"><span class="help-block">Renseignez la date au format AAAA-MM-JJ ou AAAA-MM ou AAAA</span>
                <div class="input-group"><span class="input-group-addon calendar-trigger" onclick="fct5eb3d1b4d8dbc('writingDate-id');" data-original-title="Cliquer ici pour ouvrir le calendrier" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-calendar"></i></span><input name="writingDate" class="form-control input-sm datepicker meta-complete" id="writingDate-id" onclick='$(this).datepicker("hide")' type="text" value="" relpublicdirpath="../../../public" pathdir="/sites/HalInstances/hal/production/vendor/ccsd/library/Ccsd/Form/Element" attr-changeyear="1" attr-changemonth="1" attr-trigger="1">
                </div>
            </div>
        </div>
        <div class="form-group row  meta-complete" id="licence-element" style="display: none;">
            <label class="col-md-3 control-label optional" for="licence">Licence</label>
            <div class="col-md-9">
                <select name="licence" class="meta-complete form-control input-sm" id="licence">
                    <option value=""></option>
                    <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                    <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                    <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                    <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                    <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                    <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                    <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                    <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                    <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                    <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                    <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
                </select>
            </div>
        </div>
    </div>

<!-- Mots clés -->
    <div class="form-group row  meta-complete" id="keyword-element" style="display: none;"><label class="col-md-3 control-label optional" for="keyword">Mots-clés</label>
        <div class="col-md-9"><span class="help-block"> Les caractères "," (virgule) et ";" (point-virgule) peuvent être utilisés pour séparer une liste de mots-clés.</span>
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="keyword[en][]" class="meta-complete form-control input-sm" id="keyword" lang="en" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
                <input name="keyword[fr][]" class="meta-complete form-control input-sm" id="keyword" lang="fr" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
            </div>
        </div>
    </div>
<!-- Mots clés image-->
<div class="form-group row  meta-complete" id="keyword-image-element" style="display: none;"><label class="col-md-3 control-label optional" for="keyword">Mots-clés</label>
    <div class="col-md-9"><span class="help-block"> Les caractères "," (virgule) et ";" (point-virgule) peuvent être utilisés pour séparer une liste de mots-clés.</span>
        <div class="input-group" style="margin-bottom : 10px;">
            <input name="keyword[en][]" class="meta-complete form-control input-sm" id="keyword" lang="en" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
            <input name="keyword[fr][]" class="meta-complete form-control input-sm" id="keyword" lang="fr" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
        </div>
    </div>
</div>
<!-- Mots clés hdr-->
<div class="form-group row  meta-complete" id="keywordHdr-element" style="display: none;"><label class="col-md-3 control-label optional" for="keyword">Mots-clés</label>
        <div class="col-md-9"><span class="help-block"> Les caractères "," (virgule) et ";" (point-virgule) peuvent être utilisés pour séparer une liste de mots-clés.</span>
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="keyword[en][]" class="meta-complete form-control input-sm" id="keyword" lang="en" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
                <input name="keyword[fr][]" class="meta-complete form-control input-sm" id="keyword" lang="fr" style=" " type="text" value="" hasshiftvalue="" data-keyword="1" attr-autocomplete="keyword_s">
            </div>
        </div>
    </div>

<!-- Licence -->
    <div class="form-group row  meta-complete" id="licence-element" style="display:none;"><label class="col-md-3 control-label optional" for="licence">Licence</label>
        <div class="col-md-9">
            <select name="licence" class="meta-complete form-control input-sm" id="licence">
                <option value=""></option>
                <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
            </select>
        </div>
    </div>
<!-- Licence image  -->
<div class="form-group row  meta-complete" id="licence-image-element" style="display:none;"><label class="col-md-3 control-label optional" for="licence">Licence</label>
        <div class="col-md-9">
            <select name="licence" class="meta-complete form-control input-sm" id="licence">
                <option value=""></option>
                <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
            </select>
        </div>
</div>
<!-- Licence son  -->
<div class="form-group row  meta-complete" id="licence-son" style="display:none;"><label class="col-md-3 control-label optional" for="licence">Licence</label>
        <div class="col-md-9">
            <select name="licence" class="meta-complete form-control input-sm" id="licence">
                <option value=""></option>
                <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
            </select>
        </div>
</div>
<!-- Licence carte  -->
<div class="form-group row  meta-complete" id="licence-carte" style="display:none;"><label class="col-md-3 control-label optional" for="licence">Licence</label>
        <div class="col-md-9">
            <select name="licence" class="meta-complete form-control input-sm" id="licence">
                <option value=""></option>
                <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
            </select>
        </div>
</div>
<!-- Licence logiciel  -->
<div class="form-group row  meta-complete" id="licence-logiciel" style="display:none;"><label class="col-md-3 control-label optional" for="licence">Licence</label>
        <div class="col-md-9">
            <select name="licence" class="meta-complete form-control input-sm" id="licence">
                <option value=""></option>
                <option value="http://creativecommons.org/licenses/by/">CC BY - Paternité</option>
                <option value="http://creativecommons.org/licenses/by-nc/">CC BY NC - Paternité - Pas d'utilisation commerciale</option>
                <option value="http://creativecommons.org/licenses/by-nd/">CC BY ND - Paternité - Pas de modifications</option>
                <option value="http://creativecommons.org/licenses/by-sa/">CC BY SA - Paternité - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/licenses/by-nc-nd/">CC BY NC ND - Paternité - Pas d'utilisation commerciale - Pas de modification</option>
                <option value="http://creativecommons.org/licenses/by-nc-sa/">CC BY NC SA - Paternité - Pas d'utilisation commerciale - Partage selon les Conditions Initiales</option>
                <option value="http://creativecommons.org/choose/mark/">NC - Marque du Domaine Public</option>
                <option value="http://creativecommons.org/publicdomain/zero/1.0/">CC0 - Transfert dans le Domaine Public</option>
                <option value="http://hal.archives-ouvertes.fr/licences/etalab/">ETALAB - Licence Ouverte</option>
                <option value="http://hal.archives-ouvertes.fr/licences/copyright/">Copyright (Tous droits réservés)</option>
                <option value="http://hal.archives-ouvertes.fr/licences/publicDomain/">Domaine public</option>
            </select>
        </div>
</div>
<!-- type image -->
<div class="form-group row " id="imageType-element" style="display: none;">
    <label class="col-md-3 control-label required" for="imageType">Type<span class="icon-required">  *</span></label>
        <div class="col-md-9">
            <select name="imageType" class="form-control input-sm" id="imageType">
                <option selected="selected" value="1">Photographie</option>
                <option value="2">Dessin</option>
                <option value="3">Carte</option>
                <option value="4">Illustration</option>
                <option value="5">Gravure</option>
                <option value="6">Plan</option>
                <option value="8">Images de synthèse</option>
            </select>
        </div>
</div>
<!-- Nom revue -->
<div class="form-group row meta-complete" id="journal-element" style="display: none;">
    <label class="col-md-3 control-label required" for="journal">Nom de la revue</label>
    <div class="col-md-9">
        <input name="journal" class="form-control input-sm" id="journal" type="text" value="" >
    </div>
</div>
<!-- titre ouvrage -->
<div class="form-group row " id="bookTitle-element" style="display: none;">
        <label class="col-md-3 control-label required" for="bookTitle">Titre de l'ouvrage<span class="icon-required">  *</span></label>
            <div class="col-md-9">
                <textarea name="bookTitle" class="form-control input-sm" id="bookTitle" rows="2" cols="80"></textarea>
            </div>
    </div>
<!-- Date pub article -->
    <div class="form-group row meta-complete" id="date-id-element"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de publication</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- Date enregistrment video -->
<div class="form-group row meta-complete " id="date-enregistrement"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date d'enregistrement</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
</div>
<!-- Date enregistrment son -->
<div class="form-group row meta-complete" id="date-enregistrement-son"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date d'enregistrement</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
</div>
<!-- Date creation carte -->
<div class="form-group row meta-complete" id="date-creation"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de création</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
</div>
<!-- Nom revue autre publication -->
    <div class="form-group row " id="journal-autre-pub" style="display: none;">
        <label class="col-md-3 control-label required" for="journal">Nom de la revue</label>
        <div class="col-md-9">
            <input name="journal" class="form-control input-sm" id="journal" type="text" value="" >
        </div>
    </div>
<!-- titre ouvrage autre pub-->
<div class="form-group row " id="bookTitle-autre-pub" style="display: none;">
        <label class="col-md-3 control-label required" for="bookTitle">Titre de l'ouvrage<span class="icon-required">  *</span></label>
            <div class="col-md-9">
                <textarea name="bookTitle" class="form-control input-sm" id="bookTitle" rows="2" cols="80"></textarea>
            </div>
    </div>
<!-- Date pub autre pub -->
    <div class="form-group row meta-complete" id="date-autre-pub"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de publication</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- Date pub direction -->
<div class="form-group row meta-complete" id="date-pub-direction"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de publication</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>

<!-- Date pub ouvrage -->
    <div class="form-group row meta-complete" id="date-pub-ouvrage"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de publication</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- Date pub chap ouvrage -->
    <div class="form-group row meta-complete" id="date-pub-chap-ouvrage"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date de publication</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- Date prise de vue Image -->
<div class="form-group row meta-complete" id="date-prise-image"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date prise de vue</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
</div>
<!-- date approximative image -->  
<div class="form-group row  meta-complete" id="circa-element" style="display: none;">
    <label class="col-md-3 control-label optional" for="circa">Date approximative</label>
        <div class="col-md-9">
            <span class="help-block">Cocher la case si la date de prise de vue est incertaine</span>
                <input name="circa" type="hidden" value="0">
                    <input name="circa" class="meta-complete form-control input-sm" id="circa" type="checkbox" value="1">
        </div>  
</div>

<!-- Date brevet -->
<div class="form-group row meta-complete" id="date-brevet"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>

<!-- A paraitre article-->
    <div class="form-group row " id="inPress-element"  style="display: none;">
        <label class="col-md-3 control-label" for="inPress">A paraître</label>
            <div class="col-md-9"><span class="help-block">Si vous choisissez l'option "A paraître", la date de publication ne sera plus obligatoire</span>
                <input name="inPress" type="hidden" value="0"><input name="inPress" class="form-control input-sm" id="inPress" type="checkbox" value="1">
            </div>
    </div>
<!-- A paraitre ouvrage-->
    <div class="form-group row " id="inPress-ouvrage"  style="display: none;">
        <label class="col-md-3 control-label" for="inPress">A paraître</label>
            <div class="col-md-9"><span class="help-block">Si vous choisissez l'option "A paraître", la date de publication ne sera plus obligatoire</span>
                <input name="inPress" type="hidden" value="0"><input name="inPress" class="form-control input-sm" id="inPress" type="checkbox" value="1">
            </div>
    </div>
<!-- A paraitre chap ouvrage-->
    <div class="form-group row " id="inPress-chap-ouvrage"  style="display: none;">
        <label class="col-md-3 control-label" for="inPress">A paraître</label>
            <div class="col-md-9"><span class="help-block">Si vous choisissez l'option "A paraître", la date de publication ne sera plus obligatoire</span>
                <input name="inPress" type="hidden" value="0"><input name="inPress" class="form-control input-sm" id="inPress" type="checkbox" value="1">
            </div>
    </div>
<!-- A paraitre direction-->
    <div class="form-group row " id="inPress-direction"  style="display: none;">
        <label class="col-md-3 control-label" for="inPress">A paraître</label>
            <div class="col-md-9"><span class="help-block">Si vous choisissez l'option "A paraître", la date de publication ne sera plus obligatoire</span>
                <input name="inPress" type="hidden" value="0"><input name="inPress" class="form-control input-sm" id="inPress" type="checkbox" value="1">
            </div>
    </div>
<!-- Description autre pub-->
    <div class="form-group row " id="description-element" style="display: none;">
        <label class="col-md-3 control-label required" for="description">Description<span class="icon-required">  *</span></label>
            <div class="col-md-9">
                <textarea name="description" class="form-control input-sm" id="description" rows="2" cols="80"></textarea>
            </div>
    </div>
<!-- Type rapport -->
    <div class="form-group row " id="reportType-element" style="display: none;">
        <label class="col-md-3 control-label required" for="reportType">Type</label>
            <div class="col-md-9"><span class="help-block">Sélectionnez le type de votre rapport</span>
                <select name="reportType" class="form-control input-sm" id="reportType">
                    <option selected="selected" value="6">Rapport de recherche</option>
                    <option value="4">Rapport Technique</option>
                    <option value="2">Contrat</option>
                    <option value="5">Stage</option>
                    <option value="3">Interne</option>
                    <option value="1">Travaux universitaires</option>
                    <option value="0">Autre</option>
                </select>
            </div>
    </div>
<!-- date pub rapport --> 
<div class="form-group row " id="date-rapport"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date début congrès</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- Institution rapport-->
<div class="form-group row " id="authorityInstitution-element" style="display: none;">
    <label class="col-md-3 control-label required" for="authorityInstitution">Institution</label>
        <div class="col-md-9">
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="authorityInstitution[]" class=" form-control input-sm" id="authorityInstitution" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s"><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="addInstitu()" type="button" data-toggle="tooltip" data-original-title="Ajouter" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        </div>
        <div id="institu">
        </div>
        <template id="institutionTemplate">
            <div class="input-group" style="margin-bottom : 10px;" id="divInstitu">
                <input name="authorityInstitution[]" class="form-control input-sm ui-autocomplete-input" id="authorityInstitution" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s" autocomplete="off"><button title="" class="btn btn-sm btn-primary" class=pull-right style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="deleteInstitu(event)" type="button" data-toggle="tooltip" data-original-title="Supprimer" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </template>
        
</div>

<!-- directeur de these-->
<div class="form-group row " id="directeur-element" style="display: none;">
    <label class="col-md-3 control-label required" for="authorityInstitution">Directeur de thése</label>
        <div class="col-md-9">
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="directeurThese[]" class=" form-control input-sm" id="directeurThese" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s"><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="addDirect()" type="button" data-toggle="tooltip" data-original-title="Ajouter" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        </div>
        <div id="direct">
        </div>
        <template id="directeurTemplate">
            <div class="input-group" style="margin-bottom : 10px;" >
                <input name="directeurThese[]" class="form-control input-sm ui-autocomplete-input" id="directeurThese" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s" autocomplete="off"><button title="" class="btn btn-sm btn-primary" class=pull-right style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="deleteDirect(event)" type="button" data-toggle="tooltip" data-original-title="Supprimer" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </template>
        
</div>
<!-- Titre du congres -->
    <div class="form-group row " id="conferenceTitle-element" style="display: none;">
        <label class="col-md-3 control-label required" for="conferenceTitle">Titre du congrès<span class="icon-required">  *</span></label>
            <div class="col-md-9">
                <input name="conferenceTitle" class="form-control input-sm" id="conferenceTitle" type="text" value="">
            </div>
    </div>
<!-- date debut congres -->
    <div class="form-group row " id="congres-date-id-element"  style="display: none;">
        <label class="col-md-3 control-label required" for="date-id">Date début congrès</label>
        <div class="col-md-9">
            <div class="input-group">
                <input type="date" name="date">
            </div>
        </div>
    </div>
<!-- date soutenance these -->
<div class="form-group row " id="date-soutenance-these"  style="display: none;">
    <label class="col-md-3 control-label required" for="date-id">Date soutenance</label>
    <div class="col-md-9">
        <div class="input-group">
            <input type="date" name="date">
        </div>
    </div>
</div>
<!-- date soutenance hdr -->
<div class="form-group row " id="date-soutenance-hdr"  style="display: none;">
    <label class="col-md-3 control-label required" for="date-id">Date soutenance</label>
    <div class="col-md-9">
        <div class="input-group">
            <input type="date" name="date">
        </div>
    </div>
</div>
<!-- date cours -->
<div class="form-group row " id="date-cours"  style="display: none;">
    <label class="col-md-3 control-label required" for="date-id">Date cours</label>
    <div class="col-md-9">
        <div class="input-group">
            <input type="date" name="date">
        </div>
    </div>
</div>
<!-- ville congres -->
    <div class="form-group row " id="city-element" style="display: none;">
        <label class="col-md-3 control-label required" for="city">Ville</label>
            <div class="col-md-9">
                <input name="city" class="form-control input-sm" id="city" type="text" value="">
            </div>
    </div>
<!-- n° brevet -->
<div class="form-group row " id="number-element" style="display: none;">
        <label class="col-md-3 control-label required" for="number">N° de brevet</label>
            <div class="col-md-9">
                <input name="number" class="form-control input-sm" id="number" type="text" value="">
            </div>
    </div>
<!-- pays congres -->
    <div class="form-group row " id="country-element" style="display: none;">
        <label class="col-md-3 control-label required" for="country">Pays</label>
            <div class="col-md-9">
                <select name="country" class="form-control input-sm" id="country">
                    <option value=""></option>
                    <option value="af">Afghanistan</option>
                    <option value="za">Afrique du Sud</option>
                    <option value="al">Albanie</option>
                    <option value="dz">Algérie</option>
                    <option value="de">Allemagne</option>
                    <option value="ad">Andorre</option>
                    <option value="ao">Angola</option>
                    <option value="ai">Anguilla</option>
                    <option value="aq">Antarctique</option>
                    <option value="ag">Antigua-et-Barbuda</option>
                    <option value="an">Antilles néerlandaises</option>
                    <option value="sa">Arabie saoudite</option>
                    <option value="ar">Argentine</option>
                    <option value="am">Arménie</option>
                    <option value="aw">Aruba</option>
                    <option value="au">Australie</option>
                    <option value="at">Autriche</option>
                    <option value="az">Azerbaïdjan</option>
                    <option value="bs">Bahamas</option>
                    <option value="bh">Bahreïn</option>
                    <option value="bd">Bangladesh</option>
                    <option value="bb">Barbade</option>
                    <option value="be">Belgique</option>
                    <option value="bz">Belize</option>
                    <option value="bj">Bénin</option>
                    <option value="bm">Bermudes</option>
                    <option value="bt">Bhoutan</option>
                    <option value="by">Biélorussie</option>
                    <option value="bo">Bolivie</option>
                    <option value="ba">Bosnie-Herzégovine</option>
                    <option value="bw">Botswana</option>
                    <option value="br">Brésil</option>
                    <option value="bn">Brunéi Darussalam</option>
                    <option value="bg">Bulgarie</option>
                    <option value="bf">Burkina Faso</option>
                    <option value="bi">Burundi</option>
                    <option value="kh">Cambodge</option>
                    <option value="cm">Cameroun</option>
                    <option value="ca">Canada</option>
                    <option value="cv">Cap-Vert</option>
                    <option value="ea">Ceuta et Melilla</option>
                    <option value="cl">Chili</option>
                    <option value="cn">Chine</option>
                    <option value="cy">Chypre</option>
                    <option value="co">Colombie</option>
                    <option value="km">Comores</option>
                    <option value="cg">Congo-Brazzaville</option>
                    <option value="cd">Congo-Kinshasa</option>
                    <option value="kp">Corée du Nord</option>
                    <option value="kr">Corée du Sud</option>
                    <option value="cr">Costa Rica</option>
                    <option value="ci">Côte d’Ivoire</option>
                    <option value="hr">Croatie</option>
                    <option value="cu">Cuba</option>
                    <option value="cw">Curaçao</option>
                    <option value="dk">Danemark</option>
                    <option value="dg">Diego Garcia</option>
                    <option value="dj">Djibouti</option>
                    <option value="dm">Dominique</option>
                    <option value="eg">Égypte</option>
                    <option value="sv">El Salvador</option>
                    <option value="ae">Émirats arabes unis</option>
                    <option value="ec">Équateur</option>
                    <option value="er">Érythrée</option>
                    <option value="es">Espagne</option>
                    <option value="ee">Estonie</option>
                    <option value="va">État de la Cité du Vatican</option>
                    <option value="fm">États fédérés de Micronésie</option>
                    <option value="us">États-Unis</option>
                    <option value="et">Éthiopie</option>
                    <option value="fj">Fidji</option>
                    <option value="fi">Finlande</option>
                    <option selected="selected" value="fr">France</option>
                    <option value="ga">Gabon</option>
                    <option value="gm">Gambie</option>
                    <option value="ge">Géorgie</option>
                    <option value="gs">Géorgie du Sud et les Îles Sandwich du Sud</option>
                    <option value="gh">Ghana</option>
                    <option value="gi">Gibraltar</option>
                    <option value="gr">Grèce</option>
                    <option value="gd">Grenade</option>
                    <option value="gl">Groenland</option>
                    <option value="gp">Guadeloupe</option>
                    <option value="gu">Guam</option>
                    <option value="gt">Guatemala</option>
                    <option value="gg">Guernesey</option>
                    <option value="gn">Guinée</option>
                    <option value="gw">Guinée-Bissau</option>
                    <option value="gq">Guinée équatoriale</option>
                    <option value="gy">Guyana</option>
                    <option value="gf">Guyane française</option>
                    <option value="ht">Haïti</option>
                    <option value="hn">Honduras</option>
                    <option value="hu">Hongrie</option>
                    <option value="bv">Île Bouvet</option>
                    <option value="cx">Île Christmas</option>
                    <option value="cp">Île Clipperton</option>
                    <option value="ac">Île de l’Ascension</option>
                    <option value="im">Île de Man</option>
                    <option value="nf">Île Norfolk</option>
                    <option value="ax">Îles Åland</option>
                    <option value="ky">Îles Caïmans</option>
                    <option value="ic">Îles Canaries</option>
                    <option value="cc">Îles Cocos (Keeling)</option>
                    <option value="ck">Îles Cook</option>
                    <option value="fo">Îles Féroé</option>
                    <option value="hm">Îles Heard et MacDonald</option>
                    <option value="fk">Îles Malouines</option>
                    <option value="mp">Îles Mariannes du Nord</option>
                    <option value="mh">Îles Marshall</option>
                    <option value="um">Îles mineures éloignées des États-Unis</option>
                    <option value="sb">Îles Salomon</option>
                    <option value="tc">Îles Turques-et-Caïques</option>
                    <option value="vg">Îles Vierges britanniques</option>
                    <option value="vi">Îles Vierges des États-Unis</option>
                    <option value="in">Inde</option>
                    <option value="id">Indonésie</option>
                    <option value="iq">Irak</option>
                    <option value="ir">Iran</option>
                    <option value="ie">Irlande</option>
                    <option value="is">Islande</option>
                    <option value="il">Israël</option>
                    <option value="it">Italie</option>
                    <option value="jm">Jamaïque</option>
                    <option value="jp">Japon</option>
                    <option value="je">Jersey</option>
                    <option value="jo">Jordanie</option>
                    <option value="kz">Kazakhstan</option>
                    <option value="ke">Kenya</option>
                    <option value="kg">Kirghizistan</option>
                    <option value="ki">Kiribati</option>
                    <option value="xk">Kosovo</option>
                    <option value="kw">Koweït</option>
                    <option value="la">Laos</option>
                    <option value="re">La Réunion</option>
                    <option value="ls">Lesotho</option>
                    <option value="lv">Lettonie</option>
                    <option value="lb">Liban</option>
                    <option value="lr">Libéria</option>
                    <option value="ly">Libye</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lituanie</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mk">Macédoine</option>
                    <option value="mg">Madagascar</option>
                    <option value="my">Malaisie</option>
                    <option value="mw">Malawi</option>
                    <option value="mv">Maldives</option>
                    <option value="ml">Mali</option>
                    <option value="mt">Malte</option>
                    <option value="ma">Maroc</option>
                    <option value="mq">Martinique</option>
                    <option value="mu">Maurice</option>
                    <option value="mr">Mauritanie</option>
                    <option value="yt">Mayotte</option>
                    <option value="mx">Mexique</option>
                    <option value="md">Moldavie</option>
                    <option value="mc">Monaco</option>
                    <option value="mn">Mongolie</option>
                    <option value="me">Monténégro</option>
                    <option value="ms">Montserrat</option>
                    <option value="mz">Mozambique</option>
                    <option value="mm">Myanmar</option>
                    <option value="na">Namibie</option>
                    <option value="nr">Nauru</option>
                    <option value="np">Népal</option>
                    <option value="ni">Nicaragua</option>
                    <option value="ne">Niger</option>
                    <option value="ng">Nigéria</option>
                    <option value="nu">Niue</option>
                    <option value="no">Norvège</option>
                    <option value="nc">Nouvelle-Calédonie</option>
                    <option value="nz">Nouvelle-Zélande</option>
                    <option value="om">Oman</option>
                    <option value="ug">Ouganda</option>
                    <option value="uz">Ouzbékistan</option>
                    <option value="pk">Pakistan</option>
                    <option value="pw">Palaos</option>
                    <option value="pa">Panama</option>
                    <option value="pg">Papouasie-Nouvelle-Guinée</option>
                    <option value="py">Paraguay</option>
                    <option value="nl">Pays-Bas</option>
                    <option value="bq">Pays-Bas caribéens</option>
                    <option value="pe">Pérou</option>
                    <option value="ph">Philippines</option>
                    <option value="pn">Pitcairn</option>
                    <option value="pl">Pologne</option>
                    <option value="pf">Polynésie française</option>
                    <option value="pr">Porto Rico</option>
                    <option value="pt">Portugal</option>
                    <option value="qa">Qatar</option>
                    <option value="hk">R.A.S. chinoise de Hong Kong</option>
                    <option value="mo">R.A.S. chinoise de Macao</option>
                    <option value="zz">région indéterminée</option>
                    <option value="cf">République centrafricaine</option>
                    <option value="do">République dominicaine</option>
                    <option value="cz">République tchèque</option>
                    <option value="ro">Roumanie</option>
                    <option value="gb">Royaume-Uni</option>
                    <option value="ru">Russie</option>
                    <option value="rw">Rwanda</option>
                    <option value="eh">Sahara occidental</option>
                    <option value="bl">Saint-Barthélemy</option>
                    <option value="sh">Sainte-Hélène</option>
                    <option value="lc">Sainte-Lucie</option>
                    <option value="kn">Saint-Kitts-et-Nevis</option>
                    <option value="sm">Saint-Marin</option>
                    <option value="mf">Saint-Martin (partie française)</option>
                    <option value="sx">Saint-Martin (partie néerlandaise)</option>
                    <option value="pm">Saint-Pierre-et-Miquelon</option>
                    <option value="vc">Saint-Vincent-et-les Grenadines</option>
                    <option value="ws">Samoa</option>
                    <option value="as">Samoa américaines</option>
                    <option value="st">Sao Tomé-et-Principe</option>
                    <option value="sn">Sénégal</option>
                    <option value="rs">Serbie</option>
                    <option value="sc">Seychelles</option>
                    <option value="sl">Sierra Leone</option>
                    <option value="sg">Singapour</option>
                    <option value="sk">Slovaquie</option>
                    <option value="si">Slovénie</option>
                    <option value="so">Somalie</option>
                    <option value="sd">Soudan</option>
                    <option value="ss">Soudan du Sud</option>
                    <option value="lk">Sri Lanka</option>
                    <option value="se">Suède</option>
                    <option value="ch">Suisse</option>
                    <option value="sr">Suriname</option>
                    <option value="sj">Svalbard et Jan Mayen</option>
                    <option value="sz">Swaziland</option>
                    <option value="sy">Syrie</option>
                    <option value="tj">Tadjikistan</option>
                    <option value="tw">Taïwan</option>
                    <option value="tz">Tanzanie</option>
                    <option value="td">Tchad</option>
                    <option value="tf">Terres australes françaises</option>
                    <option value="io">Territoire britannique de l’océan Indien</option>
                    <option value="ps">Territoires palestiniens</option>
                    <option value="th">Thaïlande</option>
                    <option value="tl">Timor oriental</option>
                    <option value="tg">Togo</option>
                    <option value="tk">Tokelau</option>
                    <option value="to">Tonga</option>
                    <option value="tt">Trinité-et-Tobago</option>
                    <option value="ta">Tristan da Cunha</option>
                    <option value="tn">Tunisie</option>
                    <option value="tm">Turkménistan</option>
                    <option value="tr">Turquie</option>
                    <option value="tv">Tuvalu</option>
                    <option value="ua">Ukraine</option>
                    <option value="uy">Uruguay</option>
                    <option value="vu">Vanuatu</option>
                    <option value="ve">Venezuela</option>
                    <option value="vn">Vietnam</option>
                    <option value="wf">Wallis-et-Futuna</option>
                    <option value="ye">Yémen</option>
                    <option value="zm">Zambie</option>
                    <option value="zw">Zimbabwe</option>
                </select>
            </div>
    </div>
<!-- Organisme délivrance these-->
<div class="form-group row " id="organisme-element" style="display: none;">
    <label class="col-md-3 control-label required" for="authorityInstitution">Organisme de délivrance</label>
        <div class="col-md-9">
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="organismeDelivrance[]" class=" form-control input-sm" id="organismeDelivrance" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s"><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="addOrga()" type="button" data-toggle="tooltip" data-original-title="Ajouter" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        </div>
        <div id="orga">
        </div>
        <template id="organismeTemplate">
            <div class="input-group" style="margin-bottom : 10px;" >
                <input name="organismeDelivrance[]" class="form-control input-sm ui-autocomplete-input" id="organismeDelivrance" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s" autocomplete="off"><button title="" class="btn btn-sm btn-primary" class=pull-right style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="deleteOrga(event)" type="button" data-toggle="tooltip" data-original-title="Supprimer" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </template>
        
</div>
<!-- Organisme délivrance hdr-->
<div class="form-group row " id="organisme-hdr-element" style="display: none;">
    <label class="col-md-3 control-label required" for="authorityInstitution">Organisme de délivrance</label>
        <div class="col-md-9">
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="organismeDelivranceHdr[]" class=" form-control input-sm" id="organismeDelivranceHdr" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s"><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="addOrgaHdr()" type="button" data-toggle="tooltip" data-original-title="Ajouter" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        </div>
        <div id="orga">
        </div>
        <template id="organismeTemplate">
            <div class="input-group" style="margin-bottom : 10px;" >
                <input name="organismeDelivranceHdr[]" class="form-control input-sm ui-autocomplete-input" id="organismeDelivranceHdr" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s" autocomplete="off"><button title="" class="btn btn-sm btn-primary" class=pull-right style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="deleteOrgaHdr(event)" type="button" data-toggle="tooltip" data-original-title="Supprimer" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </template>
        
</div>
<!-- President jury hdr-->
<div class="form-group row " id="president-element" style="display: none;">
    <label class="col-md-3 control-label required" for="authorityInstitution">Président du jury</label>
        <div class="col-md-9">
            <div class="input-group" style="margin-bottom : 10px;">
                <input name="presidentJury[]" class=" form-control input-sm" id="presidentJury" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s"><span class="input-group-btn"><button class="btn btn-sm btn-primary" style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="addPre()" type="button" data-toggle="tooltip" data-original-title="Ajouter" data-placement="right"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        </div>
        <div id="pre">
        </div>
        <template id="presidentTemplate">
            <div class="input-group" style="margin-bottom : 10px;" >
                <input name="presidentJury[]" class="form-control input-sm ui-autocomplete-input" id="presidentJury" style=" " type="text" value=""  attr-autocomplete="authorityInstitution_s" autocomplete="off"><button title="" class="btn btn-sm btn-primary" class=pull-right style="border-top-left-radius:0; border-bottom-left-radius:0; height: 30px; padding-top:0; padding-bottom: 0;" onclick="deletePre(event)" type="button" data-toggle="tooltip" data-original-title="Supprimer" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </template>
        
</div>
<!-- pays image -->
<div class="form-group row " id="country-image" style="display: none;">
        <label class="col-md-3 control-label required" for="country">Pays</label>
            <div class="col-md-9">
                <select name="country" class="form-control input-sm" id="country">
                    <option value=""></option>
                    <option value="af">Afghanistan</option>
                    <option value="za">Afrique du Sud</option>
                    <option value="al">Albanie</option>
                    <option value="dz">Algérie</option>
                    <option value="de">Allemagne</option>
                    <option value="ad">Andorre</option>
                    <option value="ao">Angola</option>
                    <option value="ai">Anguilla</option>
                    <option value="aq">Antarctique</option>
                    <option value="ag">Antigua-et-Barbuda</option>
                    <option value="an">Antilles néerlandaises</option>
                    <option value="sa">Arabie saoudite</option>
                    <option value="ar">Argentine</option>
                    <option value="am">Arménie</option>
                    <option value="aw">Aruba</option>
                    <option value="au">Australie</option>
                    <option value="at">Autriche</option>
                    <option value="az">Azerbaïdjan</option>
                    <option value="bs">Bahamas</option>
                    <option value="bh">Bahreïn</option>
                    <option value="bd">Bangladesh</option>
                    <option value="bb">Barbade</option>
                    <option value="be">Belgique</option>
                    <option value="bz">Belize</option>
                    <option value="bj">Bénin</option>
                    <option value="bm">Bermudes</option>
                    <option value="bt">Bhoutan</option>
                    <option value="by">Biélorussie</option>
                    <option value="bo">Bolivie</option>
                    <option value="ba">Bosnie-Herzégovine</option>
                    <option value="bw">Botswana</option>
                    <option value="br">Brésil</option>
                    <option value="bn">Brunéi Darussalam</option>
                    <option value="bg">Bulgarie</option>
                    <option value="bf">Burkina Faso</option>
                    <option value="bi">Burundi</option>
                    <option value="kh">Cambodge</option>
                    <option value="cm">Cameroun</option>
                    <option value="ca">Canada</option>
                    <option value="cv">Cap-Vert</option>
                    <option value="ea">Ceuta et Melilla</option>
                    <option value="cl">Chili</option>
                    <option value="cn">Chine</option>
                    <option value="cy">Chypre</option>
                    <option value="co">Colombie</option>
                    <option value="km">Comores</option>
                    <option value="cg">Congo-Brazzaville</option>
                    <option value="cd">Congo-Kinshasa</option>
                    <option value="kp">Corée du Nord</option>
                    <option value="kr">Corée du Sud</option>
                    <option value="cr">Costa Rica</option>
                    <option value="ci">Côte d’Ivoire</option>
                    <option value="hr">Croatie</option>
                    <option value="cu">Cuba</option>
                    <option value="cw">Curaçao</option>
                    <option value="dk">Danemark</option>
                    <option value="dg">Diego Garcia</option>
                    <option value="dj">Djibouti</option>
                    <option value="dm">Dominique</option>
                    <option value="eg">Égypte</option>
                    <option value="sv">El Salvador</option>
                    <option value="ae">Émirats arabes unis</option>
                    <option value="ec">Équateur</option>
                    <option value="er">Érythrée</option>
                    <option value="es">Espagne</option>
                    <option value="ee">Estonie</option>
                    <option value="va">État de la Cité du Vatican</option>
                    <option value="fm">États fédérés de Micronésie</option>
                    <option value="us">États-Unis</option>
                    <option value="et">Éthiopie</option>
                    <option value="fj">Fidji</option>
                    <option value="fi">Finlande</option>
                    <option selected="selected" value="fr">France</option>
                    <option value="ga">Gabon</option>
                    <option value="gm">Gambie</option>
                    <option value="ge">Géorgie</option>
                    <option value="gs">Géorgie du Sud et les Îles Sandwich du Sud</option>
                    <option value="gh">Ghana</option>
                    <option value="gi">Gibraltar</option>
                    <option value="gr">Grèce</option>
                    <option value="gd">Grenade</option>
                    <option value="gl">Groenland</option>
                    <option value="gp">Guadeloupe</option>
                    <option value="gu">Guam</option>
                    <option value="gt">Guatemala</option>
                    <option value="gg">Guernesey</option>
                    <option value="gn">Guinée</option>
                    <option value="gw">Guinée-Bissau</option>
                    <option value="gq">Guinée équatoriale</option>
                    <option value="gy">Guyana</option>
                    <option value="gf">Guyane française</option>
                    <option value="ht">Haïti</option>
                    <option value="hn">Honduras</option>
                    <option value="hu">Hongrie</option>
                    <option value="bv">Île Bouvet</option>
                    <option value="cx">Île Christmas</option>
                    <option value="cp">Île Clipperton</option>
                    <option value="ac">Île de l’Ascension</option>
                    <option value="im">Île de Man</option>
                    <option value="nf">Île Norfolk</option>
                    <option value="ax">Îles Åland</option>
                    <option value="ky">Îles Caïmans</option>
                    <option value="ic">Îles Canaries</option>
                    <option value="cc">Îles Cocos (Keeling)</option>
                    <option value="ck">Îles Cook</option>
                    <option value="fo">Îles Féroé</option>
                    <option value="hm">Îles Heard et MacDonald</option>
                    <option value="fk">Îles Malouines</option>
                    <option value="mp">Îles Mariannes du Nord</option>
                    <option value="mh">Îles Marshall</option>
                    <option value="um">Îles mineures éloignées des États-Unis</option>
                    <option value="sb">Îles Salomon</option>
                    <option value="tc">Îles Turques-et-Caïques</option>
                    <option value="vg">Îles Vierges britanniques</option>
                    <option value="vi">Îles Vierges des États-Unis</option>
                    <option value="in">Inde</option>
                    <option value="id">Indonésie</option>
                    <option value="iq">Irak</option>
                    <option value="ir">Iran</option>
                    <option value="ie">Irlande</option>
                    <option value="is">Islande</option>
                    <option value="il">Israël</option>
                    <option value="it">Italie</option>
                    <option value="jm">Jamaïque</option>
                    <option value="jp">Japon</option>
                    <option value="je">Jersey</option>
                    <option value="jo">Jordanie</option>
                    <option value="kz">Kazakhstan</option>
                    <option value="ke">Kenya</option>
                    <option value="kg">Kirghizistan</option>
                    <option value="ki">Kiribati</option>
                    <option value="xk">Kosovo</option>
                    <option value="kw">Koweït</option>
                    <option value="la">Laos</option>
                    <option value="re">La Réunion</option>
                    <option value="ls">Lesotho</option>
                    <option value="lv">Lettonie</option>
                    <option value="lb">Liban</option>
                    <option value="lr">Libéria</option>
                    <option value="ly">Libye</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lituanie</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mk">Macédoine</option>
                    <option value="mg">Madagascar</option>
                    <option value="my">Malaisie</option>
                    <option value="mw">Malawi</option>
                    <option value="mv">Maldives</option>
                    <option value="ml">Mali</option>
                    <option value="mt">Malte</option>
                    <option value="ma">Maroc</option>
                    <option value="mq">Martinique</option>
                    <option value="mu">Maurice</option>
                    <option value="mr">Mauritanie</option>
                    <option value="yt">Mayotte</option>
                    <option value="mx">Mexique</option>
                    <option value="md">Moldavie</option>
                    <option value="mc">Monaco</option>
                    <option value="mn">Mongolie</option>
                    <option value="me">Monténégro</option>
                    <option value="ms">Montserrat</option>
                    <option value="mz">Mozambique</option>
                    <option value="mm">Myanmar</option>
                    <option value="na">Namibie</option>
                    <option value="nr">Nauru</option>
                    <option value="np">Népal</option>
                    <option value="ni">Nicaragua</option>
                    <option value="ne">Niger</option>
                    <option value="ng">Nigéria</option>
                    <option value="nu">Niue</option>
                    <option value="no">Norvège</option>
                    <option value="nc">Nouvelle-Calédonie</option>
                    <option value="nz">Nouvelle-Zélande</option>
                    <option value="om">Oman</option>
                    <option value="ug">Ouganda</option>
                    <option value="uz">Ouzbékistan</option>
                    <option value="pk">Pakistan</option>
                    <option value="pw">Palaos</option>
                    <option value="pa">Panama</option>
                    <option value="pg">Papouasie-Nouvelle-Guinée</option>
                    <option value="py">Paraguay</option>
                    <option value="nl">Pays-Bas</option>
                    <option value="bq">Pays-Bas caribéens</option>
                    <option value="pe">Pérou</option>
                    <option value="ph">Philippines</option>
                    <option value="pn">Pitcairn</option>
                    <option value="pl">Pologne</option>
                    <option value="pf">Polynésie française</option>
                    <option value="pr">Porto Rico</option>
                    <option value="pt">Portugal</option>
                    <option value="qa">Qatar</option>
                    <option value="hk">R.A.S. chinoise de Hong Kong</option>
                    <option value="mo">R.A.S. chinoise de Macao</option>
                    <option value="zz">région indéterminée</option>
                    <option value="cf">République centrafricaine</option>
                    <option value="do">République dominicaine</option>
                    <option value="cz">République tchèque</option>
                    <option value="ro">Roumanie</option>
                    <option value="gb">Royaume-Uni</option>
                    <option value="ru">Russie</option>
                    <option value="rw">Rwanda</option>
                    <option value="eh">Sahara occidental</option>
                    <option value="bl">Saint-Barthélemy</option>
                    <option value="sh">Sainte-Hélène</option>
                    <option value="lc">Sainte-Lucie</option>
                    <option value="kn">Saint-Kitts-et-Nevis</option>
                    <option value="sm">Saint-Marin</option>
                    <option value="mf">Saint-Martin (partie française)</option>
                    <option value="sx">Saint-Martin (partie néerlandaise)</option>
                    <option value="pm">Saint-Pierre-et-Miquelon</option>
                    <option value="vc">Saint-Vincent-et-les Grenadines</option>
                    <option value="ws">Samoa</option>
                    <option value="as">Samoa américaines</option>
                    <option value="st">Sao Tomé-et-Principe</option>
                    <option value="sn">Sénégal</option>
                    <option value="rs">Serbie</option>
                    <option value="sc">Seychelles</option>
                    <option value="sl">Sierra Leone</option>
                    <option value="sg">Singapour</option>
                    <option value="sk">Slovaquie</option>
                    <option value="si">Slovénie</option>
                    <option value="so">Somalie</option>
                    <option value="sd">Soudan</option>
                    <option value="ss">Soudan du Sud</option>
                    <option value="lk">Sri Lanka</option>
                    <option value="se">Suède</option>
                    <option value="ch">Suisse</option>
                    <option value="sr">Suriname</option>
                    <option value="sj">Svalbard et Jan Mayen</option>
                    <option value="sz">Swaziland</option>
                    <option value="sy">Syrie</option>
                    <option value="tj">Tadjikistan</option>
                    <option value="tw">Taïwan</option>
                    <option value="tz">Tanzanie</option>
                    <option value="td">Tchad</option>
                    <option value="tf">Terres australes françaises</option>
                    <option value="io">Territoire britannique de l’océan Indien</option>
                    <option value="ps">Territoires palestiniens</option>
                    <option value="th">Thaïlande</option>
                    <option value="tl">Timor oriental</option>
                    <option value="tg">Togo</option>
                    <option value="tk">Tokelau</option>
                    <option value="to">Tonga</option>
                    <option value="tt">Trinité-et-Tobago</option>
                    <option value="ta">Tristan da Cunha</option>
                    <option value="tn">Tunisie</option>
                    <option value="tm">Turkménistan</option>
                    <option value="tr">Turquie</option>
                    <option value="tv">Tuvalu</option>
                    <option value="ua">Ukraine</option>
                    <option value="uy">Uruguay</option>
                    <option value="vu">Vanuatu</option>
                    <option value="ve">Venezuela</option>
                    <option value="vn">Vietnam</option>
                    <option value="wf">Wallis-et-Futuna</option>
                    <option value="ye">Yémen</option>
                    <option value="zm">Zambie</option>
                    <option value="zw">Zimbabwe</option>
                </select>
            </div>
</div>
<!-- pays carte -->
<div class="form-group row " id="country-carte" style="display: none;">
        <label class="col-md-3 control-label required" for="country">Pays</label>
            <div class="col-md-9">
                <select name="country" class="form-control input-sm" id="country">
                    <option value=""></option>
                    <option value="af">Afghanistan</option>
                    <option value="za">Afrique du Sud</option>
                    <option value="al">Albanie</option>
                    <option value="dz">Algérie</option>
                    <option value="de">Allemagne</option>
                    <option value="ad">Andorre</option>
                    <option value="ao">Angola</option>
                    <option value="ai">Anguilla</option>
                    <option value="aq">Antarctique</option>
                    <option value="ag">Antigua-et-Barbuda</option>
                    <option value="an">Antilles néerlandaises</option>
                    <option value="sa">Arabie saoudite</option>
                    <option value="ar">Argentine</option>
                    <option value="am">Arménie</option>
                    <option value="aw">Aruba</option>
                    <option value="au">Australie</option>
                    <option value="at">Autriche</option>
                    <option value="az">Azerbaïdjan</option>
                    <option value="bs">Bahamas</option>
                    <option value="bh">Bahreïn</option>
                    <option value="bd">Bangladesh</option>
                    <option value="bb">Barbade</option>
                    <option value="be">Belgique</option>
                    <option value="bz">Belize</option>
                    <option value="bj">Bénin</option>
                    <option value="bm">Bermudes</option>
                    <option value="bt">Bhoutan</option>
                    <option value="by">Biélorussie</option>
                    <option value="bo">Bolivie</option>
                    <option value="ba">Bosnie-Herzégovine</option>
                    <option value="bw">Botswana</option>
                    <option value="br">Brésil</option>
                    <option value="bn">Brunéi Darussalam</option>
                    <option value="bg">Bulgarie</option>
                    <option value="bf">Burkina Faso</option>
                    <option value="bi">Burundi</option>
                    <option value="kh">Cambodge</option>
                    <option value="cm">Cameroun</option>
                    <option value="ca">Canada</option>
                    <option value="cv">Cap-Vert</option>
                    <option value="ea">Ceuta et Melilla</option>
                    <option value="cl">Chili</option>
                    <option value="cn">Chine</option>
                    <option value="cy">Chypre</option>
                    <option value="co">Colombie</option>
                    <option value="km">Comores</option>
                    <option value="cg">Congo-Brazzaville</option>
                    <option value="cd">Congo-Kinshasa</option>
                    <option value="kp">Corée du Nord</option>
                    <option value="kr">Corée du Sud</option>
                    <option value="cr">Costa Rica</option>
                    <option value="ci">Côte d’Ivoire</option>
                    <option value="hr">Croatie</option>
                    <option value="cu">Cuba</option>
                    <option value="cw">Curaçao</option>
                    <option value="dk">Danemark</option>
                    <option value="dg">Diego Garcia</option>
                    <option value="dj">Djibouti</option>
                    <option value="dm">Dominique</option>
                    <option value="eg">Égypte</option>
                    <option value="sv">El Salvador</option>
                    <option value="ae">Émirats arabes unis</option>
                    <option value="ec">Équateur</option>
                    <option value="er">Érythrée</option>
                    <option value="es">Espagne</option>
                    <option value="ee">Estonie</option>
                    <option value="va">État de la Cité du Vatican</option>
                    <option value="fm">États fédérés de Micronésie</option>
                    <option value="us">États-Unis</option>
                    <option value="et">Éthiopie</option>
                    <option value="fj">Fidji</option>
                    <option value="fi">Finlande</option>
                    <option selected="selected" value="fr">France</option>
                    <option value="ga">Gabon</option>
                    <option value="gm">Gambie</option>
                    <option value="ge">Géorgie</option>
                    <option value="gs">Géorgie du Sud et les Îles Sandwich du Sud</option>
                    <option value="gh">Ghana</option>
                    <option value="gi">Gibraltar</option>
                    <option value="gr">Grèce</option>
                    <option value="gd">Grenade</option>
                    <option value="gl">Groenland</option>
                    <option value="gp">Guadeloupe</option>
                    <option value="gu">Guam</option>
                    <option value="gt">Guatemala</option>
                    <option value="gg">Guernesey</option>
                    <option value="gn">Guinée</option>
                    <option value="gw">Guinée-Bissau</option>
                    <option value="gq">Guinée équatoriale</option>
                    <option value="gy">Guyana</option>
                    <option value="gf">Guyane française</option>
                    <option value="ht">Haïti</option>
                    <option value="hn">Honduras</option>
                    <option value="hu">Hongrie</option>
                    <option value="bv">Île Bouvet</option>
                    <option value="cx">Île Christmas</option>
                    <option value="cp">Île Clipperton</option>
                    <option value="ac">Île de l’Ascension</option>
                    <option value="im">Île de Man</option>
                    <option value="nf">Île Norfolk</option>
                    <option value="ax">Îles Åland</option>
                    <option value="ky">Îles Caïmans</option>
                    <option value="ic">Îles Canaries</option>
                    <option value="cc">Îles Cocos (Keeling)</option>
                    <option value="ck">Îles Cook</option>
                    <option value="fo">Îles Féroé</option>
                    <option value="hm">Îles Heard et MacDonald</option>
                    <option value="fk">Îles Malouines</option>
                    <option value="mp">Îles Mariannes du Nord</option>
                    <option value="mh">Îles Marshall</option>
                    <option value="um">Îles mineures éloignées des États-Unis</option>
                    <option value="sb">Îles Salomon</option>
                    <option value="tc">Îles Turques-et-Caïques</option>
                    <option value="vg">Îles Vierges britanniques</option>
                    <option value="vi">Îles Vierges des États-Unis</option>
                    <option value="in">Inde</option>
                    <option value="id">Indonésie</option>
                    <option value="iq">Irak</option>
                    <option value="ir">Iran</option>
                    <option value="ie">Irlande</option>
                    <option value="is">Islande</option>
                    <option value="il">Israël</option>
                    <option value="it">Italie</option>
                    <option value="jm">Jamaïque</option>
                    <option value="jp">Japon</option>
                    <option value="je">Jersey</option>
                    <option value="jo">Jordanie</option>
                    <option value="kz">Kazakhstan</option>
                    <option value="ke">Kenya</option>
                    <option value="kg">Kirghizistan</option>
                    <option value="ki">Kiribati</option>
                    <option value="xk">Kosovo</option>
                    <option value="kw">Koweït</option>
                    <option value="la">Laos</option>
                    <option value="re">La Réunion</option>
                    <option value="ls">Lesotho</option>
                    <option value="lv">Lettonie</option>
                    <option value="lb">Liban</option>
                    <option value="lr">Libéria</option>
                    <option value="ly">Libye</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lituanie</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mk">Macédoine</option>
                    <option value="mg">Madagascar</option>
                    <option value="my">Malaisie</option>
                    <option value="mw">Malawi</option>
                    <option value="mv">Maldives</option>
                    <option value="ml">Mali</option>
                    <option value="mt">Malte</option>
                    <option value="ma">Maroc</option>
                    <option value="mq">Martinique</option>
                    <option value="mu">Maurice</option>
                    <option value="mr">Mauritanie</option>
                    <option value="yt">Mayotte</option>
                    <option value="mx">Mexique</option>
                    <option value="md">Moldavie</option>
                    <option value="mc">Monaco</option>
                    <option value="mn">Mongolie</option>
                    <option value="me">Monténégro</option>
                    <option value="ms">Montserrat</option>
                    <option value="mz">Mozambique</option>
                    <option value="mm">Myanmar</option>
                    <option value="na">Namibie</option>
                    <option value="nr">Nauru</option>
                    <option value="np">Népal</option>
                    <option value="ni">Nicaragua</option>
                    <option value="ne">Niger</option>
                    <option value="ng">Nigéria</option>
                    <option value="nu">Niue</option>
                    <option value="no">Norvège</option>
                    <option value="nc">Nouvelle-Calédonie</option>
                    <option value="nz">Nouvelle-Zélande</option>
                    <option value="om">Oman</option>
                    <option value="ug">Ouganda</option>
                    <option value="uz">Ouzbékistan</option>
                    <option value="pk">Pakistan</option>
                    <option value="pw">Palaos</option>
                    <option value="pa">Panama</option>
                    <option value="pg">Papouasie-Nouvelle-Guinée</option>
                    <option value="py">Paraguay</option>
                    <option value="nl">Pays-Bas</option>
                    <option value="bq">Pays-Bas caribéens</option>
                    <option value="pe">Pérou</option>
                    <option value="ph">Philippines</option>
                    <option value="pn">Pitcairn</option>
                    <option value="pl">Pologne</option>
                    <option value="pf">Polynésie française</option>
                    <option value="pr">Porto Rico</option>
                    <option value="pt">Portugal</option>
                    <option value="qa">Qatar</option>
                    <option value="hk">R.A.S. chinoise de Hong Kong</option>
                    <option value="mo">R.A.S. chinoise de Macao</option>
                    <option value="zz">région indéterminée</option>
                    <option value="cf">République centrafricaine</option>
                    <option value="do">République dominicaine</option>
                    <option value="cz">République tchèque</option>
                    <option value="ro">Roumanie</option>
                    <option value="gb">Royaume-Uni</option>
                    <option value="ru">Russie</option>
                    <option value="rw">Rwanda</option>
                    <option value="eh">Sahara occidental</option>
                    <option value="bl">Saint-Barthélemy</option>
                    <option value="sh">Sainte-Hélène</option>
                    <option value="lc">Sainte-Lucie</option>
                    <option value="kn">Saint-Kitts-et-Nevis</option>
                    <option value="sm">Saint-Marin</option>
                    <option value="mf">Saint-Martin (partie française)</option>
                    <option value="sx">Saint-Martin (partie néerlandaise)</option>
                    <option value="pm">Saint-Pierre-et-Miquelon</option>
                    <option value="vc">Saint-Vincent-et-les Grenadines</option>
                    <option value="ws">Samoa</option>
                    <option value="as">Samoa américaines</option>
                    <option value="st">Sao Tomé-et-Principe</option>
                    <option value="sn">Sénégal</option>
                    <option value="rs">Serbie</option>
                    <option value="sc">Seychelles</option>
                    <option value="sl">Sierra Leone</option>
                    <option value="sg">Singapour</option>
                    <option value="sk">Slovaquie</option>
                    <option value="si">Slovénie</option>
                    <option value="so">Somalie</option>
                    <option value="sd">Soudan</option>
                    <option value="ss">Soudan du Sud</option>
                    <option value="lk">Sri Lanka</option>
                    <option value="se">Suède</option>
                    <option value="ch">Suisse</option>
                    <option value="sr">Suriname</option>
                    <option value="sj">Svalbard et Jan Mayen</option>
                    <option value="sz">Swaziland</option>
                    <option value="sy">Syrie</option>
                    <option value="tj">Tadjikistan</option>
                    <option value="tw">Taïwan</option>
                    <option value="tz">Tanzanie</option>
                    <option value="td">Tchad</option>
                    <option value="tf">Terres australes françaises</option>
                    <option value="io">Territoire britannique de l’océan Indien</option>
                    <option value="ps">Territoires palestiniens</option>
                    <option value="th">Thaïlande</option>
                    <option value="tl">Timor oriental</option>
                    <option value="tg">Togo</option>
                    <option value="tk">Tokelau</option>
                    <option value="to">Tonga</option>
                    <option value="tt">Trinité-et-Tobago</option>
                    <option value="ta">Tristan da Cunha</option>
                    <option value="tn">Tunisie</option>
                    <option value="tm">Turkménistan</option>
                    <option value="tr">Turquie</option>
                    <option value="tv">Tuvalu</option>
                    <option value="ua">Ukraine</option>
                    <option value="uy">Uruguay</option>
                    <option value="vu">Vanuatu</option>
                    <option value="ve">Venezuela</option>
                    <option value="vn">Vietnam</option>
                    <option value="wf">Wallis-et-Futuna</option>
                    <option value="ye">Yémen</option>
                    <option value="zm">Zambie</option>
                    <option value="zw">Zimbabwe</option>
                </select>
            </div>
</div>

<!-- watermark image -->
<div class="form-group row  meta-complete" id="watermark-element" style="display: none;">
    <label class="col-md-3 control-label optional" for="watermark">watermark</label>
        <div class="col-md-9">
            <span class="help-block">décocher la case si vous ne souhaitez pas ajouter le filigrane HAL à l'image</span>
                <input name="watermark" type="hidden" value="0">
                    <input name="watermark" class="meta-complete form-control input-sm" id="watermark" type="checkbox" checked="checked" value="1">
        </div>
</div>

<!-- pays cours -->
<div class="form-group row " id="country-cours" style="display: none;">
        <label class="col-md-3 control-label required" for="country">Pays</label>
            <div class="col-md-9">
                <select name="country" class="form-control input-sm" id="country">
                    <option value=""></option>
                    <option value="af">Afghanistan</option>
                    <option value="za">Afrique du Sud</option>
                    <option value="al">Albanie</option>
                    <option value="dz">Algérie</option>
                    <option value="de">Allemagne</option>
                    <option value="ad">Andorre</option>
                    <option value="ao">Angola</option>
                    <option value="ai">Anguilla</option>
                    <option value="aq">Antarctique</option>
                    <option value="ag">Antigua-et-Barbuda</option>
                    <option value="an">Antilles néerlandaises</option>
                    <option value="sa">Arabie saoudite</option>
                    <option value="ar">Argentine</option>
                    <option value="am">Arménie</option>
                    <option value="aw">Aruba</option>
                    <option value="au">Australie</option>
                    <option value="at">Autriche</option>
                    <option value="az">Azerbaïdjan</option>
                    <option value="bs">Bahamas</option>
                    <option value="bh">Bahreïn</option>
                    <option value="bd">Bangladesh</option>
                    <option value="bb">Barbade</option>
                    <option value="be">Belgique</option>
                    <option value="bz">Belize</option>
                    <option value="bj">Bénin</option>
                    <option value="bm">Bermudes</option>
                    <option value="bt">Bhoutan</option>
                    <option value="by">Biélorussie</option>
                    <option value="bo">Bolivie</option>
                    <option value="ba">Bosnie-Herzégovine</option>
                    <option value="bw">Botswana</option>
                    <option value="br">Brésil</option>
                    <option value="bn">Brunéi Darussalam</option>
                    <option value="bg">Bulgarie</option>
                    <option value="bf">Burkina Faso</option>
                    <option value="bi">Burundi</option>
                    <option value="kh">Cambodge</option>
                    <option value="cm">Cameroun</option>
                    <option value="ca">Canada</option>
                    <option value="cv">Cap-Vert</option>
                    <option value="ea">Ceuta et Melilla</option>
                    <option value="cl">Chili</option>
                    <option value="cn">Chine</option>
                    <option value="cy">Chypre</option>
                    <option value="co">Colombie</option>
                    <option value="km">Comores</option>
                    <option value="cg">Congo-Brazzaville</option>
                    <option value="cd">Congo-Kinshasa</option>
                    <option value="kp">Corée du Nord</option>
                    <option value="kr">Corée du Sud</option>
                    <option value="cr">Costa Rica</option>
                    <option value="ci">Côte d’Ivoire</option>
                    <option value="hr">Croatie</option>
                    <option value="cu">Cuba</option>
                    <option value="cw">Curaçao</option>
                    <option value="dk">Danemark</option>
                    <option value="dg">Diego Garcia</option>
                    <option value="dj">Djibouti</option>
                    <option value="dm">Dominique</option>
                    <option value="eg">Égypte</option>
                    <option value="sv">El Salvador</option>
                    <option value="ae">Émirats arabes unis</option>
                    <option value="ec">Équateur</option>
                    <option value="er">Érythrée</option>
                    <option value="es">Espagne</option>
                    <option value="ee">Estonie</option>
                    <option value="va">État de la Cité du Vatican</option>
                    <option value="fm">États fédérés de Micronésie</option>
                    <option value="us">États-Unis</option>
                    <option value="et">Éthiopie</option>
                    <option value="fj">Fidji</option>
                    <option value="fi">Finlande</option>
                    <option selected="selected" value="fr">France</option>
                    <option value="ga">Gabon</option>
                    <option value="gm">Gambie</option>
                    <option value="ge">Géorgie</option>
                    <option value="gs">Géorgie du Sud et les Îles Sandwich du Sud</option>
                    <option value="gh">Ghana</option>
                    <option value="gi">Gibraltar</option>
                    <option value="gr">Grèce</option>
                    <option value="gd">Grenade</option>
                    <option value="gl">Groenland</option>
                    <option value="gp">Guadeloupe</option>
                    <option value="gu">Guam</option>
                    <option value="gt">Guatemala</option>
                    <option value="gg">Guernesey</option>
                    <option value="gn">Guinée</option>
                    <option value="gw">Guinée-Bissau</option>
                    <option value="gq">Guinée équatoriale</option>
                    <option value="gy">Guyana</option>
                    <option value="gf">Guyane française</option>
                    <option value="ht">Haïti</option>
                    <option value="hn">Honduras</option>
                    <option value="hu">Hongrie</option>
                    <option value="bv">Île Bouvet</option>
                    <option value="cx">Île Christmas</option>
                    <option value="cp">Île Clipperton</option>
                    <option value="ac">Île de l’Ascension</option>
                    <option value="im">Île de Man</option>
                    <option value="nf">Île Norfolk</option>
                    <option value="ax">Îles Åland</option>
                    <option value="ky">Îles Caïmans</option>
                    <option value="ic">Îles Canaries</option>
                    <option value="cc">Îles Cocos (Keeling)</option>
                    <option value="ck">Îles Cook</option>
                    <option value="fo">Îles Féroé</option>
                    <option value="hm">Îles Heard et MacDonald</option>
                    <option value="fk">Îles Malouines</option>
                    <option value="mp">Îles Mariannes du Nord</option>
                    <option value="mh">Îles Marshall</option>
                    <option value="um">Îles mineures éloignées des États-Unis</option>
                    <option value="sb">Îles Salomon</option>
                    <option value="tc">Îles Turques-et-Caïques</option>
                    <option value="vg">Îles Vierges britanniques</option>
                    <option value="vi">Îles Vierges des États-Unis</option>
                    <option value="in">Inde</option>
                    <option value="id">Indonésie</option>
                    <option value="iq">Irak</option>
                    <option value="ir">Iran</option>
                    <option value="ie">Irlande</option>
                    <option value="is">Islande</option>
                    <option value="il">Israël</option>
                    <option value="it">Italie</option>
                    <option value="jm">Jamaïque</option>
                    <option value="jp">Japon</option>
                    <option value="je">Jersey</option>
                    <option value="jo">Jordanie</option>
                    <option value="kz">Kazakhstan</option>
                    <option value="ke">Kenya</option>
                    <option value="kg">Kirghizistan</option>
                    <option value="ki">Kiribati</option>
                    <option value="xk">Kosovo</option>
                    <option value="kw">Koweït</option>
                    <option value="la">Laos</option>
                    <option value="re">La Réunion</option>
                    <option value="ls">Lesotho</option>
                    <option value="lv">Lettonie</option>
                    <option value="lb">Liban</option>
                    <option value="lr">Libéria</option>
                    <option value="ly">Libye</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lituanie</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mk">Macédoine</option>
                    <option value="mg">Madagascar</option>
                    <option value="my">Malaisie</option>
                    <option value="mw">Malawi</option>
                    <option value="mv">Maldives</option>
                    <option value="ml">Mali</option>
                    <option value="mt">Malte</option>
                    <option value="ma">Maroc</option>
                    <option value="mq">Martinique</option>
                    <option value="mu">Maurice</option>
                    <option value="mr">Mauritanie</option>
                    <option value="yt">Mayotte</option>
                    <option value="mx">Mexique</option>
                    <option value="md">Moldavie</option>
                    <option value="mc">Monaco</option>
                    <option value="mn">Mongolie</option>
                    <option value="me">Monténégro</option>
                    <option value="ms">Montserrat</option>
                    <option value="mz">Mozambique</option>
                    <option value="mm">Myanmar</option>
                    <option value="na">Namibie</option>
                    <option value="nr">Nauru</option>
                    <option value="np">Népal</option>
                    <option value="ni">Nicaragua</option>
                    <option value="ne">Niger</option>
                    <option value="ng">Nigéria</option>
                    <option value="nu">Niue</option>
                    <option value="no">Norvège</option>
                    <option value="nc">Nouvelle-Calédonie</option>
                    <option value="nz">Nouvelle-Zélande</option>
                    <option value="om">Oman</option>
                    <option value="ug">Ouganda</option>
                    <option value="uz">Ouzbékistan</option>
                    <option value="pk">Pakistan</option>
                    <option value="pw">Palaos</option>
                    <option value="pa">Panama</option>
                    <option value="pg">Papouasie-Nouvelle-Guinée</option>
                    <option value="py">Paraguay</option>
                    <option value="nl">Pays-Bas</option>
                    <option value="bq">Pays-Bas caribéens</option>
                    <option value="pe">Pérou</option>
                    <option value="ph">Philippines</option>
                    <option value="pn">Pitcairn</option>
                    <option value="pl">Pologne</option>
                    <option value="pf">Polynésie française</option>
                    <option value="pr">Porto Rico</option>
                    <option value="pt">Portugal</option>
                    <option value="qa">Qatar</option>
                    <option value="hk">R.A.S. chinoise de Hong Kong</option>
                    <option value="mo">R.A.S. chinoise de Macao</option>
                    <option value="zz">région indéterminée</option>
                    <option value="cf">République centrafricaine</option>
                    <option value="do">République dominicaine</option>
                    <option value="cz">République tchèque</option>
                    <option value="ro">Roumanie</option>
                    <option value="gb">Royaume-Uni</option>
                    <option value="ru">Russie</option>
                    <option value="rw">Rwanda</option>
                    <option value="eh">Sahara occidental</option>
                    <option value="bl">Saint-Barthélemy</option>
                    <option value="sh">Sainte-Hélène</option>
                    <option value="lc">Sainte-Lucie</option>
                    <option value="kn">Saint-Kitts-et-Nevis</option>
                    <option value="sm">Saint-Marin</option>
                    <option value="mf">Saint-Martin (partie française)</option>
                    <option value="sx">Saint-Martin (partie néerlandaise)</option>
                    <option value="pm">Saint-Pierre-et-Miquelon</option>
                    <option value="vc">Saint-Vincent-et-les Grenadines</option>
                    <option value="ws">Samoa</option>
                    <option value="as">Samoa américaines</option>
                    <option value="st">Sao Tomé-et-Principe</option>
                    <option value="sn">Sénégal</option>
                    <option value="rs">Serbie</option>
                    <option value="sc">Seychelles</option>
                    <option value="sl">Sierra Leone</option>
                    <option value="sg">Singapour</option>
                    <option value="sk">Slovaquie</option>
                    <option value="si">Slovénie</option>
                    <option value="so">Somalie</option>
                    <option value="sd">Soudan</option>
                    <option value="ss">Soudan du Sud</option>
                    <option value="lk">Sri Lanka</option>
                    <option value="se">Suède</option>
                    <option value="ch">Suisse</option>
                    <option value="sr">Suriname</option>
                    <option value="sj">Svalbard et Jan Mayen</option>
                    <option value="sz">Swaziland</option>
                    <option value="sy">Syrie</option>
                    <option value="tj">Tadjikistan</option>
                    <option value="tw">Taïwan</option>
                    <option value="tz">Tanzanie</option>
                    <option value="td">Tchad</option>
                    <option value="tf">Terres australes françaises</option>
                    <option value="io">Territoire britannique de l’océan Indien</option>
                    <option value="ps">Territoires palestiniens</option>
                    <option value="th">Thaïlande</option>
                    <option value="tl">Timor oriental</option>
                    <option value="tg">Togo</option>
                    <option value="tk">Tokelau</option>
                    <option value="to">Tonga</option>
                    <option value="tt">Trinité-et-Tobago</option>
                    <option value="ta">Tristan da Cunha</option>
                    <option value="tn">Tunisie</option>
                    <option value="tm">Turkménistan</option>
                    <option value="tr">Turquie</option>
                    <option value="tv">Tuvalu</option>
                    <option value="ua">Ukraine</option>
                    <option value="uy">Uruguay</option>
                    <option value="vu">Vanuatu</option>
                    <option value="ve">Venezuela</option>
                    <option value="vn">Vietnam</option>
                    <option value="wf">Wallis-et-Futuna</option>
                    <option value="ye">Yémen</option>
                    <option value="zm">Zambie</option>
                    <option value="zw">Zimbabwe</option>
                </select>
            </div>
 </div>
<!-- pays brevet -->
<div class="form-group row " id="country-brevet" style="display: none;">
        <label class="col-md-3 control-label required" for="country">Pays</label>
            <div class="col-md-9">
                <select name="country" class="form-control input-sm" id="country">
                    <option value=""></option>
                    <option value="af">Afghanistan</option>
                    <option value="za">Afrique du Sud</option>
                    <option value="al">Albanie</option>
                    <option value="dz">Algérie</option>
                    <option value="de">Allemagne</option>
                    <option value="ad">Andorre</option>
                    <option value="ao">Angola</option>
                    <option value="ai">Anguilla</option>
                    <option value="aq">Antarctique</option>
                    <option value="ag">Antigua-et-Barbuda</option>
                    <option value="an">Antilles néerlandaises</option>
                    <option value="sa">Arabie saoudite</option>
                    <option value="ar">Argentine</option>
                    <option value="am">Arménie</option>
                    <option value="aw">Aruba</option>
                    <option value="au">Australie</option>
                    <option value="at">Autriche</option>
                    <option value="az">Azerbaïdjan</option>
                    <option value="bs">Bahamas</option>
                    <option value="bh">Bahreïn</option>
                    <option value="bd">Bangladesh</option>
                    <option value="bb">Barbade</option>
                    <option value="be">Belgique</option>
                    <option value="bz">Belize</option>
                    <option value="bj">Bénin</option>
                    <option value="bm">Bermudes</option>
                    <option value="bt">Bhoutan</option>
                    <option value="by">Biélorussie</option>
                    <option value="bo">Bolivie</option>
                    <option value="ba">Bosnie-Herzégovine</option>
                    <option value="bw">Botswana</option>
                    <option value="br">Brésil</option>
                    <option value="bn">Brunéi Darussalam</option>
                    <option value="bg">Bulgarie</option>
                    <option value="bf">Burkina Faso</option>
                    <option value="bi">Burundi</option>
                    <option value="kh">Cambodge</option>
                    <option value="cm">Cameroun</option>
                    <option value="ca">Canada</option>
                    <option value="cv">Cap-Vert</option>
                    <option value="ea">Ceuta et Melilla</option>
                    <option value="cl">Chili</option>
                    <option value="cn">Chine</option>
                    <option value="cy">Chypre</option>
                    <option value="co">Colombie</option>
                    <option value="km">Comores</option>
                    <option value="cg">Congo-Brazzaville</option>
                    <option value="cd">Congo-Kinshasa</option>
                    <option value="kp">Corée du Nord</option>
                    <option value="kr">Corée du Sud</option>
                    <option value="cr">Costa Rica</option>
                    <option value="ci">Côte d’Ivoire</option>
                    <option value="hr">Croatie</option>
                    <option value="cu">Cuba</option>
                    <option value="cw">Curaçao</option>
                    <option value="dk">Danemark</option>
                    <option value="dg">Diego Garcia</option>
                    <option value="dj">Djibouti</option>
                    <option value="dm">Dominique</option>
                    <option value="eg">Égypte</option>
                    <option value="sv">El Salvador</option>
                    <option value="ae">Émirats arabes unis</option>
                    <option value="ec">Équateur</option>
                    <option value="er">Érythrée</option>
                    <option value="es">Espagne</option>
                    <option value="ee">Estonie</option>
                    <option value="va">État de la Cité du Vatican</option>
                    <option value="fm">États fédérés de Micronésie</option>
                    <option value="us">États-Unis</option>
                    <option value="et">Éthiopie</option>
                    <option value="fj">Fidji</option>
                    <option value="fi">Finlande</option>
                    <option selected="selected" value="fr">France</option>
                    <option value="ga">Gabon</option>
                    <option value="gm">Gambie</option>
                    <option value="ge">Géorgie</option>
                    <option value="gs">Géorgie du Sud et les Îles Sandwich du Sud</option>
                    <option value="gh">Ghana</option>
                    <option value="gi">Gibraltar</option>
                    <option value="gr">Grèce</option>
                    <option value="gd">Grenade</option>
                    <option value="gl">Groenland</option>
                    <option value="gp">Guadeloupe</option>
                    <option value="gu">Guam</option>
                    <option value="gt">Guatemala</option>
                    <option value="gg">Guernesey</option>
                    <option value="gn">Guinée</option>
                    <option value="gw">Guinée-Bissau</option>
                    <option value="gq">Guinée équatoriale</option>
                    <option value="gy">Guyana</option>
                    <option value="gf">Guyane française</option>
                    <option value="ht">Haïti</option>
                    <option value="hn">Honduras</option>
                    <option value="hu">Hongrie</option>
                    <option value="bv">Île Bouvet</option>
                    <option value="cx">Île Christmas</option>
                    <option value="cp">Île Clipperton</option>
                    <option value="ac">Île de l’Ascension</option>
                    <option value="im">Île de Man</option>
                    <option value="nf">Île Norfolk</option>
                    <option value="ax">Îles Åland</option>
                    <option value="ky">Îles Caïmans</option>
                    <option value="ic">Îles Canaries</option>
                    <option value="cc">Îles Cocos (Keeling)</option>
                    <option value="ck">Îles Cook</option>
                    <option value="fo">Îles Féroé</option>
                    <option value="hm">Îles Heard et MacDonald</option>
                    <option value="fk">Îles Malouines</option>
                    <option value="mp">Îles Mariannes du Nord</option>
                    <option value="mh">Îles Marshall</option>
                    <option value="um">Îles mineures éloignées des États-Unis</option>
                    <option value="sb">Îles Salomon</option>
                    <option value="tc">Îles Turques-et-Caïques</option>
                    <option value="vg">Îles Vierges britanniques</option>
                    <option value="vi">Îles Vierges des États-Unis</option>
                    <option value="in">Inde</option>
                    <option value="id">Indonésie</option>
                    <option value="iq">Irak</option>
                    <option value="ir">Iran</option>
                    <option value="ie">Irlande</option>
                    <option value="is">Islande</option>
                    <option value="il">Israël</option>
                    <option value="it">Italie</option>
                    <option value="jm">Jamaïque</option>
                    <option value="jp">Japon</option>
                    <option value="je">Jersey</option>
                    <option value="jo">Jordanie</option>
                    <option value="kz">Kazakhstan</option>
                    <option value="ke">Kenya</option>
                    <option value="kg">Kirghizistan</option>
                    <option value="ki">Kiribati</option>
                    <option value="xk">Kosovo</option>
                    <option value="kw">Koweït</option>
                    <option value="la">Laos</option>
                    <option value="re">La Réunion</option>
                    <option value="ls">Lesotho</option>
                    <option value="lv">Lettonie</option>
                    <option value="lb">Liban</option>
                    <option value="lr">Libéria</option>
                    <option value="ly">Libye</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lituanie</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mk">Macédoine</option>
                    <option value="mg">Madagascar</option>
                    <option value="my">Malaisie</option>
                    <option value="mw">Malawi</option>
                    <option value="mv">Maldives</option>
                    <option value="ml">Mali</option>
                    <option value="mt">Malte</option>
                    <option value="ma">Maroc</option>
                    <option value="mq">Martinique</option>
                    <option value="mu">Maurice</option>
                    <option value="mr">Mauritanie</option>
                    <option value="yt">Mayotte</option>
                    <option value="mx">Mexique</option>
                    <option value="md">Moldavie</option>
                    <option value="mc">Monaco</option>
                    <option value="mn">Mongolie</option>
                    <option value="me">Monténégro</option>
                    <option value="ms">Montserrat</option>
                    <option value="mz">Mozambique</option>
                    <option value="mm">Myanmar</option>
                    <option value="na">Namibie</option>
                    <option value="nr">Nauru</option>
                    <option value="np">Népal</option>
                    <option value="ni">Nicaragua</option>
                    <option value="ne">Niger</option>
                    <option value="ng">Nigéria</option>
                    <option value="nu">Niue</option>
                    <option value="no">Norvège</option>
                    <option value="nc">Nouvelle-Calédonie</option>
                    <option value="nz">Nouvelle-Zélande</option>
                    <option value="om">Oman</option>
                    <option value="ug">Ouganda</option>
                    <option value="uz">Ouzbékistan</option>
                    <option value="pk">Pakistan</option>
                    <option value="pw">Palaos</option>
                    <option value="pa">Panama</option>
                    <option value="pg">Papouasie-Nouvelle-Guinée</option>
                    <option value="py">Paraguay</option>
                    <option value="nl">Pays-Bas</option>
                    <option value="bq">Pays-Bas caribéens</option>
                    <option value="pe">Pérou</option>
                    <option value="ph">Philippines</option>
                    <option value="pn">Pitcairn</option>
                    <option value="pl">Pologne</option>
                    <option value="pf">Polynésie française</option>
                    <option value="pr">Porto Rico</option>
                    <option value="pt">Portugal</option>
                    <option value="qa">Qatar</option>
                    <option value="hk">R.A.S. chinoise de Hong Kong</option>
                    <option value="mo">R.A.S. chinoise de Macao</option>
                    <option value="zz">région indéterminée</option>
                    <option value="cf">République centrafricaine</option>
                    <option value="do">République dominicaine</option>
                    <option value="cz">République tchèque</option>
                    <option value="ro">Roumanie</option>
                    <option value="gb">Royaume-Uni</option>
                    <option value="ru">Russie</option>
                    <option value="rw">Rwanda</option>
                    <option value="eh">Sahara occidental</option>
                    <option value="bl">Saint-Barthélemy</option>
                    <option value="sh">Sainte-Hélène</option>
                    <option value="lc">Sainte-Lucie</option>
                    <option value="kn">Saint-Kitts-et-Nevis</option>
                    <option value="sm">Saint-Marin</option>
                    <option value="mf">Saint-Martin (partie française)</option>
                    <option value="sx">Saint-Martin (partie néerlandaise)</option>
                    <option value="pm">Saint-Pierre-et-Miquelon</option>
                    <option value="vc">Saint-Vincent-et-les Grenadines</option>
                    <option value="ws">Samoa</option>
                    <option value="as">Samoa américaines</option>
                    <option value="st">Sao Tomé-et-Principe</option>
                    <option value="sn">Sénégal</option>
                    <option value="rs">Serbie</option>
                    <option value="sc">Seychelles</option>
                    <option value="sl">Sierra Leone</option>
                    <option value="sg">Singapour</option>
                    <option value="sk">Slovaquie</option>
                    <option value="si">Slovénie</option>
                    <option value="so">Somalie</option>
                    <option value="sd">Soudan</option>
                    <option value="ss">Soudan du Sud</option>
                    <option value="lk">Sri Lanka</option>
                    <option value="se">Suède</option>
                    <option value="ch">Suisse</option>
                    <option value="sr">Suriname</option>
                    <option value="sj">Svalbard et Jan Mayen</option>
                    <option value="sz">Swaziland</option>
                    <option value="sy">Syrie</option>
                    <option value="tj">Tadjikistan</option>
                    <option value="tw">Taïwan</option>
                    <option value="tz">Tanzanie</option>
                    <option value="td">Tchad</option>
                    <option value="tf">Terres australes françaises</option>
                    <option value="io">Territoire britannique de l’océan Indien</option>
                    <option value="ps">Territoires palestiniens</option>
                    <option value="th">Thaïlande</option>
                    <option value="tl">Timor oriental</option>
                    <option value="tg">Togo</option>
                    <option value="tk">Tokelau</option>
                    <option value="to">Tonga</option>
                    <option value="tt">Trinité-et-Tobago</option>
                    <option value="ta">Tristan da Cunha</option>
                    <option value="tn">Tunisie</option>
                    <option value="tm">Turkménistan</option>
                    <option value="tr">Turquie</option>
                    <option value="tv">Tuvalu</option>
                    <option value="ua">Ukraine</option>
                    <option value="uy">Uruguay</option>
                    <option value="vu">Vanuatu</option>
                    <option value="ve">Venezuela</option>
                    <option value="vn">Vietnam</option>
                    <option value="wf">Wallis-et-Futuna</option>
                    <option value="ye">Yémen</option>
                    <option value="zm">Zambie</option>
                    <option value="zw">Zimbabwe</option>
                </select>
            </div>
</div>

 <!-- niveau cours -->
    <div class="form-group row " id="lectureType-element" style="display: none;">
        <label class="col-md-3 control-label required" for="lectureType">Niveau du cours</label>
            <div class="col-md-9">
                <select name="lectureType" class="form-control input-sm" id="lectureType">
                    <option value="1">DEA</option>
                    <option value="2">École thématique</option>
                    <option value="7">3ème cycle</option>
                    <option value="10">École d'ingénieur</option>
                    <option value="11">Licence</option>
                    <option value="12">Master</option>
                    <option selected="selected" value="13">Doctorat</option>
                    <option value="14">DEUG</option>
                    <option value="15">Maitrise</option>
                </select>
            </div>
    </div>

<!-- Auteur -->
<div>
            <div class="row">
                <div class="input-group add-authors-div" id="aut_new">
                    <span class="input-group-addon add-author-label">Ajouter un auteur : </span>
                    <input class="form-control ui-autocomplete-input" id="searchAuthor" type="text" placeholder="Esteban Clarice" autocomplete="off">
                </div>

            </div>
</div>

<button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold m-5" id="pro" type="submit">Valider</button>  

<style>
    .tree{
        padding:0px;
    }
    ul{
        margin-top:0px;
        margin-bottom:10px;
    }
    .tree li {
        list-style-type: none !important;
    }
    div, table, label, input, button, select, textarea{ 
        font-family:Arial,Helvetica,sans-serif;
        font-size :10;
        color:#826b6b;
    } 
    .tree label{
        display: inline-block;
    }

    *,*::before, *::after{
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
    }

    input[typr='radio'],input[type='checkbox']{
        margin:4px 0 0;
        margin-top:1px \9;
        line-height:normal;
    }
    input[type='checkbox'], input[type='radio']{
        padding:0;
        box-sizing:border-box;
    }
</style>
    
    </form>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<?php 

if(isset($_POST['title']) OR isset($_POST['journal']) OR isset($_POST['date-article']) OR isset($_POST['searchAuthor']) OR isset($_POST['researchData']) OR isset($_POST['bookTitle']) OR 
isset($_POST['date-chapOuvrage']) OR isset($_POST['date-direction']) OR isset($_POST['date-brevet']) OR isset($_POST['number']) OR isset($_POST['journal-autre']) OR isset($_POST['bookTitle-autre']) OR 
isset($_POST['date-autre']) OR isset($_POST['description']) OR isset($_POST['date-rapport']) OR isset($_POST['authorityInstitution1']) OR isset($_POST['authorityInstitution2']) OR isset($_POST['abstract1']) OR 
isset($_POST['abstract2']) OR isset($_POST['keyword1']) OR isset($_POST['keyword2']) OR isset($_POST['directeurThese1']) OR isset($_POST['directeurThese2']) OR isset($_POST['date-these']) OR 
isset($_POST['organismeDelivrance1']) OR isset($_POST['organismeDelivrance2']) OR isset($_POST['keyword-hdr1']) OR isset($_POST['keyword-hdr2']) OR isset($_POST['date-hdr']) OR isset($_POST['organismeHdr1']) OR 
isset($_POST['organismeHdr2']) OR isset($_POST['presidentJury1']) OR isset($_POST['presidentJury1']) OR isset($_POST['date-cours']) OR isset($_POST['keyword-image1']) OR isset($_POST['keyword-image2']) OR 
isset($_POST['date-image']) OR isset($_POST['circa']) OR isset($_POST['watermark']) OR isset($_POST['date-video']) OR isset($_POST['date-son']) OR isset($_POST['date-carte']) )
{
        $brouillon = array();

        $brouillon['title'] = $_POST['title'];
        $brouillon['journal'] = $_POST['journal'];
        $brouillon['date-article'] = $_POST['article'];
        $brouillon['searchAuthor'] = $_POST['searchAuthor'];
        $brouillon['researchData'] = $_POST['researchData'];
        $brouillon['bookTitle'] = $_POST['bookTitle'];
        $brouillon['date-chapOuvrage'] = $_POST['date-chapOuvrage'];
        $brouillon['date-direction'] = $_POST['date-direction'];
        $brouillon['date-brevet'] = $_POST['date-brevet'];
        $brouillon['number'] = $_POST['number'];
        $brouillon['journal-autre'] = $_POST['journal-autre'];
        $brouillon['bookTitle-autre'] = $_POST['bookTitle-autre'];
        $brouillon['date-autre'] = $_POST['date-autre'];
        $brouillon['description'] = $_POST['description'];
        $brouillon['date-rapport'] = $_POST['date-rapport'];
        $brouillon['authorityInstitution1'] = $_POST['authorityInstitution1'];
        $brouillon['authorityInstitution2'] = $_POST['authorityInstitution2'];
        $brouillon['abstract1'] = $_POST['abstract1'];
        $brouillon['abstract2'] = $_POST['abstract2'];
        $brouillon['keyword1'] = $_POST['keyword1'];
        $brouillon['keyword2'] = $_POST['keyword2'];
        $brouillon['directeurThese1'] = $_POST['directeurThese1'];
        $brouillon['directeurThese2'] = $_POST['directeurThese2'];
        $brouillon['date-these'] = $_POST['date-these'];
        $brouillon['organismeDelivrance1'] = $_POST['organismeDelivrance1'];
        $brouillon['organismeDelivrance2'] = $_POST['organismeDelivrance2'];
        $brouillon['keyword-hdr1'] = $_POST['keyword-hdr1'];
        $brouillon['keyword-hdr2'] = $_POST['keyword-hdr2'];
        $brouillon['date-hdr'] = $_POST['date-hdr'];
        $brouillon['organismeHdr1'] = $_POST['organismeHdr1'];
        $brouillon['organismeHdr2'] = $_POST['organismeHdr2'];
        $brouillon['presidentJury1'] = $_POST['presidentJury1'];
        $brouillon['presidentJury2'] = $_POST['presidentJury2'];
        $brouillon['date-cours'] = $_POST['date-cours'];
        $brouillon['keyword-image1'] = $_POST['keyword-image1'];
        $brouillon['keyword-image2'] = $_POST['keyword-image2'];
        $brouillon['date-image'] = $_POST['date-image'];
        $brouillon['circa'] = $_POST['circa'];
        $brouillon['watermark'] = $_POST['watermark'];
        $brouillon['date-video'] = $_POST['date-video'];
        $brouillon['date-son'] = $_POST['date-son'];
        $brouillon['date-carte'] = $_POST['date-carte'];

        $js = file_get_contents('brouillon.json');

        $js = json_decode($js,true);

        $js[]= $brouillon;

        $js = json_encode($js);

        file_put_contents('brouillon.json', $js);
}

require_once(PATH_VIEWS.'footer.php'); ?>