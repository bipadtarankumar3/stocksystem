@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="" class="browser-default-validation">
        <div class="row">
           
            <div class="col-md-12">
                <div class="card">
                    {{-- <h5 class="card-header">Publish</h5> --}}
                    <div class="card-body">
                        <div class="float-right my-2 text-right" style="text-align: right">
                            <a href="{{URL::to('vendor/room/addRoom')}}"><button type="button" class="btn btn-warning">Add Room</button></a>
                            <a href="{{URL::to('vendor/room/avalibility')}}"><button type="button" class="btn btn-success">Avalibility</button></a>
                            
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Room Type</th>
                                        <th>Bedrooms</th>
                                        <th>Washrooms</th>
                                        <th>Kitchen</th>
                                        <th>Balcony</th>
                                        <th>Feature Image</th>
                                        <th>Price</th>
                                        <th>No of Rooms</th>
                                        <th>Minimum Day Stay</th>
                                        <th>No of Beds</th>
                                        <th>Room Size</th>
                                        <th>Max Adults</th>
                                        <th>Max Children</th>
                                        <th>Room Amenities</th>
                                        <th>Import URL</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{ $room->id }}</td>
                                            <td>
                                                <a href="{{ URL::to('vendor/room/edit_room', $room->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('vendor/room/delete_room', $room->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                            <td>{{ $room->room_type }}</td>
                                            <td><img src="{{ URL::to('public/'.$room->bed_room) }}" alt="Feature Image" width="50"></td>
                                            <td><img src="{{ URL::to('public/'.$room->washroom) }}" alt="Feature Image" width="50"></td>
                                            <td><img src="{{ URL::to('public/'.$room->kitchen) }}" alt="Feature Image" width="50"></td>
                                            <td><img src="{{ URL::to('public/'.$room->balcony) }}" alt="Feature Image" width="50"></td>
                                            <td><img src="{{ URL::to('public/'.$room->feature_image) }}" alt="Feature Image" width="50"></td>
                                            <td>{{ $room->price }}</td>
                                            <td>{{ $room->no_of_rooms }}</td>
                                            <td>{{ $room->minimum_day_stay }}</td>
                                            <td>{{ $room->no_of_beds }}</td>
                                            <td>{{ $room->room_size }}</td>
                                            <td>{{ $room->max_adults }}</td>
                                            <td>{{ $room->max_children }}</td>
                                            <td>{{ $room->room_amenities }}</td>
                                            <td>{{ $room->import_url }}</td>
                                            <td>{{ $room->status }}</td>
                                            <td>{{ $room->added_by }}</td>
                                            <td>{{ $room->created_at }}</td>
                                            <td>{{ $room->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
 
            </div>
            
        </div>
    </form>
</div>

@endsection