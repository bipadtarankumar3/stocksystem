@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <h4 class="card-header">Add Attributes</h4>
                    <div class="card-body">
                        <form action="{{ URL::To('vendor/experiance/attribute/add-action-attribute')}}" method="post">
                            @csrf
                            <input type="hidden" name="experiance_attribute" value="{{ isset($attribute) ? 'update' : 'add' }}">
                            <input type="hidden" name="experiance_attribute_id" value="{{ isset($attribute) ? $attribute->id : '' }}">
                            <div class="form-group">
                                <label for="name">Attributes Type</label>
                                <select name="attribute_type" id="attribute_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="top_feature" @if(isset($attribute) && $attribute->attribute_type == 'top_feature') selected @endif>Top Feature</option>
                                    <option value="property_type" @if(isset($attribute) && $attribute->attribute_type == 'property_type') selected @endif>Property Type</option>
                                    <option value="travel_style" @if(isset($attribute) && $attribute->attribute_type == 'travel_style') selected @endif>Travel Style</option>
                                    <option value="tour_feature" @if(isset($attribute) && $attribute->attribute_type == 'tour_feature') selected @endif>Tour Feature</option>
                                    <option value="facilities" @if(isset($attribute) && $attribute->attribute_type == 'facilities') selected @endif>Facilities</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" placeholder="attribute Name" name="attribute_name" value="{{ isset($attribute) ? $attribute->attribute_name : '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hide_detail_service" class="form-check-input" id="basic-default-checkbox" @if(isset($attribute) && $attribute->hide_detail_service == 'on') checked  @endif>
                                <label for="name">Hide In detail Service</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="hide_filter_serch" class="form-check-input" id="basic-default-checkbox" @if(isset($attribute) && $attribute->hide_filter_serch == 'on') checked  @endif>
                                <label for="name">Hide in filter serch</label>
                            </div>
              
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($attribute) ? 'Update' : 'Add New' }}</button>
                        </form>

                        {{-- <form action="">
                            <div class="form-group">
                                <label for="name"> Attributes Name</label>
                                <input type="text" placeholder="Category Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Position</label>
                                <input type="text" placeholder="Category Name" class="form-control">
                            </div>
                            <div class="form-group">

                                <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                <label for="name">Hide In detail Service</label>
                            </div>
                            <div class="form-group">

                                <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                <label for="name">Hide in filter serch</label>
                            </div>

                            <button class="btn btn-primary mt-2">Add New</button>
                        </form> --}}
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
                                    <th>Type</th>
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
                                        <td>{{ $cat->attribute_type }}</td>
                                        <td>{{ $cat->attribute_name }}</td>
                                        <td style="color: green">Publish</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>
                                            <a href="{{ URL::To('vendor/experiance/attribute/edit', $cat->id) }}"><i class="fa fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::To('vendor/experiance/attribute/delete', $cat->id) }}" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
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
