<?php

/**
 * This is the model class for table "Attendance".
 *
 * The followings are the available columns in table 'Attendance':
 * @property integer $id
 * @property integer $user_id
 * @property string $in_time
 * @property string $out_time
 * @property string $note
 */
class Attendance extends CActiveRecord {

    public $ownerUsernameSearch;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Attendance';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('note, reason', 'required', 'on' => 'manual_time'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('note', 'length', 'max' => 500),
            array('in_time, out_time, note, reason, status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, in_time, out_time, note, ownerUsernameSearch', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'owner' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'in_time' => 'In Time',
            'out_time' => 'Out Time',
            'note' => 'Note',
            'ownerUsernameSearch' => 'User',
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
        $criteria->compare('in_time', $this->in_time, true);
        $criteria->compare('out_time', $this->out_time, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('status', $this->status, true);
        
        $criteria->compare('owner.username', $this->ownerUsernameSearch, true);
        $criteria->join = 'JOIN user owner ON (owner.id=t.user_id)';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchEdited() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('in_time', $this->in_time, true);
        $criteria->compare('out_time', $this->out_time, true);
        $criteria->compare('reason', $this->reason, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('manual_time', 1, true);
        
        $criteria->compare('owner.username', $this->ownerUsernameSearch, true);
        $criteria->join = 'JOIN user owner ON (owner.id=t.user_id)';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Attendance the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
