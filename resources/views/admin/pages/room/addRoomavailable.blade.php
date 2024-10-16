@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($room) ? url('admin/room/save_roomavailable/' . $room->id) : url('admin/room/save_roomavailable') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($room) ? 'Edit Room Avaibale' : 'Add Room Avaibale' }}</h5>
                    <div class="card-body">
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="hotel_id" id="hotel_id" class="form-control">
                                <option value="">-- Select Hotel --</option>
                                @foreach ($hotels as $item)
                                <option value="{{ $item->id }}" {{ isset($room) && $room->hotel_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                            <label for="basic-default-name">Hotel</label>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_id" id="room_id" class="form-control">
                                        <option value="">-- Select Room --</option>
                                        @foreach ($rooms as $item)
                                        <option value="{{ $item->id }}" {{ isset($room) && $room->room_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Room</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                             
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($room) ? $room->no_of_rooms : '' }}" name="no_of_rooms" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Number Of Rooms</label>
                                    </div>
                               
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="" name="amount" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Price</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="month" value="" name="available_month" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Month</label>
                                </div>
                            </div>
                        </div>
                       

                        {{-- @if(isset($room_date) && $room_date->isNotEmpty())
                            @foreach($room_date as $index => $date)
                            <div class="row added_row">
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date" value="{{ $date->form_date }}" name="form_date" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Form Date</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date" value="{{ $date->to_date }}" name="to_date" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">To Date</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ $date->amount }}" name="amount" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Price</label>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                        @else
                            <div class="row added_row">
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date" value="{{ isset($room) ? $room->form_date : '' }}" name="form_date" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Form Date</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date" value="{{ isset($room) ? $room->to_date : '' }}" name="to_date" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">To Date</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($room) ? $room->amount : '' }}" name="amount" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Price</label>
                                    </div>
                                </div>
                               
                            </div>
                        @endif --}}
                        
                        
                        

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($room) ? 'Update' : 'Add New' }}</button>
                                <a href="{{URL::to('admin/room/avalibility')}}">
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


    $(document).ready(function() {
    // Add more rows dynamically
    $(document).on('click', '.add-more-row', function() {
        var newRow = `
            <div class="row added_row">
                <div class="col-md-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="date" name="rad_available_date[]" class="form-control" id="basic-default-name">
                        <label for="basic-default-name">Available Date</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" name="rad_amount[]" class="form-control" id="basic-default-name">
                        <label for="basic-default-name">Price</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </div>
            </div>`;
        
        $('#dynamic-rows-container').append(newRow);
    });

    // Remove row
    $(document).on('click', '.remove-row', function() {
        $(this).closest('.added_row').remove();
    });
});


</script>

@endsection