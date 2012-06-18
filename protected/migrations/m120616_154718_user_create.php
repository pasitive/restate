<?php

class m120616_154718_user_create extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('user', array(
            'name' => 'string',
            'username' => 'string NOT NULL',
            'password' => 'VARCHAR(32) NOT NULL',
            'salt' => 'VARCHAR(32) NOT NULL',
            'role' => "ENUM('partner', 'admin')"
        ));

        $user = new User;
        $user->attributes = array(
            'name' => 'Administrator',
            'role' => 'admin',
            'username' => 'admin',
            'password' => 'qqq',
        );
        $user->save();
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}