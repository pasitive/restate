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


class MapWidget extends CWidget
{

    public $zoom = 10;

    public $lat = 55.755768;

    public $lng = 37.617671;

    public $width = '100%';

    public $height = '300px';

    public function init()
    {
        $basePath = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.admin.assets'), false, -1, YII_DEBUG);
        Yii::app()->clientScript->registerScriptFile($basePath . '/googleMapLib.js', CClientScript::POS_HEAD);
    }

    public function run()
    {
        $this->render('map', array(
            'width' => $this->width,
            'height' => $this->height,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'zoom' => $this->zoom,
        ));
    }
}
