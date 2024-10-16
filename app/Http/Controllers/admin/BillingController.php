<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function billingList(){
        $data['title']='billing Lists';
    

        return view('admin.pages.billing.list',$data);
    }

    public function billingAdd(){
        $data['title']='Add billing';
    

        return view('admin.pages.billing.add',$data);
    }
}
