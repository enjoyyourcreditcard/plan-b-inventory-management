@extends('layouts.app')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transaction</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inbound</li>
    </ol>
</nav>
@endsection
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">Stock</h2>

<div class="grid grid-cols-12 gap-4 w-full">

    <div class="intro-x col-span-5 xl:col-span-4 lg:col-span-12 md:col-span-12 sm:col-span-12 mt-8">

        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <div class="font-medium text-base truncate">Template Excel</div>
            </div>



            <div class="pt-5 font-medium">
                <a href="/inbound/excel"
                    class=" btn !bg-orange-500 mr-3 whitespace-nowrap text-white rounded-full w-full">Template
                    Excel</a>
                </br>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#inbound-post-excel-modal"
                    class="btn btn-success mr-3 whitespace-nowrap text-white rounded-full mt-3 w-full">Import Excel</a>
            </div>


        </div>

        <div class="box p-5 rounded-md mt-3">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Inbound Details</div>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="clipboard" data-lucide="clipboard"
                    class="lucide lucide-clipboard w-4 h-4 text-slate-500 mr-2">
                    <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg> Unique ID: <span class="underline decoration-dotted ml-1">UNIK UNIK UNIK</span>
            </div>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="user" data-lucide="user" class="lucide lucide-user w-4 h-4 text-slate-500 mr-2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg> Name: <span class="underline decoration-dotted ml-1">FATTAN</span>
            </div>

            @if( $warehouse )
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-building-warehouse w-4 h-4 text-slate-500 mr-2" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                    <path d="M13 13h4v8h-10v-6h6"></path>
                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                </svg> Warehouse: <span
                    class="underline decoration-dotted ml-1 whitespace-nowrap">WAREHOUSE ANU</span>

                <button data-tw-toggle="modal" data-tw-target="#modal-change-warehouse"
                    class="flex items-center ml-auto transition duration-200 ease-in-ou text-white pl-2 py-2 bg-cyan-600 text-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square w-4 h-4 mr-2 text-ms" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>

            </div>
            @endif

            <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <button type="submit"
                    class="btn btn-warning mr-3 whitespace-nowrap rounded-full nav-item flex-1 mx-auto w-full"
                    id="deleteAllSelectedRecord" form="inboundAllForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-send w-4 h-4 mx-2" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg>Fix All Data</button>
            </div>


        </div>


    </div>

    <div class="intro-x col-span-7 xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12">
        <table class="table table-report">
            <thead>
                <tr>

                    <th class=" whitespace-normal">Part</th>
                    <th class="text-center whitespace-nowrap">SN code</th>
                    <th class="text-center whitespace-normal">Orafin Code</th>

                    @if( count($inbound) >= 1 )
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                    @endIf
                </tr>
            </thead>
            <tbody>

                @forelse ( $inbound as $inbounds )
                <tr class="intro-x">
                    <td class="!py-3.5 text-center">
                        <div class="flex">
                            <img src="{{ asset('dist/'.$inbounds->part->img) }}" href="javascript:;" alt="Part Image"
                                data-action="zoom" class="w-10 border-solid border-1 border-neutral-200 rounded-md">
                            <a href=""
                                class="font-medium whitespace-nowrap ml-2 mr-6 text-center">{{ $inbounds->part->name }}</a>
                        </div>
                    </td>
                    <td class="text-center whitespace-nowrap">{{ $inbounds->sn_code ? $inbounds->sn_code : "NULL"  }}
                    </td>
                    <td class="text-center whitespace-nowrap">
                        {{ $inbounds->orafin_code ? $inbounds->orafin_code : "NULL"  }}</td>

                    @if( $inbounds->part_id)
                    <td class="table-report__action ">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-danger"
                                href="{{ Route( "inbound.get.delete", $inbounds->id ) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2"
                                    class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg> Delete
                            </a>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="12">No item on the list</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="chevrons-left"
                                class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="chevron-left"
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="chevron-right"
                                class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="chevrons-right"
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


<!-- END: Data List -->

</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Delete Confirmation
*|--------------------------------------------------------------------------
*--}}

<div id="inbound-post-excel-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-envelope-paper text-slate-600 mx-auto mt-3" viewBox="0 0 16 16">
                        <path
                            d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                    </svg>
                </div>
                <form action="{{Route('inbound.post.excel.import')}}" method="POST" enctype="multipart/form-data"
                    class="px-5 pb-8 text-center">
                    @csrf

                    <div class="mb-3">
                        <label for="inboundImportExcel" class="text-lg">Import Excel to Inbound</label>
                        <input class="form-control outline outline-1 p-3 mt-3" type="file" id="importExcel" name="excel"
                            required>
                    </div>

                    <div class="modal-footer">
                        <a data-tw-dismiss="modal" class="btn w-24 mr-2 ml-auto !bg-zinc-200 !text-zinc-900">Cancel</a>
                        {{-- <a href="/inbound/row" class="btn btn-success my-3" target="_blank">EXPORT ROW</a> --}}
                        <button type="submit" class="btn !bg-green-800 !text-zinc-200 w-24">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- *
*|--------------------------------------------------------------------------
*| Modal Delete Confirmation
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="editInboundModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Inbound</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/inbound" method="POST">
                    @csrf
                    @method('put')

                    <input type="hidden" class="form-label" name="id" id="InboundId">
                    <div class="mb-3">
                        <label for="inboundSN" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="InboundSn_code" name="sn_code" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="inboundPart" class="form-label">Part</label>
                        <select class="form-select" name="part_id" value="" id="InboundPart_id" required>
                            @foreach ($parts as $part)
                            <option value="{{$part->id}}">{{$part->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="inboundWh" class="form-label">Warehouse</label>
                        <select class="form-select" name="warehouse_id" value="" id="InboundWarehouse_id" required>
                            @foreach ($warehouse as $warehouses)
                            <option value="{{$warehouses->id}}">{{$warehouses->wh_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for=inboundCondition" class="form-label">Condition</label>
                        <select class="form-select" name="condition" value="" id="InboundCondition" required>
                            <option value="good new">good new</option>
                            <option value="good rekondisi">good rekondisi</option>
                            <option value="good potongan">good potongan</option>
                            <option value="not good">not good</option>
                            <option value="karantina">karantina</option>
                            <option value="reject">reject</option>
                            <option value="scrapt">scrapt</option>
                            <option value="dismantle">dismantle</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="inboundDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="InboundInbound_date" name="inbound_date" value=""
                            required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
