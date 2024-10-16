@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                {{-- <h5 class="card-header">User List</h5> --}}
                <div class="table-responsive text-nowrap">
                    <table class="table" id="zero_config">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Reviews</th>
                                <th>Date</th>
                                
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($tours as $key=> $tour)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$tour->title}}</td>
                                <td>{{$tour->location}}</td>
                                <td>{{Auth::user()->name}}</td>
                                
                               
                                <td style="color: green">Publish</td>
                                <td>2</td>
                                <td>{{$tour->created_at}}</td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" onclick="deleteConfirmation(event)"><i
                                            class="fa-solid fa-trash"></i></a>

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
<script>
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
    console.error( error );
    });
</script>

@endsection