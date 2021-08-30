$(document).ready(function(){
    $('.testmonial-slider').slick({
        autoplay:true,
        adaptiveHeight:true,
        autoplaySpeed:4000,
    });
    $('.main_slider').slick({
        autoplay:true,
        adaptiveHeight:true,
        autoplaySpeed:4000,
    }); 

    // fancybox for images
    $("a#single_image").fancybox();

    // this for mixitup of Gallary
    var mixer = mixitup('.box-list');
});