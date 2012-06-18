<?php

class m120618_095303_apartment_update extends DbMigration
{
    public function up()
    {
        $this->addColumn('apartment', 'user_id', self::MYSQL_TYPE_INT);
        $this->addColumn('apartment', 'is_published', 'tinyint(1) DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('apartment', 'user_id');
        $this->dropColumn('apartment', 'is_published');
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