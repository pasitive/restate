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

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
    'method' => 'get',
    'htmlOptions' => array(
        'class' => 'advanced-search-form'
    ),
)); ?>

    <div class="row">
        <span class="search_label">Метро</span>
        <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData(MetroStation::model()->hasApartments()->cache(DAY_1)->findAll(), 'id', 'name'), array('prompt' => 'Все станции метро')) ?>
    </div>

    <div class="row">
        <span class="search_label">Цена от</span>
        <?php echo CHtml::textField('Apartment[price][]', '', array('size' => 5)) ?>
        <span class="search_label">&mdash;</span>
        <?php echo CHtml::textField('Apartment[price][]', '', array('size' => 5)) ?>
    </div>

    <div class="row">
        <span class="search_label">Кол-во комнат: </span>
        <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms1', 'value' => 1)) ?>
        <span>1</span>
        <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms2', 'value' => 2)) ?>
        <span>2</span>
        <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms3', 'value' => 3)) ?>
        <span>3</span>
        <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms4', 'value' => 4)) ?>
        <span>4</span>
        <?php echo CHtml::checkBox('Apartment[room_number][]', false, array('id' => 'rooms5', 'value' => 5)) ?>
        <span>5</span>
    </div>

    <div class="row">
        <span class="search_label">Общая площадь</span>
        <?php echo CHtml::textField('Apartment[square][]', '', array('size' => 5)) ?>
        <span class="search_label">&mdash;</span>
        <?php echo CHtml::textField('Apartment[square][]', '', array('size' => 5)) ?>
    </div>

    <div class="row">
        <span class="search_label">Жилая площадь</span>
        <?php echo CHtml::textField('Apartment[square_live][]', '', array('size' => 5)) ?>
        <span class="search_label">&mdash;</span>
        <?php echo CHtml::textField('Apartment[square_live][]', '', array('size' => 5)) ?>
    </div>

    <div class="row">
        <span class="search_label">Площадь кухни</span>
        <?php echo CHtml::textField('Apartment[square_kitchen][]', '', array('size' => 5)) ?>
        <span class="search_label">&mdash;</span>
        <?php echo CHtml::textField('Apartment[square_kitchen][]', '', array('size' => 5)) ?>
    </div>

    <div class="row">
        <span class="search_label">Кол-во санузлов</span>
        <?php echo CHtml::textField('Apartment[wc_number][]', '', array('size' => 5)) ?>
        <span class="search_label">&mdash;</span>
        <?php echo CHtml::textField('Apartment[wc_number][]', '', array('size' => 5)) ?>
    </div>


    <?php $this->endWidget(); ?>

</div>