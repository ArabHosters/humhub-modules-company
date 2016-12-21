<?php

/**
 * This is the model class for table "EmployeeLeaves".
 *
 * The followings are the available columns in table 'EmployeeLeaves':
 * @property integer $id
 * @property integer $employee
 * @property integer $leave_type
 * @property integer $leave_period
 * @property string $date_start
 * @property string $date_end
 * @property string $details
 * @property string $status
 *
 * The followings are the available model relations:
 * @property EmployeeLeaveDays[] $employeeLeaveDays
 * @property User $employee
 * @property LeavePeriods $leavePeriod
 * @property LeaveTypes $leaveType
 */
class EmployeeLeaves extends HActiveRecordContent {

    const FULLDAY = 1;
    const HALFDAY = 0;
    const NOTWORKINGDAY = 2;

    public $ownerUsernameSearch;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'EmployeeLeaves';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee, leave_type, leave_period', 'required'),
            array('employee, leave_type, leave_period', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 8),
            array('attachment', 'length', 'max' => 100),
            //array('date_start', 'checkLeavePeriod', 'compareAttribute' => 'date_end'),
            array('date_start, date_end, details', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, employee, leave_type, leave_period, date_start, date_end, details, status, ownerUsernameSearch', 'safe', 'on' => 'search'),
        );
    }

    public function beforeValidate() {
        $startDate = $this->date_start;
        $endDate = $this->date_end;

//        $this->addError('Error', "You are not allowed to apply for this type of leaves");
        //$leavePeriod = LeavePeriods::model()->findByAttributes(array('date_start' => $startDate, 'date_end' => $endDate));
        $leavePeriod = LeavePeriods::model()->find(array(
            'condition' => 'date_start <= :date_start AND date_end >= :date_end',
            'params' => array(
                ':date_start' => $startDate,
                ':date_end' => $endDate,
            )
        ));

        if (empty($leavePeriod->id)) {
            //$leavePeriod1 = $leavePeriod = LeavePeriods::model()->findByAttributes(array('date_start' => $startDate, 'date_end' => $endDate));
            $leavePeriod1 = LeavePeriods::model()->find(array(
                'condition' => 'date_start <= :date_start AND date_end >= :date_end',
                'params' => array(
                    ':date_start' => $startDate,
                    ':date_end' => $endDate,
                )
            ));

            //$leavePeriod2 = $leavePeriod = LeavePeriods::model()->findByAttributes(array('date_start' => $endDate, 'date_end' => $startDate));
            $leavePeriod2 = LeavePeriods::model()->find(array(
                'condition' => 'date_start <= :date_start AND date_end >= :date_end',
                'params' => array(
                    ':date_start' => $endDate,
                    ':date_end' => $startDate,
                )
            ));

            if (!empty($leavePeriod1->id) && !empty($leavePeriod2->id)) {
                $this->addError("leave_period", "You are trying to apply leaves in two leave periods. You may apply leaves til $leavePeriod1->date_end. Rest you have to apply seperately");
            } else {
                $this->addError("leave_period", "The leave period for your leave application is not defined. Please inform administrator");
            }
        } else {
            $this->leave_period = $leavePeriod->id;
        }
        return parent::beforeValidate();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employeeLeaveDays' => array(self::HAS_MANY, 'EmployeeLeaveDays', 'employee_leave'),
            'user' => array(self::BELONGS_TO, 'User', 'employee'),
            'leavePeriod' => array(self::BELONGS_TO, 'LeavePeriods', 'leave_period'),
            'leaveType' => array(self::BELONGS_TO, 'LeaveTypes', 'leave_type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'employee' => 'Employee',
            'leave_type' => 'Leave Type',
            'leave_period' => 'Leave Period',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'details' => 'Details',
            'status' => 'Status',
            'attachment' => 'Attachment',
            'ownerUsernameSearch' => 'Employee',
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
        $criteria->compare('employee', $this->employee);
        $criteria->compare('leave_type', $this->leave_type);
        $criteria->compare('leave_period', $this->leave_period);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('user.username', $this->ownerUsernameSearch, true);
        $criteria->join = 'JOIN user user ON (user.id=t.employee)';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function subordinates() {
        $criteria = new CDbCriteria;



        $criteria->compare('id', $this->id);
        $criteria->compare('employee', $this->employee);
        $criteria->compare('leave_type', $this->leave_type);
        $criteria->compare('leave_period', $this->leave_period);
        $criteria->compare('date_start', $this->date_start, true);
        $criteria->compare('date_end', $this->date_end, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('user.username', $this->ownerUsernameSearch, true);
        $criteria->compare('uprofile.emp_supervisor', Yii::app()->user->id);
        $criteria->join = 'JOIN profile uprofile ON (uprofile.user_id=t.employee)';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EmployeeLeaves the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getContainerEntriesByRange(DateTime $start, DateTime $end, HActiveRecordContentContainer $contentContainer, $limit = 0) {
        $entries = array();

        // Limit Range to one month
        $interval = $start->diff($end);
        if ($interval->days > 50) {
            throw new Exception('Range maximum exceeded!');
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'date_start >= :start AND date_end <= :end';
        $criteria->params = array('start' => $start->format('Y-m-d'), 'end' => $end->format('Y-m-d'));
        $criteria->order = "date_start ASC";

        if ($limit != 0) {
            $criteria->limit = $limit;
        }

        foreach (EmployeeLeaves::model()->contentContainer($contentContainer)->findAll($criteria) as $entry) {
            if ($entry->content->canRead()) {
                $entries[] = $entry;
            }
        }

        return $entries;
    }

    /**
     * Returns array for FullCalendar Javascript
     * 
     * @return Array information for fullcalendar
     */
    public function getFullCalendarArray() {
        $dateFormat = 'Y-m-d';
        // Note: In fullcalendar the end time is the moment AFTER the event.
        // But we store the exact event time 00:00:00 - 23:59:59 so add some time to the full day event.
        $endDateTime = new DateTime($this->date_end);
        $endDateTime->add(new DateInterval('PT2H'));
        $end = $endDateTime->format($dateFormat);
        return array(
            'id' => $this->id,
            'allDay' => true,
            'title' => $this->content->user->displayName . '(' . $this->leaveType->name . ')',
            'editable' => false, //$this->content->canWrite(),
            'updateUrl' => $this->createContainerUrlTemp('//company/entry/editAjax', array('id' => $this->id, 'date_end' => '-end-', 'date_start' => '-start-', 'fullCalendar' => '1')),
            'viewUrl' => $this->createContainerUrlTemp('//company/entry/view', array('id' => $this->id, 'fullCalendar' => '1')),
            'start' => $this->formatDateTime($dateFormat, $this->date_start),
            'end' => $end,
        );
    }

    private function formatDateTime($format = 'c', $time = 'now') {
        $d = new DateTime($time);
        return $d->format($format);
    }

    public function createContainerUrlTemp($route, $params = array()) {

        if (version_compare(HVersion::VERSION, '0.9', 'lt')) {
            $container = $this->content->getContainer();

            if ($container instanceof Space) {
                $params['sguid'] = $container->guid;
            } elseif ($container instanceof User) {
                $params['uguid'] = $container->guid;
            }

            return Yii::app()->createUrl($route, $params);
        } else {
            return $this->content->container->createUrl($route, $params);
        }
    }

    public function AvailableLeaveMatrixForEmployeeLeaveType() {

        /**
         * [Total Available],[Pending],[Approved],[Rejected]
         */
        if (!isset($this->LeaveRule->default_per_year)) {
            return array();
        }
        $avalilable = $this->LeaveRule->default_per_year;
        $pending = $this->countLeaveAmounts($this->AllEmployeeLeaves($this->employee, $this->leave_period, $this->leave_type, 'Pending'));
        $approved = $this->countLeaveAmounts($this->AllEmployeeLeaves($this->employee, $this->leave_period, $this->leave_type, 'Approved'));
        $rejected = $this->countLeaveAmounts($this->AllEmployeeLeaves($this->employee, $this->leave_period, $this->leave_type, 'Rejected'));

        return array($avalilable, $pending, $approved, $rejected);
    }

    private function AllEmployeeLeaves($employeeId, $leavePeriod, $leaveType, $status) {
        $employeeLeaves = EmployeeLeaves::model()->findAll(array(
            'condition' => 'employee = :employee AND leave_period = :leave_period AND leave_type = :leave_type AND status = :status',
            'params' => array(
                ':employee' => $employeeId,
                ':leave_period' => $leavePeriod,
                ':leave_type' => $leaveType,
                ':status' => $status,
            )
        ));

        return $employeeLeaves;
    }

    private function countLeaveAmounts($leaves) {
        $amount = 0;
        foreach ($leaves as $leave) {
            $empLeaveDay = EmployeeLeaveDays::model()->findAllByAttributes(array(
                'employee_leave' => $leave->id
            ));
            foreach ($empLeaveDay as $leaveDay) {
                if ($leaveDay->leave_type == 'Full Day') {
                    $amount += 1;
                } else if ($leaveDay->leave_type == 'Half Day - Morning') {
                    $amount += 0.5;
                } else if ($leaveDay->leave_type == 'Half Day - Afternoon') {
                    $amount += 0.5;
                }
            }
        }
        return floatval($amount);
    }

    public function getLeaveRule() {
        $rules = LeaveRules::model()->find(array(
            'condition' => 'employee = :employee AND leave_type = :leave_type',
            'params' => array(
                ':employee' => $this->user->id,
                ':leave_type' => $this->leave_type,
            )
        ));
        if ($rules) {
            return $rules;
        }

        $rules = LeaveRules::model()->find(array(
            'condition' => 'job_title = :job_title AND employment_status = :employment_status AND leave_type = :leave_type AND employee is null',
            'params' => array(
                ':job_title' => $this->user->profile->emp_job,
                ':employment_status' => $this->user->profile->emp_status,
                ':leave_type' => $this->leave_type,
            )
        ));
        if ($rules) {
            return $rules;
        }

        $rules = LeaveRules::model()->find(array(
            'condition' => 'job_title = :job_title AND employment_status is null AND leave_type = :leave_type AND employee is null',
            'params' => array(
                ':job_title' => $this->user->profile->emp_job,
                ':leave_type' => $this->leave_type,
            )
        ));
        if ($rules) {
            return $rules;
        }

        $rules = LeaveRules::model()->find(array(
            'condition' => 'job_title is null AND employment_status = :employment_status AND leave_type = :leave_type AND employee is null',
            'params' => array(
                ':employment_status' => $this->user->profile->emp_status,
                ':leave_type' => $this->leave_type,
            )
        ));
        if ($rules) {
            return $rules;
        }

        return false;
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

    public function getDayWorkTime($day, $employeeId) {
        $holiday = $this->getHoliday($day);
        if (!empty($holiday)) {
            if ($holiday->status == 'Full Day') {
                return self::NOTWORKINGDAY;
            } else {
                return self::HALFDAY;
            }
        }

        $workday = $this->getWorkDay($day, $employeeId);
        
        if (empty($workday)) {
            return self::NOTWORKINGDAY;
        }

        if ($workday->status == 'Full Day') {
            return self::FULLDAY;
        } else if ($workday->status == 'Half Day') {
            return self::HALFDAY;
        } else {
            return self::NOTWORKINGDAY;
        }
    }

    public function getWorkDay($day, $employeeId) {
        $dayName = date("D", strtotime($day));
        $curent = date('Y-m');
        if (empty($employeeId)) {
            $workDay = Workdays::model()->find(array(
                'condition' => 'work_day = :work_day and user_id = :user_id and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
                'params' => array(
                    ':work_day' => strtolower($dayName),
                    ':user_id' => Yii::app()->user->id,
                    ':currdate' => $curent
                )
            ));
            if (!empty($workDay) && $workDay->work_day == $dayName) {
                return $workDay;
            }
        } else {
            $workDay = Workdays::model()->find(array(
                'condition' => 'work_day = :work_day and user_id = :user_id and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
                'params' => array(
                    ':work_day' => strtolower($dayName),
                    ':user_id' => $employeeId,
                    ':currdate' => $curent
                )
            ));
            if (!empty($workDay) && $workDay->work_day == strtolower($dayName)) {
                return $workDay;
            }
        }

        return null;
    }

    public function getHoliday($day) {
        $hd = Holidays::model()->find(array(
            'condition' => 'dateh = :dateh',
            'params' => array(
                ':dateh' => $day,
            )
        ));
        if (!empty($hd) && $hd->dateh == $day) {
            return $hd;
        }
        return null;
    }

    /**
     * Returns the Wall Output
     */
    public function getWallOut() {
        return Yii::app()->getController()->widget('application.modules.company.widgets.LeaveWallEntryWidget', array('calendarEntry' => $this), true);
    }

}
