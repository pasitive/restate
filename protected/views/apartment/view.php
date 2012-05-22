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
    $model->typeName => array('/apartment/view', 'id' => $model->id),
    $model->address
);

$this->pageTitle = Yii::app()->name . ' - ' . ($model->routeable_title ? $model->routeable_title : ($model->name . ' - ' . $model->address));
Yii::app()->clientScript->registerMetaTag(($model->routeable_description ? $model->routeable_description : ($model->name . ' - ' . $model->address)), 'description');
Yii::app()->clientScript->registerMetaTag(($model->routeable_keywords ? $model->routeable_keywords : $model->name), 'keywords');
?>

<div id="main_content" class="prepend_top prepend_left">

    <h1>
        <?php echo CHtml::encode($model->address) ?>
    </h1>

    <div class="grid_3 alpha">
        <h4 class="label"><?php echo CHtml::encode($model->typeName) ?></h4>
    </div>

    <div class="grid_3">
        <h4 class="metro"><span><?php echo CHtml::encode($model->metroName) ?></span></h4>
    </div>

    <div class="grid_3">
        <h4><span class="label">Район: </span><?php echo CHtml::encode($model->areaName) ?></h4>
    </div>

    <div class="grid_2 omega">
        <a href="#" id="map_link">Показать на карте</a>
    </div>

</div>

<div class="grid_12 alpha omega">

    <div class="gallery" id="full_gallery">
        <div class="items_wrapper">
            <a href="#" class="prev">Prev</a>
            <a href="#" class="next">Next</a>

            <div class="items">
                <ul>
                    <?php foreach ($apartmentFiles as $apartmentFile) : ?>
                    <li><img src="<?php echo $apartmentFile->getFile(450) ?>" alt=""></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="map" style="position:relative;margin:25px 0;width:100%;height:279px;display: none;"></div>

</div>

<?php if ($model->container == 1) : ?>
<?php $this->renderPartial('_container', array(
        'model' => $model,
        'apartmentDataProvider' => $apartmentDataProvider,
        'apartmentAttributes' => $apartmentAttributes,
    )) ?>
<?php else: ?>
<?php $this->renderPartial('_standalone', array(
        'model' => $model,
        'apartmentAttributes' => $apartmentAttributes,
    )) ?>
<?php endif; ?>

<script type="text/javascript">

    $(function () {

        var map = null;

        ymaps.ready(init);

        function init() {

            var mapOptions = {center:[55.76, 37.64], zoom:8, type:"yandex#map"},
                city = '<?php echo $model->cityName ?>',
                placemark = null;

            ymaps.geocode(city, {results:1}).then(function (result) {
                var c = result.geoObjects.get(0);
                map = new ymaps.Map('map', mapOptions);
                map.setCenter(c.geometry.getCoordinates());
                map.behaviors.enable('scrollZoom');
                var placemark = new ymaps.Placemark([<?php echo $model->lat ?>, <?php echo $model->lng ?>], {

                }, {
                    preset:'twirl#houseIcon'
                });
                map.geoObjects.add(placemark);
                map.setCenter(placemark.geometry.getCoordinates());
                map.setZoom(16);
            });

            $('#map_link').toggle(function () {
                $('#full_gallery').hide();
                $('#map').show();
                $('#map_link').text('Фотогалерея');
                map.container.fitToViewport();
            }, function () {
                $('#map').hide();
                $('#full_gallery').show();
                $('#map_link').text('Показать на карте');
            });
        }
    });
</script>