<?php

class RouteableBehavior extends CActiveRecordBehavior
{
    public $controller;

    public function afterSave()
    {
        $params = array(
            'routeable_controller' => $this->controller,
            'routeable_action' => 'view',
            'routeable_id' => $this->getOwner()->id
        );

        Route::model()->deleteAllByAttributes($params);

        if ($this->getOwner()->routeable_pattern) {
            $route = new Route();
            $route->attributes = array(
                'routeable_controller' => $this->controller,
                'routeable_action' => 'view',
                'routeable_id' => $this->getOwner()->id,
                'pattern' => $this->getOwner()->routeable_pattern,
                'keywords' => $this->getOwner()->routeable_keywords,
                'description' => $this->getOwner()->routeable_description,
                'title' => $this->getOwner()->routeable_title
            );
            $route->save();
        }
    }

    public function afterFind()
    {
        $key = 'route_' . $this->controller . 'view' . $this->getOwner()->id;

        $route = Yii::app()->cache->get($key);

        if ($route == false) {
            $params = array(
                'routeable_controller' => $this->controller,
                'routeable_action' => 'view',
                'routeable_id' => $this->getOwner()->id
            );

            $route = Route::model()->findByAttributes($params);
            if (!$route) {
                $route = new Route();
                $route->attributes = $params;
            }
        }

        if ($route) {
            $this->getOwner()->routeable_pattern = $route->pattern;
            $this->getOwner()->routeable_keywords = $route->keywords;
            $this->getOwner()->routeable_description = $route->description;
            $this->getOwner()->routeable_title = $route->title;
            Yii::app()->cache->set($key, $route, 86400);
        }
    }
}
