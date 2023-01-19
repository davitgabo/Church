$('#imageCarousel').on('slid.bs.carousel', function () {
    let dots = document.querySelectorAll('.home__slider-indicator');
    let activeSlide = document.querySelectorAll('.carousel-item-count');

    for (i = 0; i < activeSlide.length; i++) {
        if(activeSlide[i].classList.contains('active')) {
            dots.forEach(dot => {
                dot.classList.remove('home__slider-indicator__active');
            })
            dots[i].classList.add('home__slider-indicator__active');
        }
    }
})
