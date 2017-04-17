<?php
include_once("../backOffice/inc/bdd.php");
require_once ('../backOffice/inc/function.php');

function getInfos(){
    $read = bdd_select("SELECT * FROM barbier WHERE id = :id", ['id'=>$_POST['id']]);
 
//RÉCUPÉRATION LONGITUDE ET LATITUDE
    $position = bdd_select("SELECT X(lat_long), Y(lat_long) FROM barbier WHERE id = :id", ['id'=>$_POST['id']]);
    $lat = $position[0][0];
    $long = $position[0][1];
    
    $tabInfo = array("nom"=> $read[0]['nom'],
                    "arr" => $read[0]['arrondissement'],
                    "adresse" => $read[0]['adresse'],
                    "prix" => $read[0]['prix'],
                    "site"=>$read[0]['site_web'],
                    "telephone" => $read[0]['telephone'],
                    "url_img"=> $read[0]['url_img'],
                    "name_img" =>$read[0]['name_img'],
                    "mail" => $read[0]['mail'],
                    "description" => nl2br($read[0]['description']),
                    "horaire" =>nl2br($read[0]['horraire']),
                    "url_img"=>$read[0]['url_img'],
                    "name_img"=>$read[0]['name_img'],
                    "lat"=>$lat,
                    "lng"=>$long);

    return $tabInfo;
}


if(isset($_POST['id'])){
    $res = getInfos();
//    return json_encode ($res);
    echo json_encode($res);
}

?>