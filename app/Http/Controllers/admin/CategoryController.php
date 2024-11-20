<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\uom;
use App\Models\sd_master as SD;
use App\Models\warehouse;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $data['title'] = 'Category Lists';
        $data['categories'] = category::all();
        return view('admin.pages.category.list', $data);
    }
    public function editCategory($id)
    {
        $data['title'] = 'Category Edit';
        $data['categories'] = category::all();
        $data['category'] = $id ? category::findOrFail($id) : null;
        return view('admin.pages.category.list', $data);
    }
    public function categoryForm(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $request->validate(['name' => 'required|string|max:255']);
    
            if ($id) {
                // Update existing category
                $category = $id ? category::findOrFail($id) : null;
                $category->update(['name' => $request->name]);
                return redirect('admin/category/list')->with('success', 'Category updated successfully.');
            } else {
                // Add new category
                category::create(['name' => $request->name]);
                return redirect('admin/category/list')->with('success', 'Category added successfully.');
            }
            
        }
    }
    public function destroyCategory($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.list')->with('success', 'Category deleted successfully.');
    }

    // UOM
    public function uomList()
    {
        $data['title'] = 'UOM Lists';
        $data['uoms'] = uom::all();
        return view('admin.pages.uom.list', $data);
    }

    public function editUom($id)
    {
        $data['title'] = 'Category Edit';
        $data['uoms'] = uom::all();
        $data['uom'] = $id ? uom::findOrFail($id) : null;
        return view('admin.pages.uom.list', $data);
    }
    public function uomForm(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $request->validate(['name' => 'required|string|max:255']);
    
            if ($id) {
                // Update existing category
                $category = $id ? uom::findOrFail($id) : null;
                $category->update(['name' => $request->name]);
                return redirect('admin/uom/list')->with('success', 'UOM updated successfully.');
            } else {
                // Add new category
                uom::create(['name' => $request->name]);
                return redirect('admin/uom/list')->with('success', 'UOM added successfully.');
            }
            
        }
    }
    
    public function destroyUom($id)
    {
        $category = uom::findOrFail($id);
        $category->delete();
        return redirect('admin/uom/list')->with('success', 'UOM deleted successfully.');
    }
    

    // SD
    public function sdList()
    {
        $data['title'] = 'SD Lists';
        $data['sds'] = SD::all();
        return view('admin.pages.sd.list', $data);
    }
    public function editSD($id)
    {
        $data['title'] = 'SD Edit';
        $data['sds'] = SD::all();
        $data['sd'] = $id ? SD::findOrFail($id) : null;
        return view('admin.pages.sd.list', $data);
    }
    public function sdForm(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $request->validate(['name' => 'required|string|max:255']);
    
            if ($id) {
                // Update existing category
                $category = $id ? SD::findOrFail($id) : null;
                $category->update(['name' => $request->name]);
                return redirect('admin/sd/list')->with('success', 'SD updated successfully.');
            } else {
                // Add new category
                SD::create(['name' => $request->name]);
                return redirect('admin/sd/list')->with('success', 'SD added successfully.');
            }
            
        }
    }
    public function destroySD($id)
    {
        $category = SD::findOrFail($id);
        $category->delete();
        return redirect('admin/sd/list')->with('success', 'Category deleted successfully.');
    }
 

    // Warehouse
    public function warehouseList()
    {
        $data['title'] = 'warehouse Lists';
        $data['warehouses'] = warehouse::all();
        return view('admin.pages.warehouse.list', $data);
    }
    public function editwarehouse($id)
    {
        $data['title'] = 'warehouse Edit';
        $data['warehouses'] = warehouse::all();
        $data['warehouse'] = $id ? warehouse::findOrFail($id) : null;
        return view('admin.pages.warehouse.list', $data);
    }
    public function warehouseForm(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $request->validate(['name' => 'required|string|max:255']);
    
            if ($id) {
                // Update existing category
                $warehouse = $id ? warehouse::findOrFail($id) : null;
                $warehouse->update(['name' => $request->name]);
                return redirect('admin/warehouse/list')->with('success', 'warehouse updated successfully.');
            } else {
                // Add new warehouse
                warehouse::create(['name' => $request->name]);
                return redirect('admin/warehouse/list')->with('success', 'warehouse added successfully.');
            }
            
        }
    }
    public function destroyWarehouse($id)
    {
        $warehouse = warehouse::findOrFail($id);
        $warehouse->delete();
        return redirect('admin/warehouse/list')->with('success', 'warehouse deleted successfully.');
    }
  

}
