/*
 *|--------------------------------------------------------------------------
 *| Part Javascript
 *|--------------------------------------------------------------------------
 */

$(".inputPartSegmentSelect2").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#createPartModal"),
    placeholder: "Select..",
    theme: "bootstrap",
    _type: "open",
    language: {
        noResults: function () {
            return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Segment</a>";
        },
    },
    escapeMarkup: function (markup) {
        return markup;
    },
});

function showPartCategoryModal() {
    $("#createPartCategoryModal").show();
    $(".inputPartSegmentSelect2").select2("close");
}
function bye() {
    $("#createPartCategoryModal").hide();
    $(".inputPartSegmentSelect2").select2({
        dropdownParent: $("#createPartModal"),
        theme: "bootstrap",
        placeholder: "Select..",
        language: {
            noResults: function () {
                return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Segment</a>";
            },
        },
        escapeMarkup: function (markup) {
            return markup;
        },
    });
}

$(".inputPartCategorySelect2").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#createPartCategoryModal"),
    placeholder: "Select..",
    theme: "bootstrap",
});

$(".inputPartAllSelect2")
    .prepend("<option selected></option>")
    .select2({
        width: "100%",
        height: "10px",
        dropdownParent: $("#createPartModal"),
        placeholder: "Select..",
        theme: "bootstrap",
    });

$(".select3").select2({
    width: "100%",
    // height: '10px',
    tags: true,
    placeholder: "Select a state",
    allowClear: true,
    dropdownParent: $("#createPartModal"),
    theme: "classic",
});

// *: Segment JS
$(".inputSegmentSelect2").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#createSegment"),
    theme: "bootstrap",
    placeholder: "select category..",
});
// *: End Segment JS

// *: Category JS
$(".select5").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#createCategoryModal"),
    theme: "classic",
});

$(".select6").select2({
    width: "100%",
    height: "10px",
    multiple: true,
    dropdownParent: $("#editCategoryModal"),
    theme: "classic",
});
// *: End Category JS

// *: Brand JS
$(".inputBrandSelect2").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#modal-create-brand"),
    theme: "bootstrap",
    placeholder: "select segment..",
});
// *: End Brand JS

$(".select2EditPart").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#EditPartModal"),
    theme: "bootstrap",
});

$(".select3EditPart").select2({
    width: "100%",
    height: "10px",
    tags: true,
    dropdownParent: $("#EditPartModal"),
    theme: "bootstrap",
});

// *: Build JS
$(".inputBuildSelect2").select2({
    width: "100%",
    height: "10px",
    dropdownParent: $("#createBuildModal"),
    theme: "classic",
});

$(".editBuildSelect2").select2({
    width: "100%",
    height: "10px",
    multiple: true,
    dropdownParent: $("#modalEditBuild"),
    theme: "classic",
});
// *: End Build JS

$(".addStockSelect2").select2({
    width: "100%",
    height: "10px",
    // multiple:true,
    dropdownParent: $("#createStockModal"),
    theme: "bootstrap",
});

// *: Request Form JS
$(".inputPartRequestFormSelect2").select2({
    dropdownParent: $("#inputRequestFormParent"),
    placeholder: "select part..",
    theme: "bootstrap",
});

$(".inputBrandRequestFormSelect2").select2({
    dropdownParent: $("#inputRequestFormParent"),
    placeholder: "select brand..",
    theme: "bootstrap",
});

$(".inputWarehouseRequestFormSelect2").select2({
    dropdownParent: $("#inputRequestFormParent"),
    placeholder: "select warehouse..",
    theme: "bootstrap",
});
// *: End Request Form JS

// *: Return Stock JS
$(".inputReturnStockSelect2").select2({
    dropdownParent: $("#inputReturnStockParent"),
    placeholder: "select status..",
    theme: "bootstrap",
});
// *: End Return Stock JS

