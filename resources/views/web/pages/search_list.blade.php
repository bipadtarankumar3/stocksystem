@extends('web.layouts.main')
@section('content')


<section class="search-list">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h5 class="mt-4 mb-4">{{count($search)}} places in {{$location_name}}</h5>
         </div>
      </div>

      <div class="row">

      @foreach($search as $t)

         <div class="col-md-4 mb-4">
            <div class="listing-box">
               <div class="listing-box-slider">
                  <div class="owl-product-list owl-carousel owl-theme">
                     @if($t->feature_image)
                     <div class="item"><img src="{{ URL::to('public/'.$t->feature_image) }}" alt="{{$t->title}}" /></div>
                     @else
                     <div class="item"><img src="{{ URL::to('public/images/no-image2.png') }}" alt="{{$t->title}}" /></div>
                     @endif
                     <!-- <div class="item"><img src="{{URL::to('public/assets/web/images/img-2.jpg')}}" alt="" /></div>
                     <div class="item"><img src="{{URL::to('public/assets/web/images/img-3.jpg')}}" alt="" /></div>
                     <div class="item"><img src="{{URL::to('public/assets/web/images/img-4.jpg')}}" alt="" /></div>
                     <div class="item"><img src="{{URL::to('public/assets/web/images/img-5.jpg')}}" alt="" /></div>
                  </div> -->
                  <div class="listing-box-top">
                     <div class=" pull-left"><button class="btn btn-custom">Guest favourite</button></div>
                     <div class=" pull-right">
                        <div class="rit-sid-i"><i class="fa fa-heart" aria-hidden="true"></i></div>
                     </div>
                  </div>
               </div>
               <h4>
                  <a href="{{URL::to('property_details/'.$t->rad_available_room_id.'')}}">
                     <a href="{{URL::to('property_details/'.$t->rad_available_room_id.'')}}">
                       {{$t->title}}
                     </a>
                  </a>

                  <span><i class="fa fa-star" aria-hidden="true"></i> 4.8 (101)</span>
               </h4>
               <p>{{$t->content}}</p>
               <p>{{$t->real_address}}</p>
               <h5> <span>₹{{$t->price}}</span> night <u>₹{{$t->price*$no_of_travelers}} total</u></h5>
            </div>
         </div>
         </div>

         @endforeach
        
      </div>

      

    
   </div>
</section>



@endsection