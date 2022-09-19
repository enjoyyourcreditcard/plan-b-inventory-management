@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card mb-2">
                <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        
                            <div class="card-body " style="height: auto">
                                {{-- <div class="card-title">
                                    <h2>Requester Info</h2>
                                </div> --}}
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
                                    <strong class="fs-3">
                                    Vendor : -
                                    </strong>
                                </div>
                                <div class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                     </svg>
                                    <strong class="fs-3">
                                    Name : {{Auth::user()->name}}
                                    </strong>
                                </div>

                                {{-- <div class="mb-2">
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
                                    Code : <strong></strong>
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
                                            class="text-primary"></a></strong>
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
                                    Creation Date : <strong></strong>
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
                                    Description : <strong></strong>
                                </div> --}}

                                
                            </div>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="card mb-3">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    {{-- <li class="nav-item" role="presentation">
                        <a href="#tabs-brand" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            ???</a>
                    </li> --}}

                    {{-- <li class="nav-item" role="presentation">
                        <a href="#tabs-lagi" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            ???</a>
                    </li> --}}
                </ul>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-brand" role="tabpanel">
                            {{-- <div id="parts"></div> --}}
                            <!-- Button trigger modal -->

                            <div class="row">
                                <div class="col-auto">
                                    @if($maxReq >= 3)   
                                    <a href="{{--LINK GRF FORM--}}" class="btn btn-primary mb-3 mt-3 disabled">
                                        Request Limit
                                    </a>
                                    @else
                                    <a href="{{--LINK GRF FORM--}}" class="btn btn-primary mb-3 mt-3" >
                                        Request
                                    </a>
                                    @endif
                                </div>

                                <div class="col-auto">
                                    <a href="{{--LINK EMERGENCY REQ--}}" class="btn btn-danger mb-3 mt-3">
                                        Emergency Request
                                    </a>
                                </div>
                            </div>
                           
                            

                            

                            {{-- {{count($requester->where('status', 'active')) <= 3 ? 'halo' : 'hai';}} --}}
                            <h4>Note: each Requester can only have a maximum of 3 GRF in one time</h4>
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-wrap datatable">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">GRF Code</th>                                             
                                                    <th>Name</th>                                               
                                                    <th colspan="3">Part</th>                                              
                                                    <th>GRF date</th>                                               
                                                    <th colspan="2">remarks</th>                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requester as $item)
                                                    <tr>
                                                        <th  class="text-nowrap">{{ $item->grf_code }}</th>
                                                        @if ($item->status == "active")
                                                            <td class="text-success">{{ $item->status }}</td>
                                                        @else
                                                            <td class="text-danger">{{ $item->status }}</td>
                                                        @endif
                                                        <td class="name text-capitalize">{{ $item->user->name }}</td>
                                                        <td>{{ $item->part->name }}</td>
                                                        <td>{{ $item->warehouse->wh_name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->created_at->diffForHumans()}}</td>
                                                        <td class="col-2">{{ $item->remarks }}</td>
                                                        <td>
                                                            <a href="{{--RETURN GOOD REQUEST--}}" class="text-dark btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-refund" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                                                                <path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="float-end me-3">
                                            {{ $requester->links() }}
                                        </div> --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection