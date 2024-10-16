<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){
        $data['title']='Product Lists';
    

        return view('admin.pages.product.list',$data);
    }

    public function productAdd(){
        $data['title']='Add Product';
    

        return view('admin.pages.product.add',$data);
    }

    public function quantity(){
        $data['title']='Quantity Lists';
    

        return view('admin.pages.product.quantity',$data);
    }

    public function quantityAdd(){
        $data['title']='Add quantity';

        return view('admin.pages.product.quantityAdd',$data);
    }

}
