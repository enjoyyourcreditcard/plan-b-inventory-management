@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Inbound</a></li>
            <li class="breadcrumb-item active">Pengirim</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $currentGrf->grf_code ? $currentGrf->grf_code : "Request ".$currentGrf->id }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="tab-content">
                <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                    <div class="pr-1">
                        <div class="box px-5 pt-5 pb-1 mt-5">
                            <div class="flex mb-5 items-center gap-1 text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box h-4 w-4"
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
                                <span>Grf Code : {{ $currentGrf->grf_code ? $currentGrf->grf_code : '-' }}</span> 
                            </div>
                            <div class="flex mb-5 items-center gap-1 text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-warehouse h-4 w-4" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                                    <path d="M13 13h4v8h-10v-6h6"></path>
                                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                </svg>
                                <span> Current warehouse : {{ $currentGrf->warehouse_id ? $currentGrf->warehouse->name : '-' }}</span>
                            </div>
                            <div class="flex mb-5 items-center gap-1 text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-geo-fill w-4 h-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                                <span>Destination : {{ $currentGrf->warehouse_destination }}</span>
                            </div>
                            @if ($currentGrf->status == 'submited')
                            <div class="flex mb-5 mt-8 ">
                                {{-- <form action="{{ route('inbound.put.giver', $currentGrf->id) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('PUT') --}}
                                    <button type="submit" class="btn btn-primary w-full rounded-full flex items-center justify-center gap-1" data-tw-toggle="modal" data-tw-target="#modal-confirm-giver" {{ $confirmation ? '' : 'disabled' }}>
                                        Submit
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send w-4 h-4"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="10" y1="14" x2="21" y2="3"></line>
                                            <path
                                                d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                                            </path>
                                        </svg>
                                    </button>
                                {{-- </form> --}}
                            </div>
                            @else
                            <div class="flex mb-5 mt-8 ">
                                <a href="{{ Route('inbound.get.giver') }}" class="btn btn-slate-50 text-emerald-800 w-full rounded-full flex items-center justify-center gap-1">
                                    Back
                                </a>
                            </div>
                            @endIf
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- react --}}
        <div id="inboundGiverShow" class="table-responsive overflow-auto w-full col-span-12 lg:col-span-8 2xl:col-span-8" data-grfcode="{{ $currentGrf->id }}" data-status="{{ $currentGrf->status }}"></div>
        {{-- react --}}

        {{-- /* 
        |--------------------------------------------------------------------------
        |  Modal New Request Confirmation
        |--------------------------------------------------------------------------
        */ --}}
        <div id="modal-confirm-giver" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-paper text-slate-600 mx-auto mt-3" viewBox="0 0 16 16">
                                <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                            </svg>
                            <div class="text-3xl mt-5">Apakah anda yakin?</div>
                            <div class="text-slate-500 mt-2">List stock ini akan dikirim ke gudang tujuan. <br><span class="font-bold">Proses ini tidak dapat dibatalkan.</span></div>
                        </div>
                        <form action="{{ route('inbound.put.giver', $currentGrf->id) }}" method="POST" class="px-5 pb-8 text-center">
                            @csrf
                            @method('PUT')
                            <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-2">Batal</a>
                            <button class="btn text-white bg-emerald-700 impor w-24">Lanjut</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- * Non SN --}}
        <div id="modal-non-sn" class="modal" tabindex="-1" aria-hidden="true">
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
                                    <span>Barang</span>
                                    <span>Quantity KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 pb-8 text-center">
                            <form id="form-nonsn" action="{{ Route('inbound.post.non.sn.giver', $currentGrf->id) }}" method="POST">
                                @csrf
                                <button class="bg-emerald-800 font-bold text-white px-8 py-2 rounded-full"> Checklist </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- * End Non SN --}}
        
        {{-- * Modal manual bulk --}}
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
        {{-- * End Modal manual bulk --}}

        {{-- * Manual --}}
        <div id="modal-pieces" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="form-pieces" action="{{ Route('inbound.post.pieces.giver', $currentGrf->id) }}" method="POST">
                        @csrf
                        <div class="modal-body p-10 text-center"></div>
                    </form>
                </div>
            </div>
        </div>
        {{-- * End Manual --}}

        {{-- * bulk --}}
        <div id="modal-bulk" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-10 text-center">
                        <form id="form-bulk" data-single="true" action="{{ route('inbound.post.bulk.giver', $currentGrf->id) }}" method="POST" enctype="multipart/form-data">
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
        {{-- * End Bulk --}}
    </div>
@endsection

@section('javaScript')
    <script src="{{ Asset('js/transaction/inbound/script.js') }}"></script>
@endSection
