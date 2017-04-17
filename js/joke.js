function joke() {
    var textToggle, btns, cible;
    btns = document.querySelectorAll('.js-joke');
    for(var i = 0; i < btns.length; i+=1) {
        btns[i].onclick = lancerAnim;
    }
    
    
    
    function lancerAnim(e){
        var btn, cible, texts, text;
        btn = e.target;

        texts = document.querySelectorAll('.js-joke-text');
        cible = Number(btn.getAttribute('data-cible'));
        text = texts[cible];
        text.classList.toggle('active');
    }
}