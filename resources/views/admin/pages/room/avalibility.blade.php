@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                <h4 class="card-header">{{$title}}
                <div class="block-options float-end">
                    <span data-toggle="tooltip" title="Add New">
                        <a href="{{URL::to('admin/room/addRoomavailable')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New</a>
                    </span>
                </div>
                </h4>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>#</th>
                                        <th>Hotel Name</th>
                                        <th>Room</th>
                                        <th>No of Rooms</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($roomav as $key => $roomav)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $roomav->hotel_name }}</td>
                                            <td>{{ $roomav->room_name }}</td>
                                            <td>{{ $roomav->no_of_rooms }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/room/edit_roomavailable', $roomav->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/room/delete_roomavailable', $roomav->id) }}" onclick="deleteConfirmation(event)"><i class="fa-solid fa-trash"></i></a>
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
