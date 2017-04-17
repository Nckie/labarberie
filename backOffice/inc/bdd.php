<?php
try{
    $bdd = new PDO("mysql:host=nickierobarberie.mysql.db;dbname=nickierobarberie", 'nickierobarberie', 'Ponynk0912');
    $bdd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
}catch( PDOException $e ){
    die('Erreur : ' . $e->getMessage());
}
?>