<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function vendorList(){
        $data['title']='Vendor Lists';
        $data['users']=User::where('user_type','vendor')->get();

        return view('admin.pages.vendor.list',$data);
    }
}
