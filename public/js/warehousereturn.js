
// /
// --------------------------------------------------------------------------
//  JAVASCRIPT WAREHOUSE RETURN
// --------------------------------------------------------------------------
// /
$('.upload-return').on('click', function (event) {
    const button = $(event.currentTarget);
    const partIdReturn = button.data('partidreturn');
    const partNameReturn = button.data('partnamereturn');
    const grfId = button.data('grfidreturn');
    const icQuantityReturn = button.data('icquantityreturn');
    const inputBulkPartId = $('#input-bulk-part-id-return');
    const inputBulkPartName = $("#input-bulk-part-name-return");
    const inputBulkGrfId = $('#input-bulk-grf-id-return');
    const inputPiecesReturn = $('#input-pieces-return');



    // /
    // --------------------------------------------------------------------------
    //  Bulk Print HTML
    // --------------------------------------------------------------------------
    // /
    inputBulkPartId.val(partIdReturn);

    inputBulkGrfId.val(grfId);

    inputBulkPartName.html(partNameReturn);



    // /
    // --------------------------------------------------------------------------
    //  Pieces Print HTML
    // --------------------------------------------------------------------------
    // /
    var html = "";

    for (i = 0; i < icQuantityReturn; i++) {
        html +=
        '<input class="input-pieces-part-id" type="hidden" name="part_id" value="' + partIdReturn + '">'+
        '<label class="input-pieces-part-name form-label">' + partNameReturn + '</label>'+
        '<input class="input-pieces-form-id" type="hidden" name="grf_id" value="' + grfId + '">'+
        '<input type="text" class="form-control mb-3" name="sn_code[]" required="required">';
    }

    inputPiecesReturn.html(html);
})