<?php
require_once(PATH_MODELS.'BrouillonDAO.php');
require_once(PATH_MODELS.'PublicationDAO.php');
// Gestion des erreurs
if (isset($erreur)) {
    $alert = choixAlert($erreur);
}

function sendPub($xml){
    $file = file_get_contents($xml, true);

    // create a new cURL resource
    $ch = curl_init();
    //print_r(curl_getinfo($ch));
    curl_setopt($ch, CURLOPT_URL, "https://api-preprod.archives-ouvertes.fr/sword/hal/");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,TRUE);
    //curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    $headers = array("Content-Type:text/xml",
    "Authorization: Basic YWRtaW4tcG9ydGFpbDphZG1pbi1wb3J0YWls", 
    "Packaging:http://purl.org/net/sword-types/AOfr",
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
    $response = curl_exec($ch);
    print_r("reponse:".$response."\n\n\n");
    print_r(curl_getinfo($ch));
    echo "\nErrno:";
    print_r(curl_errno($ch));
    echo "\nError:";
    print_r(curl_error($ch));

    curl_close($ch);
}
    
//sendPub("./test.xml");
/*OR isset($_POST['journal']) OR isset($_POST['date-article']) OR isset($_POST['searchAuthor']) OR isset($_POST['researchData']) OR isset($_POST['bookTitle']) OR 
    isset($_POST['date-chapOuvrage']) OR isset($_POST['date-direction']) OR isset($_POST['date-brevet']) OR isset($_POST['number']) OR isset($_POST['journal-autre']) OR isset($_POST['bookTitle-autre']) OR 
    isset($_POST['date-autre']) OR isset($_POST['description']) OR isset($_POST['date-rapport']) OR isset($_POST['authorityInstitution1']) OR isset($_POST['authorityInstitution2']) OR isset($_POST['abstract1']) OR 
    isset($_POST['abstract2']) OR isset($_POST['keyword1']) OR isset($_POST['keyword2']) OR isset($_POST['directeurThese1']) OR isset($_POST['directeurThese2']) OR isset($_POST['date-these']) OR 
    isset($_POST['organismeDelivrance1']) OR isset($_POST['organismeDelivrance2']) OR isset($_POST['keyword-hdr1']) OR isset($_POST['keyword-hdr2']) OR isset($_POST['date-hdr']) OR isset($_POST['organismeHdr1']) OR 
    isset($_POST['organismeHdr2']) OR isset($_POST['presidentJury1']) OR isset($_POST['presidentJury1'])  OR isset($_POST['circa'])
    */

