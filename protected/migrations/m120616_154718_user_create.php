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
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}