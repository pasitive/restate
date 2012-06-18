<?php

class ApartmentController extends Controller
{

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'create', 'view', 'update'),
                'roles' => array('createApartment', 'viewApartment', 'updateApartment'),
            ),
            array('allow',
                'actions' => array('delete'),
                'roles' => array('manageApartment'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type)
    {
        $model = new Apartment();
        $model->type_id = $type;

        $attributes = Attribute::model()->findAllByAttributes(array(
            'apartment_type_id' => $type,
        ), array('index' => 'id'));

        $apartmentAttributes = array();
        foreach ($attributes as $attribute) {
            $apartmentAttributes[$attribute->id] = new ApartmentAttribute();
        }
        $model->apartmentAttributes = $apartmentAttributes;

        if (isset($_POST['Apartment'])) {
            $model->attributes = $_POST['Apartment'];

            if (!empty($_POST['ApartmentAttribute'])) {
                foreach ($apartmentAttributes as $id => $apartmentAttribute) {
                    $apartmentAttribute->attributes = $_POST['ApartmentAttribute'][$id];
                }
                $model->apartmentAttributes = $apartmentAttributes;
            }

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'attributes' => $attributes,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $attributes = Attribute::model()->findAllByAttributes(array(
            'apartment_type_id' => $model->type_id
        ), array('index' => 'id'));

        $apartmentAttributes = $model->getRelated('apartmentAttributes', false, array(
            'index' => 'attribute_id',
        ));

        $attributesDiff = array_diff_key($attributes, $apartmentAttributes);

        foreach ($attributesDiff as $id => $attribute) {
            $apartmentAttributes[$id] = new ApartmentAttribute();
        }

        $model->apartmentAttributes = $apartmentAttributes;

        if (isset($_POST['Apartment'])) {
            $model->attributes = $_POST['Apartment'];

            if (!empty($_POST['ApartmentAttribute'])) {
                foreach ($apartmentAttributes as $id => $apartmentAttribute) {
                    $apartmentAttribute->attributes = $_POST['ApartmentAttribute'][$id];
                }
                $model->apartmentAttributes = $apartmentAttributes;
            }

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'attributes' => $attributes,
            'apartmentAttributes' => $apartmentAttributes,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new Apartment('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Apartment']))
            $model->attributes = $_GET['Apartment'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     * @return Apartment
     */
    public function loadModel($id)
    {
        $model = Apartment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'apartment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGeocode()
    {
        $address = Yii::app()->request->getPost('address');

        Yii::import('ext.EGMap.*');
        $mapClient = new EGMapClient();
        $result = $mapClient->getGeocodingInfo($address);

        echo $result;
    }
}
