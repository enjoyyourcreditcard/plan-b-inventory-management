@extends('layouts.secondApp')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Warehouse Return</a></li>
            <li class="breadcrumb-item active" aria-current="page">Warehouse Details</li>
        </ol>
    </nav>
@endsection
@section('content')
    {{-- !redesign --}}
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="tab-content">
                <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                    <div class="pr-1">
                        <div class="box px-5 pt-5 pb-1 mt-5">
                            <div class="flex mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                    <line x1="12" y1="12" x2="20" y2="7.5">
                                    </line>
                                    <line x1="12" y1="12" x2="12" y2="21">
                                    </line>
                                    <line x1="12" y1="12" x2="4" y2="7.5">
                                    </line>
                                </svg>
                                <p class="text-sm ml-2">
                                    <strong>GRF CODE :</strong> {{ $whreturn->grf_code }}
                                </p>
                            </div>
                            <div class="flex mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                                <p class="text-sm ml-2">
                                    <strong>REQUESTER NAME :</strong> {{ $whreturn->user->name }}
                                </p>
                            </div>
                            <div class="flex mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                                    <path d="M13 13h4v8h-10v-6h6"></path>
                                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                </svg>
                                <p class="text-sm ml-2">
                                    <strong>WAREHOUSE LOCATION :</strong> {{ $whreturn->warehouse->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-7">
            <form action="{{ Route('post.approve.return.WH') }}" method="post" id="saveSn" class="w-full">
                @csrf
                <input type="hidden" name="id" value="{{ $whreturn->id }}">
                <table class="table table-report -mt-2 w-full">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">Part Name</th>
                            <th class="whitespace-nowrap">Ic Quantity</th>
                            <th class="whitespace-nowrap">Return Quantity</th>
                            <th class="whitespace-nowrap">SN Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="grf_id" value="{{ $whreturn->id }}">
                        @foreach ($requestForm as $key => $item)
                            <tr class="intro-x relative mr-3 sm:mr-6">
                                <td>
                                    <p class="font-medium whitespace-nowrap">{{ $item['name'] }}</p>
                                </td>
                                <td class="w-8">
                                    <p class="font-medium whitespace-nowrap">{{ $item['quantity'] }}</p>
                                </td>
                                <td class="w-8">
                                    <p class="font-medium whitespace-nowrap">{{ $item['count'] }}</p>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <button type="button"
                                            class="upload-return bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2"
                                            data-tw-toggle="modal" 
                                            data-tw-target="#upload-return"
                                            data-partidreturn="{{ $item['part_id'] }}"
                                            data-partnamereturn="{{ $item['name'] }}"
                                            data-grfidreturn="{{ $whreturn->id }}"
                                            data-icquantityreturn="{{ $item['quantity'] }}">
                                            <p class="flex items-center mr-3 text-white"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                    </path>
                                                </svg>Open</p>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="intro-x col-span-12 mt-4">
                    <button class="btn btn-elevated-rounded-primary w-28 float-right mr-5" type="submit">
                        Submit
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send mx-2" viewBox="0 0 16 16">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- !end redesign --}}
    <div class="">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">

                    {{-- * alert validasi --}}
                    @if ($errors->has('file'))
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                    @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif
                    {{-- * end alert validasi --}}
                    {{-- !modal option redesign --}}
                    <div id="upload-return" class="modal overflow-y-auto " tabindex="-1" aria-hidden="false"
                        style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
                        <center>
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Pilih Metode
                                            Tambah
                                            Data</h3>
                                        <button data-modal-toggle="popup-modal" data-tw-toggle="modal"
                                            data-tw-target="#importExcelReturn"
                                            class="text-white bg-emerald-600 hover:bg-emerald-900 focus:ring-4 focus:outline-none focus:ring-emerald-700 dark:focus:ring-emerald-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 w-40 justify-center">
                                            Bulk
                                        </button>
                                        <button data-modal-toggle="popup-modal" type="button" data-tw-toggle="modal"
                                            data-tw-target="#inputSnReturn"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 w-40">Pieces</button>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    {{-- !end modal option redesign --}}
                    {{-- todo modal redesign excel --}}
                    <div id="importExcelReturn" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Select File</h2>
                                </div>
                                <div class="modal-body gap-4 gap-y-3">
                                    <form action="{{ route('importexcelreturn') }}" method="POST" id="formBulkReturn"
                                        class="dropzone-" enctype="multipart/form-data">
                                        @csrf
                                        <input id="input-bulk-grf-id-return" type="hidden" name="grf_id" value="">
                                        <input type="hidden" name="grf_id" value="{{ $whreturn->id }}">
                                            <div class="fallback">
                                            <input id="input-bulk-part-id-return" type="hidden" name="part_id" value="">
                                            <label id="input-bulk-part-name-return" class="form-label"></label>
                                            <input type="file" name="file" class="" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-primary w-20">Send</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- todo end modal redesign excel --}}
                    {{-- todo modal input sn satuan --}}
                    <div id="inputSnReturn" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                                </div>
                                <!-- END: Modal Header -->

                                <!-- BEGIN: Modal Body -->
                                <div class="modal-body gap-4 gap-y-3">
                                    <form action="/warehouse-return/{{ $whreturn->id }}" method="POST"
                                        id="formPiecesReturn">
                                        @csrf
                                        <div id="input-pieces-return" class="modal-body"> </div>
                                </div>
                                <!-- END: Modal Body -->

                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-primary w-20">Send</button>
                                </div>
                                <!-- END: Modal Footer -->

                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- todo end modal input sn satuan --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section( "javaScript" )
<script src="{{ asset('js/warehousereturn.js') }}"></script>
@endSection
