<?php

class m120614_114009_param_create extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('app_param', array(
            'name' => 'string NOT NULL',
            'value' => 'string NOT NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('app_param');
    }
}