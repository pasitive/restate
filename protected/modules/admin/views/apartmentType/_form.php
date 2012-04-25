<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'apartment-type-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'container'); ?>
        <?php echo $form->checkbox($model, 'container'); ?>
        <?php echo $form->error($model, 'container'); ?>
    </div>

    <?php if (intval($model->container) === 0): ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'is_filter'); ?>
        <?php echo $form->checkbox($model, 'is_filter'); ?>
        <?php echo $form->error($model, 'is_filter'); ?>
    </div>
    <?php endif; ?>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->