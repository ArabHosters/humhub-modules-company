<?php

/**
 * This is the model class for table "employee_salary".
 *
 * The followings are the available columns in table 'employee_salary':
 * @property integer $id
 * @property integer $component_id
 * @property integer $emp_id
 * @property string $amount
 * @property string $effect_date
 * @property string $pay_frequency
 * @property string $details
 */
class EmployeeSalary extends CActiveRecord {

    public $totalAmount;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'employee_salary';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('component_id, emp_id, amount, effect_date', 'required'),
            array('component_id, emp_id, amount', 'numerical', 'integerOnly' => true, 'min'=>0),
            array('details', 'safe'),
            //array('amount', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, component_id, emp_id, amount, effect_date, details', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'emp_id'),
            'component' => array(self::BELONGS_TO, 'SalaryComponent', 'component_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'component_id' => 'Component',
            'emp_id' => 'Emp',
            'amount' => 'Amount',
            'effect_date' => 'Effect Date',
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
        $criteria->compare('component_id', $this->component_id);
        $criteria->compare('emp_id', $this->emp_id);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('effect_date', $this->effect_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EmployeeSalary the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
