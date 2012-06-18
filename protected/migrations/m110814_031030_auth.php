<?php

class m110814_031030_auth extends CDbMigration
{
    public function safeUp()
    {
        $db = Yii::app()->db;
        
        $db->createCommand('drop table if exists auth_assignment')->execute();
        $db->createCommand('drop table if exists auth_item_child')->execute();
        $db->createCommand('drop table if exists auth_item')->execute();

        $this->createTable('auth_item',
                           array(
                                'name' => 'varchar(64) not null',
                                'type' => 'integer not null',
                                'description' => 'text',
                                'bizrule' => 'text',
                                'data' => 'text',
                                'primary key (name)'
                           ));

        $this->createTable('auth_item_child',
                           array(
                                'parent' => 'varchar(64) not null',
                                'child' => 'varchar(64) not null',
                                'primary key (parent,child)'
                           ));
        $this->addForeignKey('auth_item_child_parent_auth_item', 'auth_item_child', 'parent', 'auth_item', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('auth_item_child_child_auth_item', 'auth_item_child', 'child', 'auth_item', 'name', 'CASCADE', 'CASCADE');

        $this->createTable('auth_assignment',
                           array(
                                'itemname' => 'varchar(64) not null',
                                'userid' => 'varchar(64) not null',
                                'bizrule' => 'text',
                                'data' => 'text',
                                'primary key (itemname,userid)'
                           ));
        $this->addForeignKey('auth_assignment_itemname', 'auth_assignment', 'itemname', 'auth_item', 'name', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropForeignKey('auth_item_child', 'auth_item_child_parent_auth_item');
        $this->dropForeignKey('auth_item_child', 'auth_item_child_child_auth_item');
        $this->dropForeignKey('auth_item_child', 'auth_assignment_itemname');

        $this->dropTable('auth_assignment');
        $this->dropTable('auth_item_child');
        $this->dropTable('auth_item');
    }
}