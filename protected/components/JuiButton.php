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


Yii::import('zii.widgets.jui.CJuiButton');

class JuiButton extends CJuiButton
{
    /**
     * @var string the JUI theme name. Defaults to 'base'. Make sure that under {@link themeUrl} there
     * is a directory whose name is the same as this property value (case-sensitive).
     */
    public $theme = 'base-ui';
    /**
     * @var mixed the theme CSS file name. Defaults to 'jquery-ui.css'.
     * Note the file must exist under the URL specified by {@link themeUrl}/{@link theme}.
     * If you need to include multiple theme CSS files (e.g. during development, you want to include individual
     * plugin CSS files), you may set this property as an array of the CSS file names.
     * This property can also be set as false, which means the widget will not include any theme CSS file,
     * and it is your responsibility to explicitly include it somewhere else.
     */
    public $cssFile = 'custom.css';

    public $themeUrl = '/css';

    public function init()
    {
        $this->themeUrl = Yii::app()->controller->assetsUrl . '/stylesheet';
        parent::init();
    }

    public function getThemeUrl()
    {
        //return Yii::app()->createAbsoluteUrl() . '/stylesheet';
    }
}
