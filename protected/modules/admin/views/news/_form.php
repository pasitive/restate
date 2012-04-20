<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
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
        <?php echo $form->labelEx($model, 'teaser'); ?>
        <?php echo $form->textField($model, 'teaser', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'teaser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php $this->widget('application.extensions.tinymce.TinyMce',
        array(
            'htmlOptions' => array('cols' => 50, 'rows' => 6),
            'model' => $model,
            'attribute' => 'content',
        ));
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->