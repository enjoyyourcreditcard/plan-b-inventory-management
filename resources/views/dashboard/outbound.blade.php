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
        <li class="breadcrumb-item active" aria-current="page">Outbound</li>
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
            <h2 class="text-lg font-medium mr-5">Dashboard Outbound</h2>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12">
        <div class="report-box-2 intro-y">
            <div class="box grid grid-cols-12">
                <div class="col-span-12 lg:col-span-4 px-8 flex flex-col justify-center">
                    <div class="justify-start flex items-center text-slate-600 dark:text-slate-300">
                        Total Outbound
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="alert-circle" data-lucide="alert-circle"
                            class="lucide lucide-alert-circle tooltip w-4 h-4 ml-1.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="flex items-center justify-start mt-4">
                        <div class="relative text-2xl font-medium pl-3 ml-0.5"> 1.458 </div>
                        <a class="text-slate-500 ml-4" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="refresh-ccw" data-lucide="refresh-ccw"
                                class="lucide lucide-refresh-ccw w-4 h-4">
                                <path d="M3 2v6h6"></path>
                                <path d="M21 12A9 9 0 006 5.3L3 8"></path>
                                <path d="M21 22v-6h-6"></path>
                                <path d="M3 12a9 9 0 0015 6.7l3-2.7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-8 p-8 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                    <div class="tab-content">
                        <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report"
                            role="tabpanel" aria-labelledby="weekly-report-tab">
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Segment</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">Kabel</div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Part</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">Kabel HDMI</div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                <div class="text-slate-500">Total stock</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">210</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 xl:col-span-6 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Outbound report</h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="flex">
                        <div>
                            <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">112
                            </div>
                            <div class="mt-0.5 text-slate-500">Outbound barang baru</div>
                        </div>
                        <div
                            class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                        </div>
                        <div>
                            <div class="text-slate-500 text-lg xl:text-xl font-medium">90</div>
                            <div class="mt-0.5 text-slate-500">Outbound salah gudang</div>
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
                <h2 class="text-lg font-medium truncate mr-5">Presentasi type Outbound</h2>
            </div>
            <div class="intro-y box p-5 mt-5">
                <div class="mt-3">
                    <div class="{{-- h-[213px] --}}">
                        <canvas id="chart-outbound-report" width="176" height="159"
                            style="display: block; box-sizing: border-box; height: 212px; width: 234.667px;"></canvas>
                    </div>
                </div>
                <div class="w-52 sm:w-auto mx-auto mt-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                        <span class="truncate">Good</span>
                        <span class="font-medium ml-auto">73%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                        <span class="truncate">Replace</span>
                        <span class="font-medium ml-auto">27%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-3 md:col-span-6 mt-6">
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
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">12
                            kali Outbound</div>
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
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">10
                            kali Outbound</div>
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
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">6
                            kali Outbound</div>
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
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">5
                            kali Outbound</div>
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
                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">2
                            kali Outbound</div>
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
