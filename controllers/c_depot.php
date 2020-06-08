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




	
require_once(PATH_VIEWS.$page.'.php');
?>