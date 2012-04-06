<?php
/**
 * @author Denis A Boldinov
 *
 * @copyright
 * Copyright (c) 2012 Denis A Boldinov
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
?>

<script type="text/javascript">
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

        //        console.log(status);
        //        console.log(results);
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
</script>