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
        <li class="breadcrumb-item active" aria-current="page">Warehouse transfer</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- /* 
|--------------------------------------------------------------------------
|  Modal select new transfer
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-new-transfer" class="modal" tabindex="-1" aria-hidden="true">
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
                    <div class="text-3xl mt-5">Select the warehouse transfer</div>
                    <div class="text-slate-500 mt-2">A GRF code will be generate for you. <br>This process cannot
                        be undone.</div>
                </div>
                <div class="p-5 pb-8 text-center">
                    <form action="{{ Route( "warehouse.transfer.post" ) }}" method="POST">
                        @csrf
                        <input type="hidden" name="grf_code" value="{{ $grf_code }}">
                        <ul class="nav nav-boxed-tabs justify-center flex-col gap-4" role="tablist">
                            <li id="top-products-laravel-tab" class="nav-item flex flex-col flex-grow"
                                role="presentation">
                                <button type="submit" name="type" value="transfer rekondisi" disabled
                                    class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full !bg-emerald-700 text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500"
                                    data-tw-target="#top-products-laravel" aria-controls="top-products-laravel"
                                    aria-selected="true" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-arrow-repeat block w-6 h-6 mb-2 mx-auto" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                        <path fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                    </svg> Rekondisi
                                </button>
                            </li>
                            <li id="top-products-symfony-tab" class="nav-item flex flex-col flex-grow"
                                role="presentation">
                                <button type="submit" name="type" value="transfer gudang baru"
                                    class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full !bg-emerald-700 text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500"
                                    data-tw-target="#top-products-symfony" aria-selected="false" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="inbox" data-lucide="inbox"
                                        class="lucide lucide-inbox block w-6 h-6 mb-2 mx-auto">
                                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                        <path
                                            d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z">
                                        </path>
                                    </svg> Barang baru
                                </button>
                            </li>
                            <li id="top-products-bootstrap-tab" class="nav-item flex flex-col flex-grow"
                                role="presentation">
                                <button type="submit" name="type" value="transfer gudang lama" disabled
                                    class="nav-link text-center w-auto mb-2 sm:mb-0 sm:mx-2 !rounded-full !bg-emerald-700 text-white transition duration-300 ease-in-out hover:!bg-slate-100 hover:!text-slate-500"
                                    data-tw-target="#top-products-bootstrap" aria-selected="false" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-truck block w-6 h-6 mb-2 mx-auto" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg> Antara gudang
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- /* 
|--------------------------------------------------------------------------
|  View Container
|--------------------------------------------------------------------------
*/ --}}
<h2 class="intro-y text-lg font-medium mt-10">Warehouse Transfer</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
        <div class="flex w-full sm:w-auto">
            <div class="w-48 relative text-slate-500">
                <input type="text" class="form-control w-48 box pr-10" placeholder="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                    data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <select class="form-select box ml-2">
                <option>Status</option>
                <option>Waiting Payment</option>
                <option>Confirmed</option>
                <option>Packing</option>
                <option>Delivered</option>
                <option>Completed</option>
            </select>
        </div>
        <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
            <button class="btn btn-primary rounded-full shadow-md mr-2" data-tw-toggle="modal"
                data-tw-target="#modal-new-transfer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-plus-lg w-8 h-8" viewBox="0 0 24 16">
                    <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg> New transfer
            </button>
        </div>
    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">GRF CODE</th>
                    <th class="whitespace-nowrap">CURRENT WAREHOUSE</th>
                    <th></th>
                    <th class="whitespace-nowrap">WAREHOUSE DESTINATION</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-right whitespace-nowrap">
                        <div class="pr-16">TOTAL STOCK</div>
                    </th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $grfs as $grf )
                <tr class="intro-x">
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">{{ $grf->grf_code }}</a>
                    </td>
                    <td class="w-40">
                        <a href=""
                            class="font-medium whitespace-nowrap">{{ isset( $grf->warehouse_id ) ? $grf->warehouse->name : "-" }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $grf->timelines->where( "status", "submited" )->first() ? $grf->timelines->where( "status", "submited" )->first()->created_at : "" }}</div>
                    </td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right mx-auto" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </td>
                    <td class="w-40">
                        <div class="whitespace-nowrap">
                            {{ isset( $grf->warehouse_destination ) ? $grf->warehouse_destination : "-" }}</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"> </div>
                    </td>
                    <td class="text-center">
                        @if ( $grf->status == "draft" )
                        <div class="flex items-center justify-center whitespace-nowrap text-pending">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-square-dots w-4 h-4 mr-2" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg> Pending
                        </div>
                        @else
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Submited
                        </div>
                        @endIf
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">{{ $grf->total_stock }} stock</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="{{ Route( "warehouse.transfer.get.detail", str_replace( '/', '~', strtolower( $grf->grf_code ) ) ) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="intro-x">
                    <td class="text-center" colspan="7">No transfer</td>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4"
                            data-lucide="chevrons-left">
                            <polyline points="11 17 6 12 11 7"></polyline>
                            <polyline points="18 17 13 12 18 7"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4"
                            data-lucide="chevron-left">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4"
                            data-lucide="chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4"
                            data-lucide="chevrons-right">
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
@endsection
