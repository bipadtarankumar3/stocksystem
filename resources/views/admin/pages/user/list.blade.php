@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="card">
    <h5 class="card-header">User List</h5>
    <div class="card-body">

      <div class="float-right my-2 text-right" style="text-align: right">
        <a href="{{URL::to('admin/user/add')}}"><button type="button" class="btn btn-warning">Add</button></a>
        
    </div>

      <div class="table-responsive text-nowrap">
      <table class="table" id="zero_config">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>SD Type</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
          @foreach ($users as $key=> $user)
              
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{ $user->sd->name ?? 'N/A' }}</td>

            <td>
                <a href="{{ url('admin/user/edit/' . $user->id) }}"><i class="fa-solid fa-pen"></i></a>
                <a href="{{URL::to('admin/user/delete/'.$user->id)}}"  onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
               
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