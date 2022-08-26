@extends('layouts.main') @section('content')
<div class="">
    <div class="row" style="margin: 0px">
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-part-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
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
                        <a href="#tabs-category-12" class="nav-link" data-bs-toggle="tab" aria-selected="false"
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
                        <div class="tab-pane active show" id="tabs-part-12" role="tabpanel">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#createPartModal">
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
                        <div class="tab-pane" id="tabs-category-12" role="tabpanel">

                            <div class="pt-3 ">
                                <div class="d-flex">
                                    <div>
                                        <button class="btn" data-bs-toggle="modal"
                                            data-bs-target="#createCategoryModal">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                            New Category
                                        </button>
                                    </div>
                                    <div class="ms-auto text-muted">
                                        <div class="input-icon mb-3"><input type="text" class="form-control"
                                                placeholder="Search…" value=""><span class="input-icon-addon"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="10" cy="10" r="7"></circle>
                                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                                </svg></span></div>
                                    </div>
                                    <div class="px-1"></div>
                                    <div class="btn-group h-25 "><button type="button"
                                            class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-filter" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                                </path>
                                            </svg></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                                class="dropdown-item" href="#"><input type="checkbox">&nbsp; No
                                                Stock</button></div>
                                    </div>
                                    <div class="px-1"></div>
                                    <div class="btn-group h-25 "><button type="button"
                                            class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-adjustments" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="6" cy="10" r="2"></circle>
                                                <line x1="6" y1="4" x2="6" y2="8"></line>
                                                <line x1="6" y1="12" x2="6" y2="20"></line>
                                                <circle cx="12" cy="16" r="2"></circle>
                                                <line x1="12" y1="4" x2="12" y2="14"></line>
                                                <line x1="12" y1="18" x2="12" y2="20"></line>
                                                <circle cx="18" cy="7" r="2"></circle>
                                                <line x1="18" y1="4" x2="18" y2="5"></line>
                                                <line x1="18" y1="9" x2="18" y2="20"></line>
                                            </svg></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; IPN</button><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; Part</button><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; Description</button><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; Category</button><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; Stock</button><button
                                                class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked=""
                                                    style="cursor: pointer;">&nbsp; Link</button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabel-horizontal-scroll">
                                <table role="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr role="row">
                                            <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                style="cursor: pointer;"><b>Category</b><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="6 15 12 9 18 15"></polyline>
                                                </svg></th>
                                            <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                style="cursor: pointer;"><b>Description</b><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="6 15 12 9 18 15"></polyline>
                                                </svg></th>
                                            <th class="w-1" colspan="1" role="columnheader" title="Toggle SortBy"
                                                style="cursor: pointer;"><b>Total Part</b><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <polyline points="6 15 12 9 18 15"></polyline>
                                                </svg></th>
                                            <th class="w-1 text-center" colspan="1" role="columnheader"
                                                title="Toggle SortBy" style="cursor: pointer;"><b>Actions</b></th>
                                        </tr>
                                    </thead>
                                    <tbody role="rowgroup">
                                        @foreach ($categories as $category)
                                        <tr role="row">
                                            <td role="cell">
                                                <p style="min-width: 300px;" class="name">{{ $category->name }}</p>
                                            </td>
                                            <td role="cell">
                                                <p style="min-width: 300px;" class="description">
                                                    {{ $category->description }}</p>
                                            </td>
                                            <td role="cell">
                                                <p>{{ $category->parts->count() }}</p>
                                            </td>
                                            <td role="cell" class="text-center" style="vertical-align: middle">
                                                <button class="btn px-2 border-0 m-auto tombol-edit"
                                                    data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                                    data-id="{{ $category->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                                <a href="/category/{{ $category->id }}">
                                                    <button class="btn px-2 border-0 m-auto text-dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class=" d-flex align-items-center">
                                <p class="m-0 ">Showing <span>1</span> of <span>2</span> entries</p>
                                <div class="pagination m-0 ms-auto">
                                    <div class="btn-group "><button disabled="" class="btn btn-outline-dark  " href="#"
                                            tabindex="-1" aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <polyline points="15 6 9 12 15 18"></polyline>
                                            </svg>prev</button><button class="btn btn-outline-dark" href="#">next<svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <polyline points="9 6 15 12 9 18"></polyline>
                                            </svg></button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Store Part Modal --}}
<div class="modal fade" id="createPartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/part" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="partName" class="form-label">Part Name</label>
                            <input type="text" class="form-control" id="partName" name="name" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partCategory" class="form-label">Category</label>
                            <select class="form-select" id="partCategory" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partBrand" class="form-label">Brand</label>
                            <select class="form-select" id="partBrand" name="brand" required>
                                <option value="3M">3M</option>
                                <option value="ZTE">ZTE</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partUom" class="form-label">Uom</label>
                            <select class="form-select" id="partUom" name="uom" required>
                                <option value="meter">Meter</option>
                                <option value="set">Set</option>
                                <option value="each">Each</option>
                                <option value="roll">Roll</option>
                                <option value="unit">Unit</option>
                                <option value="batang">Batang</option>
                                <option value="liter">Liter</option>
                                <option value="kaleng">Kaleng</option>
                                <option value="kg">Kg</option>
                                <option value="kubic">Kubic</option>
                                <option value="pack">Pack</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partSnStatus" class="form-label">SN Status</label>
                            <select class="form-select" id="partSnStatus" name="sn_status" required>
                                <option value="non sn">NON SN</option>
                                <option value="sn">SN</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partColor" class="form-label">Color</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="color">
                            <datalist id="datalistOptions">
                                <option value="Black">
                                <option value="White">
                                <option value="Grey">
                                <option value="Green">
                                <option value="Yellow">
                                <option value="NN">
                                <option value="Blue">
                                <option value="Silver">
                                <option value="Multi Color">
                                <option value="Red">
                                <option value="Orange">
                            </datalist>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partSize" class="form-label">Size</label>
                            <input type="number" class="form-control" id="partSize" name="size" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="partDescription" rows="3" name="description"
                                required></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partNote" class="form-label">Note</label>
                            <textarea class="form-control" id="partNote" rows="2" name="note"></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="partImage" class="form-label">Part Image</label>
                            <input class="form-control" type="file" id="partImage" name="img" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn float-end mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Store Category Modal --}}
<div class="modal fade" id="createCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDescription" rows="3" name="description"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn float-end mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Category Modal --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-edit" action="/category" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control input-name-edit" id="categoryName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control input-description-edit" id="categoryDescription" rows="3"
                            name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn float-end mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('additionalJs')
<script>
    const name = document.querySelectorAll('.name');
    const inputNameEdit = document.querySelector('.input-name-edit');
    const description = document.querySelectorAll('.description');
    const inputDescriptionEdit = document.querySelector('.input-description-edit');
    const tombolEdit = document.querySelectorAll('.tombol-edit');
    const formEdit = document.querySelector('.form-edit');

    tombolEdit.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputNameEdit.value = '';
            inputNameEdit.value = name[i].innerHTML.trim();
            inputDescriptionEdit.value = '';
            inputDescriptionEdit.value = description[i].innerHTML.trim();
            formEdit.removeAttribute('action');
            formEdit.setAttribute('action', '/category/' + e.getAttribute('data-id'))
        })
    });

</script>
@endsection
