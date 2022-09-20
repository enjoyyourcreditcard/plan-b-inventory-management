@extends('layouts.main') 
@section('style')
<style>
.select2-selection--single {
  height: 100% !important;
}
.select2-selection__rendered{
  word-wrap: break-word !important;
  text-overflow: inherit !important;
  white-space: normal !important;
}
</style>

@endsection
@section('content')
<div class="container-fluid">
    <div class="row " style="margin: 0px">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stock</h3>
                </div>
                <div class="card-body" >
                    @if(count($requestForms) > 0)
                    <div id="table-default" class="table-responsive mb-3">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th class="col-2"
                                        ><b style="font-weight: bold !important;">IM
                                            CODE</b></th>
                                    <th class="col-3"
                                        ><b style="font-weight: bold !important;">MATERIAL
                                            DESCRIPTION&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                                    <th class="col-2"
                                        ><b style="font-weight: bold !important;">MATERIAL
                                            BRAND</b></th>
                                    <th class="col-1"
                                        ><b style="font-weight: bold !important;">QUANTITY
                                        </b></th>

                                    {{-- <th class="col-2">REMARKS</th> --}}

                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($requestForms as $requestForm)
                                <tr id="{{ $loop->iteration }}" class="request-form-row">
                                    <td style="font-size: 12px;">
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

                                    @if ($grf->status == 'draft')
                                    <td class="text-center">
                                        <form action="/request-form/{{ $requestForm->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn request-form-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash mx-auto" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                  
                        @if ($grf->status == 'draft')
                        <button class="btn btn-primary" {{ count($requestForms)> 0 ? null : 'disabled' }}>
                            <input type="hidden" name="status" value="submited">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        <div class="col-md-7">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request List</h3>
                </div>
                <div class="card-body">
                    @if(count($requestForms) > 0)
                    <div id="table-default" class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-2">IM CODE</th>
                                    <th class="col-3">MATERIAL DESCRIPTION</th>
                                    <th class="col-2">MATERIAL BRAND</th>
                                    <th class="col-1">QUANTITY </th>

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
                                    <td style="font-size: 12px; ">
                                        <select name="part" class="editPartGRF">
                                            <option value="{{ $requestForm->part->id }}">{{ $requestForm->part->name }}</option>
                                        </select>
                                        
                                    </td style="font-size: 12px ">
                                    <td style="font-size: 12px ">
                                        <select name="brand" class="form-control">
                                            <option value="Huwawei">Huwawei</option>
                                        </select>
                                        </td style="font-size: 12px ">
                                    <td style="font-size: 12px ">
                                        <input type="number" class="form-control" value="{{ $requestForm->quantity }}"
                                        style="width: 160px">
                                        {{-- {{ $requestForm->quantity }} --}}
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
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash mx-auto" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                        <button class="btn btn-primary" {{ count($requestForms)> 0 ? null : 'disabled' }}>
                            <input type="hidden" name="status" value="submited">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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










{{-- 



@extends('layouts.main') 
@section('content')
<div class="container-fluid">
    <div class="row " style="margin: 0px">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stock</h3>
                </div>
                <div class="card-body" style="margin: 0px; padding:0px">
                    @if(count($requestForms) > 0)
                    <div id="table-default" class="table-responsive ">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th style="background-color: white; color:black;    ">#</th>
                                    <th class="col-2"
                                        style="background-color: white; color:black;    "><b style="font-weight: bold !important;">IM
                                            CODE</b></th>
                                    <th class="col-3"
                                        style="background-color: white; color:black;    "><b style="font-weight: bold !important;">MATERIAL
                                            DESCRIPTION&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                                    <th class="col-2"
                                        style="background-color: white; color:black;    "><b style="font-weight: bold !important;">MATERIAL
                                            BRAND</b></th>
                                    <th class="col-1"
                                        style="background-color: white; color:black;    "><b style="font-weight: bold !important;">QUANTITY
                                        </b></th>


                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($requestForms as $requestForm)
                                <tr id="{{ $loop->iteration }}" class="request-form-row">
                                    <td style="font-size: 12px;">
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

                                    @if ($grf->status == 'draft')
                                    <td class="text-center">
                                        <form action="/request-form/{{ $requestForm->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn request-form-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash mx-auto" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                  
                        @if ($grf->status == 'draft')
                        <button class="btn btn-primary" {{ count($requestForms)> 0 ? null : 'disabled' }}>
                            <input type="hidden" name="status" value="submited">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        <div class="col-md-7">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request List</h3>
                </div>
                <div class="card-body">
                    @if(count($requestForms) > 0)
                    <div id="table-default" class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-2">IM CODE</th>
                                    <th class="col-3">MATERIAL DESCRIPTION</th>
                                    <th class="col-2">MATERIAL BRAND</th>
                                    <th class="col-1">QUANTITY </th>

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
                                        <select name="brand" class="form-control">
                                            <option value="Huwawei">Huwawei</option>
                                        </select>
                                        </td style="font-size: 12px ">
                                    <td style="font-size: 12px ">
                                        <input type="number" class="form-control" value="{{ $requestForm->quantity }}"
                                        style="width: 160px">
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
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash mx-auto" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                  
                        @if ($grf->status == 'draft')
                        <button class="btn btn-primary" {{ count($requestForms)> 0 ? null : 'disabled' }}>
                            <input type="hidden" name="status" value="submited">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
@endsection --}}