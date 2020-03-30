var marker;
function initMap() {
    var latitude;
    var longitude;
    if ((document.getElementById("lat").value != "") && (document.getElementById("lon").value != "")){
        latitude = parseFloat(document.getElementById("lat").value);
        longitude = parseFloat(document.getElementById("lon").value);
        console.log(latitude + "|" + longitude);
        var markerPosition = {lat:latitude, lng: longitude};
        map = new google.maps.Map(document.getElementById('map'), {
            center: markerPosition,
            zoom: 8
        });


        marker = new google.maps.Marker({
            position: markerPosition,
            map: map
        });
    }
    else {
        latitude = 53.90099900;
        longitude = 31.81277500;
        var markerPosition = {lat:latitude, lng: longitude};
        map = new google.maps.Map(document.getElementById('map'), {
            center: markerPosition,
            zoom: 8
        });
    }


}