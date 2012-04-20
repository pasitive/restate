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

    public $layout = '//layouts/column1';

    public function actionIndex()
    {
        Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU');

        $cacheDependency = new CDbCacheDependency('SELECT MAX(created_at) FROM apartment');
        $model = Apartment::model()->cache(86400, $cacheDependency)->findAll(array('index' => 'id'));

        /*$files = ApartmentFile::model()->findAllByAttributes(array(
            'apartment_id' => $this->id,
        ));

        foreach ($files as $file) {
            $result['images'][150][] = $file->getFile(150);
            $result['images'][450][] = $file->getFile(450);
        }*/

        $data = array();
        foreach ($model as $apartment_id => $apartment) {
            $data[] = $apartment->toArray();
        }

        $this->render('index', array(
            'data' => $data,
        ));
    }

}
