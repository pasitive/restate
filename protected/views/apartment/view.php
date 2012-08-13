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

<?php
$this->breadcrumbs = array(
    (!empty($model->parent_id) ? $model->parentName : $model->name),
    $model->address
);

$this->pageTitle = (empty($model->name) ? $model->typeName : $model->name) . ' | ' . (!empty($model->address) ? $model->address . ' | ' : '') . Yii::app()->name;
Yii::app()->clientScript->registerMetaTag(($model->routeable_description ? $model->routeable_description : ($model->name . ' - ' . $model->address)), 'description');
Yii::app()->clientScript->registerMetaTag(($model->routeable_keywords ? $model->routeable_keywords : $model->name), 'keywords');

?>


<?php
$view = ($model->container == 1) ? '_container' : '_standalone';
$this->renderPartial($view, array(
    'model' => $model,
    'apartmentDataProvider' => $apartmentDataProvider,
    'apartmentAttributes' => $apartmentAttributes,
    'apartmentFiles' => $apartmentFiles,
    'contactForm' => $contactForm,
)) ?>

<?php /*

<div id="detail_view" class="detail_view_wrapper prepend_top prepend_left">
    <div class="detail_view_header">
        <h1>

        </h1>
    </div>

</div>

<?php
$view = ($model->container == 1) ? '_container' : '_standalone';
$this->renderPartial($view, array(
    'model' => $model,
    'apartmentDataProvider' => $apartmentDataProvider,
    'apartmentAttributes' => $apartmentAttributes,
    'apartmentFiles' => $apartmentFiles,
    'contactForm' => $contactForm,
)) ?>

<div class="space"></div>
<div class="shadow"></div>

 */
?>

<script type="text/javascript">

    $(function () {

        $('#container_description').ready(function () {
            var height = $('#apartment-gallery').height();
            $(this).css({
                height:height
            });
        });

        var map = null;

        ymaps.ready(init);

        function init() {

            var mapOptions = {center:[55.76, 37.64], zoom:8, type:"yandex#map"},
                city = '<?php echo $model->cityName ?>',
                placemark = null;

            ymaps.geocode(city, {results:1}).then(function (result) {
                var c = result.geoObjects.get(0);
                map = new ymaps.Map('apartment-on-map', mapOptions);
                map.setCenter(c.geometry.getCoordinates());
                map.controls.add('zoomControl');
                // Список типов карты

//                map.behaviors.enable('scrollZoom');
                var placemark = new ymaps.Placemark([<?php echo $model->lat ?>, <?php echo $model->lng ?>], {

                }, {
                    preset:'twirl#houseIcon'
                });
                map.geoObjects.add(placemark);
                map.setCenter(placemark.geometry.getCoordinates());
                map.setZoom(16);
            });

            $('.tabbable a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
//                $('body').scrollTop(0);
                map.container.fitToViewport();
            });

            $('.gallery').each(function (index, gallery) {
                carousel = $(gallery).find('.carousel.slide').carousel();
                $('.thumbnail', gallery).each(function (index, thumb) {
                    $(this).bind('click', function () {
                        $(carousel).carousel(index - 1);
                    });
                });
            });

            $('#container_description').ready(function () {
                $(this).css({
                    height:$('#apartment-gallery').height()
                });
            })
        }
    });
</script>
