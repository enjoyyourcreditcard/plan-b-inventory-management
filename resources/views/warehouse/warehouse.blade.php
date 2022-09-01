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
                                WAREHOUSE</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-profile-12" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                                Category</a>
                        </li>
                    </ul>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Create +
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Create WareHouse</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/warehouse" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">WareHouse Name</label>
                                                <input type="text" name="wh_name" class="form-control"
                                                    id="inputWarehouse" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Regional</label>
                                                <input type="text" name="regional" class="form-control "
                                                    id="inputReginal">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" name="kota" class="form-control " id="inputCity">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Location</label>
                                                <input type="text" name="location" class="form-control "
                                                    id="input">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">WareHouse Type</label>
                                                <input type="text" name="wh_type" class="form-control "
                                                    id="inputType">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Contract Status</label>
                                                <input type="text" name="contract_status" class="form-control "
                                                    id="inputContract">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Start At</label>
                                                <input type="date" name="start_at" class="form-control "
                                                    id="inputStart">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">End At</label>
                                                <input type="date" name="end_at" class="form-control "
                                                    id="inputEnd">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control "
                                                    id="inputEnd">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        {{-- *End Form --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Submit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- * end modal insert --}}
                        {{-- * modal update --}}
                        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Update WareHouse</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/warehouse" method="POST" id="update_wh" class="update_wh">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">WareHouse Name</label>
                                                <input type="text" name="wh_name" class="form-control "
                                                    id="inputwh_name" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Regional</label>
                                                <input type="text" name="regional" class="form-control "
                                                    id="inputregional">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" name="kota" class="form-control "
                                                    id="inputkota">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Location</label>
                                                <input type="text" name="location" class="form-control "
                                                    id="inputlocation">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">WareHouse Type</label>
                                                <input type="text" name="wh_type" class="form-control "
                                                    id="inputwh_type">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Contract Status</label>
                                                <input type="text" name="contract_status" class="form-control "
                                                    id="inputcontract_status">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Start At</label>
                                                <input type="date" name="start_at" class="form-control"
                                                    id="inputstart_at">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">End At</label>
                                                <input type="date" name="end_at" class="form-control"
                                                    id="inputend_at">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Submit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        {{--  end modal update --}}
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
                                                    <th>#</th>
                                                    <th>WareHouse Name</th>
                                                    <th>Regional</th>
                                                    <th>City</th>
                                                    <th>Location</th>
                                                    <th>WareHouse Type</th>
                                                    <th>Contract Status</th>
                                                    <th>Start At</th>
                                                    <th>End At</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($warehouse as $item)
                                                    <tr>
                                                        <th>{{ $no++ }}</th>
                                                        <td class="wh_name">{{ $item->wh_name }}</td>
                                                        <td class="regional">{{ $item->regional }}</td>
                                                        <td class="kota">{{ $item->kota }}</td>
                                                        <td class="whlocation">{{ $item->location }}</td>
                                                        <td class="wh_type">{{ $item->wh_type }}</td>
                                                        <td class="contract_status">{{ $item->contract_status }}</td>
                                                        <td class="start_at">{{ $item->start_at }}</td>
                                                        <td class="end_at">{{ $item->end_at }}</td>
                                                        <td style="text-transform: capitalize;">{{ $item->status }}</td>
                                                        <td>
                                                            <a href="{{ url('/inActive/' . $item->id) }}">Change</a>
                                                            |
                                                            <a href="/warehouse/{{ $item->id }}" class="btn_update"
                                                                data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit">
                                                                Edit
                                                            </a>
                                                        </td>
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
@section('jsModal')
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
@endsection
