<?php

/**
 * This is the model class for table "Workdays_swap".
 *
 * The followings are the available columns in table 'Workdays_swap':
 * @property integer $id
 * @property integer $user_id
 * @property integer $swap_with
 * @property string $date_start
 * @property string $date_end
 * @property string $details
 * @property string $comment
 * @property string $status
 */
class WorkdaysSwap extends HActiveRecord {

    public $ownerUsernameSearch;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Workdays_swap';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, swap_with, date_start, date_end', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 8),
            array('date_start, date_end, status, details, comment', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, details, status, ownerUsernameSearch', 'safe', 'on' => 'search'),
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
            'userswaped' => array(self::BELONGS_TO, 'User', 'swap_with'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'details' => 'Details',
            'ownerUsernameSearch' => 'Employee',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function subordinates() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('user.username', $this->ownerUsernameSearch, true);
        $criteria->compare('uprofile.emp_supervisor', Yii::app()->user->id);
        $criteria->join = 'JOIN profile uprofile ON (uprofile.user_id=t.user_id)';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return WorkdaysSwap the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDays() {
        $days = array();
        $curent = date("Y-m-d", strtotime($this->date_start));
        while (strtotime($curent) <= strtotime($this->date_end)) {
            $days[] = $curent;
            $curent = date("Y-m-d", strtotime("+1 day", strtotime($curent)));
        }
        return $days;
    }
    
    public function getDayWorkTime($day, $user_id) {
        $day = date('D', strtotime($day));
        $curent = date('Y-m', strtotime($day));
        $current_shift = Workdays::model()->find(array(
            'condition' => 'user_id = :user_id AND work_day = :work_day and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
            'params' => array(
                ':work_day' => $day,
                ':user_id' => $user_id,
                ':currdate' => $curent
            )
        ));

        if (empty($current_shift)) {
            return 0;
        }else{
            return 1;
        }
    }
    
    public function getWallOut() {
        return Yii::app()->getController()->widget('application.modules.company.widgets.ShiftSwapWidget', array('calendarEntry' => $this), true);
    }

}
