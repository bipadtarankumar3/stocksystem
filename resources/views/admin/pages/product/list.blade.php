@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}
    </h6>

    <form action="" class="browser-default-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right my-2 text-right" style="text-align: right">
                            <a href="{{URL::to('admin/product/add')}}"><button type="button" class="btn btn-warning">Add Item</button></a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>UOM</th>
                                        <th>1 No. Cartoon</th>
                                        <th>1 Cartoon</th>
                                        <th>2 No. Cartoon</th>
                                        <th>2 Cartoon</th>
                                        <th>3 No. Cartoon</th>
                                        <th>3 Cartoon</th>
                                        <th>Min Sale Qty</th>
                                        <th>UOM Qty</th>
                                        <th>ML</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/product/edit', $product->id) }}">
                                                <i class="fa fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="#" onclick="deleteConfirmation(event, {{ $product->id }})">
                                                <i class="fa fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->uom ? $product->uom->name : 'N/A' }}</td>
                                        <td>{{ $product->one_no_cartoon }}</td>
                                        <td>{{ $product->one_cartoon }}</td>
                                        <td>{{ $product->two_no_cartoon }}</td>
                                        <td>{{ $product->two_cartoon }}</td>
                                        <td>{{ $product->three_no_cartoon }}</td>
                                        <td>{{ $product->three_cartoon }}</td>
                                        <td>{{ $product->min_sale_qty }}</td>
                                        <td>{{ $product->uom_qty }}</td>
                                        <td>{{ $product->ml }}</td>
                                        <td>{{ $product->product_status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    function deleteConfirmation(event, productId) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this product?')) {
            window.location.href = '{{ url('admin/product/delete') }}/' + productId;
        }
    }
</script>
@endsection
