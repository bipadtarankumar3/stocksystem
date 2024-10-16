@extends('vendor.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Vendor/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">Change Password</h4>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="name">Old Password</label>
                                <input type="text" placeholder="Old Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">New Password</label>
                                <input type="text" placeholder="New Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Confirm Password</label>
                                <input type="text" placeholder="Confirm Password" class="form-control">
                            </div>

                            <button class="btn btn-primary mt-2">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
