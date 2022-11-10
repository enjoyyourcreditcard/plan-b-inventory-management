@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="grid grid-cols-12 gap-6 mb-14">
    <div class="col-span-12 lg:col-span-12 mt-6">
        <div class="box p-16 overflow-hidden bg-primary intro-y">
            <div class=" w-full  text-white text-3xl -mt-3">Selamat {{ Carbon\Carbon::now()->format('H') <= 10 ? "Pagi"
                    : ( Carbon\Carbon::now()->format('H') <= 14 ? "Siang" : ( Carbon\Carbon::now()->format('H') <= 18
                            ? "Sore" : "Malam" ) ) }}, {{ Auth::user()->name }} !
            </div>
            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">

            </div>
            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3 flex gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg>
                </div>
                <div>
                    {{ count( $whapproval ) > 0 ? $whapproval->first()->warehouse->name : "" }}.<br>
                    {{ count( $whapproval ) > 0 ? $whapproval->first()->warehouse->location : "" }}
                </div>
            </div>
            <img class="hidden sm:block absolute top-0 right-0 w-1/4 -mt-3 mr-2" alt="Midone - HTML Admin Template"
                src="{{ asset('dist/images/warehouse3.png') }}">
        </div>
    </div>
</div>
{{-- ! --}}
{{-- ! --}}
<div class=" grid grid-cols-12 gap-6 xl:-mt-5 2xl:-mt-8 -mb-10 z-40 2xl:z-10 mt-3">
    <div class="col-span-12 2xl:col-span-12">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Official Store -->
            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->
            <div class="col-span-12 xl:col-span-6 mt-6">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Warehouse Approv</h2>
                </div>
                <div class="mt-5">
                    <div class="intro-y">
                        @foreach ($whapproval as $item)
                        <a href="{{Route('warehouse.get.detail',str_replace('/', '~', $item->grf_code))}}">
                            <div class="box pr-4  mb-3 flex items-center zoom-in">
                                <div class="ml-4 py-4 mr-auto">
                                    <div class="font-medium">{{$item->grf_code}}</div>
                                    <div class="text-slate-500 text-xs mt-0.5">{{$item->created_at->format('d-m-Y
                                        h:m:s')}}
                                    </div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    New</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <a href="{{ route('warehouse.get.request') }}"
                        class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                        More</a>
                </div>
            </div>
            {{-- ! --}}
            {{-- ! --}}
            <div class="col-span-12 xl:col-span-6 mt-6">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Warehouse Return</h2>
                </div>
                <div class="mt-5">
                    <div class="intro-y">
                        @foreach ($whreturn as $item)
                        <a href="{{Route('get.whreturn.show.action.grf',str_replace('/', '~', $item->grf_code))}}">
                            <div class="box pr-4  mb-3 flex items-center zoom-in">
                                <div class="ml-4 py-4 mr-auto">
                                    <div class="font-medium">{{$item->grf_code}}</div>
                                    <div class="text-slate-500 text-xs mt-0.5">{{$item->created_at->format('d-m-Y
                                        h:m:s')}}
                                    </div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    New</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <a href="{{ route('warehouse.get.return') }}"
                        class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                        More</a>
                </div>
            </div>
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: Weekly Top Products -->
            <!-- END: Weekly Top Products -->
        </div>
    </div>
</div>
@endsection