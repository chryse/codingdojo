var codingdojo = new google.maps.LatLng(37.377233, -121.912067);
var parliament = new google.maps.LatLng(37.3777233, -121.91200);
var infoWindow = new google.maps.InfoWindow();
var marker;
var map;

function initialize() {
    var mapOptions = {
        center: codingdojo,
        zoom: 10,
        scrollwheel: false,
        navigationControl: false,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        styles: [{
                featureType: "all",
                stylers: [
                    { saturation: -100 },
                    { lightness: -20 }
                ]
            }]
    };

    map = new google.maps.Map(document.getElementById('map'),
        mapOptions);

    marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position: parliament,
        content: '<div class="infoWindowContent">Coding Dojo</div>'
    })
    google.maps.event.addListener(marker, 'click', function(){
        infoWindow.setContent(marker.content);
        infoWindow.open(map, marker);
    })
}

function toggleBounce() {
    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } 
    else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}



google.maps.event.addDomListener(window, 'load', initialize);