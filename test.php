<?php

// create a new cURL resource
$ch = curl_init();
//print_r(curl_getinfo($ch));
curl_setopt($ch, CURLOPT_URL, "https://api-preprod.archives-ouvertes.fr/sword/hal/");
curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_USERNAME, "admin-portail");
curl_setopt($ch, CURLOPT_USERPWD, "admin-portail");
$headers = array("Content-Type:text/xml",
"Authorization: Basic ZGFmZnk6c2VjZXJldA==", 
"Packaging:http://purl.org/net/sword-types/AOfr",
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, "./@test.xml");


print_r(curl_getinfo($ch));
print_r(curl_errno($ch));
 if (curl_errno($ch)) 
    {
        // moving to display page to display curl errors
          echo curl_errno($ch) ;
          echo curl_error($ch);
          echo "err";
    } 
    else 
    {
        //getting response from server
        echo "pas err";
        $response = curl_exec($ch);
         print_r("reponse:".$response);
         curl_close($ch);
    }
?>