<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\cartoon;
use App\Models\product;
use App\Models\productStock;

class CartoonController extends Controller
{
    

    public function cartoonList(){
        $data['title']='cartoon Lists';
        $data['cartoons'] = cartoon::with(['product'])->orderBy('id','desc')->get();

        return view('admin.pages.cartoon.list',$data);
    }

    public function cartoonAdd(){
        $data['title']='Add cartoon';
    
        $data['products'] = product::all();

        return view('admin.pages.cartoon.add',$data);
    }

    public function cartoonSave(Request $request,$id=null){

        if (isset($id)) {
            $stock = cartoon::findOrFail($id);
            $stock->update([
                'cartoon_product_id' => $request->product_id,
                'cartoon_quantity' => $request->quantity
            ]);

                return redirect('admin/cartoon/list')->with('success', 'stock updated successfully.');
            
        } else {
            cartoon::create([
                'cartoon_product_id' => $request->product_id,
                'cartoon_quantity' => $request->quantity,
            ]);

            return redirect('admin/cartoon/list')->with('success', 'stock added successfully.');
         
        }
        
    }

    public function cartoonEdit($id){
        $data['title']='Edit cartoon';
        $data['cartoon'] = cartoon::where('id',$id)->first();
        $data['products'] = product::all();

        return view('admin.pages.cartoon.add',$data);
    }

    public function cartoonDelete($id)
    {
        $stock = cartoon::findOrFail($id);
        $stock->delete();
        return redirect('admin/cartoon/list')->with('success', 'stock deleted successfully.');
    }

}
