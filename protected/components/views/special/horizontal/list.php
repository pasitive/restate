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
<div class="gallery small">
    <div class="items_wrapper">
        <a href="#" class="prev">Prev</a>
        <a href="#" class="next">Next</a>

        <div class="items">
            <ul>
                <?php foreach($dataProvider->getData() as $data): ?>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('apartment/view', array('id' => $data->id)) ?>">
                        <div class="item_wrapper">
                            <div class="image_wrapper"><img src="/images/image_sample.png" alt=""></div>
                            <span><?php echo CHtml::encode($data->address) ?></span>
                            <address>м. <?php echo CHtml::encode($data->metro->name) ?></address>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>