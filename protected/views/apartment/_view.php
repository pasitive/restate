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


<div class="row">

    <div class="span2">
        <ul class="thumbnails">
            <li class="span2">
                <div class="thumbnail">
                    <?php echo CHtml::image($data->default_image, $data->name, array('width' => 260)) ?>
                </div>
            </li>
        </ul>
    </div>

    <div class="span4">

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
                        <li><strong>Метро: </strong> <i class="icon-map-marker"></i> <?php echo $data->metroName ?> </li>
                        <li><strong>Комнат: </strong><?php echo $data->room_number ?></li>
                        <li><strong>Этаж: </strong><?php echo $data->floor ?>/<?php echo $data->parent->number_of_storeys ?></li>
                        <li><strong>Площадь: </strong><?php echo $data->square ?> м<sup>2</sup> </li>
                    </ul>



                </div>
                <div class="tab-pane" id="apartment-sub-params_<?php echo $data->id ?>">
                    <ul class="unstyled">

                        <?php if ($data->container == 1): ?>
                        <!--NOTHING-->
                        <?php else: ?>

                        <ul class="unstyled">
                            <li>
                                <strong>Кухня: </strong><?php echo $data->square_kitchen ?>м<sup>2</sup>
                            </li>
                            <li>
                                <strong>С/узлы: </strong><?php echo $data->wc_number ?>
                            </li>
                            <?php foreach ($data->apartmentAttributes as $apartmentAttribute): ?>
                            <?php if (!empty($apartmentAttribute->value)): ?>
                                <li>
                                    <strong><?php echo $apartmentAttribute->attributeName ?>
                                        :</strong> <?php echo $apartmentAttribute->value ?>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <li>
                                <strong>Цена: </strong><?php echo Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB') ?>
                            </li>
                        </ul>

                        <?php endif; ?>

                    </ul>

                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#apartment-main-params_<?php echo $data->id ?>" data-toggle="tab">
                    Описание</a>
                </li>
                <li><a href="#apartment-sub-params_<?php echo $data->id ?>" data-toggle="tab">
                    Дополнительно</a></li>
            </ul>
        </div>
        <?php echo CHtml::link('<i class="icon-info-sign"></i> Посмотреть подробное описание', array('/apartment/view', 'id' => $data->id), array('class' => 'btn')) ?>
    </div>
</div>


<hr>

<?php /*

<div class="offer">
    <div class="image_block grid_2 alpha">
        <div class="box_shadow">
            <?php echo CHtml::link(CHtml::image($data->default_image, $data->name, array('width' => '146px')), array('/apartment/view', 'id' => $data->id)) ?>
        </div>
    </div>

    <div class="description_block grid_5 omega">
        <div class="description clearfix">


            <div class="grid_2 alpha">
                <dl>
                    <?php if (!empty($data->metroName) || !empty($data->metroName)): ?>
                    <dt><?php echo Yii::t('apartment', 'metro') ?></dt>
                    <dd><?php echo (empty($data->metroName) ? '&mdash;' : $data->metroName) ?></dd>
                    <?php endif; ?>

                    <?php if ($data->container == 1): ?>
                    <!--NOTHING-->
                    <?php else: ?>

                    <?php if (!empty($data->square) || !empty($data->square_live)): ?>
                        <dt><?php echo Yii::t('apartment', 'square') ?></dt>
                        <dd><?php echo (empty($data->square_live) ? '' : $data->square_live . '/') ?><?php echo (empty($data->square) ? '' : $data->square . ' м<sup>2</sup>') ?></dd>
                        <?php endif; ?>

                    <dt><?php echo Yii::t('apartment', 'room_number') ?></dt>
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
                        <dt><?php echo Yii::t('apartment', 'square_kitchen') ?></dt>
                        <dd><?php echo $data->square_kitchen . ' м<sup>2</sup>' ?></dd>
                        <?php endif; ?>

                    <?php if (!empty($data->square_kitchen)): ?>
                        <dt><?php echo Yii::t('apartment', 'wc_number') ?></dt>
                        <dd><?php echo $data->wc_number ?></dd>
                        <?php endif; ?>

                    <?php endif; ?>
                </dl>
            </div>

            <div class="grid_5 alpha omega">
                <?php if ($data->container != 1): ?>
                <div
                    class="price small strong"><?php echo (($data->is_rent == 1) ? Yii::t('common', 'Rent price') : Yii::t('common', 'Price')) ?> <?php echo (($data->price == 0 ? 'Уточняйте у менеджера' : Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB'))) ?></div>
                <?php endif; ?>

                <?php echo CHtml::link(Yii::t('common', 'View more'), array(
                '/apartment/view',
                'id' => $data->id,
                'city' => Common::getUri($data->cityName, 'apartment'),
                'address' => Common::getUri($data->address, 'apartment'),
            ), array('class' => 'more_link')) ?>
            </div>

        </div>
    </div>
</div>

<hr class="splitter croped">

  */
?>