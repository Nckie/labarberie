function init() {
    if(document.querySelector('.bo')) {
        btnMedia();
    }
    if(document.querySelector('.fo')) {
        navActive();
        burger();
        scrollTop();
        if(document.querySelector('.hp')) {
            modal();
            filter();
        }
        if(document.querySelector('.about')) {
            joke();
            cover();
        }
        if(document.querySelector('.contact')) {
            cover();
        }
        if(document.querySelector('.mention') || document.querySelector('.plan')) {
            fullScreen();
        }
    }
}