<?php

class m120624_100611_apartment_attribute_update extends CDbMigration
{
    public function up()
    {
        $this->addColumn('apartment_attribute', 'attribute_name', 'string');
    }

    public function down()
    {
        $this->dropColumn('apartment_attribute', 'attribute_name');
    }
}