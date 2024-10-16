<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Experiance;
use App\Models\ExperianceAvailable;
use App\Models\ExpriencePackage;
use App\Models\ExpriencePackageDay;
use App\Models\ExpriencePackageAvailableDay;
use App\Models\experianceCategory;
use App\Models\experianceAttribute;
use App\Models\Location;
use App\Models\RoomAvailable;
use App\Models\Hotel;
use App\Models\HotelSaraunding;
use App\Models\Room;
use App\Models\RoomAmenities;
use App\Models\RoomAvailableDate;
use App\Models\TourExprienceBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\package_carry;
use App\Models\package_faq;
use App\Models\package_included;
use App\Models\package_not_included;

class WebViewController extends Controller
{
    public function index(){
      
        $data['locations']=Location::orderBy('id','desc')->get();
        $data['expriences']=Experiance::orderBy('id','desc')->get();
        $locationssearch=Location::orderBy('id','desc')->pluck('location_name')->toArray();
        $data['locationssearch']=json_encode($locationssearch);
        return view('web.pages.index',$data);
    }


    public function toursPage(Request $request)
    {
        // dd($request->all());
        Session::put('traveler',$request->traveler);
        $data['experianceCategory'] = experianceCategory::orderBy('id', 'desc')->get();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        $data['travel_style'] = experianceAttribute::where('attribute_type', 'travel_style')->orderBy('id', 'desc')->get();
        $data['facilities'] = experianceAttribute::where('attribute_type', 'facilities')->orderBy('id', 'desc')->get();
        $data['tour_feature'] = experianceAttribute::where('attribute_type', 'travel_style')->orderBy('id', 'desc')->get();
    
        $tourQuery = ExpriencePackage::query();
    
        // Filter by search date range and availability status
        if ($request->has('search_date') && !empty($request->input('search_date'))) {
            $searchd = explode('-', $request->input('search_date'));
            $from_date = date('Y-m-d', strtotime(trim($searchd[0])));
            $to_date = date('Y-m-d', strtotime(trim($searchd[1])));
    
            $availableDays = ExpriencePackageAvailableDay::select('exprience_package_id')
                ->whereBetween('exprience_package_available_date', [$from_date, $to_date])
                ->where('exprience_package_available_status', 'available')
                ->distinct()
                ->pluck('exprience_package_id');
    
            $tourQuery->whereIn('id', $availableDays);
        }
    
        // Filter by location
        if ($request->has('location_id') && !empty($request->input('location_id'))) {
            $tourQuery->where('location_id', $request->input('location_id'));
        }
    
        // Filter by tour type (if applicable)
        if ($request->has('category_id') && !empty($request->input('category_id'))) {
            $tourQuery->where('category_id', $request->input('category_id'));
        }
    
        // Filter by price range
        if ($request->has('minPrice') && !empty($request->input('minPrice'))) {
            $tourQuery->where('amount', '>=', $request->input('minPrice'));
        }
    
        if ($request->has('maxPrice') && !empty($request->input('maxPrice'))) {
            $tourQuery->where('amount', '<=', $request->input('maxPrice'));
        }
    
        // Filter by travel style
        if ($request->has('travel_style_id') && !empty($request->input('travel_style_id'))) {
            $tourQuery->where('experiance_attribute_style_id', $request->input('travel_style_id'));
        }
    
        // Filter by facilities
        if ($request->has('facilitie_id') && !empty($request->input('facilitie_id'))) {
            $tourQuery->where('experiance_attribute_facilities_id', $request->input('facilitie_id'));
        }
    
        // Filter by tour feature
        if ($request->has('feature_id') && !empty($request->input('feature_id'))) {
            $tourQuery->where('experiance_attribute_features_id', $request->input('feature_id'));
        }
    
        // Apply pagination (10 items per page)
        $data['tours'] = $tourQuery->orderBy('id', 'desc')->paginate(10);
    
        return view('web.pages.tours', $data);
    }
    
