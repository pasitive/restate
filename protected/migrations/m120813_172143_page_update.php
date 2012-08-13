<?php

class m120813_172143_page_update extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('page', 'title', 'varchar(255)');
        $this->alterColumn('page', 'name', 'varchar(255) NOT NULL');

        $this->createIndex('page_name', 'page', 'name', $unique = true);
    }

    public function safeDown()
    {
        $this->dropIndex('page_name', 'page');
        $this->alterColumn('page', 'name', 'varchar(255)');
        $this->dropColumn('page', 'title');
    }

}