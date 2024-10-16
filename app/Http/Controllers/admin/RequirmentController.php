<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequirmentController extends Controller
{
    public function requirementList(){
        $data['title']='Requirment Lists';
    

        return view('admin.pages.requirment.list',$data);
    }

    public function requirementCondition(){
        $data['title']='Requirement Condition';
    

        return view('admin.pages.requirment.requirementCondition',$data);
    }

    public function requirementConditionAdd(){
        $data['title']='Requirement Condition Add';
    

        return view('admin.pages.requirment.requirementConditionAdd',$data);
    }
}
