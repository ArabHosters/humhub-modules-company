<?php

/**
 * This is the model class for table "Workdays".
 *
 * The followings are the available columns in table 'Workdays':
 * @property integer $id
 * @property string $status
 * @property string $start_work
 * @property string $min_time
 * @property string $work_day
 * @property integer $user_id
 * @property string $break_time
 * @property string $effect_date
 */
class Workdays extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Workdays';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('status', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, status, effect_date', 'safe', 'on' => 'search'),
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
            'status' => 'Status',
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
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Workdays the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getOptions() {
        return array(
            'Full Day' => 'Full Day',
            'Half Day' => 'Half Day',
            'Non-working Day' => 'Non-working Day',
        );
    }

}
