<?php

/**
 * This is the model class for table "route".
 *
 * The followings are the available columns in table 'route':
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $routeable_controller
 * @property string $routeable_action
 * @property integer $routeable_id
 * @property string $pattern
 * @property string $keywords
 * @property string $description
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Widget[] $widgets
 */
class Route extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param $className string
     * @return Route the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'route';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('created_at', 'required'),
            array('routeable_id', 'numerical', 'integerOnly' => true),
            array('routeable_controller, routeable_action, pattern, keywords, title', 'length', 'max' => 255),
            array('updated_at, description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, created_at, updated_at, routeable_controller, routeable_action, routeable_id, pattern, keywords, description, title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'widgets' => array(self::MANY_MANY, 'Widget', 'route_widget(route_id, widget_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'routeable_controller' => 'Routeable Controller',
            'routeable_action' => 'Routeable Action',
            'routeable_id' => 'Routeable',
            'pattern' => 'Pattern',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'title' => 'Title',
        );
    }

    /**
     * @return array behaviors.
     */
    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'updated_at',
                'setUpdateOnCreate' => true
            )
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria();
        $criteria->compare('id', $this->id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('routeable_controller', $this->routeable_controller, true);
        $criteria->compare('routeable_action', $this->routeable_action, true);
        $criteria->compare('routeable_id', $this->routeable_id);
        $criteria->compare('pattern', $this->pattern, true);
        $criteria->compare('keywords', $this->keywords, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('title', $this->title, true);

        return new CActiveDataProvider(get_class($this), array(
                                                                'criteria' => $criteria,
                                                            ));
    }
}