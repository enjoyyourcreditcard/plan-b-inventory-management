{{-- @dd($grf->status == 'zz' ? '' : 'style="transform: scale(.50);"') --}}
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
            @if ($grf->status != 'draft')
            <div class="card-title mt-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circuit-switch-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M2 12h2"></path>
                <path d="M20 12h2"></path>
                <circle cx="6" cy="12" r="2"></circle>
                <circle cx="18" cy="12" r="2"></circle>
                <path d="M8 12h8"></path>
             </svg>&nbsp;
              Time Line :
            </div>
            <ul class="list list-timeline ">
              {{-- /*
              *|--------------------------------------------------------------------------
              *| Closed
              *|--------------------------------------------------------------------------
              */ --}}
              <li>
                <div class="list-timeline-icon" style="{{ $grf->status != 'return' ? 'transform: scale(.50);' : null  }}"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                  <!-- SVG icon code -->
                </div>
                <div class="list-timeline-content">
                  <div class="list-timeline-time">{{ $grf->return_date == null ? null : \Carbon\Carbon::parse($grf->return_date)->diffForHumans() }}</div>
                  <p class="list-timeline-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                      <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                      <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                    </svg>&nbsp;
                    Closed
                  </p>
                </div>
              </li>

              {{-- /*
              *|--------------------------------------------------------------------------
              *| Delivered
              *|--------------------------------------------------------------------------
              */ --}}
              <li>
                @if ($grf->status == 'user_pickup' or $grf->status == 'delivery_approved')
                <div class="list-timeline-icon"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                @else
                <div class="list-timeline-icon" style="transform: scale(.50);"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                @endIf
                  <!-- SVG icon code -->
                </div>
                <div class="list-timeline-content">
                  <div class="list-timeline-time">{{ $grf->delivery_approved_date == null ? null : \Carbon\Carbon::parse($grf->delivery_approved_date)->diffForHumans() }}</div>
                  <p class="list-timeline-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                      <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>&nbsp;
                    Delivered
                  </p>
                </div>
              </li>

              {{-- /*
              *|--------------------------------------------------------------------------
              *| On Progress
              *|--------------------------------------------------------------------------
              */ --}}
              <li>
                @if ($grf->status == 'ic_approved' or $grf->status == 'wh_approved')
                <div class="list-timeline-icon"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                @else
                <div class="list-timeline-icon" style="transform: scale(.50);"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                @endIf
                  <!-- SVG icon code -->
                </div>
                <div class="list-timeline-content">
                  <div class="list-timeline-time">{{ $grf->ic_approved_date == null ? null : \Carbon\Carbon::parse($grf->ic_approved_date)->diffForHumans() }}</div>
                  <p class="list-timeline-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                      <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>&nbsp;
                    On Progress Out!
                  </p>
                </div>
              </li>

              {{-- /*
              *|--------------------------------------------------------------------------
              *| New
              *|--------------------------------------------------------------------------
              */ --}}
              <li>
                <div class="list-timeline-icon" style="{{ $grf->status != 'submited' ? 'transform: scale(.50);' : null  }}"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                  <!-- SVG icon code -->
                </div>
                <div class="list-timeline-content">
                  <div class="list-timeline-time">{{ $grf->created_at->diffForHumans() }}</div>
                  <p class="list-timeline-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>&nbsp;
                    New
                  </p>
                </div>
              </li>
            </ul>
            @endIf
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