if(isset($_POST['br']))
{
    
            $brouillon = [
                'titre' => isset($_POST['titre'])? $_POST['titre'] : null,
                'nomrevue' => isset($_POST['nomrevue'])? $_POST['nomrevue'] : null,
                'date-article' => isset($_POST['date-article'])? $_POST['date-article'] : null,
                'auteur' => isset($_POST['auteur'])? $_POST['auteur'] : null,
                'titreOuvrage' => isset($_POST['titreOuvrage'])? $_POST['titreOuvrage'] : null,
                'dateOuvrage' => isset($_POST['dateOuvrage'])? $_POST['dateOuvrage'] : null,
                'dateChapOuvrage' => isset($_POST['dateChapOuvrage'])? $_POST['dateChapOuvrage'] : null,
                'dateDirection' => isset($_POST['dateDirection'])? $_POST['dateDirection'] : null,
                'dateBrevet' => isset($_POST['dateBrevet'])? $_POST['dateBrevet'] : null,
                'numberBrevet' => isset($_POST['numberBrevet'])? $_POST['numberBrevet'] : null,
                'journalAutre' => isset($_POST['journalAutre'])? $_POST['journalAutre'] : null,
                'reportType' => isset($_POST['reportType'])? $_POST['reportType'] : null,
                'bookTitleAutre' => isset($_POST['bookTitleAutre'])? $_POST['bookTitleAutre'] : null,
                'dateAutre' => isset($_POST['dateAutre'])? $_POST['dateAutre'] : null,
                'descriptionAutre' => isset($_POST['descriptionAutre'])? $_POST['descriptionAutre'] : null,
                'paraitreArticle' => isset($_POST['paraitreArticle'])? $_POST['paraitreArticle'] : null,
                'paraitreChapOuvrage' => isset($_POST['paraitreChapOuvrage'])? $_POST['paraitreChapOuvrage'] : null,
                'paraitreOuvrage' => isset($_POST['paraitreOuvrage'])? $_POST['paraitreOuvrage'] : null,
                'paraitreDirection' => isset($_POST['paraitreDirection'])? $_POST['paraitreDirection'] : null,
                'dateRapport' => isset($_POST['dateRapport'])? $_POST['dateRapport'] : null,
                'authorityInstitution1' => isset($_POST['authorityInstitution1'])? $_POST['authorityInstitution1'] : null,
                'authorityInstitution2' => isset($_POST['authorityInstitution2'])? $_POST['authorityInstitution2'] : null,
                'abstract1' => isset($_POST['abstract1'])? $_POST['abstract1'] : null,
                'abstract2' => isset($_POST['abstract2'])? $_POST['abstract2'] : null,
                'keywordThese1' => isset($_POST['keywordThese1'])? $_POST['keywordThese1'] : null,
                'keywordThese2' => isset($_POST['keywordThese2'])? $_POST['keywordThese2'] : null,
                'directeurThese1' => isset($_POST['directeurThese1'])? $_POST['directeurThese1'] : null,
                'directeurThese2' => isset($_POST['directeurThese2'])? $_POST['directeurThese2'] : null,
                'dateThese' => isset($_POST['dateThese'])? $_POST['dateThese'] : null,
                'organismeDelivrance1' => isset($_POST['organismeDelivrance1'])? $_POST['organismeDelivrance1'] : null,
                'organismeDelivrance2' => isset($_POST['organismeDelivrance2'])? $_POST['organismeDelivrance2'] : null,
                'keywordHdr1' => isset($_POST['keywordHdr1'])? $_POST['keywordHdr1'] : null,
                'keywordHdr2' => isset($_POST['keywordHdr2'])? $_POST['keywordHdr2'] : null,
                'dateHdr' => isset($_POST['dateHdr'])? $_POST['dateHdr'] : null,
                'organismeHdr1' => isset($_POST['organismeHdr1'])? $_POST['organismeHdr1'] : null,
                'organismeHdr2' => isset($_POST['organismeHdr2'])? $_POST['organismeHdr2'] : null,
                'presidentJury1' => isset($_POST['presidentJury1'])? $_POST['presidentJury1'] : null,
                'presidentJury2' => isset($_POST['presidentJury2'])? $_POST['presidentJury2'] : null,

            ];

            file_get_contents('./brouillon.json');

            $jsonString = "";
            $jsonArray = json_decode($jsonString,true);

            //$js[]= $brouillon;

            foreach($brouillon as $key => $value)
            {
                $jsonArray[$key] = $value;
            }

            $jsonString = json_encode($jsonArray, JSON_FORCE_OBJECT);

            if(isset($_POST['titre']))
            {
                $title= $_POST['titre'];
                $id_brouillon = sha1($title);
            } 

            $brDAO= new BrouillonDAO();
		    $br_id= $brDAO -> creerDonnee($jsonString, $id_brouillon);

            //$fp = fopen("brouillon.json","w+"); //creation du fichier
            //fputs($fp, $js); // on écrit les données dans le data.json
            //fclose($fp); //on ferme le data.json

            file_put_contents('./brouillon.json', $jsonString);
    
}

