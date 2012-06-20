<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 6/20/12
 * Time: 11:59 AM
 * To change this template use File | Settings | File Templates.
 */

Yii::import('zii.widgets.jui.CJuiSlider');

class JuiSlider extends CJuiSlider
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
}
