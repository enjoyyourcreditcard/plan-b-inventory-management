@extends('layouts.app')

@section('breadcrumb')



{{-- /* 
|--------------------------------------------------------------------------
|  Breadcrumb
|--------------------------------------------------------------------------
*/ --}}
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item"><a href="{{ Route( "request.get.home" ) }}">Outbound</a></li>
        <li class="breadcrumb-item" aria-current="page">Return</li>
        <li class="breadcrumb-item" aria-current="page">{{ $grf->grf_code }}</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- /* 
|--------------------------------------------------------------------------
|  Modal return confirmation
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-return-confirmation" class="modal" tabindex="-1" aria-hidden="true">
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
                    <div class="text-slate-500 mt-2">Your items will be considered as returned <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button form="form-return-item" type="submit" name="isReturn" value="true" class="btn text-white !bg-emerald-700 impor w-24">Sure</button>
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
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Good Request Forms</h2>
        </div>
    </div>
    <div class="intro-y col-span-12 xl:col-span-4 lg:col-span-12 md:col-span-12 sm:col-span-12">



        {{-- * / 
        |--------------------------------------------------------------------------
        |  Request details
        |--------------------------------------------------------------------------
        / * --}}
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Request Details</div>
                <a href="{{ Route( "request.get.home" ) }}" class="flex items-center ml-auto text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-arrow-left-short w-4 h-4" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                    </svg> Back
                </a>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="clipboard" data-lucide="clipboard"
                    class="lucide lucide-clipboard w-4 h-4 text-slate-500 mr-2">
                    <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2"></path>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg> Unique ID: <span class="underline decoration-dotted ml-1">{{ $grf->grf_code }}</span>
            </div>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="user" data-lucide="user" class="lucide lucide-user w-4 h-4 text-slate-500 mr-2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg> Name: <span class="underline decoration-dotted ml-1">{{ $grf->user->name }}</span>
            </div>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-building-warehouse w-4 h-4 text-slate-500 mr-2" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                    <path d="M13 13h4v8h-10v-6h6"></path>
                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                </svg> Warehouse: <span class="underline decoration-dotted ml-1">{{ $grf->warehouse->name }}</span>
            </div>
            <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <ul class="pricing-tabs nav nav-pills box rounded-full mx-auto overflow-hidden" role="tablist">
                    <li id="layout-1-monthly-fees-tab" class="nav-item flex-1" role="presentation">
                        <button form="form-return-item" type="submit" name="isReturn" value="false" formnovalidate
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-neutral-100 transition duration-300 ease-in-out hover:bg-white hover:text-slate-500"
                            data-tw-toggle="pill" data-tw-target="#layout-1-monthly-fees" role="tab"
                            aria-controls="layout-1-monthly-fees" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bookmark w-4 h-4" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                            </svg> Save
                        </button>
                    </li>
                    <li id="layout-1-annual-fees-tab" class="nav-item flex-1" role="presentation">
                        <button data-tw-toggle="modal" data-tw-target="#modal-return-confirmation"
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-emerald-900 text-white transition duration-300 ease-in-out hover:bg-emerald-700"
                            data-tw-toggle="pill" data-tw-target="#layout-1-annual-fees" role="tab"
                            aria-controls="layout-1-annual-fees" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left-right w-4 h-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                            </svg> Return
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12 flex flex-wrap xl:flex-nowrap items-start">



        {{-- * / 
        |--------------------------------------------------------------------------
        |  Item table
        |--------------------------------------------------------------------------
        / * --}}
        <div class="post intro-y overflow-hidden w-full box">
            <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">

                @foreach ( $miniStocks->groupBy( "category" ) as $key => $categories )
                <li class="nav-item">
                    <button data-tw-toggle="tab" data-tw-target="#tab-{{ $key }}"
                        class="nav-link tooltip w-full py-4 {{  $loop->first ? "active" : "" }}" role="tab"
                        aria-controls="content" aria-selected="true">{{ $key }}
                    </button>
                </li>
                @endforeach

            </ul>
            <div class="post__content tab-content">

                @foreach ( $miniStocks->groupBy( "category" ) as $key => $categories )
                <div id="tab-{{ $key }}" class="tab-pane overflow-x-auto p-5 {{  $loop->first ? "active" : "" }}"
                    role="tabpanel" aria-labelledby="content-tab">
                    <form id="form-return-item" action="{{ Route( "return.put.detail", $grf->id ) }}" method="POST">
                        @csrf
                        @method ( "PUT" )
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">CONDITION</th>
                                    <th class="whitespace-nowrap">MATERIAL DESRIPTION</th>
                                    <th class="whitespace-nowrap text-right">SN CODE</th>
                                    <th class="whitespace-nowrap text-right">MATERIAL BRAND</th>
                                    <th class="whitespace-nowrap text-right">UOM</th>
                                    <th class="whitespace-nowrap text-right">NOTE PEMAKAIAN</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ( $categories as $miniStock )
                                <input type="hidden" form="form-return-item" name="old_sn_code[]" value="{{ $miniStock->sn }}">
                                <tr>
                                    <td class="text-right">
                                        <select class="select-return-condition form-select"
                                            aria-label="Default select example" form="form-return-item" name="condition[]" required>
                                            <option value="good" {{ $miniStock->condition == "good" ? "selected" : "" }}> GOOD</option>
                                            <option value="used" {{ $miniStock->condition == "used" ? "selected" : "" }}> USED</option>
                                            <option value="replace" {{ $miniStock->condition == "replace" ? "selected" : "" }}>REPLACE</option>
                                            <option value="not good" {{ $miniStock->condition == "not good" ? "selected" : "" }}>NOT GOOD</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="font-medium whitespace-nowrap">{{ $miniStock->part->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-right">{{ $miniStock->sn }}</td>
                                    <td class="text-right">{{ $miniStock->part->brand->name }}</td>
                                    <td class="text-right">{{ $miniStock->part->uom }}</td>
                                    <td class="text-right">

                                        @if ( $miniStock->condition == "good" or $miniStock->condition == null )
                                        <input type="text" class="input-return-note form-control" placeholder="Note.." form="form-return-item" name="remarks[]" readonly required>
                                        @else
                                        <input type="text" class="input-return-note form-control" placeholder="Note.." form="form-return-item" name="remarks[]" value="{{ $miniStock->remarks }}" required>
                                        @endIf

                                        <div class="input-return-sn-parent">

                                            @if ( $miniStock->condition == "replace" )
                                            <input type="text" class="input-return-sn form-control mt-2" placeholder="New SN.." form="form-return-item" name="sn_code[]" value="{{ $miniStock->sn_return }}" required>
                                            @else
                                            <input type="hidden" class="input-return-sn form-control mt-2" placeholder="New SN.." form="form-return-item" name="sn_code[]" readonly required>
                                            @endIf

                                        </div>
                                    </td>
                                </tr>
                                @endForeach

                            </tbody>
                        </table>
                    </form>
                </div>
                @endForeach

            </div>
        </div>

    </div>
</div>
@endsection



{{-- * / 
|--------------------------------------------------------------------------
|  Script
|--------------------------------------------------------------------------
/ * --}}
@section( "javaScript" )
<script src="{{ Asset( "js/views/request/return.js" ) }}"></script>
@endSection
