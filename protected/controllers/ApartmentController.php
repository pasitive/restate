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
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array(
            'container' => 0,
        ));
        $criteria->order = 'created_at DESC';
        $model->setDbCriteria($criteria);

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_type');
        $apartmentTypes = ApartmentType::model()->is_filter()->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAll();

        if (isset($_GET['Apartment'])) {
            $model->attributes = $_GET['Apartment'];
        }

        $this->render('index', array(
            'model' => $model,
            'apartmentTypes' => $apartmentTypes,
        ));
    }

    public function actionView($id)
    {
        $this->layout = '//layouts/column1';

        Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU');

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
        $apartmentAttributes = ApartmentAttribute::model()->with('attribute')->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_file WHERE apartment_id = ' . intval($model->id));
        $apartmentFiles = ApartmentFile::model()->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));


        $contactForm = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $contactForm->attributes = $_POST['ContactForm'];
            if ($contactForm->validate()) {
                $headers = "From: {$contactForm->email}\r\nReply-To: {$contactForm->email}";
                mail(Yii::app()->params['adminEmail'], $contactForm->subject, $contactForm->body, $headers);
                Yii::app()->user->setFlash('contact', 'Спасибо за запрос. Мы обязательно свяжемся с Вами в ближайшее время');
                $this->refresh();
            }
        }

        $this->render('view', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
            'apartmentAttributes' => $apartmentAttributes,
            'apartmentFiles' => $apartmentFiles,
            'contactForm' => $contactForm,
        ));
    }
}
