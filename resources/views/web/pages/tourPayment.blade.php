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
              <img src="{{ URL::to('public/upload/' . $tour->documents->first()->image_name) }}" alt=""  style="height: 100%;"  class="w-100" />
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
  
  


    <section>
        <div class="container">
            <form class="payment-page" action="{{ URL::To('tour-book-now') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">


                        <div class="refundable-text ">
                            <h3>Who's checking in?</h3>
                            <p>{{ $tour->name }}</p>
                            <p style="color: #1a7e2b;"><i class="fa fa-check" aria-hidden="true"></i> Breakfast included
                                &nbsp;
                                <i class="fa fa-check" aria-hidden="true"></i> Free parking &nbsp; <i class="fa fa-check"
                                    aria-hidden="true"></i> Free WiFi
                            </p>
                            <div class="info-text">
                                <table>
                                    <tr>
                                        <td><i class="fa fa-info-circle mr-3" aria-hidden="true"
                                                style="font-size:20px;"></i>
                                        </td>
                                        <td>
                                            <p>We require traveler information to enable us to fulfill bookings if we cannot
                                                contact you directly. We will never use the information collected on this
                                                page
                                                to market to travelers.</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First name *</label>
                                        <input type="text" class="form-control pl-2" id="exampleInputFirstname"
                                            aria-describedby="emailHelp" name="first_name" placeholder="First name">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last name *</label>
                                        <input type="text" class="form-control pl-2" id="exampleInputLastname"
                                            aria-describedby="emailHelp" name="last_name" placeholder="Last name">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address *</label>
                                        <input type="email" name="email" class="form-control pl-2"
                                            id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="@">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Mobile phone number *</label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control pl-2" id="exampleFormControlSelect1"
                                            style="height: auto;">
                                            <option>IND +91</option>
                                            <option>AFG +93</option>
                                            <option>ALB +355</option>
                                            <option>DZA +213</option>
                                            <option>ASM +1</option>
                                            <option>AND +376</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control pl-2"
                                            id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Phone number">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="alert" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck1">Receive text alerts about this
                                            trip. Message and data rates may apply.</label>
                                    </div>
                                </div>
                            </div>


                            <!--<button type="submit" class="btn btn-primary w-100">Sign in</button>-->


                        </div>

                        <div class="refundable-text mt-4 mb-5">
                            <h3>Important information</h3>
                           
                            <p>{!!$tour->description!!}</p>
                           
                                processes your payment outside the U.S., in which case your card issuer may charge a foreign
                                transaction fee.</p>
                        </div>
                        
                     

             


                     

                       
                        <div class="refundable-text mt-4">
                            <h3>Cancellation policy</h3>
                            <p>. Fully refundable before Fri, Sep 6</p>
                            <p>. Cancellations or changes made after 2:00pm (property local time) on Sep 6, 2024 or no-shows
                                are
                                subject to a property fee equal to the first nights rate plus taxes and fees</p>

                        </div>

                    </div>



                    <div class="col-md-4">
                        <div class="refundable-text">
                            <div class="owl-product-list owl-carousel owl-theme">

                             
                                <input type="hidden" name="tour_exp_id" value="{{ $tour->id }}">

                            </div>
                            <h6>{{ $tour->title }}</h6>
                            <div class="top-birder mt-3 pt-3"></div>
                            <div class="prop-detail-a">

                                <p>{{ $tour->name }}</p>
                            

                                <p>You have good taste! Book now before someone else grabs it!</p>

                            </div>
                        </div>

                        <div class="refundable-text mt-3">
                            <h5>Price details</h5>
                            <div class="top-birder mt-3 pt-3"></div>
                            <table class="w-100">
                                <tr>
                                    <td width="80%">
                                        <p>1 exprience 
                                          
                                    </td>
                                    <td width="20%">
                                        <p><b>₹{{ $tour->amount }}</b></p>
                                        <input type="hidden" value="{{ $tour->amount }}" name="amount">
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                            </table>

                            <div class="top-birder mt-3 pt-3"></div>

                            <table class="w-100">
                                <tr>
                                    <td width="80%">
                                        <h5>Total</h5>
                                    </td>
                                    <td width="20%">
                                        <h5>₹{{ $tour->amount }}</h5>
                                    </td>
                                </tr>
                            </table>
                            <p><a href="#">Use a coupon</a>, <a href="#">credit</a>, or <a
                                    href="#">promotion code</a></p>
                        </div>
                        <div><button type="submit" class="btn btn-primary">Book Now</button></div>
                    </div>


                </div>
            </form>
        </div>
    </section>

{{-- 
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
                            <img src="{{ URL::to('public/assets/web/images/img-5.jpg') }}" alt=""
                                class="w-100" />

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
                            <img src="{{ URL::to('public/assets/web/images/img-4.jpg') }}" alt=""
                                class="w-100" />

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
                            <img src="{{ URL::to('public/assets/web/images/img-3.jpg') }}" alt=""
                                class="w-100" />

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
    </section> --}}
@endsection
