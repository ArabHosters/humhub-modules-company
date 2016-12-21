<?php

/**
 * This is the model class for table "salary_component".
 *
 * The followings are the available columns in table 'salary_component':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $total_paypal
 * @property integer $company_cost
 * @property integer $amout
 * @property integer $recurring
 * @property integer $recurring
 */
class SalaryComponent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'salary_component';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type, total_paypal, company_cost', 'required'),
			array('type, total_paypal, company_cost, amout, percentage, recurring', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, total_paypal, company_cost, amout, percentage, recurring', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'total_paypal' => 'Total Paypal',
			'company_cost' => 'Company Cost',
			'amout' => 'Amount',
			'percentage' => 'Percentage',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('total_paypal',$this->total_paypal);
		$criteria->compare('company_cost',$this->company_cost);
		$criteria->compare('amout',$this->amout);
		$criteria->compare('percentage',$this->percentage);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalaryComponent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
