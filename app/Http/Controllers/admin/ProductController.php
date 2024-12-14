<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\uom;
use App\Models\sd_master as SD;
use App\Models\warehouse;
use App\Models\product;
use App\Models\productStock;

class ProductController extends Controller
{
    public function productList(){
        $data['title']='Product Lists';
        $data['products'] = product::all();

        return view('admin.pages.product.list',$data);
    }

    public function productAdd(){
        $data['title']='Add Product';
        $data['categories'] = category::all();
        $data['uoms'] = uom::all();

        return view('admin.pages.product.add',$data);
    }

    public function saveProduct(Request $request,$id=null){

        if (isset($id)) {
            $product = product::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'uom_id' => $request->uom_id,
                'one_no_cartoon' => $request->one_no_cartoon,
                'one_cartoon' => $request->one_cartoon,
                'two_no_cartoon' => $request->two_no_cartoon,
                'two_cartoon' => $request->two_cartoon,
                'three_no_cartoon' => $request->three_no_cartoon,
                'three_cartoon' => $request->three_cartoon,
                'min_sale_qty' => $request->min_sale_qty,
                'uom_qty' => $request->uom_qty,
                'ml' => $request->ml,
                'product_status' => $request->product_status,
            ]);

                return redirect('admin/product/list')->with('success', 'product updated successfully.');
            
        } else {
            product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'uom_id' => $request->uom_id,
                'one_no_cartoon' => $request->one_no_cartoon,
                'one_cartoon' => $request->one_cartoon,
                'two_no_cartoon' => $request->two_no_cartoon,
                'two_cartoon' => $request->two_cartoon,
                'three_no_cartoon' => $request->three_no_cartoon,
                'three_cartoon' => $request->three_cartoon,
                'min_sale_qty' => $request->min_sale_qty,
                'uom_qty' => $request->uom_qty,
                'ml' => $request->ml,
                'product_status' => $request->product_status,
            ]);

            return redirect('admin/product/list')->with('success', 'product added successfully.');
         
        }
        
    }

    public function productEdit($id){
        $data['title']='Edit Product';
        $data['product'] = product::where('id',$id)->first();
        $data['categories'] = category::all();
        $data['uoms'] = uom::all();

        return view('admin.pages.product.add',$data);
    }

    public function destroyProduct($id)
    {
        $Product = product::findOrFail($id);
        $Product->delete();
        return redirect('admin/product/list')->with('success', 'Product deleted successfully.');
    }



    public function stockList(){
        $data['title']='stock Lists';
        $data['stocks'] = productStock::with(['product', 'warehouse'])->orderBy('id','desc')->get();

        return view('admin.pages.product.stock',$data);
    }

    public function stockAdd(){
        $data['title']='Add stock';
        $data['warehouses'] = warehouse::all();
        $data['products'] = product::all();

        return view('admin.pages.product.stockAdd',$data);
    }

    public function stockSave(Request $request,$id=null){

        if (isset($id)) {
            $stock = productStock::findOrFail($id);
            $stock->update([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'quantity' => $request->quantity
            ]);

                return redirect('admin/product/stock')->with('success', 'stock updated successfully.');
            
        } else {
            productStock::create([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'quantity' => $request->quantity,
            ]);

            return redirect('admin/product/stock')->with('success', 'stock added successfully.');
         
        }
        
    }

    public function stockEdit($id){
        $data['title']='Edit stock';
        $data['stock'] = productStock::where('id',$id)->first();
        $data['warehouses'] = warehouse::all();
        $data['products'] = product::all();

        return view('admin.pages.product.stockAdd',$data);
    }

    public function stockDelete($id)
    {
        $stock = productStock::findOrFail($id);
        $stock->delete();
        return redirect('admin/product/stock')->with('success', 'stock deleted successfully.');
    }

    public function checkingProductQuantity(Request $request){

        $product = productStock::where('product_id', $request->product_id)->where('warehouse_id', $request->warehouse_id)->first();
        if ($product) {
       
            if ($product->quantity >= $request->quantity) {
                return response()->json([
                    'status' => true,
                    'message' => 'Product quantity is available'
                ]);   
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Product quantity is not available'
                ]);  
            }
            
        } else {
            return response()->json([
                'status' => false,
                'message' => 'There is no product in this warehouse'
            ]);    
        }

    }


}
