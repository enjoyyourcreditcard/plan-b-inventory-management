@extends('layouts.main') @section('content')
    <div class="">
        <div class="row" style="margin: 0px">
            <div class="container">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                                WAREHOUSE APPROVAL</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                                {{-- <a href="#" class="btn btn-primary "><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>New Part</a> --}}
                                {{-- <div id="parts"></div> --}}
                                <div class="card mt-4">
                                    <div class="table-responsive">
                                        <table id="datatable"
                                            class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th class="col-3">GRF Code</th>
                                                    <th class="col-6">Requester Name</th>
                                                    <th class="col-2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($whapproval as $data)
                                                <tr>
                                                    <td>{{ $data->grf_code }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td><a href="/warehouse-approv/{{ str_replace('/', '~', $data->grf_code) }}" class="btn btn-primary col-12"><b>CHECKLIST</b></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-end me-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-profile-12" role="tabpanel">
                                <div id="part_category"></div>
                            </div>
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
