<?php

/**
 * This is the model class for table "metro_station".
 *
 * The followings are the available columns in table 'metro_station':
 * @property string $id
 * @property string $name
 * @property string $city_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $apartment_count
 *
 * The followings are the available model relations:
 * @property City $city
 */
class MetroStation extends CActiveRecord
{

    public function scopes()
    {
        return array(
            'hasApartments' => array(
                'condition' => 'apartment_count>0'
            ),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @return MetroStation the static model class
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
        return 'metro_station';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, city_id', 'required'),
            array('name', 'length', 'max' => 255),
            array('city_id', 'length', 'max' => 10),
            array('created_at, updated_at, apartment_count', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, city_id, created_at, updated_at', 'safe', 'on' => 'search'),
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
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'apartments' => array(self::HAS_MANY, 'Apartment', 'metro_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('common', 'id'),
            'name' => Yii::t('apartment', 'metro'),
            'city_id' => Yii::t('apartment', 'city'),
            'created_at' => Yii::t('common', 'created_at'),
            'updated_at' => Yii::t('common', 'updated_at'),
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
        $criteria->compare('city_id', $this->city_id, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}