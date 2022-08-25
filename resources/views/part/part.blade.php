@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
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
                            PART</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-12" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                            role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                            Category</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createPartModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                New Part
                            </button>
                            <div id="parts"></div>
                        </div>
                        <div class="tab-pane" id="tabs-profile-12" role="tabpanel">
                            <div id="part_category"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Store Part Modal --}}
<div class="modal fade" id="createPartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/part" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="partName" class="form-label">Part Name</label>
                        <input type="text" class="form-control" id="partName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="partCategory" class="form-label">Category</label>
                        <select class="form-select" id="partCategory" name="category_id" required>
                            <option value="1" selected>Mechanical/Enclosures</option>
                            <option value="2">Electronics/Connectors/Pin Headers</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="partDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="partDescription" rows="3" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="partNote" class="form-label">Note</label>
                        <textarea class="form-control" id="partNote" rows="2" name="note"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="partImage" class="form-label">Part Image</label>
                        <input class="form-control" type="file" id="partImage" name="img" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary float-end mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
