
   // /
    // --------------------------------------------------------------------------
    //  JAVASCRIPT WAREHOUSE RETURN
    // --------------------------------------------------------------------------
    // /

    // const myModalEl = document.getElementById('inputSnReturn')
    // myModalEl.addEventListener('hidden.tw.modal', function(event) {
    
    $('.upload-return').on('click', function (event) {
            const button = $(event.target);
            const partIdReturn = button.data('partidreturn');
            const partNameReturn = button.data('partnamereturn');
            const grfId = button.data('grfidreturn');
            const icQuantityReturn = button.data('icquantityreturn');
            const inputBulkPartId = $('#input-bulk-part-id-return');
            const inputBulkPartName = $("#input-bulk-part-name");
            const inputBulkGrfId = $('#input-bulk-grf-id-return');
            const inputPiecesReturn = $('#input-pieces-return');

            inputBulkPartId.val(partIdReturn);
            inputBulkGrfId.val(grfId);
            inputBulkPartName.html(partNameReturn);

            inputPiecesReturn.children().remove();

            var html = "";

            console.log(icQuantityReturn);

            for (i = 0; i < icQuantityReturn; i++) {

            html +=
            '<input class="input-pieces-part-id" type="hidden" name="part_id" value="' + partIdReturn + '">'+
            '<label class="input-pieces-part-name form-label">' + partNameReturn + '</label>'+
            '<input class="input-pieces-form-id" type="hidden" name="request_form_id" value="' + grfId + '">'+
            '<input type="text" class="form-control mb-3" name="sn_code[]" required="required">';
        }

        inputPiecesReturn.html(html);
    })
        
    // })