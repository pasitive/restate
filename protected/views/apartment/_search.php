<?php
/**
 * @author Denis A Boldinov
 *
 * @copyright
 * Copyright (c) 2012 Denis A Boldinov
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'method' => 'get',
)); ?>

<div class="grid_2 alpha">
    <div class="search_label prepend_left small delimiter right"><span>Поиск</span></div>
</div>

<div class="grid_4">
    <div class="apartment_type_select delimiter right">

        <div id="type">
            <?php echo CHtml::radioButton('Apartment[type_id]', true, array('id' => 'type0', 'value' => '')) ?>
            <?php echo CHtml::label('Все', 'type0') ?>
            <?php foreach ($apartmentTypes as $type): ?>
            <?php echo CHtml::radioButton('Apartment[type_id]', false, array('id' => 'type' . $type->id, 'value' => $type->id)) ?>
            <?php echo CHtml::label($type->name, 'type' . $type->id) ?>
            <?php endforeach; ?>
        </div>

        <?php $this->widget('application.components.JuiButton', array(
        'name' => 'type',
        'buttonType' => 'buttonset',
    ));?>
    </div>
</div>

<div class="grid_3">
    <div class="rent_toggler delimiter right">


        <div id="rent">
            <?php echo CHtml::radioButton('Apartment[is_rent]', true, array('id' => 'rent0', 'value' => '')) ?>
            <?php echo CHtml::label('Все', 'rent0') ?>

            <?php echo CHtml::radioButton('Apartment[is_rent]', false, array('id' => 'rent1', 'value' => 1)) ?>
            <?php echo CHtml::label('Снять', 'rent1') ?>

            <?php echo CHtml::radioButton('Apartment[is_rent]', false, array('id' => 'rent2', 'value' => 0)) ?>
            <?php echo CHtml::label('Купить', 'rent2') ?>
        </div>

        <?php $this->widget('application.components.JuiButton', array(
        'name' => 'rent',
        'buttonType' => 'buttonset',
    ));?>
    </div>
</div>

<div class="grid_3 omega">
    <div class="subway_select">
        <label for="Apartment_metro_id">Метро</label>
        <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData(MetroStation::model()->hasApartments()->cache(DAY_1)->findAll(), 'id', 'name'), array('prompt' => 'Не важно')) ?>
    </div>
</div>


<?php $this->endWidget(); ?>