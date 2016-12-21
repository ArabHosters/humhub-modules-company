<?php

/**
 * This is the model class for table "LeaveRules".
 *
 * The followings are the available columns in table 'LeaveRules':
 * @property integer $id
 * @property integer $leave_type
 * @property integer $job_title
 * @property integer $employment_status
 * @property integer $employee
 * @property string $supervisor_leave_assign
 * @property string $employee_can_apply
 * @property string $apply_beyond_current
 * @property string $leave_accrue
 * @property string $carried_forward
 * @property string $default_per_year
 * @property integer $carried_forward_percentage
 * @property integer $carried_forward_leave_availability
 * @property string $propotionate_on_joined_date
 */
class LeaveRules extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'LeaveRules';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('leave_type, default_per_year', 'required'),
            array('leave_type, job_title, employment_status, employee, carried_forward_percentage, carried_forward_leave_availability', 'numerical', 'integerOnly' => true),
            array('supervisor_leave_assign, employee_can_apply, apply_beyond_current, leave_accrue, carried_forward, propotionate_on_joined_date', 'length', 'max' => 3),
            array('default_per_year', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, leave_type, job_title, employment_status, employee, supervisor_leave_assign, employee_can_apply, apply_beyond_current, leave_accrue, carried_forward, default_per_year, carried_forward_percentage, carried_forward_leave_availability, propotionate_on_joined_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rule_user' => array(self::BELONGS_TO, 'User', 'employee'),
            'emp_status' => array(self::BELONGS_TO, 'EmploymentStatus', 'employment_status'),
            'leave' => array(self::BELONGS_TO, 'LeaveTypes', 'leave_type'),
            'job' => array(self::BELONGS_TO, 'JobTitles', 'job_title'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'leave_type' => 'Leave Type',
            'job_title' => 'Job Title',
            'employment_status' => 'Employment Status',
            'employee' => 'Employee',
            'supervisor_leave_assign' => 'Supervisor Leave Assign',
            'employee_can_apply' => 'Employee Can Apply',
            'apply_beyond_current' => 'Apply Beyond Current',
            'leave_accrue' => 'Leave Accrue',
            'carried_forward' => 'Carried Forward',
            'default_per_year' => 'Default Per Year',
            'carried_forward_percentage' => 'Carried Forward Percentage',
            'carried_forward_leave_availability' => 'Carried Forward Leave Availability',
            'propotionate_on_joined_date' => 'Propotionate On Joined Date',
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
        $criteria->compare('leave_type', $this->leave_type);
        $criteria->compare('job_title', $this->job_title);
        $criteria->compare('employment_status', $this->employment_status);
        $criteria->compare('employee', $this->employee);
        $criteria->compare('supervisor_leave_assign', $this->supervisor_leave_assign, true);
        $criteria->compare('employee_can_apply', $this->employee_can_apply, true);
        $criteria->compare('apply_beyond_current', $this->apply_beyond_current, true);
        $criteria->compare('leave_accrue', $this->leave_accrue, true);
        $criteria->compare('carried_forward', $this->carried_forward, true);
        $criteria->compare('default_per_year', $this->default_per_year, true);
        $criteria->compare('carried_forward_percentage', $this->carried_forward_percentage);
        $criteria->compare('carried_forward_leave_availability', $this->carried_forward_leave_availability);
        $criteria->compare('propotionate_on_joined_date', $this->propotionate_on_joined_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LeaveRules the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getOptions() {
        return array(
            'Yes' => 'Yes',
            'No' => 'No',
        );
    }
}
