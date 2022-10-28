


/*
*|--------------------------------------------------------------------------
*| Display file name on dropzone
*|--------------------------------------------------------------------------
*/
$( "#dropzone-file" ).on( "change", function ( event ) {
    let inputFile = $( event.currentTarget );
    let fileName = inputFile.val().replace(/C:\\fakepath\\/i, '')
    let dropZoneCheck = $( ".dropzone-check" );

    if ( inputFile.val() ) {
        dropZoneCheck.html(
            '<p class="mb-2 text-sm text-gray-500">' +
            '<span class="font-semibold">' + fileName + '</span>' +
            '</p>'
        );
    } else {
        dropZoneCheck.html(
            '<p class="mb-2 text-sm text-gray-500">' +
            '<span class="font-semibold">Click to upload</span> or drag and drop' +
            '</p>' +
            '<p class="text-xs text-gray-500">Excel file</p>'
        );
    }
} );



/*
*|--------------------------------------------------------------------------
*| Passing datas
*|--------------------------------------------------------------------------
*/
$( ".btn-input-sn" ).on( "click", function ( event ) {
    var thisButton = event.currentTarget;
    var transferFormsId = $(thisButton).data('transferformsid');
    var grfId = $(thisButton).data('grfid');
    var partId = $(thisButton).data('partid');
    var partName = $(thisButton).data('partname');
    var quantity = $(thisButton).data('quantity');


    $('#modal-pieces').on('show.tw.modal', function () {
        let htmlPieces = '<input type="hidden" name="transfer_form_id" value="' + transferFormsId + '">' +
                        '<input type="hidden" name="grf_id" value="' + grfId + '">' +
                        '<input type="hidden" name="part_id" value="' + partId + '">' +
                        '<div class="text-slate-500 mt-2">' + partName + '</div>';

        for (i = 0; i < quantity; i++) {
            htmlPieces += '<div class="input-group mt-4">' +
                        '<div class="input-group-text">' + ( i + 1 ) + '</div>' +
                        '<input type="text" name="sn_code[]" class="form-control" placeholder="SN CODE" required>' +
                        '</div>';
        }

        $('#modal-pieces .modal-body').html( htmlPieces + '<button form="form-pieces" class="border block px-8 py-2 bg-emerald-700 text-center text-white rounded-full mx-auto mt-4">Upload</button>' );
    });

    $( "#modal-bulk" ).on( "show.tw.modal", function () {
        $("#modal-bulk .bulk-hidden").html(
            '<input type="hidden" name="transfer_form_id" value="' + transferFormsId + '">' +
            '<input type="hidden" name="grf_id" value="' + grfId + '">' +
            '<input type="hidden" name="part_id" value="' + partId + '">'
        );
    });
});