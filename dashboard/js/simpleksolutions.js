AOS.init();
$(document).ready(function(){
    $(window).scroll(function() {
      if ($(window).scrollTop()>100) {

        $('nav').addClass('header-nav-scrolled');
        $('nav').removeClass('header-nav');


      }else{
        $('nav').removeClass('header-nav-scrolled');
        $('nav').addClass('header-nav');

      }
    });
});