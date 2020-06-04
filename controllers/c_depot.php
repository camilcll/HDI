<?php
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
	
require_once(PATH_VIEWS.$page.'.php');
?>