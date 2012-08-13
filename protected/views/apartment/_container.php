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
    <div id="container_description" style="overflow: hidden;">
        <?php echo $model->description ?>
    </div>

    <div class="well">
        <p>Текстовый блок с описанием еще чего нибудь</p>
    </div>

</div>

<script type="text/javascript">
    $(function(){
        $('#container_description').ready(function(){
            $(this).css({
                height: $('#apartment-gallery').height()
            });
        })
    });
</script>