$(".inputReturnStockSelect2").on("select2:select", function (e) {
    var data = e.params.data;
    var select = $(e.target);

    switch (data.id) {
        case 'replace':
            select.siblings('.return-stock-sncode-parent').children().remove();
            select.siblings('.return-stock-sncode-parent').append('<input class="form-control return-stock-sncode mt-3" type="text" name="sn_code[]" placeholder="sn code.." form="return-stock-form" required>');
            
            select.parent().siblings('.return-stock-remarks-parent').children().remove();
            select.parent().siblings('.return-stock-remarks-parent').append('<input class="form-control return-stock-remarks" type="text" name="remarks[]" placeholder="note.." form="return-stock-form" required>');
            break;
            
        case 'good':
            select.siblings('.return-stock-sncode-parent').children().remove();
            select.siblings('.return-stock-sncode-parent').append('<input type="hidden" class="return-stock-sncode" name="sn_code[]" form="return-stock-form">');

            select.parent().siblings('.return-stock-remarks-parent').children().remove();
            select.parent().siblings('.return-stock-remarks-parent').append('<input class="form-control return-stock-remarks" type="text" name="remarks[]" value="-" form="return-stock-form" readonly>');
            break;
            
        default:
            select.siblings('.return-stock-sncode-parent').children().remove();
            select.siblings('.return-stock-sncode-parent').append('<input type="hidden" class="return-stock-sncode" name="sn_code[]" form="return-stock-form">');

            select.parent().siblings('.return-stock-remarks-parent').children().remove();
            select.parent().siblings('.return-stock-remarks-parent').append('<input class="form-control return-stock-remarks" type="text" name="remarks[]" placeholder="note.." form="return-stock-form" required>');
            break;
    }
})

$('#editCategoryModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var description = button.data('description')
    var uom = button.data('uom')
    var modal = $(this)

    uomArray = uom.split(', ');
    for(i = 0; i > uomArray.length; i++){
        // console.log(uomArray[i]);
    }

    modal.find(".modal-body #categoryId").val(id);
    modal.find(".modal-body #categoryDescription").val(description);
    modal.find(".modal-body #categoryName").val(name);
    $("#categoryUom").val(uomArray).change();
});

$("#editBrandModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var name = button.data("name");
    var modal = $(this);
    modal.find(".modal-body #brandId").val(id);
    modal.find(".modal-body #brandName").val(name);
});

$('a[data-toggle="tooltip"]').tooltip({
    animated: "fade",
    placement: "bottom",
    html: true,
});

// *: Build Edit JS
$('#modalEditBuild').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var partid = button.data('partid')
    var modal = $(this)
    if (jQuery.type(partid) == 'number') {
        // console.log(partid);
        modal.find('.modal-body #buildPartId').val(partid).change();
    }else{
        partidArray = partid.split(', ');
        // console.log(partidArray);
        modal.find('.modal-body #buildPartId').val(partidArray).change();
    };

    modal.find(".modal-body #buildId").val(id);
    modal.find(".modal-body #buildName").val(name);
});
// *: End Build Edit JS

// *: Request Form Append New Input JS
$(function () {
    // Set a variables
    i = 0;

    // Append a row
    $("#request-form-append-new").click(function () {
        $("#inputRequestAppend").append(
            '<tr id="' +
                i +
                '"><td class="sort-im-code"><input type="text" class="form-control" disabled></td><td class="sort-material"><select id="' +
                i +
                '" class="form-control inputPartRequestFormSelect2' +
                i +
                ' partOnChange" name="part_id[]" required><option></option></select></td><td class="sort-material"><select class="form-control inputBrandRequestFormSelect2" name="brand_id[]" required><option></option></select></td><td class="sort-quantity"><input type="number" name="quantity[]" class="form-control" value="1" min="1" required></td><td class="sort-uom"><input type="text" class="form-control" disabled></td><td class="sort-remark"><textarea class="form-control" name="remarks[]" rows="1" placeholder="Note.."></textarea></td><td class="text-center"><button class="btn request-form-delete" data-id="' +
                i +
                '"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="4" y1="7" x2="20" y2="7"></line><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg></button></td></tr>'
        );
        $(".inputPartRequestFormSelect2" + i).select2({
            data: datas,
            width: "100%",
            height: "100%",
            placeholder: "select part..",
            dropdownParent: $("#inputRequestFormParent"),
            theme: "bootstrap",
        });
        i++;
    });
});
// *: End Request Form Append New Input JS

