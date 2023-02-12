$('document').ready(() => {
    var listItems = $('#paginationData .donate__last-donations__list__item').map(function() {
        return this;
    }).get();
    $('#pagination').pagination({
        dataSource: listItems,
        pageSize: 2,
        showPageNumbers: true,
        showPrevious: true,
        showNext: true,
        showNavigator: true,
        callback: function(data, pagination) {
            var dataHtml = '<div class="donate__last-donations__list">'
            $.each(data, function (index, item) {
                dataHtml +=
                    '<div class="donate__last-donations__list__item">' +
                        '<div class="donate__last-donations__list__item__name">' + item.children[0].innerHTML + '</div>' +
                        '<div class="donate__last-donations__list__item__comment">' +
                            item.children[1].innerHTML +
                            '<div class="donate__last-donations__list__item__comment__date">' +
                            item.children[2].innerHTML +
                            '</div>' +
                        '</div>' +
                        '<div class="donate__last-donations__list__item__amount">' +
                            item.children[3].innerHTML + '₾' +
                        '</div>' +
                    '</div>';
            });

            dataHtml += '</div>';

            $('#pagination').prev().html(dataHtml);
            $('#paginationData').remove();
        }
    })
})
