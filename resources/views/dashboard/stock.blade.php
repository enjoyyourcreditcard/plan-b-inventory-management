@extends('layouts.app')

@section('breadcrumb')
{{-- /* 
|--------------------------------------------------------------------------
|  Breadcrumb
|--------------------------------------------------------------------------
*/ --}}

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Stock</li>
    </ol>
</nav>
@endsection

@section('content')
{{-- /* 
|--------------------------------------------------------------------------
|  Container
|--------------------------------------------------------------------------
*/ --}}
<div class="grid grid-cols-12 gap-6">

    {{-- row --}}
    <div class="col-span-12 mt-8">
        <div class="intro-y items-center h-10">
            <h2 class="text-lg font-medium mr-5">Dashboard Stock</h2>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-import text-emerald-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                            <path d="M12 12l8 -4.5"></path>
                            <path d="M12 12v9"></path>
                            <path d="M12 12l-8 -4.5"></path>
                            <path d="M22 18h-7"></path>
                            <path d="M18 15l-3 3l3 3"></path>
                         </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $dummy }}</div>
                    <div class="text-base text-slate-500 mt-1">Item dalam gudang</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-export text-amber-600" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                            <path d="M12 12l8 -4.5"></path>
                            <path d="M12 12v9"></path>
                            <path d="M12 12l-8 -4.5"></path>
                            <path d="M15 18h7"></path>
                            <path d="M19 15l3 3l-3 3"></path>
                         </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">32.040</div>
                    <div class="text-base text-slate-500 mt-1">Item luar gudang</div>
                </div>
            </div>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 xl:col-span-6 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Request report</h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="flex">
                        <div>
                            <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">3780
                            </div>
                            <div class="mt-0.5 text-slate-500">Barang keluar</div>
                        </div>
                        <div
                            class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                        </div>
                        <div>
                            <div class="text-slate-500 text-lg xl:text-xl font-medium">458</div>
                            <div class="mt-0.5 text-slate-500">Barang masuk</div>
                        </div>
                    </div>
                </div>
                <div class="report-chart">
                    <div class="{{-- h-[275px] --}}">
                        <canvas id="request-report" class="mt-6 -mb-6" width="389" height="206"
                            style="display: block; box-sizing: border-box; height: 274.667px; width: 518.667px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-3 md:col-span-6 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Presentasi kondisi</h2>
            </div>
            <div class="intro-y box p-5 mt-5">
                <div class="mt-3">
                    <div class="{{-- h-[213px] --}}">
                        <canvas id="report-pie-chart" width="176" height="159"
                            style="display: block; box-sizing: border-box; height: 212px; width: 234.667px;"></canvas>
                    </div>
                </div>
                <div class="w-52 sm:w-auto mx-auto mt-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                        <span class="truncate">Good</span>
                        <span class="font-medium ml-auto">62%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                        <span class="truncate">Replace</span>
                        <span class="font-medium ml-auto">33%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                        <span class="truncate">Used</span>
                        <span class="font-medium ml-auto">10%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-3 md:col-span-6 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Requester terbesar</h2>
            </div>
            <div class="mt-5">
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Requester1</div>
                            <div class="text-slate-500 text-xs mt-0.5">Jakarta</div>
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137
                            Item</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Requester2</div>
                            <div class="text-slate-500 text-xs mt-0.5">Surabaya</div>
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">108
                            Item</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Requester3</div>
                            <div class="text-slate-500 text-xs mt-0.5">Depok</div>
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">98
                            Item</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Requester4</div>
                            <div class="text-slate-500 text-xs mt-0.5">Jakarta</div>
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">73
                            Item</div>
                    </div>
                </div>
                <a href=""
                    class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                    More</a>
            </div>
        </div>
    </div>
</div>
@endsection