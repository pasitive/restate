<?php

class m120314_181519_apartment_metro_id extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'metro_id', 'int UNSIGNED DEFAULT NULL');
        $this->addForeignKey('apartment_metro_id', 'apartment', 'metro_id', 'metro_station', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'metro_id');
    }
}