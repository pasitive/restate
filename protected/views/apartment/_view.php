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

<div class="offer clearfix">
    <div class="image_block grid_2 alpha">
        <div class="box_shadow">
            <?php echo CHtml::image($data->default_image, $data->name, array('width' => 146)) ?>
        </div>
    </div>

    <div class="description_block grid_5 omega">
        <div class="description clearfix">
            <h3><strong><?php echo CHtml::encode($data->name) ?></strong>, <?php echo CHtml::encode($data->address) ?>
            </h3>
            <?php if (!empty($data->metroName)): ?>
            <address class="label">м. <?php echo $data->metroName ?></address>
            <?php else : ?>
            <address>&nbsp;</address>
            <?php endif; ?>

            <div class="grid_3 alpha">
                <?php echo CHtml::link(CHtml::tag('span', array(), $data->typeName), array('/apartment/view', 'id' => $data->id), array('class' => 'apartment_type ' . $data->typeIcon)); ?>
            </div>

            <div class="grid_1 omega">
                <!--                <a href="#" class="more_link">Подробнее</a>-->
                <?php echo CHtml::link('Подробнее', array('/apartment/view', 'id' => $data->id), array('class' => 'more_link')) ?>
            </div>
        </div>
    </div>
</div>

<hr class="splitter croped">