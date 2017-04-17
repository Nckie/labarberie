function navActive(){
    var nav;
    nav = document.querySelector('.js-nav ul');
    
    if(document.querySelector('.about')) {
        var li = nav.firstElementChild;
        var a = li.firstElementChild;
        a.classList.add('active');
    }
    
    if(document.querySelector('.contact')) {
        var li = nav.lastElementChild;
        var a = li.lastElementChild;
        a.classList.add('active');
    }
}