<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\uom;
use App\Models\sd_master as SD;
use App\Models\warehouse;
use App\Models\product;

class BillingController extends Controller
{
    public function billingList(){
        $data['title']='billing Lists';
    

        return view('admin.pages.billing.list',$data);
    }

    public function billingAdd(){
        $data['title']='Add billing';
        $data['customers'] = User::where('user_type','customer')->get();
        $data['sds'] = SD::all();
        $data['warehouse'] = warehouse::get();
        $data['products'] = product::where('product_status','Active')->get();

        return view('admin.pages.billing.add',$data);
    }


    public function print_billing(Request $request){
        $data['title']='Print billing';
        $data['customers'] = User::where('user_type','customer')->get();
        $data['sds'] = SD::all();
        $data['warehouse'] = warehouse::get();
        $data['products'] = product::where('product_status','Active')->get();
        $data['formData'] = $request->all();
        $data['sdDetails'] = SD::where('id', $request->sd_id)->first();
        // dd($data['formData']);
        return view('admin.pages.billing.printBilling',$data);
    }


}
