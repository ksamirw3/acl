<?php

/**
 * This is the model class for table "news_lang".
 *
 * The followings are the available columns in table 'news_lang':
 * @property integer $id
 * @property integer $news_id
 * @property string $language
 * @property string $title
 * @property string $description
 * 
 * 
 * @property News $news
 */
class NewsLang extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news_lang';
    }

    public function afterFind() {
        $this->title = html_entity_decode($this->title);
        $this->description = html_entity_decode($this->description);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//			array('news_id, language, title, description', 'required'),
//                        array('news_id', 'required', 'message' => Yii::t('strings', 'news_idValidate')),
            array('news_id', 'numerical', 'integerOnly' => true),
            array('language', 'required', 'message' => Yii::t('strings', 'languageValidate')),
            array('language', 'length', 'max' => 6),
            array('title', 'length', 'max' => 255),
            array('title', 'required', 'message' => Yii::t('strings', 'titleValidate')),
            array('description', 'required', 'message' => Yii::t('strings', 'descriptionValidate')),
            array('language, title, description', 'filter', 'filter' => array(new CHtmlPurifier(), 'purify')),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, news_id, language, title, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'news' => array(self::BELONGS_TO, 'news', 'news_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('strings', 'ID'),
            'news_id' => 'News',
            'language' => 'Language',
            'title' => Yii::t('strings', 'Title'),
            'description' => Yii::t('strings', 'Description'),
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
        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('language', $this->language, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NewsLang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
