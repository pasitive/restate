<?php

/**
 * This is the model class for table "apartment".
 *
 * The followings are the available columns in table 'apartment':
 * @property string $id
 * @property string $name
 * @property string $city_id
 * @property string $area_id
 * @property string $type_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $lng
 * @property string $lat
 * @property int $rating
 * @property int $parent_id
 * @property int $is_special
 * @property int $metro_id
 * @property string $metro_name
 * @property string $area_name
 * @property string $city_name
 * @property string $type_name
 * @property string $parent_name
 * @property string $default_image
 * @property int $container
 * @property string $description
 * @property string $address
 * @property int $is_rent
 * @property int $apartment_count
 * @property int $user_id
 * @property int $is_published
 *
 * @property string $typeName
 * @property string $cityName
 * @property string $areaName
 * @property string $metroName
 * @property string $parentName
 *
 * @property float $price
 * @property int $room_number
 * @property int $square
 * @property int $square_live
 * @property int $square_kitchen
 * @property int $wc_number
 * @property int $floor
 * @property string $ytvideo_code
 *
 * @property string $flat_number
 * @property string $number_of_storeys
 * @property string $ceiling_height
 *
 * The followings are the available model relations:
 * @property ApartmentType $type
 * @property Area $area
 * @property City $city
 * @property ApartmentAttribute[] $apartmentAttributes
 * @property ApartmentFile[] $apartmentFiles
 */
class Apartment extends CActiveRecord
{
    const PUBLISHED = 1;
    const UNPUBLISHED = 0;

    public $files;
    public $fileType = array('jpg', 'jpeg', 'gif', 'png');
    public $fileSize = array(100, 150, 250, 450);

    public $docs;
    public $docTypes = array('pdf', 'doc', 'docx', 'rtf');

    public $routeable_pattern;
    public $routeable_keywords;
    public $routeable_description;
    public $routeable_title;

    public function defaultScope()
    {
        return $this->multilingual->localizedCriteria();
    }

    public function scopes()
    {
        return array(
            'container' => array(
                'condition' => 'container=1'
            ),

            'standalone' => array(
                'condition' => 'container=0'
            ),

            'published' => array(
                'condition' => 'id_published=1'
            ),
        );
    }

    public function inContainer($id)
    {
        $criteria = $this->getDbCriteria();
        $criteria->addColumnCondition(array(
            'parent_id' => $id,
        ));
        return $this;
    }

    public function getAreaName()
    {
        return (empty($this->area_name) ? $this->area->name : $this->area_name);
    }

    public function getMetroName()
    {
        return (empty($this->metro_name) ? $this->metro->name : $this->metro_name);
    }

    public function getTypeName()
    {
        return (empty($this->type_name) ? $this->type->name : $this->type_name);
    }

    public function getTypeIcon()
    {
        return $this->container ? 'icon-key_gold' : 'icon-key_grey';
    }

    public function getCityName()
    {
        return (empty($this->city_name) ? $this->city->name : $this->city_name);
    }

    public function getParentName()
    {
        return (empty($this->parent_name) ? $this->parent->name : $this->parent_name);
    }


    public function toArray()
    {
        $result = array(
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->cityName,
            'area' => $this->areaName,
            'type' => $this->typeName,
            'metro' => $this->metroName,
            'coord' => array(floatval($this->lat), floatval($this->lng)),
            'lat' => floatval($this->lat),
            'lng' => floatval($this->lng),
            'is_special' => $this->is_special,
            'images' => array(),
            'attributes' => array(),
            'link' => Yii::app()->createUrl('apartment/view', array('id' => $this->id)),
            'default_image' => $this->default_image,
            'apartment_count' => $this->apartment_count,
        );

        return $result;
    }

