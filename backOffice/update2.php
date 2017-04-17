<?php
session_start();
if(!isset( $_SESSION['id'] )){
    header('Location: index.php');
}


require 'inc/bdd.php';
require_once ('inc/function.php');
include("inc/head.php");

    //READ BDD :
    $salonInfo = read_for_updt($_GET['id']);

//debug($salonInfo);
//debug($_FILES);
//debug($_POST['submit']);
//debug($_GET['id']);

$erreur = [];


if(isset($_POST['submit'])){    
    $name = $_POST['name'];
    $adresse = $_POST['adresse'];
    $arr = $_POST['arr'];
    $prix = $_POST['prix'];
    $rasage = $_POST['rasage'];
    $tel = $_POST['tel'];
    $site = $_POST['site'];
    $horaire = $_POST['horaire'];
    $mail = $_POST['mail'];
    $description = $_POST['description'];
    

    include_once 'inc/verif.php';

    
    
//UPDATE BDD !  
    if(!$erreur){
        //insertion de la modif salon en bdd
        
        $name = htmlspecialchars($_POST['name']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $description = htmlspecialchars($_POST['description']);
        $horaire = htmlspecialchars($_POST['horaire']);
        
        
        $update = ['nom'=>$name,
            'arrondissement'=>$arr,
            'adresse'=>$adresse,
            'prix'=>$prix,
            'rasage'=>$rasage,
            'telephone'=>$tel,
            'site_web'=>$site,
            'horraire'=>$horaire,
            'mail'=>$mail,
            'description'=>$description,
            'id'=>$_GET['id']];
        
        if($_FILES['imgSalon']["size"] != 0){
            move_uploaded_file($file_tmp_name, $file_dest);
            $update['name_img'] = $file_name;
            $update['url_img'] = $file_dest;
            
            $reqImg = "url_img = :url_img, name_img = :name_img,";
            unlink($salonInfo[0]["url_img"]);
        }else{
            $reqImg = "";
        }
        
        
        
        bdd_update('UPDATE barbier SET
            nom = :nom, 
            arrondissement = :arrondissement, 
            adresse = :adresse, 
            prix = :prix,
            rasage = :rasage,
            telephone = :telephone, 
            site_web = :site_web, '
            .$reqImg. 
            'horraire = :horraire, 
            mail = :mail, 
            description = :description WHERE id = :id', 
            $update);
        
        $validation = "Salon mis à jour";
        
    }
}
?>

<div class="wrapper">
    <img src="../asset/img/logo/logoSimple.svg" alt="logo" class="logo">
    <h2 class="titre">MISE À JOUR D'UN SALON</h2>
    
    <a href="compte.php" class="close">RETOUR<i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
    
    
<!-- MESSAGE ERREUR + VALIDATION -->    
    <?php include "inc/message.php"; ?>
    
    
    
    <form action="update2.php?id=<?= $_GET['id'];?>" method="post" class="addInfo" enctype="multipart/form-data">
       
        <label for="name" class="labelTxt">NOM</label>
        <input type="text" name="name" class="input" placeholder="Barber fever" value="<?php if(isset($name)) echo $name; else echo $salonInfo[0]['nom'];?>">
        
        <div class="selectSide">           
            <div>
                <label for="arr" class="labelTxt">ARRONDISSEMENT</label>
                <select name="arr" class="select">
                   <?php for($k =1; $k<=20; $k++ ){ ?>
                        <option value="<?= $k ?>" <?php if((int)$salonInfo[0]['arrondissement'] == $k) echo "selected"; ?>>
                            <?php
                                if($k>1){
                                    $paris = "Paris " .$k . "ème";
                                }else{
                                    $paris = "Paris " . $k . "er";
                                }
                                echo $paris;
                            ?>
                        </option>
                    <?php }?>
                </select> 
            </div>
            
            <div>
                <label for="prix" class="labelTxt">PRIX</label>
                <select name="prix" class="select">
                   <?php for($j =1; $j<=3; $j++ ){ ?>
                        <option value="<?= $j ?>"  <?php if((int)$salonInfo[0]['prix'] == $j) echo "selected"; ?> >
                            <?php for($i = 0; $i<$j; $i++){
                                    echo '€';
                            }?>
                        </option>
                    <?php }?>
                </select>
            </div>
        </div>
        
        <label for="rasage" class="labelTxt">TYPE DE RASAGE</label>
        <select name="rasage" class="select">
            <option value="traditionnel" <?php if($salonInfo[0]['rasage'] == "traditionnel") echo "selected"; ?>>Traditionnel</option>
            <option value="moderne" <?php if($salonInfo[0]['rasage'] == "moderne") echo "selected"; ?>>moderne</option>
        </select>
        
        <label for="adresse" class="labelTxt">ADRESSE</label>
        <input type="text" name="adresse" class="input" placeholder="12 rue des barbiers, 75011 Paris" value="<?php if(isset($adresse)) echo $adresse; else echo $salonInfo[0]['adresse']; ?>">
                
        <label for="tel" class="labelTxt">N°TÉLÉPHONE</label>
        <input type="text" name="tel" class="input" placeholder="01 23 45 67 89" value="<?php if(isset($tel)) echo $tel; else echo $salonInfo[0]['telephone']; ?>">
        
        <label for="mail" class="labelTxt">MAIL</label>
        <input type="email" name="mail" class="input" placeholder="exemple@mail.com" value="<?php if(isset($mail)) echo $mail; else echo $salonInfo[0]['mail']; ?>">
        
        <label for="site" class="labelTxt">URL DU SITE</label>
        <input type="text" name="site" class="input" placeholder="www.monsite.com" value="<?php if(isset($site)) echo $site; else echo $salonInfo[0]['site_web']; ?>">
        
        <label for="horaire" class="labelTxt">HORAIRE DU SALON</label>
        <textarea name="horaire" cols="30" rows="5" placeholder="Lundi : 9h-14h"><?php if(isset($horaire)) echo $horaire; else echo $salonInfo[0]['horraire'];?></textarea>
                               
        <label for="imgSalon" class="labelTxt">VISUEL DU SALON</label>
        <div class="bloc_img">
            <input type="file" name="imgSalon">
            <div class="img_form">
                <img src="<?= $salonInfo[0]['url_img']?>" alt="<?= $salonInfo[0]['name_img'] ?>">
            </div>
        </div>
                
        <label for="description" class="labelTxt">DESCRIPTION DU SALON</label>
        <textarea name="description" placeholder="description du salon" cols="30" rows="10"><?php if(isset($description)) echo $description; else echo $salonInfo[0]['description'];?></textarea>
        
        <input type="submit" class="submit" value="ENVOYER" name="submit">
    </form>
    </div>
</body>
</html>