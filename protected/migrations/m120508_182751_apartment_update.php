<?php

class m120508_182751_apartment_update extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'apartment_count', 'int UNSIGNED NOT NULL DEFAULT 0');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'apartment_count');
    }
}