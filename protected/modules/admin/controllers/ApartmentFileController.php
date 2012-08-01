<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 5/20/12
 * Time: 8:57 PM
 * To change this template use File | Settings | File Templates.
 */
class ApartmentFileController extends Controller
{
    public function filters()
    {
        return array(
            'ajaxOnly'
        );
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
    }

    public function actionDefault($id)
    {
        $model = $this->loadModel($id);

        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array(
            'apartment_id' => $model->apartment_id,
        ));
        ApartmentFile::model()->updateAll(array('is_default' => 0), $criteria);

        Apartment::model()->updateByPk($model->apartment_id, array(
            'default_image' => $model->getFile(),
        ));

        $model->is_default = 1;
        $model->save();
    }

    public function loadModel($id)
    {
        $model = ApartmentFile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
