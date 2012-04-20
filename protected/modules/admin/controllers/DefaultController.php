<?php

class DefaultController extends Controller
{
    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = Yii::createComponent('admin.models.LoginForm');

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->createUrl('admin/default/index'));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->createUrl('admin/default/index'));
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}