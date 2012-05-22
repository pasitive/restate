<?php

class UrlManager extends CUrlManager
{

    public $languages = array('ru', 'en');

    public function init()
    {
        $oldRules = $this->rules;
        $this->rules = array();
        $dependency = new CDbCacheDependency('SELECT MAX(created_at) FROM route');
        $routes = Route::model()->cache(3600, $dependency)->findAll();

        Yii::app()->cache->set('routes', $routes, 3600, $dependency);

        foreach ($routes as $route) {
            $rule = array($route->routeable_controller . '/' . $route->routeable_action);
            if ($route->routeable_id) {
                $rule['defaultParams'] = array('id' => $route->routeable_id);
            }
            $this->rules[$route->pattern] = $rule;
        }

        $this->rules += $oldRules;

        // Multilanguage
        $langPattern = implode('|', $this->languages);
        $rules = array();
        foreach ($this->rules as $pattern => $rule) {

            if (($char = mb_substr($pattern, 0, 1)) === '/') {
                $pattern = mb_substr($pattern, 1);
            }

            $rules['<language:' . $langPattern . '>/' . $pattern] = $rule;
        }

        $rules['<language:' . $langPattern . '>'] = Yii::app()->defaultController;

        $this->rules = $rules;

        parent::init();
    }

    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        if (!isset($params['language'])) {
            if (Yii::app()->user->hasState('language'))
                Yii::app()->language = Yii::app()->user->getState('language');
            else if (isset(Yii::app()->request->cookies['language']))
                Yii::app()->language = Yii::app()->request->cookies['language']->value;
            $params['language'] = Yii::app()->language;
        }

        return parent::createUrl($route, $params, $ampersand);
    }

    public function parseUrl($request)
    {
        $result = parent::parseUrl($request);
        if (isset($_GET['language']) && in_array($_GET['language'], $this->languages)) {
            Yii::app()->language = $_GET['language'];
        }
        return $result;
    }
}
