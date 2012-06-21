<?php
/**
 * Created by JetBrains PhpStorm.
 * User: boldinov
 * Date: 6/20/11
 * Time: 1:06 PM
 */

class DbMigration extends CDbMigration
{
    const MYSQL_TYPE_INT = 'int UNSIGNED NOT NULL';

    protected $options = 'engine=InnoDB;';

    protected $keyField = 'id';

    public function createTable($table, $columns, $options = null)
    {
        if ($options != null) {
            $this->options .= $options;
        }

        $columns = CMap::mergeArray(array(
            $this->keyField => 'int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
        ), $columns);

        parent::createTable($table, $columns, $this->options);

        $this->addColumn($table, 'created_at', 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP');
        $this->addColumn($table, 'updated_at', 'TIMESTAMP');
    }
}