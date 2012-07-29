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

<div id="map">
    <div id="map_content"></div>
</div>

<script type="text/javascript">

    $(function () {

        var map = null;

        var data = <?php echo CJSON::encode($mapData); ?> ;

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
            map.controls
                // Кнопка изменения масштаба
                .add('zoomControl')
                // Список типов карты
                .add('typeSelector');


            function addMarkers() {
                for (i = 0; i < data.length; i++) {
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
                var layout = ymaps.templateLayoutFactory.createClass('<?php echo CJavaScript::quote($this->renderPartial('_map_hint_layout', null, true)) ?>');
                return layout;
            }

            addMarkers();
        }
    });
</script>