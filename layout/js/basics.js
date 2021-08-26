$(document).ready(function(){

// ########### navbar ###########

  // $$$$$$ navbar $$$$$$
  var navBar = $('.navbar'),
  goUp = $('.go_up');

  $(window).scroll(function(){
  // navbar change
  if($(this).scrollTop() > 80){
    navBar.css('padding','0px 10px');
    $('.navbar .navbar-brand img').css({
      "width": "100px",
      "height": "45px"
    });
  } else {
    if( bodyWidth < 992 ){
      navBar.css('padding','5px 10px');

      $('.navbar .navbar-brand img').css({
        "width": "135px",
        "height": "60px"
      });
    } else {
      navBar.css('padding','5px 0px');

      $('.navbar .navbar-brand img').css({
        "width": "135px",
        "height": "60px"
      });
    }
  }

  // $$$$$$ this for icon to go up when scroll $$$$$$
  if($(this).scrollTop() > 100){
    if(goUp.is(":hidden")){
      goUp.fadeIn();
    }} else {
      goUp.fadeOut();
    }
  });

  // $$$$$$ this for the animation of the icon go up $$$$$$
  goUp.click(function(event){
    event.preventDefault();
    $('html , body').animate({
        scrollTop: 0
    },100);
  });

  // ---------- menu in navbar ----------
  var bodyWidth = $('body').innerWidth();

    if(bodyWidth <= 751){
      $('#searchField').attr('data-toggle', "modal");
      $('#telephoneField').attr('data-toggle', "modal");
      $('#addressField').attr('data-toggle', "modal");
      $('#calcuField').attr('data-toggle', "modal");
    } else {
      $('#searchField').removeAttr('data-toggle');
      $('#telephoneField').removeAttr('data-toggle');
      $('#addressField').removeAttr('data-toggle');
      $('#calcuField').removeAttr('data-toggle');
    }

    $('.navbar .langLink .navbar-toggler').click(function(){
      $('.navbar .collapse').hide();
      if( $('.NavbarMobile .navMenuMobile').width() > 0 ){
        $(".NavbarMobile .navMenuMobile").css('width','0');
        $('.NavbarMobile .navMenuMobile a').hide();
      } else {
        if( bodyWidth >= 768 && bodyWidth <= 992 ){
          $(".NavbarMobile .navMenuMobile").css('width','40%');
          $('.NavbarMobile .navMenuMobile .menuAllSections .nav-item').css('padding','20px');
        } else if(bodyWidth >= 558 && bodyWidth <= 767){
          $(".NavbarMobile .navMenuMobile").css('width','38%');
          $('.NavbarMobile .navMenuMobile .menuAllSections .nav-item').css('padding','20px');
        } else if(bodyWidth >= 270 && bodyWidth <= 557){
          $(".NavbarMobile .navMenuMobile").css('width','60%');
          $('.NavbarMobile .navMenuMobile .menuAllSections .nav-item').css('padding','20px');
        }
        $('.NavbarMobile .navMenuMobile a').css('display','flex');
        $('.NavbarMobile .navMenuMobile .menuAllSections .nav-item').css('padding','20px');
      }
    });

    $('.NavbarMobile .navMenuMobile .closebtn').click(function () {  
      $(".NavbarMobile .navMenuMobile").css('width','0');
      $('.NavbarMobile .navMenuMobile a').hide();
    });
  // ##################### End Global #####################

});