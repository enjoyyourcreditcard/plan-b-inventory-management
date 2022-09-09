// formatRupiah

/*
|--------------------------------------------------------------------------
| Part Javascript
|--------------------------------------------------------------------------
*/
$(".inputPartCategorySelect2").prepend('<option selected></option>').select2({
    width: '100%',
    height: '10px',
    dropdownParent: $("#createPartModal"),
    placeholder: "Select..",
    theme: "bootstrap",
    _type: "open",
    language: {
        "noResults": function(){
            return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Category</a>";
        }
    },
    escapeMarkup: function (markup) {
        return markup;
    }
}
);

function showPartCategoryModal () {
    $('#createPartCategoryModal').show();
    $(".inputPartCategorySelect2").select2("close");
};
function bye () {
    $('#createPartCategoryModal').hide();
    $(".inputPartCategorySelect2").select2({
        dropdownParent: $("#createPartModal"),
        "language": {
            "noResults": function(){
                return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Category</a>";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });
};

$(".inputPartAllSelect2").prepend('<option selected></option>').select2({
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

// *: Request Form JS
$(".inputRequestFormSelect2").select2({
    dropdownParent: $("#inputRequestFormParent"),
    placeholder: "Select part..",
    theme: "bootstrap"
}
);
// *: End Request Form JS

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

// *: Request Form Append New Input JS
$(function () {
    i = 0;
    var datas = [];
    var options = $('.inputRequestFormSelect2');
    for (i = 0; i < options.children().length; i++) {
        datas.push({
            id: options.children()[i].value,
            text: options.children()[i].text
        });
    }
    $('#request-form-append-new').click(function () {
        $( "#inputRequestAppend" ).append('<div class="mb-3" id="' + i + '"><hr><div class="row"><div class="col-md-10 col-6"><select class="form-control inputRequestFormAppendSelect2" name="part_id[]" required><option></option></select></div><div class="col-md-1 col-3"><input type="number" class="form-control" name="quantity[]" placeholder="Input placeholder" value="1" min="1"></div><div class="col-md-1 col-3"><button class="btn request-form-delete" data-id="'+ i +'"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="4" y1="7" x2="20" y2="7"></line><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg></button></div></div><div class="col-11 mt-3"><textarea class="form-control" rows="3" name="remarks[]" placeholder="Note.."></textarea></div></div>');
        $(".inputRequestFormAppendSelect2").select2({
            data: datas,
            width: '100%',
            height: '100%',
            placeholder: "Select part..",
            dropdownParent: $("#inputRequestFormParent"),
            theme: "bootstrap"
        });
        i++;
    });
    $('#inputRequestAppend').on('click', '.request-form-delete', function(event){
        var button = $(event.currentTarget);
        var id = button.data('id');
        var inputRequestFormDelete = $('#'+id);
        inputRequestFormDelete.remove();
    });
});
// *: End Request Form Append New Input JS


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

$('#partCategory').on('change', function (e) {
    //Set Variables
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data('uom');
    var brandId = optionSelected.data('brandid');
    var brandName = optionSelected.data('brandname');
    
    //Strings to Arrays
    uomArray = uom.split(', ');
    brandArray = [];
    if (typeof(brandId) == 'string')
    {
        brandArray['id'] = brandId.split(', ');
        brandArray['name'] = brandName.split(', ');
    }
    else
    {
        brandArray['id'] = '';
        brandArray['name'] = '';
    }

    // Delete Other Options
    $('.partUomOption').remove();
    $('.partBrandOption').remove();

    // Create New Options for UOM
    uomArray.forEach(e => {
        $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    });

    // Create New Options for Brands
    let i = 0;
    while (i < brandArray['id'].length) {
        $('#partBrand').append("<option class='partBrandOption' value='"+ brandArray['id'][i] +"'>"+ brandArray['name'][i] +"</option>");
        i++;
    }
});


$('#editPartCategory').on('change', function (e) {
    //Set Variables
    var optionSelected = $(this).find("option:selected");
    var uom = optionSelected.data('uom');
    var brandId = optionSelected.data('brandid');
    var brandName = optionSelected.data('brandname');
    console.log('Pertama ' + uom);
    console.log('Kedua ' + brandId);

    //Strings to Arrays
    uomArray = uom.split(', ');
    brandArray = [];
    if (typeof(brandId) == 'string')
    {
        brandArray['id'] = brandId.split(', ');
        brandArray['name'] = brandName.split(', ');
    }
    else
    {
        brandArray['id'] = '';
        brandArray['name'] = '';
    }

    // Delete Other Options
    $('.partUomOption').remove();
    $('.partBrandOption').remove();

    // Create New Options for UOM
    uomArray.forEach(e => {
        $('#partUom').append("<option class='partUomOption' value='"+ e +"'>"+ e +"</option>");
    });
    
    // Create New Options for Brands
    let i = 0;
    while (i < brandArray['id'].length) {
        $('#partBrand').append("<option class='partBrandOption' value='"+ brandArray['id'][i] +"'>"+ brandArray['name'][i] +"</option>");
        i++;
    }
});



/*
|--------------------------------------------------------------------------
| AJAX
|--------------------------------------------------------------------------
*/


$(document).ready(function () {
    $.get('/ajax/part', function (data) {
        for (let i = 0; i < data['categories'].length; i++) {
            $('#partCategory').append('<option class="partCategoryOption" value="' + data['categories'][i]['id'] + '" data-uom="' + data['categories'][i]['uom'] + '" data-brandname="' + (typeof data['brandString'][data['categories'][i]['id']] == 'undefined' ? '' : (typeof data['brandString'][data['categories'][i]['id']]['name'] == 'undefined' ? '' : data['brandString'][data['categories'][i]['id']]['name'])) + '" data-brandid="' + (typeof data['brandString'][data['categories'][i]['id']] == 'undefined' ? '' : (typeof data['brandString'][data['categories'][i]['id']]['id'] == 'undefined' ? '' : data['brandString'][data['categories'][i]['id']]['id'])) + '">' + data['categories'][i]['name'] + '</option>')
        }
    });

    $('#submitStoreCategory').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            url: '/category',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'post',
            data: {
                name: jQuery('#categoryName').val(),
                description: jQuery('#categoryDescription').val(),
                uom: jQuery('#storeCategoryUom').val(),
                isAjax: 'yep'
            },
            success: function () {
                $('#createPartCategoryModal').hide();
                $(".inputPartCategorySelect2").select2({
                    dropdownParent: $("#createPartModal"),
                    "language": {
                        "noResults": function(){
                            return "No Results Found.. <a class='btn btn-sm float-end mb-2' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' onClick='showPartCategoryModal()'>Create Category</a>";
                        }
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }
                });
                $('.partCategoryOption').remove();
                $.get('/ajax/part', function (data) {
                    for (let i = 0; i < data['categories'].length; i++) {
                        $('#partCategory').append('<option class="partCategoryOption" value="' + data['categories'][i]['id'] + '" data-uom="' + data['categories'][i]['uom'] + '" data-brandname="' + (typeof data['brandString'][data['categories'][i]['id']] == 'undefined' ? '' : (typeof data['brandString'][data['categories'][i]['id']]['name'] == 'undefined' ? '' : data['brandString'][data['categories'][i]['id']]['name'])) + '" data-brandid="' + (typeof data['brandString'][data['categories'][i]['id']] == 'undefined' ? '' : (typeof data['brandString'][data['categories'][i]['id']]['id'] == 'undefined' ? '' : data['brandString'][data['categories'][i]['id']]['id'])) + '">' + data['categories'][i]['name'] + '</option>')
                    }
                });
            }
        });
    });
});