    public function getTypedApartmentList()
    {
        $cacheDependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment');
        $types = ApartmentType::model()->container()->with('apartments')->cache(DAY_1, $cacheDependency)->findAll();
        $result = array();
        foreach ($types as $type) {
            $result[$type->name] = CHtml::listData($type->apartments, 'id', 'name');
        }
        return $result;
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Apartment the static model class
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
        return 'apartment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('routeable_pattern', 'required'),
            array('routeable_keywords, routeable_description, routeable_title, metro_name, city_name, area_name, type_name, default_image, container, apartment_count, ytvideo_code, parent_name', 'safe'),
            array('price', 'numerical'),
            array('room_number, square, square_live, square_kitchen, wc_number, floor, ceiling_height, flat_number', 'numerical', 'integerOnly' => true),
            array('city_id, area_id, type_id, user_id', 'required'),
            array('name', 'length', 'max' => 255),
            array('city_id, area_id, type_id, metro_id', 'length', 'max' => 10),
            array('created_at, updated_at, lng, lat, rating, address, parent_id, is_special, description, is_rent, is_published, number_of_storeys, ', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, city_id, area_id, type_id, created_at, updated_at, is_special, container', 'safe', 'on' => 'search'),
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
            'type' => array(self::BELONGS_TO, 'ApartmentType', 'type_id'),
            'area' => array(self::BELONGS_TO, 'Area', 'area_id'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'metro' => array(self::BELONGS_TO, 'MetroStation', 'metro_id'),
            'apartmentAttributes' => array(self::HAS_MANY, 'ApartmentAttribute', 'apartment_id'),
            'apartmentFiles' => array(self::HAS_MANY, 'ApartmentFile', 'apartment_id'),
            'parent' => array(self::BELONGS_TO, 'Apartment', 'parent_id'),
            'apartmentCount' => array(self::STAT, 'Apartment', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('common', 'id'),
            'name' => Yii::t('common', 'name'),
            'city_id' => Yii::t('apartment', 'city'),
            'area_id' => Yii::t('apartment', 'area'),
            'metro_id' => Yii::t('apartment', 'metro'),
            'type_id' => Yii::t('apartment', 'type'),
            'address' => Yii::t('apartment', 'address'),
            'lng' => Yii::t('common', 'longitude'),
            'lat' => Yii::t('common', 'latitude'),
            'is_special' => Yii::t('apartment', 'is_special'),
            'parent_id' => Yii::t('apartment', 'parent_id'),
            'created_at' => Yii::t('common', 'created_at'),
            'updated_at' => Yii::t('common', 'updated_at'),
            'description' => Yii::t('apartment', 'description'),
            'is_rent' => Yii::t('apartment', 'is_rent'),
            'is_published' => Yii::t('common', 'is_published'),

            'routeable_title' => Yii::t('seo', 'title'),
            'routeable_keywords' => Yii::t('seo', 'keywords'),
            'routeable_description' => Yii::t('seo', 'description'),

            'price' => Yii::t('common', 'price'),
            'room_number' => Yii::t('apartment', 'room_number'),
            'square' => Yii::t('apartment', 'square'),
            'square_live' => Yii::t('apartment', 'square_live'),
            'square_kitchen' => Yii::t('apartment', 'square_kitchen'),
            'floor' => Yii::t('apartment', 'floor'),
            'wc_number' => Yii::t('apartment', 'wc_number'),

            'ceiling_height' => 'Высота потолков',
            'number_of_storeys' => 'Этажность',
            'flat_number' => 'Кол-во квартир',

            'ytvideo_code' => Yii::t('apartment', 'ytvideo_code'),
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
            'ResourcesBehavior' => array(
                'class' => 'ext.resourcesBehavior.ResourcesBehavior',
                'resourcePath' => Yii::app()->params['uploadDir'],
            ),
            'multilingual' => array(
                'class' => 'application.models.behaviors.MultilingualBehavior',
                'langClassName' => 'ApartmentI18n',
                'langTableName' => 'apartment_i18n',
                'langForeignKey' => 'apartment_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name', 'type_name', 'parent_name', 'area_name', 'city_name'), //attributes of the model to be translated
                'localizedPrefix' => 'i18n_',
                'languages' => Yii::app()->params['languages'], // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
                'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
        );
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            $this->apartment_count = $this->apartmentCount;
            return true;
        }

        return false;
    }

    protected function beforeValidate()
    {
        $valid = false;
        if (parent::beforeValidate()) {

            if (empty($this->metro_id)) {
                $this->metro_id = NULL;
            }

            // Контейнер (ЖК итд) нельзя купить полностью
            if ($this->container == 1) {
                $this->is_rent = 2;
            }

            $valid = true;
            foreach ($this->apartmentAttributes as $apartmentAttribute) {
                $valid = $apartmentAttribute->validate(array('value')) && $valid;
            }
        }
        return $valid;
    }

    protected function afterDelete()
    {
        MetroStation::model()->updateCounters(array(
            'apartment_count' => -1
        ));
    }

    protected function afterSave()
    {
        if ($this->isNewRecord && $this->container == 0) {
            MetroStation::model()->updateCounters(array(
                'apartment_count' => 1
            ));
        }

        if (is_array($this->apartmentAttributes) && count($this->apartmentAttributes) > 0) {
            foreach ($this->apartmentAttributes as $id => $apartmentAttribute) {
                $apartmentAttribute->attributes = array(
                    'apartment_id' => $this->id,
                    'attribute_id' => $id
                );
                $apartmentAttribute->save();
            }
        }

        // Uploads
        $files = CUploadedFile::getInstances($this, 'files');
        if (!empty($files) && is_array($files)) {
            $hash = $this->generatePathHash();
            foreach ($files as $file) {
                $attachment = new ApartmentFile();
                $meta = Common::processImage($attachment, $file, false, $hash);

                foreach ($this->fileSize as $size) {
                    Common::processImage($attachment, $file, $size, $hash);
                }

                $attributes = array(
                    'apartment_id' => $this->id,
                    'file' => $meta['fileName'],
                );

                $attachment->attributes = $attributes;
                $attachment->save();
            }

            if ($meta) {
                Apartment::model()->updateByPk($this->id, array(
                    'default_image' => $attachment->getFile(450),
                ));
            }
        }

        parent::afterSave();
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($options = array())
    {
        $sphinx = unserialize(serialize(Yii::app()->search));

        $query = '';
        $filters = array();

        if (is_numeric($this->city_id)) {
            $filters['city_id'] = intval($this->city_id);
        }

        if (is_numeric($this->type_id)) {
            $filters['type_id'] = intval($this->type_id);
        }

        if (is_numeric($this->metro_id)) {
            $filters['metro_id'] = intval($this->metro_id);
        }

        if (is_numeric($this->area_id)) {
            $filters['area_id'] = intval($this->area_id);
        }

        if (is_numeric($this->wc_number)) {
            $filters['wc_number'] = intval($this->wc_number);
        }

        if (is_numeric($this->floor)) {
            $filters['floor'] = intval($this->floor);
        }

        if (is_numeric($this->is_rent)) {
            $filters['is_rent'] = $this->is_rent;
        }

        if (is_numeric($this->container)) {
            $filters['container'] = $this->container;
        }

        if (is_numeric($this->is_published)) {
            $filters['is_published'] = $this->is_published;
        }

        if (is_numeric($this->is_special)) {
            $filters['is_special'] = $this->is_special;
        }

        // Set filters
        foreach ($filters as $attribute => $value) {
            $sphinx->SetFilter($attribute, (is_array($value) ? $value : array($value)));
        }

        // Range filters
        if (!empty($this->room_number) && is_array($this->room_number)) {
            $range = range(1, 4);
            if (in_array(5, $this->room_number)) {
                $sphinx->SetFilter('room_number', $range, true);
            } else {
                $sphinx->SetFilter('room_number', $this->room_number);
            }
        }

        if (!empty($this->parent_id) && is_array($this->parent_id)) {
            $sphinx->SetFilter('parent_id', $this->parent_id);
        }

        $this->setRangeFilter($sphinx, 'price', $float = true);
        $this->setRangeFilter($sphinx, 'square');
        $this->setRangeFilter($sphinx, 'square_live');
        $this->setRangeFilter($sphinx, 'square_kitchen');

        return new SphinxDataProvider($this, array(
            'sphinx' => $sphinx,
            'index' => 'apartment_core',
        ));
    }

    protected function setRangeFilter(&$sphinx, $attribute, $float = false)
    {
        if (!empty($this->{$attribute}) && is_array($this->{$attribute})) {
            $buf = $this->{$attribute};

            $min = $buf[0];
            $max = $buf[1];

            // Assume that range is empty
            if (empty($min) && empty($max)) {
                return;
            }
            // Assume that min value of range is correct
            if ((empty($min) && !empty($max)) && $max > PHP_INT_MAX) {
                $min = 0;
            }
            // Assume that max value of range is correct
            if ((!empty($min) && empty($max))) {
                $max = PHP_INT_MAX;
            }
            // Assume that min <= max
            if ($min >= $max) {
                $max = $min;
            }

            $min = ($float) ? floatval($min) : intval($min);
            $max = ($float) ? floatval($max) : intval($max);

            if ($float) {
                $sphinx->setFilterFloatRange($attribute, $min, $max);
            } else {
                $sphinx->setFilterRange($attribute, $min, $max);
            }
        }
    }


}