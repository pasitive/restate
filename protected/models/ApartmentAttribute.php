<?php

/**
 * This is the model class for table "apartment_attribute".
 *
 * The followings are the available columns in table 'apartment_attribute':
 * @property string $id
 * @property string $apartment_id
 * @property string $attribute_id
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 *
 * @property string $attribute_name
 *
 * The followings are the available model relations:
 * @property Attribute $attribute
 * @property Apartment $apartment
 */
class ApartmentAttribute extends CActiveRecord
{

    public function defaultScope()
    {
        return $this->multilingual->localizedCriteria();
    }

    public function getAttributeName()
    {
        return (empty($this->attribute_name) ? $this->attribute->name : $this->attribute_name);
    }

    /**
     * Returns the static model of the specified AR class.
     * @return ApartmentAttribute the static model class
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
        return 'apartment_attribute';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('apartment_id, attribute_id', 'required'),
            array('apartment_id, attribute_id', 'length', 'max' => 10),
            array('value, attribute_name', 'length', 'max' => 255),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, apartment_id, attribute_id, value, created_at, updated_at', 'safe', 'on' => 'search'),
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
            'attribute' => array(self::BELONGS_TO, 'Attribute', 'attribute_id'),
            'apartment' => array(self::BELONGS_TO, 'Apartment', 'apartment_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('common', 'id'),
            'apartment_id' => Yii::t('apartment', 'apartment'),
            'attribute_id' => Yii::t('attribute', 'attribute'),
            'value' => Yii::t('attribute', 'value'),
            'created_at' => Yii::t('common', 'created_at'),
            'updated_at' => Yii::t('common', 'updated_at'),
            'attribute_name' => Yii::t('attribute', 'name'),
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
            ),
            'multilingual' => array(
                'class' => 'application.models.behaviors.MultilingualBehavior',
                'langClassName' => 'ApartmentAttributeI18n',
                'langTableName' => 'apartment_attribute_i18n',
                'langForeignKey' => 'apartment_attribute_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('value', 'attribute_name'), //attributes of the model to be translated
                'localizedPrefix' => 'i18n_',
                'languages' => Yii::app()->params['languages'], // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
                'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
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
        $criteria->compare('apartment_id', $this->apartment_id, true);
        $criteria->compare('attribute_id', $this->attribute_id, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}