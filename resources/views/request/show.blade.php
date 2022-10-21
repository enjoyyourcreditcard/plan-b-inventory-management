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
        <li class="breadcrumb-item"><a href="{{ Route( "request.get.home" ) }}">Outbound</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $grf->grf_code }}</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- /* 
|--------------------------------------------------------------------------
|  Modal Change Warehouse
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-change-warehouse" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Change warehouse</h2>
            </div>
            <!-- END: Modal Header -->

            <!-- BEGIN: Modal Body -->
            <div class="modal-body">
                <label class="form-label">New warehouse</label>
                <select name="warehouse_id" data-placeholder="Select warehouse" class="tom-select w-full" form="form-change-warehouse" required>
                    @foreach ( $warehouses as $warehouse )
                    <option value="{{ $warehouse->id }}" {{ $warehouse->id == $grf->warehouse_id ? "selected" : "" }}>{{ $warehouse->name }}</option>
                    @endforeach
                </select>
                <div class="form-help">Changing the warehouse will affect your item list</div>
            </div>
            <!-- END: Modal Body -->

            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer">
                <button data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                <button class="btn btn-primary w-20" data-tw-toggle="modal" data-tw-target="#modal-change-warehouse-confirmation">Save</button>
            </div>
            <!-- END: Modal Footer -->

        </div>
    </div>
</div>
<!-- END: Modal Content -->



{{-- /* 
|--------------------------------------------------------------------------
|  Modal change warehouse confirmation
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-change-warehouse-confirmation" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle text-red-500 mx-auto mt-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">All your item on the list will be deleted. <br>This process cannot
                        be undone.</div>
                </div>
                <form id="form-change-warehouse" action="{{ Route( 'request.put.update.warehouse', $grf->id ) }}" method="POST" class="px-5 pb-8 text-center">
                    @csrf
                    @method( "PUT" )
                </form>
                <div class="px-5 pb-8 text-center">
                    <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn text-white !bg-emerald-700 impor w-24" form="form-change-warehouse">Sure</button>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- /* 
|--------------------------------------------------------------------------
|  Modal submit confirmation
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-request-submit-confirmation" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle text-emerald-500 mx-auto mt-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Your request will be sent to Inventory Control <br>This process cannot
                        be undone.</div>
                </div>
                <form action="{{ Route( "request.put.update.status", $grf->id ) }}" method="POST" class="px-5 pb-8 text-center">
                    @csrf
                    @method( "PUT" )
                    <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button class="btn text-white bg-emerald-700 impor w-24">Sure</button>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- /* 
|--------------------------------------------------------------------------
|  Modal remove item from list confirmation
|--------------------------------------------------------------------------
*/ --}}
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle text-slate-500 mx-auto mt-3" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Removing this item from list <br>This process cannot
                        be undone.</div>
                </div>
                <form action="{{ Route( "request.post.store.create.grf" ) }}" method="POST" class="px-5 pb-8 text-center">
                    @csrf
                    <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button name="grf_code" class="btn text-white bg-emerald-700 impor w-24">Sure</button>
                </form>
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

            @if( $grf->warehouse_id )
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

                @if( $grf->status === "draft" )
                <button data-tw-toggle="modal" data-tw-target="#modal-change-warehouse"
                    class="flex items-center ml-auto text-slate-500 transition duration-200 ease-in-out hover:text-slate-300 active:text-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                    <div>change warehouse</div>
                </button>
                @endif

            </div>
            @endIf

            @if( $grf->status === "draft" )
            <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <ul class="pricing-tabs nav nav-pills box rounded-full mx-auto overflow-hidden" role="tablist">
                    <li id="layout-1-monthly-fees-tab" class="nav-item flex-1" role="presentation">
                        <a href="{{ Route( "request.get.home" ) }}"
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-neutral-100 transition duration-300 ease-in-out hover:bg-white hover:text-slate-500"
                            data-tw-toggle="pill" data-tw-target="#layout-1-monthly-fees" role="tab"
                            aria-controls="layout-1-monthly-fees" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left-short w-4 h-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                            </svg> Draft
                        </a>
                    </li>

                    @if( $grf->warehouse_id && count( $requestForms ) )
                    <li id="layout-1-annual-fees-tab" class="nav-item flex-1" role="presentation">
                        <button data-tw-toggle="modal" data-tw-target="#modal-request-submit-confirmation"
                            class="nav-link flex justify-center items-center gap-2 py-2 lg:py-3 w-full bg-emerald-900 text-white transition duration-300 ease-in-out hover:bg-emerald-700"
                            data-tw-toggle="pill" data-tw-target="#layout-1-annual-fees" role="tab"
                            aria-controls="layout-1-annual-fees" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send w-4 h-4" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg> Submit request
                        </button>
                    </li>
                    @endif

                </ul>
            </div>
            @endIf

        </div>


        @if ( $grf->status === "draft" )



        {{-- * / 
        |--------------------------------------------------------------------------
        |  Form box
        |--------------------------------------------------------------------------
        / * --}}
        <div class="intro-y box p-5 rounded-md mt-4">
            <div
                class="flex flex-col sm:flex-row items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <h2 class="font-medium text-base mr-auto">Item Form</h2>
            </div>
            <div id="input" class="">
                <div class="preview">
                    <form action="{{ Route( "request.post.add.item", $grf->id ) }}" method="POST">

                        @csrf

                        @if ( $grf->warehouse_id === null )
                        <div>
                            <label class="form-label">Warehouse</label>
                            <select name="warehouse_id" data-placeholder="Select warehouse" class="tom-select w-full" required>
                                <option></option>
                                @foreach ( $warehouses as $warehouse )
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endIf
    
                        <div class="mt-3">
                            <label class="form-label">Material brand</label>
                            <select name="brand_id" data-placeholder="Select brand" class="tom-select w-full" required>
                                <option></option>
                                @foreach ( $brands as $brand )
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Material description</label>
                            <select name="segment_id" data-placeholder="Select segment" class="tom-select w-full" required>
                                <option></option>
                                @foreach ( $segments as $segment )
                                <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Quantity</label>
                            <input name="quantity" id="regular-form-2" type="number" class="form-control form-control" min="1" value="1"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Note</label>
                            <textarea name="remarks" class="form-control" rows="3" placeholder="Request note.."></textarea>
                        </div>
                        <div
                            class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                            <button class="btn bg-emerald-900 text-white rounded-full w-full py-2 px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>Add to list
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else



        {{-- * / 
        |--------------------------------------------------------------------------
        |  Timeline box
        |--------------------------------------------------------------------------
        / * --}}
        <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
            <div class="intro-x flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Timeline</h2>
            </div>
            <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static return
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "return" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right w-4 h-4" viewBox="0 0 16 16">
                                <path fillRule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">Return</div>
                        </div>
                    </div>
                </div>
                @endIf



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static picked up
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "user_pickup" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2 w-4 h-4" viewBox="0 0 16 16">
                                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">Picked up</div>
                        </div>
                    </div>
                </div>
                @endIf



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static deliver
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "delivery_approved" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck w-4 h-4" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">Deliver</div>
                        </div>
                    </div>
                </div>
                @endIf



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static on prgress out
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "ic_approved" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist w-4 h-4" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">On progress out</div>
                        </div>
                    </div>
                </div>
                @endIf



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static Submited
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "submited" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check w-4 h-4" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">Submited</div>
                        </div>
                    </div>
                </div>
                @endIf


                {{-- * / 
                |--------------------------------------------------------------------------
                |  Static new
                |--------------------------------------------------------------------------
                / * --}}
                @if ( !$grf->timelines->contains( "status", "draft" ) )
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border bg-white text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil w-4 h-4" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">
                            <div class="font-medium text-slate-400">New</div>
                        </div>
                    </div>
                </div>
                @endif

                @foreach ($grf->timelines->where( "status", "!=", "wh_approved" )->where( "status", "!=", "return_ic_approved" )->where( "status", "!=", "return_wh_approved" )->sortDesc() as $timeline)



                {{-- * / 
                |--------------------------------------------------------------------------
                |  Dynamic timeline
                |--------------------------------------------------------------------------
                / * --}}
                <div class="intro-x relative flex items-center mb-3">
                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden flex justify-center items-center border {{ $loop->first == true ? "text-slate-50 bg-emerald-700" : "bg-slate-50 text-emerald-700" }}">

                            @switch($timeline->status)

                                @case('draft')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil w-4 h-4" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    @break

                                @case('submited')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check w-4 h-4" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                    </svg>
                                    @break

                                @case('ic_approved')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist w-4 h-4" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    @break
                                    
                                @case('delivery_approved')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck w-4 h-4" viewBox="0 0 16 16">
                                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    @break
                                    
                                @case('user_pickup')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2 w-4 h-4" viewBox="0 0 16 16">
                                        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
                                    </svg>
                                    @break

                                @case('return')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right w-4 h-4" viewBox="0 0 16 16">
                                        <path fillRule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                    
                                @default

                            @endswitch
                                    
                        </div>
                    </div>
                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                        <div class="flex items-center">

                            @switch($timeline->status)

                                @case('draft')
                                    <div class="font-medium">New</div>
                                    @break

                                @case('submited')
                                    <div class="font-medium">Submited</div>
                                    @break

                                @case('ic_approved')
                                    <div class="font-medium">On progress out</div>
                                    @break
                                    
                                @case('delivery_approved')
                                    <div class="font-medium">Deliver</div>
                                    @break
                                    
                                @case('user_pickup')
                                    <div class="font-medium">Picked up</div>
                                    @break

                                @case('return')
                                    <div class="font-medium">Return</div>
                                    @break

                                @default
                                    
                            @endswitch

                            <div class="text-xs text-slate-500 ml-auto">{{ $timeline->created_at->format( "g:i A" ) }}</div>
                        </div>
                    </div>
                </div>
                @endForeach

            </div>
        </div>
        @endif
        
    </div>



    {{-- * / 
    |--------------------------------------------------------------------------
    |  Item table
    |--------------------------------------------------------------------------
    / * --}}
    <div
        class="intro-y col-span-12 xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12 flex flex-wrap xl:flex-nowrap items-start">
        <div class="grid grid-cols-12 gap-6 w-full">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">MATERIAL DESCRIPTION</th>
                            <th class="text-center whitespace-nowrap">MATERIAL BRAND</th>
                            <th class="text-center whitespace-nowrap">QUANTITY</th>
                            <th class="text-center whitespace-nowrap">REMARKS</th>
                            @if( $grf->status === "draft" )
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ( $requestForms as $requestForm )
                        <tr class="intro-x">
                            <td class="!py-3.5">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <a href="" class="font-medium whitespace-nowrap">{{ $requestForm->segment->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center capitalize">{{ $requestForm->brand->name }}</td>
                            <td class="text-center">{{ $requestForm->quantity }} Items</td>
                            <td>{{ $requestForm->remarks !== null ? $requestForm->remarks : '-' }}</td>

                            @if( $grf->status === "draft" )
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-danger" href="{{ Route( "request.get.delete.item", $requestForm->id ) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2"
                                            data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg> Delete
                                    </a>
                                </div>
                            </td>
                            @endIf

                            {{-- <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2"
                                            data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg> Delete
                                    </a>
                                </div>
                            </td> --}}
                        </tr>
                        @empty
                        <tr class="intro-x">
                            <td class="text-center" colspan="5">No item on the list</td>
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
</div>
@endsection
