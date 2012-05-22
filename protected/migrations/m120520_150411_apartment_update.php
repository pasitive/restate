<?php

class m120520_150411_apartment_update extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'price', 'DECIMAL(20,2) DEFAULT 0');
        $this->addColumn('apartment', 'room_number', 'int UNSIGNED DEFAULT 0');
        $this->addColumn('apartment', 'square', 'int UNSIGNED DEFAULT 0');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'price');
        $this->dropColumn('apartment', 'room_number');
        $this->dropColumn('apartment', 'square');
    }
}