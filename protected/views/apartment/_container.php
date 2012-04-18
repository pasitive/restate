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

    <div class="grid_6 alpha">
        <div class="prepend_left">
            <div class="apartment_description">

                <h5>Параметры жилого комплекса</h5>

                <dl class="dots clearfix">

                    <?php foreach ($model->apartmentAttributes as $apartmentAttribute): ?>
                    <?php if (!empty($apartmentAttribute->value)): ?>
                        <dt><?php echo $apartmentAttribute->attribute->name ?></dt>
                        <dd><?php echo $apartmentAttribute->value ?></dd>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </dl>

            </div>
        </div>
    </div>

    <div class="grid_6 omega">

        <h5>Описание</h5>

        <p>Дом представляет собой «деревянный фахверк» — тип строительной конструкции,
            при котором несущей основой служат расположенные под различными углами
            балки из древесины хвойных пород. Фахверк появился в XV веке в Германии и
            стал очень популярным в Европе, особенно в северной части (от Бретани до Польши).
            Наиболее древним из дошедших до нас деревянных зданий каркасной конструкции является храм в
            Японии,
            построенный из кедра свыше 1300 лет назад.</p>

        <div class="space"></div>

    </div>


</div>

<?php if ($apartmentDataProvider->totalItemCount > 0) : ?>
<div class="grid_12 alpha omega">

    <div class="prepend_top prepend_left">
        <div class="offers grid_7 alpha">
            <h5>Доступные объекты</h5>
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

                <script type='text/javascript'>
                	var vb_widget_params = {
                		authKey: 'f709dc0a-b911-44cb-bc9f-b50be119b93e',
                		apiConfUrl: 'http://api.mysitecalls.me/conference.json',
                		apiConfChecksum: 'ed606d235bf96ec04ab670b0bc719b55',
                		apiStatusUrl: 'http://api.mysitecalls.me/status.json',
                		apiStatusChecksum: 'ed606d235bf96ec04ab670b0bc719b55',
                		apiLineUrl: 'http://api.mysitecalls.me/line.json',
                		apiLineChecksum: 'ed606d235bf96ec04ab670b0bc719b55',
                		staticDir: 'http://api.mysitecalls.me/static',
                		width: '200px',
                		h_bg: '#333',
                		h_color: '#FFF',
                		border_block_color: '#CCC',
                		text_color: '#333',
                		border_input_color: '#777',
                		button_bg: '#333',
                		button_color: '#FFF',
                		handset: 'white'
                	};
                </script>
                <script type='text/javascript' src='http://api.mysitecalls.me/static/jquery-1.6.1.min.js'></script>
                <script type='text/javascript' src='http://api.mysitecalls.me/static/jquery.example.min.js'></script>
                <script type='text/javascript' src='http://api.mysitecalls.me/static/vb_widget_ru.js'></script>
                <script type='text/javascript' src='http://api.mysitecalls.me/static/vb_widget.js'></script>

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