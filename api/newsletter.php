<?php
require_once('inc/function.php');
//debug($_POST);

if(isset($_POST) ){
    $res = new stdClass();
    $email = $_POST['email'];
    
    include_once('inc/verif.php');
    $erreur = verifNl($email);
    
    $to = "nickie.roudez@gmail.com";	
    $subject = 'Inscription à la newsletter';
    $message = "<p>" . $email." aimerai s'inscrire à la newsletter</p>";
    $headers = "From: $email\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    if(empty($erreur)){
        mail($to, $subject, $message, $headers);
        $res->msg = "Votre inscription à bien été prise en compte";
        $res->error = null;

    } else {
        $res->msg = "Votre inscription n'a pas pu être prise en compte";
        $res->error = $erreur;
    }
    echo json_encode($res);
}
?>