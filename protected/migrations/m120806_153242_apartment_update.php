<?php

class m120806_153242_apartment_update extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->alterColumn('apartment', 'flat_number', 'varchar(255)');
        $this->alterColumn('apartment', 'ceiling_height', 'varchar(255)');
	}

	public function safeDown()
	{
        $this->alterColumn('apartment', 'flat_number', 'int');
        $this->alterColumn('apartment', 'ceiling_height', 'int');
	}
}