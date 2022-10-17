@extends('layouts.main') @section('content')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Activity
                        </h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="page-body">
            <!-- Table Content -->
            <div class="container-xl">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="divide-y " data-bs-spy="scroll">
                            <div class="card-body">
                                    <div>
                                        @foreach($notifications as $index => $row)
                                        <div class="row mb-3">
                                            <div class="col-auto">
                                                <span class="avatar"></span>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <h3 class="text-body d-block">{{$row->user_id}}</h3>
                                                    <h4 class="text-body d-block">{{$row->title}}</h4>
                                                    <div class="d-block text-muted">
                                                        {{$row->content}}
                                                    </div>
                                                </div>
                                                <div class="text-muted">{{$row->created_at}}</div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="badge bg-primary"></div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
