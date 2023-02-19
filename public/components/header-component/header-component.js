$('#languageSelect').on('change', function() {
    var url = window.location.toString();
    if(this.value === 'ge') {
        window.location = url.replace('/en/', '/ge/');
    } else {
        window.location = url.replace('/ge/', '/en/');
    }
})
