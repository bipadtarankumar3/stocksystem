@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}
    </h6>

    <!-- Printable content starts -->
    <form action="{{ isset($room) ? url('admin/room/save_room/' . $room->id) : url('admin/room/save_room') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="card">
            <h5 class="card-header">Warehouse Billing</h5>
            <div class="card-body">
                <div id="printableArea">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="room_type" id="room_type" class="form-control">
                                    <option value="">-- Select Customer --</option>
                                    <option value="">Customer 1</option>
                                    <option value="">Customer 2</option>
                                    <option value="">Customer 3</option>
                                </select>
                                <label for="basic-default-name">Customer</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" value="{{ isset($room) ? $room->name : '' }}" name="name" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" value="{{ isset($room) ? $room->name : '' }}" name="name" class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Courier Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-12">
                            <h4>Room Images</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table_body_row">
                                    <tr>
                                        <td>
                                            <select name="room_type" id="room_type" class="form-control">
                                                <option value="">-- Select Product --</option>
                                                <option value="">C/M '10' 1200W (PILY)</option>
                                                <option value="">SWITCH '8'</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="document[]" class="form-control"></td>
                                        <td><input type="text" name="document[]" class="form-control"></td>
                                        <td><input type="text" name="document[]" class="form-control"></td>
                                        <td>
                                            <button type="button" onclick="add_more_row()" id="#add-more-row" class="btn btn-info waves-effect waves-light"><i class="fa-solid fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Preview
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
        <h5 class="modal-title" id="staticBackdropLabel">Print The Billing</h5>
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
        var newRow = `
        <tr>
            <td>
                <select name="room_type" id="room_type" class="form-control">
                    <option value="">-- Select Product --</option>
                    <option value="">C/M '10' 1200W (PILY)</option>
                    <option value="">SWITCH '8'</option>
                </select>
            </td>
            <td><input type="text" name="document[]" class="form-control"></td>
            <td><input type="text" name="document[]" class="form-control"></td>
            <td><input type="text" name="document[]" class="form-control"></td>
            <td>
                <button type="button" class="btn btn-danger waves-effect waves-light remove-row"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>`;
        $(".table_body_row").append(newRow);
    }

    // Remove row functionality
    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });
</script>
@endsection
