// formatRupiah

/*
|--------------------------------------------------------------------------
| Part Javascript
|--------------------------------------------------------------------------
*/
$(".select2").prepend('<option selected></option>').select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#createPartModal"),
    placeholder: "Select..",
    theme: "bootstrap"
}
);

$(".select3").select2({
    width: '100%',
    height: '10px',
    tags: true,
    dropdownParent: $("#createPartModal"),
    theme: "bootstrap"
}
);

$(".select5").select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#createCategoryModal"),
    theme: "classic"
}
);

$(".select6").select2({
    width: '100%',
    height: '10px',
    multiple:true,
    dropdownParent: $("#editCategoryModal"),
    theme: "classic"

}
);

$(".select2EditPart").select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#EditPartModal"),
    theme: "bootstrap"
}
);

$(".select3EditPart").select2({
    width: '100%',
    height: '10px',
    tags: true,
    dropdownParent: $("#EditPartModal"),
    theme: "bootstrap"
}
);

$('#editCategoryModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var description = button.data('description')
    var uom = button.data('uom')
    var modal = $(this)

    uomArray = uom.split(', ');
    for(i = 0; i > uomArray.length; i++){
        console.log(uomArray[i]);
    }
    
    modal.find('.modal-body #categoryId').val(id)
    modal.find('.modal-body #categoryDescription').val(description)
    modal.find('.modal-body #categoryName').val(name)
    $('#categoryUom').val(uomArray).change();
})

$('#editBrandModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #brandId').val(id)
    modal.find('.modal-body #brandName').val(name)
})


/*
|--------------------------------------------------------------------------
| Detail Javascript
|--------------------------------------------------------------------------
*/



$( "#dengan-rupiah" ).keyup(function() {
    this.value = formatRupiah(this.value, 'Rp. ');
});



function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}



$('#partCategory').on('change', function (e) {
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data('uom');
    uomArray = uom.split(', ');
    $('.partUomOption').remove();
    uomArray.forEach(e => {
        $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    });
});


$('#editPartCategory').on('change', function (e) {
    console.log('hello :)');
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data('uom');
    uomArray = uom.split(', ');
    $('.partUomOption').remove();
    uomArray.forEach(e => {
        $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    });
});