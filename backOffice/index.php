<?php
session_start();

if(!empty($_POST)){
    extract($_POST);
    
    require_once ('inc/function.php');
//    debug($mail);
//    debug($password);
    $membre = account_exists();// verif si email et mdp correspondent à un membre entré en bdd 
    
//    debug($membre);
    if($membre){
        $_SESSION['id'] = $membre['id'];
//        debug($membre['id']);
        header('Location: compte.php');//redirection vers une autre page
    }else{
        $erreur = 'identifiants erronés';
    };
}

include("inc/head.php");
//include("inc/info.php");


?>

        <div class="wrapperCnx">
            <img src="../asset/img/logo/logoTxt.svg" alt="logo labarberie" id="logo">

            <?php if(isset($erreur)): ?>
                 <div class="alertError"> <?= $erreur; ?> </div>
             <?php endif; ?>
             
             <?php if(isset($erreur['password'])): ?>
                 <div class="alertError"> <?= $erreur['password']; ?> </div>
             <?php endif; ?>
             
            <form action="" method="post" class="login">
                <label for="mail" class="labelTxt">EMAIL</label>
                <input type="email" name="mail" class="input" value="<?php if(isset($mail)) echo $mail; ?>">

                <label for="password" class="labelTxt child">MOT DE PASSE</label>
                <input type="password" name="password" class="input">

                <a href="oubli.php">Mot de passe oublié ?</a>

                <input type="submit" name="submit" value="SE CONNECTER">
            </form>
        </div>

<?php include("inc/footer.php") ?>
