@extends('web.layouts.main')
@section('content')



<section class="">
  <div class="container">
    <div class="row mt-4 mb-4">
      <div class="col-md-8 mb-1 p-0 img-over">
        <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
          <img src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" class="w-100" />
        </a>
      </div>
      <div class="col-md-4 p-0 pl-1">
        <div class="row m-0">
          <div class="col-md-12 col-xs-6 pl-1 pr-1 pb-2 img-over">
            <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
              <img src="{{URL::to('public/assets/web/images/img-2.jpg')}}" alt="" class="w-100" />
            </a>
          </div>
          <div class="col-md-12 col-xs-6 pl-1 pr-1 pb-2 img-over" style="position:relative;">
            <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
              <img src="{{URL::to('public/assets/web/images/img-3.jpg')}}" alt="" class="w-100" />
            </a>
            <div class="view-all"><button class="btn btn-view-all" data-toggle="modal" data-target=".bd-example-modal-xl">View all <i class="fa fa-angle-right"></i></button></div>
          </div>
          <!--<div class="col-md-12 pl-1 pr-1 pb-2 img-over">
              <img src="{{URL::to('public/assets/web/images/img-4.jpg')}}" alt="" class="w-100"/>
            </div>-->
          <!--<div class="col-md-6 pl-1 pr-1 pb-2 img-over">
              <img src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" class="w-100"/>
            </div>-->
        </div>
      </div>
    </div>

  </div>
</section>


<section>
  <div class="container">
    <div class="row" style=" border-bottom: 1px solid #bfbfbf;">
      <div class="col-md-8">
        <div class="all-page-nav">
          <ul>
            <li><a href="#Overview" class="sliding-link">Overview</a></li>
            <li><a href="#Amenities" class="sliding-link">Amenities</a></li>
            <li><a href="#Rooms" class="sliding-link">Rooms</a></li>
            <li><a href="#Accessibility" class="sliding-link">Accessibility</a></li>
            <li><a href="#Policies" class="sliding-link">Policies</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pull-r-custom"><button class="btn otuline-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</button> <button class="btn btn-info-custom">Reserve a room</button></div>
      </div>
    </div>
  </div>
</section>

