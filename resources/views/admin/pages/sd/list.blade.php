@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="row">
    <div class="col-md-3">
      <div class="card">
          <h4 class="card-header">Add SD</h4>
          <div class="card-body">
            <form action="{{ URL::To('admin/experiance/category/add-action-category')}}" method="post">
              @csrf
              <input type="hidden" name="experiance_category" value="{{ isset($category) ? 'update' : 'add' }}">
              <input type="hidden" name="experiance_category_id" value="{{ isset($category) ? $category->id : '' }}">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" placeholder="SD Name" required name="category_name" value="{{ isset($category) ? $category->category_name : '' }}" class="form-control">
              </div>
            

              <button class="btn btn-primary mt-2" type="button">{{ isset($category) ? 'Update' : 'Submit' }}</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-9">
<div class="card">
    {{-- <h5 class="card-header">User List</h5> --}}
    <div class="card-body">

    
    <div class="table-responsive text-nowrap">
      <table class="table" id="zero_config">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
   
            <tr>
                <th scope="row">1</th>
                <td>SD</td>
                <td>
                    <a href=""><i class="fa fa-solid fa-pen-to-square"></i></a>
                    <a href="" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
                </td>
            </tr>
            

        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
    </div>
</div>

@endsection