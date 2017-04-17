<?php
require_once('inc/function.php');
//debug($_POST);

if(isset($_POST) ){
    $res = new stdClass();
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $obj = $_POST['object'];
    $msg = $_POST['message'];
    
    include_once('inc/verif.php');
    $erreur = verif($name, $obj, $mail, $msg);
    
    $to = "nickie.roudez@gmail.com";	
    $from = $name . " : " . $mail;
    $subject = 'Message depuis formulaire de contact';
    $message = '<b>Name:</b> '.$name.' <br><b>Email:</b> '.$mail.' <br><b>Objet:</b> '.$obj.'<p>'.$msg.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    if( empty($erreur)){
        mail($to, $subject, $message, $headers);
        $res->msg = "Votre message a bien été envoyé, merci $name de nous avoir contacté";
        $res->error = null;

    } else {
        $res->msg = "Il semblerait que vous n'ayez pas remplis tous les champs correctement";
        $res->error = $erreur;
    }
    echo json_encode($res);
}
?>