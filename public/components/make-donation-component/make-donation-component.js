// function copy() {
//     $('.test').click(function(event) {
//         console.log(event.target)
//     })
//     // var copyText = document.getElementById(id);
//     // navigator.clipboard.writeText(copyText.innerHTML);
// }
//
// $(document).ready(function() {
//     copy();
// })

document.querySelectorAll('.make-donation__info__acc').forEach(element => {
    element.addEventListener('click', () => {
        var copyText = element.children[1];
        navigator.clipboard.writeText(copyText.innerHTML);
    })
})
