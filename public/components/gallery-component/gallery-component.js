$('document').ready(() => {
    let elementLength = $('#mygallery a').length;
    let rows = 2;

    for(i = 0; i < elementLength; i++) {
        if(i % 5 == 0 && i !== 0) {
            $('<div class="decoyDiv" style="height: 300px; width: 100%; display: inline-block"></div>').insertBefore($('#mygallery a')[i-4]);
        }
    }

    if(elementLength <= 5) {
        rows = 1;
    }

    $('#mygallery').slick({
        arrows: true,
        responsive: true,
        slidesToShow: 3,
        rows: rows,
        slidesToScroll:3,
        infinite: false,

    });

    if(elementLength >= 5) {
        $('#navigationDiv').css({'height': ($('.decoyDiv').height() + 'px'), 'width': ($('.decoyDiv').width() + 'px')})
    } else {
        $('#navigationDiv').remove();
    }
})


