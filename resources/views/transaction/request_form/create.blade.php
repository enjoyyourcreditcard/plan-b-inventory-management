@extends('layouts.main') @section('content')
<div class="container-fluid">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div id="inputRequestFormParent" class="card">
        <div class="card-header">
          <h3 class="card-title">Good Request Form</h3>
            </div>
        <form action="/request-form" method="POST">
          @csrf
          <input id="request-forms" type="hidden" data-request_forms="{{ json_encode($requestForms) }}">
          <div class="card-body">
            <div class="form-group mb-3 row">
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
              <div class="col-md-3">
                <input type="text" class="form-control bg-light text-muted" name="grf_code" value="{{ $requestForms[0]->grf_code }}" style="cursor: pointer" readonly>
              </div>
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
              <div class="col-md-3">
                <select class="form-control inputWarehouseRequestFormSelect2" name="warehouse_id" required>
                  <option></option>
                  @foreach ($warehouses as $warehouse)
                  @if ($requestForms->first()->warehouse_id == $warehouse->id)
                  <option value="{{ $warehouse->id }}" selected>{{ $warehouse->wh_name }}</option>
                  @else
                  <option value="{{ $warehouse->id }}">{{ $warehouse->wh_name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div id="table-default" class="table-responsive mb-3">
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-2">IM CODE</th>
                    <th class="col-3">MATERIAL DESCRIPTION</th>
                    <th class="col-2">MATERIAL BRAND</th>
                    <th class="col-1">QUANTITY REQUEST</th>
                    <th class="col-1">UOM</th>
                    <th class="col-2">REMARKS</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="inputRequestAppend" class="table-tbody">
                  <tr id="0z">
                    <td>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="text" class="form-control" value="{{ isset($requestForms->first()->part->im_code) == true ? $requestForms->first()->part->im_code : null }}" disabled>
                    </td>
                    <td>
                      <select class="form-control inputPartRequestFormSelect2 partOnChange" name="part_id[]" required>
                        <option></option>
                        @foreach ($parts as $part)
                        <option value="{{ $part->id }}">{{ $part->name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select class="form-control inputBrandRequestFormSelect2" name="brand_id[]" required>
                        <option></option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="number" name="quantity[]" class="form-control" value="{{ $requestForms->first()->quantity != null ? $requestForms->first()->quantity : 1 }}" min="1" required>
                    </td>
                    <td>
                      <input type="text" class="form-control" value="{{ $requestForms->first()->quantity != null ? $requestForms->first()->part->uom : null }}" disabled>
                    </td>
                    <td>
                      <textarea class="form-control" name="remarks[]" rows="1" placeholder="Note..">{{ $requestForms->first()->remarks != null ? $requestForms->first()->remarks : null }}</textarea>
                    </td>
                    <td class="text-center">
                      <a class="btn" id="request-form-append-new">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>&nbsp;
                        <span class="text-muted">row</span>
                      </a>
                    </td>
                  </tr>
                  @if (count($requestForms) > 1)
                  @for ($i = 1; $i < count($requestForms); $i++)
                  <tr id="{{ $i }}z">
                      <td class="sort-im-code"><input type="text" class="form-control" value="{{ $requestForms[$i]->part->im_code }}" disabled></td>
                      <td class="sort-material"><select class="form-control inputPartRequestFormSelect2 partOnChange"
                              name="part_id[]" required>
                              <option></option>
                              @foreach ($parts as $part)
                              <option value="{{ $part->id }}">{{ $part->name }}</option>
                              @endforeach
                          </select></td>
                      <td class="sort-material"><select class="form-control inputBrandRequestFormSelect2"
                              name="brand_id[]" required>
                              <option></option>
                              @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                              @endforeach
                          </select></td>
                      <td class="sort-quantity"><input type="number" name="quantity[]" class="form-control" value="{{ $requestForms[$i]->quantity }}"
                              min="1" required></td>
                      <td class="sort-uom"><input type="text" class="form-control" value="{{ $requestForms[$i]->part->uom}}" disabled></td>
                      <td class="sort-remark"><textarea class="form-control" name="remarks[]" rows="1"
                              placeholder="Note..">{{ $requestForms[$i]->remarks}}</textarea></td>
                      <td class="text-center"><button class="btn request-form-delete" data-id="{{ $i }}z"><svg
                                  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-auto"
                                  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <line x1="4" y1="7" x2="20" y2="7"></line>
                                  <line x1="10" y1="11" x2="10" y2="17"></line>
                                  <line x1="14" y1="11" x2="14" y2="17"></line>
                                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                              </svg></button></td>
                  </tr>
                  @endfor
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection