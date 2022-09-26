@extends('layouts.main') @section('content')
<div class="">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div class="card">
        <ul class="nav nav-tabs nav-tabs-alt" data-bs-toggle="tabs" role="tablist">
          @if (AuthPermission("part:view"))
          <li class="nav-item" role="presentation">
            <a href="#tabs-part-12" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                <line x1="12" y1="12" x2="12" y2="21"></line>
                <line x1="12" y1="12" x2="4" y2="7.5"></line>
             </svg>&nbsp;PART</a>
          </li>
          @endif
          
          @if (AuthPermission("part:view"))
          <li class="nav-item" role="presentation">
            <a href="#tabs-segment" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-container" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20 4v.01"></path>
                <path d="M20 20v.01"></path>
                <path d="M20 16v.01"></path>
                <path d="M20 12v.01"></path>
                <path d="M20 8v.01"></path>
                <rect x="8" y="4" width="8" height="16" rx="1"></rect>
                <path d="M4 4v.01"></path>
                <path d="M4 20v.01"></path>
                <path d="M4 16v.01"></path>
                <path d="M4 12v.01"></path>
                <path d="M4 8v.01"></path>
             </svg>&nbsp;
              Segment</a>
          </li>
          @endif

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

          <li class="nav-item" role="presentation">
            <a href="#tabs-build" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                <polyline points="12 8 7 3 3 7 8 12"></polyline>
                <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                <polyline points="16 12 21 17 17 21 12 16"></polyline>
                <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
             </svg>&nbsp;
              Build</a>
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
             *| Tab Segment
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane" id="tabs-segment" role="tabpanel">
                <div id="part-segment"></div>
            </div>

             {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Category
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane" id="tabs-category" role="tabpanel">
                <div id="part-category"></div>
            </div>

            {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Brand
             *|--------------------------------------------------------------------------
             *--}}
            <div class="tab-pane" id="tabs-merek" role="tabpanel">
              <div id="part-brand"></div>
            </div>

            {{-- *
             *|--------------------------------------------------------------------------
             *| Tab Build
             *|--------------------------------------------------------------------------
             *--}}
             <div class="tab-pane" id="tabs-build" role="tabpanel">
              <div id="part-build"></div>
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
<div class="modal" id="createPartModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 864px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Part</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addPartForm" action="{{route('part.store')}}" method="POST" enctype="multipart/form-data">@csrf</form>
      <form id="addCategoryForm">@csrf</form>
      <div class="modal-body" style="overflow-y: scroll; height: 80vh;">
        <div class="row">
          <div class="mb-2">
            <label for="partName" class="form-label">Part Name</label>
            <input type="text" class="form-control" id="partName" name="name" form="addPartForm" required>
          </div>
          <div class="mb-2">
            <label for="partCategory" class="form-label">Segment</label>
            <select class="form-control inputPartSegmentSelect2" id="partCategory" name="segment_id" form="addPartForm" required>
              <option></option>
            </select>
          </div>

          <div class="mb-2">
            <label for="partBrand" class="form-label">Brand</label>
            <select class="form-select inputPartAllSelect2" id="partBrand" name="brand_id" form="addPartForm" required>
            </select>
          </div>

          <div class="mb-2">
            <label for="partUom" class="form-label">Uom</label>
            <select class="form-select inputPartAllSelect2" id="partUom" name="uom" form="addPartForm" required>
            </select>
          </div>

          <div class="mb-2">
            <label for="partSnStatus" class="form-label">SN Status</label>
            <select class="form-select inputPartAllSelect2" id="partSnStatus" name="sn_status" form="addPartForm" required>
              <option value="non sn">NON SN</option>
              <option value="sn">SN</option>
            </select>
          </div>

          <div class="mb-2">
            <label for="partColor" class="form-label">Color</label>
            <select class="form-select inputPartAllSelect2" id="partColor" name="color" form="addPartForm" required>
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
            <input type="number" class="form-control" id="partSize" name="size" form="addPartForm" required>
          </div>

          <div class="mb-2">
            <label for="partDescription" class="form-label">Description</label>
            <textarea class="form-control" id="partDescription" rows="3" name="description" form="addPartForm" required></textarea>
          </div>

          {{-- <div class="mb-2">
            <label for="partNote" class="form-label">Note</label>
            <textarea class="form-control" id="partNote" rows="2" name="note"></textarea>
          </div> --}}

          <div class="mb-4">
            <label for="partImage" class="form-label">Part Image</label>
            <input class="form-control" type="file" id="partImage" name="img" accept="image/*" form="addPartForm">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="addPartForm">Save</button>
      </div>
    </div>
    {{-- <div class="modal-content" id="createPartCategoryModal" style="display: none; box-shadow: 0 0 0 100vmax rgb(0 0 0 / 0.2) ,0 0 2rem rgb(0 0 0 / 0.2); position: absolute;">
      <div class="modal-header">
        <h5 class="modal-title">Create Category</h5>
        <button type="button" class="btn-close" onclick="bye()"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="categoryName" class="form-label">Name</label>
          <input type="text" class="form-control" id="segmentName" name="name" form="addCategoryForm" required>
        </div>
        <div>
        <div class="mb-3">
          <label for="categoryName" class="form-label">Category</label>
          <select name="category_id" class="form-control inputPartCategorySelect2" id="segmentCategoryId" form="addCategoryForm" required>
            <option></option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <button id="submitStoreCategory" type="submit" class="btn btn-primary float-end" form="addCategoryForm">Save</button>
        </div>
      </div>
    </div> --}}
  
  </div>
</div> 



{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Segment
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="createSegment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add a new Segment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/segment" method="post">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Category</label>
              <select name="category_id" class="form-control inputSegmentSelect2">
                <option></option>
                @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
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
*| Modal Edit Category
*|--------------------------------------------------------------------------
*--}}
<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
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


{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Brand
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modal-create-brand" tabindex="-1" role="dialog" aria-hidden="true">
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
            <label class="form-label">Segment</label>
              <select name="segment_id" class="form-control inputBrandSelect2" >
                <option></option>
                @foreach ($segments as $item)
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



{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Build
*|--------------------------------------------------------------------------
*--}}
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

{{-- *
*|--------------------------------------------------------------------------
*| Modal Edit Build
*|--------------------------------------------------------------------------
*--}}
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
@endsection