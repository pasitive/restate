<?php

class ErrorController extends Controller
{
    public function filters()
    {
        return array();
    }

    public function actionIndex()
    {
        throw new CHttpException(404, 'Not Found');
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }
}