/*
|--------------------------------------------------------------------------
| Detail Part Javascript
|--------------------------------------------------------------------------
*/

$("#dengan-rupiah").keyup(function () {
    this.value = formatRupiah(this.value, "Rp. ");
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

/*
 *|--------------------------------------------------------------------------
 *| Stock Javascript
 *|--------------------------------------------------------------------------
 */

$("#editWarehouseModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var regional = button.data("regional");
    var wh_name = button.data("wh_name");
    var kota = button.data("kota");
    var location = button.data("location");
    var wh_type = button.data("wh_type");
    var contract_status = button.data("contract_status");
    var start_at = button.data("start_at");
    var end_at = button.data("end_at");
    var status = button.data("status");
    var id = button.data("id");
    var modal = $(this);
    modal.find(".modal-body #whregional").val(regional);
    modal.find(".modal-body #wh_name").val(wh_name);
    modal.find(".modal-body #whkota").val(kota);
    modal.find(".modal-body #whlocation").val(location);
    modal.find(".modal-body #wh_type").val(wh_type);
    modal.find(".modal-body #whcontract_status").val(contract_status);
    modal.find(".modal-body #whstart_at").val(start_at);
    modal.find(".modal-body #whend_at").val(end_at);
    modal.find(".modal-body #whstatus").val(status);
    modal.find(".modal-body #whid").val(id);
});

$("#partCategory").on("change", function (e) {
    //Set Variables
    var optionSelected = $(this).find("option:selected");
    // var uom = optionSelected.data('uom');
    var brandId = optionSelected.data("brandid");
    var brandName = optionSelected.data("brandname");

    //Strings to Arrays
    // uomArray = uom.split(', ');
    brandArray = [];

    if (brandName !== "undefined") {
        if (brandName.includes(",")) {
            brandArray["id"] = brandId.split(", ");
            brandArray["name"] = brandName.split(", ");
        } else {
            brandArray["id"] = [brandId];
            brandArray["name"] = [brandName];
        }
    } else {
        brandArray["id"] = "";
        brandArray["name"] = "";
    }

    // Delete Other Options
    // $('.partUomOption').remove();
    $(".partBrandOption").remove();

    // Create New Options for UOM
    // uomArray.forEach(e => {
    //     $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    // });

    // Create New Options for Brands
    let i = 0;
    while (i < brandArray["id"].length) {
        $("#partBrand").append(
            "<option class='partBrandOption' value='" +
                brandArray["id"][i] +
                "'>" +
                brandArray["name"][i] +
                "</option>"
        );
        i++;
    }
});

$("#editPartCategory").on("change", function (e) {
    //Set Variables
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data("uom");
    var brandId = optionSelected.data("brandid");
    var brandName = optionSelected.data("brandname");

    //Strings to Arrays
    uomArray = uom.split(", ");
    brandArray = [];
    if (typeof brandId == "string") {
        brandArray["id"] = brandId.split(", ");
        brandArray["name"] = brandName.split(", ");
    } else {
        brandArray["id"] = "";
        brandArray["name"] = "";
    }

    // Delete Other Options
    $(".partUomOption").remove();
    $(".partBrandOption").remove();

    // Create New Options for UOM
    uomArray.forEach((e) => {
        $("#partUom").append(
            "<option class='partUomOption' value='" + e + "'>" + e + "</option>"
        );
    });

    // Create New Options for Brands
    let i = 0;
    while (i < brandArray["id"].length) {
        $("#partBrand").append(
            "<option class='partBrandOption' value='" +
                brandArray["id"][i] +
                "'>" +
                brandArray["name"][i] +
                "</option>"
        );
        i++;
    }
});

/*
|--------------------------------------------------------------------------
| AJAX
|--------------------------------------------------------------------------
*/

// Store Part & Segment
$(document).ready(function () {
    $.get("/ajax/part", function (data) {
        for (let i = 0; i < data["segments"].length; i++) {
            var segment = data["segments"][i];
            var brandString = data["brandString"].hasOwnProperty([
                segment["id"],
            ])
                ? data["brandString"][segment["id"]]
                : "";

            $("#partCategory").append(
                '<option class="partCategoryOption" value="' +
                    segment["id"] +
                    '" data-uom="' +
                    segment["category"]["uom"] +
                    '" data-brandname="' +
                    brandString["name"] +
                    '" data-brandid="' +
                    brandString["id"] +
                    '">' +
                    segment["name"] +
                    "</option>"
            );
        }
    });

    $(document).on('change', '.return-stock-sncode, .inputReturnStockSelect2, .return-stock-remarks', function (event) {
        event.preventDefault();

        grfId = $('.grf-id').val();
        grfCode = $('.grf-code').val();
        oldSnCodes = $('.return-stock-oldsncode');
        conditions = $('.inputReturnStockSelect2');
        snCodes = $('.return-stock-sncode');
        remarks = $('.return-stock-remarks');
        request = [];
        oldSnCodesArray = []; 
        conditionsArray = []; 
        snCodesArray = []; 
        remarksArray = []; 

        for (i = 0; i < oldSnCodes.length; i++) {
            oldSnCodesArray[i] = $(oldSnCodes[i]).val()
            conditionsArray[i] = $(conditions[i]).val()
            snCodesArray[i] = $(snCodes[i]).val()
            remarksArray[i] = $(remarks[i]).val()
        }

        request['old_sn_code'] = oldSnCodesArray; 
        request['condition'] = conditionsArray; 
        request['sn_code'] = snCodesArray; 
        request['remarks'] = remarksArray; 

        $.ajaxSetup({
            url: '/return/' + grfId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'post',
            data: {
                old_sn_code: oldSnCodesArray,
                condition: conditionsArray,
                sn_code: snCodesArray,
                remarks: remarksArray,
                isAjax: 'yep'
            },
            success: function () {
                $.get('/ajax/return/' + grfCode, function (data) {
                    $.each(data, function (key) {
                        const tab = $('.return-stock-' + key + '-requirement');
                        tab.html(data[key].length);
                    })
                });
            }
        });
    });

    $('#submitStoreCategory').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            url: "/segment",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "post",
            data: {
                name: jQuery("#segmentName").val(),
                category_id: jQuery("#segmentCategoryId").val(),
                isAjax: "yep",
            },
            success: function () {
                $("#createPartCategoryModal").hide();
                $(".inputPartSegmentSelect2").select2({
                    dropdownParent: $("#createPartModal"),
                    theme: "bootstrap",
                    placeholder: "Select..",
                    language: {
                        noResults: function () {
                            return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Segment</a>";
                        },
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    },
                });
                $(".partCategoryOption").remove();
                $.get("/ajax/part", function (data) {
                    for (let i = 0; i < data["segments"].length; i++) {
                        var segment = data["segments"][i];
                        var brandString = data["brandString"].hasOwnProperty([
                            segment["id"],
                        ])
                            ? data["brandString"][segment["id"]]
                            : "";

                        $("#partCategory").append(
                            '<option class="partCategoryOption" value="' +
                                segment["id"] +
                                '" data-uom="' +
                                segment["category"]["uom"] +
                                '" data-brandname="' +
                                brandString["name"] +
                                '" data-brandid="' +
                                brandString["id"] +
                                '">' +
                                segment["name"] +
                                "</option>"
                        );
                    }
                });
            },
        });
    });
});

