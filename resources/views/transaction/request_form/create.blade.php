@extends('layouts.main') @section('content')
<div class="container-fluid">
  <div class="row " style="margin: 0px">
      <div class="col-md-4">
        <div id="inputRequestFormParent" class="card mb-3 h-100">
          <div class="card-header">
            <h3 class="card-title">Good Request Form</h3>
          </div>
          <div class="card-body">
            <form action="/request-form/{{ $grf->id }}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <label class="col-md-1 col-form-label text-nowrap">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
              <div class="form-group mb-3 row">
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
                  Warehouse :
                </label>
                  <select class="form-control inputWarehouseRequestFormSelect2" name="warehouse_id" required {{ $grf->status != 'draft' ? 'disabled' : null }}>
                    <option></option>
                    @foreach ($warehouses as $warehouse)
                      <option value="{{ $warehouse->id }}" {{$grf->warehouse_id == $warehouse->id ? "selected" : ""}}>{{ $warehouse->name }}</option>
                    @endforeach
                  </select>
              </div>
              @if ($grf->status == 'draft')
              <hr class="my-1">
              <div class="row mb-2">
                <div class="form-group ">
                  <label class="col-form-label">Material Description</label>
                  <select class="form-control inputPartRequestFormSelect2" name="part_id">
                    <option></option>
                    @foreach ($parts as $part)
                    <option value="{{ $part->id }}">{{ $part->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group ">
                  <label class="col-form-label">Material Brand</label>
                  <select class="form-control inputBrandRequestFormSelect2" name="brand_id">
                    <option></option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group ">
                  <label class="col-form-label">Quantity Request</label>
                  <input type="number" class="form-control" name="quantity" value="1" min="1">
                </div>
                <div class="form-group ">
                  <label class="col-form-label">Remarks</label>
                  <textarea class="form-control" name="remarks" rows="1" placeholder="note.."></textarea>
                </div>
                <div class="form-group mt-3  d-flex flex-column justify-content-end">
                  <button class="btn btn-primary" type="submit">Add to list</button>
                </div>
              </div>
              @endif
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Request List</h3>
        </div>
        <div class="card-body">
          @if(count($requestForms) > 0)
          <div id="table-default" class="table-responsive mb-3" style="height: 445px;">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="col-2">IM CODE</th>
                  <th class="col-3">MATERIAL DESCRIPTION</th>
                  <th class="col-2">MATERIAL BRAND</th>
                  <th class="col-1">QUANTITY </th>
                  <th class="col-1">UOM</th>
                  <th class="col-2">REMARKS</th>
                  @if ($grf->status == 'draft')
                    <th></th>
                  @endif
                </tr>
              </thead>
              <tbody class="table-tbody">
                @foreach ($requestForms as $requestForm)
                <tr id="{{ $loop->iteration }}" class="request-form-row">
                  <td style="font-size: 12px ">
                    {{ $loop->iteration }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $requestForm->part->im_code }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $requestForm->part->name }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    #
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $requestForm->quantity }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $requestForm->part->uom }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $requestForm->remarks }}
                  </td style="font-size: 12px ">
                  @if ($grf->status == 'draft')
                  <td class="text-center">
                    <form action="/request-form/{{ $requestForm->id }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn request-form-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-auto"
                          width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                          fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <line x1="4" y1="7" x2="20" y2="7"></line>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                      </button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div id="table-default" class="table-responsive mb-3">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="col-2">IM CODE</th>
                  <th class="col-3">MATERIAL DESCRIPTION</th>
                  <th class="col-2">MATERIAL BRAND</th>
                  <th class="col-1">QUANTITY REQUEST</th>
                  <th class="col-1">UOM</th>
                  <th class="col-2">REMARKS</th>
                </tr>
              </thead>
              <tbody class="table-tbody">
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
                  <td>
                    -
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          @endif
        </div>
        <form action="/request-form/{{ $grf->id }}" class="card-footer" method="POST">
          @csrf
          @method('PUT')
          <div class="d-flex justify-content-end gap-3">
            <a href="/request-form" class="btn btn-outline-primary outline-button">
              {{ $grf->status != 'draft' ? 'back' : 'Draft' }}
            </a>
            @if ($grf->status == 'draft')
            <button class="btn btn-primary" {{ count($requestForms) > 0 ? null : 'disabled' }}>
              <input type="hidden" name="status" value="submited">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                <path d="M14 19l2 2l4 -4"></path>
                <path d="M9 8h4"></path>
                <path d="M9 12h2"></path>
             </svg>
              Submit Request
            </button>
            @endif
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection