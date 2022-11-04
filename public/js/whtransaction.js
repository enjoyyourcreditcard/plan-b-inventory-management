       // /
    // --------------------------------------------------------------------------
    //  JAVASCRIPT WAREHOUSE APPROV
    // --------------------------------------------------------------------------
    // /
$(".upload-sn").on("click", function (event) {
    // Sets Variables
    const button = $(event.currentTarget);
    const partId = button.data("partid");
    const partName = button.data("partname");
    const icQuantity = button.data("icquantity");
    const requestFormsid = button.data("requestformid");
    const inputBulkPartId = $("#input-bulk-part-id");
    const inputBulkPartName = $("#input-bulk-part-name");
    const inputBulkRequestFormId = $("#input-bulk-request-form-id");
    const inputPiecesPartName = $(".input-pieces-part-name");
    const inputPiecesPartId = $(".input-pieces-part-id");
    const inputPiecesRequestFormId = $(".input-pieces-request-form-id");
    const inputPieces = $("#input-pieces");
    
    
    
    // /
    // --------------------------------------------------------------------------
    //  Bulk Print HTML
    // --------------------------------------------------------------------------
    // /
    inputBulkPartId.val(partId);
    
    inputBulkRequestFormId.val(requestFormsid);

    inputBulkPartName.html(partName);

    
    
    // /
    // --------------------------------------------------------------------------
    //  Pieces Print HTML
    // --------------------------------------------------------------------------
    // /
    inputPieces.children().remove();
    
    inputPiecesRequestFormId.val(requestFormsid);
    
    var html = "";

    for (i = 0; i < icQuantity; i++) {

        html += 
            '<input class="input-pieces-part-id" type="hidden" name="part_id" value="' + partId + '">' +
            '<label class="input-pieces-part-name form-label">' + partName + "</label>" +
            '<input class="border w-full" type="text" name="sn_code[]" required="required">'
            ;

    }

    inputPieces.html(html);
});
