<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingHistoryController extends Controller
{
    public function BookingHistory(){
        $data['title']='Booking Reports';
        return view('vendor.pages.booking_history.booking_history');
    }
}
