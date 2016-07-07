// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
var marker;


function initAutocomplete() {

    var lat = -14.864404683628603;
    var lng = -40.84454382408444;

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lng},
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;

    document.getElementById('textLat').value = lat;
    document.getElementById('textLng').value = lng;

    marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: map,
        draggable: true,
        title: 'Hello World!'
    });

    google.maps.event.addListener(marker, 'drag', function (event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();

        document.getElementById('textLat').value = event.latLng.lat();
        document.getElementById('textLng').value = event.latLng.lng();
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Ouça o evento disparado quando o usuário seleciona uma previsão e recuperar
    // more details for that place.
    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Limpar os antigos marcadores .
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {

            // Create a marker for each place.
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: place.name,
                position: place.geometry.location
            });

            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();

            document.getElementById('textLat').value = marker.getPosition().lat();
            document.getElementById('textLng').value = marker.getPosition().lng();


            google.maps.event.addListener(marker, 'drag', function (event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();

                document.getElementById('textLat').value = event.latLng.lat();
                document.getElementById('textLng').value = event.latLng.lng();
            });


            markers.push(marker);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });


        map.fitBounds(bounds);
    });
}

function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
