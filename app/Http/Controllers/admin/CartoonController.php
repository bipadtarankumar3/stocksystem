<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartoonController extends Controller
{
    public function cartoonList(){
        $data['title']='cartoon Lists';
    

        return view('admin.pages.cartoon.list',$data);
    }

    public function cartoonAdd(){
        $data['title']='Add cartoon';
    

        return view('admin.pages.cartoon.add',$data);
    }
}
