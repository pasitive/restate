<?php

class m111122_121719_routes_create extends DbMigration
{
    public function safeUp()
    {
        $this->createTable('route', array(
            'routeable_controller' => 'string',
            'routeable_action' => 'string',
            'routeable_id' => 'integer',
            'pattern' => 'string DEFAULT "/"',
            'keywords' => 'string',
            'description' => 'text',
            'title' => 'string'
        ));

    }

    public function safeDown()
    {
        $this->dropTable('route');
    }
}