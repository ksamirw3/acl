<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $active
 * @property integer $is_superadmin
 * @property string $name 
 * @property string $email
 *
 * The followings are the available model relations:
 * @property UserCache[] $userCaches
 * @property UserHasUserRole[] $userHasUserRoles
 * @property UserHasUserTask[] $userHasUserTasks
 */
class Users extends CActiveRecord {
    public $roleIDs = array();
    public $roleNames = array();
    
    const SALT = 'nlf8BlbU6nsd947haoNwq2Opjhy5nm';
        public $oldPass;
        public $repeat_password;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }
    
    public function afterFind() {
        
        $this->oldPass = $this->password;
        $this->repeat_password = $this->password;
        
        if (!empty($this->roles)) {
            foreach ($this->roles as $role) {
                $this->roleIDs[] = $role->code;
                $this->roleNames[] = $role->name;
            }
        }
        
    }
    
    public function behaviors() {
        return array('CAdvancedArBehavior' => array(
                'class' => 'application.extensions.CAdvancedArBehavior.CAdvancedArBehavior'));
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('is_superadmin', 'numerical', 'integerOnly' => true,
                'message' => Yii::t('strings', '{attribute} integerOnlyValidate')),
            
//            array('login, password, repeat_password', 'required'),
            
            
            array('login', 'required', 'message' => Yii::t('strings', 'loginValidate')),
            array('name', 'required', 'message' => Yii::t('strings', 'nameValidate')),
            
            array('email', 'required', 'message' => Yii::t('strings', 'emailEmpty')),
            array('email', 'email', 'message' => Yii::t('strings', 'emailValidate')),
            
            array('password', 'required', 'message' => Yii::t('strings', 'passwordValidate')),
            array('repeat_password', 'required', 'message' => Yii::t('strings', 'repeatValidate')),
            
            array('login, password, repeat_password, active, name', 'length', 'max' => 50),
            array('password', 'compare', 'compareAttribute'=>'repeat_password', 'message' => Yii::t('strings', 'repeatValidate')),
            
            array('roleIDs', 'required', 'message' => Yii::t('strings', 'emptyRole')),
            array('roleIDs', 'limitSelect','min'=>1,'max'=>10),
            
            array('login, name, email, roleIDs, active','filter','filter'=>array(new CHtmlPurifier(),'purify')),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, login, password, active, is_superadmin', 'safe', 'on' => 'search'),
        );
    }
    
    public function limitSelect($attribute,$params){
        if(count($attribute) < $params['min'])
           $this->addError($attribute,'select at least one');
        if(count($attribute) > $params['max'])
            $this->addError($attribute,' cant select more than 10');
        
//        CModel::addError($attribute, 'user in order still '.$models[0]->to_date);
}

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roles' => array(self::MANY_MANY, 'UserRole', 'user_has_user_role(user_id, user_role_code)'),
            'userCaches' => array(self::HAS_MANY, 'UserCache', 'user_id'),
            'userHasUserRoles' => array(self::HAS_MANY, 'UserHasUserRole', 'user_id'),
            'userHasUserTasks' => array(self::HAS_MANY, 'UserHasUserTask', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('strings', 'id'),
            'name' => Yii::t('strings', 'name'),
            'email' => Yii::t('strings', 'email'),
            'login' => Yii::t('strings', 'login'),
            'password' => Yii::t('strings', 'password'),
            'active' => Yii::t('strings', 'active'),
            'is_superadmin' => Yii::t('strings', 'is_superadmin'),
            'roleIDs' => Yii::t('strings', 'roleIDs'),
            'repeat_password' => Yii::t('strings', 'repeat_password'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('is_superadmin', $this->is_superadmin);
//        $criteria->with = array('roles');
//        $criteria->compare('roles.code', $this->id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

   public function beforeSave() {
        parent::beforeSave();
        
        if ($this->oldPass != $this->password) 
            $this->password = self::getHashedPassword($this->password);
        
     return true;
    }
    
    public static function getHashedPassword($password)
        {
                return md5($password.self::SALT);
        }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
