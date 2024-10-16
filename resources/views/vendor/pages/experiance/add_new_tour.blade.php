@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>

        <form action="{{URL::to('vendor/experiance/submit-tour-form')}}" class="browser-default-validation" method="POST" enctype="multipart/form-data" id="tour_form">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <h5 class="card-header">Tour Content</h5>
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" name="title" class="form-control" id="basic-default-name"
                                    placeholder="Name of the hotel" required="">
                                <label for="basic-default-name">Title</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <textarea name="content" class="form-control" id="Content"></textarea>
                                <label for="Content">Content</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="category" id="category" class="form-control">
                                    <option value="">-- please select --</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                                <label for="basic-default-name">Category</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" name="youtube_video" class="form-control" id="basic-default-name"
                                    placeholder="Youtube Video" required="">
                                <label for="basic-default-name">Youtube Video</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="number"  name="minimum_advance"  class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Minimum Advance Reservation</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="number"  name="duration"  class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Duration</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="number"  name="min_people"  class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Tour Min People</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="number"  name="max_people"  class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Tour Max People</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Faqs</h4>
                                    <table class="table">
                                        <thead>
                                           <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th style="text-align: right">
                                                    
                                                </th>

                                            </tr> 
                                        </thead>
                                        <tbody id="faq_body">
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="faq_title[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="faq_content[]">
                                                </td>
                                                <td style="text-align: right">
                                                    <button type="button" class="btn btn-info" onclick="add_faq_row()" >Add Item</button> 
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Include</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="include_body">
                                             <tr>
                                                 <td>
                                                     <input type="text" class="form-control" name="include_title[]">
                                                 </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_include_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                    
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Exclude</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="exclude_body">
                                             <tr>
                                                 <td>
                                                     <input type="text" class="form-control" name="exclude_title[]">
                                                 </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_exclude_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Itinerary</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="itinerary_body">
                                             <tr>
                                                <td>
                                                    <input type="file" class="form-control" name="itinerary_image[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="itinerary_title[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="itinerary_content[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_itinerary_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" name="banner_image" multiple class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Banner Image</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" name="gallery_image[]" multiple class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Gallery Image</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" name="feature_image" multiple class="form-control" id="basic-default-name">
                                <label for="basic-default-name">Feature Image</label>
                            </div>


                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Tour Location</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-floating form-floating-outline mb-4">
                                        <select name="location" id="location" class="form-control">
                                            <option value="">-- please select --</option>
                                        </select>
                                        <label for="basic-default-name">Location</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" name="real_address" class="form-control" id="basic-default-name"
                                        placeholder="Real Tour address" required="">
                                        <label for="basic-default-name">Real Tour address</label>
                                    </div>

                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" name="map_link" class="form-control" id="basic-default-name"
                                        placeholder="Map Iframe" required="">
                                        <label for="basic-default-name">Map Iframe</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Surrounding</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Education</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Distance</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="education_body">
                                             <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="education_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_content[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="education_distance[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_education_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Health</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Distance</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="health_body">
                                             <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="health_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="health_content[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="health_distance[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_health_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Transportation</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Distance</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="transportation_body">
                                             <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="transportation_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="transportation_content[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="transportation_distance[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_transportation_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Adventures</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Distance</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="adventures_body">
                                             <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="adventures_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="adventures_content[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="adventures_distance[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_adventures_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Experience</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Distance</th>
                                                <th style="text-align: right"></th>
    
                                             </tr> 
                                         </thead>
                                         <tbody id="experience_body">
                                             <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="experience_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="experience_content[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="experience_distance[]">
                                                </td>
                                                 
                                                 <td class="" style="text-align: right">
                                                     <button type="button" class="btn btn-info" onclick="add_experience_row()" >Add Item</button> 
                                                 </td>
                                             </tr>
                                         </tbody>
                                    </table>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Pricing</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" name="price" class="form-control" id="basic-default-name"
                                            placeholder="Price" required="">
                                        <label for="basic-default-name">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" name="sale_price" class="form-control" id="basic-default-name"
                                            placeholder="Price" >
                                        <label for="basic-default-name">Sale Price</label>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="extra_price" class="form-check-input" id="basic-default-checkbox"
                                                >
                                            <label class="form-check-label" for="basic-default-checkbox">Enable Extra
                                                Price</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="service_fee" class="form-check-input" id="basic-default-checkbox"
                                               >
                                            <label class="form-check-label" for="basic-default-checkbox">Service
                                                Fee</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mt-4">
                        <h5 class="card-header">Avaliblity</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="fixed_date" class="form-check-input" id="basic-default-checkbox"
                                                >
                                            <label class="form-check-label" for="basic-default-checkbox">Fixced Dates</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="open_hours" class="form-check-input" id="basic-default-checkbox"
                                                >
                                            <label class="form-check-label" for="basic-default-checkbox">Open Hours
                                                </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <h5 class="card-header">Publish</h5>
                        <div class="card-body">

                            <div class="mb-4">
                                <div class="form-check mb-2">
                                    <input type="radio" value="draft" id="basic-default-radio-male" name="status"
                                        class="form-check-input"  checked="">
                                    <label class="form-check-label" for="basic-default-radio-male">Draft</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="publish" id="basic-default-radio-female" name="status"
                                        class="form-check-input" >
                                    <label class="form-check-label" for="basic-default-radio-female">Publish</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Submit</button>
                                </div>
                            </div>


                        </div>
                    </div>

                    {{-- <div class="card mt-4">
                        <h5 class="card-header">Author Setting</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <select name="" id="" class="form-control">
                                                <option value="">-- plese select--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card mt-4">
                        <h5 class="card-header">Top Feature</h5>
                        <div class="card-body">

                            @foreach ($top_feature as $attribute)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="top_feature[]" value="{{$attribute->id}}" class="form-check-input" id="basic-default-checkbox"
                                                    required="" >
                                                <label class="form-check-label" for="basic-default-checkbox">{{$attribute->attribute_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            

                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <select name="" id="" class="form-control">
                                                <option value=""> alaways Available</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Property Type</h5>
                        <div class="card-body">

                            @foreach ($property_type as $attribute)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="property_type[]" value="{{$attribute->id}}" class="form-check-input" id="basic-default-checkbox"
                                                    required="" >
                                                <label class="form-check-label" for="basic-default-checkbox">{{$attribute->attribute_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Travel Style</h5>
                        <div class="card-body">

                            @foreach ($travel_style as $attribute)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="travel_style[]" value="{{$attribute->id}}" class="form-check-input" id="basic-default-checkbox"
                                                    required="" >
                                                <label class="form-check-label" for="basic-default-checkbox">{{$attribute->attribute_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Tour Feature</h5>
                        <div class="card-body">

                            @foreach ($tour_feature as $attribute)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="tour_feature[]" value="{{$attribute->id}}" class="form-check-input" id="basic-default-checkbox"
                                                    required="" >
                                                <label class="form-check-label" for="basic-default-checkbox">{{$attribute->attribute_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Facilities</h5>
                        <div class="card-body">

                            @foreach ($facilities as $attribute)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="facilities[]" value="{{$attribute->id}}" class="form-check-input" id="basic-default-checkbox"
                                                    required="" >
                                                <label class="form-check-label" for="basic-default-checkbox">{{$attribute->attribute_name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
    // Add row function
    function add_faq_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="faq_title[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="faq_content[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_faq_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#faq_body').append(newRow);
    }

    // Delete row function
    function delete_faq_row(button) {
        $(button).closest('tr').remove();
    }

    // Add row function
    function add_include_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="include_title[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_include_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#include_body').append(newRow);
    }

    // Delete row function
    function delete_include_row(button) {
        $(button).closest('tr').remove();
    }

    // Add row function
    function add_exclude_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="exclude_title[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_exclude_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#exclude_body').append(newRow);
    }

    // Delete row function
    function delete_exclude_row(button) {
        $(button).closest('tr').remove();
    }
    
    // Add row function
    function add_itinerary_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="file" class="form-control" name="itinerary_image[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="itinerary_title[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="itinerary_content[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_itinerary_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#itinerary_body').append(newRow);
    }

    // Delete row function
    function delete_itinerary_row(button) {
        $(button).closest('tr').remove();
    }

    ////------------------------------------------------------------------------------------------------
    function add_education_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="education_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="education_content[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="education_distance[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_education_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#education_body').append(newRow);
    }

    // Delete row function
    function delete_education_row(button) {
        $(button).closest('tr').remove();
    }

    function add_health_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="health_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="health_content[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="health_distance[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_health_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#health_body').append(newRow);
    }

    // Delete row function
    function delete_health_row(button) {
        $(button).closest('tr').remove();
    }

    function add_transportation_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="transportation_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="transportation_content[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="transportation_distance[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_transportation_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#transportation_body').append(newRow);
    }

    // Delete row function
    function delete_transportation_row(button) {
        $(button).closest('tr').remove();
    }

    function add_adventures_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="adventures_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="adventures_content[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="adventures_distance[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_adventures_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#adventures_body').append(newRow);
    }

    // Delete row function
    function delete_adventures_row(button) {
        $(button).closest('tr').remove();
    }

    function add_experience_row() {
        var newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="experience_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="experience_content[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="experience_distance[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_experience_row(this)">Delete</button>
                </td>
            </tr>
        `;
        $('#experience_body').append(newRow);
    }

    // Delete row function
    function delete_experience_row(button) {
        $(button).closest('tr').remove();
    }
    ////------------------------------------------------------------------------------------------------

</script>
@endsection
