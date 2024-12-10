@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}
    </h6>

    <!-- Printable content starts -->
    <form action="{{ isset($billing) ? url('admin/billing/print_billing/' . $billing->id) : url('admin/billing/print_billing') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="card">
            <h5 class="card-header">Warehouse Billing</h5>
            <div class="card-body">
                <div id="printableArea">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" name="serial_no" value="1" name="serial_no" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Serial number </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="customer_id" id="customer_id" class="form-control" onchange="getCustomerType(this.value)">
                                    <option value="">-- Select Customer --</option>
                                    @foreach ($customers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    
                                </select>
                                <label for="basic-default-name">Customer</label>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="sd_id" id="sd_id" class="form-control" onchange="getSDType(this)">
                                    <option value="">-- Select Type --</option>
                                    @foreach ($sds as $item)
                                        <option value="{{ $item->id }}"
                                            data-gst="{{ $item->gst }}" 
                                            data-muthiya-cost="{{ $item->muthiya_cost }}" 
                                            data-gst-received="{{ $item->gst_received }}"
                                            >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label for="basic-default-name">SD Type</label>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text"  value="{{ isset($room) ? $room->name : '' }}" name="courier_to_kolkata" class="form-control" id="basic-default-name">
                              
                                <label for="basic-default-name">Courier To Kolkata</label>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" value="{{ isset($room) ? $room->name : '' }}" name="courier" class="form-control" id="basic-default-name">
                              
                                <label for="basic-default-name">Courier</label>
                            </div>
                        </div>  
                        
                        <div class="col-md-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" value="{{ isset($room) ? $room->transport : '' }}" name="transport" class="form-control" id="basic-default-name">
                              
                                <label for="basic-default-name">Transport </label>
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" value="{{ isset($room) ? $room->date : date('Y-m-d') }}" name="date" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Date</label>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row my-4">
                        <div class="col-md-12">
                            <h4>Add Products</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>No Of pkgs </th>
                                        <th>Product</th>
                                        
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table_body_row">
                                    <tr>
                                        <td style="width: 20%;">
                                            <select name="warehouse[]" id="warehouse" class="form-control warehouse">
                                              
                                                @foreach ($warehouse as $item)
                                                    <option value="{{$item->id}}" @if($item->name == 'ML') selected @endif>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="no_of_pkgs[]" class="form-control"></td>
                                        <td style="width: 20%;">
                                            <select name="product[]" class="form-control product-select" onchange="updatePrice(this)">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $item)
                                                    <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" name="quantity[]" class="form-control quantity-input" onkeyup="updateTotal(this)" ></td>
                                        <td><input type="text" name="price[]" class="form-control price-input" value="0" onkeyup="updateTotal(this)" ></td>
                                        <td><input type="text" name="total[]" class="form-control total-input" ></td>
                                        <td>
                                            <button type="button" onclick="add_more_row()" class="btn btn-info waves-effect waves-light">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    

                                </tbody>
                                <tfoot>
                                    <tr id="muthiyaCost" style="display: none">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Muthiya Cost </td>
                                        <td>
                                            <input type="text" value="0" name="muthiya_cost" id="muthiya_cost" class="form-control" onkeyup="calculateGrandTotal()">
                                        </td>
                                    </tr>
                                    <tr id="GST" style="display: none">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>GST</td>
                                        <td>
                                            <input type="text" value="0" name="gst" id="gst" class="form-control" onkeyup="calculateGrandTotal()">
                                        </td>
                                    </tr>
                                    <tr id="GSTReceived" style="display: none">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>GST Received</td>
                                        <td>
                                            <input type="text" value="0" name="gst_received" id="gst_received" class="form-control" onkeyup="calculateGrandTotal()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total Cost </td>
                                        <td>
                                            <span id="grand_total_span"></span>
                                            <input type="hidden" name="grand_total" class="form-control grand_total" id="grand_total">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                        <button type="submit" name="customer_copy" value="customer_copy" class="btn btn-primary" >
                            Customer copy
                        </button>
                        <button type="submit" name="self_copy" value="self_copy" class="btn btn-warning" >
                            Self copy
                        </button>
                        <!--<button class="btn btn-primary mt-2" type="button" onclick="printDiv('printableArea')">Preview</button>-->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Printable content ends -->
</div>





<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Preview The Bill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row"  id="printData">
            <table class="table table-bordered">
  <tbody>
    <!-- First row: Date and Name -->
    <tr>
      <td style="width: 25%;"><strong>Date</strong></td>
      <td colspan="3">20.12.2024</td>
    </tr>
    <tr>
      <td style="width: 25%;"><strong>Name</strong></td>
      <td colspan="3">Taifiq Metaiburz</td>
    </tr>

    <!-- Second row: Grand Total -->
    <tr class="table-primary">
      <td><strong>Grand Total</strong></td>
      <td colspan="3"><strong>1000</strong></td>
    </tr>

    <!-- Third row: Title "Muthiya" -->
    <tr class="table-secondary">
      <td colspan="4" class="text-center"><strong>Muthiya</strong></td>
    </tr>

    <!-- Fourth row: Item details -->
    <tr>
      <td style="width: 25%;">180</td>
      <td>T/STAND 2</td>
      <td>9.0</td>
      <td>1620.0</td>
    </tr>

    <!-- Fifth row: Item details -->
    <tr>
      <td>10</td>
      <td>EXIL W/O CARBON</td>
      <td>18.0</td>
      <td>180.0</td>
    </tr>
  </tbody>
