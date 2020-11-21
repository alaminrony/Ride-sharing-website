@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.passenger.passenger-left-sidebar')
            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottomRideInfo">
                    <p>Total</p>
                    <p>$<span class="ml-2">{{$rideDetails->total_fare_amount??'0'}}</span></p>
                </div>
                <div class="rider-table-info">
                    <table>
                        <tr>
                            <td>Ride No</td>
                            <td>#000{{$rideDetails->id??''}}</td>
                        </tr>
                        <tr>
                            <td>Ride Status</td>
                            <td><span class="text-success">{{$rideStatus[$rideDetails->ridestatus_id]??''}}</span></td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td><span class="text-success">{{$rideDetails->comment??''}}</span></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="rider-img">
                                <p>You ride with {{$driverDetails->full_name??''}}</p>
                                <img src="{{url($driverDetails->profile_photo??'')}}" alt="avt" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-7"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rider-km-info">
                                <div class="data">
                                    <?php
                                    $start_time = new DateTime($rideDetails->start_time);
                                    $end_time = new DateTime($rideDetails->end_time);
                                    $durationTime = date_diff($start_time,$end_time)->format("%H:%I");
                                    ?>
                                    <span class="mr-3 right">Distance {{$rideDetails->riding_distance??''}} km</span><span>{{$durationTime}} min</span>
                                </div>
                                <div class="another-data">
                                    <div>
                                        <p>{{date('j M Y \a\t h:i a',strtotime($rideDetails->start_time))}} <br> {{$rideDetails->pickup_address??''}}</p>
                                    </div>
                                    <div>
                                        <p>{{date('j M Y \a\t h:i a',strtotime($rideDetails->end_time))}}<br> {{$rideDetails->destination_address??''}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="img-map">
                                <img src="{{asset('frontEnd/assets/img/map.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    function initMap() {
        // The location of Uluru
        var lat = "<?php echo $rideDetails->pickup_latitude; ?>";
        var lag = "<?php echo $rideDetails->pickup_longitude; ?>";
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        lat = Number(lat);
        lag = Number(lag);
        var data = {
            lat: lat,
            lng: lag,
        };
        // The map, centered at Uluru
        var map = new google.maps.Map(
                document.getElementById('map'), {
            zoom: 16,
            center: data
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
        // The marker, positioned at Uluru
        // var marker = new google.maps.Marker({
        //   position: data, 
        //   map: map
        // });
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var pickup_lat = "<?php echo $rideDetails->pickup_latitude; ?>";
        var pickup_lag = "<?php echo $rideDetails->pickup_longitude; ?>";
        var destination_lat = "<?php echo $rideDetails->destination_latitude;?>";
        var destination_log = "<?php echo $rideDetails->destination_longitude;?>";
        var pickup = new google.maps.LatLng(Number(pickup_lat), Number(pickup_lag));
        var destinationB = new google.maps.LatLng(Number(destination_lat), Number(destination_log));
        directionsService.route({
            origin: pickup,
            destination: destinationB,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyfBGNZetxsOvA_-4AB_cr8_JRfDXUdh4&libraries=places&callback=initMap"
async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxuo3YR2wuXgT4maohLxkTp1QFEuTLz1Q&libraries=places&callback=initMap"
async defer></script> 
@endpush

