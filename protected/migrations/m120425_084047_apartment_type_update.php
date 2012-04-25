<?php

class m120425_084047_apartment_type_update extends CDbMigration
{
	public function up()
	{
        $this->addColumn('apartment_type', 'is_filter', 'tinyint(1)');
	}

	public function down()
	{
		$this->dropColumn('apartment_type', 'is_filter');
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