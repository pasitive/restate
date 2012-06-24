<?php foreach (Yii::app()->params['languages'] as $l => $lang) :
    if ($l === Yii::app()->params['defaultLanguage']) $suffix = '';
    else $suffix = '_' . $l;
    ?>
<fieldset>
    <legend><?php echo $lang; ?></legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name' . $suffix, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name' . $suffix); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type_name'); ?>
        <?php echo $form->textField($model, 'type_name' . $suffix, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'type_name' . $suffix); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_name'); ?>
        <?php echo $form->textField($model, 'parent_name' . $suffix, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'parent_name' . $suffix); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'area_name'); ?>
        <?php echo $form->textField($model, 'area_name' . $suffix, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'area_name' . $suffix); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'city_name'); ?>
        <?php echo $form->textField($model, 'city_name' . $suffix, array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'city_name' . $suffix); ?>
    </div>

</fieldset>

<?php endforeach; ?>