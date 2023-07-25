$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    // navClass: ['owl-prev', 'owl-next'],
    // autoplay: 1000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:2,
            slideBy:2 
        }
    }
})