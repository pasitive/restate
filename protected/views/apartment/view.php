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

<?php
$this->breadcrumbs = array(
    $model->type->name => array('/apartment/view', 'id' => $model->id),
    $model->address
);
?>

<div id="main_content" class="prepend_top prepend_left">

    <h1>
        <?php echo CHtml::encode($model->address) ?>
    </h1>

    <div class="grid_3 alpha">
        <h4 class="label"><?php echo CHtml::encode($model->type->name) ?></h4>
    </div>

    <div class="grid_3">
        <h4 class="metro"><span><?php echo CHtml::encode($model->metro->name) ?></span></h4>
    </div>

    <div class="grid_3">
        <h4><span class="label">Район: </span><?php echo CHtml::encode($model->area->name) ?></h4>
    </div>

    <div class="grid_2 omega">
        <a href="#" class="map_link">Показать на карте</a>
    </div>

</div>

<div class="grid_12 alpha omega">

    <div class="gallery">
        <div class="items_wrapper">
            <a href="#" class="prev">Prev</a>
            <a href="#" class="next">Next</a>

            <div class="items">
                <ul>
                    <?php foreach ($model->apartmentFiles as $apartmentFile) : ?>
                    <li><img src="<?php echo $apartmentFile->getFile(450) ?>" alt=""></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</div>

<?php if ($model->type->container == 1) : ?>
<?php $this->renderPartial('_container', array('model' => $model, 'apartmentDataProvider' => $apartmentDataProvider)) ?>
<?php else: ?>
<?php $this->renderPartial('_standalone', array('model' => $model)) ?>
<?php endif; ?>