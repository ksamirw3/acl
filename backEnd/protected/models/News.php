<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $image
 * 
 * 
 * @property NewsLang[] $newsLang
 */
class News extends CActiveRecord {

    public $deleteImg = '';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    protected function beforeValidate() {
//        $p = new CHtmlPurifier();
//        $p->options = array('URI.AllowedSchemes' => array(
//                'http' => true,
//                'https' => true,
//        ));
//        $text = $p->purify($text);
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
//        exit;
        return parent::beforeValidate();
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('image', 'required', 'message' => Yii::t('strings', 'imageValidate')),
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'message' => Yii::t('strings', 'imageValidate')),
            array('image', 'length', 'max' => 200),
            array('image, deleteImg', 'filter', 'filter' => array(new CHtmlPurifier(), 'purify')),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, image, deleteImg', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'newsLang' => array(self::HAS_MANY, 'NewsLang', 'news_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('strings', 'ID'),
            'image' => Yii::t('strings', 'Image'),
            'deleteImg' => Yii::t('strings', 'DeleteImg'),
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function deleteImage() {
//        $image_path = Yii::app()->getBasePath().'/../../uploads/'.$this->image;
//         $image_path = Yii::app()->baseUrl.'/uploads/'.$this->image;
//        unlink($image_path);
        if($this->image){
            unlink(Yii::app()->basePath . '/../upload/'.$this->image);
        }
    }

    protected function afterDelete() {
        parent::afterDelete();
        $this->deleteImage();
    }

}
