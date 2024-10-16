@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($room) ? url('admin/room/save_room/' . $room->id) : url('admin/room/save_room') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($room) ? 'Edit Room' : 'Add Room' }}</h5>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" value="{{ isset($room) ? $room->name : '' }}" name="name" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Room Name</label>
                            </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="room_type" id="room_type" class="form-control">
                                <option value="">-- Select Room Type --</option>
                                @foreach ($roomTypes as $item)
                                <option value="{{ $item->id }}" {{ isset($room) && $room->room_type == $item->id ? 'selected' : '' }}>{{ $item->type }}</option>
                                @endforeach
                            </select>
                            <label for="basic-default-name">Room Type</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file" name="bed_room" class="form-control" id="bed_room" placeholder="Bed Room" {{ isset($room) ? '' : 'required' }}>
                                    <label for="bed_room">Bed Room</label>
                                    @if(isset($room) && $room->bed_room)
                                    <img src="{{ URL::to('public/'.$room->bed_room) }}" alt="Feature Image" width="100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file" name="washroom" class="form-control" id="washroom" placeholder="Washroom" {{ isset($room) ? '' : 'required' }}>
                                    <label for="washroom">Washroom</label>
                                    @if(isset($room) && $room->washroom)
                                    <img src="{{ URL::to('public/'.$room->washroom) }}" alt="Feature Image" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file" name="kitchen" class="form-control" id="kitchen" placeholder="Kitchen" {{ isset($room) ? '' : 'required' }}>
                                    <label for="kitchen">Kitchen</label>
                                    @if(isset($room) && $room->kitchen)
                                    <img src="{{ URL::to('public/'.$room->kitchen) }}" alt="Feature Image" width="100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file" name="balcony" class="form-control" id="balcony" placeholder="Balcony" {{ isset($room) ? '' : 'required' }}>
                                    <label for="balcony">Balcony</label>
                                    @if(isset($room) && $room->balcony)
                                    <img src="{{ URL::to('public/'.$room->balcony) }}" alt="Feature Image" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12">
                                <h4>Room Images</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_body_row">
                                        <!-- Loop through existing images if in edit mode -->

                                        <tr>
                                            <td><input type="text" name="document_text_name[]" class="form-control" placeholder="Name"></td>
                                            <td><input type="file" name="document[]" class="form-control"></td>
                                            <td>
                                                <button type="button" onclick="add_more_row()" id="#add-more-row" class="btn btn-info waves-effect waves-light"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                        </tr>

                                        @if(isset($room))
                                        @foreach ($documents as $image)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="image_id[]" value="{{ $image->id }}">
                                                <input type="text" readonly name="document_text_name_update[]" class="form-control" value="{{ $image->text_name }}">
                                            </td>
                                            <td>

                                                <img src="{{ URL::to('public/upload/'.$image->image_name) }}" alt="Feature Image" width="40">

                                            </td>
                                            <td>
                                                <button onclick="remove_row_with_data(this,'{{$image->id}}')" class="btn btn-danger waves-effect waves-light"><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Additional form fields, populated with data if in edit mode -->
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="file" name="feature_image" class="form-control" id="basic-default-name" placeholder="Feature Image">
                            <label for="basic-default-name">Feature Image</label>
                            @if(isset($room) && $room->feature_image)
                            <img src="{{ URL::to('public/'.$room->feature_image) }}" alt="Feature Image" width="100">
                            @endif
                        </div>
                        <!-- Repeat similar blocks for other fields like price, no_of_rooms, etc. -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->price : '' }}" name="price" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Price</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->no_of_rooms : '' }}" name="no_of_rooms" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Number Of Rooms</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" value="{{ isset($room) ? $room->minimum_day_stay : '' }}" name="minimum_day_stay" class="form-control" id="basic-default-name">
                            <label for="basic-default-name">Minimum Days Stay Requirments</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->no_of_beds : '' }}" name="no_of_beds" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Number Of Beds</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->room_size : '' }}" name="room_size" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Room Size</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->max_adults : '' }}" name="max_adults" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Max Adults</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->max_children : '' }}" name="max_children" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Max Children</label>
                                </div>
                            </div>
                        </div>

                        <!-- Repeat for other fields -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Room Amenities</h5>
                                @php
                                // dd(explode(',',$room->room_amenities));
                                @endphp
                                @foreach ($amenities as $item)
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="room_amenities[]" class="form-check-input" id="basic-default-checkbox" value="{{ $item->id }}" {{ isset($room) && in_array($item->id, explode(',',$room->room_amenities)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="basic-default-checkbox">{!! $item->icon !!} {{ $item->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" name="import_url" class="form-control" value="{{ isset($room) ? $room->import_url : '' }}">
                                    <label for="basic-default-name">Import Url</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select class="form-select" name="status" id="bs-validation-country">
                                        <option value="draft" {{ isset($room) && $room->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="publish" {{ isset($room) && $room->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                    </select>
                                    <label class="form-label" for="bs-validation-country">Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($room) ? 'Update' : 'Add New' }}</button>
                                <a href="{{URL::to('admin/room/list')}}">
                                    <button class="btn btn-success mt-2" type="button">Back</button>

                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection


@section('js')

<script>
    $(document).ready(function() {
        // Remove row
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });


    function add_more_row() {
        var newRow = '<tr>' +
            '<td><input type="text" name="document_text_name[]" class="form-control" placeholder="Name"></td>' +
            '<td><input type="file" name="document[]" class="form-control"></td>' +
            '<td><button type="button" class="btn btn-danger waves-effect waves-light remove-row"><i class="fa-solid fa-trash"></i></button></td>' +
            '</tr>';
        $(".table_body_row").append(newRow)
    }

    function remove_row_with_data(get_this, id) {

        $.ajax({
            type: "GET",
            url: "{{URL::to('admin/room/delete_room_images/')}}" + "/" + id, // where you wanna post
            data: {
                'id': ''
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            },
            success: function(data) {

            }
        });

        $(get_this).closest('tr').remove();


    }
</script>

@endsection