<?php

/**
 * This is the model class for table "EmployeeLanguages".
 *
 * The followings are the available columns in table 'EmployeeLanguages':
 * @property integer $id
 * @property integer $language_id
 * @property integer $employee
 * @property string $reading
 * @property string $speaking
 * @property string $writing
 * @property string $understanding
 *
 * The followings are the available model relations:
 * @property User $employee0
 * @property Languages $language
 */
class EmployeeLanguages extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'EmployeeLanguages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee', 'required'),
            array('language_id, employee', 'numerical', 'integerOnly' => true),
            array('reading, speaking, writing, understanding', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, language_id, employee, reading, speaking, writing, understanding', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employee0' => array(self::BELONGS_TO, 'User', 'employee'),
            'language' => array(self::BELONGS_TO, 'Languages', 'language_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'language_id' => 'Language',
            'employee' => 'Employee',
            'reading' => 'Reading',
            'speaking' => 'Speaking',
            'writing' => 'Writing',
            'understanding' => 'Understanding',
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
        $criteria->compare('language_id', $this->language_id);
        $criteria->compare('employee', $this->employee);
        $criteria->compare('reading', $this->reading, true);
        $criteria->compare('speaking', $this->speaking, true);
        $criteria->compare('writing', $this->writing, true);
        $criteria->compare('understanding', $this->understanding, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EmployeeLanguages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getOptions() {
        return array(
            'Elementary Proficiency' => 'Elementary Proficiency',
            'Limited Working Proficiency' => 'Limited Working Proficiency',
            'Regional Office' => 'Regional Office',
            'Professional Working Proficiency' => 'Professional Working Proficiency',
            'Full Professional Proficiency' => 'Full Professional Proficiency',
            'Native or Bilingual Proficiency' => 'Native or Bilingual Proficiency',
        );
    }

}
