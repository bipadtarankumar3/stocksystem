@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}
    </h6>

    <form action="{{ isset($product) ? url('admin/product/save_product/' . $product->id) : url('admin/product/save_product') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($product) ? 'Edit Item' : 'Add Item' }}</h5>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->name : '' }}" name="name" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Product Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" {{ isset($product) && $product->category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Category</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->one_no_cartoon : '' }}" name="one_no_cartoon" class="form-control" id="one_no_cartoon">
                                    <label for="one_no_cartoon">1 box price</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->one_cartoon : '' }}" name="one_cartoon" class="form-control" id="one_cartoon">
                                    <label for="one_cartoon">1 Cartoon price</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->two_no_cartoon : '' }}" name="two_no_cartoon" class="form-control" id="two_no_cartoon">
                                    <label for="two_no_cartoon">2  box price</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->two_cartoon : '' }}" name="two_cartoon" class="form-control" id="two_cartoon">
                                    <label for="two_cartoon">2 Cartoon price</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->three_no_cartoon : '' }}" name="three_no_cartoon" class="form-control" id="three_no_cartoon">
                                    <label for="three_no_cartoon">3  box price</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->three_cartoon : '' }}" name="three_cartoon" class="form-control" id="three_cartoon">
                                    <label for="three_cartoon">3 Cartoon price</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="uom_id" id="uom_id" class="form-control">
                                        <option value="">-- Select UOM --</option>
                                        @foreach ($uoms as $item)
                                            <option value="{{ $item->id }}" {{ isset($product) && $product->uom_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="uom_id">UOM</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->min_sale_qty : '' }}" name="min_sale_qty" class="form-control" id="min_sale_qty">
                                    <label for="min_sale_qty">Min Sale Qty</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($product) ? $product->uom_qty : '' }}" name="uom_qty" class="form-control" id="uom_qty">
                                    <label for="uom_qty">UOM Qty</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="ml" id="ml" class="form-control">
                                        <option value="YES" {{ isset($product) && $product->ml == 'YES' ? 'selected' : '' }}>YES</option>
                                        <option value="NO" {{ isset($product) && $product->ml == 'NO' ? 'selected' : '' }}>NO</option>
                                    </select>
                                    <label for="ml">ML</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="product_status" id="product_status" class="form-control">
                                        <option value="Active" {{ isset($product) && $product->product_status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ isset($product) && $product->product_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <label for="product_status">Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($product) ? 'Update' : 'Submit' }}</button>
                                <a href="{{URL::to('admin/product/list')}}">
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
            url: "{{URL::to('admin/product/delete_product_images/')}}" + "/" + id, // where you wanna post
            success: function(data) {
                // Handle success logic if necessary
            }
        });
        $(get_this).closest('tr').remove();
    }
</script>

@endsection
