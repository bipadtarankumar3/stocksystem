@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-header">{{$title}}</h4>
                    <div class="card-body">
                        <form action="{{ isset($service) ? URL::to('vendor/hotel/service/edit-action/' . $service->id) : URL::to('vendor/hotel/service/add-action') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Hotel Service Name</label>
                                <input type="text" value="{{ isset($service) ? $service->service_name : '' }}" placeholder="Hotel Service Name" name="service_name" class="form-control">
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($service) ? 'Update' : 'Add New' }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $service->service_name }}</td>
                                            <td style="color: green">Publish</td>
                                            <td>{{ $service->created_at }}</td>
                                            <td>
                                                <a href="{{ URL::to('vendor/hotel/service/edit', $service->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('vendor/hotel/service/delete', $service->id) }}" onclick="deleteConfirmation(event)"><i class="fa-solid fa-trash"></i></a>
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
