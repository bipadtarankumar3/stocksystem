@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row gy-4">



              <div class="col-xl-4 col-sm-6 mt-4">
                <div class="card">
                  <div class="row">
                    <div class="col-6">
                      <div class="card-body">
                        <div class="card-info">
                          <h6 class="mb-4 pb-1 text-nowrap">All Users</h6>
                          <div class="d-flex align-items-end mb-3">
                            <h4 class="mb-0 me-2">200</h4>
                            {{-- <small class="text-danger">-20%</small> --}}
                          </div>
                          <div style="height: 45px"></div>
                          <div class="badge bg-label-secondary rounded-pill">Total User</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="h-100 position-relative">
                        <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/illustration-2.png" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="81">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-8 align-self-end">
                <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Transactions</h5>
                        <div class="dropdown">
                          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">Update</a>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3"><span class="fw-medium">Total Transaction</span> 😎</p>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-primary rounded shadow">
                                <i class="mdi mdi-trending-up mdi-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <div class="small mb-1">Earnings</div>
                              <h5 class="mb-0">245k</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-success rounded shadow">
                                <i class="mdi mdi-account-outline mdi-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <div class="small mb-1">Services</div>
                              <h5 class="mb-0">13</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-warning rounded shadow">
                                <i class="mdi mdi-cellphone-link mdi-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <div class="small mb-1">Pending</div>
                              <h5 class="mb-0">1.54k</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="avatar">
                              <div class="avatar-initial bg-info rounded shadow">
                                <i class="mdi mdi-currency-usd mdi-24px"></i>
                              </div>
                            </div>
                            <div class="ms-3">
                              <div class="small mb-1">Bookings</div>
                              <h5 class="mb-0">300</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>


        </div>


          <div class="row mt-4">
            <div class="col-xl-4 col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <h5 class="mb-1">Weekly Overview</h5>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-dots-vertical mdi-24px"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="weeklyOverviewChart"></div>
                    <div class="mt-1 mt-md-3">
                      
                      <div class="d-grid mt-3 mt-md-4">
                        <button class="btn btn-primary" type="button">Details</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-8">
                
            <!-- Data Tables -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                          <h5 class="m-0 me-2">Recent Bookings</h5>
                        </div>
                        
                    </div>

                    <div class="card-datatable table-responsive">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-truncate">#</th>
                                        <th class="text-truncate">Item</th>
                                        <th class="text-truncate">Total</th>
                                        <th class="text-truncate">Paid</th>
                                        <th class="text-truncate">Status</th>
                                        <th class="text-truncate">created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td class="text-truncate">Hitel Hill</td>
                                        <td class="text-truncate">1500</td>
                                        <td class="text-truncate">0</td>
                                        <td class="text-truncate">Unpaid</td>
                                        <td><span class="badge bg-label-warning rounded-pill">26/03/2024</span></td>
                                    </tr>
     
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
            </div>
            <!--/ Data Tables -->
            </div>
          </div>

    </div>
@endsection
