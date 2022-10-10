@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-rekondisi" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <line x1="12" y1="12" x2="4" y2="7.5"></line>
                            </svg>&nbsp;Rekondisi</a>
                    </li>

                </ul>
                <div class="card-body">
                    <div class="tab-content">

                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab Rekondisi
                        *|--------------------------------------------------------------------------
                        *--}}
                        <div class="tab-pane active show" id="tabs-rekondisi" role="tabpanel">
                            {{-- <div id="parts"></div> --}}
                            <div>
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
                                                    class="dropdown-item" href="#"><input type="checkbox">&nbsp; SN number
                                                    </button></div>
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
                                                    style="cursor: pointer;"><b>NAME</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>SN Number</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>STATUS</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>REKONDISI DATE</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            <tr role="row">
                                                <td role="cell">
                                                    <div id="thumbwrap">
                                                        <div class="d-flex">
                                                            <div class="pr-1" style="min-width: 40px;"><a
                                                                    data-tip="COUPLER ADAPTOR E2000 APC"
                                                                    currentitem="false"><img
                                                                        src="/images/part/default.jpg" alt="" width="30"
                                                                        height="25"
                                                                        style="border: 1px solid rgb(204, 204, 238);"></a>
                                                            </div><a href="/part/1419"
                                                                class="text-primary text-decoration-none "> COUPLER
                                                                ADAPTOR E2000 APC</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>TEST</td>
                                                <td role="cell">Rekondisi</td>
                                                <td role="cell">09-09-2022
                                                </td>
                                                <td role="cell"><a href="#" class="btn btn-success" style="background-color: #31DE4A"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-repair">
                                                        Repair
                                                    </a>
                                                    <a href="#" class="btn btn-danger" style="background-color:#D70015" data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-reject">
                                                        Reject
                                                    </a>
                                                </td>


                                            </tr>
                                            @foreach ($rekondisis as $row => $item)
                                                
                                            <tr role="row">
                                                <td role="cell">
                                                    <div id="thumbwrap">
                                                        <div class="d-flex">
                                                            <div class="pr-1" style="min-width: 40px;"><a
                                                                    data-tip="COUPLER ADAPTOR E2000 APC"
                                                                    currentitem="false"><img
                                                                    src="{{$item->requestStock->condition}}" alt="" width="30"
                                                                        height="25"
                                                                        style="border: 1px solid rgb(204, 204, 238);"></a>
                                                                    </div><a href="/part/1419"
                                                                    class="text-primary text-decoration-none ">{{$item->requestStock->name}}
                                                                </a>
                                                            </div>
                                                    </div>
                                                </td>
                                                <td>{{$item->requestStock->sn_return == null ? $item->requestStock->sn : $item->requestStock->sn_return }}</td>
                                                <td role="cell"></td></td>
                                                <td role="cell">{{$item->created_at}}
                                                </td>
                                                <td role="cell"><a href="#" class="btn btn-success" style="background-color: #31DE4A"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-confirmation-repair">
                                                    Repair
                                                </a>
                                                <a href="#" class="btn btn-danger" style="background-color:#D70015" data-bs-toggle="modal"
                                                data-bs-target="#modal-confirmation-reject">
                                                Reject
                                                    </a>
                                                </td>

                                                
                                            </tr>
                                            @endforeach
                                            {{-- <tr role="row">
                                                <td role="cell">
                                                    <div id="thumbwrap">
                                                        <div class="d-flex">
                                                            <div class="pr-1" style="min-width: 40px;"><a
                                                                data-tip="COUPLER ADAPTOR E2000 APC"
                                                                currentitem="false"><img
                                                                        src="/images/part/default.jpg" alt="" width="30"
                                                                        height="25"
                                                                        style="border: 1px solid rgb(204, 204, 238);"></a>
                                                            </div><a href="/part/1419"
                                                                class="text-primary text-decoration-none "> COUPLER
                                                                ADAPTOR E2000 APC</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td role="cell">Rekondisi</td>
                                                <td role="cell">09-09-2022
                                                </td>
                                                <td role="cell"><a href="#" class="btn btn-success" style="background-color: #31DE4A"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-repair">
                                                        Repair
                                                    </a>
                                                    <a href="#" class="btn btn-danger" style="background-color:#D70015" data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-reject">
                                                        Reject
                                                    </a>
                                                </td>


                                            </tr>
                                            <tr role="row">
                                                <td role="cell">
                                                    <div id="thumbwrap">
                                                        <div class="d-flex">
                                                            <div class="pr-1" style="min-width: 40px;"><a
                                                                    data-tip="COUPLER ADAPTOR E2000 APC"
                                                                    currentitem="false"><img
                                                                        src="/images/part/default.jpg" alt="" width="30"
                                                                        height="25"
                                                                        style="border: 1px solid rgb(204, 204, 238);"></a>
                                                            </div><a href="/part/1419"
                                                                class="text-primary text-decoration-none "> COUPLER
                                                                ADAPTOR E2000 APC</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td role="cell">Rekondisi</td>
                                                <td role="cell">09-09-2022
                                                </td>
                                                <td role="cell"><a href="#" class="btn btn-success" style="background-color: #31DE4A"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-repair">
                                                        Repair
                                                    </a>
                                                    <a href="#" class="btn btn-danger" style="background-color:#D70015" data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-reject">
                                                        Reject
                                                    </a>
                                                </td>


                                            </tr>
                                            <tr role="row">
                                                <td role="cell">
                                                    <div id="thumbwrap">
                                                        <div class="d-flex">
                                                            <div class="pr-1" style="min-width: 40px;"><a
                                                                    data-tip="COUPLER ADAPTOR E2000 APC"
                                                                    currentitem="false"><img
                                                                        src="/images/part/default.jpg" alt="" width="30"
                                                                        height="25"
                                                                        style="border: 1px solid rgb(204, 204, 238);"></a>
                                                            </div><a href="/part/1419"
                                                                class="text-primary text-decoration-none "> COUPLER
                                                                ADAPTOR E2000 APC</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td role="cell">Rekondisi</td>
                                                <td role="cell">09-09-2022
                                                </td>
                                                <td role="cell"><a href="#" class="btn btn-success" style="background-color: #31DE4A"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-repair">
                                                        Repair
                                                    </a>
                                                    <a href="#" class="btn btn-danger" style="background-color:#D70015" data-bs-toggle="modal"
                                                        data-bs-target="#modal-confirmation-reject">
                                                        Reject
                                                    </a>
                                                </td>


                                            </tr> --}}


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
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-blur fade" id="modal-confirmation-repair" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Apakah Anda yakin?</div>
                <div>Apakah anda yakin bahwa barang ini sudah diperbaiki?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" style="background-color:#D70015" data-bs-dismiss="modal">Iya, Saya yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-confirmation-reject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Apakah Anda yakin?</div>
                <div>Apakah anda yakin bahwa barang ini sudah tidak dapat diperbaiki?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" style="background-color:#D70015" data-bs-dismiss="modal">Iya, Saya yakin</button>
            </div>
        </div>
    </div>
</div>
@endsection