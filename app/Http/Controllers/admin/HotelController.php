<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Documents;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelAttribute;
use App\Models\HotelPolicy;
use App\Models\HotelPrivacy;
use App\Models\HotelSaraunding;
use App\Models\Location;
use App\Models\PropertyType;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Response;

class HotelController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    

function single_files_upload($file, $id, $table_name, $document_type)
{
    if ($file && $file->isValid()) {

        $milisecond = round(microtime(true) * 1000);
        $name = $file->getClientOriginalName();
        $actual_name = str_replace(" ", "_", $name);
        $uploadName = $milisecond . "_" . $actual_name;
        $file->move(public_path('upload'), $uploadName);

        $documentData = [
            'image_name' => $uploadName,
            'table_name' => $table_name,
            'item_id' => $id,
            'document_type' => $document_type,
        ];

        Documents::create($documentData);

        return true; // Indicate successful upload
    }

    return false; // Indicate failure to upload
}


public function BookingList(){
    $bookings=Booking::orderBy('id','desc')->get();
    // dd($bookings);

    return view('admin.pages.booking.list',compact('bookings'));
}
function multiple_files_upload($files, $id, $table_name, $document_type)
{
    $uploadSuccess = true;

    // Iterate over each file and upload it
    foreach ($files as $file) {
        if ($file && $file->isValid()) {
            $milisecond = round(microtime(true) * 1000);
            $name = $file->getClientOriginalName();
            $actual_name = str_replace(" ", "_", $name);
            $uploadName = $milisecond . "_" . $actual_name;
            $file->move(public_path('upload'), $uploadName);

            $documentData[] = [
                'image_name' => $uploadName,
                'table_name' => $table_name,
                'item_id' => $id,
                'document_type' => $document_type,
            ];
        } else {
            // If any file is invalid, set $uploadSuccess to false
            $uploadSuccess = false;
        }
    }

    // Insert all document data into the database in one go
    if ($uploadSuccess) {
        Documents::insert($documentData);
    }

    return $uploadSuccess;
}


    public function hotelList()
    {
        $data['title'] = 'Hotel Lists';
        $data['hotels']=Hotel::orderBy('id','desc')->get();
        return view('admin.pages.hotel.list', $data);
    }
    public function documetDelete(Request $request ,$id)
    {
       
        $data['hotels']=Documents::where('id',$id)->delete();
        $request->session()->flash('success', 'Delete success');
        return redirect()->back();
    }


    public function add_hotel()
    {
        $data['title'] = 'Hotel Add';
        $data['propertyTypes'] = PropertyType::orderBy('id', 'desc')->get();
        $data['facilities'] = Facility::orderBy('id', 'desc')->get();
        $data['privacies'] = HotelPrivacy::orderBy('id', 'desc')->get();
        $data['services'] = Service::orderBy('id', 'desc')->get();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        return view('admin.pages.hotel.add_hotel', $data);
    }
    public function edit_hotel($id)
    {
        $data['title'] = 'Hotel Add';
        $data['propertyTypes'] = PropertyType::orderBy('id', 'desc')->get();
        $data['facilities'] = Facility::orderBy('id', 'desc')->get();
        $data['privacies'] = HotelPrivacy::orderBy('id', 'desc')->get();
        $data['services'] = Service::orderBy('id', 'desc')->get();
        $data['hotel'] = Hotel::where('id', $id)->first();

        $data['education'] = HotelSaraunding::where('hotel_id', $id)->where('type', 'education')->get();
        $data['health'] = HotelSaraunding::where('hotel_id', $id)->where('type', 'health')->get();
        $data['transportation'] = HotelSaraunding::where('hotel_id', $id)->where('type', 'transportation')->get();
        $data['adventure'] = HotelSaraunding::where('hotel_id', $id)->where('type', 'adventure')->get();
        $data['experience'] = HotelSaraunding::where('hotel_id', $id)->where('type', 'experience')->get();

        $data['property_type'] = HotelAttribute::select('name')->where('hotel_id', $id)->where('type', 'property_type')->get();
        $data['facility_data'] = HotelAttribute::select('name')->where('hotel_id', $id)->where('type', 'facility')->get();
        $data['service_data'] = HotelAttribute::select('name')->where('hotel_id', $id)->where('type', 'service')->get();
        $data['privacy_name'] = HotelAttribute::select('name')->where('hotel_id', $id)->where('type', 'privacy_name')->get();


        $data['gallery_images'] = Documents::where('item_id', $id)->where('table_name','hotels')->get();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        return view('admin.pages.hotel.edit_hotel', $data);
    }

    
   
    public function delete_hotel($id)
    {
        try {
            // Attempt to delete the record
            $deleted = Hotel::where('id', $id)->delete();
    
            if ($deleted) {
                return Response::json([
                    'success' => true,
                    'message' => 'Deleted successfully.'
                ]);
            } else {
                return Response::json([
                    'success' => false,
                    'message' => 'Record not found.'
                ], 404);
            }
        } catch (\Exception $e) {
            // Log the exception if needed
            return Response::json([
                'success' => false,
                'message' => 'An error occurred while deleting the record.'
            ], 500);
        }
    }

    public function add_hotel_action(Request $request)
    {
        //dd($request->all());
        $banner_image = ''; // Initialize the variable

        if ($request->hasFile('banner_image')) {
            $thumbnail = $request->file('banner_image');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $banner_image = '/images/banner_image/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/banner_image'), $thumbnailName);
        }
        $feature_image = ''; // Initialize the variable

        if ($request->hasFile('feature_image')) {
            $thumbnail = $request->file('feature_image');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $feature_image = '/images/feature_image/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/feature_image'), $thumbnailName);
        }
        $create = Hotel::create([
            'title' => $request->title,
            'content' => $request->content,
            'youtube_video' => $request->youtube_link,
            'ratings' => $request->hotel_rating,
            'location' => $request->location,
            'real_address' => $request->real_address,
            'map_link' => $request->map_link,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
            'minimum_advance_reservaction' => $request->minimun_advance_reservaction,
            'maximum_day_stay_req' => $request->minimum_reservaction_day_req,
            'price' => $request->price,
            'exctera_price' => $request->extera_price,
            'service_fee' => $request->service_fee,
            'banner_image' => $banner_image,
            'feature_image' =>  $feature_image,
            'added_by' => Auth::user()->id,
        ]);
        $files = $request->gallery_image;
        $id = $create->id;
        $table_name = "hotels";
        $document_type = "Gallery image";
        if (!empty($files)) {
            $uploadSuccess = $this->multiple_files_upload($files, $id, $table_name, $document_type);
        }


        $categories = ['education', 'health', 'transportation', 'adventure', 'experience'];

        foreach ($categories as $category) {
            // Extract data for this category
            $names = $request->input($category . '_name');
            $contents = $request->input($category . '_content');
            $distances = $request->input($category . '_distance');

            // Ensure all arrays are defined and have the same length
            if (is_array($names) && is_array($contents) && is_array($distances) && count($names) === count($contents) && count($contents) === count($distances)) {
                $count = count($names);
                // dd( $count );
                // Create records for each item in this category
                for ($i = 0; $i < $count; $i++) {
                    HotelSaraunding::create([
                        'hotel_id' => $id, // Assuming $id is defined elsewhere in your code
                        'type' => $category,
                        'name' => isset($names[$i])?$names[$i]:null,
                        'content' => isset($contents[$i])?$contents[$i]:null,
                        'distance' => isset($distances[$i])?$distances[$i]:null,
                    ]);
                }
            }
        }

        $policyTitles = $request['policy_title'];
        $policyContents = $request['policy_content'];
        $count = count($policyTitles);
        for ($i = 0; $i < $count; $i++) {
            // Create a new HotelPolicy record
            HotelPolicy::create([
                'hotel_id' => $id,
                'title' => isset($policyTitles[$i])?$policyTitles[$i]:null,
                'content' => isset($policyContents[$i])?$policyContents[$i]:null,
            ]);
        }

        $desiredKeys = ['property_type', 'facility', 'service', 'privacy_name'];

        foreach ($desiredKeys as $key) {

            if (isset($request[$key]) && is_array($request[$key])) {

                foreach ($request[$key] as $name) {

                    HotelAttribute::create([
                        'hotel_id' => $id,
                        'type' => $key,
                        'name' => $name,
                    ]);
                }
            }
        }

        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }
    public function edit_hotel_action(Request $request ,$id)
    {
        // dd($request->all());
        $banner_image = ''; // Initialize the variable

        if ($request->hasFile('banner_image')) {
            $thumbnail = $request->file('banner_image');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $banner_image = '/images/banner_image/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/banner_image'), $thumbnailName);
            Hotel::where('id',$id)->update([
                'banner_image' => $banner_image,
            ]);
        }
        $feature_image = ''; // Initialize the variable

        if ($request->hasFile('feature_image')) {
            $thumbnail = $request->file('feature_image');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $feature_image = '/images/feature_image/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('images/feature_image'), $thumbnailName);
            Hotel::where('id',$id)->update([
                'feature_image' =>  $feature_image,
            ]);
        }
        $create =  Hotel::where('id',$id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'youtube_video' => $request->youtube_link,
            'ratings' => $request->hotel_rating,
            'location' => $request->location,
            'real_address' => $request->real_address,
            'map_link' => $request->map_link,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
            'minimum_advance_reservaction' => $request->minimum_advance_reservaction,
            'maximum_day_stay_req' => $request->maximum_day_stay_req,
            'price' => $request->price,
            'exctera_price' => $request->exctera_price,
            'service_fee' => $request->service_fee,
            
            
            'added_by' => Auth::user()->id,
        ]);
        $files = $request->gallery_image;
       
        $table_name = "hotels";
        $document_type = "Gallery image";

        if (!empty($files)) {
            $uploadSuccess = $this->multiple_files_upload($files, $id, $table_name, $document_type);
        }

        

        $categories = ['education', 'health', 'transportation', 'adventure', 'experience'];
        HotelSaraunding::where('hotel_id',$id)->delete();
        foreach ($categories as $category) {
            // Extract data for this category
            $names = $request->input($category . '_name');
            $contents = $request->input($category . '_content');
            $distances = $request->input($category . '_distance');
            
            // Ensure all arrays are defined and have the same length
            if (is_array($names) && is_array($contents) && is_array($distances) && count($names) === count($contents) && count($contents) === count($distances)) {
                $count = count($names);

                // Create records for each item in this category
                for ($i = 0; $i < $count; $i++) {

                    HotelSaraunding::create([
                        'hotel_id' => $id, // Assuming $id is defined elsewhere in your code
                        'type' => $category,
                        'name' => isset($names[$i])?$names[$i]:null,
                        'content' => isset($contents[$i])?$contents[$i]:null,
                        'distance' => isset($distances[$i])?$distances[$i]:null,
                    ]);
                }
            }
        }

        $policyTitles = $request['policy_title'];
        $policyContents = $request['policy_content'];
        $count = count($policyTitles);
        HotelPolicy::where('hotel_id',$id)->delete();
        for ($i = 0; $i < $count; $i++) {
            // Create a new HotelPolicy record
            HotelPolicy::create([
                'hotel_id' => $id,
                'title' => isset($policyTitles[$i])?$policyTitles[$i]:null,
                'content' => isset($policyContents[$i])?$policyContents[$i]:null,
            ]);
        }

        $desiredKeys = ['property_type', 'facility', 'service', 'privacy_name'];
        HotelAttribute::where('hotel_id',$id)->delete();
        foreach ($desiredKeys as $key) {

            if (isset($request[$key]) && is_array($request[$key])) {

                foreach ($request[$key] as $name) {

                    HotelAttribute::create([
                        'hotel_id' => $id,
                        'type' => $key,
                        'name' => $name,
                    ]);
                }
            }
        }

        $request->session()->flash('success', 'Update success');
        return redirect()->back();
    }
    public function proprity_type()
    {
        $data['title'] = 'Add Poperty Type';
        $data['propertyTypes'] = PropertyType::orderBy('id', 'desc')->get();
        return view('admin.pages.proprity_type.list', $data);
    }
    public function proprity_typeAddAction(Request $request)
    {
        PropertyType::create([
            'property_type' => $request->property_type,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }
    public function proprity_typeEditAction(Request $request, $id)
    {
        PropertyType::where('id', $id)->update([
            'property_type' => $request->property_type,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'Update success');
        return redirect()->back();
    }
    public function proprity_type_edit($id)
    {
        $data['title'] = 'Edit Poperty Type';
        $data['propertyTypes'] = PropertyType::orderBy('id', 'desc')->get();
        $data['propertyType'] = PropertyType::where('id', $id)->first();
        return view('admin.pages.proprity_type.list', $data);
    }
    public function proprity_type_delete(Request $request, $id)
    {
        $data['title'] = 'Add Poperty Type';
        $data['propertyType'] = PropertyType::where('id', $id)->delete();
        $request->session()->flash('success', 'prperty Type Deleted successfully');
        return redirect()->back();
    }

    public function facility()
    {
        $data['title'] = 'Facility Add';
        $data['facilities'] = Facility::orderBy('id', 'desc')->get();
        return view('admin.pages.facility.list', $data);
    }

    public function facilityAddAction(Request $request)
    {
        Facility::create([
            'facility_name' => $request->facility_name,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }

    public function facilityEditAction(Request $request, $id)
    {
        Facility::where('id', $id)->update([
            'facility_name' => $request->facility_name,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'Update success');
        return redirect()->back();
    }

    public function facility_edit($id)
    {
        $data['title'] = 'Edit Poperty Type';
        $data['propertyTypes'] = Facility::orderBy('id', 'desc')->get();
        $data['propertyType'] = Facility::where('id', $id)->first();
        return view('admin.pages.proprity_type.list', $data);
    }
    public function facility_delete(Request $request, $id)
    {
        $data['title'] = 'Add Poperty Type';
        $data['propertyType'] = Facility::where('id', $id)->delete();
        $request->session()->flash('success', ' Deleted successfully');
        return redirect()->back();
    }
    public function hotelPrivacy()
    {
        $data['title'] = 'Privacy Add';
        $data['privacies'] = HotelPrivacy::orderBy('id', 'desc')->get();
        return view('admin.pages.privacy.list', $data);
    }

    public function privacyAddAction(Request $request)
    {
        HotelPrivacy::create([
            'privacy_name' => $request->privacy_name,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }

    public function privacyEditAction(Request $request, $id)
    {
        HotelPrivacy::where('id', $id)->update([
            'privacy_name' => $request->privacy_name,

            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'Update success');
        return redirect()->back();
    }

    public function privacy_edit($id)
    {
        $data['title'] = 'Edit Privacy ';
        $data['privacies'] = HotelPrivacy::orderBy('id', 'desc')->get();
        $data['privacy'] = HotelPrivacy::where('id', $id)->first();
        return view('admin.pages.privacy.list', $data);
    }
    public function privacy_delete(Request $request, $id)
    {
        $data['title'] = 'Add Poperty Type';
        $data['propertyType'] = HotelPrivacy::where('id', $id)->delete();
        $request->session()->flash('success', ' Deleted successfully');
        return redirect()->back();
    }


}
