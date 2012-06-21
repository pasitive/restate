<?php

class m120621_142238_i18n_attribute_create extends DbMigration
{

    public $keyField = 'i18n_id';

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('attribute_i18n', array(
            'attribute_id' => self::MYSQL_TYPE_INT,
            'language_code' => 'varchar(6) NOT NULL',
            'name' => 'string NOT NULL',
        ));
        $this->addForeignKey('attribute_i18n_attribute_id', 'attribute_i18n', 'attribute_id', 'attribute', 'id', 'CASCADE', 'RESTRICT');

    }

    public function safeDown()
    {
        $this->dropForeignKey('attribute_i18n_attribute_id', 'attribute_i18n');
        $this->dropTable('attribute_i18n');
    }

}