if(isset($_POST['valider']))
{
    
            $publication = [
                'titre' => isset($_POST['titre'])? $_POST['titre'] : null,
                'nomrevue' => isset($_POST['nomrevue'])? $_POST['nomrevue'] : null,
                'date-article' => isset($_POST['date-article'])? $_POST['date-article'] : null,
                'auteur' => isset($_POST['auteur'])? $_POST['auteur'] : null,
                'titreOuvrage' => isset($_POST['titreOuvrage'])? $_POST['titreOuvrage'] : null,
                'dateOuvrage' => isset($_POST['dateOuvrage'])? $_POST['dateOuvrage'] : null,
                'dateChapOuvrage' => isset($_POST['dateChapOuvrage'])? $_POST['dateChapOuvrage'] : null,
                'dateDirection' => isset($_POST['dateDirection'])? $_POST['dateDirection'] : null,
                'dateBrevet' => isset($_POST['dateBrevet'])? $_POST['dateBrevet'] : null,
                'numberBrevet' => isset($_POST['numberBrevet'])? $_POST['numberBrevet'] : null,
                'journalAutre' => isset($_POST['journalAutre'])? $_POST['journalAutre'] : null,
                'reportType' => isset($_POST['reportType'])? $_POST['reportType'] : null,
                'bookTitleAutre' => isset($_POST['bookTitleAutre'])? $_POST['bookTitleAutre'] : null,
                'dateAutre' => isset($_POST['dateAutre'])? $_POST['dateAutre'] : null,
                'descriptionAutre' => isset($_POST['descriptionAutre'])? $_POST['descriptionAutre'] : null,
                'paraitreArticle' => isset($_POST['paraitreArticle'])? $_POST['paraitreArticle'] : null,
                'paraitreChapOuvrage' => isset($_POST['paraitreChapOuvrage'])? $_POST['paraitreChapOuvrage'] : null,
                'paraitreOuvrage' => isset($_POST['paraitreOuvrage'])? $_POST['paraitreOuvrage'] : null,
                'paraitreDirection' => isset($_POST['paraitreDirection'])? $_POST['paraitreDirection'] : null,
                'dateRapport' => isset($_POST['dateRapport'])? $_POST['dateRapport'] : null,
                'authorityInstitution1' => isset($_POST['authorityInstitution1'])? $_POST['authorityInstitution1'] : null,
                'authorityInstitution2' => isset($_POST['authorityInstitution2'])? $_POST['authorityInstitution2'] : null,
                'abstract1' => isset($_POST['abstract1'])? $_POST['abstract1'] : null,
                'abstract2' => isset($_POST['abstract2'])? $_POST['abstract2'] : null,
                'keywordThese1' => isset($_POST['keywordThese1'])? $_POST['keywordThese1'] : null,
                'keywordThese2' => isset($_POST['keywordThese2'])? $_POST['keywordThese2'] : null,
                'directeurThese1' => isset($_POST['directeurThese1'])? $_POST['directeurThese1'] : null,
                'directeurThese2' => isset($_POST['directeurThese2'])? $_POST['directeurThese2'] : null,
                'dateThese' => isset($_POST['dateThese'])? $_POST['dateThese'] : null,
                'organismeDelivrance1' => isset($_POST['organismeDelivrance1'])? $_POST['organismeDelivrance1'] : null,
                'organismeDelivrance2' => isset($_POST['organismeDelivrance2'])? $_POST['organismeDelivrance2'] : null,
                'keywordHdr1' => isset($_POST['keywordHdr1'])? $_POST['keywordHdr1'] : null,
                'keywordHdr2' => isset($_POST['keywordHdr2'])? $_POST['keywordHdr2'] : null,
                'dateHdr' => isset($_POST['dateHdr'])? $_POST['dateHdr'] : null,
                'organismeHdr1' => isset($_POST['organismeHdr1'])? $_POST['organismeHdr1'] : null,
                'organismeHdr2' => isset($_POST['organismeHdr2'])? $_POST['organismeHdr2'] : null,
                'presidentJury1' => isset($_POST['presidentJury1'])? $_POST['presidentJury1'] : null,
                'presidentJury2' => isset($_POST['presidentJury2'])? $_POST['presidentJury2'] : null,

            ];

            file_get_contents('./publication.json');

            $jsonStr = "";
            $jsonArr = json_decode($jsonStr,true);

            //$js[]= $publication;

            foreach($publication as $key => $value)
            {
                $jsonArr[$key] = $value;
            }

            $jsonStr = json_encode($jsonArr, JSON_FORCE_OBJECT);

            if(isset($_POST['titre']))
            {
                $title= $_POST['titre'];
                $id_publication = sha1($title);
            } 

            $puDAO= new PublicationDAO();
		    $pu_id= $puDAO -> creerPublication($jsonStr, $id_publication);


            file_put_contents('./publication.json', $jsonStr);
    
}
	
require_once(PATH_VIEWS.$page.'.php');
?>