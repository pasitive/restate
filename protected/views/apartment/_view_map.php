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

<div class="span5">

    <div class="row">
        <div class="span2">
            <ul class="thumbnails">
                <li class="span2">
                    <div class="thumbnail">
                        <?php echo CHtml::image($data->default_image, $data->name) ?>
                    </div>
                </li>
            </ul>
        </div>

        <div class="span3">
            <h4><?php echo CHtml::link($data->name, array('/apartment/view', 'id' => $data->id)) ?></h4>
            <address><?php echo CHtml::encode($data->address) ?></address>

            <?php if (!empty($data->metroName) || !empty($data->metroName)): ?>
            <strong><?php echo Yii::t('apartment', 'metro') ?></strong>
            : <?php echo (empty($data->metroName) ? '&mdash;' : $data->metroName) ?>
            <?php endif; ?>

            <?php echo CHtml::link('<i class="icon-info-sign"></i> Подробнее', array('/apartment/view', 'id' => $data->id), array('class' => 'btn')) ?>
        </div>
    </div>
</div>

<?php // echo ($index % 4 == 0) ? '<div class="clear"></div>' : '' ?>