@extends('layouts.main') @section('content')
<div class="">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div class="card">
        <div class="card-body">
        
          <div id="admin-user"></div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>




{{-- *
*|--------------------------------------------------------------------------
*| Modal Add User
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modalAddUser" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>


{{-- *
*|--------------------------------------------------------------------------
*| Modal Konfirmasi Deactive user
*|--------------------------------------------------------------------------
*--}}
<div class="modal modal-blur fade" id="modal-confirmation-deactive" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">Apakah Anda yakin?</div>
        <div>Apakah anda yakin ingin men menonaktifkan user ini</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</button>

        <form action="{{Route('post.deactive.user')}}" method="post">
          @csrf
          <input type="hidden" name="id" id="user_id">
          <button type="submit" class="btn btn-danger" style="background-color:#D70015" data-bs-dismiss="modal">Iya,
            Saya yakin</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection