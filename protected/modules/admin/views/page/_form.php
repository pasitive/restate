<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'page-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'body'); ?>
        <?php $this->widget('application.extensions.tinymce.TinyMce',
        array(
            'htmlOptions' => array('cols' => 50, 'rows' => 6),
            'model' => $model,
            'attribute' => 'body',
        ));
        ?>
        <?php echo $form->error($model, 'body'); ?>
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

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->