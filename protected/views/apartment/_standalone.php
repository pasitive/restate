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

<div class="span7">

    <?php $this->renderPartial('_shared', array(
    'model' => $model,
    'apartmentFiles' => $apartmentFiles,
)) ?>

    <div class="row">
        <div class="span3">

            <ul class="unstyled">
                <li><strong>Метро: </strong> <i class="icon-map-marker"></i> <?php echo $model->metroName ?> </li>
                <li><strong>Комнат: </strong><?php echo $model->room_number ?></li>
                <li><strong>Площадь: </strong><?php echo $model->square ?></li>
                <li><strong>Этаж: </strong><?php echo $model->floor ?></li>
                <li>
                    <strong>Цена: </strong><?php echo Yii::app()->numberFormatter->formatCurrency($model->price, 'RUB') ?>
                </li>
            </ul>

        </div>
        <div class="span3">
            <ul class="unstyled">
                <?php foreach ($apartmentAttributes as $apartmentAttribute): ?>
                <?php if (!empty($apartmentAttribute->value)): ?>
                    <li>
                        <strong><?php echo $apartmentAttribute->attributeName ?>
                            :</strong> <?php echo $apartmentAttribute->value ?>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <div class="well">
                <legend>Описание</legend>
                <?php echo $model->description ?>
            </div>
        </div>
    </div>

    <div class="well" style="padding: 8px 0">
        <ul class="nav nav-list">
            <li>
                <?php echo CHtml::link('<i class="icon-home"></i> Посмотреть все предложения в ' . $model->parent_name, array('/apartment/view/', 'id' => $model->parent_id, '#' => 'apartment-list')) ?>
            </li>
            <li class="divider"></li>
            <li>
                <?php echo CHtml::link('Назад', 'javascript:history.back()') ?>
            </li>
        </ul>
    </div>

</div>

<div class="span3">
    <div class="well">На этом месте будут текстовые блоки</div>
    <div class="well">На этом месте будут текстовые блоки</div>
    <div class="well">

        <p>Мы предлагаем аренду и продажу квартир в элитных жилых комплексах Москвы на отличных условиях! И всегда
            готовы помочь собственникам сдать или продать квартиру. Звоните!</p>

        <p>Мы предлагаем аренду и продажу квартир в элитных жилых комплексах Москвы на отличных условиях! И всегда
            готовы помочь собственникам сдать или продать квартиру. Звоните!</p>

        <p>Мы предлагаем аренду и продажу квартир в элитных жилых комплексах Москвы на отличных условиях! И всегда
            готовы помочь собственникам сдать или продать квартиру. Звоните!</p>

    </div>

    <legend>Спецпредложения</legend>

    <?php $this->widget('SpecialOffersWidget', array(
    'pageSize' => 3,
)) ?>
</div>

<?php /*

<div class="space small"></div>

<div class="space small"></div>

<div class="grid_12 alpha omega">

    <div class="grid_5 alpha">
        <!--        <h2>Фотогалерея</h2>-->

        <div class="gallery" style="height: 350px;">
            <?php foreach ($apartmentFiles as $apartmentFile) : ?>
            <a href="<?php echo $apartmentFile->getFile(450) ?>">
                <img src="<?php echo $apartmentFile->getFile(450) ?>">
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="grid_3">
        <div class="prepend_left small">

            <!--            <h2>Параметры объекта</h2>-->

            <div class="attributes">

                <ul class="attributes_list">
                    <li class="icon-metro"><span><?php echo Yii::t('apartment', 'Metro') ?>: </span><?php echo $model->metroName ?></li>
                    <li><span><?php echo Yii::t('apartment', 'Rooms') ?></span>: <?php echo $model->room_number ?></li>
                    <li><span><?php echo Yii::t('apartment', 'Floor') ?></span>: <?php echo $model->floor ?></li>
                    <li><span><?php echo Yii::t('apartment', 'Square') ?></span>: <?php echo $model->square ?> м<sup>2</sup></li>
                    <li><span><?php echo Yii::t('apartment', 'Live square') ?></span>: <?php echo $model->square_live ?> м<sup>2</sup></li>
                    <li><span><?php echo Yii::t('apartment', 'Kitchen square') ?></span>: <?php echo $model->square_kitchen ?> м<sup>2</sup></li>
                    <li><span><?php echo Yii::t('apartment', 'WC') ?></span>: <?php echo $model->wc_number ?></li>

                    <li>
                        <span>Цена: </span><?php echo Yii::app()->numberFormatter->formatCurrency($model->price, 'RUB') ?>
                    </li>

                    <?php foreach ($apartmentAttributes as $apartmentAttribute): ?>
                    <?php if (!empty($apartmentAttribute->value)): ?>
                        <li>
                            <span><?php echo $apartmentAttribute->attributeName ?></span>: <?php echo $apartmentAttribute->value ?>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid_4 omega">
        <div class="description">
            <?php echo $model->description ?>
        </div>

        <br>
        <?php echo CHtml::link("Посмотреть все предложения в " . $model->parentName, array('/apartment/view', 'id' => $model->parent_id, '#' => 'apartment_list'), array('class' => 'strong')) ?>
    </div>
</div>

<div class="space small"></div>

<div class="grid_12 alpha omega">

    <div class="grid_4 alpha">
        <h2>Связаться с нами</h2>

        <?php $this->renderPartial('/site/contact', array('model' => $contactForm)) ?>

    </div>

    <div class="grid_1">&nbsp;</div>

    <div class="grid_7 omega">
        <h2><?php echo (!empty($model->parent_id) ? $model->parentName . ', ' : '') ?><?php echo CHtml::encode($model->address) ?>
            на карте</h2>

        <div id="map" style="position:relative;margin:25px 0;width:100%;height:279px;background-color: #f0f0f0"></div>
    </div>
</div>


<!--

<div class="grid_12 alpha omega">

    <div class="grid_12 alpha omega">

        <div class="grid_9 alpha">
            <div class="prepend_left">

                <h5>Информация о квартире</h5>

                <dl class="dots clearfix">

                    <?php foreach ($apartmentAttributes as $apartmentAttribute): ?>
                    <?php if (!empty($apartmentAttribute->value)): ?>
                        <dt class="grid_5 alpha"><?php echo $apartmentAttribute->attribute->name ?></dt>
                        <dd class="grid_3 omega"><?php echo $apartmentAttribute->value ?></dd>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </dl>

                <h5>Описание</h5>

                <?php echo $model->description ?>
            </div>
        </div>

        <div class="grid_3 omega">

            <p>Введите Ваш номер телефона и укажите удобное для Вас время звонка.</p>
        </div>

        <div class="space"></div>
        <div class="shadow"></div>

    </div>


    <div class="grid_12 alpha omega">

        <div id="special_offers">

            <h2>Специальные предложения</h2>

            <?php $this->widget('SpecialOffersWidget', array('options' => array(
    'vertical' => false,
))); ?>

        </div>

    </div>

    <div class="shadow"></div>
</div>

-->

 */
?>
