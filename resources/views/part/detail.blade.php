@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Part</li>
            <li class="breadcrumb-item active" aria-current="page">Detail Part</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row mb-8 pb-4 border-b border-slate-300">
            <h2 class="text-lg font-medium mr-auto">{{ $part->name }}</h2>
            <div class="dropdown">
                <butto class="dropdown-toggle btn btn-primary pr-5 rounded-full" aria-expanded="false"
                    data-tw-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brightness-2 mr-3"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M6 6h3.5l2.5 -2.5l2.5 2.5h3.5v3.5l2.5 2.5l-2.5 2.5v3.5h-3.5l-2.5 2.5l-2.5 -2.5h-3.5v-3.5l-2.5 -2.5l2.5 -2.5z">
                        </path>
                    </svg> Setting
                </butto>
                <div class="dropdown-menu w-48">
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ route('part.tampilan', $part->id) }}" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-4" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                    </path>
                                    <path d="M16 5l3 3"></path>
                                </svg> Edit
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('part.post.deactive', $part->id) }}" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-4" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg> Deactive
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12  border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5 ">
            <div class="col-span-12 xl:col-span-2 flex justify-center items-center align-middle ">
                <div class="w-52 h-52 sm:w-52 sm:h-52 lg:w-52 lg:h-52 image-fit relative">
                    <img alt="Images" class="rounded-lg" src="{{ asset($part->img) }}">
                </div>
            </div>
            <div
                class="col-span-12 xl:col-span-6 mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0 ">
                <div class="font-medium text-center text-xl lg:text-left lg:mt-3">Part Info</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box mr-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5">
                            </line>
                            <line x1="12" y1="12" x2="12" y2="21">
                            </line>
                            <line x1="12" y1="12" x2="4" y2="7.5">
                            </line>
                        </svg> <strong class="mr-2">Name : </strong> {{ $part->name }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-palette mr-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25">
                            </path>
                            <circle cx="7.5" cy="10.5" r=".5" fill="currentColor"></circle>
                            <circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
                            <circle cx="16.5" cy="10.5" r=".5" fill="currentColor"></circle>
                        </svg> <strong class="mr-2">Color : </strong> {{ $part->color }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sitemap mr-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="15" width="6" height="6" rx="2"></rect>
                            <rect x="15" y="15" width="6" height="6" rx="2"></rect>
                            <rect x="9" y="3" width="6" height="6" rx="2"></rect>
                            <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                            <line x1="12" y1="9" x2="12" y2="12">
                            </line>
                        </svg> <strong class="mr-2">Segment : </strong> <a href="#"
                            class="text-primary">{{ $part->segment->name }}</a>
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event mr-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                            <line x1="16" y1="3" x2="16" y2="7">
                            </line>
                            <line x1="8" y1="3" x2="8" y2="7">
                            </line>
                            <line x1="4" y1="11" x2="20" y2="11">
                            </line>
                            <rect x="8" y="15" width="2" height="2">
                            </rect>
                        </svg> <strong class="mr-2">Creation Date : </strong>
                        {{ $part->created_at->format('d-m-Y') }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle mr-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12.01" y2="8">
                            </line>
                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg> <strong class="mr-2">Description : </strong> {{ $part->description }}
                    </div>
                </div>
            </div>
            <div
                class="col-span-12 xl:col-span-4 lg:mt-0px-5 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3 text-xl">Sales Growth</div>
                <div class="flex items-center justify-center lg:justify-start ">
                    <div class="mr-2 flex p-3 w-full">
                        <span class="bg-green-600 p-3 text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3">
                                </polyline>
                                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                            </svg>
                        </span>
                        <div class="ml-4">
                            <div class="col">
                                <div class="font-weight-medium">
                                    <b>In Stock</b>
                                </div>
                                <div class="text-muted">
                                    32
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 flex p-3 w-full">
                        <span class="bg-warning p-3 text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-export"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                <path d="M12 12l8 -4.5"></path>
                                <path d="M12 12v9"></path>
                                <path d="M12 12l-8 -4.5"></path>
                                <path d="M15 18h7"></path>
                                <path d="M19 15l3 3l-3 3"></path>
                            </svg>
                        </span>
                        <div class="ml-4">
                            <div class="col">
                                <div class="font-weight-medium">
                                    <b>On Order</b>
                                </div>
                                <div class="text-muted">
                                    32
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="dashboard-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4 active" data-tw-target="#table-stock" aria-controls="dashboard"
                    aria-selected="true" role="tab">
                    Stock
                </button>
            </li>
            <li id="account-and-profile-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4" data-tw-target="#table-attachment" aria-selected="false" role="tab">
                    Attachments
                </button>
            </li>
            <li id="activities-tab" class="nav-item" role="presentation">
                <button class="nav-link py-4" data-tw-target="#table-historypeice" aria-selected="false" role="tab">
                    History Price
                </button>
            </li>
        </ul>
    </div>

    <div
        class="post_content tab-content p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mt-10">
        <div class="grid grid-cols-12 mt-5 tab-pane active" id="table-stock" role="presentation">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-lg mr-2 rounded-full" data-tw-toggle="modal"
                    data-tw-target="#stock-modal" type="button">+ New Stock</button>
                <div class="hidden md:block mx-auto text-slate-500"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500 shadow">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" icon-name="search"
                            class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                            data-lucide="search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-x-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">SN Code</th>
                            <th class="whitespace-nowrap">Warehouse Id</th>
                            <th class="whitespace-nowrap">Condition</th>
                            <th class="whitespace-nowrap">Expired At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stocks->count() === 0)
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td>
                                        {{ $is_sn == null ? '-' : $stock->sn_code }}
                                    </td>
                                    <td>{{ $stock->warehouse->name }}</td>
                                    <td>{{ $stock->condition }}</td>
                                    <td>{{ $stock->expired_date }}</td>
                                </tr>
                            @endforeach
                        @endif
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                    class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                    <polyline points="11 17 6 12 11 7"></polyline>
                                    <polyline points="18 17 13 12 18 7"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                    class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right"
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
        <div class="grid grid-cols-12 mt-5 tab-pane" id="table-attachment" role="presentation">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-md mr-2 rounded-full" type="button" data-tw-toggle="modal"
                    data-tw-target="#attachment-modal">+ New Attachments</button>
                <div class="hidden md:block mx-auto text-slate-500"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" icon-name="search"
                            class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                            data-lucide="search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-x-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">File</th>
                            <th class="whitespace-nowrap">Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($attachment->count() === 0)
                            <tr>
                                <td colspan="4" class="text-cente">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($attachment as $item)
                                <tr>
                                    <td><a href="{{ asset('file/' . $item->file) }}"
                                            target="blank">{{ $item->file }}</a></td>

                                    <td>{{ $item->comment }}</td>
                                </tr>
                            @endforeach
                        @endif
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                    class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                    <polyline points="11 17 6 12 11 7"></polyline>
                                    <polyline points="18 17 13 12 18 7"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                    class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right"
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
        <div class="grid grid-cols-12 mt-5 tab-pane" id="table-historypeice" role="presentation">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-md mr-2 rounded-full" type="button" data-tw-toggle="modal"
                    data-tw-target="#price-modal">+ New History Price</button>
                <div class="hidden md:block mx-auto text-slate-500"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" icon-name="search"
                            class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                            data-lucide="search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-x-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">Price</th>
                            <th class="whitespace-nowrap">Create At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($Historyprices->count() === 0)
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($Historyprices as $hp)
                                <tr>
                                    <td>{{ $hp->price }}</td>
                                    <td>{{ $hp->created_at->format('j F, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                    @endif
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                    class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                    <polyline points="11 17 6 12 11 7"></polyline>
                                    <polyline points="18 17 13 12 18 7"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                    class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right"
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
    {{-- modal new stock --}}
    <!-- BEGIN: Modal Content -->
    <div id="stock-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Create New Stock</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-content">
                    <div class="modal-body p-10">
                        <form action="{{ Route('stock.post.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="part_id" value="{{ $part_id }}" />
                            </div>
                            <div class="mb-3">
                                <label for="stockWhId" class="form-label">Warehouse</label>
                                <select class="form-control" name="warehouse_id" required>
                                    <option value="1">Warehouse A</option>
                                    <option value="2">Warehouse B</option>
                                    <option value="3">Warehouse C</option>
                                </select>
                            </div>

                            <div class="my-3">
                                <label for="regular-form-1" class="form-label">SN Code</label>
                                <input type="text" class="form-control" id="stockSnCode" name="sn_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="stockExpiredDate" class="form-label">Expired Date</label>
                                <input type="date" class="form-control" id="stockExpiredDate" name="expired_date"
                                    required>
                            </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                </div>
                </form>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->
    {{-- !  --}}
    <div id="attachment-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add Attachment</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-content">
                    <div class="modal-body p-10">
                        <form method="POST" action="{{ route('post.store.attachment') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="part_id" class="form-control" value="{{ $part_id }}">
                            <div class="mb-3">
                                <label class="form-label">Add File</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Commentar</label>
                                <textarea
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="comment"></textarea>
                            </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                </div>
                </form>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    {{-- ! --}}
    <div id="price-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add a new price</h2>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-content">
                    <div class="modal-body p-10">
                        <form action="{{ route('post.store.historyprice') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="part_id" value="{{ $part_id }}">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control dengan-rupiah" name="price" id="dengan-rupiah" required>
                                @error('price')
                                    <div class="text-warning">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                </div>
                </form>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>




    {{-- !
    !-------
    !End redesign
    !-------
    ! --}}
    {{-- <div class="">

        <div class="row" style="margin: 0px">
            <div class="container">
            @if ($part->status === 'inactive')
                    <div class="card card-md mb-3">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7">
                                    </path>
                                    <line x1="10" y1="10" x2="10.01" y2="10"></line>
                                    <line x1="14" y1="10" x2="14.01" y2="10"></line>
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Part ini tidak aktif</h3>
                                    <div class="markdown text-muted">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum sequi dolor,
                                        illo
                                        temporibus doloribus, obcaecati eligendi dolores modi atque facilis praesentium ad
                                        ipsa
                                        beatae? Veritatis ipsa praesentium minus omnis.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size:18px">{{ $part->name }}</h3>
<div class="ms-auto">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                </path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            Setting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </a>


        <div class="dropdown-menu ">
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditPartModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                    </path>
                    <path d="M16 5l3 3"></path>
                </svg>

                Edit
            </a>
            <a class="dropdown-item" href="{{ Route('part.post.deactive', $part->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="4" y1="7" x2="20" y2="7"></line>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                &nbsp;
                Deactive
            </a>
        </div>
    </div>
</div>

</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset($part->img) }}" class="rounded mx-auto d-block border" height="235px" alt="...">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body " style="height: 232px">
                    <div class="card-title">
                        <h3>PART INFO</h3>
                    </div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5">
                            </line>
                            <line x1="12" y1="12" x2="12" y2="21">
                            </line>
                            <line x1="12" y1="12" x2="4" y2="7.5">
                            </line>
                        </svg>
                        Name : <strong>{{ $part->name }}
                        </strong>
                    </div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-palette" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25">
                            </path>
                            <circle cx="7.5" cy="10.5" r=".5" fill="currentColor"></circle>
                            <circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
                            <circle cx="16.5" cy="10.5" r=".5" fill="currentColor"></circle>
                        </svg>
                        Color : <strong>{{ $part->color }}</strong>
                    </div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sitemap" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="15" width="6" height="6" rx="2"></rect>
                            <rect x="15" y="15" width="6" height="6" rx="2"></rect>
                            <rect x="9" y="3" width="6" height="6" rx="2"></rect>
                            <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                            <line x1="12" y1="9" x2="12" y2="12">
                            </line>
                        </svg>
                        Category: <strong><a href="#"
                                class="text-primary">{{ $part->segment->category->name }}</a></strong>
                    </div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                            <line x1="16" y1="3" x2="16" y2="7">
                            </line>
                            <line x1="8" y1="3" x2="8" y2="7">
                            </line>
                            <line x1="4" y1="11" x2="20" y2="11">
                            </line>
                            <rect x="8" y="15" width="2" height="2">
                            </rect>
                        </svg>
                        Creation Date :
                        <strong>{{ $part->created_at->format('d-m-Y') }}</strong>
                    </div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12.01" y2="8">
                            </line>
                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg>
                        Description : <strong>{{ $part->description }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3">
                                    </polyline>
                                    <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                    <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                    <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                <b>In Stock</b>
                            </div>
                            <div class="text-muted">
                                32
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-sm mt-1">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-warning text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-packge-export" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                    <path d="M12 12l8 -4.5"></path>
                                    <path d="M12 12v9"></path>
                                    <path d="M12 12l-8 -4.5"></path>
                                    <path d="M15 18h7"></path>
                                    <path d="M19 15l3 3l-3 3"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                <b>On Order</b>
                            </div>
                            <div class="text-muted">
                                32
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="card">
    <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="#tabs-home-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                    <line x1="12" y1="12" x2="20" y2="7.5"></line>
                    <line x1="12" y1="12" x2="12" y2="21"></line>
                    <line x1="12" y1="12" x2="4" y2="7.5"></line>
                    <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                </svg>
                &nbsp;STOCK</a>
        </li>

        <li class="nav-item" role="presentation">
            <a href="#tabs-attachments" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5">
                    </path>
                </svg>
                &nbsp;Attachments</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#tabs-hp" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-businessplan" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                    <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                    <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                    <path d="M5 15v1m0 -8v1"></path>
                </svg>
                &nbsp;History Price</a>
        </li>
    </ul>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                <div>
                    <div class="pt-3 ">
                        <div class="d-flex">
                            <div> <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#selectStockModal">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    New Stock
                                </button>
                            </div>
                            <div class="ms-auto text-muted">
                                <div class="input-icon mb-3"><input type="text" class="form-control"
                                        placeholder="Search…" value=""><span class="input-icon-addon"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="10" cy="10" r="7">
                                            </circle>
                                            <line x1="21" y1="21" x2="15" y2="15"></line>
                                        </svg></span></div>
                            </div>
                            <div class="px-1"></div>
                            <div class="btn-group h-25 "><button type="button"
                                    class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-filter" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                        </path>
                                    </svg></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                        class="dropdown-item" href="#"><input type="checkbox">&nbsp; No
                                        Stock</button></div>
                            </div>
                            <div class="px-1"></div>
                            <div class="btn-group h-25 "><button type="button"
                                    class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-adjustments" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="6" cy="10" r="2"></circle>
                                        <line x1="6" y1="4" x2="6" y2="8"></line>
                                        <line x1="6" y1="12" x2="6" y2="20"></line>
                                        <circle cx="12" cy="16" r="2"></circle>
                                        <line x1="12" y1="4" x2="12" y2="14"></line>
                                        <line x1="12" y1="18" x2="12" y2="20"></line>
                                        <circle cx="18" cy="7" r="2"></circle>
                                        <line x1="18" y1="4" x2="18" y2="5"></line>
                                        <line x1="18" y1="9" x2="18" y2="20"></line>
                                    </svg></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                        class="dropdown-item" href="#"><input type="checkbox"
                                            title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                        Name</button><button class="dropdown-item" href="#"><input type="checkbox"
                                            title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                        Description</button><button class="dropdown-item" href="#"><input
                                            type="checkbox" title="Toggle Column Visible" checked=""
                                            style="cursor: pointer;">&nbsp; Category</button><button
                                        class="dropdown-item" href="#"><input type="checkbox"
                                            title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                        Brand</button><button class="dropdown-item" href="#"><input type="checkbox"
                                            title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                        Stock</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="tabel-horizontal-scroll">
                        <table role="table" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                        style="cursor: pointer;"><b>SN Code</b><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="6 15 12 9 18 15"></polyline>
                                        </svg></th>
                                    <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                        style="cursor: pointer;"><b>Warehouse
                                            ID</b><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="6 15 12 9 18 15"></polyline>
                                        </svg></th>
                                    <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                        style="cursor: pointer;">
                                        <b>Condition</b><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="6 15 12 9 18 15"></polyline>
                                        </svg></th>
                                    <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                        style="cursor: pointer;"><b>Expired
                                            Date</b><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="6 15 12 9 18 15"></polyline>
                                        </svg></th>
                                </tr>
                            </thead>
                            <tbody role="rowgroup">
                                @foreach ($stocks as $stock)
                                    <tr role="row">
                                        <td role="cell">
                                            {{ $is_sn == null ? '-' : $stock->sn_code }}
                                        </td>
                                        <td role="cell">{{ $stock->warehouse->name }}</td>
                                        <td role="cell">{{ $stock->condition }}</td>
                                        <td role="cell">{{ $stock->expired_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class=" d-flex align-items-center">
                        <p class="m-0 ">Showing <span>1</span> of <span>1</span> entries</p>
                        <div class="pagination m-0 ms-auto">
                            <div class="btn-group "><button disabled="" class="btn btn-outline-dark  " href="#"
                                    tabindex="-1" aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                    </svg>prev</button><button disabled="" class="btn btn-outline-dark"
                                    href="#">next<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                    </svg></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-attachments" role="tabpanel">

                <div class="col-12">
                    <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal"
                        data-bs-target="#modal-add-attachment">
                        New Attachment
                    </a>

                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" border="0.5">
                                <thead>
                                    <tr>
                                        <th>file</th>
                                        <th>Comment</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($attachment->count() === 0)
                                        <td>Tidak ada data</td>
                                    @else
                                        @foreach ($attachment as $item)
                                            <tr>
                                                <td><a href="{{ asset('file/' . $item->file) }}"
                                                        target="blank">{{ $item->file }}</a></td>

                                                <td>{{ $item->comment }}</td>

                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <div class="float-end me-3">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="tabs-hp" role="tabpanel">
                <div class="col-12">
                    <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal"
                        data-bs-target="#modal-add-price">
                        New Price
                    </a>
                    @if (session()->has('success'))
                        <div class="alert alert-success position-absolute" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Price</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($Historyprices->count() === 0)
                                        <td>Tidak ada data</td>
                                    @else
                                        @foreach ($Historyprices as $hp)
                                            <tr>
                                                <td>{{ $hp->price }}</td>
                                                <td>{{ $hp->created_at->format('j F, Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                @endif

                            </table>
                            <div class="float-end me-3">
                                {{ $Historyprices->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div> --}}
    {{-- <div class="modal modal-blur fade" id="editStockModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/stock" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
@method('put')
@csrf
                        <input type="hidden" name="part_id" value="{{ $part->id }}">
<div class="mb-3">
    <label for="stockWhId" class="form-label">Warehouse</label>
    <select class="form-control" id="stockWhId" name="warehouse_id" required>
        <option value="1">Warehouse A</option>
        <option value="2">Warehouse B</option>
        <option value="3">Warehouse C</option>
    </select>
</div>

@if ($is_sn == true)
    <div class="mb-3">
        <label for="stockSnCode" class="form-label">SN Code</label>
        <input type="text" class="form-control" id="stockSnCode" name="sn_code" required>
    </div>
@endif

<div class="mb-3">
    <label for="stockExpiredDate" class="form-label">Expired Date</label>
    <input type="date" class="form-control" id="stockExpiredDate" name="expired_date" required>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div> --}}
    {{-- todo <div class="modal modal-blur fade" id="modal-add-price" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('post.store.historyprice') }}" method="post">
{{ csrf_field() }}
<div class="modal-body">
    <input type="hidden" class="form-control" name="part_id" value="{{ $part_id }}">
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="dengan-rupiah" required>
        @error('price')
            <div class="text-warning">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Price</button>
</div>
</form>
</div>
</div>
</div> --}}
    {{-- ! <div class="modal modal-blur fade" id="modal-add-attachment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Attachment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('post.store.attachment') }}"
enctype="multipart/form-data">
@csrf
<div class="modal-body">
    <input type="hidden" name="part_id" class="form-control" value="{{ $part_id }}">
    <div class="mb-3">
        <label class="form-label">Add File</label>
        <input type="file" name="file" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Commentar</label>
        <textarea class="form-control" name="comment"></textarea>
    </div>
</div>
<div class="modal-footer">
    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
        Cancel
    </a>
    <button class="btn btn-primary ms-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        Save
    </button>
</div>
</form>
</div>
</div>
</div> --}}
    {{-- <div class="modal modal-blur fade" id="EditPartModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Part</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/part/{{ $part->id }}" method="POST" enctype="multipart/form-data">
<div class="modal-body">
    @csrf
    @method('put')
    <div class="row">
        <div class="mb-2">
            <label for="partName" class="form-label">Part Name</label>
            <input type="text" class="form-control" id="partName" name="name" required value="{{ $part->name }}">
        </div>
        <div class="mb-2">
            <label for="editPartCategory" class="form-label">Category</label>
            <select class="form-control select2EditPart" id="editPartCategory" name="category_id" required>
                @foreach ($categories as $category)
                    @if ($part->category_id == $category->id)
                        <option value="{{ $category->id }}"
                            data-brandname="{{ $brand == null ? '' : (isset($brand['nameString'][$category->id]) == true ? $brand['nameString'][$category->id] : '') }}"
                            data-brandid="{{ $brand == null ? '' : (isset($brand['idString'][$category->id]) == true ? $brand['idString'][$category->id] : '') }}"
                            data-uom="{{ $category->uom }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}"
                            data-brandname="{{ $brand == null ? '' : (isset($brand['nameString'][$category->id]) == true ? $brand['nameString'][$category->id] : '') }}"
                            data-brandid="{{ $brand == null ? '' : (isset($brand['idString'][$category->id]) == true ? $brand['idString'][$category->id] : '') }}"
                            data-uom="{{ $category->uom }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="partBrand" class="form-label">Brand</label>
            <select class="form-select select2EditPart" id="partBrand" name="brand_id" required>
                <blade
                    for|%20(%24i%20%3D%200%3B%20%24i%20%3C%20count(%24brand%5B%26%2339%3Bid%26%2339%3B%5D)%3B%20%24i%2B%2B)>
                    @if ($part->brand_id == $brand['id'][$i])
                        <option class="partBrandOption" value="{{ $brand['id'][$i] }}"
                            selected>
                            {{ $brand['name'][$i] }}</option>
                    @else
                        <option class="partBrandOption" value="{{ $brand['id'][$i] }}">
                            {{ $brand['name'][$i] }}</option>
                    @endif
                @endfor
            </select>
        </div>

        <div class="mb-2">
            <label for="partUom" class="form-label">Uom</label>
            <select class="form-select select2EditPart" id="partUom" name="uom" required>
                @foreach ($uoms as $uom)
                    @if ($uom == $part->uom)
                        <option class="partUomOption" value="{{ $uom }}" selected>
                            {{ $uom }}</option>
                    @else
                        <option class="partUomOption" value="{{ $uom }}">
                            {{ $uom }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label for="partSnStatus" class="form-label">SN Status</label>
            <select class="form-select select2EditPart" id="partSnStatus" name="sn_status" required>
                <option value="non sn"
                    {{ $part->sn_status == 'non_sn' ? 'selected' : '' }}>
                    NON SN
                </option>
                <option value="sn"
                    {{ $part->sn_status == 'sn' ? 'selected' : '' }}>
                    SN</option>
            </select>
        </div>

        <div class="mb-2">
            <label for="partColor" class="form-label">Color</label>
            <select class="form-control select3EditPart" id="partColor" name="color" required>
                <option value="Black"
                    {{ $part->color == 'Black' ? 'selected' : '' }}>
                    Black</option>
                <option value="White"
                    {{ $part->color == 'White' ? 'selected' : '' }}>
                    White</option>
                <option value="Grey"
                    {{ $part->color == 'Grey' ? 'selected' : '' }}>
                    Grey</option>
                <option value="Green"
                    {{ $part->color == 'Green' ? 'selected' : '' }}>
                    Green</option>
                <option value="Yellow"
                    {{ $part->color == 'Yellow' ? 'selected' : '' }}>
                    Yellow
                </option>
                <option value="NN"
                    {{ $part->color == 'NN' ? 'selected' : '' }}>
                    NN</option>
                <option value="Blue"
                    {{ $part->color == 'Blue' ? 'selected' : '' }}>
                    Blue</option>
                <option value="Silver"
                    {{ $part->color == 'Silver' ? 'selected' : '' }}>
                    Silver
                </option>
                <option value="Multi Color"
                    {{ $part->color == 'Multi Color' ? 'selected' : '' }}>
                    Multi
                    Color</option>
                <option value="Red"
                    {{ $part->color == 'Red' ? 'selected' : '' }}>
                    Red</option>
                <option value="Orange"
                    {{ $part->color == 'Orange' ? 'selected' : '' }}>
                    Orange
                </option>
            </select>
        </div>

        <div class="mb-2">
            <label for="partSize" class="form-label">Size</label>
            <input type="number" class="form-control" id="partSize" name="size" required value="{{ $part->size }}">
        </div>

        <div class="mb-2">
            <label for="partDescription" class="form-label">Description</label>
            <textarea class="form-control" id="partDescription" rows="3" name="description"
                required>{{ $part->description }}</textarea>
        </div>

        <div class="mb-2">
            <label for="partNote" class="form-label">Note</label>
            <textarea class="form-control" id="partNote" rows="2" name="note">{{ $part->note }}</textarea>
        </div>

        <div class="mb-4">
            <label for="partImage" class="form-label">Part Image</label>
            <input class="form-control" type="file" id="partImage" name="img" accept="image/*">
        </div>

        <input type="hidden" name="oldImg" value="{{ $part->img }}">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div> --}}
    {{-- <div class="modal modal-blur fade" id="selectStockModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Upload Stock</div>
                    <div>Pilih methode tambah data</div>
                </div>
                <div class="pb-3 px-3">
                    <div class="row">
                        <div class="col-md-6">

                            <button type="button" class="btn btn-success me-auto w-100" disabled>
                                Bulk</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                                data-target="#createStockModal" data-dismiss="modal">Pieces</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="modal modal-blur fade" id="createStockModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ Route('stock.post.store') }}" method="POST">
<div class="modal-header">
    <h5 class="modal-title">Create New Stock</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    @csrf

    <div class="mb-3">
        <input type="hidden" name="part_id" value="{{ $part_id }}" />
    </div>

    <div class="mb-3">
        <label for="stockWhId" class="form-label">Warehouse</label>
        <select class="form-control" name="warehouse_id" required>
            <option value="1">Warehouse A</option>
            <option value="2">Warehouse B</option>
            <option value="3">Warehouse C</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="stockSnCode" class="form-label">SN Code</label>
        <input type="text" class="form-control" id="stockSnCode" name="sn_code" required>
    </div>

    <div class="mb-3">
        <label for="stockExpiredDate" class="form-label">Expired Date</label>
        <input type="date" class="form-control" id="stockExpiredDate" name="expired_date" required>
    </div>
</div>
<div class="modal-footer">
</div> --}}
@endsection

@section('javasScript')
    <script src="{{ asset("js/part.js") }}"></script>
@endsection