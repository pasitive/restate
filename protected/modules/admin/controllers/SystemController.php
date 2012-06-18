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
class SystemController extends Controller
{

    public function accessRules()
    {
        return array(
            array('allow',
                'roles' => array('manageSystem'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionFlushCache()
    {
        if (Yii::app()->cache->flush()) {
            Yii::app()->user->setFlash('success', 'Кеш очищен');
        } else {
            Yii::app()->user->setFlash('error', 'Ошибка очистки кеша');
        }
        $this->redirect(array('/admin/system/index'));
    }

    public function actionUpdateDbCache()
    {
        //metro
        $model = MetroStation::model()->findAll();
        foreach ($model as $metro) {

            $count = Apartment::model()->countByAttributes(array(
                'metro_id' => $metro->id,
                'container' => 0,
            ));

            MetroStation::model()->updateByPk($metro->id, array(
                'apartment_count' => $count
            ));
        }

        Yii::app()->user->setFlash('success', 'Счетчики для станций метро пересчитаны');
        $this->redirect(array('/admin/system/index'));
    }

    public function actionUpdateApartmentCountCache()
    {
        $model = Apartment::model()->container()->findAll();

        foreach ($model as $apartment) {
            $count = Apartment::model()->countByAttributes(array(
                'parent_id' => $apartment->id
            ));

            Apartment::model()->updateByPk($apartment->id, array(
                'apartment_count' => $count,
            ));
        }

        Yii::app()->user->setFlash('success', 'Счетчики для контейнеров пересчитаны');
        $this->redirect(array('/admin/system/index'));
    }

    public function actionIndex()
    {
        $this->render('index');
    }
}
