@extends('admin.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">{{ $title }}</h3>
        </div>
        <div class="card-body" id="printableArea">
            <!-- Display Submitted Data -->
            <h4>Customer Details</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Serial No:</th>
                    <td>{{ $formData['serial_no'] }}</td>
                </tr>
                <tr>
                    <th>Customer:</th>
                    <td>
                        @php
                            $customer = $customers->firstWhere('id', $formData['customer_id']);
                        @endphp
                        {{ $customer ? $customer->name : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>SD Type:</th>
                    <td>
                        @php
                            $sd = $sds->firstWhere('id', $formData['sd_id']);
                        @endphp
                        {{ $sd ? $sd->name : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>Courier to Kolkata:</th>
                    <td>{{ $formData['courier_to_kolkata'] }}</td>
                </tr>
                <tr>
                    <th>Courier:</th>
                    <td>{{ $formData['courier'] }}</td>
                </tr>
                <tr>
                    <th>Transport:</th>
                    <td>{{ $formData['transport'] }}</td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td>{{ \Carbon\Carbon::parse($formData['date'])->format('d-m-Y') }}</td>
                </tr>
            </table>

            <!-- Display Products Table -->
            <h4 class="mt-4">Items</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy')
                         <th>Location</th>   
                        @endif
                        
                        <th>No of Pkgs</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formData['warehouse'] as $index => $warehouseId)
                        <tr>
                            @if (isset($formData['customer_copy']) && $formData['customer_copy'] == 'customer_copy')
                            <td>
                                @php
                                    $warehouseItem = $warehouse->firstWhere('id', $warehouseId);
                                @endphp
                                {{ $warehouseItem ? $warehouseItem->name : 'N/A' }}
                            </td>
                            @endif
                            <td>{{ $formData['no_of_pkgs'][$index] }}</td>
                            <td>
                                @php
                                    $product = $products->firstWhere('id', $formData['product'][$index]);
                                @endphp
                                {{ $product ? $product->name : 'N/A' }}
                            </td>
                            <td>{{ $formData['quantity'][$index] }}</td>
                            <td>{{ number_format($formData['price'][$index], 2) }}</td>
                            <td>{{ number_format($formData['total'][$index], 2) }}</td>
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
            <button onclick="printDiv('printableArea')" class="btn btn-primary">
                <i class="fa fa-print"></i> Print
            </button>
        </div>
    </div>
</div>

<script>
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
