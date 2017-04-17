<?php
session_start();

if(!empty($_POST)){
    extract ($_POST);
    
    require_once "inc/function.php";
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

include 'inc/head.php';
?>
<body>
        <div class="wrapperCnx">
            <img src="../asset/img/logo/logoSimple.svg" alt="logo" class="logo">
             <h2 class="titre">Mot de passe oublié</h2>
            <form action="oubli.php" method="post" class="login">
                 <?php if(isset($erreur)): ?>
                     <div class="alertError"> <?= $erreur; ?> </div>
                 <?php endif; ?>
                
                 <?php if(isset($validation)): ?>
                     <div class="alertOk"> <?= $validation; ?> </div>
                 <?php endif; ?>
                 
                <label for="mail" class="labelTxt">EMAIL</label>
                <input type="email" name="mail" class="input" value="<?php if(isset($mail)) echo $mail; ?>">

                <input type="submit" name="submit" value="ENVOYER">
                <a href="index.php">Se connecter</a>
            </form>
        </div>
</body>
</html>