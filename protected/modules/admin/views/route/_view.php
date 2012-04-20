<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('routeable_controller')); ?>:</b>
	<?php echo CHtml::encode($data->routeable_controller); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('routeable_action')); ?>:</b>
	<?php echo CHtml::encode($data->routeable_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('routeable_id')); ?>:</b>
	<?php echo CHtml::encode($data->routeable_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pattern')); ?>:</b>
	<?php echo CHtml::encode($data->pattern); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>