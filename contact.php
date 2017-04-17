<?php include "inc/header.php" ?>

<div class="rel cover" style="background-image: url(asset/img/cover/cover_contact.jpg)">
    <div class="wrapper">
        <h1 class="title title-h1 text text-upp">Passez nous <br>dire bonjour</h1>
    </div>
</div>

<div class="wrapper rel contact">
    <div class="container">

        <div class="row title title-blocks">
            <h2 class="col-md-12 col-sm-12 text text-upp">CONTACTEZ-NOUS</h2>
        </div>
        
        <div class="res"></div>
        
        <form id="my_form" onsubmit="submitForm(); return false;" class="text text-gray-base fw-200">
            <div class="row">
                <input class="col-md-6 col-sm-12 col-xs-12" type="text" id="name" name="name" placeholder="Votre nom">
                <input class="col-md-6 col-sm-12 col-xs-12" type="email" id="mail" name="mail" placeholder="exemple@mail.com">
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12 select-contact">
                    <select class="select select-no-border" name="object" id="object">
                        <option value="" disabled selected>Objet de votre message</option>
                        <option value="1">Vous êtes un barbershop</option>
                        <option value="2">Vous êtes journaliste</option>
                        <option value="3">Vous êtes curieux</option>
                        <option value="4">Vous voulez nous rejoindre</option>
                        <option value="5">Vous voulez juste dire bonjour</option>
                    </select>
                    <hr>
                </div>
            </div>

            <div class="row">
                <textarea class="col-md-12 col-xs-12" name="message" id="msg" cols="30" rows="10" placeholder="Votre message"></textarea>
            </div>

            <div class="row text text-center fw-400">
                <input class="col-md-2 col-sm-3 col-xs-12 text text-upp" type="submit" id="submit" name="Valider">
            </div>
        </form>   

        <div class="ok"></div>

        <div class="row title title-blocks">
            <h2 class="col-md-12 col-sm-12 text text-upp">OÙ NOUS TROUVER ?</h2>
        </div>

        <article class="row contact-map">
            <div class="col-md-10 col-sm-12 col-xs-12 map">
                <div id="map"></div>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTbQ55IC85I0ipGh9OCLiA0n5EZi41lk&callback=initMap">
                </script>           
            </div>


            <aside class="col-md-2 col-sm-12 col-xs-12">
                <div class="row">
                    <p class="col-md-12 col-sm-4">La barberie, <br>3 rue des poilus,<br> 75011 Paris</p>
                    <p class="col-md-12 col-sm-4">01 81 65 38 15</p>
                    <p class="col-md-12 col-sm-4">hello@labarberie.com</p>
                </div>
            </aside>
        </article> 
    </div>
</div>



<?php include "inc/footer.php" ?>