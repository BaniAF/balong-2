
function initializeMap() {
    // Replace latitude and longitude with your desired location coordinates
    var myLatLng = { lat: -7.956036, lng: 111.432840 };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 8
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Your Location'
    });
}
