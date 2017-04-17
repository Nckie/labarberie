<?php
session_start();
if(!isset( $_SESSION['id'] )){
    header('Location: index.php');
}

    require_once ('inc/function.php');
    $salonInfo = read_article();
//    $position = read_position();
    $i =0;
    $j = 0;
//debug($position);
//debug($salonInfo);
Const BR = "<br>";
include("inc/head.php");
//include("inc/info.php");
?>

        <div class="wrapperTab">
            <div class="btn-add">
               <a href="add.php" class="add">
                    <i class="fa fa-plus" aria-hidden="true"></i>
               </a>
               <div class="text-add">
                   <p>Ajouter</p>
               </div>
            </div>
            
<!--
            <div style="margin: auto; margin-top: 60px; margin-bottom: 60px" id="imgHead">
                <img src="../asset/img/logo/logoTxt.svg" alt="logo">
            </div>
-->
<!--            <a href="add.php" class="add">Ajouter</a>-->

            <table id="tabRead">
                <thead>
                    <tr>
                        <th id="imgHead"><img src="../asset/img/logo/logoTxt.svg" alt="logo"></th>
                    </tr>
                </thead>
                
                <tbody>
                   <?php foreach($salonInfo as $salon){ ?>
                    <tr>
                       <td>
                        <div class="blockInfo">
                            <div class="infoImg">
                                <img src="<?= $salon['url_img'] ?>" alt="<?= $salon['name_img'] ?>">
                            </div>
                            <div class="infoPratique">
                                <h3><?= $salon['nom'] ?></h3>
                                <p><?= euro($salon['prix']) ?></p>
                                <p><?= $salon['adresse'] ?></p>
                                <p><?= $salon['site_web'] ?></p>
                                <p><?= $salon['mail'] ?></p>
                                <p><?= $salon['telephone'] ?></p>
                            </div>

                            <div class="infoHoraire">
                                <p class="voirPlus hor" data-cible ="<?= $i++ ?>"><i class="fa fa-plus-circle plus" aria-hidden="true"></i></p>
                                <p class="hiddenTextHor"><?= nl2br($salon['horraire']) ?></p>
                            </div>

                            <div class="infoDescription">
                                <p class="voirPlus des" data-cible ="<?= $j++ ?>"><i class="fa fa-plus-circle plus" aria-hidden="true"></i></p>
                                <p class="hiddenTextDes"><?= $salon['description'] ?></p>
                            </div>

                            <div class="infoModif">
                                <a href="delete.php?action=delete&id=<?= $salon['id'] ?>"><div class="round"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                </a>
                                <a href="update2.php?id=<?= $salon['id'] ?>"><div class="round"><i class="fa fa-magic" aria-hidden="true"></i></div></a>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
<!--            <a href="add.php" class="add">Ajouter</a>-->
        </div>

<?php include("inc/footer.php") ?>
