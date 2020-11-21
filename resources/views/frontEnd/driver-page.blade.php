@extends('frontEnd.layouts.master')
@section('content')

<!-- Driver area -->
<section class="driver-hero">
    <div class="container">
        <div class="driver-page-parent-content">
            <div class="driver-page-content">
                <h5>Become a faretrim <br />
                    driver today</h5>
                <p>Signup as a faretrim Driver and earn on your schedule. 
                    You determine the hours, and you’re in control. 
                    Driving for faretrim is fun and rewarding, 
                    helping drivers meet their goals.
                </p>
                <p class="download">Download the App. Receive driving jobs</p>
                <div class="driver-page-img">
                    <p><a href="/" target="_blank"><img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/applePlay.png')}}" alt="applePlay"></a></p>
                    <p><a href="/" target="_blank"><img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/googleplay.png')}}" alt="googleplay"></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Become a Driver area -->
<section class="become-driver-area">
    <div class="container">
        <div class="header-become-driver">
            <h5>Why become a FareTrim Driver?</h5>
        </div>
        <div class="parent-grid-for-become-a-driver">
            <div class="text-center">
                <img src="{{asset('frontEnd/assets/img/driver-page/fareTrimEarn.png')}}" alt="fareTrimEarn">
                <div class="become-a-driver-content text-center">
                    <h6>Earn more with FareTrim</h6>
                    <p>Our Economy metered fares are over 10% cheaper than standard rank-and-hail Taxi metered fares.</p>
                </div>
            </div>
            <div class="text-center">
                <img src="{{asset('frontEnd/assets/img/driver-page/commission.png')}}" alt="commission">
                <div class="become-a-driver-content text-center">
                    <h6>Low Commission</h6>
                    <p>An easy to use interface, with built-in navigation and the ability to conveniently contact your passenger. View your past trips, account balance.</p>
                </div>
            </div>
            <div class="text-center">
                <img src="{{asset('frontEnd/assets/img/driver-page/support.png')}}" alt="support">
                <div class="become-a-driver-content text-center">
                    <h6>24/7 Support</h6>
                    <p>Our switched on Support Team is always here to help. Day or night, get in touch with us directly in the app – we're just one tap away.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Driver works area -->
<section class="driver-app-work-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section_title animate__animated animate__fadeInUp animate__delay-2s">
                    How FareTrim Driver App works
                </h1>
            </div>
        </div>
        <div class="driver-work-grid">
            <div class="rightImg">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/mobile.png')}}" alt="mobile">
            </div>                       
            <div class="leftImg">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/driver-works-logo.png')}}" alt="driver">
            </div>
        </div>
    </div>
</section>
<!-- Join Us Area-->
<section class="driver-join-us">
    <div class="container">
        <div class="join-us-grid">
            <div class="join-us-content-black">
                <div class="text-center text-white join-us-text-width">
                    <p>“As a driver, FareTrim is flawless. The driver support team are well trained. Have excellent manners and are always helpful.”</p>
                    <p>John Smith, FareTrim driver.</p>
                </div>
            </div>
            <div class="join-us-content-red">
                <div class="join text-center text-white">
                    <h6>Join Us!</h6>
                    <a href="{{url('driver-signup')}}">
                        <button class="text-white">Sign Up</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Easy To Join -->
<section class="">
    <div class="container">
        <div class="header-become-driver">
            <h5>Easy to join FareTrim</h5>
        </div>
        <div class="parent-grid-for-become-a-driver">
            <div class="text-center">
                <a class="text-dark" href="{{url('driver-signup')}}"><img src="{{asset('frontEnd/assets/img/driver-page/signUp.png')}}" alt="fareTrimEarn"></a>
                <a class="text-dark" href="{{url('driver-signup')}}">
                    <div class="become-a-driver-content text-center">
                        <h6>Sign Up</h6>
                    </div>
                </a>
            </div>
            <div class="text-center">
                <a class="text-dark" href="#downloadApp"><img src="{{asset('frontEnd/assets/img/driver-page/download.png')}}" alt="commission"></a>
                <a class="text-dark" href="#downloadApp">
                    <div class="become-a-driver-content text-center">
                        <h6>Download the App</h6>
                    </div>
                </a>
            </div>
            <div class="text-center">
                <a class="text-dark" href="#"><img src="{{asset('frontEnd/assets/img/driver-page/job.png')}}" alt="support"></a>
                <a class="text-dark" href="#">
                    <div class="become-a-driver-content text-center">
                        <h6>Receeive Driving jobs</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Requirements area  -->
<section class="requirements-area">
    <div class="container">
        <div class="requirement-header">
            <h6>Requirements to drive for FareTrim</h6>
        </div>
        <div class="requirement-grid">
            <div class="text-center text-white requirement-img">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/older.png')}}" alt="">
                <p>21 years or older</p>
            </div>
            <div class="text-center text-white requirement-img">
                <img class="img-fluid imgMove" src="{{asset('frontEnd/assets/img/driver-page/personal.png')}}" alt="">
                <p>Personal/commercial driver license and auto insurance</p>
            </div>
            <div class="text-center text-white requirement-img">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/door.png')}}" alt="">
                <p>4-door vehicle
                    5 years or more recent
                    in excellent condition
                </p>
            </div>
            <div class="text-center text-white requirement-img">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/android.png')}}" alt="">
                <p>iPhone or Android phone to use the 
                    FareTrim driver app
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Driver GuideLine Area -->
<section class="driver-guideline">
    <div class="container">
        <div class="text-center driver-guideline-content">
            <h6>Driver Guidelines</h6>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's 
                standard dummy text ever since the 1500s, when an unknown printe
            </p>
            <a href="{{url('driver-guideline')}}">
                <button>Learn More</button>
            </a>
        </div>
    </div>
</section>
@include('frontEnd.layouts.download-app')
@endsection