<?php
require_once(PATH_MODELS.'BrouillonDAO.php');
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
                'searchAuthor' => isset($_POST['searchAuthor'])? $_POST['searchAuthor'] : null,
                'researchData' => isset($_POST['researchData'])? $_POST['researchData'] : null,
                'bookTitle' => isset($_POST['bookTitle'])? $_POST['bookTitle'] : null,
                'date-chapOuvrage' => isset($_POST['date-chapOuvrage'])? $_POST['date-chapOuvrage'] : null,
                'date-direction' => isset($_POST['date-direction'])? $_POST['date-direction'] : null,
                'date-brevet' => isset($_POST['date-brevet'])? $_POST['date-brevet'] : null,
                'number' => isset($_POST['number'])? $_POST['number'] : null,
                'journal-autre' => isset($_POST['journal-autre'])? $_POST['journal-autre'] : null,
                'bookTitle-autre' => isset($_POST['bookTitle-autre'])? $_POST['bookTitle-autre'] : null,
                'date-autre' => isset($_POST['date-autre'])? $_POST['date-autre'] : null,
                'description' => isset($_POST['description'])? $_POST['description'] : null,
                'date-rapport' => isset($_POST['date-rapport'])? $_POST['date-rapport'] : null,
                'authorityInstitution1' => isset($_POST['authorityInstitution1'])? $_POST['authorityInstitution1'] : null,
                'authorityInstitution2' => isset($_POST['authorityInstitution2'])? $_POST['authorityInstitution2'] : null,
                'abstract1' => isset($_POST['abstract1'])? $_POST['abstract1'] : null,
                'abstract2' => isset($_POST['abstract2'])? $_POST['abstract2'] : null,
                'keyword1' => isset($_POST['keyword1'])? $_POST['keyword1'] : null,
                'keyword2' => isset($_POST['keyword2'])? $_POST['keyword2'] : null,
                'directeurThese1' => isset($_POST['directeurThese1'])? $_POST['directeurThese1'] : null,
                'directeurThese2' => isset($_POST['directeurThese2'])? $_POST['directeurThese2'] : null,
                'date-these' => isset($_POST['date-these'])? $_POST['date-these'] : null,
                'organismeDelivrance1' => isset($_POST['organismeDelivrance1'])? $_POST['organismeDelivrance1'] : null,
                'organismeDelivrance2' => isset($_POST['organismeDelivrance2'])? $_POST['organismeDelivrance2'] : null,
                'keyword-hdr1' => isset($_POST['keyword-hdr1'])? $_POST['keyword-hdr1'] : null,
                'keyword-hdr2' => isset($_POST['keyword-hdr2'])? $_POST['keyword-hdr2'] : null,
                'date-hdr' => isset($_POST['date-hdr'])? $_POST['journal'] : null,
                'organismeHdr1' => isset($_POST['organismeHdr1'])? $_POST['organismeHdr1'] : null,
                'organismeHdr2' => isset($_POST['organismeHdr2'])? $_POST['organismeHdr2'] : null,
                'presidentJury1' => isset($_POST['presidentJury1'])? $_POST['presidentJury1'] : null,
                'presidentJury2' => isset($_POST['presidentJury2'])? $_POST['presidentJury2'] : null,
                'circa' => isset($_POST['circa'])? $_POST['circa'] : null,

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


	
require_once(PATH_VIEWS.$page.'.php');
?>