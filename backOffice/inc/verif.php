<?php
//VERIF NOM !
    if(empty($name)){
        $erreur['name']= "Nom manquant";
    }

//VERIF ADRESSE !
    if(empty($adresse)){
        $erreur["adresse"] = "Adresse manquante";
    }
 
//VERIF ARR !
    if(empty($arr)){
        $erreur['arr'] = "Veuillez renseigner l'arrondissement";
    }
   
//VERIF PRIX !
    if(empty($prix)){
        $erreur['prix'] = "Veuillez renseigner le prix";
    }elseif(is_int($prix)){
        $erreur['prix'] = "Le prix doit être un chiffre";
    }

//VERIF RASAGE !
    if(empty($rasage)){
        $erreur['prix'] = "Veuillez renseigner le type de rasage";
    }
 
//VERIF N°TEL !
    if(empty($tel)){
        $erreur['tel'] = "téléphone manquant";
    }elseif(strlen($tel) > 14){
        $erreur['tel'] = "Numéro de téléphone incorrect";
    }
 
//VERIF URL SITE !
    if(empty($site)){
        $erreur['site'] = "Veuillez renseigner le site web";
    }
    
//VERIF HORAIRE !
    if(empty($horaire)){
        $erreur['horaire'] = "Veuillez renseigner les horaires";
    }
    
//VERIF DESCRIPTION !
    if(empty($description)){
        $erreur["description"] = "description manquante";
    }elseif(strlen($description) > 475 ){
        $erreur['description'] = "Votre description doit faire moins de 475 caractères";
    };
    
//VERIF EMAIL !
    if(empty($mail)){
        $erreur['mail']= "Adresse mail manquante";
    }elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $erreur['mail'] = "Adresse email invalide";
    }else{
        if( isset($_GET['id']) ){ 
            if( !mail_free($_GET['id'])){ 
                $erreur['mail'] = "Adresse email déjà prise";
            }
        }else{
            if( !mail_free()){ 
                $erreur['mail'] = "Adresse email déjà prise";
            }
        }
    };
    
//VERIF IMAGE !

if($_FILES['imgSalon']["size"] != 0){
     $file_name = $_FILES['imgSalon']['name'];
        $file_tmp_name = $_FILES['imgSalon']['tmp_name'];
        $file_type = $_FILES['imgSalon']['type'];
        $file_size = $_FILES['imgSalon']['size'];

        $file_extension = strrchr($file_name, ".");//rech. la dernière occurence du point
        $nameImg = bin2hex( random_bytes( 8 ) ) . $file_extension;
        $file_dest = 'asset/img/salon/'.$nameImg;
        $extention_autorisees = array('.jpeg', '.jpg', '.png', '.PNG');


        if(!in_array($file_extension, $extention_autorisees)){//Vérifie si la valeur en param1 fait partie du tableau en param2
            $erreur['imgSalon'] = "Seuls des fichiers jpeg ou png sont autorisés";
        }elseif( $file_size > 102400){//si le fichier est plus grand que 100ko
            $erreur['imgSalon'] = "Image trop volumineuse (supérieure à 100ko)";
        } 
    
}

?>