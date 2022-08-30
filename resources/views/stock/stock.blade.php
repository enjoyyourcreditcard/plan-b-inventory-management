@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-stock-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                <line x1="10" y1="12" x2="14" y2="12"></line>
                            </svg>&nbsp;Stock</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-stock-12" role="tabpanel">
                            {{-- <div id="parts"></div> --}}
                            <div>
                                <div class="pt-3 ">
                                    <div class="d-flex">
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
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Part Name</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Warehouse</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
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
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Stock Status</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                                <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                    style="cursor: pointer;"><b>Status</b><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="6 15 12 9 18 15"></polyline>
                                                    </svg></th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            @foreach ($stocks as $stock)
                                            <tr role="row">
                                                <td role="cell">{{ $stock->part->name }}</td>
                                                <td role="cell">{{ $stock->wh_id }}</td>
                                                <td role="cell">{{ $stock->sn_code != null ? $stock->sn_code : '-' }}</td>
                                                <td role="cell">{{ $stock->condition }}</td>
                                                <td role="cell">{{ $stock->expired_date }}</td>
                                                <td role="cell">{{ $stock->stock_status }}</td>
                                                <td role="cell">{{ $stock->status }}</td>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
            {{-- <div id="parts"></div> --}}

        </div>
    </div>
</div>
@endsection
