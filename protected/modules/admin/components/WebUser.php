<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 6/18/12
 * Time: 12:21 PM
 * To change this template use File | Settings | File Templates.
 */
class WebUser extends CWebUser
{
    private $_model = null;

    function getRole()
    {
        if ($user = $this->getModel()) {
            return $user->role;
        }
    }

    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
}
