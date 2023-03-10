/*
 *|--------------------------------------------------------------------------
 *| Display file name on dropzone
 *|--------------------------------------------------------------------------
 */
 $("#dropzone-file").on("change", function (event) {
    let inputFile = $(event.currentTarget);
    let fileName = inputFile.val().replace(/C:\\fakepath\\/i, "");
    let dropZoneCheck = $(".dropzone-check");

    if (inputFile.val()) {
        dropZoneCheck.html(
            '<p class="mb-2 text-sm text-gray-500">' +
            '<span class="font-semibold">' +
            fileName +
            "</span>" +
            "</p>"
        );
    } else {
        dropZoneCheck.html(
            '<p class="mb-2 text-sm text-gray-500">' +
            '<span class="font-semibold">Click to upload</span> or drag and drop' +
            "</p>" +
            '<p class="text-xs text-gray-500">Excel file</p>'
        );
    }
});

$('.chat').on("click", ".btn-input-sn", function (event) {
    var thisButton = event;
    var partName   = $(thisButton).data("partname");
    var partId     = $(thisButton).data("partid");
    var inboundId  = $(thisButton).data("inboundid");
    var partUom    = $(thisButton).data("uom");
    var quantity   = $(thisButton).data("quantity");

    $("#modal-non-sn").on("show.tw.modal", function () {
        const media = $('.html-non-sn');

        media.html(
            '<table role="table" class="table table-report overflow-scroll w-full">' +
            '<tbody role="rowgroup">' +
            '<tr role="row" class="intro-y">' +
            '<td role="cell" class="align-middle text-left"><span class="text-primary text-decoration-none">' + partName + '</span></td>' +
            '<td role="cell" class="align-middle text-right"><span class="text-primary text-decoration-none">' + quantity + ' ' + partUom + '</span></td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '<input form="form-nonsn" type="hidden" name="inbound_id" value="' + inboundId + '"></input>' +
            '<input form="form-nonsn" type="hidden" name="quantity" value="' + quantity + '"></input>'
        );
    });

    $("#modal-pieces").on("show.tw.modal", function () {
        let htmlPieces =
            '<input type="hidden" name="inbound_id" value="' + inboundId + '">' +
            '<div class="text-slate-500 mt-2">' + partName + '</div>';

        for (i = 0; i < quantity; i++) {
            htmlPieces +=
                '<div class="input-group mt-4">' +
                '<div class="input-group-text">' + (i + 1) + '</div>' +
                '<input type="text" name="sn_code[]" class="form-control" placeholder="SN CODE" required>' +
                "</div>";
        }

        $("#modal-pieces .modal-body").html(
            htmlPieces + '<button form="form-pieces" class="border block px-8 py-2 bg-emerald-700 text-center text-white rounded-full mx-auto mt-4">Upload</button>'
        );
    });

    $("#modal-bulk").on("show.tw.modal", function () {
        $("#modal-bulk .bulk-hidden").html(
            '<input type="hidden" name="part_name" value="' + partName + '">' +
            '<input type="hidden" name="inbound_id" value="' + inboundId + '">'
        );
    });
});

$('.select-inbound-ic').on('change', function (event) {
    let select = event.currentTarget;
    let option = select.selectedIndex;
    let quantity = $(select.options[option]).data('quantity');
    
    $('.input-inbound-quantity').val(1);
    $('.input-inbound-quantity').attr('max',quantity);
});