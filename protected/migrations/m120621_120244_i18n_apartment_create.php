<?php

class m120621_120244_i18n_apartment_create extends DbMigration
{
    protected $keyField = 'i18n_id';

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('apartment_i18n', array(
            'apartment_id' => self::MYSQL_TYPE_INT,
            'language_code' => 'varchar(6) NOT NULL',
            'i18n_name' => 'string NOT NULL',
            'i18n_type_name' => 'string NOT NULL',
            'i18n_parent_name' => 'string NOT NULL',
            'i18n_area_name' => 'string NOT NULL',
            'i18n_city_name' => 'string NOT NULL',
        ));
        $this->addForeignKey('apartment_i18n_apartment_id', 'apartment_i18n', 'apartment_id', 'apartment', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('apartment_i18n_apartment_id', 'apartment_i18n');
    }
}