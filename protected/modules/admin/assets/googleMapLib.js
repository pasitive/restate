/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 3/15/12
 * Time: 2:32 PM
 * To change this template use File | Settings | File Templates.
 */

var map = map || new google.maps.Map();
var geocoder = new google.maps.Geocoder();
var marker = new google.maps.Marker();

function geocode(obj) {
    var options = {
        partialmatch:true
    };
    var address = obj.val();
    if ($.trim(address) == '') return false;

    $.extend(options, {'address':address});

    var selectedCity = $('#Apartment_city_id option:selected').text();
    if ($.trim(selectedCity) != '') {
        $.extend(options, {'region':selectedCity});
    }
    geocoder.geocode(options, geocodeResult);
    return false;
}

function geocodeResult(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {
        map.fitBounds(results[0].geometry.viewport);

        marker.setMap(map);
        marker.setPosition(results[0].geometry.location);
        marker.setAnimation(google.maps.Animation.DROP);
        marker.setDraggable(true);

        map.setZoom(15);
        map.setCenter(marker.getPosition());

        $('#Apartment_address').val(results[0].formatted_address);
        setLatLng(marker);

        google.maps.event.addListener(marker, "dragend", function (e) {
            setLatLng(marker);
        });
    }

    console.log(status);
    console.log(results);
}

function setLatLng(marker) {
    $('#Apartment_lng').val(marker.getPosition().lng());
    $('#Apartment_lat').val(marker.getPosition().lat());
}

$(function () {
    $('#Apartment_address').change(function () {
        geocode($(this));
    });
});