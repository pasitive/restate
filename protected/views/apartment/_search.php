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
    'htmlOptions' => array('class' => 'well', 'style' => 'padding: 8px 15px'),
)); ?>

<fieldset>
    <div class="control-group">
        <div class="controls">
            <label class="radio inline"><input type="radio" name="Apartment[is_rent]" value="">Все</label>
            <label class="radio inline"><input type="radio" name="Apartment[is_rent]" value="1">Снять</label>
            <label class="radio inline"><input type="radio" name="Apartment[is_rent]" value="0">Купить</label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Количество комнат</label>

        <div class="controls">
            <label class="checkbox inline"><input type="checkbox" name="Apartment[room_number][]" value="1"> 1</label>
            <label class="checkbox inline"><input type="checkbox" name="Apartment[room_number][]" value="2"> 2</label>
            <label class="checkbox inline"><input type="checkbox" name="Apartment[room_number][]" value="3"> 3</label>
            <label class="checkbox inline"><input type="checkbox" name="Apartment[room_number][]" value="4"> 4</label>
            <label class="checkbox inline"><input type="checkbox" name="Apartment[room_number][]" value="5"> 5+</label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Общая площадь</label>

        <div class="controls">
            <input class="span1" type="text" name="Apartment[square][]" placeholder="мин">
            &mdash;
            <input class="span1" type="text" name="Apartment[square][]" placeholder="макс">
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