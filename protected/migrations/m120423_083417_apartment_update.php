<?php

class m120423_083417_apartment_update extends CDbMigration
{
	public function up()
	{
        $this->addColumn('apartment', 'description', 'text');
	}

	public function down()
	{
		$this->dropColumn('apartment', 'description');
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