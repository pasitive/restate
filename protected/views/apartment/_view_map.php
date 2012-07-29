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

    <div class="span1">
        <ul class="thumbnails">
            <li class="span1">
                <div class="thumbnail">
                    <?php echo CHtml::image($data->default_image, $data->name) ?>
                </div>
            </li>
        </ul>
    </div>

    <div class="span2">

        <?php if (intval($data->parent_id) !== 0): ?>
        <h4><?php echo CHtml::link($data->parentName, array('/apartment/view', 'id' => $data->parent_id)) ?></h4>
        <address><?php echo CHtml::encode($data->address) ?></address>
        <?php else: ?>
        <h4><?php echo CHtml::encode(empty($data->name) ? $data->typeName : $data->name) ?></h4>
        <address><?php echo CHtml::encode($data->address) ?></address>
        <?php endif; ?>

        <div class="tabbable tabs-below"> <!-- Only required for left/right tabs -->
            <div class="tab-content">
                <div class="tab-pane active" id="apartment-main-params_<?php echo $data->id ?>">

                    <ul class="unstyled">
                        <?php if (!empty($data->metroName) || !empty($data->metroName)): ?>
                        <li>
                            <strong><?php echo Yii::t('apartment', 'metro') ?></strong>: <?php echo (empty($data->metroName) ? '&mdash;' : $data->metroName) ?>
                        </li>
                        <?php endif; ?>

                        <?php if (!empty($data->square) || !empty($data->square_live)): ?>
                        <li>
                            <strong>Площадь: </strong><?php echo (empty($data->square) ? '' : $data->square . '/') ?><?php echo (empty($data->square_live) ? '' : $data->square_live . ' м<sup>2</sup>') ?>
                        </li>
                        <?php endif; ?>

                        <?php if (!empty($data->room_number)): ?>
                        <li><strong>Кол-во
                            комнат: </strong> <?php echo (empty($data->room_number) ? '&mdash;' : $data->room_number) ?>
                        </li>
                        <?php endif; ?>

                        <?php if ($data->container != 1): ?>
                        <li>
                            <strong><?php echo (($data->is_rent == 1) ? Yii::t('common', 'Rent price') : Yii::t('common', 'Price')) ?></strong>: <?php echo (($data->price == 0 ? 'Уточняйте у менеджера' : Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB'))) ?>
                        </li>
                        <?php endif; ?>

                    </ul>

                </div>
                <div class="tab-pane" id="apartment-sub-params_<?php echo $data->id ?>">
                    <ul class="unstyled">

                        <?php if ($data->container == 1): ?>
                        <!--NOTHING-->
                        <?php else: ?>

                        <?php if (!empty($data->square_kitchen)): ?>
                            <li><strong>Площадь
                                кухни</strong>: <?php echo $data->square_kitchen . ' м<sup>2</sup>' ?></li>
                            <?php endif; ?>

                        <?php if (!empty($data->wc_number)): ?>
                            <li><strong>Санузлов</strong>: <?php echo $data->wc_number . ' м<sup>2</sup>' ?>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>

                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#apartment-main-params_<?php echo $data->id ?>" data-toggle="tab">
                    Описание</a>
                </li>
                <li><a href="#apartment-sub-params_<?php echo $data->id ?>" data-toggle="tab">
                    Еще</a></li>
            </ul>
        </div>
        <?php echo CHtml::link('<i class="icon-info-sign"></i> Подробнее', array('/apartment/view', 'id' => $data->id), array('class' => 'btn')) ?>
    </div>