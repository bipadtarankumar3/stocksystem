<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayoutsController extends Controller
{
    public function payoutsList(){
        $data['title']='Payouts Lists';
        return view('vendor.pages.payouts.list',$data);
    }
}
