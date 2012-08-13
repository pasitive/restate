<?php

class PageController extends Controller
{

    public $layout = '//layouts/static';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($name)
    {
        $model = Page::model()->findByAttributes(array(
            'name' => $name,
        ));

        if (!$model) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        $this->render('view', array('model' => $model));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->actionView(1);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Page::model()->cache(Yii::app()->params['cache_expire_time'])->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Страница не найдена');
        return $model;
    }
}
