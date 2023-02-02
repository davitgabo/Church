function edit(e, id) {
    let form = document.getElementById(`form_${id}`);
    let button = form.querySelector('.btn-success');
    let cancelButton = form.querySelector('.btn-danger');
    if(e.hasAttribute('hidden')) {
        e.removeAttribute('hidden');
        button.setAttribute('hidden', 'true');
        cancelButton.setAttribute('hidden', 'true');
        form.querySelectorAll('input').forEach(input => {
            input.setAttribute('readonly', 'true');
            input.setAttribute('onfocus', 'this.blur()');
            input.classList.remove('highlighted-input');
        })
        form.querySelectorAll('textarea').forEach(textarea => {
            textarea.setAttribute('readonly', 'true');
            textarea.setAttribute('onfocus', 'this.blur()');
            textarea.classList.remove('highlighted-input');
        })
    } else {
        e.setAttribute('hidden', 'true');
        button.removeAttribute('hidden');
        cancelButton.removeAttribute('hidden');
        form.querySelectorAll('input').forEach(input => {
            input.removeAttribute('readonly');
            input.removeAttribute('onfocus');
            input.classList.add('highlighted-input');
        })
        form.querySelectorAll('textarea').forEach(textarea => {
            textarea.removeAttribute('readonly');
            textarea.removeAttribute('onfocus');
            textarea.classList.add('highlighted-input');
        })
    }
}

function cancelEdit(e, id) {
    let form = document.getElementById(`form_${id}`);
    let button = form.querySelector('.btn-success');
    let editButton = form.querySelector('.edit-button');
    e.setAttribute('hidden', 'true');
    button.setAttribute('hidden', 'true');
    editButton.removeAttribute('hidden');
    form.querySelectorAll('input').forEach(input => {
        input.setAttribute('readonly', 'true');
        input.setAttribute('onfocus', 'this.blur()');
        input.classList.remove('highlighted-input');
    })
    form.querySelectorAll('textarea').forEach(textarea => {
        textarea.setAttribute('readonly', 'true');
        textarea.setAttribute('onfocus', 'this.blur()');
        textarea.classList.remove('highlighted-input');
    })
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#uploadedImage').attr('src', e.target.result).height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
