@extends('layouts.main')
@section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-brand" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                            Brand</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-lagi" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            ???</a>
                    </li>
                </ul>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-brand" role="tabpanel">
                            {{-- <div id="parts"></div> --}}
                            <!-- Button trigger modal -->
                            <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-create">
                                New Brand
                            </a>
                            @if (session()->has('success'))
                                <div class="alert alert-success position-absolute" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>                                                
                                                    <th>Brand</th>                                               
                                                    <th>Status</th>                                               
                                                    <th>:::</th>                                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($brands as $item)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td class="name text-capitalize">{{ $item->name }}</td>
                                                        <td class="text-capitalize">{{ $item->status }}</td>
                                                        <td>
                                                            <a href="{{ url('/delete/'.$item->id) }}">Delete</a>
                                                            |
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit" class="tombol-edit" data-id="{{ $item->id }}">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-end me-3">
                                            {{ $brands->links() }}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane" id="tabs-lagi" role="tabpanel">
                            <!-- Button trigger modal -->
                            <a href="#" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-brand">
                                New ???
                            </a>
                            <div id="part_category"></div>
                        </div>
                    </div>
               

                    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit a brand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/brand/" method="post" class="form-edit">
                                    @method('put')
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Brand Name</label>
                                            <input type="text" class="form-control input-name-edit" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            {{-- <label for="name" class="form-label">Status</label> --}}
                                            <input type="hidden" class="form-control" name="status">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Brand</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additionalJs') 
<script> 
    const name = document.querySelectorAll('.name'); 
    const inputNameEdit = document.querySelector('.input-name-edit'); 
    const tombolEdit = document.querySelectorAll('.tombol-edit'); 
    const formEdit = document.querySelector('.form-edit'); 
 
    tombolEdit.forEach((e, i) => { 
        e.addEventListener('click', function () { 
            inputNameEdit.value = ''; 
            inputNameEdit.value = name[i].innerHTML.trim();                         
            formEdit.removeAttribute('action'); 
            formEdit.setAttribute('action', '/brand/' + e.getAttribute('data-id')) 
        }) 
    }); 
</script> 
@endsection