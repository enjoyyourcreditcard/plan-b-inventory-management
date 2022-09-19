@extends('layouts.main') @section('content')
<div class="">

    <div class="row" style="margin: 0px">
        <div class="container">

            {{-- *
            *|--------------------------------------------------------------------------
            *| Inactive Component
            *|--------------------------------------------------------------------------
            *--}}
            @if ($part->status === "inactive")
            <div class="card card-md mb-3">
                <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe illum sequi dolor, illo
                                temporibus doloribus, obcaecati eligendi dolores modi atque facilis praesentium ad ipsa
                                beatae? Veritatis ipsa praesentium minus omnis.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            {{-- *
            *|--------------------------------------------------------------------------
            *| Part Detail Component
            *|--------------------------------------------------------------------------
            *--}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title" style="font-size:18px">{{$part->name}}</h3>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                        </path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>

                                    Edit
                                </a>
                                <a class="dropdown-item" href="{{Route('post.deactive.part',$part->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
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
                            <img src="{{asset($part->img)}}" class="rounded mx-auto d-block border" height="235px"
                                alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body " style="height: 232px">
                                    <div class="card-title">
                                        <h3>PART INFO</h3>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                        </svg>
                                        Name : <strong>{{$part->name}}
                                        </strong>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-palette" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25">
                                            </path>
                                            <circle cx="7.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                            <circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
                                            <circle cx="16.5" cy="10.5" r=".5" fill="currentColor"></circle>
                                        </svg>
                                        Color : <strong>{{$part->color}}</strong>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-sitemap" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="15" width="6" height="6" rx="2"></rect>
                                            <rect x="15" y="15" width="6" height="6" rx="2"></rect>
                                            <rect x="9" y="3" width="6" height="6" rx="2"></rect>
                                            <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                                            <line x1="12" y1="9" x2="12" y2="12"></line>
                                        </svg>
                                        Category: <strong><a href="#"
                                                class="text-primary">{{$part->category->name}}</a></strong>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                            <line x1="16" y1="3" x2="16" y2="7"></line>
                                            <line x1="8" y1="3" x2="8" y2="7"></line>
                                            <line x1="4" y1="11" x2="20" y2="11"></line>
                                            <rect x="8" y="15" width="2" height="2"></rect>
                                        </svg>
                                        Creation Date : <strong>{{$part->created_at->format('d-m-Y')}}</strong>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-info-circle" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                        </svg>
                                        Description : <strong>{{$part->description}}</strong>
                                    </div>

                                    {{-- <div class="mb-2">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="11" r="3"></circle>
                                            <path
                                                d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                            </path>
                                        </svg>
                                        From: <strong><span class="flag flag-country-si"></span>
                                            Slovenia</strong>
                                    </div>
                                    <div class="mb-2">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                            <line x1="16" y1="3" x2="16" y2="7"></line>
                                            <line x1="8" y1="3" x2="8" y2="7"></line>
                                            <line x1="4" y1="11" x2="20" y2="11"></line>
                                            <line x1="11" y1="15" x2="12" y2="15"></line>
                                            <line x1="12" y1="15" x2="12" y2="18"></line>
                                        </svg>
                                        Birth date: <strong>13/01/1985</strong>
                                    </div> --}}
                                    {{-- <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <polyline points="12 7 12 12 15 15"></polyline>
                                        </svg>
                                        Time zone: <strong>Europe/Ljubljana</strong>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-package" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
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
                                                <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
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
                            {{-- <div class="card card-sm mt-1">
                                <div class="card-body">
                                    <button class="btn btn-warning">Update</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-home-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                            </svg>
                            &nbsp;STOCK</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-12" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers-subtract"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="8" y="4" width="12" height="12" rx="2"></rect>
                                <path d="M16 16v2a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h2"></path>
                            </svg>
                            &nbsp;used in</a>
                    </li> --}}

                    <li class="nav-item" role="presentation">
                        <a href="#tabs-attachments" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5">
                                </path>
                            </svg>
                            &nbsp;Attachments</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-hp" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                            tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-businessplan"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab Stock
                        *|--------------------------------------------------------------------------
                        *--}}
                        <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                            <div>
                                <div class="pt-3 ">
                                    <div class="d-flex">
                                        <div> <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#selectStockModal">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                                    </svg></span></div>
                                        </div>
                                        <div class="px-1"></div>
                                        <div class="btn-group h-25 "><button type="button"
                                                class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-filter" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                    class="icon icon-tabler icon-tabler-adjustments" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Name</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Description</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Category</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Brand</button><button
                                                    class="dropdown-item" href="#"><input type="checkbox"
                                                        title="Toggle Column Visible" checked=""
                                                        style="cursor: pointer;">&nbsp; Stock</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabel-horizontal-scroll">
                                    <table role="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr role="row">
                                                {{-- <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                style="cursor: pointer;"><b>Part Name</b><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="6 15 12 9 18 15"></polyline>
                                                </svg></th> --}}
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>SN Code</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Warehouse ID</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                {{-- @if ($is_sn == true) --}}
                                                {{-- @endif --}}
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Condition</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Expired Date</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                {{-- <th class="w-1" colspan="1" role="columnheader"
                                                    title="Toggle SortBy" style="cursor: pointer;"><b>Stock
                                                        Status</b><svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th> --}}
                                                {{-- <th class="w-1" colspan="1" role="columnheader"
                                                    title="Toggle SortBy" style="cursor: pointer;"><b>Status</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Action</b></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            @foreach ($stocks as $stock)
                                            <tr role="row">

                                                {{-- @if($is_sn == true)
                                                <td role="cell">{{ $stock->sn_code }}</td>
                                                @endif --}}

                                                <td role="cell">{{ $is_sn  ?  "-" : $stock->sn_code }}</td>
                                                <td role="cell">{{ $stock->warehouse->name }}</td>
                                                <td role="cell">{{ $stock->condition }}</td>
                                                <td role="cell">{{ $stock->expired_date }}</td>
                                                {{-- <td role="cell">{{ $stock->stock_status }}</td> --}}
                                                {{-- <td role="cell">{{ $stock->status }}</td> --}}
                                                {{-- <td role="cell">
                                                    <form action="/stock/{{ $stock->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn border-0 float-start">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-trash"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class=" d-flex align-items-center">
                                    <p class="m-0 ">Showing <span>1</span> of <span>1</span> entries</p>
                                    <div class="pagination m-0 ms-auto">
                                        <div class="btn-group "><button disabled="" class="btn btn-outline-dark  "
                                                href="#" tabindex="-1" aria-disabled="true"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="15 6 9 12 15 18"></polyline>
                                                </svg>prev</button><button disabled="" class="btn btn-outline-dark"
                                                href="#">next<svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="9 6 15 12 9 18"></polyline>
                                                </svg></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab Attachment
                        *|--------------------------------------------------------------------------
                        *--}}
                        <div class="tab-pane" id="tabs-attachments" role="tabpanel">

                            <div class="col-12">
                                <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-attachment">
                                    New Attachment
                                </a>

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable"
                                            border="0.5">
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
                                                @foreach($attachment as $item)

                                                <tr>
                                                    <td><a href="{{asset ('file/'.$item->file)}}"
                                                            target="blank">{{$item->file}}</a></td>

                                                    <td>{{$item->comment}}</td>

                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                        <div class="float-end me-3">
                                            {{-- {{ $attachment->links() }} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- *
                        *|--------------------------------------------------------------------------
                        *| Tab History Price
                        *|--------------------------------------------------------------------------
                        *--}}
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
                                                    {{-- <th>Part_id</th> --}}
                                                    <th>Price</th>
                                                    <th>Created At</th>
                                                    {{-- <th>Updated At</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ($historyprices->count() === 0)
                                                <td>Tidak ada data</td>
                                                @else

                                                @foreach ($historyprices as $hp)
                                                <tr>
                                                    <td>{{ $hp->price }}</td>
                                                    <td>{{ $hp->created_at->format('j F, Y') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif

                                        </table>
                                        <div class="float-end me-3">
                                            {{ $historyprices->links() }}
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
</div>


{{-- *
*|--------------------------------------------------------------------------
*| Modal Edit Stock
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="editStockModal">
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
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Price
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modal-add-price" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("post.store.historyprice")}}" method="post">
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
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Attecment
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modal-add-attachment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route("post.store.attachment")}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="part_id" class="form-control" value="{{$part_id}}">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
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
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Edit Stock
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="EditPartModal">
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
                            <input type="text" class="form-control" id="partName" name="name" required
                                value="{{ $part->name }}">
                        </div>
                        <div class="mb-2">
                            <label for="editPartCategory" class="form-label">Category</label>
                            <select class="form-control select2EditPart" id="editPartCategory" name="category_id"
                                required>
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
                                @for ($i = 0; $i < count($brand['id']); $i++) @if ($part->brand_id == $brand['id'][$i])
                                    <option class="partBrandOption" value="{{ $brand['id'][$i] }}" selected>{{
                                        $brand['name'][$i] }}</option>
                                    @else
                                    <option class="partBrandOption" value="{{ $brand['id'][$i] }}">{{ $brand['name'][$i]
                                        }}</option>
                                    @endif
                                    @endfor
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="partUom" class="form-label">Uom</label>
                            <select class="form-select select2EditPart" id="partUom" name="uom" required>
                                @foreach ($uoms as $uom)
                                @if ($uom == $part->uom)
                                <option class="partUomOption" value="{{ $uom }}" selected>{{ $uom }}</option>
                                @else
                                <option class="partUomOption" value="{{ $uom }}">{{ $uom }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="partSnStatus" class="form-label">SN Status</label>
                            <select class="form-select select2EditPart" id="partSnStatus" name="sn_status" required>
                                <option value="non sn" {{ $part->sn_status == "non_sn" ? 'selected' : '' }}>NON SN
                                </option>
                                <option value="sn" {{ $part->sn_status == "sn" ? 'selected' : '' }}>SN</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="partColor" class="form-label">Color</label>
                            <select class="form-control select3EditPart" id="partColor" name="color" required>
                                <option value="Black" {{ $part->color == "Black" ? 'selected' : '' }}>Black</option>
                                <option value="White" {{ $part->color == "White" ? 'selected' : '' }}>White</option>
                                <option value="Grey" {{ $part->color == "Grey" ? 'selected' : '' }}>Grey</option>
                                <option value="Green" {{ $part->color == "Green" ? 'selected' : '' }}>Green</option>
                                <option value="Yellow" {{ $part->color == "Yellow" ? 'selected' : '' }}>Yellow</option>
                                <option value="NN" {{ $part->color == "NN" ? 'selected' : '' }}>NN</option>
                                <option value="Blue" {{ $part->color == "Blue" ? 'selected' : '' }}>Blue</option>
                                <option value="Silver" {{ $part->color == "Silver" ? 'selected' : '' }}>Silver</option>
                                <option value="Multi Color" {{ $part->color == "Multi Color" ? 'selected' : '' }}>Multi
                                    Color</option>
                                <option value="Red" {{ $part->color == "Red" ? 'selected' : '' }}>Red</option>
                                <option value="Orange" {{ $part->color == "Orange" ? 'selected' : '' }}>Orange</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="partSize" class="form-label">Size</label>
                            <input type="number" class="form-control" id="partSize" name="size" required
                                value="{{ $part->size }}">
                        </div>

                        <div class="mb-2">
                            <label for="partDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="partDescription" rows="3" name="description"
                                required>{{ $part->description }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="partNote" class="form-label">Note</label>
                            <textarea class="form-control" id="partNote" rows="2"
                                name="note">{{ $part->note }}</textarea>
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
</div>


{{-- *
*|--------------------------------------------------------------------------
*| Modal Select Stock
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="selectStockModal" tabindex="-1" role="dialog" aria-hidden="true">
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
</div>




{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Stock
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="createStockModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ Route('post.store.stock') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Stock</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf

                    <div class="mb-3">
                        <input type="hidden" name="part_id" value="{{$part_id}}" />
                        {{-- <select class="form-control" name="part_id" required>
                            @foreach ($parts as $part)
                            <option value="{{$part->id}}">{{$part->name}}</option>
                            @endforeach

                        </select> --}}
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
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection