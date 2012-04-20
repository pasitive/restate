<?php

class m120319_094200_special extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'is_special', 'tinyint(4)');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'is_special');
    }
}