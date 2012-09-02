<?php

class UrlManager extends CUrlManager
{

    public function init()
    {
        if (count(Yii::app()->params['languages']) > 1) {
            // Multilanguage
            $langPattern = implode('|', array_keys(Yii::app()->params['languages']));
            $rules = array();
            foreach ($this->rules as $pattern => $rule) {

                if (($char = mb_substr($pattern, 0, 1)) === '/') {
                    $pattern = mb_substr($pattern, 1);
                }

                $rules['<language:' . $langPattern . '>/' . $pattern] = $rule;
            }

            $rules['<language:' . $langPattern . '>'] = Yii::app()->defaultController;

            $this->rules = $rules;
        }
        parent::init();
    }

    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        if (count(Yii::app()->params['languages']) > 1) {
            if (!isset($params['language'])) {
                if (Yii::app()->user->hasState('language'))
                    Yii::app()->language = Yii::app()->user->getState('language');
                else if (isset(Yii::app()->request->cookies['language']))
                    Yii::app()->language = Yii::app()->request->cookies['language']->value;
                $params['language'] = Yii::app()->language;
            }
        }

        return parent::createUrl($route, $params, $ampersand);
    }

    public function parseUrl($request)
    {
        $result = parent::parseUrl($request);

        if (count(Yii::app()->params['languages']) > 1) {
            if (isset($_GET['language']) && in_array($_GET['language'], Yii::app()->params['languages'])) {
                Yii::app()->language = $_GET['language'];
            }
        }
        return $result;
    }
}
