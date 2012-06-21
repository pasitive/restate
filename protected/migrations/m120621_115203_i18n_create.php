<?php

class m120621_115203_i18n_create extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('language', array(
            'code' => 'string NOT NULL',
        ));
        $this->createIndex('language_code', 'language', 'code', $unique = true);
    }

    public function safeDown()
    {
        $this->dropTable('language');
    }
}