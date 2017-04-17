function fullScreen(){
    var wh = $(window).height(),
        footerHeight = $('.js-footer').outerHeight() + $('.copyright').height(),
        headerHeight = $('#js-main-header').outerHeight();
    var el = (wh - (footerHeight + headerHeight)) + 20;

    $('.js-mentions').css({
        'height': el,
    });
    
//    $('body').css('overflow', 'hidden');
}

$(this).resize(function(){
    fullScreen();
})