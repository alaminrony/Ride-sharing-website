@extends('frontEnd.layouts.master')
@section('content')
<!-- Rider you want area -->
<section class="rider-hero">
    <div class="container">
        <div class="driver-page-parent-content">
            <div class="driver-page-content">
                <h5>Always the ride you want</h5>
                <p>
                    Sample rider prices are estimates only and do not reflect variations due to 
                    discounts, geography, traffic delays, or other factors. Flat rates and minimum 
                    fees may apply. Actual prices for rides and scheduled rides may vary.
                </p>
                <p class="download">Download the App. Book a ride today</p>
                <div class="driver-page-img">
                    <p><a href="/" target="_blank"><img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/applePlay.png')}}" alt="applePlay"></a></p>
                    <p><a href="/" target="_blank"><img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-page/googleplay.png')}}" alt="googleplay"></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Why Rider area -->
<section class="become-driver-area">
    <div class="container">
        <div class="header-become-driver">
            <h5>Why ride with <span><img class="img-fluid" src="{{asset('frontEnd/assets/img/rider-page/logo.png')}}" alt="logo"></span></h5>
        </div>
        <div class="parent-grid-for-become-a-driver">
            <div class="text-center">
                <img src="{{asset('frontEnd/assets/img/rider-page/competitive.png')}}" alt="fareTrimEarn">
                <div class="become-a-driver-content text-center">
                    <h6>Save with competitive fares</h6>
                    <p>Our Economy metered fares are over 10% cheaper than standard rank-and-hail Taxi metered fares.</p>
                </div>
            </div>
            <div class="text-center riderImg">
                <img class="marginTop" src="{{asset('frontEnd/assets/img/rider-page/bid.png')}}" alt="commission">
                <div class="become-a-driver-content text-center">
                    <h6>Low fare bid options</h6>
                    <p>An easy to use interface, with built-in navigation and the ability to conveniently contact your passenger. View your past trips, account balance, and read about great hotspots to drive around every weekend.</p>
                </div>
            </div>
            <div class="text-center">
                <img src="{{asset('frontEnd/assets/img/rider-page/easy-way.png')}}" alt="support">
                <div class="become-a-driver-content text-center">
                    <h6>An easy way to get around</h6>
                    <p>Our switched on Support Team is always here to help. Day or night, get in touch with us directly in the app – we're just one tap away.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Rider Book area -->
<section class="rider-book">
    <div class="container">
        <div class="rider-book-bg">
            <div class="rider-page-grid">
                <div class="pt-1">
                    <div class="rider-header">
                        <h1 class="rider-book-header section_title">
                            How to Book a <span><img class="img-fluid" src="{{asset('frontEnd/assets/img/rider-page/logo.png')}}" alt=""></span> ride
                        </h1>
                    </div>
                    <!-- Swiper -->
                    <div class="swiper-container s2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="rider-book-img">
                                    <img class="img-fluid" src="{{asset('frontEnd/assets/img/rider-page/mobile.png')}}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rider-book-img">
                                    <img class="img-fluid" src="{{asset('frontEnd/assets/img/rider-page/mobile.png')}}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rider-book-img">
                                    <img class="img-fluid" src="{{asset('frontEnd/assets/img/rider-page/mobile.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="rider-booking-content text-center">
                        <span>3</span>
                        <p>Your request will reach
                            1000s of driver around you
                            and you will get a Booking
                            accepted notification sooner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing estimator  -->
