<?php


class RbacCommand extends CConsoleCommand
{
    /*
     * run console command
     */
    public function run($args)
    {
        parent::run($args);
    }

    /*
     * update action
     */
    public function actionUpdate()
    {
        $db = Yii::app()->db;

        $command = $db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
        $command = $db->createCommand('TRUNCATE auth_assignment');
        $command->execute();

        $command = $db->createCommand('TRUNCATE auth_item_child');
        $command->execute();

        $command = $db->createCommand('TRUNCATE auth_item');
        $command->execute();
        $command = $db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();

        $auth = Yii::app()->authManager;

        // Operations
        $auth->createOperation('createApartment');
        $auth->createOperation('updateApartment');
        $auth->createOperation('viewApartment');
        $auth->createOperation('deleteApartment');
        $auth->createOperation('publishApartment');
        $auth->createOperation('unpublishApartment');

        // Tasks
        $task = $auth->createTask('manageSystem');
        $task = $auth->createTask('manageApartment');
        $task->addChild('createApartment');
        $task->addChild('updateApartment');
        $task->addChild('viewApartment');
        $task->addChild('deleteApartment');
        $task->addChild('publishApartment');
        $task->addChild('unpublishApartment');

        $task = $auth->createTask('manageContent');

        // Права партнера
        $role = $auth->createRole('partner');
        $role->addChild('createApartment');
        $role->addChild('updateApartment');
        $role->addChild('viewApartment');

        // "Папа может, папа может, все что угодно"
        $role = $auth->createRole('admin');
        $role->addChild('manageSystem');
        $role->addChild('manageApartment');
        $role->addChild('manageContent');


        $criteria = new CDbCriteria();
        $criteria->select = array('id', 'role');

        $users = User::model()->findAll($criteria);
        foreach ($users AS $user) {
            $auth->assign($user->role, $user->id);
        }

        $auth->save();
    }


}