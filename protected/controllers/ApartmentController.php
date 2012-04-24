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
class ApartmentController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/index';

        $model = new Apartment('search');
        $model->unsetAttributes();

        if (isset($_GET['Apartment'])) {
            $model->attributes = $_GET['Apartment'];
        }

        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionView($id)
    {

        Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU');

        $this->layout = '//layouts/column1';

        $model = Apartment::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        $apartmentDataProvider = null;
        if ($model->container == 1) {
            $criteria = new CDbCriteria();
            $criteria->addColumnCondition(array(
                'parent_id' => $id
            ));

            $apartmentDataProvider = new CActiveDataProvider('Apartment', array(
                'criteria' => $criteria,
            ));
        }

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_attribute WHERE apartment_id = ' . intval($model->id));
        $apartmentAttributes = ApartmentAttribute::model()->with('attribute')->cache(DAY_1, $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_file WHERE apartment_id = ' . intval($model->id));
        $apartmentFiles = ApartmentFile::model()->cache(DAY_1, $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));

        $this->render('view', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
            'apartmentAttributes' => $apartmentAttributes,
            'apartmentFiles' => $apartmentFiles,
        ));
    }
}
