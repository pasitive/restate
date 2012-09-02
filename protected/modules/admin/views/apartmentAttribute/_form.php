<h2>Дополнительные поля</h2>
<?php
/*foreach ($model->apartmentAttributes as $id => $attribute) {
    if ($attributes[$id]->disabled == 0) {
        $this->renderPartial('/apartmentAttribute/types/_type1', array(
            'id' => $id,
            'attributes' => $attributes,
            'attribute' => $attribute
        ));
    }
}
*/
?>
<?php foreach (Yii::app()->params['languages'] as $l => $lang) :
    if ($l === Yii::app()->params['defaultLanguage']) $suffix = '';
    else $suffix = '_' . $l;
    ?>
<fieldset>
    <legend><?php echo $lang; ?></legend>
    <?php foreach ($model->apartmentAttributes as $id => $attribute) { ?>
    <div class="row">
        <?php echo CHtml::label($attributes[$id]->{'name' . $suffix}, "Apartment_attribute_{$id}_value"); ?>

        <?php
        if (!empty($attributes[$id]->pattern) && $pattern = explode('|', $attributes[$id]->pattern)) {

            foreach($pattern as $index => $value) {
                unset($pattern[$index]);
                $pattern[$value] = $value;
            }
            echo CHtml::activeDropDownList($attribute, "[{$id}]value" . $suffix, $pattern);
        }
        ?>
        <?php echo CHtml::activeHiddenField($attribute, "[{$id}]attribute_name" . $suffix, array('maxlength' => 255, 'value' => $attributes[$id]->{'name' . $suffix})); ?>
        <?php echo CHtml::error($attribute, 'value' . $suffix); ?>
    </div>
    <?php } ?>
</fieldset>

<?php endforeach; ?>