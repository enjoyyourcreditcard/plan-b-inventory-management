{{-- @dd($requestForm->first()) --}}
@extends('layouts.app')
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
                            <div class="flex mb-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box"
                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
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
                                <span class="text-sm ml-2">
                                    <strong>GRF CODE :</strong> {{ $whapprov->grf_code }}
                                </span>
                            </div>
                            <div class="flex mb-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                                <span class="text-sm ml-2">
                                    <strong>REQUESTER NAME :</strong> {{ $whapprov->user->name }}
                                </span>
                            </div>
                            <div class="flex mb-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-warehouse" width="16" height="16"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                                    <path d="M13 13h4v8h-10v-6h6"></path>
                                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                </svg>
                                <span class="text-sm ml-2">
                                    <strong>WAREHOUSE LOCATION :</strong> {{ $whapprov->warehouse->name }}
                                </span>
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
                                    <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $data['quantity'] }}
                                    </p>
                                </td>
                                <td class="w-8">
                                    <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $data['count'] }}
                                    </p>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <button type="button"
                                            class="upload-sn bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2"
                                            data-tw-toggle="modal" data-tw-target="#upload"
                                            data-partid="{{ $data['part_id'] }}" data-partname="{{ $data['name'] }}"
                                            data-requestformid="{{ $data['id'] }}"
                                            data-icquantity="{{ $data['quantity'] }}">
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
        <!-- END: Chat Content -->
    </div>
    {{-- !end redesign --}}
    {{-- * end alert validasi --}}
    <div id="upload" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-info-circle w-16 h-16 text-success mx-auto mt-3" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <div class="text-3xl mt-5">Select input method</div>
                    </div>
                    <div class="p-5 pb-8 text-center">
                        <ul class="nav nav-boxed-tabs justify-center flex-col gap-4" role="tablist">
                            <li id="top-products-symfony-tab" class="nav-item flex flex-col flex-grow"
                                role="presentation">
                                <button type="submit" name="type" value="transfer gudang baru"
                                    class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full !bg-emerald-700 text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500"
                                    data-tw-target="#importExcel" data-tw-toggle="modal" aria-selected="false"
                                    role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-earmark-diff block w-6 h-6 mb-2 mx-auto"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg> Bulk
                                </button>
                            </li>
                            <li id="top-products-bootstrap-tab" class="nav-item flex flex-col flex-grow"
                                role="presentation">
                                <button type="submit" name="type" value="transfer gudang lama"
                                    class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full !bg-emerald-700 text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500"
                                    data-tw-target="#inputSn" data-tw-toggle="modal" aria-selected="false"
                                    role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-list-ul block w-6 h-6 mb-2 mx-auto"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg> Pieces
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- !Modal excel redesign --}}
    <div id="importExcel" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Select File</h2>
                </div>
                <div class="modal-body gap-4 gap-y-3">
                    <form action="{{ route('importexcel') }}" method="POST" id="formBulk"
                        enctype="multipart/form-data">
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
                    <h2 class="font-medium text-base mr-auto">Input Pieces</h2>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body gap-4 gap-y-3">
                    <form action="{{ route('inputsatuan') }}" method="POST" id="formPieces">
                        @csrf
                        <input class="input-pieces-request-form-id" type="hidden" name="request_form_id"
                            value="">
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

@section('javaScript')
    <script src="{{ asset('js/whtransaction.js') }}"></script>
@endSection
