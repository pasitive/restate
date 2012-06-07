<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'attribute-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'apartment_type_id'); ?>
        <?php echo $form->dropDownList($model, 'apartment_type_id', CHtml::listData(ApartmentType::model()->findAll(), 'id', 'name'), array('empty' => 'Выбрать тип объекта')); ?>
        <?php echo $form->error($model, 'apartment_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sort'); ?>
        <?php echo $form->textField($model, 'sort', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'sort'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'disabled'); ?>
        <?php echo $form->checkbox($model, 'disabled'); ?>
        <?php echo $form->error($model, 'disabled'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->