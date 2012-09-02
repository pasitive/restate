<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'apartment-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

<?php echo $form->errorSummary($model); ?>

<?php
$this->widget('CTabView', array(
    'tabs' => array(
        'general' => array(
            'title' => Yii::t('apartment', 'General'),
            'view' => '/apartment/_general',
            'data' => array(
                'form' => $form,
                'model' => $model,
            ),
        ),
        'attributes' => array(
            'title' => Yii::t('apartment', 'Attributes'),
            'view' => '/apartmentAttribute/_form',
            'data' => array(
                'form' => $form,
                'model' => $model,
                'attributes' => $attributes,
            ),
        ),
        'i18n' => array(
            'title' => Yii::t('apartment', 'Intenational'),
            'view' => '/apartment/_i18n',
            'data' => array(
                'form' => $form,
                'model' => $model,
            ),
        ),
    ),
));
?>

<?php echo $form->hiddenField($model, 'type_id'); ?>
<?php echo $form->hiddenField($model, 'lng'); ?>
<?php echo $form->hiddenField($model, 'lat'); ?>

<?php echo $form->hiddenField($model, 'city_name'); ?>
<?php echo $form->hiddenField($model, 'metro_name'); ?>
<?php echo $form->hiddenField($model, 'area_name'); ?>
<?php echo $form->hiddenField($model, 'container', array('value' => $model->type->container)); ?>
<?php echo $form->hiddenField($model, 'type_name', array('value' => $model->type->name)); ?>
<?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id)); ?>

<?php if (intval($model->type->container) === 0 && isset($model->parent->name)): ?>
    <?php echo $form->hiddenField($model, 'parent_name', array('value' => $model->parent->name)); ?>
    <?php endif; ?>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

    $(function () {

        $('#Apartment_city_id').change(function () {
            $('#Apartment_city_name').val($('#Apartment_city_id option:selected').text());
        });

        $('#Apartment_area_id').change(function () {
            $('#Apartment_area_name').val($('#Apartment_area_id option:selected').text());
        });

        $('#Apartment_metro_id').change(function () {
            $('#Apartment_metro_name').val($('#Apartment_metro_id option:selected').text());
        });

    <?php if (intval($model->type->container) === 0): ?>
        $('#Apartment_parent_id').change(function () {
            $('#Apartment_parent_name').val($('#Apartment_parent_id option:selected').text());
        });
        <?php endif; ?>


        var map = null;

        ymaps.ready(init);

        function init() {

            var mapOptions = {center:[55.76, 37.64], zoom:8, type:"yandex#map"},
                city = 'Москва',
                placemark = null;

            initMap();

            function initMap() {

                if ($('#Apartment_city_id option:selected').val().length != 0) {
                    city = $('#Apartment_city_id option:selected').text();
                }

                if (map) {
                    map.destroy();
                }

                ymaps.geocode(city, {results:1}).then(function (result) {
                    var c = result.geoObjects.get(0);
                    map = new ymaps.Map('map', mapOptions);
                    map.setCenter(c.geometry.getCoordinates());
                    map.behaviors.enable('scrollZoom');

                    if ($('#Apartment_address').val().length != 0) {
                        geocode($('#Apartment_address'));
                    }
                });
            }

            function geocode(obj) {
                var address = obj.val();

                ymaps.geocode(address, {results:1, boundedBy:map.getBounds()}).then(function (result) {

                    if (placemark != null) {
                        map.geoObjects.remove(placemark);
                    }

                    var obj = result.geoObjects.get(0);

                    placemark = new ymaps.Placemark(obj.geometry.getCoordinates(), {
                        hintContent:address
                    }, {
                        preset:'twirl#houseIcon'
                    });

                    setHiddenCoords(placemark.geometry.getCoordinates());

                    map.setCenter(placemark.geometry.getCoordinates());
                    map.setZoom(16);
                    map.geoObjects.add(placemark);
                });
            }

            function setHiddenCoords(coords) {
                $('#Apartment_lat').val(coords[0]);
                $('#Apartment_lng').val(coords[1]);
            }

            $('#Apartment_city_id').bind('change', initMap);
            $('#Apartment_address').change(function () {
                geocode($(this));
            });

        }
    });
</script>