<section class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate__animated animate__fadeInUp animate__delay-2s">
                <h1 class="section_title">FareTrim Pricing Estimator</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 animate__animated animate__fadeInLeft animate__delay-2s ">
                <div class="price_estimator_form">
                    <form id="estimateFare">
                        <input  type="text" name="pickup_address" class="start_location" placeholder="Enter Pickup location" id="startLocation" value="" required>
                        <span class="text-danger" id="pickup_address_error"></span>
                        <input type="hidden" name="pickup_latitude" id="pickup_latitude">
                        <input type="hidden" name="pickup_longitude" id="pickup_longitude">
                        <img src="{{asset('frontEnd/assets/img/input-icon1.png')}}" alt="" class="start_location_icon" >
                        <input  type="text" name="drop_address" class="end_location" placeholder="Enter Drop location" id="endLocation" value="" required>
                        <span class="text-danger" id="drop_address_error"></span>
                        <input type="hidden" name="drop_latitude" id="drop_latitude">
                        <input type="hidden" name="drop_longitude" id="drop_longitude">
                        <img src="{{asset('frontEnd/assets/img/input-icon2.png')}}" alt="" class="end_location_icon">
                        <div class="price_text d-none" id="priceSection">
                            <div class="row">
                                <div class="col-xs-6">
                                    <p class="fare_data_left mr-1">Duration:</p>
                                </div>
                                <div class="col-xs-6">
                                    <p class="fare_data_right" id="duration"></p>                               
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <p class="fare_data_left mr-1">Minimum Fare:</p>
                                </div>
                                <div class="col-xs-6">
                                    <p class="fare_data_right" id="minFare"></p>                               
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-xs-6">
                                    <p class="fare_data_left mr-1">FareTrime Bit Starts:</p>
                                </div>
                                <div class="col-xs-6">
                                    <p class="fare_data_right" id="bidStart"></p>                               
                                </div>
                            </div>
                        </div>
                        <button type="button" class="get_estimate_btn" id="estimateFareBtn">Get Estimates</button>
                        @if(Auth::guard('passenger')->check())
                        <a href="{{url('passenger-profile?passengerId='.Auth::guard('passenger')->id())}}" class="btn btn-defalt btn-lg sign_up_btn">Go to Dashboard</a>
                        @else
                        <a href="{{url('passenger-signup')}}" class="btn btn-defalt btn-lg sign_up_btn">Sign Up to ride</a>
                        @endif
                        
                    </form>
                    <p class="fare_discrimination">Sample ride prices are estimates only and do not reflect variations due to discounts,
                        geography, traffect delayeys, or other factors.
                        Flat rates and minimum fees may apply.
                        Actural prices for rides and scheduled ride may vary.</p>
                </div>
            </div>

            <div class="col-md-8 animate__animated animate__fadeInRight animate__delay-2s" id="mapImage">
                <div class="map">
<!--                    <img src="{{asset('frontEnd/assets/img/map_bg.jpg')}}" alt="" id="defaultMap">-->
                    <div class="img-map" id="current_location_map" style="width:100%;height:100%;"></div>
                </div>
            </div>
            <div class="col-md-8 animate__animated animate__fadeInRight animate__delay-2s" id="mapShow">

            </div>
        </div>
</section>
<!-- Make Money -->
<section class="make_money money-bg">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-offset-1 col-md-2 col-sm-2 col-xs-12 animate__animated animate__fadeInLeft animate__delay-2s">
                <div class="money_icon">
                    <img src="{{asset('frontEnd/assets/img/rider-page/white-shape.png')}}" alt="">
                </div>
            </div>
            <div class=" col-md-6 col-sm-6 col-xs-12 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="money_text">
                    <h1 class="money_title text-white">Low fare bid options?</h1>
                    <p class="text-white">The first step is to signup</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 animate__animated animate__fadeInRight animate__delay-4s">
                <div class="money_btn">
                    <a href="{{url('passenger-signup')}}">
                        <button>Sign Up to rider</button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Frequently area  -->
<section class="frequently-area">
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
                    <div><img class="img-fluid ml-2 mr-2" src="{{asset('frontEnd/assets/img/rider-page/plus.png')}}" alt=""></div>
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
                    <div><img class="img-fluid ml-2 mr-2" src="{{asset('frontEnd/assets/img/rider-page/plus.png')}}" alt=""></div>
                    <p class="font-weight-bold p-0">How to sign up a faretrim account? </p>
                </div>
            </div>
        </div>
        <div class="frequent-btn text-center">
            <a href="{{url('faq-page')}}">
                <button>See More</button>
            </a>

        </div>
    </div>
