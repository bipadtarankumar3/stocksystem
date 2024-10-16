@extends('web.layouts.main')
@section('content')
<section class="">
    <div class="container">
      <div class="row mt-4 mb-4">
        <!-- Main image area -->
        <div class="col-md-8 mb-1 p-0 img-over">
          <!-- Check if documents exist and display the first one -->
          @if($tour->documents && $tour->documents->first())
            <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
              <img src="{{ URL::to('public/upload/' . $tour->documents->first()->image_name) }}" alt="" class="w-100" style="height: 100%;"  />
            </a>
          @endif
        </div>
  
        <!-- Smaller images area -->
        <div class="col-md-4 p-0 pl-1">
          <div class="row m-0">
            <!-- Check if documents exist and loop through the rest of the images -->
            @if($tour->documents)
            @foreach ($tour->documents->slice(1)->take(2) as $doc)
                <div class="col-md-12 col-xs-6 pl-1 pr-1 pb-2 img-over">
                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
                        <img src="{{ URL::to('public/upload/' . $doc->image_name) }}" alt="" class="w-100" />
                    </a>
                </div>
            @endforeach
        @endif
        
            
            <!-- If there are more than 2 documents, display the "View All" button -->
            @if($tour->documents && $tour->documents->count() > 2)
              <div class="col-md-12 col-xs-6 pl-1 pr-1 pb-2 img-over" style="position:relative;">
                <div class="view-all">
                  <button class="btn btn-view-all" data-toggle="modal" data-target=".bd-example-modal-xl">
                    View all <i class="fa fa-angle-right"></i>
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  
  

  <section id="Overview">
    <div class="container">
      <div class="row" style=" border-top: 1px solid #bfbfbf;">
        <div class="col-md-8 mt-4">
          <div class="prop-detail-a">
            <h2 class="mb-3">{{ $tour->title }}</h2>
            <p>{!!$tour->description!!}</p>
            <!--<h4 id="Amenities">Popular amenities</h4>
            <div class="row">
              <div class="col-6">
                <div class="popular-amenities">
                   <ul>
                     <li><img src="images/pool.svg" alt=""/> Pool <img src="images/info.svg" alt="" style="width: 16px;"/></li>
                     <li><img src="images/coffee-cup.svg" alt=""/> Breakfast available <img src="images/info.svg" alt="" style="width: 16px;"/></li>
                     <li><img src="images/spa.svg" alt=""/> Spa</li>
                   </ul>
                </div>
              </div>
              <div class="col-6">
               <div class="popular-amenities">
                   <ul>
                     <li><img src="images/restaurant.svg" alt=""/> Restaurant <img src="images/info.svg" alt="" style="width: 16px;"/></li>
                     <li><img src="images/wifi.svg" alt=""/> Free WiFi </li>
                     <li><img src="images/air-conditioning.svg" alt=""/> Air conditioning</li>
                   </ul>
                </div>
              </div>
              <div class="col-12">
                <div class="see-all mb-4"><a href="#">See all property amenities <i class="fa fa-angle-right"></i> </a></div>
              </div>
            </div>-->
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="bg-light text-center pt-5 pb-5">
            <a href="{{URL::To('tour-book-page',$tour->id)}}"><button class="btn btn-info-custom w-50">Book Now</button></a>
            <!--<h4>Explore the area</h4>
             <div class="map-body">
                <div class="map">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5244.931822706119!2d87.55303141116794!3d21.635564690052664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a03332c6b09af5d%3A0xb62ac7ec4d6ce95a!2sShankarpur%20mohona!5e0!3m2!1sen!2sin!4v1720450322610!5m2!1sen!2sin" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p class="mb-1 ml-2">Jalan Pantai Kuta, Kuta, Bali, 80361</p>
                <div class="see-all mb-4 ml-2"><a href="#">View in a map </a></div>
             </div>
             <div class="map-location mt-3">
               <div class="popular-amenities">
                   <ul>
                     <li><img src="images/map.svg" alt=""/> Beachwalk Shopping Center <span>1 min walk</span></li>
                     <li><img src="images/map.svg" alt=""/> Kuta Beach <span>1 min walk</span></li>
                     <li><img src="images/map.svg" alt=""/> Waterbom Bali <span>18 min walk</span></li>
                     <li><img src="images/airplane.svg" alt=""/> Denpasar (DPS-Ngurah Rai Intl.) <span>29 min drive</span></li>
                   </ul>
                </div>
                <div class="see-all mb-4"><a href="#">See more <i class="fa fa-angle-right"></i> </a></div>
             </div>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <section id="Rooms">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h3>Detailed Itinerary</h3>
          <h6 class="text-gray">Your days at a glance</h6>
        </div>
        <div class="col-md-8 mt-3">
          <div class="wf-accordion-group js-accordion-group">


            @foreach ($ExpriencePackageDay as $key => $item)
                <div class="wf-accordion js-accordion">
                    <div class="wf-accordion__header js-accordion__header">
                        <div class="wf-accordion__trigger js-accordion__trigger js-accordion-custom">
                        <div class="number-add-on">
                            <p>Day</p>
                            <h5> {{$item->package_day}}</h5>
                        </div>
                        <div class="text-add-on">
                            {{-- <p>Sat, 5th October '24</p> --}}
                            <h6>{{$item->package_day_title}}</h6>
                        </div>
                        </div>
                    </div>
                    <div class="wf-accordion__panel js-accordion__panel">
                        <p> {{$item->package_description}}</p>            
                    </div>
                </div>
            @endforeach

        </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="row">
           <div class="col-md-12 mt-3 mb-3">
             <div class="border-1  mb-3"></div>
           </div>
            <div class="col-md-4 mt-3">
              <h5>What's included</h5>

              @foreach ($package_includeds as $item)
              <div class="help-box mb-3">
                {{-- <i class="fa fa-home" aria-hidden="true"></i> --}}
                <h6>{{$item->in_title}}</h6>
                <p>{{$item->in_description}}</p>
              </div>
              @endforeach



            </div>

            
            <div class="col-md-4 mt-3">
              <h5>What's not included</h5>

              @foreach ($package_not_includeds as $item)
              <div class="help-box mb-3">
                <h6>{{$item->in_not_title}}</h6>
                <p>{{$item->in_not_description}}</p>
              </div>
              @endforeach


            </div>


            
            <div class="col-md-4 mt-3">
              <h5>What to carry</h5>

              @foreach ($package_carry as $item)
              <div class="help-box mb-3">
                <h6>{{$item->carry_title}}</h6>
                <p>{{$item->carry_description}}</p>
              </div>
              @endforeach


            </div>



            
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12 mb-2 mt-2">
          <div class="border border-red p-3">
            <table class="w-100">
              <tr>
                <td><img src="images/lodging_priming.svg" alt=""/></td>
                <td><h5>Enjoy more peace of mind by adding stay protection at checkout.</h5></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <h3>Our policies</h3>
          <h6 class="text-gray">Please read them once</h6>
        </div>
        <div class="col-md-8">
        <div class="wf-accordion-group js-accordion-group">
          <div class="wf-accordion js-accordion">
              <div class="wf-accordion__header js-accordion__header">
                  <h3 class="wf-accordion__trigger js-accordion__trigger accordion-border">General Policy</h3>
              </div>
              <div class="wf-accordion__panel js-accordion__panel">
                  <p>A. details</p>
              </div>
          </div>
          <div class="wf-accordion js-accordion" >
              <div class="wf-accordion__header js-accordion__header">
                  <h3 class="wf-accordion__trigger js-accordion__trigger accordion-border">Cancellation Policy</h3>
              </div>
              <div class="wf-accordion__panel js-accordion__panel">
                  <p>A. details</p>
              </div>
          </div>
        </div>
        </div>
      </div>
      <!--<div class="row">
        <div class="col-md-12 mb-4 mt-2">
          <div class="border border-red p-3">
            <h3>Have a question?</h3>
            <p>Search in general property info and reviews.</p>
            <form class=" w-100">
                <div class="form-row align-items-center">
                  <div class="col-11">
                    <label class="sr-only" for="inlineFormInputGroup">Search</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
                    </div>
                  </div>
                  <div class="col-1">
                    <button type="submit" class="btn btn-primary mb-2" style="border-radius: 30px;
      padding: 8px 13px;"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>-->
      
      <div class="row">
        <div class="col-md-12 mt-3">
          <h3>FAQs</h3>
          <h6 class="text-gray">Frequently asked questions</h6>
        </div>
        <div class="col-md-8">
        <div class="wf-accordion-group js-accordion-group">

            @foreach ($package_faqs as $key => $item)
            <div class="wf-accordion js-accordion">
                <div class="wf-accordion__header js-accordion__header">
                    <h3 class="wf-accordion__trigger js-accordion__trigger accordion-border">{{$item->faq_question}}</h3>
                </div>
                <div class="wf-accordion__panel js-accordion__panel">
                    <p> {{$item->faq_answers}}</p>
                </div>
            </div>
            @endforeach

        </div>
        </div>
      </div>
      
    </div>
  </section>
  
  <section id="Accessibility">
    <div class="container">
      <div class="row">
         <div class="col-md-12 mt-3 mb-3">
           <div class="border-1  mb-3"></div>
           <h3>More Trips Around Bhutan</h3>
         </div>
      </div>
      <div class="row">

        @foreach ($tour_more_list as $item)
        <div class="col-md-3 mb-3">
            <div class="listing-box border border-red">
              <div class="listing-box-slider">
                   <img src="{{URL::to('public'.$item->feature_image)}}" alt="" class="w-100" style="height: 200px"/>
                 
                 <div class="listing-box-top w-auto p-0">
                    <div class="popular-shay">Trip</div>
                 </div>
              </div>
              <div class=" pl-3">
              <h4>{{$item->title}}</h4>
              <p>{{$item->location_name}}</p>
               <div class="popular-amenities">
                    <ul>
                      <li><i class="fa fa-inr"></i> {{$item->amount}} per person</li>
                      <li><i class="fa fa-clock-o"></i>{{$item->total_days??0}}Days</li>
                    </ul>
                 </div>
              </div>
              <a href="{{URL::to('tour-details/'.$item->id)}}">
                <button class="btn btn-info-custom w-100 rounded-0">Explore Now</button>
              </a>
              
            </div>
         </div>
        @endforeach
        


      </div>
    </div>
  </section>
  
  
  {{-- <section id="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 mb-3">
           <div class="border-1  mb-3"></div>
         </div>
         <div class="col-md-4 mt-3 mb-3">
           <h3>About this property</h3>
         </div>
         <div class="col-md-8 mb-3">
           <h5>Sheraton Bali Kuta Resort</h5>
           <p>Sheraton Bali Kuta Resort offers its guests a full-service spa, 2 outdoor swimming pools, a health club, and a sauna. There are 2 restaurants on site. You can enjoy a drink at the bar/lounge. Public spaces have free WiFi.</p>
           <p>A 24-hour business center and 10 meeting rooms are available. A children's pool, spa services, and a terrace are also featured at the luxury Sheraton Bali Kuta Resort. An airport shuttle (available 24 hours) is available for a fee. Free self parking and valet parking are available.</p>
           <p>This 5-star Kuta hotel is smoke free.</p>
           <h5>Languages</h5>
           <p>Chinese (Mandarin), English, German, Indonesian, Japanese</p>
         </div>
      </div>
    </div>
  </section> --}}
  
  
{{--   
  <section id="Policies">
    <div class="container">
      <div class="row">
         <div class="col-md-12 mt-3 mb-3">
           <div class="border-1  mb-3"></div>
         </div>
         <div class="col-md-4 mt-3 mb-3">
           <h3>Policies</h3>
         </div>
         <div class="col-md-8 mb-3">
           <div class="row">
             <div class="col-md-6">
               <h5>Check-in</h5>
               <p>Check-in start time: 3:00 PM; Check-in end time: noon</p>
               <p>Late check-in subject to availability</p>
             </div>
             <div class="col-md-6">
               <h5>Check-out</h5>
               <p>Check-out before noon</p>
               <p>Late check-out subject to availability</p>
               <p>A late check-out fee will be charged</p>
             </div>
           </div>
           <h5>Special check-in instructions</h5>
           <p>This property offers transfers from the airport (surcharges may apply); guests must contact the property with arrival details before travel, using the contact information on the booking confirmation
  Guests must contact the property in advance for check-in instructions; front desk staff will greet guests on arrival</p>
           <p>To make arrangements for check-in please contact the property at least 24 hours before arrival using the information on the booking confirmation</p>
           <p>If you are planning to arrive after midnight please contact the property in advance using the information on the booking confirmation</p>
           <h5>Renovations and closures</h5>
           <p>The property will be renovating from March 15 2024 to July 31 2024 (completion date subject to change). The following areas are affected:
           <ul>
             <li>Lobby</li>
           </ul>
  
  In accordance with local regulations, all visitors must remain within the property during Seclusion Day (Nyepi)/Hindu New Year for a 24-hour period (starting at 6 AM). Seclusion Day typically falls in March or April (dates subject to change each year). Check-in and check-out will not be possible on that date. Ngurah Rai Airport (Bali International Airport) is also closed on Seclusion Day.
  Renovation work will only be conducted during business hours. Every effort will be made to minimize noise and disturbance.</p>
         </div>
      </div>
    </div>
  </section> --}}
  

@endsection
