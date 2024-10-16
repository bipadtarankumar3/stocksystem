@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{  url('admin/room/update_roomavailable') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <input type="hidden" name="available_room_id" value="{{$available_room->id}}">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($available_room) ? 'Edit Room Avaibale' : 'Add Room Avaibale' }}</h5>
                    <div class="card-body">
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="hotel_id" id="hotel_id" class="form-control">
                                <option value="">-- Select Hotel --</option>
                                @foreach ($hotels as $item)
                                <option value="{{ $item->id }}" {{ isset($available_room) && $available_room->hotel_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                            <label for="basic-default-name">Hotel</label>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_id" id="room_id" class="form-control">
                                        <option value="">-- Select Room --</option>
                                        @foreach ($rooms as $item)
                                        <option value="{{ $item->id }}" {{ isset($available_room) && $available_room->room_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Room</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                             
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($available_room) ? $available_room->no_of_rooms : '' }}" name="no_of_rooms" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Number Of Rooms</label>
                                    </div>
                               
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" disabled value="{{ isset($available_room) ? $available_room->amount : '' }}" name="amount" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Price</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="month" disabled value="{{ isset($available_room) ? $available_room->available_month : '' }}" name="available_month" class="form-control" id="basic-default-name">
                                    <label for="basic-default-name">Month</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                 <!-- Calendar -->
                                    <div id='calendar'></div>
                            </div>
                        </div>
                       
                        

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($available_room) ? 'Update' : 'Add New' }}</button>
                                <a href="{{URL::to('admin/room/avalibility')}}">
                                    <button class="btn btn-success mt-2" type="button">Back</button>

                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


<!-- Modal for editing availability -->
 
    <!-- Edit Availability Modal -->
    <div class="modal fade" id="editAvailabilityModal" tabindex="-1" aria-labelledby="editAvailabilityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAvailabilityModalLabel">Edit Availability</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAvailabilityForm">
                    <div class="modal-body">
                        <input type="hidden" id="modalId" name="id">
                        <input type="hidden" id="modalDate" name="date">
                        <div class="mb-3">
                            <label for="modalAmount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="modalAmount" name="amount">
                        </div>
                        <div class="mb-3">
                            <label for="modalStatus" class="form-label">Status</label>
                            <select class="form-select" id="modalStatus" name="status">
                                <option value="YES">Available</option>
                                <option value="NO">Not Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('js')
<script>
     document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '{{ $available_room->available_month }}-01',
        events: [
            @foreach($availabilityData as $data)
            {
                id: '{{ $data->id }}',
                title: '{{ $data->rad_available_status === "YES" ? "Available - ₹" . $data->rad_amount : "Not Available - ₹" . $data->rad_amount }}',
                start: '{{ $data->rad_available_date }}',
                allDay: true,
                color: '{{ $data->rad_available_status === "YES" ? "#28a745" : "#dc3545" }}', // Green for available, Red for not available
                extendedProps: {
                    amount: '{{ $data->rad_amount }}',
                    status: '{{ $data->rad_available_status }}'
                }
            },
            @endforeach
        ],
        dateClick: function(info) {
            // Handle date click (show modal for creating new event)
        },
        eventClick: function(info) {
            var event = info.event;
            var props = event.extendedProps;

            // Populate the modal with event data
            document.getElementById('modalId').value = event.id;
            document.getElementById('modalDate').value = event.startStr;
            document.getElementById('modalAmount').value = props.amount;
            document.getElementById('modalStatus').value = props.status;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('editAvailabilityModal'));
            myModal.show();

            // Handle form submission
            document.getElementById('editAvailabilityForm').onsubmit = function(e) {
                e.preventDefault();

                var data = new FormData(e.target);
                fetch("{{ URL::to('/admin/room/update_availability') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: data.get('id'),
                        amount: data.get('amount'),
                        status: data.get('status')
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the event on the calendar
                        event.setProp('title', data.status === 'YES' ? 'Available - $' + data.amount : 'Not Available - $' + data.amount);
                        event.setProp('color', data.status === 'YES' ? '#28a745' : '#dc3545'); // Update color based on status

                        // Hide the modal, show alert, and reload the page
                        myModal.hide();
                        alert('Availability updated successfully!');
                        window.location.reload(); // Reload the page
                    }
                })
                .catch(error => {
                    console.error('Error updating availability:', error);
                    alert('Failed to update availability.');
                });
            };
        }
    });

    calendar.render();
});


</script>

 


@endsection