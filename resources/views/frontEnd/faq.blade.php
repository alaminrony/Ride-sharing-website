@extends('frontEnd.layouts.master')
@section('content')
<!-- Breadcrumb area -->
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_container">
                    <div class="breadcrumb_tablecell">
                        <h1>FAQ</h1>
                        <ul class="about_breadcrumb">
                            <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                            <li>FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Frequently area  -->
<section id="frequently-area" class="frequently-area">
    <div class="container">
        <div class="frequently-header text-center">
            <h3>Frequently asked questions</h3>
            <p>to all your important questions</p>
        </div>
        <div class="content-grid">
            <div class="left-content">
                <div class="d-flex content">
                    <div><img class="img-fluid ml-2 mr-3" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <div class="right-content-section">
                        <p class="font-weight-bold p-0">How to sign up a faretrim account? </p>
                        <div class="innter">
                            <p>Your first trip is a tap away with DiDi with the simple following steps:</p>
                            <div class="d-flex">
                                <p>1</p>
                                <p class="ml-3">Download the faretrim app in the App Store or Google Play.</p>
                            </div>
                            <div class="d-flex">
                                <p>2</p>
                                <p class="ml-3">Register your rider account with your mobile number, name and email address. You will receive a verification SMS during the sign up process.</p>
                            </div>
                            <div class="d-flex">
                                <p>3</p>
                                <p class="ml-3">Before you can request your first trip you will need to complete your payment details. Adding a credit or debit card to your account will allow your trip fares to be automatically charged after each ride.</p>
                            </div>
                            <div class="d-flex">
                                <p>4</p>
                                <p class="ml-3">After completing these steps above, you are all set and ready to go!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex content-footer">
                    <div><img class="img-fluid ml-2 mr-2" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <p class="font-weight-bold p-0">How to sign up a faretrim account? </p>
                </div>
            </div>
            <div class="right-content">
                <div class="d-flex content">
                    <div><img class="img-fluid ml-2 mr-3" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <div class="right-content-section">
                        <p class="font-weight-bold p-0">How much time does it take to complete the registration 
                            process? </p>
                        <div class="innter">
                            <p>Typically, it should take close to 2 hours for you to be ready to take your first booking.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex content">
                    <div><img class="img-fluid ml-2 mr-3" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <div class="right-content-section">
                        <p class="font-weight-bold p-0">How much will I be charged for registration?</p>
                        <div class="innter">
                            <p>Registration is free. You should have an Android smartphone with active data connection on your SIM.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex content">
                    <div><img class="img-fluid ml-2 mr-3" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <div class="right-content-section">
                        <p class="font-weight-bold p-0">How can I view my earnings?</p>
                        <div class="innter">
                            <p>Registration is free. You should have an Android smartphone with active data connection on your SIM.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex content-footer">
                    <div><img class="img-fluid ml-2 mr-2" src="{{asset('frontEnd/assets/img/rider-page/line-shape.png')}}" alt=""></div>
                    <p class="font-weight-bold p-0">How to sign up a faretrim account? </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection