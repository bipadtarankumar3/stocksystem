<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList(){
        $data['title']='category Lists';
    

        return view('admin.pages.category.list',$data);
    }

    public function categoryAdd(){
        $data['title']='Add category';
    

        return view('admin.pages.category.add',$data);
    }
}
