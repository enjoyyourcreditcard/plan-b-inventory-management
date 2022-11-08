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
        <li class="breadcrumb-item active">Mini Stock</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- /* 
|--------------------------------------------------------------------------
|  View Container
|--------------------------------------------------------------------------
*/ --}}
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Mini Stock</h2>
        </div>
    </div>
    <div class="intro-y col-span-12 xl:col-span-4 lg:col-span-4 md:col-span-12 sm:col-span-12">



        {{-- * / 
        |--------------------------------------------------------------------------
        |  Request details
        |--------------------------------------------------------------------------
        / * --}}
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Countdown</div>
            </div>
            @forelse($timers as $timer)
            <div class="flex items-center mb-4">
                <span class="underline decoration-dotted ml-1">{{ $timer->grf_code }}</span>
                <div class="flex items-center ml-auto text-slate-500">
                    @if ($timer->ended != "Melewati batas waktu")
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    @endIf
                    <div class="{{ $timer->ended == "Melewati batas waktu" ? "text-red-500" : "" }}">{{ $timer->ended }}</div>
                </div>
            </div>
            @empty
            <div class="text-center mb-4">
                No data
            </div>
            @endForelse
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
                            </svg> Back
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 xl:col-span-8 lg:col-span-8 md:col-span-12 sm:col-span-12 xl:flex-nowrap items-start">

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible mb-4">
            <table class="table table-report">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">GRF CODE</th>
                        <th class="text-center whitespace-nowrap">SN CODE</th>
                        <th class="text-center whitespace-nowrap">PART NAME</th>
                        <th class="text-center whitespace-nowrap">WAREHOUSE</th>
                        <th class="text-center whitespace-nowrap">REQUESTED AT</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($miniStocks as $miniStock)
                    <tr class="intro-x">
                        <td class="!py-3.5">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <a href="javascript:;" class="font-medium whitespace-nowrap">{{ $miniStock->grf->grf_code }}</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center capitalize">{{ $miniStock->sn }}</td>
                        <td class="text-center">{{ $miniStock->part->name }}</td>
                        <td class="text-center">{{ $miniStock->grf->warehouse->name }}</td>
                        <td>{{ $miniStock->grf->created_at->format("F j, Y, g:i a") }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">No data</td>
                    </tr>
                    @endForelse

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
@endsection

@section("javaScript")
<script src="{{ Asset( "js/views/requester/ministock.js" ) }}"></script>
@endSection