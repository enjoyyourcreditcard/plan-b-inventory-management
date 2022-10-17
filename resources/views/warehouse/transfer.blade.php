@extends('layouts.main') @section('content')
{{-- *
*|--------------------------------------------------------------------------
*| Modal 3 Opsi Transfer
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="3opsi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Pilih Jenis Transfer</div>
            </div>
            <div class="modal-body">
                <form action="/warehouse-transfer" method="POST">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="grf_code" value="{{ $grf_code }}">
                        <div class="col-md-4">
                            <button class="btn d-block w-100 text-center" type="submit" name="type" value="transfer rekondisi" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hammer m-0 mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M11.414 10l-7.383 7.418a2.091 2.091 0 0 0 0 2.967a2.11 2.11 0 0 0 2.976 0l7.407 -7.385"></path>
                                    <path d="M18.121 15.293l2.586 -2.586a1 1 0 0 0 0 -1.414l-7.586 -7.586a1 1 0 0 0 -1.414 0l-2.586 2.586a1 1 0 0 0 0 1.414l7.586 7.586a1 1 0 0 0 1.414 0z"></path>
                                 </svg>
                                <br>
                                Ke Rekondisi
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn d-block w-100 text-center" type="submit" name="type" value="transfer gudang baru">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-warehouse m-0 mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21v-13l9 -4l9 4v13"></path>
                                    <path d="M13 13h4v8h-10v-6h6"></path>
                                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                                 </svg>
                                <br>
                                Ke Gudang Baru
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn d-block w-100 text-center" type="submit" name="type" value="transfer gudang lama">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat m-0 mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                                    <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
                                 </svg>
                                <br>
                                Ke Gudang lama
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Container
*|--------------------------------------------------------------------------
*--}}
<div class="container-fluid">
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#tabs-transfer" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-loading" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15"></path>
                        <rect x="9" y="6" width="10" height="8" rx="3"></rect>
                        <circle cx="9" cy="19" r="2"></circle>
                        <circle cx="18" cy="19" r="2"></circle>
                    </svg>&nbsp;
                    Warehouse Transfer</a>
            </li>
            <li class="nav-item" role="presentation">
                <a type="button" class="nav-link text-dark btn-input-sn" data-toggle="modal" data-target="#3opsi">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>&nbsp;
                    New Transfer
                </a>
            </li>
        </ul>
        <div class="card-body border border-top-0" style="background: #f5f7fb">
            <div class="tab-content">

                {{-- *
                *|--------------------------------------------------------------------------
                *| Tab Transfer
                *|--------------------------------------------------------------------------
                *--}}
                @if (count($requestForms->where('type', '!=','request')))
                <div class="tab-pane active show" id="tabs-part-12" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @foreach ($requestForms->where('type', '!=','request') as $requestForm)
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto text-center" style="width: 4.5rem">
                                            @switch($requestForm->status)
                                            
                                                @case('draft')
                                                    <span class="badge">draft</span>
                                                    @break

                                                @case('submited')
                                                    <span class="badge" style="background: #007bff;">Ready</span>
                                                    @break

                                            @endswitch
                                        </div>
                                        <div class="col text-truncate">
                                            <strong class="text-reset d-block">{{ $requestForm->grf_code }}</strong>
                                            <div class="d-block text-muted text-truncate mt-n1">{{ \Carbon\Carbon::parse($requestForm->created_at)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-auto text-center">
                                            <a href="{!! Route("get.warehouse.create", ['code' => str_replace('/', '~', strtolower($requestForm->grf_code))]) !!}" class="btn">Detail</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column justify-content-center" style="height: 10rem;">
                            No Transfer Yet
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