$('.btn-input-sn').click(function(event){
    var thisButton = event.currentTarget;
    var transferFormsId = $(thisButton).data('transferformsid');
    var grfId = $(thisButton).data('grfid');
    var partId = $(thisButton).data('partid');
    var partName = $(thisButton).data('partname');
    var quantity = $(thisButton).data('quantity');

    $('#piecesSnModal').on('show.bs.modal', function () {
        $('#piecesSnModal .modal-body').children().remove();
        
        $('#piecesSnModal .modal-title').html(partName);

        $('#piecesSnModal .modal-body').append(
            '<input type="hidden" name="transfer_form_id" value="' + transferFormsId + '">' +
            '<input type="hidden" name="grf_id" value="' + grfId + '">' +
            '<input type="hidden" name="part_id" value="' + partId + '">' +
            '<span class="card-title">SN Code</span>'
        );

        for (i = 0; i < quantity; i++) {
            $('#piecesSnModal .modal-body').append(
                '<div class="form-group row">' +
                '<label for="staticEmail" class="col-sm-1 col-form-label">' + (i + 1) + '. </label>' +
                '<div class="col-sm-11">' +
                '<input type="text" class="form-control mb-3" name="sn_code[]" required>' +
                '</div>' +
                '</div>'
            );
        }
    });

    $('#bulkSnModal').on('show.bs.modal', function () {
        $('#bulkSnModal .bulk-hidden').children().remove();

        $('#bulkSnModal .bulk-hidden').append(
            '<input type="hidden" name="transfer_form_id" value="' + transferFormsId + '">' +
            '<input type="hidden" name="grf_id" value="' + grfId + '">' +
            '<input type="hidden" name="part_id" value="' + partId + '"></input>'
        );
    });
});

