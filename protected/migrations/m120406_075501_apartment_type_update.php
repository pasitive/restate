<?php

class m120406_075501_apartment_type_update extends CDbMigration
{
    public function up()
    {
        $this->addColumn('apartment_type', 'container', 'tinyint(1) DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('apartment_type', 'container');
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