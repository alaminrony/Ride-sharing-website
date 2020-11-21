@extends('frontEnd.layouts.master')
        <!-- slider area -->
        @section('content')
        <!-- Driver Signup area -->
        <section class="driver_signup_area fix">
            <div class="container">
                <div class="driverGrid">
                    <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                        <div class="driver_header d-flex justify-content-between">
                            <p class="borderLeft">Driver Sign Up</p>
                            <p class="step">Step <span class="circle-bg">4</span></p>
                        </div>
                        <div class="driver-signup-btn">
                            <p class="text-capitalize margin-none text-center mb-2">Enter your legal information</p>
                            <form action="">
                                <div class="all-input">
                                    <input class="form-control" type="text" placeholder="Driving licence" required>
                                    <input class="form-control" type="text" placeholder="Australian taxi license" required>
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date" placeholder="Driving Licence Expiry">
                                        </div>
                                        <div class="">
                                            <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date" placeholder="Australian Taxi  Licence Expiry">
                                        </div>
                                        <div class="">
                                            <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check checkBox mb-1 mt-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="#">terms and conditions.</a></span></label>
                                </div>
                                <a href="{{url('driver-profile')}}">
                                    <button class="driver-sign-up-btn">Become a driver</button>
                                </a> 
                            </form>
                            <div class="have-account">
                                <p class="font-weight-normal">Have an account? <span><a href="{{url('front-login')}}">Log In</a></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="driver-right-section animate__animated animate__fadeInRight animate__delay-1s overflow-hidden">
                        <div class="driver_header">
                            <p class="borderLeft">Drive when you want</p>
                        </div>
                        <div class="text-center driver-signup-img">
                            <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/car.png')}}" alt="car">
                        </div>
                        <div class="driver-content">
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Offer a rideshare for your local commute or long distance trips</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Fill your empty seats with passengers to share a ride.</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Save hundreds of dollars per month and have fun riding with new friends.</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Earn anytime, anywhere</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Set your own schedule</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Signing up is easy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       @endsection