$(function () {
    var userId = $('.user-id').data('user');
});

$("[data-countdown]").each(function () {
    var $this = $(this),
        finalDate = $(this).data("countdown");
    $this.countdown(finalDate, function (event) {
        $this.html(event.strftime("%D days %H hours left"));
        if (event.strftime("%D : %H : %M : %S") == "00 : 00 : 00 : 00") {
            $(".alert").show();
            $(this).html("This offer has expired!");
            $(this)
                .parent()
                .parent()
                .parent()
                .children(".col-auto.align-self-center")
                .children(".badge")
                .show();
        }
    });
});

$(".btn_update").click(function (event) {
    var contract = $(event.currentTarget).data("tenggat");
    if (contract == "permanen") {
        $(".disContract").attr("disabled", "disabled");
    } else {
        $(".disContract").removeAttr("disabled");
    }
});

/// js for disable input
$("select")
    .change(function () {
        if ($(this).val() == "Permanent") {
            $(".disContract").attr("disabled", "disabled");
        } else {
            $(".disContract").removeAttr("disabled");
        }
    })
    .trigger("change");

// Disable Trix File Input
document.addEventListener("trix-file-accept", function (e) {
    e.preventDefault();
});

let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: -34.397,
            lng: 150.644,
        },
        zoom: 8,
        scrollwheel: true,
    });

    const uluru = {
        lat: -34.397,
        lng: 150.644,
    };
    let marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true,
    });

    google.maps.event.addListener(marker, "position_changed", function () {
        let lat = marker.position.lat();
        let lng = marker.position.lng();
        $("#lat").val(lat);
        $("#lng").val(lng);
    });

    google.maps.event.addListener(map, "click", function (event) {
        pos = event.latLng;
        marker.setPosition(pos);
    });
}

/*
 *|--------------------------------------------------------------------------
 *| Detail Part Javascript
 *|--------------------------------------------------------------------------
 */

$(".editPartGRF").select2({
    placeholder: "Select a state",
    // width: 'resolve' // need to override the changed default

    // containerCss: "wrap",
    // containerCssClass: "error",
    // dropdownCssClass: "test",
    theme: "bootstrap",
});

$("#modal-confirmation-deactive").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    // console.log(id);
    var modal = $(this);
    modal.find(".modal-footer #user_id").val(id);
});

$("#generate_sj").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    console.log(id);
    var modal = $(this);
    modal.find("#grf_id").val(id);
});

$(".upload-sn").on("click", function (event) {
    // Sets Variables
    const button = $(event.target);
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

    // Bulk Print HTML
    inputBulkPartId.val(partId);
    inputBulkRequestFormId.val(requestFormsid);
    inputBulkPartName.html(partName);

    // console.log(inputBulkRequestFormId);
    // console.log(inputPiecesRequestFormId);

    // Peices Print HTML
    inputPieces.children().remove();

    inputPiecesRequestFormId.val(requestFormsid);

    for (i = 0; i < icQuantity; i++) {
        inputPieces.append(
            '<input class="input-pieces-part-id" type="hidden" name="part_id" value="' +
                partId +
                '">' +
                '<label class="input-pieces-part-name form-label">' +
                partName +
                "</label>" +
                '<input type="text" class="form-control mb-3" name="sn_code[]" required="required">'
        );
    }
});

