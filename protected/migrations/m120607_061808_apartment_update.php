<?php

class m120607_061808_apartment_update extends CDbMigration
{
    private $_columns = array(
        'floor' => 'int DEFAULT 0',
        'square_live' => 'int DEFAULT 0',
        'square_kitchen' => 'int DEFAULT 0',
        'wc_number' => 'int DEFAULT 0',
    );

    public function up()
    {
        foreach ($this->_columns as $name => $type) {
            $this->addColumn('apartment', $name, $type);
        }
    }

    public function down()
    {
        foreach ($this->_columns as $name => $type) {
            $this->dropColumn('apartment', $name);
        }
    }
}