<section id="Overview">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mt-4">
        <div class="prop-detail-a">
          <h2>{{$hotel->title}}</h2>
          <p class="five-star"><i class="fa fa-star"></i> &nbsp; <i class="fa fa-star"></i> &nbsp; <i class="fa fa-star"></i> &nbsp; <i class="fa fa-star"></i> &nbsp; <i class="fa fa-star"></i> &nbsp;</p>
          <p>{{$hotel->content}}</p>
          <h4><span>8.8</span>Excellent</h4>
          <p><b>Guests liked:</b> <br>
            Friendly staff
          </p>
          <div class="see-all mb-4"><a href="#">See all 1,002 reviews <i class="fa fa-angle-right"></i> </a></div>
          @if(!empty($room->room_amenities))
          <h4 id="Amenities">Popular amenities</h4>
          <div class="row">
            <div class="col-12">
              <div class="popular-amenities">
                <ul>
                  @php echo GetroomAmenities($room->id); @endphp
                </ul>
              </div>
            </div>
            <!-- <div class="col-12">
              <div class="see-all mb-4"><a href="#">See all property amenities <i class="fa fa-angle-right"></i> </a></div>
            </div> -->
          </div>
          @endif
        </div>
      </div>
      <div class="col-md-4 mt-4">
        <div class="">
          @if(!empty($hotel->map_link))
          <h4>Explore the area</h4>
          <div class="map-body">

            <div class="map">
              @php echo $hotel->map_link; @endphp
            </div>
            
            <p class="mb-1 ml-2">{{$hotel->reak_address}}</p>
            <!-- <div class="see-all mb-4 ml-2"><a href="#">View in a map </a></div> -->
          </div>
          @endif

          <div class="map-location mt-3">
            <div class="popular-amenities">
              <ul>
                @if(!empty($surrounding) && $surrounding)
                 @foreach($surrounding as $i=>$sd)
                  @if($sd->name && !empty($sd->name))
                  <li><img src="{{URL::to('public/assets/web/images/map.svg')}}" alt="" /> {{$sd->name}} <span>{{$sd->distance}}</span></li>
                  @endif
                  @endforeach
                @endif
              </ul>
            </div>
            <!-- <div class="see-all mb-4"><a href="#">See more <i class="fa fa-angle-right"></i> </a></div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="Rooms">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h3>Choose your room</h3>
      </div>
      <div class="col-md-12 mt-3">
        <div class="tabcontent-inner">
          <form class="row book-form">
            <div class="col-md-12">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="exampleInputDate1"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                  <input type="text" class="form-control" id="exampleInputDate1" placeholder="Check in - Jul 18">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputDate2"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                  <input type="text" class="form-control" id="exampleInputDate2" placeholder="Check out - Jul 20">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputTravelers"><i class="fa fa-user-o" aria-hidden="true"></i></label>
                  <input type="text" class="form-control" id="exampleInputTravelers" placeholder="2 travelers, 1 room">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach ($rooms as $room)
      <div class="col-md-4 mt-3 mb-3">
        <div class="listing-box border border-red">
          <div class="listing-box-slider">
            <div class="owl-product-list owl-carousel owl-theme">

              @foreach ($room->documents as $doc)
                  <div class="item"><img src="{{URL::to('public/upload/'.$doc->image_name)}}" alt="" /></div>
              @endforeach
              
            </div>
            {{-- <div class="listing-box-top p-0">
              <div class="popular-shay">Popular for short stays</div>
            </div> --}}
          </div>
          <div class=" pl-3">
            <h4>{{$room->name}}</h4>
            <p>{{$room->roomType->type}}</p>
            <div class="popular-amenities">
              <ul>
                @php echo GetroomAmenities($room->id); @endphp
               
              </ul>
            </div>
            <div class="see-all-r mb-2"><a href="#">Non-refundable <img src="{{URL::to('public/assets/web/images/info.svg')}}" alt="" /> </a></div>
            <div class="see-all mb-2"><a href="#">More details <i class="fa fa-angle-right"></i> </a></div>
          </div>
          <div class="border-1"></div>
          <div class=" pl-3">
            <p><b>Extas</b></p>
            <table class="w-100">
              <tr>
                <td>
                  <div class="form-check pl-0">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label pl-4" for="exampleRadios1">
                      No extras
                    </label>
                  </div>
                </td>
                <td>+ $0</td>
              </tr>
              {{-- <tr>
                <td>
                  <div class="form-check pl-0">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label pl-4" for="exampleRadios2">
                      Breakfast for 2
                    </label>
                  </div>
                </td>
                <td>+ $21</td>
              </tr> --}}
            </table>
            <h3 class="pri mt-4">₹{{$roomavailable->amount}} <br> <span>₹{{$roomavailable->amount}} total</span></h3>
            <p class="left-for">includes taxes & fees <span>We have 5 left</span></p>
            <div class="row">
              <div class=" col-6">
                <div class="see-all mb-2"><a href="#">Price details <i class="fa fa-angle-right"></i> </a></div>
              </div>
              <div class=" col-6 pr-4 mb-3">
                <button class="btn btn-info-custom pull-r-custom" data-toggle="modal" data-target=".bd-example-modal-lg">Reserve</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 pl-1">
                <div class="border-1 mb-2"></div>
                <div class="owl-product-date owl-carousel owl-theme">
                  @foreach ($room->availableDates as $date)
                    @php
                      $dateObj = new \DateTime($date->rad_available_date); // Adjust 'rad_available_date' to your actual date column name
                      $formattedDate = $dateObj->format('D') . ' <br> ' . $dateObj->format('M j'); // Format as "SUN <br> Jul 14"
                    @endphp
                    <div class="item">
                      <table class="w-100">
                        <tr>
                          <td>
                            <span>{!! $formattedDate !!}</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="ammo"><span>₹{{$date->rad_amount}}</span></p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    

    </div>
    <div class="row">
      <div class="col-md-12 mb-2 mt-2">
        <div class="border border-red p-3">
          <table class="w-100">
            <tr>
              <td><img src="{{URL::to('public/assets/web/images/lodging_priming.svg')}}" alt="" /></td>
              <td>
                <h5>Enjoy more peace of mind by adding stay protection at checkout.</h5>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="row">


      
      @foreach ($related_rooms as $room)
      <div class="col-md-4 mt-3 mb-3">
        <div class="listing-box border border-red">
          <div class="listing-box-slider">
            <div class="owl-product-list owl-carousel owl-theme">

              @foreach ($room->documents as $doc)
                  <div class="item"><img src="{{URL::to('public/upload/'.$doc->image_name)}}" alt="" /></div>
              @endforeach
              
            </div>
            {{-- <div class="listing-box-top p-0">
              <div class="popular-shay">Popular for short stays</div>
            </div> --}}
          </div>
          <div class=" pl-3">
            <h4>{{$room->name}}</h4>
            <p>{{$room->roomType->type}}</p>
            <div class="popular-amenities">
              <ul>
                @php echo GetroomAmenities($room->id); @endphp
               
              </ul>
            </div>
            <div class="see-all-r mb-2"><a href="#">Non-refundable <img src="{{URL::to('public/assets/web/images/info.svg')}}" alt="" /> </a></div>
            <div class="see-all mb-2"><a href="#">More details <i class="fa fa-angle-right"></i> </a></div>
          </div>
          <div class="border-1"></div>
          <div class=" pl-3">
            <p><b>Extas</b></p>
            <table class="w-100">
              <tr>
                <td>
                  <div class="form-check pl-0">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label pl-4" for="exampleRadios1">
                      No extras
                    </label>
                  </div>
                </td>
                <td>+ $0</td>
              </tr>
              {{-- <tr>
                <td>
                  <div class="form-check pl-0">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label pl-4" for="exampleRadios2">
                      Breakfast for 2
                    </label>
                  </div>
                </td>
                <td>+ $21</td>
              </tr> --}}
            </table>
            <h3 class="pri mt-4">₹{{$roomavailable->amount}} <br> <span>₹{{$roomavailable->amount}} total</span></h3>
            <p class="left-for">includes taxes & fees <span>We have 5 left</span></p>
            <div class="row">
              <div class=" col-6">
                <div class="see-all mb-2"><a href="#">Price details <i class="fa fa-angle-right"></i> </a></div>
              </div>
              <div class=" col-6 pr-4 mb-3">
                <button class="btn btn-info-custom pull-r-custom" data-toggle="modal" data-target=".bd-example-modal-lg">Reserve</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 pl-1">
                <div class="border-1 mb-2"></div>
                <div class="owl-product-date owl-carousel owl-theme">
                  @foreach ($room->availableDates as $date)
                    @php
                      $dateObj = new \DateTime($date->rad_available_date); // Adjust 'rad_available_date' to your actual date column name
                      $formattedDate = $dateObj->format('D') . ' <br> ' . $dateObj->format('M j'); // Format as "SUN <br> Jul 14"
                    @endphp
                    <div class="item">
                      <table class="w-100">
                        <tr>
                          <td>
                            <span>{!! $formattedDate !!}</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="ammo"><span>₹{{$date->rad_amount}}</span></p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
     
    </div>
    <div class="row">
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
    </div>
  </div>
