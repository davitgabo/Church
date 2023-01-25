function edit(e, id) {
    let form = document.getElementById(`form_${id}`);
    let button = form.querySelector('.btn-success');
    if(e.hasAttribute('hidden')) {
        e.removeAttribute('hidden');
        button.setAttribute('hidden', 'true');
        form.querySelectorAll('input').forEach(input => {
            input.setAttribute('readonly', 'true');
            input.setAttribute('onfocus', 'this.blur()');
            input.classList.remove('highlighted-input');
        })
    } else {
        e.setAttribute('hidden', 'true');
        button.removeAttribute('hidden');
        form.querySelectorAll('input').forEach(input => {
            input.removeAttribute('readonly');
            input.removeAttribute('onfocus');
            input.classList.add('highlighted-input');
        })
    }
}
