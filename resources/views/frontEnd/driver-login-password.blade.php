@extends('frontEnd.layouts.master')
        <!-- slider area -->
        @section('content')
        
        <!-- Driver Signup area -->
        <section class="driver_signup_area fix">
            <div class="container">
                <div class="driverGrid">
                    <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                        <div class="driver_header">
                            <p class="borderLeft">Driver Login</p>
                        </div>
                        <div class="driver-signup-img">
                            <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                        </div>
                        <div class="driver-signup-btn signUpbtnMove">
                            <div class="d-flex driver-mobile-input-field">
                                <div class="driver-input-field">
                                    <input class="border-0" type="text" placeholder="Password">
                                </div>
                            </div>
                            <a href="{{url('driver-login-with-mail')}}"><button class="driver-sign-up-btn">Login as Driver</button></a>
                            <p><a class="text-dark" href="#">Forgot your password or user name?</a></p>
                        </div>
                        <hr />
                        <div class="Position-Middle">OR</div>
                        <div class="driver-sign-up-2btn">
                            <button class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button> <br>
                            <button class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                            <div class="form-check checkBox mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="#">terms and conditions.</a></span></label>
                            </div>
                            <p>Have an account? <span><a href="#">Sign Up?</a></span></p>
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
                            <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick">Offer a rideshare for your local commute or long distance trips</p>
                            <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick">Fill your empty seats with passengers to share a ride.</p>
                            <div class="d-flex">
                                <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                                <p>Save hundreds of dollars per month and have fun riding with new friends.</p>
                            </div>
                            <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick">Earn anytime, anywhere</p>
                            <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick">Set your own schedule</p>
                            <p><img class="mr-3" src="{{asset('frontEnd/assets/img/driver-sign-up/tick.png')}}" alt="Tick">Signing up is easy</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       @endsection