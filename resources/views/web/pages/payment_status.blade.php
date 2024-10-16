@extends('web.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <h4 class="alert-heading">Payment Successful!</h4>
                <p>Your payment was processed successfully, and your booking is confirmed. Thank you for choosing us!</p>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title">Booking Confirmation</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Booking Details</h6>
                    <ul class="list-unstyled">
                        <li><strong>Booking ID:</strong>{{$bookingDetails->booking_id}}</li>
                        <li><strong>Name:</strong> {{$bookingDetails->first_name}} {{$bookingDetails->last_name}}</li>
                        <li><strong>Email:</strong> {{$bookingDetails->email}}</li>
                        <li><strong>Mobile:</strong> +91 {{$bookingDetails->phone}}</li>
                        {{-- <li><strong>Room ID:</strong> 789</li>
                        <li><strong>Insurance:</strong> Yes</li>
                        <li><strong>Payment Method:</strong> Credit Card</li> --}}
                        <li><strong>Amount Paid:</strong>{{$bookingDetails->total_price}} </li>
                        <li><strong>Booking Date:</strong> {{ \Carbon\Carbon::parse($bookingDetails->created_at)->format('F j, Y, g:i a') }}</li>
                        <li> <strong>Check-in: </strong> 
                            @if(session()->has('from_date'))
                                {{ \Carbon\Carbon::parse(session()->get('from_date'))->format('D, M j') }}
                            @else
                                N/A
                            @endif
                      
                        
                        <strong>Check-out: </strong>
                            @if(session()->has('to_date'))
                                {{ \Carbon\Carbon::parse(session()->get('to_date'))->format('D, M j') }}
                            @else
                                N/A
                            @endif</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
