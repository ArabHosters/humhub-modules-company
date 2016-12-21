<?php

/**
 * This is the model class for table "EmployeeLeaveDays".
 *
 * The followings are the available columns in table 'EmployeeLeaveDays':
 * @property integer $id
 * @property integer $employee_leave
 * @property string $leave_date
 * @property string $leave_type
 *
 * The followings are the available model relations:
 * @property EmployeeLeaves $employeeLeave
 */
class EmployeeLeaveDays extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EmployeeLeaveDays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_leave, leave_type', 'required'),
			array('employee_leave', 'numerical', 'integerOnly'=>true),
			array('leave_type', 'length', 'max'=>20),
			array('leave_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, employee_leave, leave_date, leave_type', 'safe', 'on'=>'search'),
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
			'employeeLeave' => array(self::BELONGS_TO, 'EmployeeLeaves', 'employee_leave'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_leave' => 'Employee Leave',
			'leave_date' => 'Leave Date',
			'leave_type' => 'Leave Type',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('employee_leave',$this->employee_leave);
		$criteria->compare('leave_date',$this->leave_date,true);
		$criteria->compare('leave_type',$this->leave_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeeLeaveDays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
