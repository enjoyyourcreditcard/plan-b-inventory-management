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
<h2 class="intro-y text-lg font-medium mt-10 mb-4">Inbound Master</h2>
<div class="grid grid-cols-12 gap-4 w-full">
    <div class="intro-y col-span-12 xl:col-span-4 lg:col-span-12 md:col-span-12 sm:col-span-12">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Excel</div>
            </div>
            {{-- <h2 class="intro-y text-lg font-medium ">Excel</h2> --}}
            <div class="font-medium ">
                <a href="/inbound/excel" class="btn !bg-slate-100 whitespace-nowrap text-emerald-900 rounded-full w-full transition duration-200 ease-in-out hover:text-emerald-800 hover:!bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                    <span>Template Excel</span>
                </a>
                </br>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#inbound-post-excel-modal"
                    class="btn !bg-emerald-900 whitespace-nowrap text-white rounded-full mt-3 w-full transition duration-200 ease-in-out hover:!bg-emerald-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                      </svg>
                    <span>Import Excel</span>
                </a>
            </div>

            @if(count($inbound))
            <div class="font-medium border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5">
                <form action="{{ Route( "inbound.post.store.grf" ) }}" method="POST" class="">
                    @csrf
                    <input type="text" name="status" value="draft" hidden>
                    <button type="submit" class="btn !bg-emerald-900 mr-3 whitespace-nowrap rounded-full nav-item flex-1 mx-auto w-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send w-4 h-4 mx-2" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                        </svg> Warehouse Inbound
                    </button>
                </form>
            </div>
            @endif


        </div>

        @if(count($inbound))
        <div class="border-slate-200/60 dark:border-darkmode-400 mt-2 h-80 overflow-y-auto">
            @foreach( $grfs->where( 'status', '!=', 'closed' ) as $grf )
            <div class="box px-2 py-3 flex-1 mb-2">
                <div class="flex items-center">
                    <div class="flex">
                        <div class="mr-2 text-xs">
                            @switch( $grf->status )
                            @case( "draft" )

                            <div class="ml-auto">
                                <div class="py-1 px-3 rounded-full text-white bg-amber-500">
                                    Draft
                                </div>
                            </div>
                            @break

                            @case( "submited" )
                            <div class="ml-auto">
                                <div class="py-1 px-3 rounded-full text-white bg-success">
                                    Submited
                                </div>
                            </div>
                            @break

                            @case( "wh_approved" )
                            <div class="ml-auto">
                                <div class="py-1 px-3 rounded-full text-white bg-slate-500">
                                    Goods will be sent
                                </div>
                            </div>
                            @break

                            @case( "delivery_approved" )
                            <div class="ml-auto">
                                <div class="py-1 px-3 rounded-full text-white bg-slate-500">
                                    Goods have been sent
                                </div>
                            </div>
                            @break

                            @default

                            @endswitch
                        </div>
                        <div class="font-medium text-slate-800 text-center py-1 truncate"> Request {{ $grf->id }} </div>
                    </div>
                    <div class="dropdown ml-auto">
                        <button class="dropdown-toggle" aria-expanded="false" data-tw-toggle="dropdown">
                            <span class="w-5 h-5 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                </svg>
                            </span>
                        </button>
                        <div class="dropdown-menu w-52">
                            <ul class="dropdown-content">



                                {{-- * / 
                                    |--------------------------------------------------------------------------
                                    |  View detail
                                    |--------------------------------------------------------------------------
                                    / * --}}
                                <li>
                                    <a href="{{ Route( "inbound.get.detail", $grf->id ) }}"
                                        class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-info-circle w-4 h-4 mr-2"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                        View detail
                                    </a>
                                </li>



                                {{-- * / 
                                    |--------------------------------------------------------------------------
                                    |  View surat jalan
                                    |--------------------------------------------------------------------------
                                    / * --}}
                                @if( $grf->status != "draft" && $grf->status != "submited" && $grf->status != "wh_approved" )
                                <li>
                                    <a href="" class="dropdown-item">
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
                                    <a href="" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-seam w-4 h-4 mr-2"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
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
                                    <a href="" class="dropdown-item">
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
            @endforeach
        </div>
        @endif

    </div>

    <div class="intro-x col-span-12 xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12 ">
        <div class="max-h-screen overflow-y-scroll mb-4">
            <table class="table table-report">
                <thead>
                    <tr>
                        <th class=" whitespace-normal">Part</th>
                        <th class=" whitespace-normal">Segment</th>
                        <th class=" whitespace-normal">Quantity</th>
                    </tr>
                </thead>
                <tbody>
    
                    @forelse ( $inbound as $inbounds )
                    <tr class="intro-x">
                        <td class="font-medium ml-2 mr-6 text-left w-6/12"> <a href="" >{{ $inbounds['part'] }}</a> </td>
                        <td class="text-left w-3/12">{{ $inbounds['segment'] }}</td>
                        <td class="text-left w-2/12"> {{ $inbounds['quantity'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">No item on the list</td>
                    </tr>
                    @endforelse
    
                </tbody>
            </table>
        </div>
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
<!-- END: Data List -->
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Confirmation
*|--------------------------------------------------------------------------
*--}}
<div id="inbound-post-excel-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet mx-auto mt-3 text-emerald-900" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M8 11h8v7h-8z"></path>
                        <path d="M8 15h8"></path>
                        <path d="M11 11v7"></path>
                    </svg>
                </div>
                <form action="{{Route('inbound.post.excel.import')}}" method="POST" enctype="multipart/form-data" class="px-5">
                    @csrf
                    <div class="mb-3">
                        <label>Warehouse</label>
                        <select name="warehouse_id" data-placeholder="Select warehouse to store" class="tom-select w-full" required>
                            @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inboundImportExcel">Import Excel to Inbound</label>
                        <input class="form-control border border-slate-100 p-3" type="file" id="importExcel" name="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    </div>
                    <div class="modal-footer flex gap-2 justify-center items-center">
                        <a data-tw-dismiss="modal" class="btn !bg-zinc-200 !text-zinc-900 rounded-full px-8">Cancel</a>
                        <button type="submit" class="btn !bg-emerald-900 !text-zinc-200 rounded-full px-8">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
