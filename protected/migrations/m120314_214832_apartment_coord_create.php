<?php

class m120314_214832_apartment_coord_create extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->addColumn('apartment', 'lng', 'VARCHAR(25)');
        $this->addColumn('apartment', 'lat', 'VARCHAR(25)');
        $this->addColumn('apartment', 'rating', 'tinyint(4)');
        $this->addColumn('apartment', 'address', 'string');

        $this->createIndex('apartment_lng', 'apartment', 'lng');
        $this->createIndex('apartment_lat', 'apartment', 'lat');
    }

    public function safeDown()
    {
        $this->dropColumn('apartment', 'lng');
        $this->dropColumn('apartment', 'lat');
        $this->dropColumn('apartment', 'rating');
        $this->dropColumn('apartment', 'address');
    }
}