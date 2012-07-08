<?php if (Yii::app()->user->checkAccess('publishApartment')): ?>
<div class="row">
    <?php echo $form->labelEx($model, 'is_published'); ?>
    <?php echo $form->checkbox($model, 'is_published'); ?>
    <?php echo $form->error($model, 'is_published'); ?>
</div>
<?php endif; ?>

<?php if (intval($model->type->container) == 0): ?>
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

<?php if (intval($model->type->container) === 0): // Если тип объекта не является контейнером ?>

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

<?php else: ?>

<div class="row">
    <?php echo $form->labelEx($model, 'flat_number'); ?>
    <?php echo $form->textField($model, 'flat_number', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'flat_number'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'number_of_storeys'); ?>
    <?php echo $form->textField($model, 'number_of_storeys', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'number_of_storeys'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'ceiling_height'); ?>
    <?php echo $form->textField($model, 'ceiling_height', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'ceiling_height'); ?>
</div>






<?php endif; ?>

<div class="row">
    <?php echo $form->labelEx($model, 'ytvideo_code'); ?>
    <?php echo $form->textField($model, 'ytvideo_code', array('size' => 60, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'ytvideo_code'); ?>
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