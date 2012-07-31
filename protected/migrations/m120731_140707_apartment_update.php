<?php

class m120731_140707_apartment_update extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->alterColumn('apartment', 'floor', 'varchar(255)');
    }

    public function safeDown()
    {
        $this->alterColumn('apartment', 'floor', 'int');
    }

}