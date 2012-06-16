<?php

class m120616_153937_apartment_update extends CDbMigration
{
	public function up()
	{
        $this->createIndex('apartment_price', 'apartment', 'price');
        $this->createIndex('apartment_square', 'apartment', 'square');

	}

	public function down()
	{
        $this->dropIndex('apartment_price', 'apartment');
        $this->dropIndex('apartment_square', 'apartment');
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