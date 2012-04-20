<?php

class m120312_070005_page_create extends DbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('page', array(
            'name' => 'string',
            'body' => 'text'
        ));
    }

    public function safeDown()
    {
        $this->dropTable('page');
    }
}