@section('title', 'Home WH')
@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                            <div id="warehouse-approved"></div>
                        </div>
                            <div id="part_category"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- @section('jsModal')
<script>
    // console.log(location);
        const whName = document.querySelectorAll(".wh_name");
        const inputWhNameEdit = document.getElementById("inputwh_name");
        const regional = document.querySelectorAll('.regional');
        const inputRegionalEdit = document.getElementById('inputregional');
        const kota = document.querySelectorAll('.kota');
        const inputKotaEdit = document.getElementById('inputkota');
        const locationWh = document.querySelectorAll('.whlocation');
        const inputLocationWhEdit = document.getElementById('inputlocation');
        const whType = document.querySelectorAll('.wh_type');
        const inputWhTypeEdit = document.getElementById('inputwh_type');
        const contractStatus = document.querySelectorAll('.contract_status');
        const inputContractStatusEdit = document.getElementById('inputcontract_status');
        const startAt = document.querySelectorAll('.start_at');
        const inputStartAtEdit = document.getElementById('inputstart_at');
        const endAt = document.querySelectorAll('.end_at');
        const inputEndAtEdit = document.getElementById('inputend_at');
        const tombolEdit = document.querySelectorAll('.btn_update');
        const formEdit = document.getElementById('update_wh');


        tombolEdit.forEach((e, i) => {
            // console.log(locationWh[i]);
            e.addEventListener('click', function() {
                inputWhNameEdit.value = '';
                inputWhNameEdit.value = whName[i].innerHTML.trim();
                inputRegionalEdit.value = '';
                inputRegionalEdit.value = regional[i].innerHTML.trim();
                inputKotaEdit.value = '';
                inputKotaEdit.value = kota[i].innerHTML.trim();
                inputLocationWhEdit.value = '';
                inputLocationWhEdit.value = locationWh[i].innerHTML.trim();
                inputWhTypeEdit.value = '';
                inputWhTypeEdit.value = whType[i].innerHTML.trim();
                inputContractStatusEdit.value = '';
                inputContractStatusEdit.value = contractStatus[i].innerHTML.trim();
                inputStartAtEdit.value = '';
                inputStartAtEdit.value = startAt[i].innerHTML.trim();
                inputEndAtEdit.value = '';
                inputEndAtEdit.value = endAt[i].innerHTML.trim();
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/warehouse/' + e.getAttribute('data-id'))
            })
        });
</script>
@endsection --}}