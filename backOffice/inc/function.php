<?php

function debug($data, $var_dump = false) {
    echo "<pre style=\"background:#" . dechex(rand(0x000000, 0xFFFFFF)) . "\">";
    if (!$var_dump) {
        print_r($data); 
    } else {
        var_dump($data);
    }
    echo "</pre>";
}

//BDD INSERT
function bdd_insert($query, $params = []) {
    require 'bdd.php';
    if($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
        
    }else{
        $req = $bdd->query($query);
    }
    
    $inserted = $req->rowCount();//compte le nb de lignes ajoutées lors de la requete
    return $inserted;//$delete = nb d'élements supprimés
}

//BDD SELECT
function bdd_select($query, $params){
    require 'bdd.php';
//    $params = [];
    if($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
        
    }else{
        $req = $bdd->query($query);
    }
    
    $data = $req->fetchAll();
    return $data;
}

//BDD UPDATE
function bdd_update($query, $params = []) {
    require 'bdd.php';
    if($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
        
    }else{
        $req = $bdd->query($query);
    }
    
    $updated = $req->rowCount();
    return $updated;
}

//BDD DELETE
function bdd_delete($query, $params = []) {
    require 'bdd.php';
    if($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
        
    }else{
        $req = $bdd->query($query);
    }
    
    $deleted = $req->rowCount();//compte le nb de lignes suppr lors de la requete
    //Lors d'un "delete", php retourne le nombre d'entrée supprimées
    return $deleted;//$delete = nb d'élements supprimés
}

function account_exists() {
    $membre = bdd_select("SELECT id, password FROM login WHERE mail = ?", [$_POST['mail']]);
//    debug($_POST['mail']);
//    debug($membre);
    
    if(!empty($membre) && password_verify( $_POST['password'], $membre[0]['password'] )){
        debug($membre[0]);
        return $membre[0];
    }else{
        return [];
    }
}

function password_save(string $password = ''){
    $newpassword = $_POST['newpassword'] ?? $password;
//    debug($newpassword);
    if(isset($_POST['mail'])){
        //gestion pour 'loubli de mdp
        bdd_update('UPDATE login SET password = :password WHERE mail = :mail', [
            'password'=> password_hash($newpassword, PASSWORD_DEFAULT),
            'mail'=>$_POST['mail']
        ]);
        
    }else{
        //gestion pour changement de mdp
        bdd_update('UPDATE login SET password = :password WHERE id = :id', [
            'password'=> password_hash($newpassword, PASSWORD_DEFAULT),
            'id'=>$_SESSION['id']
        ]);
    }
}

function read_article(){
    $salon = bdd_select("SELECT * FROM barbier", []);
    if(!empty($salon)){
        return $salon;
    }else{
        return [];
    }
}

function read_position() {
    $position = bdd_select("SELECT ST_AsText(lat_long) FROM barbier");
    $position = bdd_select("SELECT ST_X(lat_long), ST_Y(lat_long), ST_AsText(lat_long) FROM barbier", []);
    if(!empty($position)){
        return $position;
    }else{
        return [];
    }
}

function read_for_updt($id){
    $salon = bdd_select("SELECT * FROM barbier WHERE id = ?", [$id]);
    if(!empty($salon)){
        return $salon;
    }else{
        return [];
    }
}

function mail_free($id = 0) {
    if($id == 0){
        $membre = bdd_select("SELECT id FROM barbier WHERE mail = ?", [$_POST['mail']]);
    }else{
        $membre = bdd_select("SELECT id FROM barbier WHERE mail = ? AND id!=?", [$_POST['mail'], $id]);
    }
    
    if( $membre ){
        return false;
    }else{
        return true;
    }
};

function euro($prix){
    $euro = '';
    for ($i = 0; $i < $prix; $i++){
        $euro .= "€";
    }
    
    return $euro;
}

function img_default($img){
    if(isset($img)){
        return $img;
    }else{
        return 'img/salon/default-profile.jpg';
    }
}

function mail_html($subject, $message){
    $headers = 'From: lala.roudez@gmail.com' . "\r\n";
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8';
    
    mail( $_POST['mail'], $subject, $message, $headers );
}

function password_ok() {
  $membre = bdd_select( 'SELECT password FROM login WHERE id = ?', [$_SESSION['id']] );

  if ( password_verify( $_POST['oldpassword'], $membre[0]['password'] ) ) {
    return true;
  }
  else {
    return false;
  }
}