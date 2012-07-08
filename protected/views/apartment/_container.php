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
<div class="span6">
    <?php $this->renderPartial('_shared', array(
    'model' => $model,
    'apartmentFiles' => $apartmentFiles,
)) ?>

    <div class="row">
        <div class="span3">
            <ul class="unstyled">
                <li class="span3"><strong>Метро: </strong> <i
                    class="icon-map-marker"></i> <?php echo $model->metroName ?> </li>
                <li class="span3"><strong>Кол-во квартир: </strong> <?php echo $model->flat_number ?> </li>
                <li class="span3"><strong>Этажность: </strong> <?php echo $model->number_of_storeys ?> </li>
                <li class="span3"><strong>Высота потолков: </strong> <?php echo $model->ceiling_height ?> м</li>
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

    <br>

    <legend id="apartment-list">Список квартир в <?php echo $model->name ?></legend>

    <div class="row">

        <div class="span6">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'id' => 'apartment-list',
                'dataProvider' => $apartmentDataProvider,
                'itemView' => '_view',
                'template' => "{items}\n{pager}",
                'pagerCssClass' => 'bootstrap-pager',
                'pager' => array(
                    'class' => 'LinkPager',
                    'cssFile' => false,
                    'nextPageLabel' => CHtml::image('/images/pager_arrow_next.png'),
                    'prevPageLabel' => CHtml::image('/images/pager_arrow_prev.png'),
                    'header' => '',
                    'maxButtonCount' => 4,
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    ),
                ),
            ));
            ?>
        </div>

    </div>

</div>

<div class="span3">
    <legend>Описание</legend>
    <?php echo $model->description ?>

    <div class="well">
        <p>Текстовый блок с описанием еще чего нибудь</p>
    </div>

</div>

<?php /*

<div class="space small"></div>

<div class="grid_12 alpha omega">

    <div class="grid_5 alpha">
        <div class="gallery" style="height: 300px;">

        </div>
    </div>
    <div class="grid_3">

        <div class="prepend_left small">
            <div class="attributes">

                <ul class="attributes_list">
                    <li class="icon-metro"><span>Метро: </span><?php echo $model->metroName ?></li>
                    <?php foreach ($apartmentAttributes as $apartmentAttribute): ?>
                    <?php if (!empty($apartmentAttribute->value)): ?>
                        <li>
                            <span><?php echo $apartmentAttribute->attribute->name ?></span>: <?php echo $apartmentAttribute->value ?>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid_4 omega">
        <?php echo $model->description ?>
    </div>
</div>

<div class="space small">&nbsp;</div>

<div class="grid_12 alpha omega">

    <div class="grid_7 alpha">

        <?php if ($apartmentDataProvider->totalItemCount > 0): ?>

        <h2 id="apartment_list">Доступные предложения</h2>

        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $apartmentDataProvider,
            'itemView' => '_view',
            'template' => "{sorter}\n{pager}<div class='clear'></div>{items}\n{pager}",
            'pager' => array(
                'class' => 'CLinkPager',
                'cssFile' => false,
                'nextPageLabel' => CHtml::image('/images/pager_arrow_next.png'),
                'prevPageLabel' => CHtml::image('/images/pager_arrow_prev.png'),
                'header' => 'Страницы:',
                'maxButtonCount' => 4
            ),
            'sorterHeader' => 'Сортировать по:',
            'sortableAttributes' => array(
                'created_at' => 'дате',
                'price' => 'цене',
                'square' => 'площади',
            ),
        ));
        ?>

        <?php endif; ?>

        <h2>Связаться с нами</h2>

        <?php $this->renderPartial('/site/contact', array('model' => $contactForm)) ?>

    </div>

    <div class="grid_1">&nbsp;</div>

    <div class="grid_4 omega">
        <!--        <h2>Описание</h2>-->
        <div class="description">
            <br/>

            <h2><?php echo $model->name ?>
                на карте</h2>
            <div id="map"
                 style="position:relative;margin:25px 0;width:100%;height:279px;background-color: #f0f0f0"></div>
        </div>

    </div>
</div>

 */
?>