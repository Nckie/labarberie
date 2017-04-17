<?php
session_start();
if(!isset( $_SESSION['id'] )){
    header('Location: index.php');
}

if ( !empty( $_POST ) ) {
  extract( $_POST );
  $erreur = [];

  require_once 'inc/function.php';

  if ( empty( $oldpassword ) ) {
    $erreur['oldpassword'] = 'Ancien mot de passe manquant';
  }
  elseif ( !password_ok() ) {
    $erreur['oldpassword'] = 'Ancien mot de passe erroné';
  }

  if ( empty( $newpassword ) ) {
    $erreur['newpassword'] = 'Nouveau mot de passe manquant';
  }
  elseif ( strlen( $newpassword ) < 8 ) {
    $erreur['newpassword'] = 'Le nouveau mot de passe doit faire au moins 8 caractères';
  }

  if ( empty( $newpasswordconf ) ) {
    $erreur['newpasswordconf'] = 'Confirmation du nouveau mot de passe manquante';
  }
  elseif ( $newpasswordconf != $newpassword ) {
    $erreur['newpasswordconf'] = 'Confirmation du nouveau mot de passe différente';
  }

  if ( !$erreur ) {
    password_save();

    $validation = 'Nouveau mot de passe enregistré !';
  }
}

include("inc/head.php");

?>

        <div class="wrapperCnx">
            <img src="../asset/img/logo/logoSimple.svg" alt="logo" class="logo">
             <h2 class="titre">MODIFIER LE MOT DE PASSE</h2>
             
            <form action="newPassword.php" method="post" class="login">
                
                 <?php if(isset($erreur["oldpassword"])): ?>
                     <div class="alertError"> <?= $erreur["oldpassword"]; ?> </div>
                 <?php endif; ?>
                                 
                 <?php if(isset($erreur["newpassword"])): ?>
                     <div class="alertError"> <?= $erreur["newpassword"]; ?> </div>
                 <?php endif; ?>
                 
                 <?php if(isset($erreur["newpasswordconf"])): ?>
                     <div class="alertError"> <?= $erreur["newpasswordconf"]; ?> </div>
                 <?php endif; ?>
                
                 <?php if(isset($validation)): ?>
                     <div class="alertOk"> <?= $validation; ?> </div>
                 <?php endif; ?>
                 

                
                <label for="oldpassword" class="labelTxt">ANCIEN MOT DE PASSE</label>
                <input type="password" name="oldpassword" class="input">
                
                <label for="newpassword" class="labelTxt child">NOUVEAU MOT DE PASSE</label>
                <input type="password" name="newpassword" class="input">
                
                <label for="newpasswordconf" class="labelTxt child">CONFIRMATION MOT DE PASSE</label>
                <input type="password" name="newpasswordconf" class="input">
                
                <input type="submit" name="submit" value="MODIFIER">
            </form>
        </div>
</body>
</html>