@extends('layouts.app') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-stock-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                <line x1="10" y1="12" x2="14" y2="12"></line>
                            </svg>&nbsp;Stock</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-wh" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21v-13l9 -4l9 4v13"></path>
                                <path d="M13 13h4v8h-10v-6h6"></path>
                                <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                            </svg>&nbsp;
                            Warehouse</a>
                    </li>

                </ul>
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab Stock
                        *|--------------------------------------------------------------------------
                        *--}}
                        <div class="tab-pane active show" id="tabs-stock-12" role="tabpanel">
                            <div id="stock"></div>
                            {{-- <div>
                                <div class="pt-3 ">
                                    <div class="d-flex">
                                        <div class="ms-auto text-muted">
                                            <div class="input-icon mb-3"><input type="text" class="form-control"
                                                    placeholder="Search…" value=""><span class="input-icon-addon"><svg
                                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                                    </svg></span></div>
                                        </div>
                                        <div class="px-1"></div>
                                        <div class="btn-group h-25 "><button type="button"
                                                class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-filter" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                                    </path>
                                                </svg></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                                    class="dropdown-item" href="#"><input type="checkbox">&nbsp; No
                                                    Stock</button></div>
                                        </div>
                                        <div class="px-1"></div>
                                        <div class="btn-group h-25 "><button type="button"
                                                class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-adjustments" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="6" cy="10" r="2"></circle>
                                                    <line x1="6" y1="4" x2="6" y2="8"></line>
                                                    <line x1="6" y1="12" x2="6" y2="20"></line>
                                                    <circle cx="12" cy="16" r="2"></circle>
                                                    <line x1="12" y1="4" x2="12" y2="14"></line>
                                                    <line x1="12" y1="18" x2="12" y2="20"></line>
                                                    <circle cx="18" cy="7" r="2"></circle>
                                                    <line x1="18" y1="4" x2="18" y2="5"></line>
                                                    <line x1="18" y1="9" x2="18" y2="20"></line>
                                                </svg></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Name</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Description</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Category</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Brand</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Stock</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabel-horizontal-scroll">
                                    <table role="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr role="row">
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Part Name</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Warehouse</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>SN Code</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Condition</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Expired Date</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Stock Status</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Status</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            @foreach ($stocks as $stock)
                                            <tr role="row">
                                                <td role="cell">{{ $stock->part->name }}</td>
                                                <td role="cell">{{ $stock->warehouse->wh_name }}</td>
                                                <td role="cell">{{ $stock->sn_code != null ? $stock->sn_code : '-' }}
                                                </td>
                                                <td role="cell">{{ $stock->condition }}</td>
                                                <td role="cell">{{ $stock->expired_date }}</td>
                                                <td role="cell">{{ $stock->stock_status }}</td>
                                                <td role="cell">{{ $stock->status }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class=" d-flex align-items-center">
                                    <p class="m-0 ">Showing <span>1</span> of <span>1</span> entries</p>
                                    <div class="pagination m-0 ms-auto">
                                        <div class="btn-group "><button disabled="" class="btn btn-outline-dark  "
                                                href="#" tabindex="-1" aria-disabled="true"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="15 6 9 12 15 18"></polyline>
                                                </svg>prev</button><button disabled="" class="btn btn-outline-dark"
                                                href="#">next<svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="9 6 15 12 9 18"></polyline>
                                                </svg></button></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>


                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab Warehouse
                        *|--------------------------------------------------------------------------
                        *--}}
                        <div class="tab-pane" id="tabs-wh" role="tabpanel">

                            <div id="stock-warehouse"></div>
                            {{-- <table class="table table-bordered table-striped">


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
                                        <td class="regional">{{ $item->regional }}</td>
                                        <td class="wh_name">{{ $item->wh_name }}</td>
                                        <td class="kota">{{ $item->kota }}</td>
                                        <td class="whlocation">{{ $item->location }}</td>
                                        <td class="wh_type">{{ $item->wh_type }}</td>
                                        <td class="contract_status">{{ $item->contract_status }}</td>
                                        <td class="start_at">{{ $item->start_at }}</td>
                                        <td class="end_at">{{ $item->end_at }}</td>
                                        <td style="text-transform: capitalize;">{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/inActive/' . $item->id) }}"
                                                class="btn btn-primary">Change</a>
                                            |
                                            <a class="btn_update btn btn-warning" data-id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#editWarehouseModal"
                                                data-regional="{{$item->regional}}" data-wh_name="{{$item->wh_name}}"
                                                data-kota="{{$item->kota}}" data-location="{{$item->location}}"
                                                data-wh_type="{{$item->wh_type}}"
                                                data-contract_status="{{$item->contract_status}}"
                                                data-start_at="{{$item->start_at}}" data-end_at="{{$item->end_at}}"
                                                data-status="{{$item->status}}" data-id="{{$item->id}}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





{{-- *
* |--------------------------------------------------------------------------
* | Modal Warehouse
* |--------------------------------------------------------------------------
* --}}

{{-- <div class="modal fade" id="createWarehouseModal" tabindex="-1" role="dialog"
    aria-labelledby="createWarehouseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createWarehouseModalLabel">Form Create WareHouse</h5>
            </div>
            <form action="/warehouse" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="form-label">WareHouse Name</label>
                            <input type="text" name="wh_name" class="form-control" id="inputWarehouse"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">Regional</label>
                            <input type="text" name="regional" class="form-control " id="inputReginal">
                        </div>
                    </div>

                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">City</label>
                            <input type="text" name="kota" class="form-control " id="inputCity">
                        </div>
                    </div>

                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control " id="input">
                        </div>
                    </div>

                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">WareHouse Type</label>
                            <input type="text" name="wh_type" class="form-control " id="inputType">
                        </div>
                    </div>

                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">Contract Status</label>
                            <input type="text" name="contract_status" class="form-control " id="inputContract">
                        </div>
                    </div>

                    <div class="mb-2">

                        <div class="form-group">
                            <label for="" class="form-label">Start At</label>
                            <input type="date" name="start_at" class="form-control " id="inputStart">
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="form-label">End At</label>
                            <input type="date" name="end_at" class="form-control " id="inputEnd">
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control " id="inputEnd">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div> --}}


<div class="modal modal-blur fade modal-lg" id="createWarehouseModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Create Warehouse</h5>
            </div>
            <div class="modal-body">
                <form action="/warehouse" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleInputEmail1">Warehouse Name</label>
                        <input type="text" name="name" class="form-control" id="inputWarehouse"
                            aria-describedby="emailHelp" placeholder="Input Warehouse Name" required>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleInputPassword1">Regional</label>
                        <select class="form-select" name="regional" id="regional" required>
                            <option value="Jabodetabek">Jabodetabek</option>
                            <option value="Jakarta">Jakarta
                            </option>
                            <option value="Surabaya">Surabaya
                            </option>
                            <option value="Medan">Medan
                            </option>
                            <option value="Bandung">Bandung
                            </option>
                            <option value="Semarang">Semarang
                            </option>
                            <option value="Malang">Malang
                            </option>
                            <option value="Semarang">Semarang
                            </option>
                            <option value="SUMATERA 1">SUMATERA 1
                            </option>
                            <option value="SUMATERA 2">SUMATERA 2
                            </option>
                            <option value="JAWA TENGAH">JAWA TENGAH
                            </option>
                            <option value="KALIMANTAN">KALIMANTAN
                            </option>
                            <option value="JATIM, BALI &amp; NT">JATIM, BALI &amp; NT
                            </option>
                            <option value="SULAMPA">SULAMPA
                            </option>
                            <option value="Others">Others
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleInputPassword1">City</label>
                        <input type="text" name="city" class="form-control " id="inputCity" placeholder="Input City"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleInputPassword1">Location</label>
                        <input type="text" name="location" class="form-control " id="input" placeholder="Input Location"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleInputPassword1">Warehouse Type</label>
                        <input type="text" name="type" class="form-control " id="inputType"
                            placeholder="Input Warehouse Type" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="exampleInputPassword1">Contract Status</label>
                                <select class="form-select" name="contract_status" id="contract_status"
                                    onchange="checkOption(this)" required>
                                    <option selected disabled>Select Contract Status</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Permanent">Permanent</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="exampleInputPassword1">Expired</label>
                                <input type="date" name="expired" class="form-control disContract" id="inputTenggat"
                                    required>
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class=" col-md-6">
                                <label class="form-label" for="exampleInputPassword1">Start At</label>
                                <input type="date" name="start_at" class="form-control " id="inputStart"
                                    placeholder="Start At" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="exampleInputPassword1">End At</label>
                                <input type="date" name="end_at" class="form-control " id="inputEnd"
                                    placeholder="End At" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class=" col-md-6 ">
                                <label class="form-label" for="exampleInputPassword1">latitude</label>
                                <input type="text" name="lat" class="form-control " id="lat" required>
                            </div>
                            <div class=" col-md-6 ">
                                <label class="form-label" for="exampleInputPassword1">longtitude</label>
                                <input type="text" name="lng" class="form-control " id="lng" required>
                            </div>
                        </div>
                        {{-- <div id="map" style="height: 250px; width: 670px" class="my-3">
                        </div> --}}
                       
                    </div>
                 
                    
                    <div class="form-group mb-3">
                        <input type="hidden" name="status" class="form-control " id="inputEnd">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                {{-- *End Form --}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editWarehouseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Update WareHouse</h5>
            </div>
            <form action="/warehouse" method="POST" id="update_wh" class="update_wh">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <input type="hidden" name="id" id="whid">
                    <div class="form-group">
                        <label for="exampleInputEmail1">WareHouse Name</label>
                        <input type="text" name="wh_name" id="wh_name" class="form-control " id="inputwh_name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Regional</label>
                        <input type="text" name="regional" id="whregional" class="form-control " id="inputregional">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <input type="text" name="kota" id="whkota" class="form-control " id="inputkota">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Location</label>
                        <input type="text" name="location" id="whlocation" class="form-control " id="inputlocation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">WareHouse Type</label>
                        <input type="text" name="wh_type" id="wh_type" class="form-control " id="inputwh_type">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contract Status</label>
                        <input type="text" name="contract_status" id="whcontract_status" class="form-control "
                            id="inputcontract_status">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start At</label>
                        <input type="date" name="start_at" id="whstart_at" class="form-control" id="inputstart_at">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">End At</label>
                        <input type="date" name="end_at" id="whend_at" class="form-control" id="inputend_at">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>

                    {{-- <button type="button" class="btn btn-primary">Submit</button> --}}
                </div>
            </form>

        </div>
    </div>
</div>



{{-- *
* |--------------------------------------------------------------------------
* | Modal Stock
* |--------------------------------------------------------------------------
* --}}
<div class="modal modal-blur fade" id="createStockModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ Route('post.store.stock') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Stock</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf

                    <div class="mb-3">
                        <label for="stockWhId" class="form-label">Part</label>
                        <select class="form-control addStockSelect2" name="part_id" required>
                            @foreach ($parts as $part)
                            <option value="{{$part->id}}">{{$part->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stockWhId" class="form-label">Warehouse</label>
                        <select class="form-control" name="warehouse_id" required>
                            @foreach ($warehouse as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            {{-- <option value="1">Warehouse A</option>
                            <option value="3">Warehouse C</option> --}}
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stockSnCode" class="form-label">SN Code</label>
                        <input type="text" class="form-control" id="stockSnCode" name="sn_code" required>
                    </div>

                    <div class="mb-3">
                        <label for="stockExpiredDate" class="form-label">Expired Date</label>
                        <input type="date" class="form-control" id="stockExpiredDate" name="expired_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- *
* |--------------------------------------------------------------------------
* | Modal Select Stock
* |--------------------------------------------------------------------------
* --}}

<div class="modal modal-blur fade" id="selectStockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Upload Stock</div>
                <div>Pilih methode tambah data</div>
            </div>
            <div class="pb-3 px-3">
                <div class="row">
                    <div class="col-md-6">

                        <button type="button" class="btn btn-success me-auto w-100" disabled>
                            Bulk</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                            data-target="#createStockModal" data-dismiss="modal">Pieces</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose all your personal data.</div>
            </div>
            <div class="modal-footer">


                <button disabled class="btn btn-success w-100">
                    </svg>Excel</button>

                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my
                    data</button>
                {{-- <button data-toggle="modal" data-target="#createStockModal" data-dismiss="modal"
                    class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>Satuan</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection