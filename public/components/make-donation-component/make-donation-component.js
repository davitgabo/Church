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
let form = document.getElementById('paymentForm');

$('document').ready(function() {
    document.querySelectorAll('.make-donation__info__acc').forEach(element => {
        element.addEventListener('click', () => {
            var copyText = element.children[1];
            navigator.clipboard.writeText(copyText.innerHTML);
        })
    })

    $("#passwordModal").on("hidden.bs.modal", function () {
        // var url = window.location.toString();
        // if(this.value === 'ge') {
        //     window.location = url.replace('/en/', '/ge/');
        // } else {
        //     window.location = url.replace('/ge/', '/en/');
        // }
        // window.location = "/donate";
    });
})

function getFormData() {
    let amount = $('[name="amount"]')[0].value;
    let show_donation = $('[name="show_donation"]').is(":checked");
    let show_amount = $('[name="show_amount"]').is(":checked");
    let first_name = $('[name="first_name"]')[0].value;
    let show_name = $('[name="show_name"]').is(":checked");
    let last_name = $('[name="last_name"]')[0].value;
    let comment = $('[name="comment"]')[0].value;
    let show_comment = $('[name="show_comment"]').is(":checked");

    let data = {
        amount: amount,
        show_donation: show_donation,
        show_amount: show_amount,
        first_name: first_name,
        show_name: show_name,
        last_name: last_name,
        comment: comment,
        show_comment: show_comment,
    }

    return data
}

function validateForm(data) {
    let isValid = true;
    if(data.amount === '') {
        $('[name="amount"]').css('border', '1px solid red');
        isValid = false;
    } else {
        $('[name="amount"]').css('border', '1px solid #000000');
    }

    if(data.first_name === '') {
        $('[name="first_name"]').css('border', '1px solid red');
        isValid = false;
    } else {
        $('[name="first_name"]').css('border', '1px solid #000000');
    }
    if(data.last_name === '') {
        $('[name="last_name"]').css('border', '1px solid red');
        isValid = false;
    } else {
        $('[name="last_name"]').css('border', '1px solid #000000');
    }

    return isValid
}

function submitForm() {
    let requestData = getFormData();
    let formIsValid = validateForm(requestData);
    const prePayload = new FormData(form);
    const payload = new URLSearchParams(prePayload);
    const action = form.getAttribute('action');
    for (const pair of prePayload) {
        console.log(pair);
    }
    if(formIsValid) {
        fetch(action, {
            method: 'POST',
            body: payload
        }).then(res => {
            console.log(res)
            if(res.ok){
                $('#passwordModal').modal('show');
            } else {
                alert('დაფიქსირდა შეცდომა');
            }
        }).catch(reason =>  {
            alert('დაფიქსირდა შეცდომა');
        })

    }
}
