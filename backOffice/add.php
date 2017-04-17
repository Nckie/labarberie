<?php
session_start();
if(!isset( $_SESSION['id'] )){
    header('Location: index.php');
}

function getCoordinates($adresse){
 
$adresse = str_replace(" ", "+", $adresse);
$adresse = str_replace(",", "", $adresse);
//debug($adresse);
    
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$adresse";    

$response = file_get_contents($url); 
$json = json_decode($response,TRUE);
$jason = $json['results'][0]['geometry']['location']['lat']." ".$json['results'][0]['geometry']['location']['lng'];

//debug($jason);
    return $jason;
}

if(isset($_POST['submit'])){
        $erreur = [];
        require_once("inc/function.php");

        $name = $_POST['name'];
        $adresse = $_POST['adresse'];
        $arr = $_POST['arr'];
        $prix = $_POST['prix'];
        $rasage = $_POST['rasage'];
        $tel = $_POST['tel'];
        $site = $_POST['site'];
        $imgSalon = $_FILES['imgSalon']['name'];
        $horaire = $_POST['horaire'];
        $mail = $_POST['mail'];
        $description = $_POST['description'];
    
    $coord = getCoordinates($adresse);
        $location = 'POINT(' . $coord . ')';
include_once 'inc/verif.php';

//---INSERTION BDD !---
        if(!$erreur){
            //insertion du nouveau salon en bdd

            $name = htmlspecialchars($_POST['name']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $arr = htmlspecialchars($_POST['arr']);
            $description = htmlspecialchars($_POST['description']);


            if(move_uploaded_file($file_tmp_name, $file_dest)){
                bdd_insert('INSERT INTO barbier(nom, arrondissement, adresse, prix, rasage, telephone, site_web, url_img, name_img, horraire, mail, description, lat_long) VALUES(:nom, :arrondissement, :adresse, :prix, :rasage, :telephone, :site_web, :url_img, :name_img, :horraire, :mail, :description, geomfromtext(:lat_long))', ['nom'=>$name,
                'arrondissement'=>$arr,
                'adresse'=>$adresse,
                'prix'=>$prix,
                'rasage'=>$rasage,
                'telephone'=>$tel,
                'site_web'=>$site,
                'url_img'=>$file_dest,
                'name_img'=>$file_name,
                'horraire'=>$horaire,
                'mail'=>$mail,
                'description'=>$description,
                'lat_long'=>$location]);
                $validation = "Salon ajouté avec succès !";
            }
        }
}

include "inc/head.php";
?>
    <div class="wrapper">
    <img src="../asset/img/logo/logoSimple.svg" alt="logo" class="logo">
    <h2 class="titre">AJOUTER UN SALON</h2>
    
    <a href="compte.php" class="close">RETOUR<i class="fa fa-times fa-2x" aria-hidden="true"></i></a>

    <!--MESSAGES ERREUR + VALIDATION-->
    <?php include 'inc/message.php';?>  
        

    <form action="add.php" method="post" class="addInfo" enctype="multipart/form-data">
        <label for="name" class="labelTxt">NOM</label>
        <input type="text" name="name" class="input" placeholder="Barber fever" value="<?php if(isset($name)) echo $name; ?>">
        
        <div class="selectSide">
            <div>

                <label for="arr" class="labelTxt">ARRONDISSEMENT</label>
                <select name="arr" class="select">
                    <option value="<?php if(isset($arr)) echo $arr; ?>" disabled selected>Arrondissement</option>

                   <?php for($k =1; $k<=20; $k++ ){?>
                        <option value="<?= $k ?>" >
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
                    <option value="<?php if(isset($prix)) echo $prix; ?>" disabled selected>Ordre de prix</option>
                       
                   <?php for($j =1; $j<=3; $j++ ){ ?>
                        <option value="<?= $j ?>">
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
            <option value="<?php if(isset($rasage)) echo $rasage; ?>" disabled selected>Type de rasage</option>
            <option value="traditionnel">Traditionnel</option>
            <option value="moderne">Moderne</option>
        </select>
        
        <label for="adresse" class="labelTxt">ADRESSE</label>
        <input type="text" name="adresse" class="input" placeholder="12 rue des barbiers, 75011 Paris" value="<?php if(isset($adresse)) echo $adresse; ?>">
        
        <label for="tel" class="labelTxt">N°TÉLÉPHONE</label>
        <input type="text" name="tel" class="input" placeholder="01 23 45 67 89" value="<?php if(isset($tel)) echo $tel; ?>">
        
        <label for="mail" class="labelTxt">MAIL</label>
        <input type="email" name="mail" class="input" placeholder="exemple@mail.com" value="<?php if(isset($mail)) echo $mail; ?>">
        
        <label for="site" class="labelTxt">URL DU SITE</label>
        <input type="text" name="site" class="input" placeholder="www.monsite.com" value="<?php if(isset($site)) echo $site; ?>">
        
        <label for="horaire" class="labelTxt">HORAIRE DU SALON</label>
        <textarea name="horaire" cols="30" rows="5" placeholder="Lundi : 9h-14h"></textarea>

                       
        <label for="imgSalon" class="labelTxt">VISUEL DU SALON</label>
        <input type="file" name="imgSalon">
        
        <label for="description" class="labelTxt">DESCRIPTION DU SALON</label>
        <textarea name="description" placeholder="description du salon" cols="30" rows="10" value="<?php if(isset($description)) echo $description; ?>"></textarea>
        
        <input type="submit" class="submit" name="submit" value="ENVOYER">
    </form>
    </div>
</body>
</html>