<?php

class m120424_130720_metro_update extends CDbMigration
{
    public function up()
    {
        $this->addColumn('metro_station', 'apartment_count', 'integer DEFAULT 0');
        $this->createIndex('metro_station_apartment_count', 'metro_station', 'apartment_count');
    }

    public function down()
    {
        $this->dropIndex('metro_station_apartment_count', 'metro_station');
        $this->dropColumn('metro_station', 'apartment_count');
    }

    /*
     // Use safeUp/safeDown to do migration with transaction
     public function safeUp()
     {
     }

     public function safeDown()
     {
     }
     */
}