</section>


<section id="">
  <div class="container">
    <div class="row">
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
</section>

<section id="Accessibility">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-3 mb-3">
        <div class="border-1  mb-3"></div>
        <h3>Similar properties we recommend</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="listing-box border border-red">
          <div class="listing-box-slider">
            <img src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" class="w-100" />

            <div class="listing-box-top p-0">
              <div class="popular-shay">Walk to Kuta Beach</div>
            </div>
          </div>
          <div class=" pl-3">
            <h4>Room, 1 King Bed, Balcony</h4>
            <p>Downtown Kuta</p>
            <div class="popular-amenities">
              <ul>
                <li><i class="fa fa-check"></i> Pool</li>
                <li><i class="fa fa-check"></i> Hot Tub</li>
                <li><i class="fa fa-check"></i> Spa</li>
                <li><i class="fa fa-check"></i> Kids pool</li>
              </ul>
            </div>

            <p><b>4.6/5</b> Wonderful (1007)</p>
            <div class="">
              <h3>$140</h3>
              <p>par night</p>
              <h6>$170 total</h6>
              <p>includes texes & fees</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="listing-box border border-red">
          <div class="listing-box-slider">
            <img src="{{URL::to('public/assets/web/images/img-4.jpg')}}" alt="" class="w-100" />

            <!--<div class="listing-box-top p-0">
                   <div class="popular-shay">Walk to Kuta Beach</div>
                </div>-->
          </div>
          <div class=" pl-3">
            <h4>Room, 1 King Bed, Balcony</h4>
            <p>Downtown Kuta</p>
            <div class="popular-amenities">
              <ul>
                <li><i class="fa fa-check"></i> Pool</li>
                <li><i class="fa fa-check"></i> Hot Tub</li>
                <li><i class="fa fa-check"></i> Spa</li>
                <li><i class="fa fa-check"></i> Kids pool</li>
              </ul>
            </div>

            <p><b>4.6/5</b> Wonderful (1007)</p>
            <div class="">
              <h3>$140</h3>
              <p>par night</p>
              <h6>$170 total</h6>
              <p>includes texes & fees</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="listing-box border border-red">
          <div class="listing-box-slider">
            <img src="{{URL::to('public/assets/web/images/img-3.jpg')}}" alt="" class="w-100" />

            <div class="listing-box-top p-0">
              <div class="popular-shay">Walk to Kuta Beach</div>
            </div>
          </div>
          <div class=" pl-3">
            <h4>Room, 1 King Bed, Balcony</h4>
            <p>Downtown Kuta</p>
            <div class="popular-amenities">
              <ul>
                <li><i class="fa fa-check"></i> Pool</li>
                <li><i class="fa fa-check"></i> Hot Tub</li>
                <li><i class="fa fa-check"></i> Spa</li>
                <li><i class="fa fa-check"></i> Kids pool</li>
              </ul>
            </div>

            <p><b>4.6/5</b> Wonderful (1007)</p>
            <div class="">
              <h3>$140</h3>
              <p>par night</p>
              <h6>$170 total</h6>
              <p>includes texes & fees</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
            <p>Check-in start time: {{$hotel->check_in_time}}</p>
            <p>Late check-in subject to availability</p>
          </div>
          <div class="col-md-6">
            <h5>Check-out</h5>
            <p>Check-out Time: {{$hotel->check_out_time}}</p>
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
</section>




