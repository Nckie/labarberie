function scrollTop(){
    $(".btn-top").click(function() {
      $("html, body").animate({ scrollTop: 600 }, "slow");
      return false;
    });
}