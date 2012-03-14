<?php
/**
 * string
 */
?>
<div class="row">
    <?php echo CHtml::label($attributes[$id]->name, "Apartment_attribute_{$id}_value"); ?>
    <?php echo CHtml::activeTextField($attribute, "[{$id}]value", array('maxlength' => 255)); ?>
    <?php echo CHtml::error($attribute, 'value'); ?>
</div>