<?php

/**
 * This is the model class for table "apartment_type".
 *
 * The followings are the available columns in table 'apartment_type':
 * @property string $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property int $container
 * @property int $is_filter
 *
 * The followings are the available model relations:
 * @property Apartment[] $apartments
 * @property Attribute[] $attributes
 */
class ApartmentType extends CActiveRecord
{

    public function getIcon()
    {
        return $this->container ? 'key_gold' : 'key_grey';
    }

    public function scopes()
    {
        return array(
            'container' => array(
                'condition' => 't.container=1',
            ),
            'is_filter' => array(
                'condition' => 't.is_filter=1',
            ),

        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @return ApartmentType the static model class
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
        return 'apartment_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            array('container, is_filter', 'numerical', 'integerOnly' => true),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, created_at, updated_at', 'safe', 'on' => 'search'),
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
            'apartments' => array(self::HAS_MANY, 'Apartment', 'type_id'),
            //'attributes' => array(self::HAS_MANY, 'Attribute', 'apartment_type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Тип объекта',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'container' => 'Контейнер',
            'is_filter' => 'Фильтр',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


    public static function getAdminCMenuItems()
    {
        $cacheDependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_type');
        $model = self::model()->cache(3600, $cacheDependency)->findAll();

        $items = array();
        foreach ($model as $index => $type) {
            $items[] = array('label' => $type->name, 'url' => array('/admin/apartment/create', 'type' => $type->id));
        }
        return $items;
    }

    public function loadAll()
    {
        $cacheDependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_type');
        $model = ApartmentType::model()->cache(3600, $cacheDependency)->findAll();
        return $model;
    }
}