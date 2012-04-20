<?php

class m120420_093654_news_create extends DbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('news', array(
            'title' => 'string NOT NULL',
            'teaser' => 'string NOT NULL',
            'content' => 'text NOT NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('news');
    }
}