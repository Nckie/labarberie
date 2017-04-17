<?php


function verif($name, $obj, $mail, $msg) {

    $erreur = array();

    //VERIF NOM !
    if(empty($name)){
        $erreur['name']= "Nom manquant";
    }
    
    //VERIF EMAIL !
    if(empty($mail)){
        $erreur['mail']= "Adresse mail manquante";
    }elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $erreur['mail'] = "Adresse email invalide";
    }

    //VERIF OBJET !
    if(empty($obj)){
        $erreur['object']= "Veuillez indiquer l'objet de votre message";
    }elseif($obj == 1 ){
        $object = "Je suis un barbershop";
        $to = 'admin@gmail.com';
    }elseif($obj == 2  ){
        $object = "Je suis un client";
        $to = "service-client@gmail.com";
    }elseif($obj == 3 ){
        $object = "Je suis curieux";
        $to = "infos@gmail.com";
    }elseif($obj == 4 ){
        $object = "J'aimerai vous rejoindre";
        $to = "job@gmail.com";
    }elseif($obj == 5 ){
        $object = "Bonjour !";
        $to = "nickie.roudez@gmail.com";
    }

    //VERIF MESSAGE !
    if(empty($msg)){
        $erreur["msg"] = "Message manquant";
    }
    
    return $erreur;
}

function verifNl($email) {
    $erreur = array();
    
    //VERIF NEWSLETTER !
    if(empty($email)){
        $erreur['email']= "Veuillez renseigner une adresse mail";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erreur['email'] = "Adresse email invalide";
    }
    
    return $erreur;
}