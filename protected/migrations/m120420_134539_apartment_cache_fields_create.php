<?php

class m120420_134539_apartment_cache_fields_create extends CDbMigration
{
    public function up()
    {
        $this->addColumn('apartment', 'metro_name', 'string');
        $this->addColumn('apartment', 'area_name', 'string');
        $this->addColumn('apartment', 'city_name', 'string');
        $this->addColumn('apartment', 'type_name', 'string');
        $this->addColumn('apartment', 'default_image', 'string');
        $this->addColumn('apartment', 'container', 'tinyint(1)');
    }

    public function down()
    {
        $this->dropColumn('apartment', 'metro_name');
        $this->dropColumn('apartment', 'area_name');
        $this->dropColumn('apartment', 'city_name');
        $this->dropColumn('apartment', 'type_name');
        $this->dropColumn('apartment', 'default_image');
        $this->dropColumn('apartment', 'container');
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