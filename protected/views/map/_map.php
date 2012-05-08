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
$this->breadcrumbs = array(
    'Карта объектов'
);
?>

<div id="map">
    <div class="shadow revert"></div>
    <div id="map_content">
    </div>

    <div class="shadow"></div>
</div>

<script type="text/javascript">

    $(function () {

        var map = null;

        var data = <?php echo CJSON::encode($data); ?> ;

        ymaps.ready(init);

        function init() {
            var map_options = {
                    // Центр карты
                    center:[55.76, 37.64],
                    // Коэффициент масштабирования
                    zoom:10,
                    // Тип карты
                    type:"yandex#map"
                },
                map = new ymaps.Map('map_content', map_options),
                collection = new ymaps.GeoObjectCollection();

            ymaps.layout.storage.add('my#apartmentLayout', getHintLayout());

            // Задаем наш шаблон для балунов геобъектов коллекции.
            collection.options.set({
                hintContentLayout:'my#apartmentLayout',
                hintPane:'floats',
                hintHideTimeout:20000
            });

            map.behaviors.enable('scrollZoom');

            function addMarkers() {
                for (i = 0; i < data.length; i++) {

                    /*var $container = $('<div/>'),
                        $dl = $('<dl/>').attr({class:'dots'}).appendTo($container);

                    if (data[i].attributes.length != 0) {
                        $.each(data[i].attributes, function (index, attribute) {
                            var $dt = $('<dt/>').html(attribute.name).appendTo($dl);
                            var $dd = $('<dd/>').html(attribute.value).appendTo($dl);
                        });
                    }*/

                    var placemark = new ymaps.Placemark(data[i].coord, {
                        imageUrl:data[i].default_image,
                        name:(data[i].name.length == 0 ? data[i].type : data[i].name),
                        address:data[i].address,
                        moreLink:data[i].link,
                        apartmentCount:data[i].apartment_count,
                        moreLinkSuffix:(data[i].apartment_count > 0 ? '(' + data[i].apartment_count + ')' : '')
                    }, {
                        preset:'twirl#houseIcon'
                    });

                    collection.add(placemark);
                }

                map.geoObjects.add(collection);
            }

            function getHintLayout() {
                var layout = ymaps.templateLayoutFactory.createClass(
                        '<div class="apartmentPlacemark grid_5 alpha omega"> ' +
                            '<div class="image_block grid_2 alpha">' +
                            '<div class="box_shadow">' +
                            '<img width="146" src="$[properties.imageUrl]" alt="">' +
                            '</div>' +
                            '</div>' +
                            '<div class="description_block grid_3 omega">' +
                            '<div class="description clearfix">' +
                            '<h2>$[properties.name]</h2>' +
                            '<address>$[properties.address]</address>' +
                            '<a class="more_link" href="$[properties.moreLink]">Посмотреть предложения $[properties.moreLinkSuffix]</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    )
                    ;
                return layout;
            }

            addMarkers();
        }
    });
</script>