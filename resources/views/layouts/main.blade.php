<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',"Home") - Inventory Management</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- CSS files -->
    <link href="{{asset('assets/css/tabler.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/tabler-flags.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/tabler-payments.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/tabler-vendors.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/demo.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" />
    {{-- Trix --}}
    <link rel="stylesheet" type="text/css" href="/assets/libs/trix/trix.css">
    <script type="text/javascript" src="/assets/libs/trix/trix.js"></script>
    {{-- mapbox --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript">
    </script>
    <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script>

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>

    <style>
        #mapid {
            z-index: 0;
            display: block;
            width: 100%;
            height: 400px;
        }

        .select2-selection.select2-selection--single {
            height: 36px;
            border: 1px solid gainsboro;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        trix-editor {
            height: 200px !important;
        }

        .modal-backdrop.show:nth-of-type(even) {
            z-index: 1051 !important;
        }
    </style>


    @yield("style")

<body
    style="background-image: url(IM_PATTERN_035.png);background-size: auto;background-repeat:repeat;  background-size: cover;">
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container container-header">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    {{-- <a href=".">
                        <img src="https://ik.imagekit.io/jh2scbhjww/My_project-1__2__WUSPB2Vkq.png?ik-sdk-version=javascript-1.4.3&updatedAt=1661695688387"
                            alt="Tabler" class="navbar-brand-image">
                    </a> --}}
                </h1>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="d-none d-md-flex">

                        <div class="nav-item dropdown d-none d-md-flex me-3">

                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                                    </path>
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                </svg>
                                {{-- <span class="badge bg-red"></span> --}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">

                                    <div class="card-header">
                                        <a class="card-title" href="{{Route ('get.index.notif')}}">Last updates</a>
                                    </div>

                                    {{-- @foreach($notifications as $index => $row)
                                    <div class="list-group list-group-flush list-group-hoverable " style="width: 40vw;">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col text-truncate">
                                                    <<<<<<< HEAD <h4 class="text-body d-block">{{$row->title}}</h4>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            {{$row->content}}
                                                        </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="/delete/{{$row->id}}" class="list-group-item-actions show">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-report-off" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2">
                                                            </path>
                                                            <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                                                            <path d="M3 3l18 18"></path>
                                                        </svg>
                                                        =======
                                                        <h4 class="text-body d-block">{{$row->title}}</h4>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            {{$row->content}}
                                                        </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="/delete/{{$row->id}}" class="list-group-item-actions show">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-report-off" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2">
                                                            </path>
                                                            <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                                                            <path d="M3 3l18 18"></path>
                                                        </svg>
                                                        >>>>>>> origin/user_friendly_modal_part
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="/delete/{{$row->id}}" class="list-group-item-actions show">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-category-2" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 4h6v6h-6z"></path>
                                            <path d="M4 14h6v6h-6z"></path>
                                            <circle cx="17" cy="17" r="3"></circle>
                                            <circle cx="7" cy="7" r="3"></circle>
                                        </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            <b>Parts</b>
                                        </span>
                                    </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('stock*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/stock">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-packages" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <rect x="2" y="13" width="8" height="8" rx="2"></rect>
                                                    <path d="M6 13v3"></path>
                                                    <rect x="8" y="3" width="8" height="8" rx="2"></rect>
                                                    <path d="M12 3v3"></path>
                                                    <rect x="14" y="13" width="8" height="8" rx="2"></rect>
                                                    <path d="M18 13v3"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                <b>Stock</b>
                                            </span>
                                            {{-- <span class="badge badge-sm bg-red">2</span> --}}
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('transaction*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/transaction">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-receipt" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2">
                                                    </path>
                                                    <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                                                    <path d="M3 3l18 18"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                <b>Transaksi</b>
                                            </span>
                                            {{-- <span class="badge badge-sm bg-red">2</span> --}}
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item {{ Request::is('rekondisi*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/rekondisi">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-tool" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                <b>Rekondisi</b>
                                            </span>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item {{ Request::is('outbound*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/outbound">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-packge-export" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                                    <path d="M12 12l8 -4.5"></path>
                                                    <path d="M12 12v9"></path>
                                                    <path d="M12 12l-8 -4.5"></path>
                                                    <path d="M15 18h7"></path>
                                                    <path d="M19 15l3 3l-3 3"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                <b>Outbound</b>
                                            </span>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item {{ Request::is('logistik*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/logistik">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-report-off" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M5.576 5.595a1.994 1.994 0 0 0 -.576 1.405v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2m0 -4v-8a2 2 0 0 0 -2 -2h-2">
                                                    </path>
                                                    <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 1 1 0 4h-2"></path>
                                                    <path d="M3 3l18 18"></path>
                                                </svg>
                                                >>>>>>> origin/user_friendly_modal_part
                                        </a>
                                </div>
                            </div>
                        </div>
                        <<<<<<< HEAD=======>>>>>>> origin/user_friendly_modal_part
                    </div>
                    @endforeach --}}
                </div>
            </div>
    </div>
    </div>

    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm"
                style="background-image: url(https://avatars.dicebear.com/api/initials/{{Auth::user()->name}}.svg)"></span>
            <div class="d-none d-xl-block ps-2">
                <div>{{Auth::user()->name}}</div>
                <div class="mt-1 small text-muted">Inventory Control</div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="#" class="dropdown-item">Set status</a>
            <a href="#" class="dropdown-item">Profile &amp; account</a>
            <a href="#" class="dropdown-item">Feedback</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Settings</a>
            <form action="/api/logoutall" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>

        </div>
    </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
                    <a class="nav-link" href="/home">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Home</b>
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('part*') ? 'active' : '' }}">
                    <a class="nav-link" href="/part">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <circle cx="17" cy="17" r="3"></circle>
                                <circle cx="7" cy="7" r="3"></circle>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Parts</b>
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('stock*') ? 'active' : '' }}">
                    <a class="nav-link" href="/stock">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packages"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="2" y="13" width="8" height="8" rx="2"></rect>
                                <path d="M6 13v3"></path>
                                <rect x="8" y="3" width="8" height="8" rx="2"></rect>
                                <path d="M12 3v3"></path>
                                <rect x="14" y="13" width="8" height="8" rx="2"></rect>
                                <path d="M18 13v3"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Stock</b>
                        </span>
                        {{-- <span class="badge badge-sm bg-red">2</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::is('transaction*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{Route('view.IC.transaction')}}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Transaksi</b>
                        </span>
                        {{-- <span class="badge badge-sm bg-red">2</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::is('request-form*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{Route('requester.get.home')}}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Home Requester</b>
                        </span>
                        {{-- <span class="badge badge-sm bg-red">2</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ Request::is('rekondisi*') ? 'active' : '' }}">
                    <a class="nav-link" href="/rekondisi">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-recycle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 17l-2 2l2 2"></path>
                                <path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path>
                                <path d="M8.536 11l-.732 -2.732l-2.732 .732"></path>
                                <path d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024"></path>
                                <path d="M15.464 11l2.732 .732l.732 -2.732"></path>
                                <path d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976"></path>
                             </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Rekondisi</b>
                        </span>
                        {{-- <span class="badge badge-sm bg-red">2</span> --}}
                    </a>
                </li>
                {{-- <li class="nav-item {{ Request::is('outbound*') ? 'active' : '' }}">
                    <a class="nav-link" href="/outbound">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-export"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                <path d="M12 12l8 -4.5"></path>
                                <path d="M12 12v9"></path>
                                <path d="M12 12l-8 -4.5"></path>
                                <path d="M15 18h7"></path>
                                <path d="M19 15l3 3l-3 3"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>My Stock</b>
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item {{ Request::is('logistik*') ? 'active' : '' }}">
                    <a class="nav-link" href="/logistik">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="7" cy="17" r="2"></circle>
                                <circle cx="17" cy="17" r="2"></circle>
                                <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            <b>Logistik</b>
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Third
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./#">
                            First
                        </a>
                        <a class="dropdown-item" href="./#">
                            Second
                        </a>
                        <a class="dropdown-item" href="./#">
                            Third
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="./#">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Disabled
                        </span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
    </div>
    </header>

    <div class="page-wrapper">

        <div class="page-body" style="margin-left:20px;margin-right:20px ">
            @if (Session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                {{-- <button type="button" class="close btn btn-danger" data-dismiss="alert" aria-label="Close"> --}}
                    {{-- <span aria-hidden="true">&times;</span> --}}
                    {{-- </button> --}}
            </div>
            {{-- <p class="text-danger"></p> --}}
            @endif
            @yield("content")
        </div>
        <footer class="footer footer-transparent d-print-none">
            <div class="container ">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="./docs/index.html"
                                    class="link-secondary">Documentation</a></li>
                            {{-- <li class="list-inline-item"><a href="./license.html"
                                    class="link-secondary">License</a>
                            </li> --}}

                            {{-- <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary"
                                    rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon text-pink icon-filled icon-inline" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                    Sponsor
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    {{-- <div class="col-12 col-lg-auto mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2022
                                <a href="." class="link-secondary">Inventory Management</a>.
                                All rights reserved.
                            </li>

                        </ul>
                    </div> --}}
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    {{-- CDN input --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"
        integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('assets/js/tabler.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    @yield('additionalJs')
    {{-- <<<<<<< HEAD=======>>>>>>> origin/warehousemaps --}}
        @yield('jsModal')
</body>

</html>