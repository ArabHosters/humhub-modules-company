<?php

/**
 * This is the model class for table "employee_loan".
 *
 * The followings are the available columns in table 'employee_loan':
 * @property integer $id
 * @property integer $user_id
 * @property string $amount
 * @property string $loan_date
 * @property string $repay_date
 * @property string $repay_amount
 * @property string $note
 * @property string $status
 */
class EmployeeLoan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'employee_loan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, amount', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('amount, repay_amount', 'length', 'max' => 10),
            array('note', 'length', 'max' => 500),
            array('loan_date, repay_date, status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, amount, loan_date, repay_date, repay_amount, note', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'amount' => 'Amount',
            'loan_date' => 'Loan Date',
            'repay_date' => 'Repay Start Date',
            'repay_amount' => 'Repay Amount',
            'note' => 'Note',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('loan_date', $this->loan_date, true);
        $criteria->compare('repay_date', $this->repay_date, true);
        $criteria->compare('repay_amount', $this->repay_amount, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EmployeeLoan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
