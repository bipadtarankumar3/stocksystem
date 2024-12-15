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
use App\Models\Billing;
use App\Models\BillingItems;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function billingList(){
        $data['title']='billing Lists';
        
        $data['billings'] = Billing::get();
        return view('admin.pages.billing.list',$data);
    }

    public function viewBilling($billing_id){
        $data['title']='Billing Details';
        
        $data['billing_id'] = $billing_id;
        $data['billing'] = Billing::where('id', $billing_id)->first();
        $data['customers'] = User::where('user_type','customer')->get();
        $data['sds'] = SD::all();
        $data['warehouse'] = warehouse::get();
        $data['products'] = product::where('product_status','Active')->get();
        $data['sdDetails'] = SD::where('id', $data['billing']->sd_id)->first();
            //dd($data['formData']);
        return view('admin.pages.billing.SavedPrintBilling',$data);
    }

    public function editBilling($billing_id){
        $data['title']='Billing Edit';
        
        $data['billing_id'] = $billing_id;
        $data['billing'] = Billing::where('id', $billing_id)->first();
        
        $data['customers'] = User::where('user_type','customer')->get();
        $data['sds'] = SD::all();
        $data['warehouse'] = warehouse::get();
        $data['products'] = product::where('product_status','Active')->get();
       
        return view('admin.pages.billing.edit',$data);
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

        if ($request->has('save')  && $request->save == 'save') {
            
            DB::beginTransaction();

            // try {
                // Check if request has a billing_id for update
                if (isset($request->billing_id)) {
                    // Update Billing
                    $Billing = Billing::find($request->billing_id);
                    if (!$Billing) {
                        throw new \Exception("Billing record not found.");
                    }
            
                    // Delete existing BillingItems for the billing_id
                    BillingItems::where('billing_id', $request->billing_id)->delete();
                } else {
                    // Create new Billing
                    $Billing = new Billing();
                }
            
                // Populate Billing fields
                $Billing->serial_no = $request->serial_no;
                $Billing->customer_id = $request->customer_id;
                $Billing->sd_id = $request->sd_id;
                $Billing->courier_to_kolkata = $request->courier_to_kolkata;
                $Billing->courier = $request->courier;
                $Billing->transport = $request->transport;
                $Billing->date = $request->date;
                $Billing->muthiya_cost = $request->muthiya_cost;
                $Billing->gst = $request->gst;
                $Billing->gst_received = $request->gst_received;
                $Billing->grand_total = $request->grand_total;
                $Billing->user_id = auth()->user()->id;
                $Billing->save();

                // dd($request->all());
            
                // Validate and Save BillingItems
                if (isset($request->warehouse) && is_array($request->warehouse)) {
                    foreach ($request->warehouse as $key => $warehouseData) {
                        $BillingItem = new BillingItems();
                        $BillingItem->billing_id = $Billing->id;
                        $BillingItem->warehouse = $warehouseData;
                        $BillingItem->no_of_pkgs = $request->no_of_pkgs[$key] ?? 0;
                        $BillingItem->product = $request->product[$key] ?? '';
                        $BillingItem->quantity = $request->quantity[$key] ?? 0;
                        $BillingItem->price = $request->price[$key] ?? 0.0;
                        $BillingItem->total = $request->total[$key] ?? 0.0;
                        $BillingItem->save();
                    }
                } else {
                    throw new \Exception("No warehouse data provided.");
                }
            
                // Commit the transaction
                DB::commit();
            
                // Redirect with success message
                return redirect('/admin/billing/list')->with('success', 'Billing Added Successfully');
            // } catch (\Exception $e) {
            //     // Rollback the transaction on error
            //     DB::rollback();
            
            //     // Log the error for debugging
            //     \Log::error('Error saving billing data: ' . $e->getMessage());
            
            //     // Return error message
            //     return redirect('/admin/billing/list')->with('error', 'An error occurred while adding the billing data.');
            // }
            

        } else {
            $data['customers'] = User::where('user_type','customer')->get();
            $data['sds'] = SD::all();
            $data['warehouse'] = warehouse::get();
            $data['products'] = product::where('product_status','Active')->get();
            $data['formData'] = $request->all();
            $data['sdDetails'] = SD::where('id', $request->sd_id)->first();
            //dd($data['formData']);
            return view('admin.pages.billing.printBilling',$data);
        }
        
    }

    public function destroyBilling($billing_id)
    {
        Billing::where('id', $billing_id)->delete();
        BillingItems::where('billing_id', $billing_id)->delete();
        return redirect('/admin/billing/list')->with('success', 'Billing Deleted Successfully');
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
