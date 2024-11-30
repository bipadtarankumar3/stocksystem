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
                <h4 class="card-header">{{ isset($sd) ? 'Edit sd' : 'Add sd' }}</h4>
                <div class="card-body">
                    <form action="{{ URL::to('admin/sd/sdForm') }}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="{{ isset($sd) ? 'update' : 'add' }}">
                        <input type="hidden" name="id" value="{{ isset($sd) ? $sd->id : '' }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="sd Name" value="{{ isset($sd) ? $sd->name : '' }}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Muthiya Cost</label>
                            <select name="muthiya_cost" id="muthiya_cost" class="form-control">
                                <option value="Yes" @if(isset($sd) && $sd->muthiya_cost == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if(isset($sd) && $sd->muthiya_cost == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Gst</label>
                             <select name="gst" id="gst" class="form-control">
                                <option value="Yes" @if(isset($sd) && $sd->gst == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if(isset($sd) && $sd->gst == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">GST received</label>
                             <select name="gst_received" id="gst_received" class="form-control">
                                <option value="Yes" @if(isset($sd) && $sd->gst_received == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if(isset($sd) && $sd->gst_received == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">{{ isset($sd) ? 'Update' : 'Submit' }}</button>
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
                                    <th>Muthiya Cost</th>
                                    <th>Gst</th>
                                    <th>Gst Received</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sds as $key => $sd)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sd->name }}</td>
                                        <td>{{ $sd->muthiya_cost }}</td>
                                        <td>{{ $sd->gst }}</td>
                                        <td>{{ $sd->gst_received }}</td>
                                        <td>
                                            <a href="{{ url('admin/sd/edit/' . $sd->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ url('admin/sd/delete/' . $sd->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
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
