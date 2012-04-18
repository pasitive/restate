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

<div id="map" class="grid_12">
    <div class="shadow revert"></div>
    <div id="map_content">
    </div>
    <div id="map_toggler">
        <a class="arrow_down" href="#" onclick="return false;">Откруть/Закрыть карту</a>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        $('#map_toggler').toggle(function () {
            $('#map div#map_content').animate({
                height:($(this).height() * 7)
            });
            $('#map_toggler a').removeClass('arrow_down').addClass('arrow_up');
        }, function () {
            $('#map div#map_content').animate({
                height:50
            });
            $('#map_toggler a').removeClass('arrow_up').addClass('arrow_down');
        });
    });

    google.load('maps', '3', {
        other_params:'sensor=false&language=ru'
    });
    google.setOnLoadCallback(initialize);

    var map = null;
    var markerClusterer = null;
    var data = <?php echo CJSON::encode($dataProvider->data); ?>;
    var infowindow = null;
//    var infoWindowOptions = null;

    function initialize() {
        var mapOptions = {
            zoom:<?php echo $zoom; ?>,
            center:new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map_content'), mapOptions);

//        infoWindowOptions = new google.maps.InfoWindowOptions();

//        google.maps.event.addListener(map, 'zoom_changed', refreshMap);

        refreshMap();
    }

    function showInfoWindow() {
        console.log('qwe');
    }

    function refreshMap() {

    <?php if ($loadAllObjects) : ?>

        var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
            'chco=FFFFFF,008CFF,000000&ext=.png';

        var markerImage = new google.maps.MarkerImage(imageUrl);

        var markers = [];
        var infos = [];
        for (var i = 0; i < data.length; ++i) {
            var latLng = new google.maps.LatLng(data[i].lat,
                data[i].lng)
            var marker = new google.maps.Marker({
                position:latLng
            });
            marker.setMap(map);
            marker.setAnimation(google.maps.Animation.DROP);

            google.maps.event.addListener(marker, 'mouseover', function (e) {
                infowindow.setOptions({
                    content: '<div>Test content</div>'
                });
                infowindow.open(map, marker);
            })
        }

        var zoom = 10;
        var size = markers.length + 1;
        var style = -1;
        zoom = zoom == -1 ? null : zoom;
        size = size == -1 ? null : size;
        style = style == -1 ? null : style;

        markerClusterer = new MarkerClusterer(map, markers, {
            maxZoom:zoom,
            gridSize:size
            //            styles:styles[style]
        });
        <?php endif; ?>
    }
</script>