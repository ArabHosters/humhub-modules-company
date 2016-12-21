<?php

/**
 * This is the model class for table "fetchmail".
 *
 * The followings are the available columns in table 'fetchmail':
 * @property integer $id
 * @property string $bank
 * @property string $amount
 * @property string $time
 * @property integer $approved
 * @property integer $mailid
 * @property integer $archived
 */
class Fetchmail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'fetchmail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('bank, amount', 'required'),
            array('approved', 'numerical', 'integerOnly' => true),
            array('bank, amount', 'length', 'max' => 150),
            array('time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, bank, amount, time, approved, archived', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'bank' => 'Bank',
            'amount' => 'Amount',
            'time' => 'Time',
            'approved' => 'Approved',
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
        $criteria->compare('bank', $this->bank, true);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('archived', 0);
        
        $criteria->order = 'id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function archived() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('bank', $this->bank, true);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('archived', 1);
        
        $criteria->order = 'id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Fetchmail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
