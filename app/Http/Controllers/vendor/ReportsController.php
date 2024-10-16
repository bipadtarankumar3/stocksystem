<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function bookingReports(){
        $data['title']='Booking Reports';
        return view('vendor.pages.reports.booking_reports');
    }
    public function enquiry_report(){
        $data['title']='Booking Reports';
        return view('vendor.pages.reports.enquiry_report');
    }
}