</table>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  onclick="printDiv('printData')">Print</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
    // Print specific div content
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var printWindow = window.open('', '', 'height=600,width=800');

    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('table, th, td { border: 1px solid black; padding: 8px; }');
    printWindow.document.write('table th { background-color: #f2f2f2; }'); // Optional, for better table header styling
    printWindow.document.write('</style></head><body>');
    printWindow.document.write('<div>' + printContents + '</div>');
    printWindow.document.write('</body></html>');
    
    printWindow.document.close(); // Close the document stream
    printWindow.focus(); // Focus on the print window

    // Trigger the print functionality
    printWindow.print();

    // Close the print window automatically after printing
    printWindow.onafterprint = function () {
        printWindow.close();
    };
}


    // Add more row functionality
    function add_more_row() {
    var warehouseOptions = `
        @foreach ($warehouse as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    `;

    var productOptions = `
        @foreach ($products as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    `;

    var newRow = `
        <tr>
            <td style="width: 20%;">
                <select name="warehouse[]" id="warehouse" class="form-control warehouse">
                    <option value="">Select Location</option>
                    ${warehouseOptions}
                </select>
            </td>
            <td><input type="text" name="no_of_pkgs[]" class="form-control"></td>
            <td style="width: 20%;">
                <select name="product[]" id="product" class="form-control">
                    <option value="">Select Product</option>
                    ${productOptions}
                </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control quantity" oninput="calculateTotal(this)"></td>
            <td><input type="number" name="price[]" class="form-control price" oninput="calculateTotal(this)"></td>
            <td><input type="number" name="total[]" class="form-control total" readonly></td>
            <td>
                <button type="button" class="btn btn-danger waves-effect waves-light remove-row"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    `;
    $(".table_body_row").append(newRow);
}


function updateTotal(element) {
    const row = element.closest('tr'); // Get the current row
    const quantityInput = row.querySelector('.quantity-input'); // Quantity input in the current row
    const priceInput = row.querySelector('.price-input'); // Price input in the current row
    const totalInput = row.querySelector('.total-input'); // Total input in the current row

    // Get quantity and price values
    const quantity = parseFloat(quantityInput.value) || 0; // Default to 0 if invalid
    const price = parseFloat(priceInput.value) || 0; // Default to 0 if invalid

    // Calculate the total for the row
    const total = quantity * price;

    // Update the total input field
    totalInput.value = total.toFixed(2); // Set to 2 decimal places

    // Recalculate the sum of all totals
    calculateGrandTotal();
}

function calculateGrandTotal() {
    let grandTotal = 0;

    // Iterate through all total input fields to sum up their values
    document.querySelectorAll('.total-input').forEach((input) => {
        const total = parseFloat(input.value) || 0; // Default to 0 if invalid
        grandTotal += total;
    });

    console.log(grandTotal);

    // Safely get the values of other fields
    const muthiya_cost = parseFloat(document.getElementById('muthiya_cost')?.value || 0);
    const gst = parseFloat(document.getElementById('gst')?.value || 0);
    const gst_received = parseFloat(document.getElementById('gst_received')?.value || 0);

    const grand_total = grandTotal + muthiya_cost + gst + gst_received;

    // Update the grand total display
    const grandTotalElementSpan = document.getElementById('grand_total_span');
    const grandTotalElement = document.getElementById('grand_total');

    if (grandTotalElementSpan) {
        grandTotalElementSpan.textContent = `Grand Total: ${grand_total.toFixed(2)}`;
    }
    if (grandTotalElement) {
        grandTotalElement.value = `${grand_total.toFixed(2)}`;
    }
}





// Function to calculate the total
// function calculateTotal(element) {
//     var row = $(element).closest('tr');
//     var quantity = parseFloat(row.find('.quantity').val()) || 0;
//     var price = parseFloat(row.find('.price').val()) || 0;
//     var total = quantity * price;
//     row.find('.total').val(total.toFixed(2));
// }

// Remove row functionality
$(document).on('click', '.remove-row', function() {
    $(this).closest('tr').remove();
});


    function calculateTotal(element) {
    var row = $(element).closest('tr');
    var quantity = parseFloat(row.find('.quantity').val()) || 0;
    var price = parseFloat(row.find('.price').val()) || 0;
    var total = quantity * price;
    row.find('.total').val(total.toFixed(2));
}

    // Remove row functionality
    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });

    function getCustomerType(type) {
        // if (type == 'SD1') {
        //     $('#muthiyaCost').show();
        //     $('#GST').hide();
        //     $('#GSTReceived').hide();
        // } else if(type == 'SD2') {
        //     $('#muthiyaCost').hide();
        //     $('#GST').show();
        //     $('#GSTReceived').show();
        // }else if(type == 'SD3') {
        //     $('#muthiyaCost').hide();
        //     $('#GST').show();
        //     $('#GSTReceived').show();
        
        // }else {
        //     $('#muthiyaCost').hide();
        //     $('#GST').hide();
        //     $('#GSTReceived').hide();
        // }
    }


    function getSDType(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];

        // Get data attributes from the selected option
        const gst = selectedOption.getAttribute('data-gst');
        const muthiyaCost = selectedOption.getAttribute('data-muthiya-cost');
        const gstReceived = selectedOption.getAttribute('data-gst-received');

        let displayValue = '';

        // Determine which value to display based on the existence of values
        if (gst == 'Yes') {
            $('#GST').show();
        } else {
            $('#GST').hide();
        }

        if (muthiyaCost == 'Yes') {
            $('#muthiyaCost').show();
        }else{
            $('#muthiyaCost').hide();
        }
        if (gstReceived == 'Yes') {
            $('#GSTReceived').show();
        }else{
            $('#GSTReceived').hide();
        }

    }

</script>
@endsection
