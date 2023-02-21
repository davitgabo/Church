let elementLength = $('#mygallery a').length;
let maxDiv = elementLength / 5;

$('document').ready(() => {

    let rows = 1;
    if(screen.width > 1199) {
        rows = 2;
        for(i = 0; i <= elementLength; i++) {
            if((i % 5 === 0 ) && (i !== 0)) {
                $('<div class="decoyDiv" style="height: 19rem; width: 100%; display: inline-block"></div>').insertBefore($('#mygallery a')[i-4]);
            }
        }

        if(elementLength <= 4) {
            rows = 1;
        }
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
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    rows: 1
                }
            }
        ]
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

    if(screen.width > 1199) {
        if(elementLength > 4) {
            $('#navigationDiv').css({'height': ($('.decoyDiv').height() + 'px'), 'width': ($('.decoyDiv').width() + 'px')})
        } else {
            $('#navigationDiv').remove();
        }
    }
})

function changeNavButtons() {
    $('.slick-prev').each(function (index ,obj) {
        if(index == 0) {
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

// $(window).resize(function () {
//     if(screen.width > 1199) {
//         rows = 2;
//         for(i = 0; i <= elementLength; i++) {
//             if((i % 5 === 0 ) && (i !== 0) && $('.decoyDiv').length !== maxDiv) {
//                 console.log(1);
//                 $('<div class="decoyDiv" style="height: 19rem; width: 100%; display: inline-block"></div>').insertBefore($('#mygallery a')[i-4]);
//             }
//         }
//
//         if(elementLength <= 4) {
//             rows = 1;
//         }
//
//         $('#mygallery').slick('setOption', 'rows', '2', true)
//     }
//
//     if(screen.width <= 1199) {
//         for(i=1 ; i < elementLength; i += 6) {
//             if($('.decoyDiv').length !== 0) {
//                 $('#mygallery').slick('slickRemove', i);
//             }
//         }
//
//         changeNavButtons();
//
//         if($('#navigationDiv').length > 0 ) {
//             $('#navigationDiv').remove();
//         }
//     }
// })


