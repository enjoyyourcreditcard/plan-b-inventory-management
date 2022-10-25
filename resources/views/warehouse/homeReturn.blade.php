@extends('layouts.secondApp')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Warehouse Return</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="">
        <div class="row" style="margin: 0px">
            <div class="container">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                        {{-- <li class="nav-item" role="presentation">
                            <a href="#tabs-home-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                                WAREHOUSE APPROVAL</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#wh-return" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                                role="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                                WAREHOUSE RETURN STOCK</a>
                        </li> --}}
                    </ul>
                    {{-- 
                        /
                        /  Warehouse approval
                        /
                    --}}


                    {{-- !Redesign --}}
                    {{-- <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">GRF Code</th>
                                    <th class="whitespace-nowrap">Requester Name</th>
                                    <th class="whitespace-nowrap">Status</th>
                                    <th class="whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whapproval as $data)
                                    <tr class="intro-x relative mr-3 sm:mr-6">
                                        <td>
                                            <a href="{!! Route('warehouse.get.detail', ['id' => str_replace('/', '~', $data->grf_code)]) !!}"
                                                class="font-medium whitespace-nowrap">{{ $data->grf_code }}</a>
                                        </td>
                                        <td>
                                            <p class="font-medium whitespace-nowrap">{{ $data->user->name }}</p>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center text-success">{{ $data->status }}</div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <button type="button" class="bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2">
                                                    <a class="flex items-center mr-3 text-white" href="{!! Route('warehouse.get.detail', ['id' => str_replace('/', '~', $data->grf_code)]) !!}"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check-square w-4 h-4 mr-1">
                                                        <polyline points="9 11 12 14 22 4"></polyline>
                                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                        </path>
                                                    </svg> Open </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                    {{-- !End Redesign --}}


                    {{-- <div class="card-body">
                        <div class="tab-content">
                            <div class="card mt-4">
                                <div class="table-responsive">
                                    <table id="datatable" class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="col-3">GRF Code</th>
                                                <th class="col-3">status</th>
                                                <th class="col-6">CREATED_AT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($whreturn as $item)
                                                <tr>
                                                    <td><a href="{!! Route('get.whreturn.show.action.grf', ['id' => str_replace('/', '~', $item->grf_code)]) !!}">{{ $item->grf_code }}</a>
                                                    </td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="float-end me-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- ! redesign --}}
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">GRF Code</th>
                                    <th class="whitespace-nowrap">Status</th>
                                    <th class="whitespace-nowrap">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whreturn as $item)
                                    <tr class="intro-x relative mr-3 sm:mr-6">
                                        <td>
                                            <a href="{!! Route('get.whreturn.show.action.grf', ['id' => str_replace('/', '~', $item->grf_code)]) !!}"
                                                class="font-medium whitespace-nowrap">{{ $item->grf_code }}</a>
                                        </td>
                                        <td>
                                            <p class="font-medium whitespace-nowrap">{{ $item->status }}</p>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center text-success">{{ $item->created_at->format("d:m:y") }}</div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <button type="button" class="bg-emerald-900 p-2 px-4 rounded-full mt-2 mb-2">
                                                     <a class="flex items-center mr-3 text-white" href="{!! Route('get.whreturn.show.action.grf', ['id' => str_replace('/', '~', $item->grf_code)]) !!}"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check-square w-4 h-4 mr-1">
                                                        <polyline points="9 11 12 14 22 4"></polyline>
                                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                        </path>
                                                    </svg> Open </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>

            </div>
        </div>
    </div>
@endsection
