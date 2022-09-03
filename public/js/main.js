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

$('a[data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});

// <<<<<<< HEAD
// const name = document.querySelectorAll('.name'); 
// const inputNameEdit = document.querySelector('.input-name-edit'); 
// const tombolEdit = document.querySelectorAll('.tombol-edit'); 
// const formEdit = document.querySelector('.form-edit'); 

// tombolEdit.forEach((e, i) => { 
//     e.addEventListener('click', function () { 
//         inputNameEdit.value = ''; 
//         inputNameEdit.value = name[i].innerHTML.trim();                         
//         formEdit.removeAttribute('action'); 
//         formEdit.setAttribute('action', '/brand/' + e.getAttribute('data-id')) 
//     }) 
// }); 



/*
|--------------------------------------------------------------------------
| Detail Part Javascript
|--------------------------------------------------------------------------
*/



$("#dengan-rupiah").keyup(function () {
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




/*
|--------------------------------------------------------------------------
| Stock Javascript
|--------------------------------------------------------------------------
*/


$('#editWarehouseModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var regional = button.data('regional')
    var wh_name = button.data('wh_name')
    var kota = button.data('kota')
    var location = button.data('location')
    var wh_type = button.data('wh_type')
    var contract_status = button.data('contract_status')
    var start_at = button.data('start_at')
    var end_at = button.data('end_at')
    var status = button.data('status')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #whregional').val(regional)
    modal.find('.modal-body #wh_name').val(wh_name)
    modal.find('.modal-body #whkota').val(kota)
    modal.find('.modal-body #whlocation').val(location)
    modal.find('.modal-body #wh_type').val(wh_type)
    modal.find('.modal-body #whcontract_status').val(contract_status)
    modal.find('.modal-body #whstart_at').val(start_at)
    modal.find('.modal-body #whend_at').val(end_at)
    modal.find('.modal-body #whstatus').val(status)
    modal.find('.modal-body #whid').val(id)
})

//   // console.log(location);
//   const whName = document.querySelectorAll(".wh_name");
//   const inputWhNameEdit = document.getElementById("inputwh_name");
//   const regional = document.querySelectorAll('.regional');
//   const inputRegionalEdit = document.getElementById('inputregional');
//   const kota = document.querySelectorAll('.kota');
//   const inputKotaEdit = document.getElementById('inputkota');
//   const locationWh = document.querySelectorAll('.whlocation');
//   const inputLocationWhEdit = document.getElementById('inputlocation');
//   const whType = document.querySelectorAll('.wh_type');
//   const inputWhTypeEdit = document.getElementById('inputwh_type');
//   const contractStatus = document.querySelectorAll('.contract_status');
//   const inputContractStatusEdit = document.getElementById('inputcontract_status');
//   const startAt = document.querySelectorAll('.start_at');
//   const inputStartAtEdit = document.getElementById('inputstart_at');
//   const endAt = document.querySelectorAll('.end_at');
//   const inputEndAtEdit = document.getElementById('inputend_at');
//   const tombolEdit = document.querySelectorAll('.btn_update');
//   const formEdit = document.getElementById('update_wh');


//   tombolEdit.forEach((e, i) => {
//       // console.log(locationWh[i]);
//       e.addEventListener('click', function() {
//           inputWhNameEdit.value = '';
//           inputWhNameEdit.value = whName[i].innerHTML.trim();
//           inputRegionalEdit.value = '';
//           inputRegionalEdit.value = regional[i].innerHTML.trim();
//           inputKotaEdit.value = '';
//           inputKotaEdit.value = kota[i].innerHTML.trim();
//           inputLocationWhEdit.value = '';
//           inputLocationWhEdit.value = locationWh[i].innerHTML.trim();
//           inputWhTypeEdit.value = '';
//           inputWhTypeEdit.value = whType[i].innerHTML.trim();
//           inputContractStatusEdit.value = '';
//           inputContractStatusEdit.value = contractStatus[i].innerHTML.trim();
//           inputStartAtEdit.value = '';
//           inputStartAtEdit.value = startAt[i].innerHTML.trim();
//           inputEndAtEdit.value = '';
//           inputEndAtEdit.value = endAt[i].innerHTML.trim();
//           formEdit.removeAttribute('action');
//           formEdit.setAttribute('action', '/warehouse/' + e.getAttribute('data-id'))
//       })
//   });
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
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data('uom');
    uomArray = uom.split(', ');
    $('.partUomOption').remove();
    uomArray.forEach(e => {
        $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    });
});
