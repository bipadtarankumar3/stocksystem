@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!--<div class="row gy-4">-->

        <!--    <div class="col-xl-3 col-sm-6 mt-5">-->
        <!--        <div class="card">-->
        <!--          <div class="row">-->
        <!--            <div class="col-6">-->
        <!--              <div class="card-body">-->
        <!--                <div class="card-info">-->
        <!--                  <h6 class="mb-4 pb-1 text-nowrap">Ratings</h6>-->
        <!--                  <div class="d-flex align-items-end mb-3">-->
        <!--                    <h4 class="mb-0 me-2">13k</h4>-->
        <!--                    {{-- <small class="text-success">+15.6%</small> --}}-->
        <!--                  </div>-->
        <!--                  <div class="badge bg-label-primary rounded-pill">Year of 2024</div>-->
        <!--                </div>-->
        <!--              </div>-->
        <!--            </div>-->
        <!--            <div class="col-6">-->
        <!--              <div class="h-100 position-relative">-->
        <!--                <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/illustration-1.png" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="95">-->
        <!--              </div>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->

        <!--      <div class="col-xl-3 col-sm-6 mt-5">-->
        <!--        <div class="card">-->
        <!--          <div class="row">-->
        <!--            <div class="col-6">-->
        <!--              <div class="card-body">-->
        <!--                <div class="card-info">-->
        <!--                  <h6 class="mb-4 pb-1 text-nowrap">Experience</h6>-->
        <!--                  <div class="d-flex align-items-end mb-3">-->
        <!--                    <h4 class="mb-0 me-2">200</h4>-->
        <!--                    {{-- <small class="text-danger">-20%</small> --}}-->
        <!--                  </div>-->
        <!--                  <div class="badge bg-label-secondary rounded-pill">Last Week</div>-->
        <!--                </div>-->
        <!--              </div>-->
        <!--            </div>-->
        <!--            <div class="col-6">-->
        <!--              <div class="h-100 position-relative">-->
        <!--                <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/illustration-2.png" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="81">-->
        <!--              </div>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->

        <!--      <div class="col-xl-6 align-self-end">-->
        <!--        <div class="card">-->
        <!--          <div class="card-header d-flex align-items-center justify-content-between">-->
        <!--            <h5 class="card-title m-0 me-2">Transactions</h5>-->
        <!--            <div class="dropdown">-->
        <!--              <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--                <i class="mdi mdi-dots-vertical mdi-24px"></i>-->
        <!--              </button>-->
        <!--              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">-->
        <!--                <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>-->
        <!--                <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>-->
        <!--                <a class="dropdown-item waves-effect" href="javascript:void(0);">Update</a>-->
        <!--              </div>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="card-body">-->
        <!--            <div class="row g-3 mb-xl-2">-->
        <!--              <div class="col-md-4">-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                  <div class="avatar">-->
        <!--                    <div class="avatar-initial bg-primary rounded shadow">-->
        <!--                      <i class="mdi mdi-trending-up mdi-24px"></i>-->
        <!--                    </div>-->
        <!--                  </div>-->
        <!--                  <div class="ms-3">-->
        <!--                    <div class="small mb-1">Sales</div>-->
        <!--                    <h5 class="mb-0">245k</h5>-->
        <!--                  </div>-->
        <!--                </div>-->
        <!--              </div>-->
        <!--              <div class="col-md-4">-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                  <div class="avatar">-->
        <!--                    <div class="avatar-initial bg-success rounded shadow">-->
        <!--                      <i class="mdi mdi-account-outline mdi-24px"></i>-->
        <!--                    </div>-->
        <!--                  </div>-->
        <!--                  <div class="ms-3">-->
        <!--                    <div class="small mb-1">Customers</div>-->
        <!--                    <h5 class="mb-0">12.5k</h5>-->
        <!--                  </div>-->
        <!--                </div>-->
        <!--              </div>-->
        <!--              <div class="col-md-4">-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                  <div class="avatar">-->
        <!--                    <div class="avatar-initial bg-warning rounded shadow">-->
        <!--                      <i class="mdi mdi-cellphone-link mdi-24px"></i>-->
        <!--                    </div>-->
        <!--                  </div>-->
        <!--                  <div class="ms-3">-->
        <!--                    <div class="small mb-1">Hotels</div>-->
        <!--                    <h5 class="mb-0">200</h5>-->
        <!--                  </div>-->
        <!--                </div>-->
        <!--              </div>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->


        <!--</div>-->

        <div class="row mt-4">
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-primary"><i class="mdi mdi-account-outline mdi-24px"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0 display-6">42</h4>
                  </div>
                  <p class="mb-0 text-heading">Total Customer</p>
                  {{-- <p class="mb-0">
                    <span class="me-1">18</span>
                    <small class="text-muted">than last week</small>
                  </p> --}}
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-warning">
                        <i class="mdi mdi-alert mdi-20px"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0 display-6">8</h4>
                  </div>
                  <p class="mb-0 text-heading">Total Product</p>
                  
                </div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-danger">
                        <i class="mdi mdi-source-fork mdi-20px"></i>
                      </span>
                    </div>
                    <h4 class="ms-1 mb-0 display-6">2700</h4>
                  </div>
                  <p class="mb-0 text-heading">Product Quantity</p>
                 
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-info"><i class="mdi mdi-timer-outline mdi-20px"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0 display-6">13</h4>
                  </div>
                  <p class="mb-0 text-heading">Category</p>
                  
                </div>
              </div>
            </div> --}}


          </div>

          <!--<div class="row">-->
          <!--  <div class="col-md-12">-->
                
          <!--  <div class="col-12">-->
          <!--      <div class="card">-->
          <!--          <div class="card-header d-flex align-items-center justify-content-between">-->
          <!--              <div class="card-title mb-0">-->
          <!--                <h5 class="m-0 me-2">Recent Bookings</h5>-->
          <!--              </div>-->
                        
          <!--          </div>-->

          <!--          <div class="card-datatable table-responsive">-->
          <!--              <div class="table-responsive">-->
          <!--                  <table class="table">-->
          <!--                      <thead class="table-light">-->
          <!--                          <tr>-->
          <!--                              <th class="text-truncate">#</th>-->
          <!--                              <th class="text-truncate">Item</th>-->
          <!--                              <th class="text-truncate">Total</th>-->
          <!--                              <th class="text-truncate">Paid</th>-->
          <!--                              <th class="text-truncate">Status</th>-->
          <!--                              <th class="text-truncate">created At</th>-->
          <!--                          </tr>-->
          <!--                      </thead>-->
          <!--                      <tbody>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
          <!--                          <tr>-->
          <!--                              <td>-->
          <!--                                  1-->
          <!--                              </td>-->
          <!--                              <td class="text-truncate">Hitel Hill</td>-->
          <!--                              <td class="text-truncate">1500</td>-->
          <!--                              <td class="text-truncate">0</td>-->
          <!--                              <td class="text-truncate">Unpaid</td>-->
          <!--                              <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>-->
          <!--                          </tr>-->
     
          <!--                      </tbody>-->
          <!--                  </table>-->
          <!--              </div>-->
          <!--          </div>-->

                    
          <!--      </div>-->
          <!--  </div>-->
          <!--  </div>-->
          <!--</div>-->

    </div>
@endsection
