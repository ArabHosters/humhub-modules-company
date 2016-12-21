<?php

/**
 * This is the model class for table "candidates".
 *
 * The followings are the available columns in table 'candidates':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact_num
 * @property integer $job_vacancy
 * @property string $comment
 * @property string $date_of_application
 */
class Candidates extends HActiveRecordContent {

    public $autoAddToWall = false;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'candidates';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name, last_name, email, contact_num, job_vacancy, comment, date_of_application', 'required'),
            array('job_vacancy', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, email, contact_num', 'length', 'max' => 150),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, first_name, last_name, email, contact_num, job_vacancy, comment, date_of_application', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'vacancy' => array(self::BELONGS_TO, 'Vacancy', 'job_vacancy'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'contact_num' => 'Contact Num',
            'job_vacancy' => 'Job Vacancy',
            'comment' => 'Comment',
            'date_of_application' => 'Date Of Application',
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
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('contact_num', $this->contact_num, true);
        $criteria->compare('job_vacancy', $this->job_vacancy);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('date_of_application', $this->date_of_application, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Candidates the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
