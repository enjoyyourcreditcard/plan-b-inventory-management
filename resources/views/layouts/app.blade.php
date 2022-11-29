<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{asset(" dist/images/logo.svg")}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Tinker - Tailwind HTML Admin Template</title>
    <!-- BEGIN: CSS Assets-->
    <!-- END: CSS Assets-->


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />


</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
{{-- @dd(Auth::user()->id) --}}
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="bar-chart-2" data-lucide="bar-chart-2"
                    class="lucide lucide-bar-chart-2 w-8 h-8 text-white transform -rotate-90">
                    <line x1="18" y1="20" x2="18" y2="10"></line>
                    <line x1="12" y1="20" x2="12" y2="4"></line>
                    <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg>
            </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">

            {{-- /*
            *--------------------------------------------------------------------------
            * ROLE IC & ADMIN
            *--------------------------------------------------------------------------
            */ --}}

            @if (Auth::user()->role == "admin" || Auth::user()->role == "inventory_control")
            <li>
                <a href="javascript:;.html" class="menu menu--active">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd"
                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                    </div>
                    <div class="menu__title">
                        Dashboard
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-chevron-down menu__sub-icon transform rotate-180"
                            width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="menu__sub-open">
                    <li>
                        <a href="{{ Route('dashboard.stock') }}" class="menu menu--active">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Stock </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('dashboard.inbound') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Inbound </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.outbound') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Outbound </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('dashboard.build') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Build </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('dashboard.warehouse') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Warehouse </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="side-menu-light-file-manager.html" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                    </div>
                    <div class="menu__title"> Stock </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="menu__title">
                        Transaksi
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-chevron-down menu__sub-icon" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ Route('inbound.get.home') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Inbound </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaction.ic.view.outbound') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Outbound </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('transaction.ic.get.return.stock') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Return Stock </div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-1.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Warehouse Transfer </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;.html" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-boxes" viewBox="0 0 16 16">
                            <path
                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                        </svg>
                    </div>
                    <div class="menu__title">
                        Master
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-chevron-down menu__sub-icon" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="index.html" class="menu menu--active">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Part </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Segment </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaction.ic.view.outbound') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Category </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Brand </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Warehouse </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> User </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="side-menu-light-inbox.html" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </div>
                    <div class="menu__title"> Recondition </div>
                </a>
            </li>
            
            
            @endIf

            {{-- /*
            *--------------------------------------------------------------------------
            * ROLE WAREHOUSE
            *--------------------------------------------------------------------------
            */ --}}

            @if (Auth::user()->role == "warehouse")
            <li>
                <a href="{{ route('warehouse.get.dashboard') }}"
                    class="side-menu {{ Route::currentRouteName() == 'warehouse.get.dashboard' ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21"
                            height="21" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd"
                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg> </div>
                    <div class="side-menu__title"> Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{ route('warehouse.get.request') }}"
                    class="side-menu {{ Route::currentRouteName() == 'warehouse.get.request' ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21v-13l9 -4l9 4v13"></path>
                            <path d="M13 13h4v8h-10v-6h6"></path>
                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                        </svg> </div>
                    <div class="side-menu__title"> Warehouse Approv</div>
                </a>
            </li>
            <li>
                <a href="{{ route('warehouse.get.return') }}"
                    class="side-menu {{ Route::currentRouteName() == 'warehouse.get.return' ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-transform" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 13v.875c0 3.383 2.686 6.125 6 6.125"></path>
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="18" cy="18" r="3"></circle>
                            <path d="M16 9l2 2l2 -2"></path>
                            <path d="M18 10v-.875c0 -3.383 -2.686 -6.125 -6 -6.125"></path>
                            <path d="M3 15l2 -2l2 2"></path>
                        </svg> </div>
                    <div class="side-menu__title"> Warehouse Return</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="box" data-lucide="box" class="lucide lucide-box">
                            <path
                                d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <div class="side-menu__title">
                        Warehouse Transfer
                        <div class="side-menu__sub-icon transform rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                                class="lucide lucide-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <ul class="side-menu__sub-open" style="display: block;">
                    <li>
                        <a href="{{ route('warehouse.get.whtransfer') }}"
                            class="side-menu {{ Route::currentRouteName() == 'warehouse.get.whtransfer' ? ' side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-switch-horizontal" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="16 3 20 7 16 11"></polyline>
                                    <line x1="10" y1="7" x2="20" y2="7"></line>
                                    <polyline points="8 13 4 17 8 21"></polyline>
                                    <line x1="4" y1="17" x2="13" y2="17"></line>
                                </svg> </div>
                            <div class="side-menu__title"> Warehouse Transfer </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('warehouse.get.recipient') }}"
                            class="side-menu {{ Route::currentRouteName() == 'warehouse.get.recipient' ? ' side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-switch-horizontal" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="16 3 20 7 16 11"></polyline>
                                    <line x1="10" y1="7" x2="20" y2="7"></line>
                                    <polyline points="8 13 4 17 8 21"></polyline>
                                    <line x1="4" y1="17" x2="13" y2="17"></line>
                                </svg> </div>
                            <div class="side-menu__title"> Warehouse Transfer penerima</div>
                        </a>
                    </li>
                </ul>
            </li>
            @endIf

            {{-- /*
            *--------------------------------------------------------------------------
            * ROLE REQUESTER
            *--------------------------------------------------------------------------
            */ --}}

            @if (Auth::user()->role == "requester")
            <li>
                <a href="{{ route('request.get.home') }}" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd"
                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                    </div>
                    <div class="menu__title">
                        Dashboard
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('mini.stock.get') }}" class="menu">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-archive" viewBox="0 0 16 16">
                            <path
                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <div class="menu__title"> Mini Stock </div>
                </a>
            </li>
            @endIf

        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
                <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>


                {{-- /*
                *--------------------------------------------------------------------------
                * ROLE IC & ADMIN
                *--------------------------------------------------------------------------
                */ --}}
                @if (Auth::user()->role == "admin" || Auth::user()->role == "inventory_control")
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg> </div>
                        <div class="side-menu__title">
                            Dashboard
                            <div class="side-menu__sub-icon "><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-down" width="36" height="36"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ Route('dashboard.stock') }}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Stock </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{Route('inbound.get.home')}}" class="side-menu {{(request()->is('inbound')) ? 'side-menu--active' : ''}}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Inbound </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.outbound')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Outbound </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('dashboard.build') }}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Build </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('dashboard.warehouse') }}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Warehouse </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg></div>
                        <div class="side-menu__title">
                            Transaksi
                            <div class="side-menu__sub-icon "><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-down" width="36" height="36"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ Route('inbound.get.home') }}" class="side-menu {{ (request()->is('inbound')) ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Inbound </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('transaction.ic.view.outbound')}}"
                                class="side-menu {{ Route::currentRouteName() == " transaction.ic.view.outbound"
                                ? "side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Outbound </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('transaction.ic.get.return.stock')}}"
                                class="side-menu {{ Route::currentRouteName() == " transaction.ic.get.return.stock"
                                ? "side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Return Stock </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route( 'warehouse.transfer.get.home' ) }}" class="side-menu {{ Route::currentRouteName() == 'warehouse.transfer.get.home'
                                ? " side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Warehouse Transfer </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-inbox.html" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path
                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd"
                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg> </div>
                        <div class="side-menu__title"> Recondition </div>
                    </a>
                </li>
                <li>
                    <a href="{{Route('stock.get.home')}}"
                        class="side-menu {{(request()->is('stock')) ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path
                                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                            </svg> </div>
                        <div class="side-menu__title"> Stock </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"
                        class="side-menu {{(request()->is('part')) || (request()->is('segment'))|| (request()->is('category')) || (request()->is('warehouse/master')) ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                <path
                                    d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                            </svg></div>
                        <div class="side-menu__title">
                            Master
                            <div class="side-menu__sub-icon "><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-down" width="21" height="21"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg> </div>
                        </div>
                    </a>
                    <ul
                        class="{{(request()->is('part')) || (request()->is('segment'))|| (request()->is('category')) || (request()->is('brand')) || (request()->is('warehouse/master')) ? 'side-menu__sub-open' : ''}}">
                        <li>
                            <a href="javascript:;" class="side-menu ">
                                <div class="side-menu__icon">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                        class="lucide lucide-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg> --}}
                                </div>
                                <div class="side-menu__title">
                                   Master Part
                                    <div class="side-menu__sub-icon transform ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                                            data-lucide="chevron-down" class="lucide lucide-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                          
                            <ul class="" >
                                <li>
                                    <a href="{{Route('part.view.home')}}" class="side-menu {{(request()->is('part')) ? "
                                        side-menu--active" : "" }}">
                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Part </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{Route('segment.index')}}" class="side-menu {{(request()->is('segment')) ? "
                                        side-menu--active" : "" }}">
                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Segment </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{Route('category.get.view')}}" class="side-menu {{(request()->is('category')) ? "
                                        side-menu--active" : "" }}">
                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Category </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{Route('brand.get.view')}}" class="side-menu {{(request()->is('brand')) ? "
                                        side-menu--active" : "" }}">
                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Brand </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      
                       
                       
                        <li>
                            <a href="{{Route('warehouse.get.view')}}"
                                class="side-menu {{(request()->is('warehouse')) ? " side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Warehouse </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{Route('user.get.view')}}" class="side-menu {{(request()->is('user')) ? "
                                side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> User </div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                {{-- /*
                *--------------------------------------------------------------------------
                * ROLE WAREHOUSE
                *--------------------------------------------------------------------------
                */ --}}

                @if (Auth::user()->role == "warehouse")
                <li>
                    <a href="{{ route('warehouse.get.dashboard') }}"
                        class="side-menu {{ Route::currentRouteName() == 'warehouse.get.dashboard' ? ' side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                height="21" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg> </div>
                        <div class="side-menu__title"> Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('warehouse.get.request') }}"
                        class="side-menu {{ Route::currentRouteName() == 'warehouse.get.request' ? ' side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-warehouse" width="21" height="21"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21v-13l9 -4l9 4v13"></path>
                                <path d="M13 13h4v8h-10v-6h6"></path>
                                <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                            </svg> </div>
                        <div class="side-menu__title"> Warehouse Approv</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('warehouse.get.return') }}"
                        class="side-menu {{ Route::currentRouteName() == 'warehouse.get.return' ? ' side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-transform" width="21" height="21"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 13v.875c0 3.383 2.686 6.125 6 6.125"></path>
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="18" cy="18" r="3"></circle>
                                <path d="M16 9l2 2l2 -2"></path>
                                <path d="M18 10v-.875c0 -3.383 -2.686 -6.125 -6 -6.125"></path>
                                <path d="M3 15l2 -2l2 2"></path>
                            </svg> </div>
                        <div class="side-menu__title"> Warehouse Return</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="box" data-lucide="box" class="lucide lucide-box">
                                <path
                                    d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Warehouse Transfer
                            <div class="side-menu__sub-icon transform rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                                    class="lucide lucide-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('warehouse.get.whtransfer') }}"
                                class="side-menu {{ Route::currentRouteName() == 'warehouse.get.whtransfer' ? ' side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-switch-horizontal" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="16 3 20 7 16 11"></polyline>
                                        <line x1="10" y1="7" x2="20" y2="7"></line>
                                        <polyline points="8 13 4 17 8 21"></polyline>
                                        <line x1="4" y1="17" x2="13" y2="17"></line>
                                    </svg> </div>
                                <div class="side-menu__title"> Warehouse Transfer</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('warehouse.get.recipient') }}"
                                class="side-menu {{ Route::currentRouteName() == 'warehouse.get.recipient' ? ' side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-switch-horizontal" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="16 3 20 7 16 11"></polyline>
                                        <line x1="10" y1="7" x2="20" y2="7"></line>
                                        <polyline points="8 13 4 17 8 21"></polyline>
                                        <line x1="4" y1="17" x2="13" y2="17"></line>
                                    </svg> </div>
                                <div class="side-menu__title"> Warehouse Transfer penerima</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu {{ (Route::currentRouteName() == 'inbound.get.giver') || (Route::currentRouteName() == 'inbound.get.giver.detail') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-import" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                <path d="M12 12l8 -4.5"></path>
                                <path d="M12 12v9"></path>
                                <path d="M12 12l-8 -4.5"></path>
                                <path d="M22 18h-7"></path>
                                <path d="M18 15l-3 3l3 3"></path>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Inbound
                            <div class="side-menu__sub-icon {{ (Route::currentRouteName() == 'inbound.get.giver') || (Route::currentRouteName() == 'inbound.get.giver.detail') ? 'transform rotate-180' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-down" width="21" height="21"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                        </div>
                    </a>
                    <ul class="{{ (Route::currentRouteName() == 'inbound.get.giver') || (Route::currentRouteName() == 'inbound.get.giver.detail') || (Route::currentRouteName() == 'inbound.get.recipient') ? 'side-menu__sub-open' : '' }}">
                        <li>
                            <a href="{{ Route('inbound.get.giver') }}" class="side-menu {{ (Route::currentRouteName() == 'inbound.get.giver') ? "side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Pengirim </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('inbound.get.recipient') }}" class="side-menu {{ (Route::currentRouteName() == 'inbound.get.recipient') ? "side-menu--active" : "" }}">
                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="side-menu__title"> Penerima </div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif


                {{-- /*
                *--------------------------------------------------------------------------
                * ROLE REQUESTER
                *--------------------------------------------------------------------------
                */ --}}

                @if (Auth::user()->role == "requester")
                <li>
                    <a href="{{ route('request.get.home') }}" class="side-menu {{ Route::currentRouteName() == '
                            warehouse.get.dashboard' ? " side-menu--active" : "" }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg> </div>
                        <div class="side-menu__title"> Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('mini.stock.get') }}" class="side-menu {{ Route::currentRouteName() == '
                            warehouse.get.dashboard' ? " side-menu--active" : "" }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            </svg> </div>
                        <div class="side-menu__title"> Mini Stock</div>
                    </a>
                </li>
                @endif





            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                @yield("breadcrumb")

                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent"
                            placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="search" data-lucide="search"
                            class="lucide lucide-search search__icon dark:text-slate-500">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <a class="notification sm:hidden" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="search" data-lucide="search"
                            class="lucide lucide-search notification__icon dark:text-slate-500">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="inbox"
                                            class="lucide lucide-inbox w-4 h-4" data-lucide="inbox">
                                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                            <path
                                                d="M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="users"
                                            class="lucide lucide-users w-4 h-4" data-lucide="users">
                                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 010 7.75"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">Users &amp; Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card"
                                            class="lucide lucide-credit-card w-4 h-4" data-lucide="credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                    </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="http://tinker-laravel.left4code.com/dist/images/profile-6.jpg">
                                    </div>
                                    <div class="ml-3">Arnold Schwarzenegger</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                        arnoldschwarzenegger@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="http://tinker-laravel.left4code.com/dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-3">Johnny Depp</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                        johnnydepp@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="http://tinker-laravel.left4code.com/dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-3">John Travolta</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                        johntravolta@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="http://tinker-laravel.left4code.com/dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-3">Johnny Depp</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                        johnnydepp@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="http://tinker-laravel.left4code.com/dist/images/preview-14.jpg">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="http://tinker-laravel.left4code.com/dist/images/preview-4.jpg">
                                </div>
                                <div class="ml-3">Apple MacBook Pro 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="http://tinker-laravel.left4code.com/dist/images/preview-12.jpg">
                                </div>
                                <div class="ml-3">Apple MacBook Pro 13</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="http://tinker-laravel.left4code.com/dist/images/preview-4.jpg">
                                </div>
                                <div class="ml-3">Nike Tanjun</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp; Outdoor
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                {{-- <div class="intro-x dropdown mr-auto sm:mr-6">
                    @if( count(auth()->user()->notifications->where('read_at', null)) < 1 )
                    <div class="dropdown-toggle notification cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="bell" data-lucide="bell"
                            class="lucide lucide-bell notification__icon dark:text-slate-500">
                            <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 01-3.46 0"></path>
                        </svg>
                    </div>
                    @else
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="bell" data-lucide="bell"
                            class="lucide lucide-bell notification__icon dark:text-slate-500">
                            <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 01-3.46 0"></path>
                        </svg>
                    </div>
                    @endif
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content overflow-y-scroll h-80 w-80" >
                            <div class="notification-content__title">Notifications</div>

                            @foreach (auth()->user()->notifications as $item)
                            <div class="cursor-pointer relative flex items-center mt-4">
                                <div class="flex-none image-fit mr-2 w-1/12">
                                    @if($item->read_at == null)
                                    <div
                                        class="w-2 h-2 bg-success object-center rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="w-11/12">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate">{{ isset($item->data["username"]) ? $item->data["username"] : ""  }}</a>
                                        <div class="text-xs text-slate-400 whitespace-nowrap ml-auto">{{ $item->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500">{{ isset($item->data["data"]) ? $item->data["data"] : ""  }}</div>
                                </div>
                                <div class="w-full truncate text-slate-500">{{ isset($item->data["data"]) ?
                                    $item->data["data"] : "" }}</div>
                            </div>
                            @endforeach

                            
                        </div>
                        @endforeach


                    </div>
                </div> --}}
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template"
                            src="http://tinker-laravel.left4code.com/dist/images/profile-15.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">{{Auth::user()->name}}</div>
                                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Backend Engineer</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="user" data-lucide="user"
                                        class="lucide lucide-user w-4 h-4 mr-2">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="edit" data-lucide="edit"
                                        class="lucide lucide-edit w-4 h-4 mr-2">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg> Add Account
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="lock" data-lucide="lock"
                                        class="lucide lucide-lock w-4 h-4 mr-2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0110 0v4"></path>
                                    </svg> Reset Password
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="help-circle" data-lucide="help-circle"
                                        class="lucide lucide-help-circle w-4 h-4 mr-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg> Help
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>

                            <form method="POST" class=" hover:bg-white/5" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="toggle-right" data-lucide="toggle-right"
                                        class="lucide lucide-toggle-right w-4 h-4 mr-2">
                                        <rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect>
                                        <circle cx="16" cy="12" r="3"></circle>
                                    </svg> Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if (Session('error'))
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                <path
                    d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                <path
                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
            </svg> <span class="ml-3"> {{ session('error') }} </span>
            <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </button>
        </div>
        @endif

        @yield("content")
    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    {{-- <div data-url="side-menu-dark-dashboard-overview-1.html"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div> --}}
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/whtransaction.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/master.js') }}" defer></script>

    @yield( "javaScript" )

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- {{ asset('js/main.js') }} --}}

    <!-- END: JS Assets-->
</body>

</html>


{{--
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    @viteReactRefresh
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @viteReactRefresh
    @vite('resources/css/app.css')

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}