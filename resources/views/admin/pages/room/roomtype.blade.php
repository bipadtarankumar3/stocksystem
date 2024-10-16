@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <h4 class="card-header">
                        {{ isset($roomType) ? 'Edit Room Type' : 'Add New Room Type' }}
                    </h4>
                    <div class="card-body">
                        <form action="{{ isset($roomType) ? URL::to('admin/room/type/update/' . $roomType->id) : URL::to('admin/room/type/add-action') }}" method="post">
                            @csrf
                        
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', isset($roomType) ? $roomType->type : '') }}" required>
                                <label for="type">Type</label>
                            </div>
                        
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="status" class="form-select" id="status" required>
                                    <option value="publish" {{ old('status', isset($roomType) && $roomType->status == 'publish' ? 'selected' : '') }}>Publish</option>
                                    <option value="draft" {{ old('status', isset($roomType) && $roomType->status == 'draft' ? 'selected' : '') }}>Draft</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($roomType) ? 'Update' : 'Add New' }}</button>
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
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($roomTypes as $key => $roomType)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $roomType->type }}</td>
                                            <td style="color: {{ $roomType->status == 'publish' ? 'green' : 'red' }}">{{ $roomType->status }}</td>
                                            <td>{{ $roomType->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/room/type/edit', $roomType->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/room/type/delete', $roomType->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
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
