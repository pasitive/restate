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
        // Map

        var map = null;

        ymaps.ready(function () {
            map = new ymaps.Map("map_content", {
                    // Центр карты
                    center:[55.76, 37.64],
                    // Коэффициент масштабирования
                    zoom:<?php echo $zoom; ?>,
                    // Тип карты
                    type:"yandex#map"
                }
            );
            console.log(map.container);
        });

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
</script>