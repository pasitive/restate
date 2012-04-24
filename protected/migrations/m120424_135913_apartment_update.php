<?php

class m120424_135913_apartment_update extends CDbMigration
{
	public function up()
	{
        $this->addColumn('apartment', 'is_rent', 'tinyint(1) DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('apartment', 'is_rent');
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