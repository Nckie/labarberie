function burger(){
    var burger;
    burger = select('.js-burger');
    nav = select('.js-nav');
    burger.onclick = function(){
        burger.classList.toggle('is-active');
        nav.classList.toggle("is-active");
    };
}