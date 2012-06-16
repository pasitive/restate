<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 6/15/12
 * Time: 5:25 PM
 * To change this template use File | Settings | File Templates.
 */
class SphinxDataProvider extends CDataProvider
{

    public $keyField = 'id';

    public $index;
    public $sphinx;
    public $model;
    public $modelClass;

    private $_result = null;

    public function __construct($modelClass, $config = array())
    {
        if (is_string($modelClass)) {
            $this->modelClass = $modelClass;
            $this->model = CActiveRecord::model($this->modelClass);
        } else if ($modelClass instanceof CActiveRecord) {
            $this->modelClass = get_class($modelClass);
            $this->model = $modelClass;
        }
        $this->setId($this->modelClass);

        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Fetches the data from the persistent data storage.
     * @return array list of data items
     */
    protected function fetchData()
    {
        // @todo MAKE THIS SHIT HAPPY
        $s = microtime(true);
        $sphinx = unserialize(serialize(Yii::app()->search));
        $sphinx->setLimits(0, 1);
        $this->_result = $sphinx->Query('', $this->index);

        if (($pagination = $this->getPagination()) !== false) {
            $pagination->setItemCount($this->getTotalItemCount());
            $limit = $pagination->getLimit();
            $offset = $pagination->getOffset();
            $this->sphinx->setLimits($offset, $limit);
        }

        $this->_result = $this->sphinx->Query('', $this->index);
        Yii::log('Sphinx search: ' . (microtime(true) - $s), CLogger::LEVEL_TRACE);

        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', array_keys($this->_result['matches']));
        return $this->model->findAll($criteria);
    }

    /**
     * Fetches the data item keys from the persistent data storage.
     * @return array list of data item keys.
     */
    protected function fetchKeys()
    {
        $keys = array();
        foreach ($this->getData() as $i => $data)
            $keys[$i] = $data[$this->keyField];
        return $keys;
    }

    /**
     * Calculates the total number of data items.
     * This method is invoked when {@link getTotalItemCount()} is invoked
     * and {@link totalItemCount} is not set previously.
     * The default implementation simply returns 0.
     * You may override this method to return accurate total number of data items.
     * @return integer the total number of data items.
     */
    protected function calculateTotalItemCount()
    {
        return (int)$this->_result['total'];
    }

}
