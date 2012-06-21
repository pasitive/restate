<?php

/**
 * This is the model class for table "attribute".
 *
 * The followings are the available columns in table 'attribute':
 * @property string $id
 * @property string $name
 * @property string $apartment_type_id
 * @property integer $disabled
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property int $sort
 *
 * The followings are the available model relations:
 * @property ApartmentAttribute[] $apartmentAttributes
 * @property ApartmentType $apartmentType
 */
class Attribute extends CActiveRecord
{

    public function defaultScope()
    {
        $criteria = $this->multilingual->localizedCriteria();
        $criteria['order'] = 'sort';
        return $criteria;
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Attribute the static model class
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
        return 'attribute';
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
            array('apartment_type_id', 'required'),
            array('disabled, sort', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('apartment_type_id', 'length', 'max' => 10),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, apartment_type_id, disabled, created_at, updated_at', 'safe', 'on' => 'search'),
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
            'apartmentAttributes' => array(self::HAS_MANY, 'ApartmentAttribute', 'attribute_id'),
            'apartmentType' => array(self::BELONGS_TO, 'ApartmentType', 'apartment_type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('common', 'id'),
            'name' => Yii::t('attribute', 'name'),
            'apartment_type_id' => Yii::t('apartment', 'type'),
            'disabled' => Yii::t('attribute', 'disabled'),
            'type' => Yii::t('attribute', 'type'),
            'sort' => Yii::t('attribute', 'sort'),
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
            ),
            'multilingual' => array(
                'class' => 'application.models.behaviors.MultilingualBehavior',
                'langClassName' => 'AttributeI18n',
                'langTableName' => 'attribute_i18n',
                'langForeignKey' => 'attribute_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name'), //attributes of the model to be translated
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('apartment_type_id', $this->apartment_type_id, true);
        $criteria->compare('disabled', $this->disabled);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}