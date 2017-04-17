<?php
session_start();

if(!empty($_POST)){
    extract ($_POST);
    
    require_once "php/inc/function.php";
    
    if( empty ( $mail )){
        $erreur = "adresse email manquante" ;
    }elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $erreur = "adresse email invalide";
    }elseif(mail_free($mail)){
        $erreur ="Adresse email inconue";
    }
    if( !isset($erreur)){
        $password = bin2hex( random_bytes( 8 ) );//mdp généré = à 16 caractères
        
        password_save($password);
        $message = '
            <h1>Voici votre nouveau mot de passe</h1>
            <p>
                Mote de passe : <b>'.$password.'</b><br>
                Pensez à le changer lors de votre prochaine visite !
            </p>
        ';
        
        mail_html('Nouveau mot de passe', $message);
        
        unset($mail);
        
        $validation = "Nouveau mot de passe envoyé !";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="style/css/main.css">
</head>
<body>
    <img src="../asset/img/logo/logoSimple.svg" alt="logo" class="logo">
    <h1>Mot de passe</h1>
    
    <form action="" method="post" id="login">
        <label for="mail" class="labelTxt">EMAIL</label>
        <input type="email" name="mail" class="input" value="<?php if(isset($mail)) echo $mail; ?>">

        <label for="password" class="labelTxt" id="mdp">MOT DE PASSE</label>
        <input type="password" name="password" class="input">

        <a href="forgot.php">Mot de passe oublié ?</a>

        <input type="submit" name="submit" value="SE CONNECTER">
    </form>
</body>
</html>