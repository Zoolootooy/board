var marker;
var markerCounter = 0;
function initMap() {
    var latitude = document.getElementById("lat").value;
    var longitude = document.getElementById("lon").value;

    var myPos = {lat: 53.90099900, lng: 31.81277500};

    if ((latitude != "") && (longitude != "")){
        console.log("."+latitude + "." + longitude+".");
    }
    else {
        console.log("."+latitude + "." + longitude+".");
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: myPos,
        zoom: 8
    });


    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
    });
}

function placeMarker(location) {
    if ( marker ) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
}