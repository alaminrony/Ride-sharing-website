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
                            <p class="step">Step <span class="circle-bg">3</span></p>
                        </div>
                        <div class="driver-signup-img">
                            <img class="img-fluid" src="{{asset('frontEnd/assets/img/login/profile image.png')}}" alt="key">
                        </div>
                        <div class="driver-signup-btn">
                            <p class="text-capitalize margin-none mb-2">Enter your personal information</p>
                            <form action="">
                                <div class="all-input">
                                    <input class="form-control" type="text" placeholder="First Name*" required>
                                    <input class="form-control" type="text" placeholder="Last Name*" required>
                                    <select class="form-control w-100" id="exampleFormControlSelect1">
                                        <option>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <div class="form-group">
                                        <div class="input-group" id="show_hide_password">
                                            <input class="form-control" type="password" placeholder="Set a Password*">
                                            <div class="input-group-addon eyeIcon ml-2 mt-2 pt-1">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input class="form-control" type="password" placeholder="Set a Password*" required> -->
                                    <input class="form-control" type="text" placeholder="State*" required>
                                    <input class="form-control" type="text" placeholder="City*" required>
                                    <input class="form-control" type="number" placeholder="Post Code*" required>
                                    <input class="form-control" type="text" placeholder="Address*" required>
                                </div>
                            </form>
                            <a href="{{url('driver-signup-step-four')}}">
                                <button class="driver-sign-up-btn">Next</button>
                            </a> <br>
                            <a href="{{url('driver-signup-step-two')}}">
                                <button class="driver-sign-up-btn-black black-btn">Back</button>
                            </a>
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
                                <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
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
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
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