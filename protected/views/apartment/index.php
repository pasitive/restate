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

?>

<?php
Yii::app()->clientScript->registerScript('search', "
    $('form#search').bind('keyup, change', function(){
        $.fn.yiiListView.update('apartment-list', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<div class="span6" id="content">


    <?php
    $this->widget('zii.widgets.CListView', array(
        'id' => 'apartment-list',
        'dataProvider' => $apartmentDataProvider,
        'itemView' => '_view',
        'template' => "{items}\n{pager}",
        'pagerCssClass' => 'bootstrap-pager',
        'pager' => array(
            'class' => 'CLinkPager',
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

<div class="span3">
    <?php $this->renderPartial('_search', array('model' => $model, 'apartmentTypes' => $apartmentTypes, 'containerDataProvider' => $containerDataProvider)) ?>

    <legend>Спецпредложения</legend>
    <?php $this->widget('SpecialOffersWidget'); ?>
</div>

