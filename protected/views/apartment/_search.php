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

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'type_id'); ?>
        <?php echo $form->dropDownList($model, 'type_id', CHtml::listData(ApartmentType::model()->cache(DAY_1)->findAll(), 'id', 'name')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'metro_id'); ?>
        <?php echo $form->dropDownList($model, 'metro_id', CHtml::listData(MetroStation::model()->hasApartments()->cache(DAY_1)->findAll(), 'id', 'name')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->