@extends('layouts.app') @section('content')
<div class="container-fluid">
  <div class="row " style="margin: 0px">
      <div class="col-md-4">
        <div id="inputRequestFormParent" class="card mb-3">
          <div class="card-header">
            <h3 class="card-title">Good Request Form</h3>
          </div>
          <div class="card-body">
            <form action="/request-form/{{ $whapprov->id }}" method="POST">
              @csrf
              <div class="form-group ">
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
                <input type="text" class="form-control" name="grf_code" value="{{ $whapprov->grf_code }}" style="cursor: pointer" disabled>
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
                  <select class="form-control inputWarehouseRequestFormSelect2" name="warehouse_id" required {{ $whapprov->status == 'submited' ? 'disabled' : null }}>
                    <option></option>
                      <option value="{{ $whapprov->warehouse_id }} " selected >{{ $whapprov->warehouse->name }}</option>
                  </select>
              </div>
              @if ($whapprov->status == 'draft')
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
          @if(count($whapprov->requestForms) > 0)
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
                  @if ($whapprov->status == 'draft')
                    <th></th>
                  @endif
                </tr>
              </thead>
              <tbody class="table-tbody">
                @foreach ($whapprov->requestForms as $item)
                <tr id="{{ $loop->iteration }}" class="request-form-row">
                  <td style="font-size: 12px ">
                    {{ $loop->iteration }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $item->part->im_code }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $item->part->name }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    #
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $item->quantity }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $item->part->uom }}
                  </td style="font-size: 12px ">
                  <td style="font-size: 12px ">
                    {{ $item->remarks }}
                  </td style="font-size: 12px ">
               
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
        {{-- <form action="/request-form/{{ $whapprov->id }}" class="card-footer" method="POST">
          @csrf
          @method('PUT')
          <div class="d-flex justify-content-end gap-3">
       
            <button class="btn btn-primary" {{ count($whapprov->requestForms) > 0 ? null : 'disabled' }}>
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
          </div>

        </form> --}}

        <form action="{{Route('post.approve.WH')}}" class="card-footer" method="POST">
          @csrf
          <div class="d-flex justify-content-end gap-3">
            <button class="btn btn-primary">
              <input type="hidden" name="id" value="{{$whapprov->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                <path d="M14 19l2 2l4 -4"></path>
                <path d="M9 8h4"></path>
                <path d="M9 12h2"></path>
             </svg>
              Submit Request
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
{{-- @extends('layouts.main') @section('content')
    <div class="">
        <div class="row" style="margin: 0px">
            
            <div class="container">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 25px">Detail WareHouse Check</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card-title">
                                    <h3>REQUEST INFO</h3>
                                </div>
                                <div class="mb-2 d-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                        <line x1="12" y1="12" x2="20" y2="7.5">
                                        </line>
                                        <line x1="12" y1="12" x2="12" y2="21">
                                        </line>
                                        <line x1="12" y1="12" x2="4" y2="7.5">
                                        </line>
                                    </svg>
                                    <p style="font-size: 15px">
                                        GRF CODE : <strong>{{ $whapprov->grf_code }}</strong>
                                    </p>
                                </div>
                                <div class="mb-2 d-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="9" y1="10" x2="9.01" y2="10"></line>
                                        <line x1="15" y1="10" x2="15.01" y2="10"></line>
                                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                    </svg>
                                    <p style="font-size: 15px">
                                        Requester Name : <strong>{{ $whapprov->user->name }}</strong>
                                    </p>
                                </div>
                                <div class="mb-2 d-flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-building-warehouse" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21v-13l9 -4l9 4v13"></path>
                                        <path d="M13 13h4v8h-10v-6h6"></path>
                                        <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                    </svg>
                                    <p style="font-size: 15px">
                                        WareHouse Location : <strong>{{ $whapprov->warehouse->wh_name }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                                <div>
                                    <div class="card mt-4">
                                        <div class="table-responsive">
                                            <table id="datatable"
                                                class="table card-table table-vcenter text-nowrap datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="col-1">Part Name</th>
                                                        <th class="col-1">Quantity</th>
                                                        <th class="col-1">Remarks</th>
                                                        <th class="col-1">SN Code</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <form action="/warehouse-approv" method="POST" id="save-sn">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="grf_code" value="{{ $whapprov->grf_code }}">
                                                        @foreach ($whapprov->requestForms as $item)
                                                            <input type="hidden" name="id[]" value="{{ $item->id }}">
                                                            <tr>
                                                                <td>{{ $item->part->name }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ $item->remarks }}</td>
                                                                <td>{{ $item->sncode }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="ms-auto my-3 mx-3">
                            <button class="btn btn-success " type="submit">
                                Import With Excel
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice mx-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                    <line x1="9" y1="7" x2="10" y2="7"></line>
                                    <line x1="9" y1="13" x2="15" y2="13"></line>
                                    <line x1="13" y1="17" x2="15" y2="17"></line>
                                 </svg>
                            </button>
                        </div>
                        <div class=" my-3 mx-3">
                            <button class="btn btn-primary " type="submit">
                                Ready
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-send mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
