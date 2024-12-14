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
                            
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Warehouse Name</th>
                                        <th>Product Name</th>
                                        <th>Minimum Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requirements as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                      
                                        <td>{{ $stock->warehouse->name ?? 'No Warehouse Assigned' }}</td>
                                        <td>{{ $stock->product->name ?? 'No Product Assigned' }}</td>
                                        
                                        <td>{{ $stock->minimum_quantity }}</td>
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
            window.location.href = '{{ url('admin/requerment/conditionDelete') }}/' + productId;
        }
    }
</script>
@endsection
