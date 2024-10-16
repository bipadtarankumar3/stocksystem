@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    {{-- <h5 class="card-header">User List</h5> --}}
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                        <table class="table" id="zero_config">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Service Info</th>
                                    <th>Customer Info</th>
                                    <th>Status</th>
                                    <th>Replied</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tour</td>
                                    <td>Sikkim</td>
                                    <td>
                                        <p>Name : Kumar</p>
                                        <p>Email : kumar@gmail.com</p>
                                        <p>Phone : 1234567890</p>
                                        <p>Notes : testing</p>
                                        
                                        
                                    </td>
                                    
                                   
                                    <td style="color: green">Pending</td>
                                    <td>0</td>
                                    <td>24/05/2024</td>
                                    <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Add Reply</a>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"><span class="mdi mdi-pen-plus"></span> Mark As: Pending</a>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"><span class="mdi mdi-pen-plus"></span> Mark As: Completed</a>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"><span class="mdi mdi-pen-plus"></span> Mark As: Cancel</a>
                                          </div>
                                        </div>
                                      </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
        console.error( error );
        });
    </script>
@endsection
