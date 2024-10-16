@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Vendor/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="card">
    <h5 class="card-header">{{$title}}</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
      <table class="table" id="zero_config">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>ID</th>
            <th>Note</th>
            <th>Amount</th>
            <th>Payout Method</th>
            <th>Created At</th>
            <th>Status</th>
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
          <tr>
            <th scope="row">1</th>
            <td>125</td>
            <td>Payment March</td>
            <td>57888</td>
            <td>upi</td>
            <td>26/02/2024</td>
            <td>pending</td>
            
            
          </tr>

        </tbody>
      </table>
    </div>
    </div>
    
  </div>
</div>
@endsection