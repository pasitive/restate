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
            <?php echo CHtml::link(CHtml::image($data->default_image, $data->name, array('width' => '146px')), array('/apartment/view', 'id' => $data->id)) ?>
        </div>
    </div>

    <div class="description_block grid_5 omega">
        <div class="description clearfix">
            <?php if (intval($data->parent_id) !== 0): ?>
            <h5><?php echo CHtml::link($data->parentName, array('/apartment/view', 'id' => $data->parent_id)) ?></h5>
            <address><?php echo CHtml::encode($data->address) ?></address>
            <?php else: ?>
            <h5><?php echo CHtml::encode(empty($data->name) ? $data->typeName : $data->name) ?></h5>
            <address><?php echo CHtml::encode($data->address) ?></address>
            <?php endif; ?>

            <div class="grid_2 alpha">
                <dl>
                    <dt>Метро:</dt>
                    <dd><?php echo (empty($data->metroName) ? '&mdash;' : $data->metroName) ?></dd>

                    <?php if ($data->container == 1): ?>
                    <!--NOTHING-->
                    <?php else: ?>

                    <?php if ( !empty($data->square) || !empty($data->square_live) ): ?>
                        <dt>Площадь:</dt>
                        <dd><?php echo (empty($data->square_live) ? '' : $data->square_live . '/') ?><?php echo (empty($data->square) ? '' : $data->square . ' м<sup>2</sup>') ?></dd>
                        <?php endif; ?>

                    <dt>Комнат:</dt>
                    <dd><?php echo (empty($data->room_number) ? '&mdash;' : $data->room_number) ?></dd>
                    <?php endif; ?>
                </dl>
            </div>

            <div class="grid_3 omega">
                <dl>
                    <?php if ($data->container == 1): ?>
                    <!--NOTHING-->
                    <?php else: ?>

                    <?php if (!empty($data->square_kitchen)): ?>
                        <dt>Кухня:</dt>
                        <dd><?php echo $data->square_kitchen . ' м<sup>2</sup>' ?></dd>
                        <?php endif; ?>

                    <?php if (!empty($data->square_kitchen)): ?>
                        <dt>Санузлов:</dt>
                        <dd><?php echo $data->wc_number ?></dd>
                        <?php endif; ?>

                    <?php endif; ?>
                </dl>
            </div>

            <div class="grid_5 alpha omega">
                <?php if ($data->container != 1): ?>
                <div
                    class="price small strong"><?php echo (($data->is_rent == 1) ? 'Стоимость за месяц: ' : 'Цена: ') ?><?php echo (($data->price == 0 ? 'Уточняйте у менеджера' : Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB'))) ?></div>
                <?php endif; ?>

                <?php echo CHtml::link('Посмотреть подробности', array('/apartment/view', 'id' => $data->id), array('class' => 'more_link')) ?>
            </div>

        </div>
    </div>
</div>

<hr class="splitter croped">