<?php 
require_once"backOffice/inc/function.php";

$salonInfo = read_article();
$i =0;
$j =1;
//debug($salonInfo);

//$position = read_position();

//debug($position);

$read = bdd_select("SELECT * FROM barbier", []);
//    debug($read);

include "inc/header.php";
?>

<div class="rel bg-video hp">
    <video class="cover-video" autoplay>
        <source src="asset/video/cover_index_1080.mp4" type="video/mp4">
        <source src="asset/video/cover_index_1080.mpg" type="video/mpg">
    </video>
    <div class="wrapper">
        <h1 class="title title-h1 text text-upp title-anim title-home">Trouvez <br>votre barbier <br>en un clic</h1>
    </div>
</div>

<div class="wrapper">
    <section class="container">

        <div class="row filters js-filter">
            <div class="col-sm-6 col-md-4 col-lg-4">
                <label for="arrondissement" class="text text-upp">Où</label><br>
                <select id="arr-filter" class="form-control select select-no-border text text-gray-base fw-200">
                    <option value="None">Aucun</option>
                    <option value="paris1">Paris1er</option>
                    <option value="paris2">Paris2ème</option>
                    <option value="paris3">Paris3ème</option>
                    <option value="paris4">Paris4ème</option>
                    <option value="paris5">Paris5ème</option>
                    <option value="paris6">Paris6ème</option>
                    <option value="paris7">Paris7ème</option>
                    <option value="paris8">Paris8ème</option>
                    <option value="paris9">Paris9ème</option>
                    <option value="paris10">Paris10ème</option>
                    <option value="paris11">Paris11ème</option>
                    <option value="paris12">Paris12ème</option>
                    <option value="paris13">Paris13ème</option>
                    <option value="paris14">Paris14ème</option>
                    <option value="paris15">Paris15ème</option>
                    <option value="paris16">Paris16ème</option>
                    <option value="paris17">Paris17ème</option>
                    <option value="paris18">Paris18ème</option>
                    <option value="paris19">Paris19ème</option>
                    <option value="paris20">Paris20ème</option>
                </select>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                <hr>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-4 rasage">
                <label for="arrondissement" class="text text-upp">Type de rasage</label><br>
                <select id="rasage-filter" class="form-control select select-no-border text text-gray-base fw-200">
                    <option value="None">Aucun</option>
                    <option value="traditionnel">traditionnel</option>
                    <option value="moderne">moderne</option>
                </select>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                <hr>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-4">
                <label for="prix" class="text text-upp">Prix</label><br>
                <select id="prix-filter" class="form-control select select-no-border text text-gray-base fw-200">
                    <option value="None">Aucun</option>
                    <option value="€">€</option>
                    <option value="€€">€€</option>
                    <option value="€€€">€€€</option>
                </select>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                <hr>
            </div>
        </div>         

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-filters">
                <ul>
                    <li class="arr"></li>
                    <li class="rasage"></li>
                    <li class="prix"></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php foreach($salonInfo as $salon){
    if($salon['arrondissement'] > 1){
        $arrondissement = "Paris " . $salon['arrondissement'] . "<sup>ème</sup>";
    }else{
        $arrondissement = "Paris " . $salon['arrondissement'] . "<sup>er</sup>";
    }
            ?>

            <article class="col-sm-6 col-md-4 grid-thumbnail js-salon salon" 
                     data-cible = "<?= $salon['id'] ?>"
                     data-arr= "<?= "paris" . $salon['arrondissement']; ?>"
                     data-prix= "<?= euro($salon['prix']); ?>"
                     data-rasage= "<?= $salon['rasage']; ?>" >
                <div class="img">
                    <img src="backOffice/<?= $salon['url_img']?>" alt="<?= $salon['name_img'] ?>" class="width100 thumbnail-img">
                </div>

                <div class="caption">
                    <h3 class="salonName title title-h3"><?= $salon['nom'] ?></h3>
                    <p class="arr"><?= $arrondissement . " - " . euro($salon['prix'])?></p>
                    <p class="text text-gray-base fw-200">Rasage <?= $salon['rasage']; ?></p>
                </div>
            </article>
            <?php }?>
        </div>
        <div class="modal-bg fixed"></div>

        <div class="container modal-content">
            <i class="fa fa-times close" aria-hidden="true"></i>
            <div class="row" style="flex: 1;">
                <div class="bg bg-white left-side col-md-4">
                    <aside>
                        <img src="" alt="photo de salon" class="imgSalon width100">
                        <h2 class="nom text text-upp"></h2>
                        <p class="arrdst"></p>
                        <p class="price"></p>

                        <div class="icons">
                            <div class="icons-block">
                                <div class="icon text text-center"><i class="fa fa-laptop" aria-hidden="true"></i></div>
                                <a href="#" class="site text text-align-icon" target="_blank"></a>
                            </div>

                            <div class="icons-block">
                                <div class="icon text text-center"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <p class="adresse text text-align-icon"></p>
                            </div>

                            <div class="icons-block">
                                <div class="icon text text-center"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <p class="telephone text text-align-icon"></p>
                            </div>   
                            
                            <div class="icons-block">
                                <div class="icon text text-center"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <a href="#" class="mail text text-align-icon"></a>
                            </div>                  
                        </div>
                    </aside>
                </div>

                <div class="bg bg-gray-light right-side col-md-8">
                    <article>
                        <p class="description"></p>
                        <div>
                            <h4>Horaires : </h4>
                            <p class="horaire"></p>
                        </div>
                        <div id="map"></div>

                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTbQ55IC85I0ipGh9OCLiA0n5EZi41lk&callback=startMap">
                        </script>


                    </article>
                </div>
            </div>

        </div>
    </section>
    <a href="#top" class="btn-top">
        <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
    </a>
</div>

<?php include "inc/footer.php"?>