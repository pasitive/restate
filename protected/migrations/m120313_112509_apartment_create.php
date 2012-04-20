<?php

class m120313_112509_apartment_create extends DbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('city', array(
            'name' => 'string',
        ));

        $this->createTable('area', array(
            'name' => 'string',
            'city_id' => self::MYSQL_TYPE_INT,
        ));

        $this->addForeignKey('area_city_id', 'area', 'city_id', 'city', 'id', 'CASCADE', 'RESTRICT');

        $this->createTable('metro_station', array(
            'name' => 'string',
            'city_id' => self::MYSQL_TYPE_INT,
        ));

        $this->addForeignKey('metro_station_city_id', 'metro_station', 'city_id', 'city', 'id', 'CASCADE', 'RESTRICT');

        $this->createTable('apartment_type', array(
            'name' => 'string',
        ));

        $this->createTable('attribute', array(
            'name' => 'string',
            'apartment_type_id' => self::MYSQL_TYPE_INT,
            'disabled' => 'tinyint(1)'
        ));

        $this->addForeignKey('attribute_apartment_type_id', 'attribute', 'apartment_type_id', 'apartment_type', 'id', 'CASCADE', 'RESTRICT');

        $this->createTable('apartment', array(
            'name' => 'string',
            'city_id' => self::MYSQL_TYPE_INT,
            'area_id' => self::MYSQL_TYPE_INT,
            'type_id' => self::MYSQL_TYPE_INT,
        ));

        $this->addForeignKey('apartment_city_id', 'apartment', 'city_id', 'city', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('apartment_area_id', 'apartment', 'area_id', 'area', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('apartment_type_id', 'apartment', 'type_id', 'apartment_type', 'id', 'CASCADE', 'RESTRICT');

        $this->createTable('apartment_attribute', array(
            'apartment_id' => self::MYSQL_TYPE_INT,
            'attribute_id' => self::MYSQL_TYPE_INT,
            'value' => 'string',
        ));

        $this->addForeignKey('apartment_attribute_apartment_id', 'apartment_attribute', 'apartment_id', 'apartment', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('apartment_attribute_attribute_id', 'apartment_attribute', 'attribute_id', 'attribute', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        ;
    }
}