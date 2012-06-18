<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 */
class User extends CActiveRecord
{

    const ROLE_ADMIN = 'admin';
    const ROLE_PARTNER = 'partner';

    public $newPassword;
    public $confirmPassword;

    public static function getRoles()
    {
        return array(
            self::ROLE_PARTNER => 'Партнер',
            self::ROLE_ADMIN => 'Администратор',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
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
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'on' => 'update'),
            array('username, password', 'required'),
            array('name, username', 'length', 'max' => 255),
            array('password, salt, newPassword', 'length', 'max' => 32),
            array('role', 'length', 'max' => 7),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, username, password, salt, role, created_at, updated_at', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Имя',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль',
            'confirmPassword' => 'Подтверждение пароля',
            'salt' => 'Солька',
            'role' => 'Роль',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
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

    protected function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if ($this->isNewRecord) {
                if (empty($this->salt)) {
                    $this->salt = md5(Yii::app()->securityManager->hashData(microtime(true)));
                }
            }
            return true;
        }

        return false;
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {

            //Если запись новая - солим и хещируем пароль
            if ($this->isNewRecord) {
                $this->salt = md5(Yii::app()->securityManager->getRandomKey());
                $this->password = Yii::app()->securityManager->hashPassword($this->password, $this->salt);
            }

            // Если запись не новая и пароль был изменен
            if (!empty($this->newPassword) && !$this->isNewRecord) {
                $this->salt = md5(Yii::app()->securityManager->getRandomKey());
                $this->password = Yii::app()->securityManager->hashPassword($this->newPassword, $this->salt);
            }

            return true;
        }

        return false;
    }

    protected function afterSave()
    {
        AuthAssignment::model()->deleteAll('userid = :userid', array(':userid' => $this->id));
        Yii::app()->authManager->assign($this->role, $this->id);
        parent::afterSave();
    }

    protected function afterDelete()
    {
        AuthAssignment::model()->deleteAll('userid = :userid', array(':userid' => $this->id));
        parent::afterDelete();
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}