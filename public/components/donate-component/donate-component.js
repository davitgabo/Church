$('document').ready(() => {
    showPagination(4, false);
    $('body').css('overflow', 'auto');
    $('body').css('overflow-x', 'hidden');
})

function showAll() {
    $('#showAllButton').css('display', 'none');
    showPagination(4, true);
}

function showPagination(itemsPerPage, show) {
    let pageSize = itemsPerPage;
    let showPaginatorButtons = show;

    var listItems = $('#paginationData .donate__last-donations__list__item').map(function () {
        return this;
    }).get();
    $('#pagination').pagination({
        dataSource: listItems,
        pageSize: pageSize,
        showPageNumbers: showPaginatorButtons,
        showPrevious: showPaginatorButtons,
        showNext: showPaginatorButtons,
        prevText: `<img class="mr-2" src="../../assets/icons/arrow-left.png">`,
        nextText: `<img class="mr-2" src="../../assets/icons/arrow-right.png">`,
        callback: function (data, pagination) {
            var dataHtml = '<div class="donate__last-donations__list">'
            $.each(data, function (index, item) {
                dataHtml +=
                    '<div class="donate__last-donations__list__item">' +
                    (item.children[0].classList.contains('hiddenData') ?
                        '<div class="donate__last-donations__list__item__name hiddenData">' + item.children[0].innerHTML + '</div>' :
                        '<div class="donate__last-donations__list__item__name">' + item.children[0].innerHTML + '</div>') +
                    (item.children[1].classList.contains('hiddenData') ?
                        '<div class="donate__last-donations__list__item__comment hiddenData">' + item.children[1].innerHTML + '<div class="donate__last-donations__list__item__comment__date">' +
                        item.children[2].innerHTML +
                        '</div>' + '</div>' :
                        '<div class="donate__last-donations__list__item__comment">' + '<div class="donate__last-donations__list__item__comment__text">' + item.children[1].innerHTML + '</div>' + '<div class="donate__last-donations__list__item__comment__date">' +
                        item.children[2].innerHTML +
                        '</div>' + '</div>') +

                    (item.children[3].classList.contains('hiddenData') ?
                        '<div class="donate__last-donations__list__item__amount hiddenData">' + item.children[3].innerHTML + '</div>' :
                        '<div class="donate__last-donations__list__item__amount">' + item.children[3].innerHTML + '₾' + '</div>') +
                    '</div>';
            });

            dataHtml += '</div>';

            $('#pagination').prev().html(dataHtml);
        }
    })
}
