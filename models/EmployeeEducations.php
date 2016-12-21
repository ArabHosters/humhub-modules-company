<?php

/**
 * This is the model class for table "EmployeeEducations".
 *
 * The followings are the available columns in table 'EmployeeEducations':
 * @property integer $id
 * @property integer $education_id
 * @property integer $employee
 * @property string $institute
 * @property string $date_start
 * @property string $date_end
 *
 * The followings are the available model relations:
 * @property Educations $education
 * @property User $employee0
 */
class EmployeeEducations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EmployeeEducations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee', 'required'),
			array('education_id, employee', 'numerical', 'integerOnly'=>true),
			array('institute', 'length', 'max'=>400),
			array('date_start, date_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, education_id, employee, institute, date_start, date_end', 'safe', 'on'=>'search'),
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
			'education' => array(self::BELONGS_TO, 'Educations', 'education_id'),
			'employee0' => array(self::BELONGS_TO, 'User', 'employee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'education_id' => 'Education',
			'employee' => 'Employee',
			'institute' => 'Institute',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
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
		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('employee',$this->employee);
		$criteria->compare('institute',$this->institute,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeeEducations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
