{{-- @dd($requestForm->first()) --}}
@extends('layouts.secondApp')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Warehouse Approv</a></li>
        <li class="breadcrumb-item active" aria-current="page">Warehouse Details</li>
    </ol>
</nav>
@endsection
@section('content')
{{-- !redesign --}}
<div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
    <!-- BEGIN: Chat Side Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
        <div class="tab-content">
            <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                <div class="pr-1">
                    <div class="box px-5 pt-5 pb-1 mt-5">
                        <div class="flex mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
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
                                <strong>GRF CODE :</strong> {{ $whapprov->grf_code }}
                            </p>
                        </div>
                        <div class="flex mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            <p class="text-sm ml-2">
                                <strong>REQUESTER NAME :</strong> {{ $whapprov->user->name }}
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
                                <strong>WAREHOUSE LOCATION :</strong> {{ $whapprov->warehouse->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Chat Side Menu -->
    <!-- BEGIN: Chat Content -->
    <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-7">
        <form action="{{ Route('post.approve.WH') }}" method="post" id="saveSn" class="w-full">
            @csrf
            <input type="hidden" name="id" value="{{ $whapprov->id }}">
            <table class="table table-report -mt-2 w-full">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Part Name</th>
                        <th class="whitespace-nowrap">IC QTY</th>
                        <th class="whitespace-nowrap">WH QTY</th>
                        <th class="whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestForm as $key => $data)
                    <tr class="intro-x relative mr-3 sm:mr-6">
                        <td>
                            <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $data['name'] }}</p>
                        </td>
                        <td class="w-8">
                            <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $data['quantity'] }}</p>
                        </td>
                        <td class="w-8">
                            <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $data['count'] }}</p>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <button type="button" class="upload-sn bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2"
                                    data-tw-toggle="modal" data-tw-target="#upload" data-partid="{{ $data['part_id'] }}"
                                    data-partname="{{ $data['name'] }}" data-requestformid="{{ $data['id'] }}"
                                    data-icquantity="{{ $data['quantity'] }}">
                                    <p class="flex items-center mr-3 text-white"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
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
    <!-- END: Chat Content -->
</div>
{{-- !end redesign --}}

{{-- * alert validasi --}}
{{-- @if ($errors->has('file'))
<span class="alert alert-danger" role="alert">
    <strong>{{ $errors->first('file') }}</strong>
</span>
@endif
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $sukses }}</strong>
</div>
@endif --}}
{{-- * end alert validasi --}}

{{-- * modal option --}}
<div id="upload" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Metode Tambah
                        Data</div>
                    {{-- <div class="text-slate-500 mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum ratione, quas nemo nobis ex deserunt neque ullam ut doloremque </div> --}}
                </div>
                <div class="px-5 pb-8 text-center">
                    {{-- <button data-modal-toggle="popup-modal" data-tw-toggle="modal" data-tw-target="#importExcel"
                        class="text-white bg-emerald-600 hover:bg-emerald-900 focus:ring-4 focus:outline-none focus:ring-emerald-700 dark:focus:ring-emerald-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 w-40 justify-center">
                        Bulk
                    </button> --}}
                    <button class="btn btn-elevated-rounded-primary w-32 mr-2 mb-2"  data-modal-toggle="popup-modal" data-tw-toggle="modal" data-tw-target="#inputSn" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                          </svg> <span class="ml-2">Pieces</span>
                    </button>
                    <button class="btn btn-elevated-rounded-primary w-32 mr-2 mb-2"  data-modal-toggle="popup-modal" type="button" data-tw-toggle="modal" data-tw-target="#importExcel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                          </svg> <span class="ml-2">Bulk</span>
                    </button>
                  

                    {{-- <button data-modal-toggle="popup-modal" type="button" data-tw-toggle="modal"
                        data-tw-target="#inputSn"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 w-40">Pieces</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="upload" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Oops...</div>
                    <div class="text-slate-500 mt-2">Something went wrong!</div>
                </div>
                <div class="px-5 pb-8 text-center">

                </div>
                <div class="p-5 text-center border-t border-slate-200/60 dark:border-darkmode-400">
                    <a href="" class="text-primary">Why do I have this issue?</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div id="upload" class="modal overflow-y-auto " tabindex="-1" aria-hidden="false"
    style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
    <center>
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-red-400 " fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Pilih Metode Tambah
                        Data</h3>

                </div>
            </div>
        </div>
    </center>
</div> --}}
{{-- * end modal option --}}

{{-- !Modal excel redesign --}}
<div id="importExcel" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Select File</h2>
            </div>
            <div class="modal-body gap-4 gap-y-3">
                <form action="{{ route('importexcel') }}" method="POST" id="formBulk" enctype="multipart/form-data">
                    @csrf
                    <input id="input-bulk-request-form-id" type="hidden" name="request_form_id" value="">
                    <input type="hidden" name="grf_id" value="{{ $whapprov->id }}">
                    <div class="fallback">
                        <input id="input-bulk-part-id" type="hidden" name="part_id" value="">
                        <label id="input-bulk-part-name" class="form-label"> </label>
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
{{-- !End Modal excel redesign --}}

{{-- *Modal input satuan redesign --}}
<div id="inputSn" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
            </div>
            <!-- END: Modal Header -->

            <!-- BEGIN: Modal Body -->
            <div class="modal-body gap-4 gap-y-3">
                <form action="{{ route('inputsatuan') }}" method="POST" id="formPieces">
                    @csrf
                    <input class="input-pieces-request-form-id" type="hidden" name="request_form_id" value="">
                    <input type="hidden" name="grf_id" value="{{ $whapprov->id }}">
                    <div id="input-pieces" class="modal-body"> </div>
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
{{-- *End Modal input satuan redesign --}}

</div>
@endsection

@section( "javaScript" )
<script src="{{ asset('js/whtransaction.js') }}"></script>
@endSection