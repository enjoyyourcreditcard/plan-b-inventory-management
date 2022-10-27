@extends('layouts.main') 

@section('breadcrumb')



{{-- /* 
|--------------------------------------------------------------------------
|  Breadcrumb
|--------------------------------------------------------------------------
*/ --}}
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
        <li class="breadcrumb-item" aria-current="page">Outbound</li>
        <li class="breadcrumb-item" aria-current="page">Detail</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $grf->grf_code }}</li>
    </ol>
</nav>
@endsection

@section('content')



{{-- *
*|--------------------------------------------------------------------------
*| Modal Pieces or Bulk
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="piecesOrBulkModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Upload SN</div>
                <div>Pilih methode tambah data</div>
            </div>
            <div class="pb-3 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success me-auto w-100" data-toggle="modal"
                        data-target="#bulkSnModal" data-dismiss="modal">Bulk</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                            data-target="#piecesSnModal" data-dismiss="modal">Pieces</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Pieces
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="piecesSnModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="/warehouse-transfer/pieces/{{ $grf->id }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Input SN Code</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Bulk Excel
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="bulkSnModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/warehouse-transfer/bulk/{{ $grf->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Input SN Code</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="card-title">Excel</label>
                        <input type="file" class="form-control" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <div class="bulk-hidden"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Container
*|--------------------------------------------------------------------------
*--}}
<div class="container-fluid">
    <div class="row " style="margin: 0px">
        <div class="col-md-4">
            <div id="inputRequestFormParent" class="card mb-3 h-100">
                <div class="card-header">
                    <h3 class="card-title">Transfer Destination</h3>
                </div>
                <div class="card-body">
                    <form action="/warehouse-transfer/{{ $grf->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-1 col-form-label text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                    <circle cx="9" cy="10" r="2"></circle>
                                    <line x1="15" y1="8" x2="17" y2="8"></line>
                                    <line x1="15" y1="12" x2="17" y2="12"></line>
                                    <line x1="7" y1="16" x2="17" y2="16"></line>
                                </svg>&nbsp;
                                GRF CODE :
                            </label>
                            <input type="text" class="form-control" name="grf_code" value="{{ $grf->grf_code }}" style="cursor: pointer" disabled>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="form-group col-md">
                                <label class="col-md-1 col-form-label text-nowrap">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21v-13l9 -4l9 4v13"></path>
                                        <path d="M13 13h4v8h-10v-6h6"></path>
                                        <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                    </svg>&nbsp;
                                    Current :
                                </label>
                                <select class="form-control inputWarehouseRequestFormSelect2" name="warehouse_id" required {{ count($grf->transferForms) > 0 ? 'disabled' : null }}>
                                    <option></option>
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ $grf->warehouse_id == $warehouse->id ? 'selected' : null }}>{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-1 align-items-center justify-content-center d-none d-sm-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </div>
                            <div class="form-group col-md">
                                <label class="col-md-1 col-form-label text-nowrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="11" r="3"></circle>
                                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                    </svg>&nbsp;
                                    Destination :
                                </label>
                                <select class="form-control inputWarehouseRequestFormSelect2" name="warehouse_destination" required {{ count($grf->transferForms) > 0 ? 'disabled' : null }}>
                                    <option></option>
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->name }}" {{ $grf->warehouse_destination == $warehouse->name ? 'selected' : null }}>{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($grf->status == 'draft' && $grf->type != 'transfer gudang lama')
                        <hr>
                        <div class="form-group mb-3">
                            <label class="col-form-label">Material Description</label>
                            <select class="form-control inputPartRequestFormSelect2" name="part_id" required>
                                <option></option>
                                @foreach ($parts as $part)
                                <option value="{{ $part->id }}">{{ $part->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="col-form-label">Transfer Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="1" min="1" required>
                        </div>
                        <div class="form-group d-flex flex-column justify-content-end">
                            <button class="btn btn-primary" type="submit">Add to list</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">Stocks</h3>
                </div>
                <div class="card-body">
                    <div id="table-default" class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-2">IM CODE</th>
                                    <th class="col-2">SN CODE</th>
                                    <th class="col-3">MATERIAL DESCRIPTION</th>
                                    <th class="col-1">TRANSFER QUANTITY</th>
                                    <th class="col-1">UOM</th>
                                    @if ($grf->status == 'draft')
                                    <th class="col-1">ACTION</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @if (count($transferForms))
                                @foreach ($transferForms as $transferForm)
                                <tr class="request-form-row">
                                    <td>
                                        {{ $transferForm->part->im_code }}
                                    </td>
                                    <td>
                                        <span>{{ count($transferForm->transferStocks->where('sn', '!=', null)) }}&nbsp;</span>
                                        <span>/ {{ $transferForm->quantity }}</span>
                                    </td>
                                    <td>
                                        {{ $transferForm->part->name }}
                                    </td>
                                    <td>
                                        {{ $transferForm->quantity }}
                                    </td>
                                    <td>
                                        {{ $transferForm->part->uom }}
                                    </td>
                                    @if ($grf->status == 'draft')
                                    <td>
                                        <button type="button" class="btn btn-primary d-block w-100 mb-1 btn-input-sn" data-toggle="modal"
                                            data-target="#piecesOrBulkModal"
                                            data-transferformsid="{{ $transferForm->id }}"
                                            data-grfid="{{ $transferForm->grf_id }}"
                                            data-partid="{{ $transferForm->part_id }}"
                                            data-partname="{{ $transferForm->part->name }}"
                                            data-quantity="{{ $transferForm->quantity }}">
                                            Input SN
                                        </button>
                                        <form action="/warehouse-transfer/{{ $transferForm->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn d-block w-100 request-form-delete">Remove</button>
                                        </form>                    
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @else
                                <tr class="request-form-row">
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="/warehouse-transfer" class="card-footer" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="grf_id" value="{{ isset($transferForms->first()->grf) ? $transferForms->first()->grf_id : null }}">
                    <input type="hidden" name="warehouse_destination" value="{{ isset($transferForms->first()->grf) ? $transferForms->first()->grf->warehouse_destination : null }}">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="/warehouse-transfer" class="btn btn-outline-primary outline-button">
                            {{ $grf->status != 'draft' ? 'Back' : 'Draft' }}
                        </a>
                        @if ($grf->status == 'draft')
                        <button class="btn btn-primary" {{ count($transferForms) < 1 ? 'disabled' : null }}>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 7 12 12 7 17"></polyline>
                                <polyline points="13 7 18 12 13 17"></polyline>
                            </svg>
                            Ready to Transfer
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
