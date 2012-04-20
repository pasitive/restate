<?php

class m120415_201008_apartment_files_create extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('apartment_file', array(
            'apartment_id' => self::MYSQL_TYPE_INT,
            'file' => 'string NOT NULL',
        ));

        $this->addForeignKey('apartment_file_apartment_id', 'apartment_file', 'apartment_id', 'apartment', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('apartment_file_apartment_id', 'apartment_file');

        $this->dropTable('apartment_file');
    }
}