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

<legend>Быстрый поиск</legend>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'search',
    'method' => 'get',
    'htmlOptions' => array('class' => 'well'),
)); ?>

<fieldset>
    <div class="control-group">
        <div class="controls">
            <label class="radio inline"><?php echo $form->radioButton($model, 'is_rent', array('value' => '', 'uncheckValue' => null)) ?>Все</label>
            <label class="radio inline"><?php echo $form->radioButton($model, 'is_rent', array('value' => '1', 'uncheckValue' => null)) ?>Снять</label>
            <label class="radio inline"><?php echo $form->radioButton($model, 'is_rent', array('value' => '0', 'uncheckValue' => null)) ?>Купить</label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Количество комнат</label>

        <div class="controls">
            <label class="checkbox inline"><?php echo $form->checkbox($model, 'room_number[]', array('value' => 1, 'uncheckValue' => null)) ?> 1</label>
            <label class="checkbox inline"><?php echo $form->checkbox($model, 'room_number[]', array('value' => 2, 'uncheckValue' => null)) ?> 2</label>
            <label class="checkbox inline"><?php echo $form->checkbox($model, 'room_number[]', array('value' => 3, 'uncheckValue' => null)) ?> 3</label>
            <label class="checkbox inline"><?php echo $form->checkbox($model, 'room_number[]', array('value' => 4, 'uncheckValue' => null)) ?> 4</label>
            <label class="checkbox inline"><?php echo $form->checkbox($model, 'room_number[]', array('value' => 5, 'uncheckValue' => null)) ?> 5+</label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Общая площадь</label>

        <div class="controls">
            <?php echo $form->textField($model, 'square[]', array('class' => 'span1', 'placeholder' => 'мин')) ?>
            &mdash;
            <?php echo $form->textField($model, 'square[]', array('class' => 'span1', 'placeholder' => 'макс')) ?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                    Выбрать жилой комплекс
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php $this->widget('ContainerListWidget', array(
                        'itemView' => 'containerWidget/_dropdown_item'
                    )) ?>
                </ul>
            </div>
        </div>
    </div>

</fieldset>

<?php $this->endWidget(); ?>