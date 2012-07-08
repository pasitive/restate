<?php

class m120708_200034_apartment_update extends CDbMigration
{
    public $columns = array(
        'flat_number',
        'number_of_storeys',
        'ceiling_height',
    );

    public function up()
    {
        foreach ($this->columns as $column) {
            $this->addColumn('apartment', $column, 'string');
        }
    }

    public function down()
    {
        foreach ($this->columns as $column) {
            $this->dropColumn('apartment', $column);
        }
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