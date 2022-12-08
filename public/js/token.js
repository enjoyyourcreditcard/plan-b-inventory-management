let token = $('#auth').val();
localStorage.setItem('key', token);

$('#logout').on('click', function () {
    localStorage.removeItem('key');
})