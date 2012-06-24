<?php

class m120624_103845_apartment_attribute_i18n extends DbMigration
{

    protected $keyField = 'i18n_id';

    public function safeUp()
    {
        $this->createTable('apartment_attribute_i18n', array(
            'apartment_attribute_id' => self::MYSQL_TYPE_INT,
            'language_code' => 'varchar(6) NOT NULL',
            'i18n_value' => 'string NOT NULL',
            'i18n_attribute_name' => 'string NOT NULL',
        ));
        $this->addForeignKey('apartment_attribute_i18n_apartment_attribute_id', 'apartment_attribute_i18n', 'apartment_attribute_id', 'apartment_attribute', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('apartment_attribute_i18n_apartment_attribute_id', 'apartment_attribute_i18n');
        $this->dropTable('apartment_attribute_i18n');
    }

}