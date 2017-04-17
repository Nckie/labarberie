<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Back office</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://use.fontawesome.com/da21326989.js"></script>
        <link rel="stylesheet" href="../style/css/main.css">
        <link rel="icon" href="asset/img/logo/favicon.ico" />
        <script src="../js/utility.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/hidenText.js"></script>
    </head>

    <body onload="init()" class="bo">
        <?php
        if ( isset( $_SESSION['id'] ) ) { ?>
        <header id="grid_header">
            <nav id="nav_header">
                <ul>
                    <li>
                        <a href="newPassword.php" class="hvr-bubble-bottom link">
                            <p>MODIFIER MOT DE PASSE</p>
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <p class="text-hover">Mot de passe</p>
                        </a>
                    </li>
                    <li>
                        <a href="compte.php" class="hvr-bubble-bottom link">
                            <p>GESTION</p>
                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                            <p class="text-hover">Gestion</p>
                        </a>
                    </li>

                    <li>
                        <a href="deconnexion.php" class="hvr-bubble-bottom link">
                           <p>DECONNEXION</p>
                           <i class="fa fa-power-off powerOff" aria-hidden="true"></i>
                           <p class="text-hover">Deconnexion</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <?php } ?>