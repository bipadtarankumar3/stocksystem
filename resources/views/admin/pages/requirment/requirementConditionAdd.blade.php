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
                    <h5 class="card-header">{{ isset($room) ? 'Edit Stock' : 'Requerment condition' }}</h5>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control">
                                        <option value="">-- Select Product --</option>
                                        <option value="">C/M ''10'' 1200W (PILY)</option>
                                        <option value="">SWITCH ''8''</option>
                                       
                                    </select>
                                    <label for="basic-default-name">Product</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($room) ? $room->name : '' }}" name="name" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Minimum requirment</label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control">
                                        <option value="">-- Select Type --</option>
                                        <option value="">ML </option>
                                        <option value="">NG </option>
                                        <option value="">SD </option>
                                    </select>
                                    <label for="basic-default-name">First Checking</label>
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control">
                                        <option value="">-- Select Type --</option>
                                        <option value="">ML </option>
                                        <option value="">NG </option>
                                        <option value="">SD </option>
                                    </select>
                                    <label for="basic-default-name">Second Checking</label>
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control">
                                        <option value="">-- Select Type --</option>
                                        <option value="">ML </option>
                                        <option value="">NG </option>
                                        <option value="">SD </option>
                                    </select>
                                    <label for="basic-default-name">Third Checking</label>
                                </div>
                            </div>  
                        </div>
                      
                      

                        

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="button">{{ isset($room) ? 'Update' : 'Submit' }}</button>
                                <a href="{{URL::to('admin/requerment/condition')}}">
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