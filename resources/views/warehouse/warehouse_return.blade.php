@extends('layouts.main') @section('content')
    <div class="">
        {{-- ! Container 1 --}}
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 25px">Detail WareHouse Return</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card-title">
                                        <h3>RETURN INFO</h3>
                                    </div>
                                    <div class="mb-2 d-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
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
                                            GRF CODE : <br> <strong>{{ $whreturn->grf_code }}</strong>
                                        </p>
                                    </div>
                                    <div class="mb-2 d-flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-mood-smile" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="9" y1="10" x2="9.01" y2="10"></line>
                                            <line x1="15" y1="10" x2="15.01" y2="10"></line>
                                            <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                        </svg>
                                        <p style="font-size: 15px">
                                            User Return Name : <br> <strong>{{ $whreturn->user->name }}</strong>
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
                                            WareHouse Location : <br> <strong>{{ $whreturn->warehouse->wh_name }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <form action="{{Route('post.approve.return.WH')}}" method="post" id="saveSn">
                            @csrf
                            <input type="hidden" name="id" value="{{$whreturn->id}}">
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
                                                            <th class="col">Part Name</th>
                                                            <th class="col">Ic Quantity</th>
                                                            <th class="col">Return Quantity</th>
                                                            <th class="col">SN Code</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <input type="hidden" name="grf_id" value="{{ $whreturn->id }}">
                                                            @foreach ($requestForm as $key => $item)
                                                                <tr>
                                                                    <td>{{ $item["name"] }}</td>
                                                                    <td>{{ $item["quantity"] }}</td>
                                                                    <td>{{$item["count"]}}</td>
                                                                    <td>
                                                                        {{-- <button class="btn btn-primary d-block w-100" type="button" data-bs-toggle="modal" data-bs-target="#uploadSnReturn">Upload SN</button> --}}
                                                                        <button class="upload-return btn btn-primary d-block w-100" type="button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#upload-return"
                                                                            data-partid="{{ $item['part_id'] }}"
                                                                            data-partname="{{ $item['name'] }}"
                                                                            data-grfid="{{ $whreturn->id }}"
                                                                            data-icquantity="{{ $item['quantity']}}">Upload SN</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </form>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="ms-auto my-3 mx-3">
                                <button class="btn btn-primary" type="submit">
                                    Submit
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send mx-2" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </tbody>

                        {{-- * alert validasi --}}
                        @if ($errors->has('file'))
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                        @endif
                        @if ($sukses = Session::get('sukses'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $sukses }}</strong>
                            </div>
                        @endif
                        {{-- * end alert validasi --}}
                        {{-- * modal option --}}
                        <div class="modal modal-blur fade" id="upload-return" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                    @endif
                                    <div>
                                        <div class="modal-body">
                                            <div class="modal-title">Upload Sn Code</div>
                                            <div>Pilih methode tambah data</div>
                                        </div>
                                        <div class="pb-3 px-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-success w-100"
                                                        data-toggle="modal" data-target="#importExcelReturn"
                                                        data-bs-dismiss="modal">Bulk</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary w-100"
                                                        data-toggle="modal" data-target="#inputSnReturn"
                                                        data-bs-dismiss="modal">Pieces</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- * end modal option --}}
                        {{-- ! modal excel --}}
                        <div class="modal modal-blur fade" id="importExcelReturn"  data-bs-backdrop="static" data-bs-keyboard="false"
                            @if ($errors->any()) <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div> @endif
                            <div tabindex="-1" role="dialog" aria-labelledby="importexcelReturn" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('importexcelreturn') }}" method="POST" id="formBulkReturn" enctype="multipart/form-data">
                                        @csrf
                                            <input id="input-bulk-grf-id" type="hidden" name="grf_id" value="">
                                            {{-- <input type="hidden" name="grf_id" value="{{ $whreturn->id }}"> --}}
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Select File</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input id="input-bulk-part-id" type="hidden" name="part_id" value="">
                                            <label id="input-bulk-part-name" class="form-label"></label>
                                            <input type="file" class="form-control mb-3" name="file" required="required">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- ! end modal excel --}}
                        
                        {{-- * modal input sn --}}
                        <div class="modal modal-blur fade" id="inputSnReturn" data-bs-backdrop="static" data-bs-keyboard="false">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div tabindex="-1" role="dialog" aria-labelledby="inputSnReturn" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/warehouse-return/{{ $whreturn->id }}" method="POST" id="formPiecesReturn">
                                            @csrf
                                            {{-- <input class="input-pieces-request-form-id" type="hidden" name="request_form_id" value="">
                                            <input type="hidden" name="grf_id" value="{{ $whreturn->id }}"> --}}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Input SN Code</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div id="input-pieces-return" class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- * end modal input sn --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection