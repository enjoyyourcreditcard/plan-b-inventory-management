$('form').on('submit', function(e) {
    let thisButton = $(this).find("button");

    $(thisButton).attr('disabled', true);
    $(thisButton).html('loading..');
});