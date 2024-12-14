<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\warehouse;
use App\Models\product;
use App\Models\requirement;
use App\Models\requirementCondition;

class RequirmentController extends Controller
{
    public function requirementList(){
        $data['title']='Requirment Lists';
    
        $data['requirements'] = requirement::with(['product', 'warehouse'])->orderBy('id','desc')->get();

        return view('admin.pages.requirment.list',$data);
    }


    public function requirementCondition(){
        $data['title']='Requirement Condition Lists';
        $data['conditions'] = requirementCondition::with(['product', 'warehouse_one','warehouse_two','warehouse_three'])->orderBy('id','desc')->get();

        return view('admin.pages.requirment.requirementCondition',$data);
    }

    public function requirementConditionAdd(){
        $data['title']='Add Requirement Condition';
        $data['warehouses'] = warehouse::all();
        $data['products'] = product::all();

        return view('admin.pages.requirment.requirementConditionAdd',$data);
    }

    public function conditionSave(Request $request,$id=null){

        if (isset($id)) {
            $condition = requirementCondition::findOrFail($id);
            $condition->update([
                'product_id' => $request->product_id,
                'warehouse_id_one' => $request->warehouse_id_one,
                'warehouse_id_two' => $request->warehouse_id_two,
                'warehouse_id_three' => $request->warehouse_id_three,
                'warehouse_id_four' => $request->warehouse_id_four,
                'quantity' => $request->quantity
            ]);

                return redirect('admin/requerment/condition')->with('success', 'condition updated successfully.');
            
        } else {
            requirementCondition::create([
                'product_id' => $request->product_id,
                'warehouse_id_one' => $request->warehouse_id_one,
                // 'warehouse_id_two' => $request->warehouse_id_two,
                // 'warehouse_id_three' => $request->warehouse_id_three,
                // 'warehouse_id_four' => $request->warehouse_id_four,
                'quantity' => $request->quantity,
            ]);

            return redirect('admin/requerment/condition')->with('success', 'condition added successfully.');
         
        }
        
    }

    public function conditionEdit($id){
        $data['title']='Edit Requirement Condition';
        $data['condition'] = requirementCondition::where('id',$id)->first();
        $data['warehouses'] = warehouse::all();
        $data['products'] = product::all();

        return view('admin.pages.requirment.requirementConditionAdd',$data);
    }

    public function conditionDelete($id)
    {
        $condition = requirementCondition::findOrFail($id);
        $condition->delete();
        return redirect('admin/requerment/condition')->with('success', 'Requirement Condition deleted successfully.');
    }


    // public function requirementCondition(){
    //     $data['title']='Requirement Condition';
    

    //     return view('admin.pages.requirment.requirementCondition',$data);
    // }

    // public function requirementConditionAdd(){
    //     $data['title']='Requirement Condition Add';
    

    //     return view('admin.pages.requirment.requirementConditionAdd',$data);
    // }
}