    public function expriencesPage(Request $request){
      
        
        // $data['tours']=Experiance::orderBy('id','desc')->get();


        $data['experianceCategory'] = experianceCategory::orderBy('id', 'desc')->get();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        $data['travel_style'] = experianceAttribute::where('attribute_type', 'travel_style')->orderBy('id', 'desc')->get();
        $data['facilities'] = experianceAttribute::where('attribute_type', 'facilities')->orderBy('id', 'desc')->get();
        $data['tour_feature'] = experianceAttribute::where('attribute_type', 'travel_style')->orderBy('id', 'desc')->get();
        
        Session::put('traveler',$request->traveler);
        $tourQuery = Experiance::query();
    
        // Filter by search date range and availability status
        if ($request->has('search_date') && !empty($request->input('search_date'))) {
            $searchd = explode('-', $request->input('search_date'));
            $from_date = date('Y-m-d', strtotime(trim($searchd[0])));
            $to_date = date('Y-m-d', strtotime(trim($searchd[1])));
    
            $availableDays = ExperianceAvailable::select('exp_experiance_id')
                ->whereBetween('exp_available_date', [$from_date, $to_date])
                ->where('exp_available_status', 'available')
                ->distinct()
                ->pluck('exp_experiance_id');
    
            $tourQuery->whereIn('id', $availableDays);
        }
    
        // Filter by location
        if ($request->has('location_id') && !empty($request->input('location_id'))) {
            // dd($request->input('location_id'));
            $tourQuery->where('location_id', $request->input('location_id'));
        }
    
        // Filter by tour type (if applicable)
        if ($request->has('category_id') && !empty($request->input('category_id'))) {
            $tourQuery->where('category_id', $request->input('category_id'));
        }
    
        // Filter by price range
        if ($request->has('minPrice') && !empty($request->input('minPrice'))) {
            $tourQuery->where('amount', '>=', $request->input('minPrice'));
        }
    
        if ($request->has('maxPrice') && !empty($request->input('maxPrice'))) {
            $tourQuery->where('amount', '<=', $request->input('maxPrice'));
        }
    
        // Filter by travel style
        if ($request->has('travel_style_id') && !empty($request->input('travel_style_id'))) {
            $tourQuery->where('experiance_style_id', $request->input('travel_style_id'));
        }
    
        // Filter by facilities
        // if ($request->has('facilitie_id') && !empty($request->input('facilitie_id'))) {
        //     $tourQuery->where('experiance_facilities_id', $request->input('facilitie_id'));
        // }
    
        // Filter by tour feature
        if ($request->has('feature_id') && !empty($request->input('feature_id'))) {
            $tourQuery->where('experiance_features_id', $request->input('feature_id'));
        }
    
        // Apply pagination (10 items per page)
        $data['tours'] = $tourQuery->orderBy('id', 'desc')->paginate(10);

        
        return view('web.pages.expriences',$data);
    }
    public function tourDetails($id){
      
        
        $data['tour']=ExpriencePackage::where('id',$id)->first();
        $data['tour_more_list']=ExpriencePackage::join('locations','locations.id','exprience_packages.location_id')
        ->select('exprience_packages.*', 'locations.location_name')
        ->whereNot('exprience_packages.id',$id)
        ->get();
        $data['ExpriencePackageDay']=ExpriencePackageDay::where('exprience_package_id',$id)->get();

        $data['package_includeds'] = package_included::where('in_exprience_package_id', $id)->get();
        $data['package_not_includeds'] = package_not_included::where('in_not_exprience_package_id', $id)->get();
        $data['package_carry'] = package_carry::where('carry_exprience_package_id', $id)->get();
        $data['package_faqs'] = package_faq::where('faq_exprience_package_id', $id)->get();
        
        return view('web.pages.toursDetails',$data);
    }
    public function exprienceDetails($id){
      
        
        $data['tour']=Experiance::where('id',$id)->first();
        
        return view('web.pages.exprienceDetails',$data);
    }
    public function search(Request $request)
    {
        $location_name = $request->get("location_name");
        $search_date = $request->get("search_date");
        $from_date = '';
        $to_date = '';
    
        if (!empty($search_date)) {
            // Explode and trim to handle dates correctly
            $searchd = explode('-', $search_date);
            $from_date = date('Y-m-d', strtotime(trim($searchd[0])));
            $to_date = date('Y-m-d', strtotime(trim($searchd[1])));
            $request->session()->put('from_date',  $from_date);
            $request->session()->put('to_date',  $to_date);
        }
    
        $no_of_travelers = $request->get("no_of_travelers");
    
        $search = DB::select("SELECT * 
                            FROM `hotels` 
                            LEFT JOIN `locations` 
                                ON `locations`.`location_name` = `hotels`.`location`
                            LEFT JOIN `room_available_dates` 
                                ON `room_available_dates`.`rad_hotel_id` = `hotels`.`id`
                            WHERE `rad_available_date` BETWEEN DATE('$from_date') AND DATE('$to_date')
                            AND rad_available_status = 'YES'
                            GROUP BY hotels.id;"
                        );
      
      //dd($location_name);
    
        // Get the raw SQL query
    //     $raw_sql_query = $search_query->toSql();
      
    //     // Execute the query to get the results
    //     $search = $search_query->orderBy('hotels.id', 'desc')->get();
    //   //dd( $search);
    
    //     // Count the number of results
    //     $searchcount = $search->count();
    
        // Return the view with results
        return view('web.pages.search_list', compact('search', 'no_of_travelers','location_name'));
    }
    

