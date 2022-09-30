{{-- @dd($miniStocks) --}}
@extends('layouts.main') @section('content')
<div class="container-fluid">
    <div class="row " style="margin: 0px">
        <div class="col-md-4">
            <div id="inputRequestFormParent" class="card mb-3 h-100">
                <div class="card-header">
                    <h3 class="card-title">Return Stock</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between mb-4">
                        <label class="col-md-auto text-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                                <circle cx="9" cy="10" r="2"></circle>
                                <line x1="15" y1="8" x2="17" y2="8"></line>
                                <line x1="15" y1="12" x2="17" y2="12"></line>
                                <line x1="7" y1="16" x2="17" y2="16"></line>
                            </svg>&nbsp;
                            GRF CODE :
                        </label>
                        <div class="col-md-auto">{{ $grf->grf_code }}</div>
                    </div>
                    <div class="row justify-content-between mb-4">
                        <label class="col-md-auto text-nowrap">
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
                        <div class="col-md-auto">{{ $grf->warehouse->name }}</div>
                    </div>
                    <div class="row mb-4 gap-3">
                        <label class="col-12 text-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <line x1="9" y1="9" x2="10" y2="9"></line>
                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                <line x1="9" y1="17" x2="15" y2="17"></line>
                            </svg>&nbsp;
                            Note :
                        </label>
                        <div class="col-12">
                            <input id="x" type="hidden" name="content">
                            <trix-editor input="x"></trix-editor>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card" id="inputReturnStockParent">
                <div class="card-header">
                    <h3 class="card-title">Stock List</h3>
                </div>
                <div class="card-body">
                    <form action="/return/{{ str_replace('/', '~', strtolower($grf->grf_code)) }}" method="post" id="return-stock-form">@csrf @method('put')</form>
                    <div id="table-default" class="table-responsive mb-3" style="height: 445px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-3">MATERIAL DESCRIPTION</th>
                                    <th class="col-2">SN CODE</th>
                                    <th class="col-2">MATERIAL BRAND</th>
                                    <th class="col-1">UOM</th>
                                    <th class="col-2">Status Condition</th>
                                    <th class="col-2">Note Pemakaian</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($miniStocks as $miniStock)
                                <tr id="{{ $loop->iteration }}" class="request-form-row">
                                    <td style="font-size: 12px ">
                                        {{ $miniStock->part->name }}
                                    </td>
                                    <td style="font-size: 12px ">
                                        <strong>{{ $miniStock->sn }}</strong>
                                    </td>
                                    <td style="font-size: 12px ">
                                        #
                                    </td>
                                    <td style="font-size: 12px ">
                                        {{ $miniStock->part->uom }}
                                    </td>
                                    <td style="font-size: 12px ">
                                        <input type="hidden" name="old_sn_code[]" value="{{ $miniStock->sn_code }}" form="return-stock-form">
                                        <select class="form-control inputReturnStockSelect2" form="return-stock-form" name="condition[]">
                                            <option></option>
                                            <option value="good">Good</option>
                                            <option value="not good">Not Good</option>
                                            <option value="replace">Replace</option>
                                            <option value="used">Used</option>
                                        </select>
                                        <br>
                                        <div class="return-stock-sncode-parent">
                                        </div>                              
                                    </td>
                                    <td style="font-size: 12px ">
                                        <input class="form-control" type="text" name="note[]" placeholder="note.." form="return-stock-form">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end gap-3">
                        <button type="submit" class="btn btn-outline-primary outline-button" form="return-stock-form">
                            submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
