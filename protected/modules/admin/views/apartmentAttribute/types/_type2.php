<?php
/**
 * dictionary
 */
?>

<div class="row">
    <?php echo CHtml::label('Справочник', "Apartment_attribute_{$id}_referenceModel"); ?>
    <?php echo CHtml::activeDropDownList($attribute, "[{$id}]referenceModel", $attribute->referenceModels); ?>
</div>

<div class="row">
    <?php echo CHtml::label($attributes[$id]->name, "Apartment_attribute_{$id}_value"); ?>
    <?php echo CHtml::activeTextField($attribute, "[{$id}]value", array('maxlength' => 255)); ?>
</div>