@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="row">
    <div class="col-md-3">
      <div class="card">
          <h4 class="card-header">Add Category</h4>
          <div class="card-body">
            <form action="{{ URL::To('vendor/experiance/category/add-action-category')}}" method="post">
              @csrf
              <input type="hidden" name="experiance_category" value="{{ isset($category) ? 'update' : 'add' }}">
              <input type="hidden" name="experiance_category_id" value="{{ isset($category) ? $category->id : '' }}">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" placeholder="Category Name" name="category_name" value="{{ isset($category) ? $category->category_name : '' }}" class="form-control">
              </div>
              <div class="form-group">
                  <label for="name">Icon Class</label>
                  <input type="text" placeholder="Icon Class" name="icon_class" class="form-control" value="{{ isset($category) ? $category->icon_class : '' }}">

              </div>

              <button class="btn btn-primary mt-2" type="submit">{{ isset($category) ? 'Update' : 'Add New' }}</button>
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
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
          @foreach ($lists as $key => $cat)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $cat->category_name }}</td>
                <td style="color: green">Publish</td>
                <td>{{ $cat->created_at }}</td>
                <td>
                    <a href="{{ URL::To('vendor/experiance/category/edit', $cat->id) }}"><i class="fa fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ URL::To('vendor/experiance/category/delete', $cat->id) }}" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
                </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
    </div>
</div>

@endsection