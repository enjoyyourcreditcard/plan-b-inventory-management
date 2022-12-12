$('form').on('submit', function(e) {
    let thisButton = $(this).find(".loading");

    $(thisButton).attr('disabled', true);
    $(thisButton).html('loading..');
});