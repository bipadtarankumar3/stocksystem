@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <div class="card-title mb-0">
      <h5 class="m-0 me-2">Vendor List</h5>
    </div>
    
</div>
    <div class="card-body table-responsive">
      <div class="table-responsive text-nowrap">
        <table class="table" id="zero_config">
          <thead>
            <tr class="text-nowrap">
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            
            </tr>
          </thead>
          <tbody class="table-border-bottom-0" >
                @foreach ($users as $key=> $user)
              
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>
                <a href="{{URL::To('vendor/dashboard-login',$user->id)}}">Dashboard</a>
                <a href="#"><i class="fa-solid fa-pen"></i></a>
                <a href="#"  onclick="deleteConfirmation(event)"><i class="fa-solid fa-trash"></i></a>
               
            </td>
            
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection