@extends('web.layouts.main')
@section('content')
    <section class="">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col-md-12 mb-4">
                    <h2>Secure booking — only takes 2 minutes!</h2>
                </div>
                <div class="col-md-12">
                    <div class="refundable-text">
                        <table>
                            <tr>
                                <td><svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 46C36.1503 46 46 36.1503 46 24C46 11.8497 36.1503 2 24 2C11.8497 2 2 11.8497 2 24C2 36.1503 11.8497 46 24 46Z"
                                            fill="#F0F3F5" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M32 16V22.272C32 26.136 29.838 29.716 26.303 31.704L24 33L21.697 31.704C18.162 29.716 16 26.136 16 22.272V16H32ZM28.192 19L29.607 20.414L22.536 27.485L19 23.95L20.414 22.536L22.536 24.656L28.192 19Z"
                                            fill="#242C33" />
                                    </svg></td>
                                <td>
                                    <h4>Fully refundable before Fri, Sep 6, 2:00pm (property local time)</h4>
                                    <p>You can change or cancel this stay for a full refund if plans change. Because
                                        flexibility matters.</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section>
        <div class="container">
            <form action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="refundable-text">
                        {{-- <table>
                            <tr>
                                <td><i class="fa fa-lock mr-3" aria-hidden="true" style="font-size:25px;"></i></td>
                                <td>
                                    <h4>Sign in to book faster &nbsp; <i class="fa fa-angle-double-down"
                                            aria-hidden="true"></i></h4>
                                </td>
                            </tr>
                        </table> --}}
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <form class="payment-page">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control pl-2" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="@">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control pl-2" id="exampleInputPassword1"
                                            placeholder="*****">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                </form>
                            </div>
                            <div class="col-md-6" style="border-left:1px solid gray;">
                                <button type="btn" class="btn btn-light border w-100 mb-2"><i class="fa fa-apple"
                                        aria-hidden="true" style="font-size:25px;"></i> &nbsp; Sign in with Apple</button>
                                <button type="btn" class="btn btn-light border w-100 mb-2"><i
                                        class="fa fa-facebook-square" aria-hidden="true"
                                        style="font-size:25px; color:#2E96E1;"></i> &nbsp; Sign in with Facebook</button>
                            </div>
                        </div> --}}
                    </div>

                    <div class="refundable-text mt-4">
                        <h3>Who's checking in?</h3>
                        <p>{{$room->name}}</p>
                        <p style="color: #1a7e2b;"><i class="fa fa-check" aria-hidden="true"></i> Breakfast included &nbsp;
                            <i class="fa fa-check" aria-hidden="true"></i> Free parking &nbsp; <i class="fa fa-check"
                                aria-hidden="true"></i> Free WiFi</p>
                        <div class="info-text">
                            <table>
                                <tr>
                                    <td><i class="fa fa-info-circle mr-3" aria-hidden="true" style="font-size:20px;"></i>
                                    </td>
                                    <td>
                                        <p>We require traveler information to enable us to fulfill bookings if we cannot
                                            contact you directly. We will never use the information collected on this page
                                            to market to travelers.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name *</label>
                                    <input type="email" class="form-control pl-2" id="exampleInputFirstname"
                                        aria-describedby="emailHelp" placeholder="First name">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last name *</label>
                                    <input type="email" class="form-control pl-2" id="exampleInputLastname"
                                        aria-describedby="emailHelp" placeholder="Last name">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address *</label>
                                    <input type="email" class="form-control pl-2" id="exampleInputEmail2"
                                        aria-describedby="emailHelp" placeholder="@">
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
                                    <input type="email" class="form-control pl-2" id="exampleInputMobile"
                                        aria-describedby="emailHelp" placeholder="Phone number">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck1">Receive text alerts about this
                                        trip. Message and data rates may apply.</label>
                                </div>
                            </div>
                            <!--<button type="submit" class="btn btn-primary w-100">Sign in</button>-->
                        

                    </div>

                    <div class="refundable-text mt-4">
                        <p class="recommended-text mb-3">Recommended</p>
                        <h3 class="mb-4">Protect your stay</h3>
                        <p class="mb-4">Resident of New York or Washington?<br>
                            <a href="#">View</a> plan eligible for your state
                        </p>
                        <p class="mb-4">Help cover your stay against the unexpected. Get coverage for:</p>
                        <div class="popular-amenities">
                            <ul>
                                <li><img src="{{ URL::to('public/assets/web/images/i-1.png')}}" alt="" /> Cancellation protection up to 100% of stay
                                    cost</li>
                                <li><img src="{{ URL::to('public/assets/web/images/i-2.png')}}" alt="" /> Interruption protection up to 100% of stay
                                    cost</li>
                                <li><img src="{{ URL::to('public/assets/web/images/i-3.png')}}" alt="" /> Emergency evacuation up to $50,000</li>
                                <li><img src="{{ URL::to('public/assets/web/images/i-4.png')}}" alt="" /> Medical expenses up to $10,000 per person
                                </li>
                                <li><img src="{{ URL::to('public/assets/web/images/i-5.png')}}" alt="" /> Certain hotel or meal expenses due to trip
                                    delay up to $200 per person</li>
                            </ul>
                        </div>
                        <a href="#" style="color: #115daf; font-weight:600;">View benefit summaries</a><br>
                        <a href="#" style="color: #115daf; font-weight:600;">View insurance details and disclosures
                        </a>
                        <p class="mb-4 mt-4">Select Yes or No to continue booking *</p>
                        <div class="continue-booking">
                            <table class="w-100">
                                <tr>
                                    <td width="85%">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label ml-4" for="exampleRadios1">
                                                Yes, I want Hotel Booking Protection Plus for my trip.
                                            </label>
                                        </div>
                                    </td>
                                    <td width="15%">
                                        <h3>$8.00<br>
                                            <span>per person</span>
                                        </h3>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="continue-booking">
                            <table class="w-100">
                                <tr>
                                    <td width="100%">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios2" value="option1" checked>
                                            <label class="form-check-label ml-4" for="exampleRadios1">
                                                No, I'm willing to risk my $232.13 trip.
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <p>The cost of this plan includes travel insurance and assistance services.</p>
                        <p class="mt-3"><i class="fa fa-user" aria-hidden="true"></i>- Mr. Rodman<br>
                            “Things happened outside of my control which caused the trip to be canceled. The Travel
                            Protection was valuable in reducing the losses to me when we had to cancel the trip.”</p>
                    </div>

                    <div class="refundable-text mt-4">
                        <h3>Payment method</h3>
                        <p style="color: #1a7e2b;"><i class="fa fa-check" aria-hidden="true"></i> We use secure
                            transmission &nbsp; <i class="fa fa-check" aria-hidden="true"></i> We protect your personal
                            information</p>

                        <div class="tab-box mt-4" style="justify-content: left;">
                            <button class="tablink" onclick="openPage('TabA', this)" id="defaultOpen">Stays</button>
                            <button class="tablink" onclick="openPage('TabB', this,)">Flights</button>
                            <button class="tablink" onclick="openPage('TabC', this,)">Cars</button>
                            <button class="tablink" onclick="openPage('TabD', this,)">Packages</button>
                        </div>
                        <div id="TabA" class="tabcontent-inner">
                            <img src="{{ URL::to('public/assets/web/images/app-i.png')}}" alt="" />
                           
                                <div class="form-group">
                                    <label for="exampleInputCard">Name on Card*</label>
                                    <input type="email" class="form-control pl-2" id="exampleInputCard"
                                        aria-describedby="emailHelp" placeholder="0000000000">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDebit">Debit/Credit card number*</label>
                                    <input type="password" class="form-control pl-2" id="exampleInputDebit"
                                        placeholder="0000 0000 0000">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control pl-2" id="exampleFormControlSelect2"
                                                style="height: auto;">
                                                <option>Month</option>
                                                <option>01-Jun</option>
                                                <option>02-Jun</option>
                                                <option>03-Jun</option>
                                                <option>04-Jun</option>
                                                <option>05-Jun</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control pl-2" id="exampleFormControlSelect4"
                                                style="height: auto;">
                                                <option>Year</option>
                                                <option>2024</option>
                                                <option>2025</option>
                                                <option>2026</option>
                                                <option>2027</option>
                                                <option>2028</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputSecurity">Security code*</label>
                                            <input type="password" class="form-control pl-2" id="exampleInputSecurity"
                                                placeholder="0000">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputZIPcode">Billing ZIP code*</label>
                                            <input type="password" class="form-control pl-2" id="exampleInputZIPcode"
                                                placeholder="0000">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div id="TabB" class="tabcontent-inner">
                            <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
                        </div>
                        <div id="TabC" class="tabcontent-inner">
                            <h4>Book now, pay later with Affirm</h4>

                            <p>Starting at $21/mo with Affirm. Check your purchasing power</p>

                            <p>Affirm makes it easy to book your getaway today, then pay over time -
                                even past the dates you book. Find out if you're eligible by filling out a few
                                pieces of basic information. Your credit score won't be affected by checking.
                                Scroll down to continue to book with Affirm.</p>
                        </div>
                        <div id="TabD" class="tabcontent-inner">
                            <img src="{{ URL::to('public/assets/web/images/app-2.png')}}" alt="" />
                            <p class="mt-3">Click-to-Pay is a secure way to pay online, powered by the global payments
                                industry.</p>
                            <p>Add cards from participating networks to simply and securely use them wherever Click-to-Pay
                                is supported.</p>
                        </div>

                    </div>

                    <div class="refundable-text mt-4">
                        <h3>Cancellation policy</h3>
                        <p>. Fully refundable before Fri, Sep 6</p>
                        <p>. Cancellations or changes made after 2:00pm (property local time) on Sep 6, 2024 or no-shows are
                            subject to a property fee equal to the first nights rate plus taxes and fees</p>

                    </div>

                    <div class="refundable-text mt-4 mb-5">
                        <h3>Important information</h3>
                        <p>. Front desk staff will greet guests on arrival.</p>
                        <p>. To register at this property, guests who are Indian citizens must provide a valid photo
                            identity card issued by the Government of India; travelers who are not citizens of India must
                            present a valid passport and visa.</p>
                        <table class="check-in w-100">
                            <tr>
                                <td width="40%"><b>Check-in:</b><br>
                                    Sun, Sep 8, 3:00 PM</td>
                                <td width="40%"><b>Check-out:</b><br>
                                    Tue, Sep 10, noon (2-night stay)</td>
                            </tr>
                        </table>
                        <p>By clicking on the button below, I acknowledge that I have reviewed the Privacy Statement Opens
                            in a new window. and Government Travel Advice Opens in a new window. and have reviewed and
                            accept the Rules & Restrictions Opens in a new window. and Terms of Use Opens in a new window..
                        </p>
                        <p>We use secure transmission and encrypted storage to protect your personal information.</p>
                        <p>Payments are processed in the U.S. except where the travel provider (hotel / airline etc)
                            processes your payment outside the U.S., in which case your card issuer may charge a foreign
                            transaction fee.</p>
                    </div>

                </div>



                <div class="col-md-4">
                    <div class="refundable-text">
                        <div class="owl-product-list owl-carousel owl-theme">
                            @foreach ($room->documents as $doc)
                                <div class="item"><img src="{{ URL::to('public/upload/' . $doc->image_name) }}"
                                        alt="" /></div>
                            @endforeach


                        </div>
                        <h6>{{ $hotel->title }}</h6>
                        <div class="top-birder mt-3 pt-3"></div>
                        <div class="prop-detail-a">

                            <h4><span>8.8</span>Excellent</h4>
                            <p>(244 reviews)</p>
                            <p>{{$room->name}}</p>
                            <p>Check-in: Sun, Sep 8</p>
                            <p>Check-out: Tue, Sep 10</p>
                            <p>2-night stay</p>

                            <div class="top-birder mt-3 pt-3"></div>

                            <p>You have good taste! Book now before someone else grabs it!</p>

                        </div>
                    </div>

                    <div class="refundable-text mt-3">
                        <h5>Price details</h5>
                        <div class="top-birder mt-3 pt-3"></div>
                        <table class="w-100">
                            <tr>
                                <td width="80%">
                                    <p>1 room x 2 nights<br>
                                        $98.36 average per night</p>
                                </td>
                                <td width="20%">
                                    <p><b> $196.72</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="80%">
                                    <p>Taxes and fees</p>
                                </td>
                                <td width="20%">
                                    <p><b>$35.41</b></p>
                                </td>
                            </tr>
                        </table>

                        <div class="top-birder mt-3 pt-3"></div>

                        <table class="w-100">
                            <tr>
                                <td width="80%">
                                    <h5>Total</h5>
                                </td>
                                <td width="20%">
                                    <h5>$232.13</h5>
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
@endsection
