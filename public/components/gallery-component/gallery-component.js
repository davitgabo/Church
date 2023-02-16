$('document').ready(() => {
    let elementLength = $('#mygallery a').length;
    let rows = 2;

    for(i = 0; i < elementLength; i++) {
        if(i % 4 == 0 && i !== 0) {
            $('<div class="decoyDiv" style="height: 300px; width: 100%; display: inline-block"></div>').insertBefore($('#mygallery a')[i-3]);
        }
    }

    if(elementLength <= 4) {
        rows = 1;
    }

    $('#mygallery').on('init', function(event, slick){
        changeNavButtons();
    });

    $('#mygallery').on('swipe', function(event, slick){
        if($('.slick-prev')[0].attributes['aria-disabled'].nodeValue === 'true') {
            $('.slick-prev')[0].css('display', 'none');
        } else {
            $('.slick-prev')[0].css('display', 'block');
        }

        if($('.slick-next')[0].attributes['aria-disabled'].nodeValue === 'true') {
            $('.slick-next')[0].css('display', 'none');
        } else {
            $('.slick-next')[0].css('display', 'block');
        }
    });

    $('#mygallery').on('afterChange', function(event, slick){
        debugger
        // if($('.slick-prev')[0].attributes['aria-disabled'].nodeValue === 'true') {
        //     $('.slick-prev')[0].css('display', 'none');
        // } else {
        //     $('.slick-prev')[0].css('display', 'block');
        // }
        //
        // if($('.slick-next')[0].attributes['aria-disabled'].nodeValue === 'true') {
        //     $('.slick-next')[0].css('display', 'none');
        // } else {
        //     $('.slick-next')[0].css('display', 'block');
        // }

        $('.slick-prev').each(function (index ,obj) {
            if(index == 0) {
                if(this.attributes['aria-disabled'].nodeValue === 'true') {
                    $(this).css('display', 'none');
                } else {
                    $(this).css('display', 'block');
                }
            }
        })

        $('.slick-next').each(function (index ,obj) {
            if(index == 0) {
                if(this.attributes['aria-disabled'].nodeValue === 'true') {
                    $(this).css('display', 'none');
                } else {
                    $(this).css('display', 'block');
                }
            }
        })
    });

    $('#mygallery').slick({
        arrows: true,
        responsive: true,
        slidesToShow: 3,
        rows: rows,
        slidesToScroll:3,
        infinite: false,
    });

    $('#mygallery').slickLightbox({
        src: 'href',
        itemSelector: 'a',
        background: 'rgba(0, 0, 0, 0.7)',
        caption: function(element, info) {
            return $(element).data('caption')
        },
    }).on({
        'shown.slickLightbox': function(){ changeNavButtons() },
    });


    if(elementLength > 4) {
        $('#navigationDiv').css({'height': ($('.decoyDiv').height() + 'px'), 'width': ($('.decoyDiv').width() + 'px')})
    } else {
        $('#navigationDiv').remove();
    }
})

function changeNavButtons() {
    // for(i = 0; i < $('.slick-prev').length; i++) {
    //     console.log($('.slick-prev')[i])
    //     if(i == 0) {
    //         $('.slick-prev')[i].addClass('prev-new');
    //         $('.slick-next')[i].addClass('next-new');
    //         if($('.slick-prev')[i].attr('aria-disabled', 'true')) {
    //             $('.slick-prev')[i].css('display', 'none')
    //         }
    //         if($('.slick-next')[i].attr('aria-disabled', 'true')) {
    //             $('.slick-next')[i].css('display', 'none')
    //         }
    //     }
    //     console.log($('.slick-prev')[i])
    //     $('.slick-prev')[i].innerHTML = '<img class="mr-2" src="../../assets/icons/arrow-left.png">'
    //     $('.slick-prev')[i].addClass('no-before');
    //     $('.slick-next')[i].innerHTML = '<img class="mr-2" src="../../assets/icons/arrow-right.png">'
    //     $('.slick-next')[i].addClass('no-before');
    // }

    $('.slick-prev').each(function (index ,obj) {
        if(index == 0) {
            // debugger
            $(this).addClass('prev-new');
            if(this.attributes['aria-disabled'].nodeValue == 'true') {
                $(this).css('display', 'none')
            }
        } else {
            $(this).addClass('prev-lightbox');
        }
        $(this).html('<img class="mr-2" src="../../assets/icons/arrow-left.png">');
        $(this).addClass('no-before');
    })

    $('.slick-next').each(function (index ,obj) {
        if(index == 0) {
            // debugger
            $(this).addClass('next-new');
            if(this.attributes['aria-disabled'].nodeValue == 'true') {
                $(this).css('display', 'none')
            }
        } else {
            $(this).addClass('next-lightbox');
        }
        $(this).html('<img class="mr-2" src="../../assets/icons/arrow-right.png">');
        $(this).addClass('no-before');
    })
}


