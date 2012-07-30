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
class MapController extends Controller
{
//    public $layout = '//layouts/column1';

    public function actionIndex()
    {
        Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU');

        // Load apartment types
        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_type');
        $apartmentTypes = ApartmentType::model()->is_filter()->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAll();

        $model = new Apartment('search');

        // Load containers for map
        $model->unsetAttributes();
        $model->attributes = array(
            'container' => 1,
            'is_published' => Apartment::PUBLISHED,
        );
        $containerDataProvider = $model->search();
        $containerDataProvider->pagination->pageSize = 999;
        $mapData = array();
        foreach ($containerDataProvider->getData() as $apartment) {
            $key = 'apartment_map_data_' . $apartment->id;
            if (($cached = Yii::app()->cache->get($key)) && ($cached = CJSON::decode($cached))) {
                $mapData[] = $cached;
            } else {
                $mapData[] = $apartment->toArray();
                Yii::app()->cache->set($key, CJSON::encode($apartment->toArray()));
            }
        }

        // Load apartments
        $model->unsetAttributes();
        $model->attributes = array(
            'container' => 0,
            'is_published' => Apartment::PUBLISHED,
        );
        $standaloneDataProvider = $model->search();

        $model->unsetAttributes();
        if (isset($_GET['Apartment'])) {
            $model->attributes = $_GET['Apartment'];
        }

        $this->render('index', array(
            'mapData' => $mapData,
            'model' => $model,
            'apartmentTypes' => $apartmentTypes,

            'containerDataProvider' => $containerDataProvider,
            'standaloneDataProvider' => $standaloneDataProvider,
        ));
    }
}
