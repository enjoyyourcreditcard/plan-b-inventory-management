@section('title', 'Request Approve IC')

@extends('layouts.app')
@section('style')
<style>
    /* .select2-selection--single {
  height: 100% !important;
}
.select2-selection__rendered{
  word-wrap: break-word !important;
  text-overflow: inherit !important;
  white-space: normal !important;
} */
    .select2-container--bootstrap {
        width: 300px !important;
    }
</style>


@endsection
@section('content')
<div class="container-fluid">
    <div class="row " style="margin: 0px">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request List</h3>
                </div>
                <form action="{{Route('post.approve.IC')}}" class="card-footer" method="POST">
                    @csrf
                    <div class="card-body">

                        {{-- <div id="transaction-ic-form"
                            data-grfcode="{{str_replace('/', '~', strtolower($grf->grf_code))}}"></div> --}}

                        <p class="mb-0"><b> No. Grf: {{$grf->grf_code}}</b></p>
                        <p class=""><b>Created: {{$grf->created_at}}</b></p>
                        @if(count($requestForms) > 0)
                        <div id="table-default" class="table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th class="col-3">SEGMENT</th>
                                        <th class="col-3">PART </th>
                                        <th class="col-2">TOTAL ITEM</th>
                                        <th class="col-10">QUANTITY </th>
                                        <th class="col-2">Action</th>
                                        @if ($grf->status == 'draft')
                                        <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($requestForms as $requestForm)
                                    <input type="hidden" name="segment_id[]" value="{{$requestForm->segment_id}}">

                                    <tr id="{{ $loop->iteration }}" class="request-form-row">
                                        <td style="font-size: 12px ">
                                            {{ $loop->iteration }}
                                        </td style="font-size: 12px ">

                                        <td style="font-size: 12px ">
                                            {{ $requestForm->segment->name }}
                                        </td style="font-size: 12px ">
                                        <td style="font-size: 12px; ">
                                            <div id="selectICApprove_{{$loop->iteration}}">
                                                <select name="part[]" class="editPartGRF" required>
                                                    <option value="" style="width: 100%"> -- Select Part -- </option>
                                                    @foreach ($parts_segment[$loop->iteration -1] as $item)
                                                    <option value="{{ $item->id }}" style="width: 100%">{{ $item->name
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button style="background: none!important;
                                            border: none;
                                            padding: 0!important;
                                            font-family: arial, sans-serif;
                                            color: #069;
                                            text-decoration: underline;
                                            cursor: pointer;" class="mt-2" type="button"
                                                onclick="addSelectICApprove({{$loop->iteration}},{{$requestForm->quantity}})">Tambah
                                                data
                                                +</button>
                                        </td style="font-size: 12px ">
                                        <td style="font-size: 12px ">
                                            <p>{{$requestForm->quantity}}</p>
                                        </td style="font-size: 12px ">
                                        <td style="font-size: 12px ">
                                            <div class="row" id="alert_{{$loop->iteration}}">
                                                <div class="col-md-6">
                                                    <div id="quantityICApprove_{{$loop->iteration}}">

                                                        <input type="number"
                                                            class="form-control quantity_{{$loop->iteration}}"
                                                            name="quantity[]" value="{{ $requestForm->quantity }}"
                                                            onkeyup="changeQtyIC({{$loop->iteration}},{{$requestForm->quantity}})">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    Total : <span
                                                        id="qty_input_{{$loop->iteration}}">{{$requestForm->quantity}}</span>
                                                </div>
                                            </div>
                                        </td style="font-size: 12px ">
                                        <td class="text-center">
                                            <a href="{{ Route('requester.get.delete.item',$requestForm->id) }}"
                                                class="btn request-form-delete">
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
                                            </a>

                                        </td>
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

                    <div class="d-flex justify-content-end gap-3">
                        <button type="submit" id="button_submit" class="btn btn-primary" {{ count($requestForms)> 0 ?
                            null : 'disabled' }}>
                            <input type="hidden" name="id" value="{{$grf->id}}">
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
                        {{-- <a href="#" class="btn btn-primary" {{ count($requestForms)> 0 ? null : 'disabled' }}
                            data-bs-toggle="modal" data-bs-target="#modal-danger">
                            <input type="hidden" name="id" value="{{$grf->id}}">
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
                        </a> --}}
                    </div>
            </div>
            </form>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Available Stock</h3>
                </div>
                <div class="card-body">
                    {{-- {{$grf->code}} --}}
                    <div id="transaction-stock-sidebar"
                        data-grfcode="{{str_replace('/', '~', strtolower($grf->grf_code))}}"></div>

                </div>
                <form action="/request-form/{{ $grf->id }}" class="card-footer" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-end gap-3">

                        {{-- @if ($grf->status == 'draft')
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
                        @endif --}}
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection