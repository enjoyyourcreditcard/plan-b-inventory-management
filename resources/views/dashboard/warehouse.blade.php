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
        <li class="breadcrumb-item active" aria-current="page">Warehouse</li>
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
            <h2 class="text-lg font-medium mr-5">Dashboard Warehouse</h2>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-certificate text-emerald-600" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path>
                            <circle cx="6" cy="14" r="3"></circle>
                            <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path>
                         </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">15</div>
                    <div class="text-base text-slate-500 mt-1">Gudang permanen</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-report text-slate-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="17" cy="17" r="4"></circle>
                            <path d="M17 13v4h4"></path>
                            <path d="M12 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M11.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2m0 3v4"></path>
                        </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">7</div>
                    <div class="text-base text-slate-500 mt-1">Gudang kontrak</div>
                </div>
            </div>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 xl:col-span-6 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">----- report</h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="report-chart">
                    <div class="{{-- h-[275px] --}}">
                        <canvas id="request-report" class="mt-6 -mb-6" width="389" height="206"
                            style="display: block; box-sizing: border-box; height: 274.667px; width: 518.667px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-6 md:col-span-6 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Outbound terbesar</h2>
            </div>
            <div class="mt-5">
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">MNC Warehouse Jakarta</div>
                            {{-- <div class="text-slate-500 text-xs mt-0.5">Jakarta</div> --}}
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">141
                            kali outbound</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">MNC Warehouse Depok</div>
                            {{-- <div class="text-slate-500 text-xs mt-0.5">Jakarta</div> --}}
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">120
                            kali outbound</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">MNC Warehouse Medan</div>
                            {{-- <div class="text-slate-500 text-xs mt-0.5">Jakarta</div> --}}
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">98
                            kali outbound</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">MNC Warehouse Surabaya</div>
                            {{-- <div class="text-slate-500 text-xs mt-0.5">Jakarta</div> --}}
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">76
                            kali outbound</div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">MNC Warehouse Bogor</div>
                            {{-- <div class="text-slate-500 text-xs mt-0.5">Jakarta</div> --}}
                        </div>
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">45
                            kali outbound</div>
                    </div>
                </div>
                <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
            </div>
        </div>
    </div>
</div>
@endsection