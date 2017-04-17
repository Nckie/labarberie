
var images = ['team-member-1.jpg', 'team-member-2.jpg', 'team-member-3.jpg', 'team-member-4.jpg'];
var des = [];
var names = [];
var job = [];
var mails= [];
var rs = [];


var imageNb = 0;
var imageLength = images.length-1;
getGetAjax();


function getGetAjax(){ 
    var xhr;
    xhr = new XMLHttpRequest();

    xhr.open("GET", 'js/JSON/jason.json');

    xhr.setRequestHeader('Content-Type', 'text/plain');

    xhr.onload = function getResponse(res){
        var jason = JSON.parse(this.responseText);
        for (var key in jason) {
            var obj = jason[key];
            des.push(obj.description);
            rs.push(obj.socials);
            job.push(obj.job);
            names.push(obj.name);
            mails.push(obj.mail);
        }
    }

    xhr.onerror = function getError(err){
        log('appel ajax fail');
        console.error(err);
    };

    xhr.send();
};;


function unfade(element) {
    var op = 0.5;  // initial opacity
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 20 + ")";
        op += op * 0.02;
    }, 10);
}

function changeImage(x) {
    imageNb += x;

    // if you reached the end of an array, start over
    if(imageNb > imageLength) {
        imageNb = 0;
    }
    if (imageNb < 0) {
        imageNb = imageLength;
    }



    var img = document.getElementById('slideshow');
    var textDes = document.getElementById('description');
    var textTitle = document.getElementById('name');
    var textJob = document.getElementById('fonction');
    var email = document.getElementById('email');

    img.alt = names[imageNb];
    img.src = "asset/img/team/" + images[imageNb];
    document.getElementById('slideshow').alt = names[imageNb];
    textTitle.innerHTML = names[imageNb];
    textJob.innerHTML = job[imageNb];
    textDes.innerHTML = des[imageNb];
    email.href = "mailto:" + mails[imageNb];
    email.innerHTML = mails[imageNb];

    document.getElementById('facebook').href = rs[imageNb][0].facebook;
    document.getElementById('twitter').href = rs[imageNb][1].twitter;
    document.getElementById('linkedin').href = rs[imageNb][2].linkedin;
    
    unfade(img);
    unfade(textDes);
    unfade(textTitle);
    unfade(textJob);
    unfade(email);
    
    return false;
} 