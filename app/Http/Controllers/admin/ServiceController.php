<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Service;
use Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function hotel_service(Request $request,$id=null)
    {
        $data['title'] = 'Hotel Service Add';
        $data['services'] = Service::orderBy('id', 'desc')->where('user_id',Auth::user()->id)->get();
        if($id){
            $data['service'] = Service::where('id',$id)->first();
        }
       
        return view('admin.pages.hotel_service.list', $data);
    }

    public function hotel_service_add_action(Request $request,$id=null)
    {
        if (isset($id)) {
            Service::where('id',$id)->update([
                'service_name' => $request->service_name,
                'user_id' => Auth::user()->id,
                'status' => '1'
            ]);
            $request->session()->flash('success', 'updated success');
            return redirect()->back();
        } else {
            Service::create([
                'service_name' => $request->service_name,
                'user_id' => Auth::user()->id,
                'status' => '1'
            ]);
            $request->session()->flash('success', 'added success');
            return redirect()->back();
        }
        
        
    }

    public function facilityEditAction(Request $request, $id)
    {
        Service::where('id', $id)->update([
            'service_name' => $request->service_name,

            'user_id' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'Update success');
        return redirect()->back();
    }

    public function facility_edit($id)
    {
        $data['title'] = 'Edit Service Type';
        $data['services'] = Service::orderBy('id', 'desc')->where('user_id',Auth::user()->id)->get();
        $data['service'] = Service::where('id', $id)->first();
        return view('admin.pages.proprity_type.list', $data);
    }
    public function facility_delete(Request $request, $id)
    {
      
        $data['propertyType'] = Service::where('id', $id)->delete();
        $request->session()->flash('success', ' Deleted successfully');
        return redirect()->back();
    }
}
