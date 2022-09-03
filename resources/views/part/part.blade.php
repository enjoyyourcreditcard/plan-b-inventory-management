@extends('layouts.main') @section('content')
<div class="">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div class="card">
        <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a href="#tabs-part-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                <line x1="10" y1="12" x2="14" y2="12"></line>
              </svg>&nbsp;PART</a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#tabs-category" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 4h6v6h-6z"></path>
                <path d="M14 4h6v6h-6z"></path>
                <path d="M4 14h6v6h-6z"></path>
                <circle cx="17" cy="17" r="3"></circle>
              </svg>&nbsp;
              Category</a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#tabs-merek" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-appgallery" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                <path d="M9 8a3 3 0 0 0 6 0"></path>
              </svg>&nbsp;
              Merek</a>
          </li>

          
          
        </ul>
        <div class="card-body">
          <div class="tab-content">

              {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Part
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane active show" id="tabs-part-12" role="tabpanel">
              <div id="parts"></div>
            </div>
             {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Category
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane" id="tabs-category" role="tabpanel">
                <div id="part-category"></div>
                {{-- <div class="d-flex">
                  <div>
                    <button data-bs-toggle="modal" data-bs-target="#createCategoryModal" class="btn btn-primary w-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                      New Category
                    </button>
                  </div>
                  <div class="ms-auto text-muted">
                    <div class="input-icon mb-3"><input type="text" class="form-control" placeholder="Search…"
                        value=""><span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                          width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <circle cx="10" cy="10" r="7"></circle>
                          <line x1="21" y1="21" x2="15" y2="15"></line>
                        </svg></span></div>
                  </div>
                  <div class="px-1"></div>
                  <div class="btn-group h-25 "><button type="button" class=" btn btn-outline-light  dropdown-toggle"
                      data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                        </path>
                      </svg></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button class="dropdown-item"
                        href="#"><input type="checkbox">&nbsp; No
                        Stock</button></div>
                  </div>
                  <div class="px-1"></div>
                  <div class="btn-group h-25 "><button type="button" class=" btn btn-outline-light  dropdown-toggle"
                      data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-adjustments" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
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
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button class="dropdown-item"
                        href="#"><input type="checkbox" title="Toggle Column Visible" checked=""
                          style="cursor: pointer;">&nbsp; IPN</button><button class="dropdown-item" href="#"><input
                          type="checkbox" title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                        Part</button><button class="dropdown-item" href="#"><input type="checkbox"
                          title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                        Description</button><button class="dropdown-item" href="#"><input type="checkbox"
                          title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                        Category</button><button class="dropdown-item" href="#"><input type="checkbox"
                          title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp; Stock</button><button
                        class="dropdown-item" href="#"><input type="checkbox" title="Toggle Column Visible" checked=""
                          style="cursor: pointer;">&nbsp; Link</button></div>
                  </div>
                </div> --}}

             
                {{-- <div className="tabel-horizontal-scroll">
                  <table class="table table-bordered table-striped">
                      <thead>
                        <th >
                          Category
                        </th>
                        <th >
                          Description
                        </th >
                        <th >
                          Total Part
                        </th >
                        <th >
                          Act
                        </th >
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                        <tr >
                          <td >
                            <a href="#" style="min-width: 300px;" class="name">{{ $category->name }}</a>
                          </td>
                          <td >
                              {{ $category->description }}
                          </td>
                          <td >
                            <a href="#">{{ $category->parts->count() }}</a>
                          </td>
                          <td >
                            <button class="btn px-2 border-0 m-auto tombol-edit"
                              data-bs-toggle="modal"
                              data-bs-target="#editCategoryModal"
                              data-id="{{ $category->id }}"
                              data-uom="{{ $category->uom }}"
                              data-name="{{ $category->name }}"
                              data-description="{{$category->description}}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                              </svg>
                            </button>
                          </td>
                        </tr>
                        @endforeach

                  </tbody>
                </table>
              </div> --}}
            </div>


            {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Brand
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane" id="tabs-merek" role="tabpanel">
              <div id="part-brand"></div>
              {{-- <button class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-create"
                class="btn btn-primary w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                New Brand
              </button>
              @if (session()->has('success'))
              <div class="alert alert-success position-absolute" role="alert">
                {{ session('success') }}
              </div>
              @endif
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <th>Brand</th>
                      <th>
                        Total Part
                      </th>
                      <th>
                        Create Date
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($brands as $brand)
                      <tr>
                        <td class="name text-capitalize">{{ $brand->name }}</td>
                        <td class="text-capitalize">0</td>
                        <td class="text-capitalize">{{ $brand->created_at->format('j F, Y') }}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  <div class="float-end me-3">
                    {{ $brands->links() }}
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="tab-content">
  <div class="tab-pane active show" id="tabs-home-12" role="tabpanel">
    <div id="parts"></div>
  </div>
  <div class="tab-pane" id="tabs-profile-12" role="tabpanel">
    <div id="part_category">
    </div>
  </div>
</div>
</div>




{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Part
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="createPartModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Part</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('part.store')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="row">
            <div class="mb-2">
              <label for="partName" class="form-label">Part Name</label>
              <input type="text" class="form-control" id="partName" name="name" required>
            </div>
            <div class="mb-2">
              <label for="partCategory" class="form-label">Category</label>
              <select class="form-control select2" id="partCategory" name="category_id" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" data-uom="{{ $category->uom }}" data-brandname="{{ isset($brandString[$category->id]) == false ? '' : $brandString[$category->id]['name'] }}" data-brandid="{{ isset($brandString[$category->id]) == false ? '' : $brandString[$category->id]['id'] }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-2">
              <label for="partBrand" class="form-label">Brand</label>
              <select class="form-select select2" id="partBrand" name="brand_id" required>
              </select>
            </div>

            <div class="mb-2">
              <label for="partUom" class="form-label">Uom</label>
              <select class="form-select select2" id="partUom" name="uom" required>
              </select>
            </div>

            <div class="mb-2">
              <label for="partSnStatus" class="form-label">SN Status</label>
              <select class="form-select select2" id="partSnStatus" name="sn_status" required>
                <option value="non sn">NON SN</option>
                <option value="sn">SN</option>
              </select>
            </div>

            <div class="mb-2">
              <label for="partColor" class="form-label">Color</label>
              <select class="form-select select3" id="partColor" name="color" required>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Grey">Grey</option>
                <option value="Green">Green</option>
                <option value="Yellow">Yellow</option>
                <option value="NN">NN</option>
                <option value="Blue">Blue</option>
                <option value="Silver">Silver</option>
                <option value="Multi Color">Multi Color</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
              </select>
            </div>

            <div class="mb-2">
              <label for="partSize" class="form-label">Size</label>
              <input type="number" class="form-control" id="partSize" name="size" required>
            </div>

            <div class="mb-2">
              <label for="partDescription" class="form-label">Description</label>
              <textarea class="form-control" id="partDescription" rows="3" name="description" required></textarea>
            </div>

            <div class="mb-2">
              <label for="partNote" class="form-label">Note</label>
              <textarea class="form-control" id="partNote" rows="2" name="note"></textarea>
            </div>

            <div class="mb-4">
              <label for="partImage" class="form-label">Part Image</label>
              <input class="form-control" type="file" id="partImage" name="img" accept="image/*">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Category
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="createCategoryModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Category</h5>
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
            <textarea class="form-control" id="categoryDescription" rows="3" name="description" required></textarea>
          </div>
          <div class="mb-3">
            <label for="categoryUom" class="form-label">Uom</label>
            <select class="form-select select5" name="uom[]" required multiple="multiple">
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
          <button type="submit" class="btn float-end mt-5">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Brand
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add a new brand</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route("post.store.brand") }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Category</label>
              <select name="category_id" class="form-control" >
                @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
          </div>


          <div class="mb-3">
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


{{-- *
*|--------------------------------------------------------------------------
*| Modal Edit Brand
*|--------------------------------------------------------------------------
*--}}
<!-- Edit Category Modal -->
<div class="modal modal-blur fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/category/update" method="post" class="form-edit">
        @csrf
        <div class="modal-body">
          <input type="hidden" class="form-control" name="id" id="categoryId" required>
          <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" id="categoryName" required>
          </div>
          <div class="mb-3">
            <label for="categoryDescription" class="form-label">Description</label>
            <textarea class="form-control" id="categoryDescription" rows="3" name="description" required></textarea>
          </div>
          <div class="mb-3">
            <label for="categoryUom" class="form-label">Uom</label>
            <select class="form-select select6" name="uom[]" id="categoryUom" required multiple="multiple">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Brand -->
<div class="modal modal-blur fade" id="editBrandModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit a brand</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/brand/" method="post" class="form-edit">
        @method('put')
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name="id" id="brandId" required>

        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" name="name" id="brandName" required>
          </div>
          <div class="mb-3">
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

@endsection