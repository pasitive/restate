<?php

class UrlManager extends CUrlManager
{
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
        parent::init();
    }
}