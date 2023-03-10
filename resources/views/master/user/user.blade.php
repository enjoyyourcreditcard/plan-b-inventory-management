@extends('layouts.app')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>
@endsection
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">Master User</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    
    <div id="master-user" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4"
                            data-lucide="chevrons-left">
                            <polyline points="11 17 6 12 11 7"></polyline>
                            <polyline points="18 17 13 12 18 7"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4"
                            data-lucide="chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4"
                            data-lucide="chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4"
                            data-lucide="chevrons-right">
                            <polyline points="13 17 18 12 13 7"></polyline>
                            <polyline points="6 17 11 12 6 7"></polyline>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Add User
*|--------------------------------------------------------------------------
*--}}
<div id="create-user-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Create User</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label>
                            <input id="" name="name" type="text" class="form-control w-full" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Email</label>
                            <input id="" name="email" type="email" class="form-control w-full" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Password</label>
                            <input id="" name="password" type="password" class="form-control w-full" required>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Role</label>
                            <select class="tom-select w-full" required name="role">
                                <option value="requester">Requester</option>
                                <option value="admin">Admin</option>
                                <option value="audit">Audit</option>
                                <option value="warehouse">Warehouse</option>
                                <option value="ic">IC</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Regional</label>
                            <select class="tom-select w-full" required name="regional">
                                <option value="jakarta">Jakarta</option>
                                <option value="jakarta_1">Jakarta 1</option>
                                <option value="jakarta_2">Jakarta 2</option>
                                <option value="jakarta_3">Jakarta 3</option>
                                <option value="bandung">Bandung</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="medan">Medan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Warehouse</label>
                            <select class="tom-select w-full" required name="warehouse_id">
                                @foreach ($warehouse as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">NIK</label>
                            <input id="" name="nik" type="number" class="form-control w-full">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">No.Telepon</label>
                            <input id="" name="no_telp" type="text" class="form-control w-full" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Edit User
*|--------------------------------------------------------------------------
*--}}
<div id="edit-user-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/user/update/" method="POST">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Edit User</h2>
                </div>
                <div class="modal-body">
                    <div class="row">

                        {{-- Id --}}
                        <input id="input-user-id" type="hidden" name="id">
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input id="input-user-name" name="name" type="text" class="form-control w-full">
                        </div>

                        {{-- Password --}}
                        {{-- <div class="mb-2">
                            <label class="form-label">Password</label>
                            <input id="" name="password" type="password" class="form-control w-full input-user-password">
                        </div> --}}

                        {{-- Role --}}
                        <div class="mb-2">
                            <label class="form-label">Role</label>
                            {{-- <input id="input-user-role" name="role" type="text" class="form-control w-full capitalize"> --}}
                            <select id="input-user-role" 
                            class="
                            {{-- tom-select  --}}
                            rounded
                            w-full" 
                            required name="role">
                                <option value="requester">Requester</option>
                                <option value="admin">Admin</option>
                                <option value="audit">Audit</option>
                                <option value="warehouse">Warehouse</option>
                                <option value="ic">IC</option>
                            </select>
                        </div>

                        {{-- Regional --}}
                        <div class="mb-2 select-regional">
                            <label class="form-label">Regional</label>
                            {{-- <input id="input-user-regional" name="regional" type="text" class="form-control w-full"> --}}
                            <select id="input-user-regional" 
                            class="
                            {{-- tom-select  --}}
                            rounded
                            w-full" 
                            required name="regional">
                                <option value="jakarta">Jakarta</option>
                                <option value="jakarta_1">Jakarta 1</option>
                                <option value="jakarta_2">Jakarta 2</option>
                                <option value="jakarta_3">Jakarta 3</option>
                                <option value="bandung">Bandung</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="medan">Medan</option>
                            </select>
                        </div>

                        {{-- Warehouse --}}
                        <div class="mb-2">
                            <label class="form-label">Warehouse</label>
                            {{-- <input id="input-user-warehouse-id" name="warehouse_id" type="text" class="form-control w-full"> --}}
                            <select id="input-user-warehouse-id" 
                            class="
                            {{-- tom-select  --}}
                            rounded
                            w-full"
                            required name="warehouse_id">
                                @foreach ($warehouse as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- NIK --}}
                        <div class="mb-2">
                            <label class="form-label">NIK</label>
                            <input id="input-user-nik" name="nik" type="number" class="form-control w-full">
                        </div>

                        {{-- No. Telepon --}}
                        <div class="mb-2">
                            <label class="form-label">No.Telepon</label>
                            <input id="input-user-telepon" name="no_telp" type="text" class="form-control w-full">
                        </div>

                        {{-- Email --}}
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input id="input-user-email" name="email" type="email" class="form-control w-full">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section ( "js" )
<script src="{{ asset('js/view/user.js') }}" defer></script>
@endSection