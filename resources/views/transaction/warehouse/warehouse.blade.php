@extends('layouts.app') @section('content')
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
                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| Modal Insert Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}
                        <div class="modal modal-blur fade modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Create WareHouse</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/warehouse" method="POST">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">WareHouse Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="inputWarehouse" aria-describedby="emailHelp"
                                                    placeholder="Input WareHouse Name" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">Regional</label>
                                                <select class="form-select" name="regional" id="regional" required>
                                                    <option value="">Select Regional</option>
                                                    <option value="jakarta">Jakarta</option>
                                                    <option value="depok">Depok</option>
                                                    <option value="bogor">Bogor</option>
                                                    <option value="bekasi">BeKasi</option>
                                                    <option value="tanggerang">Tanggerang</option>
                                                    <option value="bandung">Bandung</option>
                                                    <option value="solo">Solo</option>
                                                    <option value="medan">Medan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" name="city" class="form-control "
                                                    id="inputCity" placeholder="Input City" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">Location</label>
                                                <input type="text" name="location" class="form-control "
                                                    id="input" placeholder="Input Location" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">WareHouse Type</label>
                                                <input type="text" name="type" class="form-control "
                                                    id="inputType" placeholder="Input WareHouse Type" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="baris d-flex gap-1">
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">Contract Status</label>
                                                        <select class="form-select" name="contract_status"
                                                            id="contract_status" onchange="checkOption(this)" required>
                                                            <option selected disabled>Select Contract Status</option>
                                                            <option value="sewa">Sewa</option>
                                                            <option value="permanen">Permanen</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">Expired</label>
                                                        <input type="date" name="expired"
                                                            class="form-control disContract" id="inputTenggat" required>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- !
                                                !|--------------------------------------------------------------------------
                                                !| INPUT LATITUDE DAN LONGITUDE
                                                !|--------------------------------------------------------------------------
                                            ! --}}
                                            <div class="form-group mb-3">
                                                <div class="contenttt d-flex gap-1">
                                                    <div class="left col-6">
                                                        <label for="exampleInputPassword1">latitude</label>
                                                        <input type="text" name="lat" class="form-control "
                                                            id="lat" required>
                                                    </div>
                                                    <div class="right col-6">
                                                        <label for="exampleInputPassword1">longtitude</label>
                                                        <input type="text" name="lng" class="form-control "
                                                            id="lng" required>
                                                    </div>
                                                </div>
                                                <div id="map" style="height: 250px; width: 670px" class="my-3">
                                                </div>
                                                <script>
                                                    let map;

                                                    function initMap() {
                                                        map = new google.maps.Map(document.getElementById("map"), {
                                                            center: {
                                                                lat: -34.397,
                                                                lng: 150.644
                                                            },
                                                            zoom: 8,
                                                            scrollwheel: true,
                                                        });

                                                        const uluru = {
                                                            lat: -34.397,
                                                            lng: 150.644
                                                        };
                                                        let marker = new google.maps.Marker({
                                                            position: uluru,
                                                            map: map,
                                                            draggable: true
                                                        });

                                                        google.maps.event.addListener(marker, 'position_changed',
                                                            function() {
                                                                let lat = marker.position.lat()
                                                                let lng = marker.position.lng()
                                                                $('#lat').val(lat)
                                                                $('#lng').val(lng)
                                                            })

                                                        google.maps.event.addListener(map, 'click',
                                                            function(event) {
                                                                pos = event.latLng
                                                                marker.setPosition(pos)
                                                            })
                                                    }
                                                </script>
                                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
                                            </div>
                                            {{-- !
                                                !|--------------------------------------------------------------------------
                                                !| END INPUT LATITUDE DAN LONGITUDE
                                                !|--------------------------------------------------------------------------
                                            ! --}}
                                            <div class="form-group mb-3">
                                                <div class="baris2 d-flex gap-1">
                                                    <div class="kanan col-6">
                                                        <label for="exampleInputPassword1">Start At</label>
                                                        <input type="date" name="start_at" class="form-control "
                                                            id="inputStart" placeholder="Start At" required>
                                                    </div>
                                                    <div class="kiri col-6">
                                                        <label for="exampleInputPassword1">End At</label>
                                                        <input type="date" name="end_at" class="form-control "
                                                            id="inputEnd" placeholder="End At" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="hidden" name="status" class="form-control "
                                                    id="inputEnd">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        {{-- *End Form --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| End Modal Insert Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}

                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| Modal Update Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}
                        <div class="modal fade modal-lg" id="modal-edit" tabindex="-1" role="dialog"
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
                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">WareHouse Name</label>
                                                <input type="text" name="name" class="form-control "
                                                    id="inputwh_name" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">Regional</label>
                                                <select class="form-select" name="regional" id="inputregional" required>
                                                    <option value=""></option>
                                                    <option value="jakarta">Jakarta</option>
                                                    <option value="depok">Depok</option>
                                                    <option value="bogor">Bogor</option>
                                                    <option value="bekasi">BeKasi</option>
                                                    <option value="tanggerang">Tanggerang</option>
                                                    <option value="bandung">Bandung</option>
                                                    <option value="solo">Solo</option>
                                                    <option value="medan">Medan</option>
                                                </select>
                                                {{-- <input type="text" name="regional" class="form-control "
                                                    id="inputregional"> --}}
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" name="city" class="form-control "
                                                    id="inputkota">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">Location</label>
                                                <input type="text" name="location" class="form-control "
                                                    id="inputlocation">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1">WareHouse Type</label>
                                                <input type="text" name="type" class="form-control "
                                                    id="inputwh_type">
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="baris d-flex gap-2">
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">Contract Status</label>
                                                        <select class="form-select" name="contract_status"
                                                            id="inputcontract_status" onchange="checkOption(this)"
                                                            required>
                                                            <option selected disabled> </option>
                                                            <option value="sewa">Sewa</option>
                                                            <option value="permanen">Permanen</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">Expired</label>
                                                        <input type="date" name="expired"
                                                            class="form-control disContract" id="inputtenggatwaktu">
                                                    </div>
                                                </div>
                                            </div>
                                            <div></div>
                                            {{-- !
                                                    !|--------------------------------------------------------------------------
                                                    !| Maps
                                                    !|--------------------------------------------------------------------------
                                                ! --}}
                                            <div class="form-group mb-3">
                                                <div class="contenttt d-flex gap-1">
                                                    <div class="left col-6">
                                                        <label for="exampleInputPassword1">latitude</label>
                                                        <input type="text" name="lat" class="form-control "
                                                            id="inputLat">
                                                    </div>
                                                    <div class="right col-6">
                                                        <label for="exampleInputPassword1">longtitude</label>
                                                        <input type="text" name="lng" class="form-control "
                                                            id="inputLng">
                                                    </div>
                                                </div>
                                                <div id="map" style="height: 250px; width: 670px" class="my-3">
                                                </div>
                                                <script>
                                                    let map;

                                                    function initMap() {
                                                        map = new google.maps.Map(document.getElementById("map"), {
                                                            center: {
                                                                lat: -6.200,
                                                                lng: 106.816
                                                            },
                                                            zoom: 10,
                                                            scrollwheel: true,
                                                        });

                                                        const uluru = {
                                                            lat: -6.200,
                                                            lng: 106.816
                                                        };
                                                        let marker = new google.maps.Marker({
                                                            position: uluru,
                                                            map: map,
                                                            draggable: true
                                                        });

                                                        google.maps.event.addListener(marker, 'position_changed',
                                                            function() {
                                                                let lat = marker.position.lat()
                                                                let lng = marker.position.lng()
                                                                $('#lat').val(lat)
                                                                $('#lng').val(lng)
                                                            })

                                                        google.maps.event.addListener(map, 'click',
                                                            function(event) {
                                                                pos = event.latLng
                                                                marker.setPosition(pos)
                                                            })
                                                    }
                                                </script>
                                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
                                            </div>
                                            {{-- !
                                                    !|--------------------------------------------------------------------------
                                                    !| Maps
                                                    !|--------------------------------------------------------------------------
                                                ! --}}
                                                <div class="baris3 d-flex gap-1">
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">Start At</label>
                                                        <input type="date" name="start_at" class="form-control"
                                                            id="inputstart_at">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleInputPassword1">End At</label>
                                                        <input type="date" name="end_at" class="form-control"
                                                            id="inputend_at">
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| Modal Update Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}

                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| Table Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
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
                                                    <th>Expired</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
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
                                                        <td class="wh_name">{{ $item->name }}</td>
                                                        <td class="regional">{{ $item->regional }}</td>
                                                        <td class="kota">{{ $item->city }}</td>
                                                        <td class="whlocation">{{ $item->location }}</td>
                                                        <td class="wh_type">{{ $item->type }}</td>
                                                        <td class="contract_status">{{ $item->contract_status }}</td>
                                                        <td class="tenggat_waktu">{{ $item->expired }}</td>
                                                        <td class="lat">{{ $item->lat }}</td>
                                                        <td class="lng">{{ $item->lng }}</td>
                                                        <td class="start_at">{{ $item->start_at }}</td>
                                                        <td class="end_at">{{ $item->end_at }}</td>
                                                        <td style="text-transform: capitalize;">{{ $item->status }}</td>
                                                        <td>
                                                            <a href="{{ url('/inActive/' . $item->id) }}"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                                                                </svg></a>
                                                            |
                                                            <a href="/warehouse/{{ $item->id }}" class="btn_update"
                                                                data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                                data-tenggat="{{ $item->contract_status }}"
                                                                data-bs-target="#modal-edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                </svg>
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
                        {{-- *
                            *|--------------------------------------------------------------------------
                            *| End Table Warehouse
                            *|--------------------------------------------------------------------------
                        * --}}
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
        const tenggatWaktu = document.querySelectorAll('.tenggat_waktu');
        const inputTenggatWaktu = document.getElementById('inputtenggatwaktu');
        const startAt = document.querySelectorAll('.start_at');
        const inputStartAtEdit = document.getElementById('inputstart_at');
        const endAt = document.querySelectorAll('.end_at');
        const inputEndAtEdit = document.getElementById('inputend_at');
        const latitude = document.querySelectorAll('.lat');
        console.log(latitude);
        const inputLat = document.getElementById('inputLat');
        const longitude = document.querySelectorAll('.lng');
        const inputLng = document.getElementById('inputLng');
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
                inputTenggatWaktu.value = '';
                inputTenggatWaktu.value = tenggatWaktu[i].innerHTML.trim();
                inputStartAtEdit.value = '';
                inputStartAtEdit.value = startAt[i].innerHTML.trim();
                inputEndAtEdit.value = '';
                inputEndAtEdit.value = endAt[i].innerHTML.trim();
                inputLat.value = '';
                inputLat.value = latitude[i].innerHTML.trim();
                inputLng.value = '';
                inputLng.value = longitude[i].innerHTML.trim();
                console.log('Hello');
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/warehouse/' + e.getAttribute('data-id'))
            })
        });

        $('.btn_update').click(function(event) {
            var contract = $(event.currentTarget).data('tenggat');
            if (contract == "permanen") {
                $(".disContract").attr("disabled", "disabled");
            } else {
                $(".disContract").removeAttr("disabled");
            }
        });

        /// js for disable input
        $("select").change(function() {
            if ($(this).val() == "permanen") {
                $(".disContract").attr("disabled", "disabled");
            } else {
                $(".disContract").removeAttr("disabled");
            }
        }).trigger("change");

        // if ($("inputtenggatwaktu").val() == null) {

        // } else {

        // }



        /// end js for disable input

        // mapboxgl.accessToken = 'pk.eyJ1IjoiaGFqaWRhbGFraHRhciIsImEiOiJjazR6bDE2d3EwNXBiM3NvN3l4MmcxbXc3In0.poDhPGTfGQIx0_uICeeblg';

        // const map = new mapboxgl.Map({
        //     container: 'map',
        //     style: 'mapbox://styles/mapbox/streets-v11',
        //     center: [-6.200000, 106.816666],
        //     zoom: 11.15
        // });

        // const marker = new mapboxgl.Marker()
        // .setLngLat([-6.200000, 37.87221])
        // .addTo(map);

        // const geocoder = ;
    </script>
@endsection
