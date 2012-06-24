<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 6/22/12
 * Time: 10:19 AM
 * To change this template use File | Settings | File Templates.
 */
class LanguageSelector extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
        $languages = Yii::app()->params->languages;
        $this->render('languageSelector', array('currentLang' => $currentLang, 'languages' => $languages));
    }
}
