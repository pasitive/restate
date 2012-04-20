<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'apartment-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

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
        <?php echo $form->labelEx($model, 'metro_id'); ?>
        <?php if ($model->isNewRecord && empty($model->metro_id)) : ?>
        <?php echo $form->dropDownList($model, 'metro_id', array(), array('empty' => 'Нужно выбрать город')); ?>
        <?php else : ?>
        <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData($model->city->metroStations, 'id', 'name'), array('empty' => 'В этом городе нет метро')); ?>
        <?php endif; ?>
        <?php echo $form->error($model, 'metro_id'); ?>
    </div>

    <?php
    $this->renderPartial('/apartmentAttribute/_form', array(
        'model' => $model,
        'attributes' => $attributes,
        'apartmentAttributes' => $apartmentAttributes,
    ));
    ?>

    <?php if (intval($model->type->container) === 0): ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php echo $form->dropDownList($model, 'parent_id', $model->typedApartmentList, array('empty' => 'Автономный')); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
        <p class="hint">В качестве родительского объекта можно выбрать Жилой комплекс</p>
    </div>
    <?php endif; ?>

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
        <?php echo $form->labelEx($model, 'is_special'); ?>
        <?php echo $form->checkbox($model, 'is_special'); ?>
        <?php echo $form->error($model, 'is_special'); ?>
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

    <?php echo $form->hiddenField($model, 'type_id'); ?>
    <?php echo $form->hiddenField($model, 'lng'); ?>
    <?php echo $form->hiddenField($model, 'lat'); ?>

    <?php echo $form->hiddenField($model, 'city_name'); ?>
    <?php echo $form->hiddenField($model, 'metro_name'); ?>
    <?php echo $form->hiddenField($model, 'area_name'); ?>
    <?php echo $form->hiddenField($model, 'container', array('value' => $model->type->container)); ?>
    <?php echo $form->hiddenField($model, 'type_name', array('value' => $model->type->name)); ?>

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


        var map = null;

        ymaps.ready(init);

        function init() {

            var mapOptions = {center:[55.76, 37.64], zoom:8, type:"yandex#map"},
                city = 'Москва',
                placemark = null;

            initMap();

            /*$('#Apartment_city_id').bind('change', function () {
                initMap();
            });

            if ($('#Apartment_address').val().length != 0) {
                geocode(map, $('#Apartment_address'));
            }

            $('#Apartment_address').change(function () {
                geocode(map, $(this));
            });

            if ($('#Apartment_city_id option:selected').val().length != 0) {
                city = $('#Apartment_city_id option:selected').text();
            }*/

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