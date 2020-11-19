<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
    $('.owl-carousel .CarouselOne').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:false,
                loop:false
            },
            600:{
                items:3,
                nav:false,
                loop:false
            },
            1000:{
                items:7,
                nav:true,
                loop:false
            }
        }
    })
    
    $('.owl-carousel .CarouselTwo').owlCarousel({
        loop:true,
        onDragged: callback,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:false,
                loop:false
            },
            600:{
                items:3,
                nav:false,
                loop:false
            },
            890 : {
                items:5,
                nav:true,
                loop:false
            },
            1200:{
                items:6,
                nav:true,
                loop:false
            }
        }
    })
    
    var owl = $('.owl-carousel .CarouselTwo');
    owl.owlCarousel();

    function callback(event) {
        
    }

    var owl = $('.owl-carousel .CarouselImgs');
    owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true
    });
</script>