<?php

class m120524_091027_apartment_update extends CDbMigration
{
	public function up()
	{
        $this->addColumn('apartment', 'parent_name', 'string');
	}

	public function down()
	{
		$this->dropColumn('apartment', 'parent_name');
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