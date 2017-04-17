<?php
require_once ('inc/function.php');

//debug($_GET['id']);
if(($_GET['action'] == 'delete') && isset($_GET['id'])) { // if delete was requested AND an id is present...
    $deletedSalon = bdd_delete("DELETE FROM barbier WHERE id = ?", [$_GET['id']]);

    if($deletedSalon) {
        header("Location: compte.php");
    }

}

?>