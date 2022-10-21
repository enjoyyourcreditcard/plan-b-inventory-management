@extends('layouts.app') @section('content')

<div class="">
    <div class="row" style="margin: 0px">
        <div class="col-md-3" style="padding-right: 0px; padding-left: 0px">
            <div id="accordion">
             
                <div class="card">
                    <div id="headingTwo">
                        <li class="list-group-item list-group-item-sidebar ">
                            <a href="#"
                            data-toggle="collapse"
                            data-target="#collapsePart"
                            aria-expanded="false"
                            aria-controls="collapsePart"
                                class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                                <div class="nav-link">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                                    <b class="text-sidebar nav-link-title">Part</b>
                                </div>
                            </a>
                        </li>
                    </div>
                    <div
                        id="collapsePart"
                        class="collapse show"
                        aria-labelledby="headingTwo"
                        data-parent="#accordion"
                    >
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="  nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Latest Parts
                                </b>
                            </div>
                            <span class="badge badge-primary badge-pill">0</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Recently Updated
                                </b>
                            </div>
                            <span class="badge badge-primary badge-pill">0</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">0</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Expired Stock
                                </b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    </div>
                </div>


                <div class="card">
                    <div id="headingTwo">
                        <li class="list-group-item list-group-item-sidebar ">
                            <a href="#"
                            data-toggle="collapse"
                            data-target="#collapseStock"
                            aria-expanded="false"
                            aria-controls="collapseStock"
                                class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                                <div class="nav-link">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="2" y="13" width="8" height="8" rx="2"></rect>
                                            <path d="M6 13v3"></path>
                                            <rect x="8" y="3" width="8" height="8" rx="2"></rect>
                                            <path d="M12 3v3"></path>
                                            <rect x="14" y="13" width="8" height="8" rx="2"></rect>
                                            <path d="M18 13v3"></path>
                                         </svg>
                                    </span>
                                    <b class="text-sidebar nav-link-title">Stock</b>
                                </div>
                            </a>
                        </li>
                    </div>
                    <div
                        id="collapseStock"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordion"
                    >
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    </div>
                </div>


                
                <div class="card">
                    <div id="headingTwo">
                        <li class="list-group-item list-group-item-sidebar " >
                            <a href="#"
                            data-toggle="collapse"
                            data-target="#collapseLogistic"
                            aria-expanded="false"
                            aria-controls="collapseLogistic"
                                class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                                <div class="nav-link">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="17" cy="17" r="2"></circle>
                                            <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                         </svg>
                                    </span>
                                    <b class="text-sidebar nav-link-title">Logistik</b>
                                </div>
                            </a>
                        </li>
                    </div>
                    <div
                        id="collapseLogistic"
                        class="collapse"
                        aria-labelledby="headingTwo"
                        data-parent="#accordion"
                    >
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    <li class="list-group-item list-group-item-sidebar " style="border-top:1px solid #E6E7E9">
                        <a href="#"
                            class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                            <div class="nav-link" style="padding-left:27px">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                    </svg>
                                </span>
                                <b class="text-sidebar nav-link-title">Low Stock</b>
                            </div>
                            <span class="badge badge-primary badge-pill">14</span>
                        </a>
    
                    </li>
                    </div>
                </div>

            </div>
            

            <!-- <ul class="list-group bg-white">
                <li class="list-group-item list-group-item-sidebar d-flex justify-content-between align-items-center">
                    <b>PART</b>
                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Subscribed Categories</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">BOM Waiting Validation</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Latest Parts</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Recently Updated</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Low Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Depleted Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Required for Build Orders</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Expired Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Stale Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>


                <li class="list-group-item list-group-item-sidebar d-flex justify-content-between align-items-center">
                    <b>PART</b>
                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Subscribed Categories</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">BOM Waiting Validation</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Latest Parts</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Recently Updated</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Low Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Depleted Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Required for Build Orders</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Expired Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>
                <li class="list-group-item list-group-item-sidebar ">
                    <a href="#"
                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                        <div class="nav-link">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <b class="text-sidebar nav-link-title">Stale Stock</b>
                        </div>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>

                </li>


            </ul> -->
        </div>
        <div class="col-md-9" style="padding-left: 0px">
            <div class="container">
                <div id="latest-part"></div>
            </div>
        </div>
    </div>
</div>
@endsection
