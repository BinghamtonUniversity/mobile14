<?php

/* 
 * query directory server with passed params
 */

$directoryServer = "directory.binghamton.edu/";
$directoryScript = "directory/dir_output.results";
$params = array(
        "output" => "json",
        "cols" => "ABDFLMCKIPQ",
        "vkey" => "bMobi"
    );

// if "q" var is passed, make this the search value
$search = isset($_REQUEST['q']) ? urlencode($_REQUEST['q']) : '';

// if search term is present, query the directory
if (strlen($search)){
    // append serch term to params
    $params["search"]=$search;
    
    // create directory URL to call
    $callURL = "http://".$directoryServer.$directoryScript."?".  http_build_query($params);
            $response = file_get_contents($callURL);
            
    echo $response; 
}

?>
