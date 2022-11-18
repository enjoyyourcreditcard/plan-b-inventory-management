@extends('layouts.app')

@section('breadcrumb')
    {{-- /* 
|--------------------------------------------------------------------------
|  Breadcrumb
|--------------------------------------------------------------------------
*/ --}}
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ Route('warehouse.transfer.get.home') }}">Warehouse transfer</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $grf->grf_code }}</li>
        </ol>
    </nav>
@endsection

@section('content')



    {{-- *
*|--------------------------------------------------------------------------
*| Modal Pieces or Bulk
*|--------------------------------------------------------------------------
* --}}
    <div id="modal-pieces-bulk" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-upc-scan w-16 h-16 mx-auto mt-3" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                        </svg>
                        <div class="text-3xl mt-5">Choose input method</div>
                        <div class="text-slate-500 mt-2">Excel import is recommended if you are listing much item</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button"
                            class="btn !bg-emerald-500 text-white mr-1 transition duration-200 ease-in-out hover:!bg-emerald-400"
                            data-tw-toggle="modal" data-tw-target="#modal-bulk">Excel import</button>
                        <button type="button" class="btn btn-outline-secondary" data-tw-toggle="modal"
                            data-tw-target="#modal-pieces">Manual</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- *
*|--------------------------------------------------------------------------
*| Pieces
*|--------------------------------------------------------------------------
* --}}
    <div id="modal-pieces" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-pieces" action="{{ Route('warehouse.transfer.post.pieces', $grf->id) }}" method="POST">
                    @csrf
                    <div class="modal-body p-10 text-center">

                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- *
