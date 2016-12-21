<?php

/**
 * This is the model class for table "vacancy".
 *
 * The followings are the available columns in table 'vacancy':
 * @property integer $id
 * @property string $name
 * @property integer $company_id
 * @property integer $department_id
 * @property integer $hiring_manager
 * @property integer $num_of_pos
 * @property string $posting_details
 */
class Vacancy extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'vacancy';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, company_id, department_id, hiring_manager, num_of_pos, posting_details', 'required'),
            array('company_id, department_id, hiring_manager, num_of_pos', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 150),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, company_id, department_id, hiring_manager, num_of_pos, posting_details', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'company' => array(self::BELONGS_TO, 'CompanyStructures', 'company_id'),
            'department' => array(self::BELONGS_TO, 'CompanyStructures', 'department_id'),
            'manager' => array(self::BELONGS_TO, 'User', 'hiring_manager'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'company_id' => 'Company',
            'department_id' => 'Department',
            'hiring_manager' => 'Hiring Manager',
            'num_of_pos' => 'Num Of Positions',
            'posting_details' => 'Posting Details',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('department_id', $this->department_id);
        $criteria->compare('hiring_manager', $this->hiring_manager);
        $criteria->compare('num_of_pos', $this->num_of_pos);
        $criteria->compare('posting_details', $this->posting_details, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Vacancy the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
