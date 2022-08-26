@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title" style="font-size:18px">PinHeader_1x09x1.27mm</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset("/demo/part_images/1551mini-photo.thumbnail.jpg")}}"
                                class="rounded mx-auto d-block border" height="235px" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body " style="height: 232px">
                                    <div class="card-title d-flex justify-content-between">
                                        <h3>PART INFO</h3>
                                        <button class="btn px-2" data-bs-toggle="modal" data-bs-target="#editPartModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                        </button>
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
                                        Name : <strong>PinHeader_1x09x1.27mm
                                        </strong>
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
                                        Category: <strong><a href="#" class="text-primary">Electronics/Connectors/Pin
                                                Headers</a></strong>
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
                                        Creation Date : <strong>2022-07-14</strong>
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
                                        Description : <strong>Male pin header connector, 1 rows, 9 positions, 1.27mm
                                            pitch, vertical</strong>
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
                    <li class="nav-item" role="presentation">
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
                    </li>

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
                        <a href="#tabs-hp" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5">
                                </path>
                            </svg>
                            &nbsp;History Price</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                            {{-- <div>
                                <a href="#" class="btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    New Part
                                </a>
                            </div> --}}
                            <div id="detail-part"></div>

                        </div>
                        <div class="tab-pane" id="tabs-profile-12" role="tabpanel">
                            <!-- <div id="part_category"></div> -->
                            {{-- <div id="parts"></div> --}}



                        </div>
                        <div class="tab-pane" id="tabs-attachments" role="tabpanel">
                            {{-- <div id="parts"></div> --}}

                            <!-- <div id="part_category"></div> -->
                        </div>
                        <div class="tab-pane" id="tabs-hp" role="tabpanel">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-team">
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
                                                {{-- @foreach ($historyprices as $hp) --}}
                                                {{-- <tr> --}}
                                                    {{-- <td>{{ $hp->part_id }}</td> --}}
                                                    {{-- <td>Rp.{{ $hp->price }}</td>   --}}
                                                    {{-- <td>{{ $hp->created_at->format('j F, Y') }}</td>   --}}
                                                    {{-- <td>{{ $hp->updated_at->format('j F, Y') }}</td> --}}
                                                {{-- </tr> --}}
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                        <div class="float-end me-3">
                                            {{-- {{ $historyprices->links() }} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add a new price</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            {{-- <form action="{{ url('/detail/part') }}" method="post"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <div class="modal-body">
                                    <div class="mb-3">
                                      {{-- <label for="partId" class="form-label">Part ID</label> --}}
                                      {{-- <input type="hidden" class="form-control" name="part_id" value="{{ $part_id }}"> --}}
                                      {{-- @error('part_id')
                                      <div class="text-warning">{{ $message }}</div>
                                      @enderror --}}
                                    </div>
                                    <div class="mb-3">
                                      <label for="price" class="form-label">Price</label>
                                      <input type="number" class="form-control" name="price" required >
                                      {{-- @error('price') --}}
                                      {{-- <div class="text-warning">{{ $message }}</div> --}}
                                      {{-- @enderror --}}
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
            </div>

        </div>
    </div>
</div>

{{-- Edit Part Modal --}}
<div class="modal modal-blur fade" id="editPartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/part/{{ $part->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="partName" class="form-label">Part Name</label>
                            <input type="text" class="form-control" id="partName" name="name" value="{{ $part->name }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partCategory" class="form-label">Category</label>
                            <select class="form-select" id="partCategory" name="category_id">

                                @foreach ($categories as $category)
                                    @if ($part->category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach

                                {{-- <option value="{{ $part->category->id }}" selected>{{ $part->category->name }}</option>
                                <option value="1" selected>Mechanical/Enclosures</option>
                                <option value="2">Electronics/Connectors/Pin Headers</option> --}}
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partBrand" class="form-label">Brand</label>
                            <select class="form-select" id="partBrand" name="brand" required>
                                <option value="3M" {{ $part->brand == 'M3' ? 'selected' : '' }}>3M</option>
                                <option value="ZTE" {{ $part->brand == 'ZTE' ? 'selected' : '' }}>ZTE</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partUom" class="form-label">Uom</label>
                            <select class="form-select" id="partUom" name="uom" required>
                                <option value="meter" {{ $part->uom == 'meter' ? 'selected' : '' }}>Meter</option>
                                <option value="set" {{ $part->uom == 'set' ? 'selected' : '' }}>Set</option>
                                <option value="each" {{ $part->uom == 'each' ? 'selected' : '' }}>Each</option>
                                <option value="roll" {{ $part->uom == 'roll' ? 'selected' : '' }}>Roll</option>
                                <option value="unit" {{ $part->uom == 'unit' ? 'selected' : '' }}>Unit</option>
                                <option value="batang" {{ $part->uom == 'batang' ? 'selected' : '' }}>Batang</option>
                                <option value="liter" {{ $part->uom == 'liter' ? 'selected' : '' }}>Liter</option>
                                <option value="kaleng" {{ $part->uom == 'kaleng' ? 'selected' : '' }}>Kaleng</option>
                                <option value="kg" {{ $part->uom == 'kg' ? 'selected' : '' }}>Kg</option>
                                <option value="kubic" {{ $part->uom == 'kubic' ? 'selected' : '' }}>Kubic</option>
                                <option value="pack" {{ $part->uom == 'pack' ? 'selected' : '' }}>Pack</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partSnStatus" class="form-label">SN Status</label>
                            <select class="form-select" id="partSnStatus" name="sn_status" required>
                                <option value="non sn" {{ $part->sn_status == 'non sn' ? 'selected' : '' }}>NON SN</option>
                                <option value="sn" {{ $part->sn_status == 'sn' ? 'selected' : '' }}>SN</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partColor" class="form-label">Color</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="color" value="{{ $part->color }}">
                            <datalist id="datalistOptions">
                                <option value="Black">
                                <option value="White">
                                <option value="Grey">
                                <option value="Green">
                                <option value="Yellow">
                                <option value="NN">
                                <option value="Blue">
                                <option value="Silver">
                                <option value="Multi Color">
                                <option value="Red">
                                <option value="Orange">
                            </datalist>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partSize" class="form-label">Size</label>
                            <input type="number" class="form-control" id="partSize" name="size" required value="{{ $part->size }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="partDescription" rows="3" name="description">{{ $part->description }}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partNote" class="form-label">Note</label>
                            <textarea class="form-control" id="partNote" rows="2" name="note">{{ $part->note }}</textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partImage" class="form-label">Part Image</label>
                            <input class="form-control" type="file" id="partImage" name="img" accept="image/*">
                            <input type="hidden" name="oldImg" value="{{ $part->img }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end mt-5">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

