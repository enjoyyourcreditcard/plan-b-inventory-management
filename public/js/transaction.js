
function addSelectICApprove(index, request_qty) {
    $("#selectICApprove_" + index).append(
        '<div class=" mt-2"><select name="part[]"class="editPartGRF tom-select w-full"><option value="" style="width: 100%">-- Select Part --</option></select></div>'
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
    jQuery.get("/api/part/segment/" + index, function (data) {
        for (let i = 0; i < data.data.length; i++) {
            $(".editPartGRF").append(
                '<option class="partCategoryOption " value="' +
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
    // console.log($(".quantity_" + id).val());
    var values = jQuery(".quantity_" + id).map(function () {
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
