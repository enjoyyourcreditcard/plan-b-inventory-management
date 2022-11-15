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
        <li class="breadcrumb-item active" aria-current="page">Build</li>
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
            <h2 class="text-lg font-medium mr-5">Dashboard Build</h2>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hexagon-3d text-slate-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19 6.844a2.007 2.007 0 0 1 1 1.752v6.555c0 .728 -.394 1.399 -1.03 1.753l-5.999 3.844a1.995 1.995 0 0 1 -1.942 0l-6 -3.844a2.007 2.007 0 0 1 -1.029 -1.752v-6.556c0 -.729 .394 -1.4 1.029 -1.753l6 -3.583a2.05 2.05 0 0 1 2 0l6 3.584h-.03z"></path>
                            <path d="M12 16.5v4.5"></path>
                            <path d="M4.5 7.5l3.5 2.5"></path>
                            <path d="M16 10l4 -2.5"></path>
                            <path d="M12 7.5v4.5l-4 2"></path>
                            <path d="M12 12l4 2"></path>
                            <path d="M12 16.5l4 -2.5v-4l-4 -2.5l-4 2.5v4z"></path>
                        </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">40</div>
                    <div class="text-base text-slate-500 mt-1">Total build</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box-model-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 8h8v8h-8z"></path>
                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                        </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">---</div>
                    <div class="text-base text-slate-500 mt-1">-----</div>
                </div>
            </div>
        </div>
    </div>

    {{-- row --}}
    <div class="col-span-12 grid grid-cols-12 gap-6">
        <div class="col-span-12 xl:col-span-6 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Build report</h2>
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
                <h2 class="text-lg font-medium truncate mr-5">Build terbaru</h2>
            </div>
            <div class="mt-5">
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">XPS 17</div>
                            <div class="text-slate-500 text-xs mt-0.5">Jakarta</div>
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Thinkpad x1</div>
                            <div class="text-slate-500 text-xs mt-0.5">Surabaya</div>
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Aspire 7</div>
                            <div class="text-slate-500 text-xs mt-0.5">Medan</div>
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        {{-- <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img alt="Midone - HTML Admin Template"
                                src="http://tinker.left4code.com/dist/images/profile-2.jpg">
                        </div> --}}
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">Redmi book</div>
                            <div class="text-slate-500 text-xs mt-0.5">Jakarta</div>
                        </div>
                    </div>
                </div>
                <a href=""
                    class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-500 dark:border-darkmode-300 text-slate-500">View
                    More</a>
            </div>
        </div>
    </div>
</div>
@endsection