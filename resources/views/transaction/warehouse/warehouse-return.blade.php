@extends('layouts.app')
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
                            <th class="whitespace-nowrap">Request QTY</th>
                            <th class="whitespace-nowrap">Return QTY</th>
                            <th class="whitespace-nowrap">Checked QTY</th>
                            <th class="whitespace-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="grf_id" value="{{ $whreturn->id }}">
                        @foreach ($requestForm as $key => $item)
                            <tr class="intro-x relative mr-3 sm:mr-6">
                                <td>
                                    <p class="font-medium " style="width: 100%">{{ $item['name'] }}</p>
                                </td>
                                <td class="w-8">
                                    <p class="font-medium whitespace-nowrap">{{ $item['quantity'] . ' ' . $item['uom'] }}</p>
                                </td>
                                @if ($item['sn_status'] == 'SN')
                                <td class="w-8">
                                    <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ $item['count_return'] . ' ' . $item['uom'] }}</p>
                                </td>
                                @else
                                <td class="w-8">
                                    <p style="font-size:12px" class="font-medium whitespace-nowrap">{{ ($item['non_sn_count_return'] == null ? 0 : $item['non_sn_count_return']) . ' ' . $item['uom'] }}</p>
                                </td>
                                @endIf
                                @if ($item['sn_status'] == 'SN')
                                <td class="w-8">
                                    <p class="font-medium whitespace-nowrap">{{ $item['count'] . ' ' . $item['uom'] }}</p>
                                </td>
                                @else
                                <td class="w-8">
                                    <p class="font-medium whitespace-nowrap">{{ $item['non_sn_count'] ? $item['non_sn_count'] . ' ' . $item['uom'] : '0' . ' ' . $item['uom']  }}</p>
                                </td>
                                @endIf
                                @if ($item['sn_status'] == 'SN')
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <button type="button"
                                            class="upload-return bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2"
                                            data-tw-toggle="modal" data-tw-target="#upload-return"
                                            data-partidreturn="{{ $item['part_id'] }}"
                                            data-partnamereturn="{{ $item['name'] }}"
                                            data-grfidreturn="{{ $whreturn->id }}"
                                            data-icquantityreturn="{{ $item['count_return'] }}">
                                            <p class="btn-return-upload-sn flex items-center mr-3 text-white"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                    </path>
                                                </svg>upload SN</p>
                                        </button>
                                    </div>
                                </td>
                                @else
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <button type="button" class="btn-return-check upload-non-sn bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2" data-tw-toggle="modal" data-tw-target="#non-sn" data-partid="{{ $item['part_id'] }}" data-partname="{{ $item['name'] }}" data-requestformid="{{ $item['id'] }}" data-icquantity="{{ $item['non_sn_count_return'] }}" data-partuom="{{ $item['uom'] }}">
                                            <p class="flex items-center mr-3 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                    </path>
                                                </svg> Check
                                            </p>
                                        </button>
                                    </div>
                                </td>
                                @endIf
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
                    <div id="upload-return" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="p-5 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-info-circle w-16 h-16 text-success mx-auto mt-3"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                        <div class="text-3xl mt-5">Select input method</div>
                                    </div>
                                    <div class="p-5 pb-8 text-center">
                                        <ul class="nav nav-boxed-tabs justify-center flex-col gap-4" role="tablist">
                                            <li id="top-products-symfony-tab" class="nav-item flex flex-col flex-grow"
                                                role="presentation">
                                                <button id="btn-return-bulk" class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full btn-success text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500" data-tw-target="#importExcelReturn" data-tw-toggle="modal" aria-selected="false" role="tab">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor"
                                                        class="bi bi-file-earmark-diff block w-6 h-6 mb-2 mx-auto"
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
                                                <button id="btn-return-pieces" class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full btn-success text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500" data-tw-target="#inputSnReturn" data-tw-toggle="modal" aria-selected="false" role="tab">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor"
                                                        class="bi bi-list-ul block w-6 h-6 mb-2 mx-auto"
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

                    {{-- ! --}}
                    <div id="non-sn" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="p-5 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-info-circle w-16 h-16 text-success mx-auto mt-3" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                        <div class="text-3xl mt-5">Apakah anda ingin mengchecklist item ini?</div>
                                        <div class="html-non-sn">
                                            <div class="flex px-8 mt-4 w-full justify-between">
                                                <span>barang</span>
                                                <span>quantity KG</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-5 pb-8 text-center">
                                        <form id="form-nonsn" action="{{ Route('returnnonsn') }}" method="POST">
                                            @csrf
                                            <div class="condition"></div>
                                            <button class="btn-success mt-3 font-bold text-white px-8 py-2 rounded-full"> Checklist </button>
                                            <input type="hidden" name="grf_id" value="{{ $whreturn->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ! --}}
                    {{-- todo modal redesign excel --}}
                    <div id="importExcelReturn" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Select File</h2>
                                </div>
                                <div class="modal-body gap-4 gap-y-3">
                                    <form action="{{ route('importexcelreturn') }}" method="POST" id="formBulkReturn" class="dropzone-" enctype="multipart/form-data">
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
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
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
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
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

@section('javaScript')
    <script src="{{ asset('js/warehousereturn.js') }}"></script>
    <script src="{{ Asset('js/modal.js') }}"></script>
@endSection