</section>
@include('frontEnd.layouts.download-app')
@endsection
@push('script')
<script src="https://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>
<script type="text/javascript">
function initialize() {
    var input = document.getElementById('startLocation');
    var input2 = document.getElementById('endLocation');
    var autocomplete = new google.maps.places.Autocomplete(input);
    var autocomplete2 = new google.maps.places.Autocomplete(input2);

    //pickuplocation
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        console.log(place);

        //document.getElementById('street').value = place.name;
        document.getElementById('pickup_latitude').value = place.geometry.location.lat();
        document.getElementById('pickup_longitude').value = place.geometry.location.lng();
    });
    //dropup location
    google.maps.event.addListener(autocomplete2, 'place_changed', function () {
        var place2 = autocomplete2.getPlace();
        console.log(place2);

        //document.getElementById('street').value = place2.name;
        document.getElementById('drop_latitude').value = place2.geometry.location.lat();
        document.getElementById('drop_longitude').value = place2.geometry.location.lng();
        if (place2.address_components[1]) {
            city = place2.address_components[1].long_name;
        }
        document.getElementById('city').value = city;
        if (place2.address_components[5]) {
            post_code = place2.address_components[5].long_name;
        }

    });
}
google.maps.event.addDomListener(window, 'load', initialize);

$(document).on('click', '#estimateFareBtn', function (event) {
    event.preventDefault();
    var data = new FormData($('#estimateFare')[0]);
    $.ajax({
        url: "{{route('front.distanceAndDuration')}}",
        type: 'POST',
        data: data,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $('#ajaxLoader').show();
        },
        success: function (data) {
            $('#pickup_address_error').text('');
            $('#drop_address_error').text('');
            if (data.errors) {
                $('#pickup_address_error').text(data.errors.pickup_address);
                $('#drop_address_error').text(data.errors.drop_address);
            }
            if (data.response == 'success') {
                $('#priceSection').removeClass('d-none');
                $('#duration').text(data.response_data.duration);
                $('#minFare').text('$' + data.response_data.minFare);
                $('#bidStart').text('$' + data.response_data.ourOfferingFare);
                $('#mapImage').hide();
                $('#mapShow').html(data.response_data.map);
            }
        },
        complete: function () {
            $('#ajaxLoader').hide();
        },
    });
});

//function getLocation() {
//    if (navigator.geolocation) {
//        navigator.geolocation.getCurrentPosition(showPosition);
//    } else {
//        alert("Geolocation is not supported by this browser.");
//        return false;
//    }
//}
//
//function showPosition(position) {
//    var lat = position.coords.latitude;
//    var lag = position.coords.longitude;
//    return initMap(lat, lag);
////        x.innerHTML = "Latitude: " + position.coords.latitude +
////                "<br>Longitude: " + position.coords.longitude;
//}
//function initMap(lat, lag) {
//    var lat = lat;
//    var lag = lag;
//
//    lat = Number(lat);
//    lag = Number(lag);
//    var data = {
//        lat: lat,
//        lng: lag,
//    };
//    $('#defaultMap').addClass('d-none');
//    var map = new google.maps.Map(
//            document.getElementById('current_location_map'), {
//        zoom: 16,
//        center: data
//    });
//
//}

let map, infoWindow;

function initMap() {
//    $('#defaultMap').addClass('d-none');
    map = new google.maps.Map(document.getElementById("current_location_map"), {
        center: {lat: -33.865143, lng: 151.209900},
        zoom: 16,
    });

    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                    (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                var marker = new google.maps.Marker({
                    position: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    },
                    map: map,
                    draggable: true,
                });
                infoWindow.setPosition(pos);
                infoWindow.setContent("Location found.");
                infoWindow.open(map);
                map.setCenter(pos);
            },
                    () => {
                handleLocationError(true, infoWindow, map.getCenter());
            }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
            browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
            );
    infoWindow.open(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxuo3YR2wuXgT4maohLxkTp1QFEuTLz1Q&libraries=places&callback=initMap"
        async defer>
</script>
@endpush