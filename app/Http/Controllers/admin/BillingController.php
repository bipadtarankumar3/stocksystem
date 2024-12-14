<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\uom;
use App\Models\sd_master as SD;
use App\Models\warehouse;
use App\Models\product;
use App\Models\productStock;
use App\Models\requirementCondition;
use App\Models\requirement;
use Illuminate\Support\Facades\DB;

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
        //dd($data['formData']);
        return view('admin.pages.billing.printBilling',$data);
    }


    public function billProductMinus(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'product_details.product' => 'required|array',
            'product_details.quantity' => 'required|array',
            'product_details.warehouse' => 'required|array',
        ]);
    
        $products = $validatedData['product_details']['product'];
        $quantities = $validatedData['product_details']['quantity'];
        $warehouses = $validatedData['product_details']['warehouse'];
    
        // try {
        //     // Use a transaction for data consistency
        //     DB::beginTransaction();
    
            foreach ($products as $key => $productId) {
                $quantityToDeduct = $quantities[$key];
                $warehouseId = $warehouses[$key];
    
                // Fetch product stock
                $productStock = productStock::where('product_id', $productId)->first();
    
                if (!$productStock) {
                    // If no stock record exists, return an error response
                    throw new \Exception("No stock record found for product ID: $productId");
                }
    
                if ($productStock->quantity < $quantityToDeduct) {
                    // If quantity is insufficient, return an error response
                    throw new \Exception("Insufficient stock for product ID: $productId");
                }

                
                $remainingProductQuantity = $productStock->quantity - $quantityToDeduct; // Remaining quantity of the product
    
    
                // Deduct the quantity
                $productStock->update([
                    'quantity' => $remainingProductQuantity
                ]);

                $productStock->save();

                // Check for any condition in the requirementCondition table
                $condition = requirementCondition::where('product_id', $productId)
                    ->where('warehouse_id_one', $warehouseId)
                    ->where('quantity', '>', $remainingProductQuantity) // Adjusted comparison for clarity
                    ->first();

                    // dd($condition);
    
                if ($condition) {
                    // Create a new requirement if condition is met
                    requirement::create([
                        'product_id' => $productId,
                        'warehouse_id' => $warehouseId,
                        'minimum_quantity' => $condition->quantity,
                    ]);
                }
            }
    
            // Commit the transaction
            // DB::commit();
    
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Product quantities updated successfully',
            // ]);
        // } catch (\Exception $e) {
        //     // Rollback the transaction in case of error
        //     DB::rollBack();
    
        //     return response()->json([
        //         'status' => false,
        //         'message' => $e->getMessage(),
        //     ]);
        // }
    }
    


}
