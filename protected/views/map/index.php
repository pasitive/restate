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
$this->pageTitle = 'Объекты на карте' . ' | ' . Yii::app()->name;

Yii::app()->clientScript->registerScript('search', "
    $('.advanced-search-form').bind('keyup, change', function(){
        $.fn.yiiListView.update('offers_list', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<div class="space small"></div>
<h1>Объекты на карте</h1>

<div class="space small"></div>

<div class="grid_12 alpha omega">
    <div class="grid_7 alpha">
        <?php $this->renderPartial('_map', array('data' => $mapData)); ?>
    </div>
    <div class="grid_5 omega">
        <div class="prepend_left">
            <h2>Поиск объектов</h2>

            <div class="space small"></div>
            <?php $this->renderPartial('/apartment/_advanced_search', array(
            'model' => $model,
            'apartmentTypes' => $apartmentTypes,
        )) ?>
        </div>
    </div>
</div>

<div class="space small"></div>

<div class="grid_12 alpha omega">
    <div class="grid_7 alpha">
        <h2>Список объектов</h2>

        <div class="offers">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'id' => 'offers_list',
                'dataProvider' => $standaloneDataProvider,
                'itemView' => '/apartment/_view',
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
        </div>
    </div>
    <div class="grid_5 omega">

        <div class="prepend_left">

            <h2>Все жилые комлексы</h2>

            <?php
            $this->widget('zii.widgets.CListView', array(
                'id' => 'containers_list',
                'dataProvider' => $containerDataProvider,
                'itemView' => '/apartment/_list_container_item',
                'template' => "{items}",
            ));
            ?>

        </div>

    </div>
</div>

<div class="space"></div>
<div class="shadow"></div>