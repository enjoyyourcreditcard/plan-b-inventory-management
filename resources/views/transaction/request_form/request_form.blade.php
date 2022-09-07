@extends('layouts.main') @section('content')
<div class="container-xl  ">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div id="inputRequestFormParent" class="card">
        <div class="card-header">
          <h3 class="card-title">Request Form</h3>
        </div>
        <form action="/request-form" method="POST">
          @csrf
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">PIC Name</label>
              <input type="text" class="form-control" name="example-disabled-input" value="{{ Auth::user()->name }}" disabled="" required>
              <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            </div>
            <div class="mb-3">
              <div class="form-label">Part
                <a class="btn ms-3" id="request-form-append-new">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                </a>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-md-10 col-6">
                  <select class="form-control inputRequestFormSelect2" required name="part_id[]">
                    @foreach ($parts as $part)
                    <option></option>
                    <option value="{{ $part->id }}">{{ $part->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-1 col-3">
                  <input type="number" class="form-control" name="quantity[]" placeholder="Input placeholder" value="1" min="1" required>
                </div>
              </div>
              <div class="col-11 mt-3">
                <textarea class="form-control" rows="3" name="remarks[]" placeholder="Note.."></textarea>
              </div>
            </div>
            <div id="inputRequestAppend">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