    public function property_details($rav_id){

        $roomavailable = RoomAvailable::where('id',$rav_id)->first();
        $data['roomavailable']=$roomavailable;
        $data['hotel']=Hotel::where('id',$roomavailable->hotel_id)->first();

        $data['room']=Room::where('id',$roomavailable->room_id)->first();
        
        $data['rooms']=Room::where('id',$roomavailable->room_id)->get();
        $data['related_rooms']=Room::where('id','!=',$roomavailable->room_id)->get();

        $locations=Location::orderBy('id','desc')->get();
        $data['surrounding']=HotelSaraunding::where('hotel_id',$roomavailable->hotel_id)->orderBy('id','desc')->get();
        $from_date = session()->get('from_date');
        $to_date = session()->get('to_date');
        
        $data['availableRooms'] = RoomAvailableDate::whereDate('rad_available_date', '>=', $from_date)
            ->whereDate('rad_available_date', '<=', $to_date)
            ->get();
        
            $data['totalAmount'] = $data['availableRooms']->sum('rad_amount');

        return view('web.pages.property_details',$data);
    }
    public function payNow($hotel_id ,$room_id){
        // dd($hotel_id);

        $from_date = session()->get('from_date');
        $to_date = session()->get('to_date');
        
        $data['availableRooms'] = RoomAvailableDate::whereDate('rad_available_date', '>=', $from_date)
            ->whereDate('rad_available_date', '<=', $to_date)
            ->get();
        
            $data['totalAmount'] = $data['availableRooms']->sum('rad_amount');
        // dd( $data['totalAmount']);
        $data['room']=Room::where('id',$room_id)->first();
        $data['hotel']=Hotel::where('id',$hotel_id)->first();

        return view('web.pages.payment',$data);
    }
    public function bookNow(Request $request){
        $from_date = session()->get('from_date');
        $to_date = session()->get('to_date');
        $booking_id = Str::upper(Str::random(8));
      Booking::create([
        'first_name'=>$request->first_name,
        
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'protect_stay_status'=>$request->protection,
        'room_id'=>$request->room_id,
        'check_in_datetime'=> $from_date,
        'check_out_datetime'=>$to_date,
        'total_price'=>$request->amount,
        'booking_id'=>$booking_id,
      ]);
      return redirect('booking-status/'.$booking_id)->with('success', 'Booking Complete');

    }
    public function tour_book_page(Request $request ,$id){
        $data['tour']=ExpriencePackage::where('id',$id)->first();
        
      return view('web.pages.tourPayment',$data);

    }
    public function tourBookNow(Request $request){
      
        $booking_id = Str::upper(Str::random(8));
        TourExprienceBooking::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'traveler'=>Session::get('traveler'),
        'email'=>$request->email,
        'phone'=>$request->phone,
        'tour_exp_id'=>$request->tour_exp_id,
        'type'=>"tour",
        'total_price'=>$request->amount,
        'booking_id'=>$booking_id,
      ]);
      return redirect('tour-exprience-booking-status/'.$booking_id)->with('success', 'Booking Complete');

    }
    public function expBookNow(Request $request){
      
        $booking_id = Str::upper(Str::random(8));
        TourExprienceBooking::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'traveler'=>Session::get('traveler'),
        'tour_exp_id'=>$request->room_id,
        'type'=>"exprience",
        'total_price'=>$request->amount,
        'booking_id'=>$booking_id,
      ]);
      return redirect('tour-exprience-booking-status/'.$booking_id)->with('success', 'Booking Complete');

    }
    public function bookingStatus(Request $request ,$booking_id){
        $bookingDetails=Booking::where('booking_id',$booking_id)->first();
    return view('web.pages.payment_status',compact('bookingDetails'));
    }
    public function TourExpbookingStatus(Request $request ,$booking_id){
        $bookingDetails=TourExprienceBooking::where('booking_id',$booking_id)->first();
    return view('web.pages.TourExp_payment_status',compact('bookingDetails'));
    }
}
