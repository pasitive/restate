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

<div class="grid_12 omega alpha">

    <div class="grid_8 alpha">
        <div class="prepend_left">
            <div class="apartment_description">

                <h5>Параметры жилого комплекса</h5>

                <dl class="dots clearfix">

                    <?php foreach ($apartmentAttributes as $apartmentAttribute): ?>
                    <?php if (!empty($apartmentAttribute->value)): ?>
                        <dt class="grid_4 alpha"><?php echo $apartmentAttribute->attribute->name ?></dt>
                        <dd class="grid_3 omega"><?php echo $apartmentAttribute->value ?></dd>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </dl>

            </div>
        </div>
    </div>

    <div class="grid_4 omega">

        <?php $this->widget('MscmWidget'); ?>

        <div class="space"></div>

    </div>


</div>

<div class="grid_12 alpha omega">
    <div class="description prepend_left">
        <h5>Описание</h5>

        <?php echo $model->description; ?>
    </div>
</div>

<?php if ($apartmentDataProvider->totalItemCount > 0) : ?>
<div class="grid_12 alpha omega">

    <div class="prepend_top prepend_left">
        <div class="offers grid_7 alpha">
            <h5>Доступные предложения</h5>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $apartmentDataProvider,
                'itemView' => '_extended_view',
                'template' => "{items}",
            ));
            ?>
        </div>

        <div class="grid_4">
            <!--            <h5>Дополнительная информация</h5>-->

            <div class="offer_info">

                <?php //$this->widget('MscmWidget'); ?>

            </div>
        </div>

    </div>

    <div class="space"></div>
    <div class="shadow"></div>

</div>

<?php endif; ?>

<div class="grid_12 alpha omega">

    <div id="special_offers">

        <h2>Специальные предложения</h2>

        <?php $this->widget('SpecialOffersWidget', array('options' => array(
        'vertical' => false,
    ))); ?>

    </div>

    <div class="shadow"></div>
</div>