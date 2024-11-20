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
                            <a href="{{ URL::to('admin/product/stockAdd') }}">
                                <button type="button" class="btn btn-warning">Add stock</button>
                            </a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Warehouse Name</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/product/stockEdit', $stock->id) }}">
                                                <i class="fa fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="#" onclick="deleteConfirmation(event, {{ $stock->id }})">
                                                <i class="fa fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{ $stock->warehouse->name ?? 'No Warehouse Assigned' }}</td>
<td>{{ $stock->product->name ?? 'No Product Assigned' }}</td>

                                        <td>{{ $stock->quantity }}</td>
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
            window.location.href = '{{ url('admin/product/stockDelete') }}/' + productId;
        }
    }
</script>
@endsection
