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
                            <a href="{{ URL::to('admin/billing/add') }}"><button type="button" class="btn btn-warning">Add Billing</button></a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Serial No</th>
                                        <th>Customer ID</th>
                                        <th>Courier to Kolkata</th>
                                        <th>Courier</th>
                                        <th>Transport</th>
                                        <th>Date</th>
                                        <th>GST</th>
                                        <th>GST Received</th>
                                        <th>Muthiya Cost</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billings as $key => $billing)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/billing/edit/' . $billing->id) }}">Edit</a>
                                                <a href="{{ URL::to('admin/billing/delete/' . $billing->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                            <td>{{ $billing->serial_no }}</td>
                                            <td>{{ $billing->customer->name??'' }}</td>
                                            <td>{{ $billing->courier_to_kolkata }}</td>
                                            <td>{{ $billing->courier }}</td>
                                            <td>{{ $billing->transport }}</td>
                                            <td>{{ $billing->date }}</td>
                                            <td>{{ $billing->gst }}</td>
                                            <td>{{ $billing->gst_received }}</td>
                                            <td>{{ $billing->muthiya_cost }}</td>
                                            <td>{{ $billing->grand_total }}</td>
                                            <td>{{ $billing->status }}</td>
                                            <td>{{ $billing->created_at }}</td>
                                            <td>{{ $billing->updated_at }}</td>
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
