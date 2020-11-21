
    <div class="map">
        <div class="img-map" id="map" style="width:100%;height:100%;"></div>
    </div>

<script>
    function initMap() {
    var lat = "<?php echo $pickup_latitude;?>";
    var lag = "<?php echo $pickup_longitude;?>";
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

}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    var pickup_lat = "<?php echo $pickup_latitude;?>";
    var pickup_lag = "<?php echo $pickup_longitude;?>";
    var destination_lat = "<?php echo $drop_latitude;?>";
    var destination_log = "<?php echo $drop_longitude;?>";
//    pickup_lat = $('#pickup_latitude').val() != '' ? $('#pickup_latitude').val() : '23.7106102';
//    pickup_lag = $('#pickup_longitude').val() != '' ? $('#pickup_longitude').val() : '90.43490919999999';
//    destination_lat = $('#destination_latitude').val() != '' ? $('#destination_latitude').val() : '23.7936706';
//    destination_log = $('#destination_longitude').val() != '' ? $('#destination_longitude').val() : '90.4066082';
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
<!-- Latest compiled and minified CSS -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxuo3YR2wuXgT4maohLxkTp1QFEuTLz1Q&libraries=places&callback=initMap"
async defer>
</script>

