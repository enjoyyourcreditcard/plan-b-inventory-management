@section('title', 'Home User')

@extends('layouts.main') @section('content')
<div class="container-fluid">
  <div class="row" style="margin: 0px">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Good Request Form</h3>
        </div>
        <div class="card-body">
          <div class="col-12">
            <div class="card card-md">
              <div class="card-body">
                <div class="row align-items-center justify-content-between gap-3">
                  <div class="col-auto">
                    <h2 class="h3">Requestor memiliki maksimal 3 slot request sampai status request ditutup.</h2>
                    <p class="m-0 text-muted">Requestor dapat menekan tombol <b>Emergency Request</b>.</p>
                  </div>
                  <div class="col-auto">
                    <a href="#" class="btn btn-danger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>&nbsp;
                      Emergency Request
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-cards mt-2">
            <div class="coba"></div>
            @foreach ($requestForms->take(3) as $requestForm)
            {{-- ============================================================= OCCUPIED SLOT ============================================================= --}}
            <div class="col-sm-6 col-lg-4">
              <div class="card card-md">
                <div class="card-body text-center">
                  <div class="text-uppercase text-muted font-weight-medium">{{ $requestForm->grf_code }}</div>
                  <div class="h-5 fw-bold my-3">
                 
                  
                   
                  {{-- 
                      @case('draft')
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-pause-fill text-warning pb-2" viewBox="0 0 16 16">
                          <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>
                        </svg>
                          @break
                      @case('submited' || 'ic_approved' || 'wh_approved' || 'delivery_approved' || 'user_pickup')
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-lg text-success pb-2" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                          @break
                      @default
                  @endswitch --}}
                  @switch($requestForm->status)

                
                  @case("draft")
                 
                  <span class="h1 text-uppercase ">{{ $requestForm->status }}</span>
                  @break

                  @case("submited")

                  <span class="h1 text-uppercase">On progres</span>
                  @break

                  @case("ic_approved")
                  <span class="h1 text-uppercase ">On progres</span>
                  @break
    
                  @case("wh_approved")
                  
                  <span class="h1 text-uppercase">On progres</span>
                  @break


                  @case("delivery_approved")
                  
                  <span class="h1 text-uppercase">Ready Pickup </span>
                  @break


                  @case("return")
                  
                  <span class="h1 text-uppercase">Close </span>
                  @break

                  @case("user_pickup")
                  
                  <span class="h1 text-uppercase">Delivered </span>
                  @break
    
                  @default
                  <span class="h1 text-uppercase">New</span>
                  @endswitch
                  </div>
                 
                  <div class="text-center mt-4">
                    
                    <a href="/request-form/{{ str_replace('/', '~', strtolower($requestForm->grf_code)) }}" class="btn w-100 float-left">Show</a>
                 
                     @if ($requestForm->status == 'user_pickup' || $requestForm->status == 'user_pickup')
                    <a href="{!! Route("get.show.return.stock", ['code' => str_replace('/', '~', strtolower($requestForm->grf_code))]) !!}" class="btn w-100 mt-2">Return</a>
                    @endIf
                    
                    @if ($requestForm->status == 'delivery_approved')
                    <a href="/request-form/{{ str_replace('/', '~', strtolower($requestForm->grf_code)) }}" class="btn w-100 mt-2">Download Surat jalan</a>
                    <a href="{{Route('post.approve.pickup',$requestForm->id)}}" class="btn w-100 mt-2">Pickup </a>
                    @endif
                   
                 
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            {{-- ============================================================= NEW SLOT ============================================================= --}}
            @if (count($requestForms->take(3)) < 3)
            <form action="/request-form" method="POST" class="col-sm-6 col-lg-4 d-flex flex-column text-decoration-none">
              @csrf
              <button class="card card-md bg-light" style="flex-grow: 1">
                <input type="hidden" name="grf_code" value="{{ $grf_code }}">
                <div class="card-body text-center d-flex flex-column w-100">
                  <div class="text-muted font-weight-medium">New Request</div>
                  <div class="display-5 fw-bold my-3 d-flex justify-content-center align-items-center" style="flex-grow: 1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                  </div>
                </div>
              </button>
            </form>
            @endif
            
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
