// formatRupiah

/*
|--------------------------------------------------------------------------
| Part Javascript
|--------------------------------------------------------------------------
*/
$(".select2").select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#createPartModal"),
    theme: "bootstrap"
}
);

// *: Build JS
$(".inputBuildSelect2").select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#createBuildModal"),
    theme: "classic"
});

$(".editBuildSelect2").select2({
    width: '100%',
    height: '10px',
    multiple:true,
    dropdownParent: $("#modalEditBuild"),
    theme: "classic"
});
// *: End Build JS


$('#editCategoryModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var description = button.data('description')
    var modal = $(this)
    modal.find('.modal-body #categoryId').val(id)
    modal.find('.modal-body #categoryDescription').val(description)
    modal.find('.modal-body #categoryName').val(name)
})

$('#editBrandModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #brandId').val(id)
    modal.find('.modal-body #brandName').val(name)
})

// *: Build Edit JS
$('#modalEditBuild').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var partid = button.data('partid')
    var modal = $(this)
    if (jQuery.type(partid) == 'number') {
        console.log(partid);
        modal.find('.modal-body #buildPartId').val(partid).change();
    }else{
        partidArray = partid.split(', ');
        console.log(partidArray);
        modal.find('.modal-body #buildPartId').val(partidArray).change();
    };

    modal.find('.modal-body #buildId').val(id)
    modal.find('.modal-body #buildName').val(name)
})
// *: End Build Edit JS




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
