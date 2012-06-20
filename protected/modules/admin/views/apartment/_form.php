<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'apartment-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

<?php echo $form->errorSummary($model); ?>

<?php if (Yii::app()->user->checkAccess('publishApartment')): ?>
<div class="row">
    <?php echo $form->labelEx($model, 'is_published'); ?>
    <?php echo $form->checkbox($model, 'is_published'); ?>
    <?php echo $form->error($model, 'is_published'); ?>
</div>
    <?php endif; ?>

<?php if (intval($model->container) == 0): ?>
<div class="row">
    <?php echo $form->labelEx($model, 'is_special'); ?>
    <?php echo $form->checkbox($model, 'is_special'); ?>
    <?php echo $form->error($model, 'is_special'); ?>
</div>
    <?php endif; ?>

<div class="row">
    <div id="map" style="height: 200px;"></div>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'city_id'); ?>
    <?php echo $form->dropDownList($model, 'city_id', CHtml::listData(City::model()->findAll(), 'id', 'name'), array(
    'empty' => 'Выбрать город',
    'ajax' => array(
        'type' => 'POST',
        'dataType' => 'json',
        'url' => Yii::app()->createAbsoluteUrl('/admin/city/ajaxDependsOfCity'),
        'data' => array('city_id' => 'js:$(this).val()'),
        'success' => 'function(data) {
                $("#Apartment_area_id").html(data.areas);
                $("#Apartment_metro_id").html(data.metroStations);
            }',
    )
)); ?>
    <?php echo $form->error($model, 'city_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'area_id'); ?>
    <?php if ($model->isNewRecord && empty($model->area_id)) : ?>
    <?php echo $form->dropDownList($model, 'area_id', array(), array('empty' => 'Нужно выбрать город')); ?>
    <?php else : ?>
    <?php echo $form->dropDownList($model, 'area_id', CHtml::listData($model->city->areas, 'id', 'name'), array('empty' => 'Нужно выбрать город')); ?>
    <?php endif; ?>
    <?php echo $form->error($model, 'area_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'address'); ?>
    <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'address'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'description'); ?>
    <?php $this->widget('application.extensions.tinymce.TinyMce',
    array(
        'htmlOptions' => array('cols' => 50, 'rows' => 6),
        'model' => $model,
        'attribute' => 'description',
    ));
    ?>
    <?php echo $form->error($model, 'description'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'metro_id'); ?>
    <?php if ($model->isNewRecord && empty($model->metro_id)) : ?>
    <?php echo $form->dropDownList($model, 'metro_id', array(), array('empty' => 'Нужно выбрать город')); ?>
    <?php else : ?>
    <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData($model->city->metroStations, 'id', 'name'), array('empty' => 'В этом городе нет метро')); ?>
    <?php endif; ?>
    <?php echo $form->error($model, 'metro_id'); ?>
</div>

<?php if (intval($model->container) === 0): // Если тип объекта не является контейнером ?>

<div class="row">
    <?php echo $form->labelEx($model, 'price'); ?>
    <?php echo $form->textField($model, 'price', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'price'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'floor'); ?>
    <?php echo $form->textField($model, 'floor', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'floor'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'room_number'); ?>
    <?php echo $form->textField($model, 'room_number', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'room_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'square'); ?>
    <?php echo $form->textField($model, 'square', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'square'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'square_live'); ?>
    <?php echo $form->textField($model, 'square_live', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'square_live'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'square_kitchen'); ?>
    <?php echo $form->textField($model, 'square_kitchen', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'square_kitchen'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'wc_number'); ?>
    <?php echo $form->textField($model, 'wc_number', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'wc_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'parent_id'); ?>
    <?php echo $form->dropDownList($model, 'parent_id', $model->typedApartmentList, array('empty' => 'Автономный')); ?>
    <?php echo $form->error($model, 'parent_id'); ?>
    <p class="hint">В качестве родительского объекта можно выбрать Жилой комплекс</p>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'is_rent'); ?>
    <?php echo $form->checkbox($model, 'is_rent'); ?>
    <?php echo $form->error($model, 'is_rent'); ?>
</div>

    <?php endif; ?>

<div class="row">
    <?php echo $form->labelEx($model, 'ytvideo_code'); ?>
    <?php echo $form->textField($model, 'ytvideo_code', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'ytvideo_code'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'routeable_title'); ?>
    <?php echo $form->textField($model, 'routeable_title', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'routeable_title'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'routeable_keywords'); ?>
    <?php echo $form->textField($model, 'routeable_keywords', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'routeable_keywords'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'routeable_description'); ?>
    <?php echo $form->textField($model, 'routeable_description', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'routeable_description'); ?>
</div>

<div class="row">
    <?php echo CHtml::label('Изображения', 'files'); ?>
    <?php
    $this->widget('CMultiFileUpload', array(
        'model' => $model,
        'attribute' => 'files',
        'accept' => join('|', $model->fileType),
    ));
    ?>
</div>


<h2>Дополнительные поля</h2>

<?php
$this->renderPartial('/apartmentAttribute/_form', array(
    'model' => $model,
    'attributes' => $attributes,
    'apartmentAttributes' => $apartmentAttributes,
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

<?php if (intval($model->type->container) === 0): ?>
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