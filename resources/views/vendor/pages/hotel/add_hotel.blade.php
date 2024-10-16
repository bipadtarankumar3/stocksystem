@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Vendor/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>

        <form action="{{URL::To('vendor/hotel/add-action')}}" method="post" enctype="multipart/form-data" class="browser-default-validation">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">1. Content</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">2. Location</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">3. Pricing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ATTRIBUTES-tab" data-bs-toggle="tab" data-bs-target="#ATTRIBUTES"
                        type="button" role="tab" aria-controls="ATTRIBUTES" aria-selected="false">4.
                        Attributes</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <h5 class="card-header">Hotel Content</h5>
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-name" name="title"
                                    placeholder="Name of the hotel" >
                                <label for="basic-default-name">Title</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <textarea name="content" class="form-control" id="Content"></textarea>
                                <label for="Content">Content</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-name" name="youtube_link"
                                    placeholder="Youtube Video" >
                                <label for="basic-default-name">Youtube Video</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" class="form-control" id="basic-default-name" name="banner_image"
                                    placeholder="Banner Image" >
                                <label for="basic-default-name">Banner Image</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" name="gallery_image[]" multiple class="form-control"
                                    id="basic-default-name">
                                <label for="basic-default-name">Gallery Image</label>
                            </div>


                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Hotel Policy</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" name="hotel_rating" class="form-control"
                                            id="basic-default-name" placeholder="Rating" >
                                        <label for="basic-default-name">Hotel Rating Standard</label>
                                    </div>
                                </div>
                            </div>
                            <div class="dynamic_hotel_field">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                placeholder="Name of the hotel" name="policy_title[]" >
                                            <label for="basic-default-name">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea name="policy_content[]" class="form-control" id="Content"></textarea>
                                            <label for="Content">Content</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="extra-fields" href="javascript:void(0);"
                                            onclick="add_more_hotel_policy()">
                                            <i class="fa-solid fa fa-plus" style="color: rgb(0, 245, 53)"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Featured Image</h5>
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" class="form-control" name="feature_image" id="basic-default-name"
                                    placeholder="Banner Image" >
                                <label for="basic-default-name">Featured Image</label>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" name="location" class="form-control" id="basic-default-name"
                                    placeholder="Location" >
                                <label for="basic-default-name">Location</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <textarea name="real_address" class="form-control" id="Content"></textarea>
                                <label for="Content">Real Address</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" name="map_link" class="form-control" id="basic-default-name"
                                placeholder="Location" >
                            <label for="basic-default-name">Map link</label>
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="dynamic_education">
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="education_name[]" placeholder="Name" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="education_content[]" placeholder="Content" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="education_distance[]" placeholder="Distance"
                                                            >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <div class="col-md-12 text-right">
                                                            <a class="extra-fields" href="javascript:void(0);"
                                                                onclick="add_more_hotel_education()">
                                                                <i class="fa-solid fa fa-plus"
                                                                    style="color: rgb(0, 245, 53)"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="dynamic_health">
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="health_name[]" placeholder="Name" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="health_content[]" placeholder="Content" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="health_distance[]" placeholder="Distance"
                                                            >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <div class="col-md-12 text-right">
                                                            <a class="extra-fields" href="javascript:void(0);"
                                                                onclick="add_more_hotel_health()">
                                                                <i class="fa-solid fa fa-plus"
                                                                    style="color: rgb(0, 245, 53)"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="dynamic_transpotation">
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="transpotaion_name[]" placeholder="Name" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="transpotaion_content[]" placeholder="Content" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="transpotaion_distance[]" placeholder="Distance"
                                                            >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <div class="col-md-12 text-right">
                                                            <a class="extra-fields" href="javascript:void(0);"
                                                                onclick="add_more_hotel_transpotation()">
                                                                <i class="fa-solid fa fa-plus"
                                                                    style="color: rgb(0, 245, 53)"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="dynamic_adventures">
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="adventure_name[]" placeholder="Name" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="adventure_conent[]" placeholder="Content" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="adventure_distance[]" placeholder="Distance"
                                                            >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <div class="col-md-12 text-right">
                                                            <a class="extra-fields" href="javascript:void(0);"
                                                                onclick="add_more_hotel_adventures()">
                                                                <i class="fa-solid fa fa-plus"
                                                                    style="color: rgb(0, 245, 53)"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="dynamic_experience">
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="exprience_name[]" placeholder="Name" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="exprience_content[]" placeholder="Content" >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <input type="text" class="form-control"
                                                            id="basic-default-name" name="exprience_distance[]" placeholder="Distance"
                                                            >

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-floating form-floating-outline mb-4">
                                                        <div class="col-md-12 text-right">
                                                            <a class="extra-fields" href="javascript:void(0);"
                                                                onclick="add_more_hotel_experience()">
                                                                <i class="fa-solid fa fa-plus"
                                                                    style="color: rgb(0, 245, 53)"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                    <div class="card mt-4">
                        <h5 class="card-header">Check in/out time</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="time" class="form-control" id="basic-default-name"
                                            placeholder="Name of the hotel" name="check_in_time" >
                                        <label for="basic-default-name">Time for check in</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="time" class="form-control" id="basic-default-name"
                                            placeholder="Name of the hotel"  name="check_out_time">
                                        <label for="basic-default-name">Time for check out</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="minimum_advance_reservaction" id="basic-default-name"
                                            placeholder="Minimum advance reservations" >
                                        <label for="basic-default-name">Minimum advance reservations</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            placeholder="Minimum day stay requirments" name="maximum_day_stay_req" >
                                        <label for="basic-default-name">Minimum day stay requirments</label>
                                    </div>
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
                                        <input type="text" class="form-control" id="basic-default-name"
                                            placeholder="Price"  name="price">
                                        <label for="basic-default-name">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="basic-default-checkbox"
                                               value="1" name="exctera_price">
                                            <label class="form-check-label"  for="basic-default-checkbox">Enable Extra
                                                Price</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="service_fee" value="1" class="form-check-input" id="basic-default-checkbox"
                                                >
                                            <label class="form-check-label" for="basic-default-checkbox">Service
                                                Fee</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ATTRIBUTES" role="tabpanel" aria-labelledby="ATTRIBUTES-tab">

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Property Type</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($propertyTypes as $propertyT)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="property_type[]" class="form-check-input"
                                                    id="basic-default-checkbox" value="{{ $propertyT->id }}">
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $propertyT->property_type }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Facilities</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($facilities as $facility)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="facility[]" class="form-check-input"
                                                    id="basic-default-checkbox" value="{{ $facility->id }}">
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $facility->facility_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Hotel Service</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="service[]" value="{{ $service->id }}" class="form-check-input"
                                                    id="basic-default-checkbox" >
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $service->service_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Privacy</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($privacies as $privacy)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="privacy_name[]" class="form-check-input"
                                                    id="basic-default-checkbox"  value="{{ $privacy->id }}">
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $privacy->privacy_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info">Save</button>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('js')
    <script>
        function add_more_hotel_policy() {
            var html = `
                <div class="row mt-4">
                    <div class="col-md-5">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="policy_title[]" id="basic-default-name"
                                            placeholder="Name of the hotel" >
                                        <label for="basic-default-name">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <textarea name="policy_content[]" class="form-control" id="Content"></textarea>
                                        <label for="Content">Content</label>
                                    </div>
                                </div>
                    <div class="col-md-2">
                        
                            <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_policy(this)" aria-hidden="true"></i>
                        
                    </div>
                </div>
            `;
            $('.dynamic_hotel_field').append(html);
        }

        function remove_hotel_policy(element) {
            // Find the closest parent row and remove it
            $(element).closest('.row').remove();
        }

        function add_more_hotel_education() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_name[]" placeholder="Name" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_content[]" placeholder="Content" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_education(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_education');
        }

        function remove_hotel_education(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_health() {
            var html = `
               
                    <tr>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control"
                                id="basic-default-name" placeholder="Name" name="health_name[]" >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control"
                                id="basic-default-name" placeholder="Content" name="health_content[]" >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="health_distance[]"
                                id="basic-default-name" placeholder="Distance"
                                >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <div class="col-md-12 text-right">
                                <a class="extra-fields">
                                    <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_health(this)" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_health');
        }

        function remove_hotel_health(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_transpotation() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="transpotaion_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="transpotaion_content[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="transpotaion_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_transpotation(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_transpotation');
        }

        function remove_hotel_transpotation(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_adventures() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="adventure_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="adventure_conent[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="adventure_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_adventures(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_adventures');
        }

        function remove_hotel_adventures(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_experience() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="exprience_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="exprience_content[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="exprience_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_experience(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_experience');
        }

        function remove_hotel_experience(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.next-tab').click(function() {
                var $activeTab = $('.nav-tabs .nav-link.active');
                var nextTab = $activeTab.parent().next().find('a');

                // Switch to next tab
                nextTab.tab('show');
            });
        });
    </script>
@endsection
