@extends('layouts.main') @section('content')
<div class="container-fluid">
    <div id="alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none">
            <strong>Pemberitahuan!</strong> Waktu pinjam telah habis, diharapkan bagi anda untuk melakukan <a href="#" class="text-danger text-underline"><u>pengembalian.</u></a>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="user-id" data-user="{{ Auth::user()->id }}"></div>

                    @if (count($timers))
                    <div class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-9" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M12 12h-3.5"></path>
                            <path d="M12 7v5"></path>
                         </svg>&nbsp;
                         Time
                    </div>
                    <div class="divide-y mt-4">
                        @foreach ($timers as $timer)
                        <div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>{{ $timer->grf_code }}</strong>
                                        <div class="float-end" data-countdown="{{ $timer->ended }}"></div>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="badge bg-primary" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-9" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M12 12h-3.5"></path>
                            <path d="M12 7v5"></path>
                         </svg>&nbsp;
                         Time
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="height: 10rem;">
                        <div>No Request</div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (count($stocks))
                    <div class="card-text">
                      {{-- <div id="MiniStock"></div> --}}
                      <div id="getting-started"></div>
                        <div>
                            <div class="h-100">
                                <div class="d-flex">
                                    <div class="card-title">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                        <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                        <line x1="12" y1="12" x2="12" y2="21"></line>
                                        <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                        <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                     </svg>&nbsp;
                                      Mini Stock
                                    </div>
                                    <div class="ms-auto text-muted mb-3">
                                        <div class="input-group"><input type="text" class="form-control" placeholder="Search…"
                                                value=""><button data-bs-toggle="dropdown" type="button"
                                                class="btn dropdown-toggle ">Name</button>
                                            <div class="dropdown-menu dropdown-menu-end"><button class="dropdown-item"
                                                    href="#">Name</button><button class="dropdown-item"
                                                    href="#">Segment</button><button class="dropdown-item"
                                                    href="#">Category</button><button class="dropdown-item" href="#">Total
                                                    Part</button></div>
                                        </div>
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
                                                    title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                                Name</button><button class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                                Segment</button><button class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                                Category</button><button class="dropdown-item" href="#"><input type="checkbox"
                                                    title="Toggle Column Visible" checked="" style="cursor: pointer;">&nbsp;
                                                Total Part</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-3">
                                <table role="table" class="table table-borderless">
                                    <thead>
                                        <tr role="row">
                                          <th>GRF Code</th>
                                          <th>SN Code</th>
                                          <th>Part Name</th>
                                          <th>Condition</th>
                                          <th>Warehouse</th>
                                          <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody role="rowgroup">
                                        @foreach ($stocks as $key => $stock)
                                          @foreach ($stock as $data)
                                          <tr role="row">
                                              <td>{{ $key }}</td>
                                              <td>{{ $data->sn_code }}</td>
                                              <td>{{ $data->part->name }}</td>
                                              <td>{{ $data->condition }}</td>
                                              <td>{{ $data->warehouse->name }}</td>
                                              <td>{{ $stock->first()->created_at->format("F j, Y, g:i a") }}</td>
                                          </tr>
                                          @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class=" d-flex align-items-center">
                                <p class="m-0 ">Showing <span>1</span> of <span>1</span> entries</p>
                                <div class="pagination m-0 ms-auto">
                                    <div class="btn-group "><button class="btn btn-outline-dark  " href="#" tabindex="-1"
                                            aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    @else
                    <div class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                          <line x1="12" y1="12" x2="20" y2="7.5"></line>
                          <line x1="12" y1="12" x2="12" y2="21"></line>
                          <line x1="12" y1="12" x2="4" y2="7.5"></line>
                          <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                       </svg>&nbsp;
                        Mini Stock
                      </div>
                    <div class="d-flex justify-content-center align-items-center" style="height: 10rem">
                        No Mini Stock
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
