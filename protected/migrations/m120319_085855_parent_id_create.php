<?php

class m120319_085855_parent_id_create extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'parent_id', 'int UNSIGNED DEFAULT 0');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'parent_id');
    }
}