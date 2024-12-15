@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">{{ $title }}</h3>
        </div>
        <div class="card-body" id="printableArea" data-form-data='@json($formData)'>
            <!-- Display Submitted Data -->
            <h4>Customer Details</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Serial No:</th>
                    <td>{{ $billing->serial_no }}</td>
                </tr>
                <tr>
                    <th>Customer:</th>
                    <td>
                        @php
                            $customer = $customers->firstWhere('id', $billing->customer_id);
                        @endphp
                        {{ $customer ? $customer->name : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>SD Type:</th>
                    <td>
                        @php
                            $sd = $sds->firstWhere('id', $billing->sd_id);
                        @endphp
                        {{ $sd ? $sd->name : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>Courier to Kolkata:</th>
                    <td>{{ $billing->courier_to_kolkata }}</td>
                </tr>
                <tr>
                    <th>Courier:</th>
                    <td>{{ $billing->courier }}</td>
                </tr>
                <tr>
                    <th>Transport:</th>
                    <td>{{ $billing->transport }}</td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td>{{ \Carbon\Carbon::parse($billing->date)->format('d-m-Y') }}</td>
                </tr>
            </table>

            <!-- Display Products Table -->
            <h4 class="mt-4">Items</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                         <th>Location</th>   
                        <th>No of Pkgs</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billing->warehouses as $index => $data)
                        <tr>
                          
                            <td>
                                @php
                                    $warehouseItem = $warehouse->firstWhere('id', $data->warehouse);
                                @endphp
                                {{ $warehouseItem ? $warehouseItem->name : 'N/A' }}
                            </td>
                      
                            <td>{{ $data->on_of_package }}</td>
                            <td>
                                @php
                                    $product = $products->firstWhere('id', $formData['product'][$index]);
                                @endphp
                                {{ $product ? $product->name : 'N/A' }}
                            </td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ number_format($data->price, 2) }}</td>
                            <td>{{ number_format($data->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    @if (isset($sdDetails) && $sdDetails->muthiya_cost == 'Yes')
                        <tr id="muthiyaCost" >
                            <td @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy') colspan="4" @else colspan="3" @endif></td>
                            <td>Muthiya Cost</td>
                            <td>
                                <b>{{ $formData['muthiya_cost'] }}</b>
                                <input type="hidden" value="{{ $formData['muthiya_cost'] }}" name="" class="form-control">
                            </td>
                        </tr>
                    @endif

                    @if (isset($sdDetails) && $sdDetails->gst == 'Yes')
                        <tr id="GST" >
                            <td @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy') colspan="4" @else colspan="3" @endif></td>
                            <td>GST</td>
                            <td>
                                <b>{{ $formData['gst'] }}</b>
                                <input type="hidden" value="{{ $formData['gst'] }}" name="" class="form-control">
                            </td>
                        </tr>
                    @endif

                    @if (isset($sdDetails) && $sdDetails->gst_received == 'Yes')
                        <tr id="GSTReceived" >
                            <td @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy') colspan="4" @else colspan="3" @endif></td>
                            <td>GST Received</td>
                            <td>
                                <b>{{ $formData['gst_received'] }}</b>
                                <input type="hidden" value="{{ $formData['gst_received'] }}" name="" class="form-control">
                            </td>
                        </tr>
                    @endif

                    
                    <tr>
                        <td @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy') colspan="4" @else colspan="3" @endif></td>
                        <td>Grand Total Cost</td>
                        <td>
                            <b>{{ $formData['grand_total'] }}</b>
                            <input type="hidden" value="{{ $formData['grand_total'] }}" name="" class="form-control">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Print Button -->
        <div class="card-footer text-end">
            
            <button onclick="printCustomerDiv('printableArea')" class="btn btn-primary">
                <i class="fa fa-print"></i> Print
            </button>
      
            <button onclick="printDiv('printableArea')" class="btn btn-primary">
                <i class="fa fa-print"></i> Copy Print
            </button>
     

        </div>
    </div>
</div>

<script>

    function printCustomerDiv(divId) {
        // Retrieve encoded form data
        const formData = document.getElementById(divId).getAttribute('data-form-data');

        // Perform the AJAX request
        $.ajax({
            url: "{{ URL::to('admin/billing/bill-product-minus') }}",
            method: 'POST',
            data: {
                product_details: JSON.parse(formData), // Parse the JSON data
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                // Handle the print logic
                var printContents = document.getElementById(divId).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;

                location.reload(); // Reload to restore the original layout
            }
        });
    }


    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Reload to restore the original layout
    }

</script>
@endsection
