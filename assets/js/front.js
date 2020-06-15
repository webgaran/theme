





jQuery(document).ready(function($){
$('.hero').owlCarousel({
        items: 1,
        rtl: 'owl-ltr',
        dots:true,
        loop:true,
        autoplay:true,
        autoplaySpeed: 2000,
        autoplayTimeout: 9000,
        touchDrag:false,
        margin: 20,
        nav:true,
        navText: ["<img src='http://webgaran.ir/wp-content/themes/webgaran/assets/img/left.png' >","<img src='http://webgaran.ir/wp-content/themes/webgaran/assets/img/right.png' >"],
        smartSpeed:1000,
            responsive : {
        0 : {
            items:1
        },
        480 : {
            items:1
        },
        768 : {
            items:1
        }
    }
    });
});
