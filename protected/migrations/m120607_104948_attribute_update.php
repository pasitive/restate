<?php

class m120607_104948_attribute_update extends CDbMigration
{
    public function up()
    {
        $this->addColumn('attribute', 'sort', 'int DEFAULT 999999');
        $this->createIndex('attribute_sort', 'attribute', 'sort');
    }

    public function down()
    {
        $this->dropColumn('attribute', 'sort');
    }
}