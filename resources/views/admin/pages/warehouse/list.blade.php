@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4">
        <span class="text-muted fw-light">Admin /</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}
    </h6>

    <div class="row">
        <!-- Add/Edit Form -->
        <div class="col-md-3">
            <div class="card">
                <h4 class="card-header">{{ isset($warehouse) ? 'Edit warehouse' : 'Add warehouse' }}</h4>
                <div class="card-body">
                    <form action="{{ URL::to('admin/warehouse/warehouseForm') }}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="{{ isset($warehouse) ? 'update' : 'add' }}">
                        <input type="hidden" name="id" value="{{ isset($warehouse) ? $warehouse->id : '' }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="warehouse Name" value="{{ isset($warehouse) ? $warehouse->name : '' }}" required class="form-control">
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">{{ isset($warehouse) ? 'Update' : 'Submit' }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Table -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive text-nowrap">
                        <table class="table" id="zero_config">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($warehouses as $key => $warehouse)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $warehouse->name }}</td>
                                        <td>{{ $warehouse->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ url('admin/warehouse/edit/' . $warehouse->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ url('admin/warehouse/delete/' . $warehouse->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection