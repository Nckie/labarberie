function cover(){
      var scrolledY = $(window).scrollTop();
      $('.cover').css('background-position', 'top' + (scrolledY));
}

$(window).scroll(function() {
    cover();
});   
