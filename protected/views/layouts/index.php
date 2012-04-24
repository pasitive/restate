<?php $this->beginContent('//layouts/main'); ?>

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

<div id="content" class="grid_12">

    <div class="grid_12 alpha omega">
        <div class="search-form">
            qwe
        </div>
    </div>

    <div class="shadow revert"></div>

    <div class="grid_8 alpha colborder">

        <div id="main_content" class="prepend_left v_splitter">

            <?php echo $content; ?>

        </div>

    </div>

    <div class="grid_4 omega">
        <div id="sidebar">

            <?php $this->widget('SpecialOffersWidget'); ?>

        </div>
    </div>

    <div class="space"></div>
    <div class="shadow"></div>

</div>
<?php $this->endContent(); ?>