$(".inputReturnStockSelect2").on("select2:select", function (e) {
    var data = e.params.data;
    var select = $(e.target);

    switch (data.id) {
        case "replace":
            select.siblings(".return-stock-sncode-parent").children().remove();
            select
                .siblings(".return-stock-sncode-parent")
                .append(
                    '<input class="form-control return-stock-sncode mt-3" type="text" name="sn_code[]" placeholder="sn code.." form="return-stock-form" required>'
                );

            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .children()
                .remove();
            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .append(
                    '<input class="form-control" type="text" name="remarks[]" placeholder="note.." form="return-stock-form" required>'
                );
            break;

        case "good":
            select.siblings(".return-stock-sncode-parent").children().remove();
            select
                .siblings(".return-stock-sncode-parent")
                .append(
                    '<input type="hidden" name="sn_code[]" form="return-stock-form">'
                );

            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .children()
                .remove();
            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .append(
                    '<input class="form-control" type="text" name="remarks[]" value="-" form="return-stock-form" readonly>'
                );
            break;

        default:
            select.siblings(".return-stock-sncode-parent").children().remove();
            select
                .siblings(".return-stock-sncode-parent")
                .append(
                    '<input type="hidden" name="sn_code[]" form="return-stock-form">'
                );

            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .children()
                .remove();
            select
                .parent()
                .siblings(".return-stock-remarks-parent")
                .append(
                    '<input class="form-control" type="text" name="remarks[]" placeholder="note.." form="return-stock-form" required>'
                );
            break;
    }
});

function addSelectICApprove(index, request_qty) {
    $("#selectICApprove_" + index).append(
        '<div class=" mt-2"><select name="part[]"class="editPartGRF"><option value="" style="width: 100%">-- Select Part --</option></select></div>'
    );
    $("#quantityICApprove_" + index).append(
        '<input type="number" class="form-control mt-2 quantity_' +
            index +
            '"  name="quantity[]" value="0"  onkeyup="changeQtyIC(' +
            index +
            "," +
            request_qty +
            ')">'
    );
    initailizeSelect2(index);
}

function initailizeSelect2(index) {
    $.get("/api/part/segment/" + index, function (data) {
        for (let i = 0; i < data.data.length; i++) {
            $(".editPartGRF").append(
                '<option class="partCategoryOption" value="' +
                    data.data[i].id +
                    '" >' +
                    data.data[i].name +
                    "</option>"
            );
        }
    });
    $(".editPartGRF").select2({
        placeholder: "Select a state",
        theme: "bootstrap",
    });
}

function changeQtyIC(id, request_qty) {
    var values = $(".quantity_" + id)
        .map(function () {
            return $(this).val();
        })
        .get();

    var total = values.reduce(function (a, b) {
        return parseInt(a === "" ? 0 : a) + parseInt(b === "" ? 0 : b);
    });

    $("#qty_input_" + id).text(total);
    if (request_qty < total) {
        if ($(".alert-" + id).length === 0) {
            $("#alert_" + id).append(
                '<span class="text-danger mt-3 alert-' +
                    id +
                    '">data tidak boleh lebih dari ' +
                    request_qty +
                    "</span>"
            );
            $("#button_submit").attr("disabled", "disabled");
            // button_submit
        }
    } else {
        $("#button_submit").removeAttr('disabled');
        $(".alert-" + id).remove();
    }
}

$('.btn-repair').click(function (event) {
    var thisButton = event.currentTarget;
    var snCode = $(thisButton).data('sncode');

    // console.log(snCode)

    $('.form-repair').attr('action', '/rekondisigood/'+snCode);
});

$('.btn-reject').click(function (event) {
    var thisButton = event.currentTarget;
    var snCode = $(thisButton).data('sncode');

    $('.form-reject').attr('action', '/rekondisigood/'+snCode);
});
