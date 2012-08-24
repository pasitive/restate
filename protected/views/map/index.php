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
?>

<div class="row">

    <div class="span7">
        <?php $this->renderPartial('_map', array(
        'mapData' => $mapData,
        'model' => $model,
        'apartmentTypes' => $apartmentTypes,
        'containerDataProvider' => $containerDataProvider,
        'standaloneDataProvider' => $standaloneDataProvider,
    )); ?>
    </div>

    <div class="span3">
        <br>

        <div class="well">
            qwe
        </div>
    </div>


    <div class="span10">

        <br>
        <legend>Жилые комплексы на западе Москвы</legend>
        <br>

        <div class="row">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'id' => 'apartment-list',
                'dataProvider' => $containerDataProvider,
                'itemView' => '/apartment/_view_map',
                'template' => "{items}<br><br>{pager}",
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