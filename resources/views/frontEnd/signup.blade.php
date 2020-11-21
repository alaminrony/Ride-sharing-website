@extends('frontEnd.layouts.master')
@section('content')
        <!-- Driver Signup area -->
        <section class="login_area fix">
            <div class="container">
                <div class="driverGrid">
                    <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                        <div class="driver_header">
                            <p class="borderLeft">Driver SignUp</p>
                        </div>
                        <div class="driver-signup-img">
                            <img class="img-fluid" src="{{asset('frontEnd/assets/img/login/car-u.png')}}" alt="key">
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
                                <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Save hundreds of dollars per month and have fun riding with new friends. </p>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="{{url('driver-signup')}}">
                                <button>SignUp as Driver</button>
                            </a>
                        </div>
                    </div>
                    <div class="driver-right-section animate__animated animate__fadeInRight animate__delay-1s overflow-hidden">
                        <div class="driver_header">
                            <p class="borderLeft">Rider SignUp</p>
                        </div>
                        <div class="text-center driver-signup-img">
                            <img class="img-fluid" src="{{asset('frontEnd/assets/img/login/phone.png')}}" alt="car">
                        </div>
                        <div class="driver-content">
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Search among local or long distance ride offers</p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p><p>Book and pay online or request a ride to a driver</p></p>
                            </div>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Let yourself be driven, save money and enjoy sharing a ride</p>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="{{url('passenger-signup')}}"><button class="rider">SignUp as Rider</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       @endsection