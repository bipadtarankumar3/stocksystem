@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <h4 class="card-header">
                        {{ isset($amenity) ? 'Edit Amenity' : 'Add New Amenity' }}
                        <a href="https://fontawesome.com/search" target="_blank"><i class="fa-solid fa-link"></i> Icon</a>
                    </h4>
                    <div class="card-body">
                        <form action="{{ isset($amenity) ? URL::to('vendor/room/amenity/update/' . $amenity->id) : URL::to('vendor/room/amenity/add-action') }}" method="post">
                            @csrf
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ isset($amenity) ? $amenity->icon : '' }}" required>
                                <label for="icon">Icon</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="amenities_name" name="amenities_name" value="{{ isset($amenity) ? $amenity->name : '' }}" required>
                                <label for="amenities_name">Amenities Name</label>
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($amenity) ? 'Update' : 'Add New' }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($amenities as $key => $amenity)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{!! $amenity->icon !!}</td>
                                            <td>{{ $amenity->name }}</td>
                                            <td style="color: {{ $amenity->status == 'publish' ? 'green' : 'red' }}">{{ $amenity->status }}</td>
                                            <td>{{ $amenity->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ URL::to('vendor/room/amenity/edit', $amenity->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('vendor/room/amenity/delete', $amenity->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
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
