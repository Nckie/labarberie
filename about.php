<?php include "inc/header.php" ?>
<div class="rel cover cover-about" style="background-image: url(asset/img/cover/cover_about.jpg)">
    <div class="wrapper">
        <h1 class="title title-h1 text text-upp">Bienvenue <br>dans notre univers</h1>
    </div>
</div>

<div class="wrapper about">
    <div class="container">

        <section class="about-section">
            <div class="row title title-blocks">
               <h2 class="col-md-12 col-sm-12 text text-upp">NOS VALEURS</h2>
            </div>
           
            <div class="row">
                <div class="col-md-4 reassurance">
                    <div class="joke js-joke-text">
                       <div class="triangle"></div>
                        <p>Comme l'éclair !</p>
                    </div>
                    <div class="circle text text-center"><img src="asset/img/icon/about/rocket@2x.png" alt="rapide icone">
                    <div class="btn-joke js-joke" data-cible="0"></div>
                    </div>
                    <h3 class="text text-center text-upp">Rapide</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque doloremque harum, a ut laudantium doloribus ipsam ea eveniet labore perferendis corporis facere ab quaerat sed cupiditate velit quod odit aut?</p>
                </div>

                <div class="col-md-4 reassurance">
                    <div class="joke js-joke-text">
                        <div class="triangle"></div>
                        <p>Comme bonjour !</p>
                    </div>
                    <div class="circle text text-center">
                        <img src="asset/img/icon/about/hand@2x.png" alt="rapide icone">
                        <div class="btn-joke js-joke" data-cible="1"></div>
                    </div>
                    <h3 class="text text-center text-upp">Simple</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quos possimus reiciendis quae odit atque mollitia earum quisquam, fugiat. Eaque unde in asperiores dignissimos iste, vero maxime dolore est rem!</p>
                </div>

                <div class="col-md-4 reassurance">
                    <div class="joke js-joke-text">
                       <div class="triangle"></div>
                        <p>mais vraiment !</p>
                    </div>
                    <div class="circle text text-center">
                        <img src="asset/img/icon/about/target@2x.png" alt="rapide icone">
                        <div class="btn-joke js-joke" data-cible="2"></div>
                    </div>
                    <h3 class="text text-center text-upp">Précis</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores minima, alias quam incidunt dignissimos dolor accusantium, facilis magnam similique voluptatem expedita quisquam nobis consequatur quae reprehenderit laudantium velit quo corrupti.</p>
                </div>
            </div>
        </section>
        <section class="slider rel">
           <div class="row title title-blocks">
                <h2 class="col-md-12 col-sm-12 text text-upp">L'ÉQUIPE</h2>
           </div>
           
            <div class="row btns">
                <button class="btn-prev col-xs-6 col-sm-6 col-md-6 text text-left" onclick="changeImage(-1); return false"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></button>
                <button class="btn-next col-xs-6 col-sm-6 col-md-6 text text-right" onclick="changeImage(1); return false"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                <button onclick="getGetAjax()"></button>
            </div>

            <div class="row team">
                <div class="col-sm-12 col-md-8 img">
                    <img src="asset/img/team/team-member-1.jpg" alt="Paul Bédiard" id="slideshow" class="">
                </div>
                <div class="col-md-4 col-sm-12">
                    <h3 id="name" class="text text-upp">Paul Bédiard</h3>
                    <p id="fonction" class="text text-upp">Développeur</p>
                    <hr>
                    <p id="description" class="des">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="mailto:paul@labarberie.fr" id="email">paul@labarberie.fr</a>
                </div>
            </div>
        </section>
    </div>
</div>

<?php include "inc/footer.php" ?>
