<table class="table table-striped">
    <tr>
        <td>Driver Name :</td>
        <td>{{$cabRide->driver->full_name??'N/A'}}</td>
    </tr>
    <tr>
        <td>Riding Time</td>
        <td>{{time_subtract($cabRide->start_time,$cabRide->end_time )}}H</td>
    </tr>
    <tr>
        <td>Distance</td>
        <td>{{$cabRide->riding_distance}} Km</td>
    </tr>
    <tr>
        <td>Pickup time</td>
        <td>{{pickupDate($cabRide->start_time)}}</td>
    </tr>
    <tr>
        <td>Destination time</td>
        <td>{{pickupDate($cabRide->end_time)}}</td>
    </tr>
    <tr>
        <td>Pickup address</td>
        <td>{{$cabRide->pickup_address}}</td>
    </tr>
    <tr>
        <td>Destination address</td>
        <td>{{$cabRide->destination_address}}</td>
    </tr>
    <tr>
        <td>Discount</td>
        <td>{{$cabRide->discount_percent}}</td>
    </tr>
    <tr>
        <td>Comment</td>
        <td>{{$cabRide->comment}}</td>
    </tr>
    
    <tr>
        <td>Created at	</td>
        <td>{{pickupDate($cabRide->created_at)}}</td>
    </tr>
    <tr>
        <td>Passenger Name :</td>
        <td>{{$cabRide->passenger->full_name}}</td>
    </tr>
    <tr>
       <div class="img-map" id="map" style="height: 300px;width:100%;"></div>
    </tr>
</table>


<script type="text/javascript">
    function initMap() {
        // The location of Uluru
        var lat = "<?php echo $cabRide->pickup_latitude; ?>";
        var lag = "<?php echo $cabRide->pickup_longitude; ?>";
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
        var pickup_lat = "<?php echo $cabRide->pickup_latitude; ?>";
        var pickup_lag = "<?php echo $cabRide->pickup_longitude; ?>";
        var destination_lat = "<?php echo $cabRide->destination_latitude; ?>";
        var destination_log = "<?php echo $cabRide->destination_longitude; ?>";
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxuo3YR2wuXgT4maohLxkTp1QFEuTLz1Q&libraries=places&callback=initMap"
async defer></script> 

