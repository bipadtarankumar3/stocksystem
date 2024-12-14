@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($condition) ? url('admin/requerment/conditionSave/' . $condition->id) : url('admin/requerment/conditionSave') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($room) ? 'Edit condition' : 'Add condition' }}</h5>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">-- Select Product --</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}" {{ isset($condition) && $condition->product_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                       
                                    </select>
                                    <label for="basic-default-name">Product</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="warehouse_id_one" id="warehouse_id_one" class="form-control">
                                        <option value="">-- Select warehouse  --</option>
                                        @foreach ($warehouses as $item)
                                            <option value="{{ $item->id }}" {{ isset($condition) && $condition->warehouse_id_one == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Warehouse 1</label>
                                </div>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="warehouse_id_two" id="warehouse_id_two" class="form-control">
                                        <option value="">-- Select warehouse 2 --</option>
                                        @foreach ($warehouses as $item)
                                            <option value="{{ $item->id }}" {{ isset($condition) && $condition->warehouse_id_two == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Warehouse 2</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="warehouse_id_three" id="warehouse_id_three" class="form-control">
                                        <option value="">-- Select warehouse 3 --</option>
                                        @foreach ($warehouses as $item)
                                            <option value="{{ $item->id }}" {{ isset($condition) && $condition->warehouse_id_three == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Warehouse 3</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="warehouse_id_four" id="warehouse_id_four" class="form-control">
                                        <option value="">-- Select warehouse 4 --</option>
                                        @foreach ($warehouses as $item)
                                            <option value="{{ $item->id }}" {{ isset($condition) && $condition->warehouse_id_four == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Warehouse 4</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" value="{{ isset($condition) ? $condition->quantity : '' }}" name="quantity" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Product Quantity</label>
                            </div>
                        </div>
                      

                        

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($condition) ? 'Update' : 'Submit' }}</button>
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