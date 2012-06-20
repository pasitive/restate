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

<div class="space tiny">&nbsp;</div>

<div class="grid_2 alpha">

    <div id="rent">
        <?php echo CHtml::radioButton('Apartment[is_rent]', true, array('id' => 'rent0', 'value' => "")) ?>
        <?php echo CHtml::label('Все', 'rent0') ?>

        <?php echo CHtml::radioButton('Apartment[is_rent]', false, array('id' => 'rent1', 'value' => 1)) ?>
        <?php echo CHtml::label('Снять', 'rent1') ?>

        <?php echo CHtml::radioButton('Apartment[is_rent]', false, array('id' => 'rent2', 'value' => 0)) ?>
        <?php echo CHtml::label('Купить', 'rent2') ?>
    </div>

    <?php $this->widget('application.widgets.JuiButton', array(
    'name' => 'rent',
    'buttonType' => 'buttonset',
));?>
</div>

<div class="grid_3">

    <div class="apartment_type_select">
        <div id="type">
            <?php echo CHtml::radioButton('Apartment[type_id]', true, array('id' => 'type0', 'value' => "")) ?>
            <?php echo CHtml::label('Все', 'type0') ?>
            <?php foreach ($apartmentTypes as $type): ?>
            <?php echo CHtml::radioButton('Apartment[type_id]', false, array('id' => 'type' . $type->id, 'value' => $type->id)) ?>
            <?php echo CHtml::label($type->name, 'type' . $type->id) ?>
            <?php endforeach; ?>
        </div>

        <?php $this->widget('application.widgets.JuiButton', array(
        'name' => 'type',
        'buttonType' => 'buttonset',
    ));?>
    </div>

</div>

<div class="grid_3">
    <div class="subway_select">
        <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData(MetroStation::model()->hasApartments()->cache(DAY_1)->findAll(), 'id', 'name'), array('prompt' => 'Все станции метро')) ?>
    </div>
</div>

<div class="grid_2 omega">&nbsp;</div>

<div class="space tiny"></div>

<div class="grid_10 alpha omega">
    <div class="grid_3 alpha">
        <div class="apartment_type_select">
            <div id="rooms">
                <span class="search_label">Кол-во комнат: </span>
                <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms1', 'value' => 1)) ?>
                <?php echo CHtml::label('1', 'rooms1') ?>

                <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms2', 'value' => 2)) ?>
                <?php echo CHtml::label('2', 'rooms2') ?>

                <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms3', 'value' => 3)) ?>
                <?php echo CHtml::label('3', 'rooms3') ?>

                <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms4', 'value' => 4)) ?>
                <?php echo CHtml::label('4', 'rooms4') ?>

                <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms5', 'value' => 5)) ?>
                <?php echo CHtml::label('5+', 'rooms5') ?>

            </div>

            <?php $this->widget('application.widgets.JuiButton', array(
            'name' => 'rooms',
            'buttonType' => 'buttonset',
        ));?>
        </div>
    </div>

    <div class="grid_3">
        <div class="price_range small">
            <span class="search_label">&nbsp;Цена от</span>
                <?php echo CHtml::textField('Apartment[price][]', '', array('size' => 5)) ?>
            <span class="search_label">&mdash;</span>
            <?php echo CHtml::textField('Apartment[price][]', '', array('size' => 5)) ?>
        </div>
    </div>

    <div class="grid_3 omega">
        <div class="square_range">
            <span class="search_label">Общая площадь</span>
            <?php echo CHtml::textField('Apartment[square][]', '', array('size' => 5)) ?>
            <span class="search_label">&mdash;</span>
            <?php echo CHtml::textField('Apartment[square][]', '', array('size' => 5)) ?>
            <span class="search_label">м<sup>2</sup></span>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>