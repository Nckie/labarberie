function modal(){
    var btn, backBtn, i, close;
    btn = selectAll('.salon');
    backBtn = select('.modal-bg');
    close = select('.close');

    for(i=0; i<btn.length; i+=1){
        btn[i].onclick = startLightbox;
    }
    backBtn.onclick = dismiss;
    close.onclick = dismiss;
}
function setupScroll(mode){
    if (mode === "off") {
        document.body.classList.add("no-scroll");
    } else {
        document.body.classList.remove('no-scroll');
    }
}
function startLightbox(){
    var bg, hiddenContent, cible, div;
    bg = document.querySelector('.modal-bg');
    hiddenContent = document.querySelector('.modal-content');
    cible = this.getAttribute("data-cible");
    div = document.querySelector(".modal-content");

//    console.log(hiddenContent);
    hiddenContent.classList.add('is-active');
    bg.classList.add('is-active');
    getPostNatif(cible, div);
    setupScroll("off");
    
    var windowSize = $(window).width();
    var filter = select('.js-filter');
    var content = selectAll('.js-salon');
    var footer = select('.js-footer');
    if(windowSize < 767) {
        for(var i = 0; i < content.length; i+=1){
            content[i].classList.add("none");
        }
        filter.classList.add('none');
        footer.classList.add('none');
    }
    if(windowSize < 993){
        setupScroll('off');
    }

}

function dismiss(){
    var bg, hiddenContent, i;
    bg = document.querySelector('.modal-bg');
    hiddenContent = select('.modal-content');

    hiddenContent.classList.remove('is-active');
    bg.classList.remove('is-active');
    setupScroll("on");
    
    var windowSize = $(window).width();
    var content = selectAll('.js-salon');
    var filter = select('.js-filter');
    var footer = select('.js-footer');
    for(var i = 0; i < content.length; i+=1){
        content[i].classList.remove("none");
    }
    footer.classList.remove('none');
    filter.classList.remove('none');
}




//----------------------- AJAX ! ----------------------->

//---> CRÉATION DU BON NOMBRE D'EUROS
function euro(prix){
    var i, euro, test;
    euro = [];
    for (i=1; i<=prix; i+=1){
        euro.push("€");
    }
    return euro.join("");
}

//---> BONNE TERMINAISON ARRONDISSEMENT
function arrsmt(info){
    var value ="";
    if(info === 1){
        value = "Paris " + info + "<sup>er</sup>";
    }else{
        value = "Paris " + info + "<sup>ème</sup>";
    }
    return value;
}


function getPostNatif(cible, div) {
    var formData, xhr, cible;
    xhr = new XMLHttpRequest();
    cible = cible;

    xhr.open('POST', 'api/modal.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function getResponse(res){
        log("ajax ok");
        var info = this.responseText;
        log(info);
        var jason = JSON.parse(info);
        log(jason);
        insertText(div, jason);
    };

    xhr.onerror = function getError(err){
        log('ajax fail');
        log(err);
    };

    xhr.send(encodeURI('id=' + cible));
}

//---> INSERTION DES DONNÉES DANS HTML
function insertText(div, info){
    log('insertText');
    var name, arr, adresse, mail, prix, telephone, horaire, description, site, mail, url_img, name_img, div, info;
    info = info;
    site= select(".site");
    mail = select('.mail');

    name = select(".nom").innerHTML = info.nom;
    site.href = "http://www." + info.site;
    site.innerHTML = info.site;
    adresse = select(".adresse").innerHTML = info.adresse;
    mail.href = "mailto:" + info.mail;
    mail.innerHTML = info.mail;
    telephone = select(".telephone").innerHTML = info.telephone;
    description = select(".description").innerHTML = info.description;
    horaire = select(".horaire").innerHTML = info.horaire;

    arr = select(".arrdst").innerHTML = arrsmt(info.arr);

    img = select(".imgSalon");
    img.src = "backOffice/" + info.url_img;
    img.alt = info.name_img;

    prix = select(".price");
    var euros = euro(info.prix);
    prix.innerHTML = euros;

    var lat =  parseFloat(info.lat);
    var lng = parseFloat(info.lng);
    
    console.log(typeof(lat));

    startMap(lat, lng);
}

//---> INSERTION DES DONNÉES DANS MAP
function startMap(lat, lng) {
    var home = {lat: parseFloat(lat), lng: parseFloat(lng)};
    var iconBase = 'asset/img/icon/marker/';

    var mapOptions = {
        zoom: 15,
        center: home,
        disableDefaultUI: true,
        scrollwheel: false,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        },

        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"30"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"gamma":"0.00"},{"lightness":"74"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"lightness":"3"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
    };

    var mapElement = byId('map');
    var map = new google.maps.Map(mapElement, mapOptions);

    var marker = new google.maps.Marker({
        position: home,
        animation: google.maps.Animation.DROP,
        icon: iconBase + 'marker.png',
        map: map,
    });
    
    var center;
    function calculateCenter() {
      center = map.getCenter();
    }
    google.maps.event.addDomListener(map, 'idle', function() {
      calculateCenter();
    });
    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(center);
    });
}




function rech(){
    var btn;
    btn = document.getElementById('recherche');
    btn.onclick = value;

}

function value(){
    var selector = document.getElementById('arr');
    var prix = document.getElementById('prix');
    var value = selector[selector.selectedIndex].value;
    var valuePrix = selector[prix.selectedIndex].value;
//    console.log(value);
//    console.log(valuePrix)
}
