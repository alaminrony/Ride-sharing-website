@extends('frontEnd.layouts.master')
@section('content')
<!-- Breadcrumb area -->
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_container">
                    <div class="breadcrumb_tablecell">
                        <h1>Safety</h1>
                        <ul class="about_breadcrumb">
                            <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                            <li>Safety</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Safety Content area -->
<section class="safety-area">
    <div class="container">
        <div class="safety-content">
            <h6>Our comitment to safety</h6>
            <div class="content-para">
                <p>We want you to move freely, make the most of your time, and be connected to the people and places that matter most to you. That’s why we are committed to safety, from the creation of new standards to the development of technology with the aim of reducing incidents.</p>
            </div>
            <div>
                <img src="{{asset('frontEnd/assets/img/safety/safety.png')}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="covid-content">
            <h6>Helping to keep safe during COVID-19</h6>
            <p>We’re actively monitoring the coronavirus (COVID-19) situation and are continually working to help keep those who rely on our platform healthy and safe.</p>
            <button>Learn More</button>
        </div>
        <div class="experience-content">
            <h6>How safety is built into your experience</h6>
            <div class="experience-grid">
                <div>
                    <img src="{{asset('frontEnd/assets/img/safety/safety-features.png')}}" class="img-fluid" alt="features">
                    <p class="fontBold">Safety features in the app</p>
                    <p>Share your trip details with loved ones. Track your trip during your ride. Our technology helps put peace of mind at your fingertips.</p>
                </div>
                <div>
                    <img src="{{asset('frontEnd/assets/img/safety/inclusive.png')}}" class="img-fluid" alt="features">
                    <p class="fontBold">An inclusive community</p>
                    <p>Millions of riders and drivers share a set of Community Guidelines, holding each other accountable to do the right thing.</p>
                </div>
                <div>
                    <img src="{{asset('frontEnd/assets/img/safety/24.png')}}" class="img-fluid" alt="features">
                    <p class="fontBold">Support at every turn</p>
                    <p>A specially trained team is available 24/7. Reach them in the app, day or night, with any questions or safety concerns.</p>
                </div>
            </div>
        </div>
        <div class="driver-safety">
            <h6>Driver safety</h6>
            <p>Safety is designed into the experience. So you feel comfortable driving at night. So you can tell loved ones where you’re going. And so you know you have someone to turn to if anything happens.</p>
            <img src="{{asset('frontEnd/assets/img/safety/home-placeholder.png')}}" class="img-fluid" alt="">
            <div class="safety-feature">
                <div class="safety-feature-grid">
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/24-2.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">24/7 incident support</p>
                        <p>FareTrim customer associates trained in incident response are available around the clock.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/follow.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">Follow My Ride</p>
                        <p>Friends and family can follow your route and will know as soon as you arrive.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/2-way.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">2-way ratings</p>
                        <p>Your feedback matters. Low-rated trips are logged, and users may be removed to protect the Uber community.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/gps.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">GPS tracking</p>
                        <p>All FareTrim rides are tracked from start to finish, so there’s a record of your trip if something happens.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rider-safety">
            <h6>Rider safety</h6>
            <p>Safety is designed into the experience. So you feel comfortable driving at night. So you can tell loved ones where you’re going. And so you know you have someone to turn to if anything happens.</p>
            <img src="{{asset('frontEnd/assets/img/safety/rider-safety.png')}}" class="img-fluid" alt="">
            <div class="rider-feature">
                <div class="rider-feature-grid">
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/rider-safety.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">Emergency assistance button</p>
                        <p>You can use the in-app emergency button to call and get help if you need it. The app displays your location and trip details, so you can quickly share them with authorities.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/24-2.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">24/7 incident support</p>
                        <p>Our customer support team is specially trained to respond to urgent safety issues.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/share-my.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">Share My Trip</p>
                        <p>Set up your Trusted Contacts and create reminders to share your trip status with friends and family in real time.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/safety-center.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">Safety Center</p>
                        <p>Access FareTrim’s safety features all in one place in the app whenever you’re riding with us.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/2-way.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">2-way ratings</p>
                        <p>Your feedback matters. Low-rated trips are logged, and users may be removed.</p>
                    </div>
                    <div>
                        <img src="{{asset('frontEnd/assets/img/safety/gps.png')}}" class="img-fluid" alt="features">
                        <p class="fontBold">GPS tracking</p>
                        <p>All FareTrim rides are tracked by GPS from start to finish so there’s a record of your trip if something happens.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontEnd.layouts.download-app')
@endsection