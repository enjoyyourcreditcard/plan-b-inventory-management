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
        <li class="breadcrumb-item active" aria-current="page">Outbound</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- /* 
|--------------------------------------------------------------------------
|  Modal New Request Confirmation
|--------------------------------------------------------------------------
*/ --}}
<div id="modal-new-request" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-paper text-slate-600 mx-auto mt-3" viewBox="0 0 16 16">
                        <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                    </svg>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">A GRF code will be generate for you. <br>This process cannot
                        be undone.</div>
                </div>
                <form action="{{ Route( "request.post.store.create.grf" ) }}" method="POST" class="px-5 pb-8 text-center">
                    @csrf
                    <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button name="grf_code" value="{{ $grf_code }}" class="btn text-white bg-emerald-700 impor w-24">Sure</button>
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



    {{-- /* 
    |--------------------------------------------------------------------------
    |  Good Request Form Slots
    |--------------------------------------------------------------------------
    */ --}}
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Good Request Forms</h2>
        </div>
        <div id="#" class="grid grid-cols-12 gap-6 mt-5">



            {{-- * / 
            |--------------------------------------------------------------------------
            |  Request Cards
            |--------------------------------------------------------------------------
            / * --}}
            @foreach( $grfs->where( "status", "!=", "closed" ) as $grf )
            <div class="col-span-12 sm:col-span-4 xl:col-span-4 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            @switch( $grf->status )
                                @case( "draft" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-right-dots text-amber-500" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="py-1 px-3 rounded-full text-white bg-amber-500">
                                        Draft
                                    </div>
                                </div>
                                @break
                            
                                @case( "submited" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-send-check text-emerald-700" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="py-1 px-3 rounded-full text-white bg-success">
                                        Submited
                                    </div>
                                </div>
                                @break
                            
                                @case( "ic_approved" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-check text-emerald-700" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="py-1 px-3 rounded-full text-white bg-slate-500">
                                        On progress..
                                    </div>
                                </div>
                                @break
                            
                                @case( "wh_approved" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-check text-emerald-700" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="py-1 px-3 rounded-full text-white bg-slate-500">
                                        On progress..
                                    </div>
                                </div>
                                @break
                            
                                @case( "delivery_approved" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-truck text-slate-400" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="py-1 px-3 rounded-full text-white bg-slate-500">
                                        Waiting for item..
                                    </div>
                                </div>
                                @break
                            
                                @case( "user_pickup" )
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box2 text-emerald-700" viewBox="0 0 16 16">
                                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
                                </svg>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% item used">
                                        33% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </div>
                                </div>
                                @break
                            
                                @case( "return" )
                                <strong>Status..</strong>
                                @break
                            
                                @case( "return_ic_approved" )
                                <strong>Status..</strong>
                                @break
                            
                                @case( "return_wh_approved" )
                                <strong>Status..</strong>
                                @break
                            
                                @default
                                    
                            @endswitch
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6"> {{ $grf->total_quantity }} <span class="text-xl">Item</span></div>
                        <div class="flex justify-between items-center">
                            <div class="text-base text-slate-500 mt-1"> {{ $grf->grf_code }} </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" aria-expanded="false" data-tw-toggle="dropdown">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">



                                        {{-- * / 
                                        |--------------------------------------------------------------------------
                                        |  View detail
                                        |--------------------------------------------------------------------------
                                        / * --}}
                                        <li>
                                            <a href="{{ Route( "request.get.detail", str_replace( "/", "~", strtolower( $grf->grf_code ) ) ) }}" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle w-4 h-4 mr-2" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                                View detail
                                            </a>
                                        </li>



                                        {{-- * / 
                                        |--------------------------------------------------------------------------
                                        |  View surat jalan
                                        |--------------------------------------------------------------------------
                                        / * --}}
                                        @if( $grf->status != "draft" && $grf->status != "submited" && $grf->status != "ic_approved" && $grf->status != "wh_approved" )
                                        <li>
                                            <a href="{{ Route( 'view.surat.jalan',$grf->id ) }}" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-pdf w-4 h-4 mr-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                                    <path
                                                        d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                </svg>
                                                View surat jalan
                                            </a>
                                        </li>



                                        {{-- * / 
                                        |--------------------------------------------------------------------------
                                        |  Pick up item
                                        |--------------------------------------------------------------------------
                                        / * --}}
                                        @if( $grf->status == "delivery_approved" )
                                        <li>
                                            <a href="{{ Route( "transaction.approve.post.pickup", $grf->id ) }}" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam w-4 h-4 mr-2" viewBox="0 0 16 16">
                                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                                </svg>
                                                Pickup item
                                            </a>
                                        </li>
                                        @endIf



                                        {{-- * / 
                                        |--------------------------------------------------------------------------
                                        |  Return item
                                        |--------------------------------------------------------------------------
                                        / * --}}
                                        @if( $grf->status == "user_pickup" )
                                        <li>
                                            <a href="{{  Route( "return.get.detail", str_replace( '/', '~', strtolower( $grf->grf_code ) ) )  }}" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-left-right w-4 h-4 mr-2"
                                                    viewBox="0 0 16 16">
                                                    <path fillRule="evenodd"
                                                        d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                                                </svg>
                                                Return items
                                            </a>
                                        </li>
                                        @endIf
                                        @endIf
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endForeach



            {{-- * / 
            |--------------------------------------------------------------------------
            |  New Request
            |--------------------------------------------------------------------------
            / * --}}
            @if( count( $grfs->where( "status", "!=", "closed" ) ) < 3 )
            <button data-tw-toggle="modal" data-tw-target="#modal-new-request"
                class="flex flex-col justify-center items-center py-8 gap-4 col-span-12 sm:col-span-4 xl:col-span-4 intro-y rounded border border-gray-300 border-dashed transition duration-300 ease-in-out hover:bg-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-lg"
                    viewBox="0 0 16 16">
                    <path fillRule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg>
                <div class="font-medium text-lg">New Request</div>
            </button>
            @endIf
        </div>
    </div>



    {{-- /* 
    |--------------------------------------------------------------------------
    |  History GRF
    |--------------------------------------------------------------------------
    */ --}}
    <div class="col-span-12 sm:col-span-6 lg:col-span-9 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">History Good Request Form</h2>
        </div>
        @if( count( $grfs->where( "status", "closed" ) ) )
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">GRF CODE</th>
                            <th class="text-center whitespace-nowrap">WAREHOUSE</th>
                            <th class="text-center whitespace-nowrap">TOTAL ITEMS</th>
                            <th class="text-center whitespace-nowrap">REQUESTED AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $grfs->where( "status", "closed" ) as $grf)
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $grf->grf_code }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{  Auth::user()->name }}</div>
                            </td>
                            <td class="text-center">{{ $grf->warehouse->name }}</td>
                            <td class="text-center">{{ $grf->total_quantity }}</td>
                            <td class="w-40">{{ $grf->created_at->format('d F Y') }}</td>
                        </tr>
                        @endforeach
                        
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
                                <i class="w-4 h-4" data-feather="chevrons-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-feather="chevron-left"></i>
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
                                <i class="w-4 h-4" data-feather="chevron-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-feather="chevrons-right"></i>
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
        @else
        <div class="grid grid-cols-12 gap-6 mt-5 h-full">
            <div class="intro-y col-span-12 box flex flex-col justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x text-slate-600 mx-auto" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <h2 class="text-lg font-medium text-center">No history</h2>
            </div>
        </div>
        @endIf
    </div>



    {{-- /* 
    |--------------------------------------------------------------------------
    |  Chart Pemakaian
    |--------------------------------------------------------------------------
    */ --}}
    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Item Conditions</h2>
            <a href="" class="ml-auto text-primary truncate">Show More</a>
        </div>
        <div class="intro-y h-full box p-5 mt-5">
            <canvas class="mt-3" id="report-used-item" height="300"></canvas>
            <div class="mt-8">
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                    <span class="truncate">Good condition</span>
                    <span class="font-medium xl:ml-auto condition-percentage" data-precentage="{{ $chartDatas[ "good" ] }}">{{ $chartDatas[ "requestStocks" ]->where( "condition", "good" )->count() }} Item</span>
                </div>
                <div class="flex items-center mt-4">
                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                    <span class="truncate">Not good</span>
                    <span class="font-medium xl:ml-auto condition-percentage" data-precentage="{{ $chartDatas[ "not_good" ] }}">{{ $chartDatas[ "requestStocks" ]->where( "condition", "not good" )->count() }} Item</span>
                </div>
                <div class="flex items-center mt-4">
                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                    <span class="truncate">Used</span>
                    <span class="font-medium xl:ml-auto condition-percentage" data-precentage="{{ $chartDatas[ "used" ] }}">{{ $chartDatas[ "requestStocks" ]->where( "condition", "used" )->count() }} Item</span>
                </div>
                <div class="flex items-center mt-4">
                    <div class="w-2 h-2 bg-slate-300 rounded-full mr-3"></div>
                    <span class="truncate">Replace</span>
                    <span class="font-medium xl:ml-auto condition-percentage" data-precentage="{{ $chartDatas[ "replace" ] }}">{{ $chartDatas[ "requestStocks" ]->where( "condition", "replace" )->count() }} Item</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
