    <?php if(isset($erreur['name'])): ?>
        <div class="alertError"> <?= $erreur['name']; ?> </div>
    <?php endif; ?>
          
    <?php if(isset($erreur['arr'])): ?>
        <div class="alertError"> <?= $erreur['arr']; ?> </div>
    <?php endif; ?>
          
    <?php if(isset($erreur['adresse'])): ?>
        <div class="alertError"> <?= $erreur['adresse']; ?> </div>
    <?php endif; ?>
              
    <?php if(isset($erreur['prix'])): ?>
        <div class="alertError"> <?= $erreur['prix']; ?> </div>
    <?php endif; ?>
                  
    <?php if(isset($erreur['rasage'])): ?>
        <div class="alertError"> <?= $erreur['rasage']; ?> </div>
    <?php endif; ?>
              
    <?php if(isset($erreur['tel'])): ?>
        <div class="alertError"> <?= $erreur['tel']; ?> </div>
    <?php endif; ?>
              
    <?php if(isset($erreur['site'])): ?>
        <div class="alertError"> <?= $erreur['site']; ?> </div>
    <?php endif; ?>
         
    <?php if(isset($erreur['imgSalon'])): ?>
        <div class="alertError"> <?= $erreur['imgSalon']; ?> </div>
    <?php endif; ?>  

    <?php if(isset($erreur['mail'])): ?>
        <div class="alertError"> <?= $erreur['mail']; ?> </div>
    <?php endif; ?>     
                
    <?php if(isset($erreur['description'])): ?>
        <div class="alertError"> <?= $erreur['description']; ?> </div>
    <?php endif; ?>  
    
     <?php if(isset($validation)): ?>
        <div class="alertOk"> <?= $validation; ?> </div>
    <?php endif; ?>  
