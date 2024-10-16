@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Vendor/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="card">
    <h5 class="card-header">User List</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
      <table class="table" id="zero_config">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            {{-- <th>Action</th> --}}
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
          <tr>
            <th scope="row">1</th>
            <td>Demo</td>
            <td>demo@user.com</td>
            <td>9933225544</td>
            {{-- <td>
                <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#"  onclick="deleteConfirmation(event)"><i class="fa-solid fa-trash"></i></a>
               
            </td> --}}
            
          </tr>

        </tbody>
      </table>
    </div>
    </div>
    
  </div>
</div>
@endsection