@extends('layouts.main') @section('content')
    <div class="">
        <div class="row" style="margin: 0px">
            <div class="container">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-part-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <line x1="10" y1="12" x2="14" y2="12"></line>
                                </svg>&nbsp;Build</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-part-12" role="tabpanel">
                                {{-- <div id="parts"></div> --}}
                                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                                    data-bs-target="#createBuildModal">
                                    + Create
                                </button>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No</th>
                                                <th class="col-2">Build Name</th>
                                                <th class="col-8">Part</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($groupedBuild as $key=>$row)
                                                <tr>
                                                    <td><span class="text-muted">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $row[0]->name }}</td>
                                                    <td>
                                                        @foreach ($row as $item)
                                                            <button class="btn"><img src="{{ $row[0]->part->img }}" class="me-2" height="22px" width="22px">{{ $item->part->name }}</button>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex">
                                                            <a href="/build/{{ $item->id }}" type="button" class="btn btn-warning me-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalEditBuild"
                                                                data-id="{{ $row[0]->id }}"
                                                                data-name="{{ $row[0]->name }}"
                                                                data-partid="{{ $buildString[$row[0]->name] }}">Edit</a>
                                                            <form action="/build/{{ $row[0]->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger d-">Delete</button>
                                                            </form>
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
            </div>
        </div>
    </div>

    {{-- *store build modal --}}
    <div class="modal modal-blur fade" id="createBuildModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Build</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/build" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Build Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            {{-- * SELECT2 --}}
                            <label for="exampleInputEmail1" class="form-label">Part</label>
                            <select class=" form-select inputBuildSelect2" name="part_id[]" id="build"
                                multiple="multiple">
                                <div>
                                    <option></option>
                                    @foreach ($part as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </div>
                            </select>
                            {{-- * END SELECT2 --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- *store build modal --}}
    {{-- *Update build modal --}}
    <div class="modal modal-blur fade" id="modalEditBuild" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Build</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/build/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="id" id="buildId" required>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Build Name</label>
                            <input type="text" name="name" class="form-control" id="buildName"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Part</label>
                            <select class="form-select editBuildSelect2" name="part_id[]" id="buildPartId" multiple="multiple">
                                    @foreach ($part as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- *Update build modal --}}
@endsection