<div class="modal fade bd-example-modal-xl pr-0" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="tab-box" style="justify-content: left;">
              <button class="tablink" onclick="openPage('TabA', this)" id="defaultOpen">Property</button>
              <button class="tablink" onclick="openPage('TabB', this,)">Family Room</button>
              <button class="tablink" onclick="openPage('TabC', this,)">Deluxe Room</button>
              <button class="tablink" onclick="openPage('TabD', this,)">6 Bed Mixed Dorm</button>
              <button class="tablink" onclick="openPage('TabE', this,)">Swiss Tents</button>
            </div>
            <div id="TabA" class="tabcontent-inner">
              <div class="row">
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-1.jpg')}}" data-lightbox="example-set1" data-title="Image-1"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-1.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-2.jpg')}}" data-lightbox="example-set1" data-title="Image-2"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-2.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class=" example-image-link" href="{{URL::to('public/assets/web/images/img-3.jpg')}}" data-lightbox="example-set1" data-title="Image-3"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-3.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-4.jpg')}}" data-lightbox="example-set1" data-title="Image-4"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-4.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-5.jpg')}}" data-lightbox="example-set1" data-title="Image-5"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" /></a>
                </div>
              </div>
            </div>

            <div id="TabB" class="tabcontent-inner" style="display:none">
              <div class="row">
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-3.jpg')}}" data-lightbox="example-set2" data-title="Image-1"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-3.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-2.jpg')}}" data-lightbox="example-set2" data-title="Image-2"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-2.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class=" example-image-link" href="{{URL::to('public/assets/web/images/img-1.jpg')}}" data-lightbox="example-set2" data-title="Image-3"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-1.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-4.jpg')}}" data-lightbox="example-set2" data-title="Image-4"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-4.jpg')}}" alt="" /></a>
                </div>
                <div class="col-md-3">
                  <a class="example-image-link" href="{{URL::to('public/assets/web/images/img-5.jpg')}}" data-lightbox="example-set2" data-title="Image-5"><img class="example-image w-100 mb-4 b-r-10p" src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection


@section('modal')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Your payment options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
           <p>Fully refundable before Fri, Sep 6</p>
          </div>
          <div class="col-md-6">
            <div class="text-box">
              <p><b>Pay when you stay</b></p>
              <div class="body-text-inn">
              <p>. You will not be charged until your stay</p>
              <p>. Pay the property directly in their preferred currency (INR)</p>
              </div>
              <h4 class="text-right">₹{{$totalAmount}}</h4>
              <p class="text-right">₹{{$totalAmount}} total<br>
              includes taxes & fees</p>
              <a href="payment.html"><button class="btn btn-info-custom pull-r-custom w-100">Pay at property</button></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="text-box">
              <p><b>Pay now</b></p>
              <div class="body-text-inn">
              <p>. We will process your payment in your local currency</p>
              <p>. More ways to pay: use Debit/Credit card</p>
              <p>. You can use a valid Travelocity coupon</p>
              </div>
              <h4 class="text-right">₹{{$totalAmount}}</h4>
              <p class="text-right">₹{{$totalAmount}} total<br>
              includes taxes & fees</p>
            
              <a href="{{URL::To('payment',['hotel_id'=>$roomavailable->hotel_id,'room_id'=>$roomavailable->room_id])}}"><button class="btn btn-info-custom pull-r-custom w-100">Pay Now</button></a>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection