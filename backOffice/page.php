<?php

include "inc/head.php";

require_once"inc/function.php";

$salonInfo = read_article();
debug($salonInfo[0]);
?>

<div id="wrapperPage">
    <?php foreach($salonInfo as $salon){
        if($salon['arrondissement'] > 1){
            $arrondissement = "Paris " . $salon['arrondissement'] . "<sup>ème</sup>";
        }else{
            $arrondissement = "Paris " . $salon['arrondissement'] . "<sup>er</sup>";
        }

    ?>
    
    
    <article class="salon">
        <img src="<?= $salon['url_img']?>" alt="<?= $salon['name_img'] ?>" class="indexImg">
        <a href="#">
            <h3 class="salonName"><?= $salon['nom'] ?></h3>
            <p class="arr"><?= $arrondissement . " - " . euro($salon['prix'])?></p>
        </a>
    </article>
    
    
    <?php } ?>
</div>
</body>
</html>