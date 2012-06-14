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

<a href="<?php echo Yii::app()->createUrl('apartment/view', array('id' => $data->id)) ?>">

    <div class="offer clearfix">
        <div class="image_block grid_2 alpha">
            <div class="box_shadow">
                <?php echo CHtml::image($data->default_image, $data->name, array('width' => '146px')) ?>
            </div>
        </div>

        <div class="description_block grid_5 omega">
            <div class="description clearfix">


                    <?php if (intval($data->parent_id) !== 0): ?>
                    <h5><?php echo CHtml::encode($data->parentName) ?></h5>
                    <address><?php echo CHtml::encode($data->address) ?></address>
                    <?php else: ?>
                    <h5><?php echo CHtml::encode(empty($data->name) ? $data->typeName : $data->name) ?></h5>
                    <address><?php echo CHtml::encode($data->address) ?></address>
                    <?php endif; ?>


                <dl>
                    <dt>Метро:</dt>
                    <dd><?php echo (empty($data->metroName) ? '&mdash;' : $data->metroName) ?></dd>

                    <?php if ($data->container == 1): ?>
                           <!--NOTHING-->
                    <?php else: ?>

                    <dt>Общая площадь:</dt>
                    <dd><?php echo (empty($data->square) ? '&mdash;' : $data->square . ' м<sup>2</sup>') ?></dd>

                    <dt>Комнат:</dt>
                    <dd><?php echo (empty($data->room_number) ? '&mdash;' : $data->room_number) ?></dd>
                    <?php endif; ?>
                </dl>

                <?php if ($data->container != 1): ?>
                <div class="price"><?php echo (($data->is_rent == 1) ? 'Стоимость за месяц: ' : 'Цена: ') ?><?php echo (($data->price == 0 ? 'Уточняйте у менеджера' : Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB'))) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</a>

<hr class="splitter croped">