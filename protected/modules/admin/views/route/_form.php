<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'route-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'routeable_controller'); ?>
		<?php echo $form->textField($model,'routeable_controller',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'routeable_controller'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'routeable_action'); ?>
		<?php echo $form->textField($model,'routeable_action',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'routeable_action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'routeable_id'); ?>
		<?php echo $form->textField($model,'routeable_id'); ?>
		<?php echo $form->error($model,'routeable_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pattern'); ?>
		<?php echo $form->textField($model,'pattern',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pattern'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->