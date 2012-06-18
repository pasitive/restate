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
class SpecialOffersWidget extends CWidget
{
    public $options = array();

    private $_dataProvider = null;

    private $_options = array(
        'vertical' => true,
        'apartmentId' => null,
        'max' => 5,
    );

    public function getDataProvider()
    {
        return $this->_dataProvider;
    }

    public function init()
    {
        $this->_options = CMap::mergeArray($this->_options, $this->options);

        $model = new Apartment('search');
        $model->unsetAttributes();

        $model->container = 0;
        $model->is_special = 1;

        if (($apartmentId = $this->_options['apartmentId']) !== null) {
            $model->parent_id = $apartmentId;
        }

        $this->_dataProvider->pagination->pageSize = $this->_options['max'];
        $this->_dataProvider = $model->search();
    }

    public function run()
    {
        $viewData = array(
            'dataProvider' => $this->dataProvider,
        );

        if (($vertical = $this->_options['vertical']) === true) {
            $this->render('specialOffersWidget/vertical/list', $viewData);
        } else {
            $this->render('specialOffersWidget/horizontal/list', $viewData);
        }
    }
}
