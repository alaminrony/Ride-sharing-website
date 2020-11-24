@extends('frontEnd.layouts.master')
@section('content')
<section id="slider_area">
    <div class="bxslider">
        <div class="child_slider">
            <!-- <img src="assets/img/slider.jpg" alt=""> -->
            <div class="slider_text">
                <div class="slider_display">
                    <div class="slider_table">
                        <div class="slider_main">
                            <h1 class="animate__animated animate__fadeInUp animate__delay-1s"><span>Journeys </span>are better together</h1>
                            <p class="animate__animated animate__fadeInUp animate__delay-2s">Save money. My Trip My Fare. FareTrim</p>
                            <div class="slider_icon animate__animated animate__fadeInUp animate__delay-3s">
                                <ul class="icons">
                                    <li><a href="#"><img src="{{asset('frontEnd/assets/img/apple_icon.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('frontEnd/assets/img/android_icon.png')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- How FareTrims works area -->
<section class="working_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section_title animate__animated animate__fadeInUp animate__delay-2s">
                    How fareTrim Works
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 zIndex animate__animated animate__fadeInRight animate__delay-2s">
                <div class="phone_slider_navigation">
                    <img src="{{asset('frontEnd/assets/img/just-mobile.png')}}" alt="just-mobile" class="img-fluid">
                    <div class="img-over">
                        <!-- Swiper -->
                        <div class="swiper-container sTest">
                            <div class="swiper-wrapper">
                                @if($homeSlider->isNotEmpty())
                                @foreach($homeSlider as $slider)
                                <div class="swiper-slide">
                                    <div class="overSliderimg">
                                        <img src="{{asset($slider->image)}}" alt="mobile" class="img-fluid">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination swiper-pagination3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 animate__animated animate__fadeInLeft animate__delay-2s">                        
                <div class="phone_slider">
                    <img class="img-fluid" src="{{asset('frontEnd/assets/img/home_page_illustration.png')}}" alt="">
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- End how faretrim works-->
<!-- About area -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 animate__animated animate__fadeInLeft animate__delay-2s">
                <h1 class="about_title">About FareTrim </h1>
                <p>Fare Trim is built around the core value ‘always give more’. To give more back to riders, drivers and the community.</P>

                <p>Our drivers get the highest rate in the market. With happy drivers, we make sure our riders are always happy.</p>
                <p>For our riders, we offer more affordable rides and the new mini car for a smarter/cheaper choice.</p>   


                <p>For the community, we give the first 10% of our share of the fare to a cause backed by you, our riders. The more you ride the more we give and the bigger the impact we make together.</p>
            </div>
            <div class="col-sm-6 animate__animated animate__fadeInRight animate__delay-2s">
                <div class=" about_video">

                    <iframe  src="https://www.youtube.com/embed/2Gg6Seob5Mg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features area -->
<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate__animated animate__fadeInUp animate__delay-2s">
                <h1 class="feature_title">
                    Why FareTrim
                </h1>   
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon1.png')}}" alt="">
                        </div>
                    </div>
                    <h3>More to Drivers</h3>
                    <p>Our drivers are paid the most, always for them </p>
                </div>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon2.png')}}" alt="">
                        </div>
                    </div>
                    <h3>Reliable Rides</h3>
                    <p>Happy drivers mean dependable service</p>
                </div>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-4s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon3.png')}}" alt="">
                        </div>
                    </div>
                    <h3>Easy to Use</h3>
                    <p> User friendly and great looking app  </p>
                </div>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon4.png')}}" alt="">
                        </div>
                    </div>
                    <h3>More affordable ride</h3>
                    <p> Our rides are more affordable and offer great choice </p>
                </div>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon5.png')}}" alt="">
                        </div>
                    </div>
                    <h3>More for the community</h3>
                    <p> 10% of our share of the fare to a cause that you care about.</p>
                </div>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-4s">
                <div class="single_feature_icon">
                    <div class="feature_icon_container">
                        <div class="feature_icon_tablecell">
                            <img src="{{asset('frontEnd/assets/img/feature-icon6.png')}}" alt="">
                        </div>
                    </div>
                    <h3>We're Australian</h3>
                    <p>  Focused on our mission, not on building global empires</p>
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
                        <a href="{{url('passenger-signup')}}" class="btn btn-defalt btn-lg sign_up_btn">Sign Up to ride</a>
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
<!-- Latest News 249 number line--> 
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate__animated animate__fadeInUp animate__delay-2s">
                <h1 class="section_title">Latest News</h1>
            </div>
        </div>
        <div class="row">
            @if($latestNews->isNotEmpty())
            @foreach($latestNews as $news)
            <div class="col-sm-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="single_news">
                    <a href="{{url("latest-news/{$news->id}/details")}}"><img src="{{asset($news->image)}}" alt=""></a>
                    <p class="news_date">{{date('j M Y \a\t h:i A',strtotime($news->created_at))}}</p>
                    <a href="{{url("latest-news/{$news->id}/details")}}"><p class="news_description">{{$news->title}}</p></a>
                    <a href="{{url("latest-news/{$news->id}/details")}}"><p class="text-dark">{{Str::limit($news->description,80)}}</p></a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div>
            <div class="view_all_news text-right">
                <a href="{{url('list-latest-news')}}">View all...</a>
            </div>
        </div>
    </div>
</section>
<!-- Driver Requerment -->
<section class="driver_requirements">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section_title animate__animated animate__fadeInUp animate__delay-2s">Driver Requirements</h1>
                <p class="animate__animated animate__fadeInUp animate__delay-3s">You are eligible to drive with faretrim if you meet the
                    following requirements and <br>submit the documents listed below.</p>
            </div>
        </div>

        <div class="row">
            <div class="offset-md-6 offset-lg-6 col-md-6 col-md-6 col-xs-12 col-sm-12">
                <div class="requirement_text">
                    <div id="accordion" class="myaccordion">
                        <div class="">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="d-flex align-items-center justify-content-between btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        View Requirements
                                        <span class="fa-stack fa-sm text-dark">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="">
                                    <ul class="requirements_list">
                                        <li>Your full driver’s license (for the state or territory you
                                            intend to drive in)</li>
                                        <li>Your proof of ID (passport or birth certificate)</li>
                                        <li>Vehicle insurance certificate specifying the state or
                                            territory you will be driving in</li>
                                        <li>Other documents (may vary with state or territory)</li>                              
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Driver requirement -->
<!-- Make Money -->
<section class="make_money">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-2 col-sm-2 col-xs-12 animate__animated animate__fadeInLeft animate__delay-2s">
                <div class="money_icon">
                    <img src="{{asset('frontEnd/assets/img/hand-icon.png')}}" alt="">
                </div>
            </div>
            <div class=" col-md-6 col-sm-6 col-xs-12 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="money_text">
                    <h1 class="money_title">Ready to make money?</h1>
                    <p>The first step is to signup</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 animate__animated animate__fadeInRight animate__delay-4s">
                <div class="money_button">
                    <a href="{{url('driver-signup')}}" class="btn btn-defalt btn-lg">Sign Up to drive</a>
                </div>
            </div>
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