*|--------------------------------------------------------------------------
*| Bulk Excel
*|--------------------------------------------------------------------------
* --}}
    <div id="modal-bulk" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-10 text-center">
                    <form id="form-bulk" data-single="true" action="{{ Route('warehouse.transfer.post.bulk', $grf->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-center items-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-file-earmark-spreadsheet mb-3 w-10 h-10 text-gray-400"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                    </svg>
                                    <div class="dropzone-check">
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">Excel file</p>
                                    </div>
                                </div>
                                <input id="dropzone-file" name="file" type="file" class="hidden"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>
                                <div class="bulk-hidden"></div>
                            </label>
                        </div>
                        <button class="border px-8 py-2 bg-emerald-700 text-white rounded-full mx-auto mt-4">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- /* 
|--------------------------------------------------------------------------
|  Modal Change current Warehouse
|--------------------------------------------------------------------------
*/ --}}
    <div id="modal-change-current-warehouse" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Change current warehouse</h2>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body">
                    <label class="form-label">Current warehouse</label>
                    <select name="warehouse_id" data-placeholder="Select warehouse" class="tom-select w-full"
                        form="form-change-current-warehouse" required>
                        @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}"
                                {{ $warehouse->id == $grf->warehouse_id ? 'selected' : '' }}>
                                {{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-help">Changing the warehouse will affect your item list</div>
                </div>
                <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button class="btn btn-primary w-20" data-tw-toggle="modal"
                        data-tw-target="#modal-change-current-warehouse-confirmation">Save</button>
                </div>
                <!-- END: Modal Footer -->

            </div>
        </div>
    </div>



    {{-- /* 
|--------------------------------------------------------------------------
|  Modal change warehouse destination
|--------------------------------------------------------------------------
*/ --}}
    <div id="modal-change-warehouse-destination" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Change warehouse destination</h2>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body">
                    <label class="form-label">Warehouse</label>
                    <select name="warehouse_destination" data-placeholder="Select warehouse" class="tom-select w-full"
                        form="form-change-warehouse-destination" required>
                        @foreach ($warehouses->where('id', '!=', $grf->warehouse_id) as $warehouse)
                            <option value="{{ $warehouse->name }}"
                                {{ $warehouse->name == $grf->warehouse_destination ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <form id="form-change-warehouse-destination"
                    action="{{ Route('warehouse.transfer.put.destination', $grf->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                </form>
                <div class="modal-footer">
                    <button data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button form="form-change-warehouse-destination" class="btn btn-primary w-20">Save</button>
                </div>
                <!-- END: Modal Footer -->

            </div>
        </div>
    </div>



    {{-- /* 
|--------------------------------------------------------------------------
|  Modal change current warehouse confirmation
|--------------------------------------------------------------------------
*/ --}}
    <div id="modal-change-current-warehouse-confirmation" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-exclamation-circle text-red-500 mx-auto mt-3" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">All your item on the list will be deleted. <br>This process cannot
                            be undone.</div>
                    </div>
                    <form id="form-change-current-warehouse"
                        action="{{ Route('warehouse.transfer.put.current', $grf->id) }}" method="POST"
                        class="px-5 pb-8 text-center">
                        @csrf
                        @method('PUT')
                    </form>
                    <div class="px-5 pb-8 text-center">
                        <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn text-white !bg-emerald-700 impor w-24"
                            form="form-change-current-warehouse">Sure</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- /* 
|--------------------------------------------------------------------------
|  Modal submit transfer confirmation
|--------------------------------------------------------------------------
*/ --}}
    <div id="modal-request-submit-confirmation" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-exclamation-circle text-emerald-500 mx-auto mt-3" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Are you sure want to submit this transfer? <br>This process cannot
                            be undone.</div>
                    </div>
                    <form action="{{ Route('warehouse.transfer.put') }}" method="POST" class="px-5 pb-8 text-center">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="grf_id"
                            value="{{ isset($transferForms->first()->grf) ? $transferForms->first()->grf_id : null }}">
                        <input type="hidden" name="warehouse_destination"
                            value="{{ isset($transferForms->first()->grf) ? $transferForms->first()->grf->warehouse_destination : null }}">
                        <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button class="btn text-white bg-emerald-700 impor w-24">Sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- *
*|--------------------------------------------------------------------------
*| View container
*|--------------------------------------------------------------------------
* --}}
    <h2 class="intro-y text-lg font-medium mt-10">Warehouse Transfer</h2>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">



        {{-- *
    *|--------------------------------------------------------------------------
    *| Information box
    *|--------------------------------------------------------------------------
    * --}}
        <div class="col-span-12 lg:col-span-4">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Information</div>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" icon-name="clipboard" data-lucide="clipboard"
                        class="lucide lucide-clipboard w-4 h-4 text-slate-500 mr-2">
                        <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1"
                            ry="1"></rect>
                    </svg> Unique ID: <span class="underline decoration-dotted ml-1">{{ $grf->grf_code }}</span>
                </div>

                @if ($grf->warehouse_id)
                    <div class="flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-building-warehouse w-4 h-4 text-slate-500 mr-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21v-13l9 -4l9 4v13"></path>
                            <path d="M13 13h4v8h-10v-6h6"></path>
                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                        </svg> Current Warehouse: <span
                            class="underline decoration-dotted ml-1">{{ $grf->warehouse->name }}</span>

                        @if ($grf->status === 'draft')
                            <button data-tw-toggle="modal" data-tw-target="#modal-change-current-warehouse"
                                class="flex items-center ml-auto text-slate-500 transition duration-200 ease-in-out hover:text-slate-300 active:text-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square w-4 h-4 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <div>change current</div>
                            </button>
                        @endif

                    </div>
                @endIf

                @if ($grf->warehouse_id)
                    <div class="flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-geo-fill w-4 h-4 text-slate-500 mr-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                        </svg> Destination: <span
                            class="underline decoration-dotted ml-1">{{ $grf->warehouse_destination }}</span>

                        @if ($grf->status === 'draft')
                            <button data-tw-toggle="modal" data-tw-target="#modal-change-warehouse-destination"
                                class="flex items-center ml-auto text-slate-500 transition duration-200 ease-in-out hover:text-slate-300 active:text-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square w-4 h-4 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <div>change destination</div>
                            </button>
                        @endif

                    </div>
                @endIf

                {{-- <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <ul class="pricing-tabs nav nav-pills box rounded-full mx-auto overflow-hidden" role="tablist">
                    <li id="layout-1-monthly-fees-tab" class="nav-item flex-1" role="presentation">
                        <a href="{{ Route( "warehouse.transfer.get.home" ) }}"
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-neutral-100 transition duration-300 ease-in-out hover:bg-white hover:text-slate-500"
                            data-tw-toggle="pill" data-tw-target="#layout-1-monthly-fees" role="tab"
                            aria-controls="layout-1-monthly-fees" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left-short w-4 h-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                            </svg> {{ $grf->status == "draft" ? "Draft" : "Back" }}
                        </a>
                    </li>
                    @if ($grf->status == 'draft')
                    <li id="layout-1-annual-fees-tab" class="nav-item flex-1" role="presentation">
                        <button data-tw-toggle="modal" data-tw-target="#modal-request-submit-confirmation"
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-emerald-900 text-white transition duration-300 ease-in-out hover:bg-emerald-700"
                            data-tw-toggle="pill" data-tw-target="#layout-1-annual-fees" role="tab"
                            aria-controls="layout-1-annual-fees" aria-selected="false"
                            {{ $grf->warehouse_id && $grf->warehouse_destination && count( $transferForms ) > 0 ? "" : "disabled" }}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send w-4 h-4" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg> Submit transfer
                        </button>
                    </li>
                    @endIf
                </ul>
            </div> --}}
                <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                    <ul class="pricing-tabs nav nav-pills box rounded-full mx-auto overflow-hidden" role="tablist">
                        <li id="layout-1-monthly-fees-tab" class="nav-item flex-1" role="presentation">
                            <a href="{{ Route('warehouse.transfer.get.home') }}"
                                class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-neutral-100 transition duration-300 ease-in-out hover:bg-white hover:text-slate-500"
                                data-tw-toggle="pill" data-tw-target="#layout-1-monthly-fees" role="tab"
                                aria-controls="layout-1-monthly-fees" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-left-short w-4 h-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z">
                                    </path>
                                </svg> Draft
                            </a>
                        </li>

                        @if ($grf->status == 'draft')
                        <li id="layout-1-annual-fees-tab" class="nav-item flex-1" role="presentation">
                            <button data-tw-toggle="modal" data-tw-target="#modal-request-submit-confirmation"
                                class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-emerald-900 text-white transition duration-300 ease-in-out hover:bg-emerald-700"
                                role="tab" aria-controls="layout-1-annual-fees" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-send w-4 h-4" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z">
                                    </path>
                                </svg> Submit request
                            </button>
                        </li>
                        @endIf

                    </ul>
                </div>
            </div>


            @if ($grf->status == 'draft')
                <div class="intro-y box p-5 rounded-md mt-4">
                    <div
                        class="flex flex-col sm:flex-row items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <h2 class="font-medium text-base mr-auto">Item Form</h2>
                    </div>
                    <div>
                        <div class="preview">
                            <form action="{{ Route('warehouse.transfer.post.detail', $grf->id) }}" method="POST">
                                @csrf

                                @if ($grf->warehouse_id === null)
                                    <div>
                                        <label class="form-label">Current</label>
                                        <select name="warehouse_id" data-placeholder="Select warehouse"
                                            class="tom-select w-full" required>
                                            <option></option>
                                            @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-arrow-down-circle-fill text-emerald-700 w-8 h-8 my-4 mx-auto"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 border-b pb-5 mb-5">
                                        <label class="form-label">Destination</label>
                                        <select name="warehouse_destination" data-placeholder="Select brand"
                                            class="tom-select w-full" required>
                                            <option></option>
                                            @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->name }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <label for="regular-form-1" class="form-label">Material description</label>
                                    <select name="part_id" data-placeholder="Select segment" class="tom-select w-full"
                                        required>
                                        <option></option>
                                        @foreach ($parts as $part)
                                            <option value="{{ $part->id }}">{{ $part->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="regular-form-2" class="form-label">Quantity</label>
                                    <input name="quantity" id="regular-form-2" type="number"
                                        class="form-control form-control" min="1" value="1" required>
                                </div>
                                <div
                                    class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                                    <button class="btn bg-emerald-900 text-white rounded-full w-full py-2 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>Add to list
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endIf

        </div>



        {{-- *
    *|--------------------------------------------------------------------------
    *| Item list
    *|--------------------------------------------------------------------------
    * --}}
        <div class="intro-y col-span-12 lg:col-span-8 flex flex-wrap xl:flex-nowrap items-start">
            <div class="grid grid-cols-12 gap-6 w-full">

                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">IM CODE</th>
                                <th class="text-center whitespace-nowrap">MATERIAL DESCRIPTION</th>
                                <th class="text-center whitespace-nowrap">TRANSFER QUANTITY</th>
                                <th class="text-center whitespace-nowrap">UOM</th>

                                @if ($grf->status === 'draft')
                                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                                @endIf

                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($transferForms as $transferForm)
                                <tr class="intro-x">
                                    <td class="!py-3.5">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <a href=""
                                                    class="font-medium whitespace-nowrap">{{ $transferForm->part->im_code }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $transferForm->part->name }}</td>
                                    <td class="text-center">{{ $transferForm->quantity }} Items</td>
                                    <td class="text-center">{{ $transferForm->part->uom }}</td>

                                    @if ($grf->status === 'draft')
                                        <td class="table-report__action w-56">
                                            <div class="flex gap-6 justify-center items-center">
                                                <form
                                                    action="{{ Route('warehouse.transfer.delete', $transferForm->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex items-center text-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" icon-name="trash-2"
                                                            data-lucide="trash-2"
                                                            class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17"></line>
                                                        </svg> Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endIf

                                </tr>
                            @empty
                                <tr class="intro-x">
                                    <td class="text-center" colspan="6">No item on the list</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <!-- END: Data List -->

                <!-- BEGIN: Pagination -->
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                        class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                        <polyline points="11 17 6 12 11 7"></polyline>
                                        <polyline points="18 17 13 12 18 7"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
                                        class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">...</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">...</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                        class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right"
                                        class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                        <polyline points="13 17 18 12 13 7"></polyline>
                                        <polyline points="6 17 11 12 6 7"></polyline>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <select class="w-20 form-select box mt-3 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
                <!-- END: Pagination -->

            </div>
        </div>
    </div>
@endsection



{{-- * / 
|--------------------------------------------------------------------------
|  Script
|--------------------------------------------------------------------------
/ * --}}
@section('javaScript')
    <script src="{{ Asset('js/transaction/warehouse_transfer/script.js') }}"></script>
@endSection
