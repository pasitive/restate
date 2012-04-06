<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'apartment-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

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
        <?php $this->widget('application.components.MapWidget') ?>
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
        <?php echo $form->labelEx($model, 'is_special'); ?>
        <?php echo $form->checkbox($model, 'is_special'); ?>
        <?php echo $form->error($model, 'is_special'); ?>
    </div>

    <?php echo $form->hiddenField($model, 'type_id'); ?>
    <?php echo $form->hiddenField($model, 'lng'); ?>
    <?php echo $form->hiddenField($model, 'lat'); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->renderPartial('_js'); ?>