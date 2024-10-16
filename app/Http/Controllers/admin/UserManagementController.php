<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function userList(){
        $data['title']='User Lists';
        $data['users']=User::where('user_type','customer')->get();
        return view('admin.pages.user.list',$data);
    }

    public function userAdd(){
        $data['title']='User Add';
        $data['users']=User::where('user_type','user')->get();
        return view('admin.pages.user.add',$data);
    }
}
