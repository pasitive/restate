<?php

class m120801_073545_apartment_file_update extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment_file', 'is_default', 'tinyint(1)');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment_file', 'is_default');
    }
}