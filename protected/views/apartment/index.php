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
$this->pageTitle = Yii::t('app', 'Object list') . ' | ' . Yii::t('app', 'Application name');
$this->breadcrumbs = array(
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').bind('keyup, change', function(){
        $.fn.yiiListView.update('offers_list', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<div class="offers">
    <?php
    $this->widget('zii.widgets.CListView', array(
        'id' => 'offers_list',
        'dataProvider' => $apartmentDataProvider,
        'itemView' => '_view',
        'template' => "{sorter}\n{pager}<div class='clear'></div>{items}\n{pager}",
        'pager' => array(
            'class' => 'CLinkPager',
            'cssFile' => false,
            'nextPageLabel' => CHtml::image('/images/pager_arrow_next.png'),
            'prevPageLabel' => CHtml::image('/images/pager_arrow_prev.png'),
            'header' => Yii::t('app', 'Pages') . ':',
            'maxButtonCount' => 4
        ),
        'sorterHeader' => Yii::t('app', 'Sort by') . ':',
        'sortableAttributes' => array(
            'created_at' => Yii::t('app', 'date'),
            'price' => Yii::t('app', 'price'),
            'square' => Yii::t('app', 'square'),
        ),
    ));
    ?>
</div>

