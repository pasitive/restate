<?php

class m120521_140919_apartment_update extends CDbMigration
{
    public function up()
    {
        $this->addColumn('apartment', 'ytvideo_code', 'string');
    }

    public function down()
    {
        $this->dropColumn('apartment', 'ytvideo_code');
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