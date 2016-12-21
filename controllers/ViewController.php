<?php

class ViewController extends Controller {

    public $subLayout = "_layout";

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('@')
            ),
            array(
                'deny', // deny all users
                'users' => array('*')
            )
        );
    }

    public function actionIndex() {
        $companyModule = Yii::app()->getModule('company');

        Yii::app()->clientScript->registerCssFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.css');
        Yii::app()->clientScript->registerCssFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.print.css', 'print');

        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lib/moment.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lib/jquery-ui.custom.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lang-all.js');
        $this->render('index');
    }

    public function build_calendar_table($month, $year, $dateArray = array()) {

        $output = array();
        foreach ($dateArray as $workDay) {
            $output[$workDay->work_day] = array(
                'start_work' => $workDay->start_work,
                'work_time' => $workDay->min_time,
                'break_time' => $workDay->break_time,
            );
        }

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Create the table tag opener and day headers

        $calendar = array();


        // Create the rest of the calendar
        // Initiate the day counter, starting with the 1st.

        $currentDay = 1;

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

            $date = "$year-$month-$currentDayRel";
            $weekofday = date('D', strtotime($date));
            $worktime = '';
            if (isset($output[strtolower($weekofday)])) {
                $secs = strtotime($output[strtolower($weekofday)]['work_time']) - strtotime("00:00:00");
                $start_time = date("H:i:s", strtotime($output[strtolower($weekofday)]['start_work']));
                $end_time = date("H:i:s", strtotime($output[strtolower($weekofday)]['start_work']) + $secs);
                $worktime = "From: " . $start_time . " To " . $end_time;
                $calendar[] = array(
                    'title' => $start_time . ' - ' . $end_time,
                    'start' => $date . ' ' . $start_time,
                    'end' => $date . ' ' . $end_time,
                );
            } else {
                $worktime = 'Day Off';
                $calendar[] = array(
                    'title' => $worktime,
                    'start' => $date,
                );
            }

            // Increment counters
            $currentDay++;
        }

        return $calendar;
    }

    public function actionFilter() {
        $filter_by = Yii::app()->request->getParam('filter_by');
        $title = '';
        $users = array();
        switch ($filter_by) {
            case 1:
                $users = Profile::model()->findAllByAttributes(array('company' => Yii::app()->request->getParam('company_id')));
                $org = CompanyStructures::model()->findByPk(Yii::app()->request->getParam('company_id'));
                if (isset($org)) {
                    $org_title = $org->title;
                } else {
                    $org_title = 'Unavailable';
                }
                $title = 'Company: ' . $org_title;
                break;
            case 2:
                $users = Profile::model()->findAllByAttributes(array('user_id' => Yii::app()->request->getParam('user_id')));
                $title = 'User';
                break;
            case 3:
                $users = Profile::model()->findAllByAttributes(array('emp_department' => Yii::app()->request->getParam('dept_id')));
                $org = CompanyStructures::model()->findByPk(Yii::app()->request->getParam('dept_id'));
                if (isset($org)) {
                    $org_title = $org->title;
                } else {
                    $org_title = 'Unavailable';
                }
                $title = 'Department: ' . $org_title;
                break;
            case 4:
                $users = Profile::model()->findAllByAttributes(array('emp_team' => Yii::app()->request->getParam('team_id')));
                $org = CompanyStructures::model()->findByPk(Yii::app()->request->getParam('team_id'));
                if (isset($org)) {
                    $org_title = $org->title;
                } else {
                    $org_title = 'Unavailable';
                }
                $title = 'Team: ' . $org_title;
                break;
            default:
                break;
        }

        $this->render('filter', array('title' => $title, 'users' => $users));
    }

    public function actionTest() {
        $this->subLayout = "";
        $users = User::model()->findAll();
        $this->render('test', array('users' => $users));
    }

    public function actionLoadAjax() {

        $output = array();

        $filter_by = Yii::app()->request->getParam('daterange');
//        $start_end = explode(' - ', $filter_by);
//        if (!empty($start_end[0]) && !empty($start_end[1])) {
//            $period = new DatePeriod(
//                    new DateTime($start_end[0]), new DateInterval('P1D'), new DateTime($start_end[1])
//            );
//            $output = array();
//            $start = date('Y-m', strtotime($start_end[0]));
//            $end = date('Y-m', strtotime($start_end[1]));
//            $my_shift = Workdays::model()->findAll(array(
//                'condition' => 'user_id = :user_id AND DATE_FORMAT( effect_date,  "%Y-%m" )  BETWEEN :date1 AND :date2',
//                'params' => array(
//                    ':user_id' => Yii::app()->user->id,
//                    ':date1' => $start,
//                    ':date2' => $end,
//                )
//            ));
//
//            foreach ($period as $date) {
//                $day = strtolower($date->format("D"));
//                $month_year = $date->format("Y-m");
//                $is_in = false;
//                foreach ($my_shift as $shift) {
//                    $shift_day = date('Y-m', strtotime($shift->effect_date));
//                    $secs = strtotime($shift->min_time) - strtotime("00:00:00");
//                    $start_time = date("H:i:s", strtotime($shift->start_work));
//                    $end_time = date("H:i:s", strtotime($shift->start_work) + $secs);
//                    if ($day == $shift->work_day && $shift_day == $month_year) {
//                        $is_in = true;
//                    }
//                }
//                if ($is_in) {
//                    $output[] = array(
//                        'title' => $start_time . ' - ' . $end_time,
//                        'start' => $date->format("Y-m-d") . ' ' . $start_time,
//                        'end' => $date->format("Y-m-d") . ' ' . $end_time,
//                    );
//                } else {
//                    $output[] = array(
//                        'title' => "Not working day",
//                        'start' => $date->format("Y-m-d"),
//                        'color' => 'red',
//                        'textColor' => 'white',
//                    );
//                }
//            }
//        } else {
//            $curent = date('Y-m');
//            $my_shift = Workdays::model()->findAll(array(
//                'condition' => 'user_id = :user_id and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
//                'params' => array(
//                    ':user_id' => Yii::app()->user->id,
//                    ':currdate' => $curent
//                )
//            ));
//            $dateComponents = getdate();
//
//            $month = $dateComponents['mon'];
//            $year = $dateComponents['year'];
//            $output = $this->build_calendar_table($month, $year, $my_shift);
//        }
        
        $startDate = new DateTime(Yii::app()->request->getParam('start'));
        $endDate = new DateTime(Yii::app()->request->getParam('end'));
        
        if($startDate && $endDate){
            $period = new DatePeriod(
                    $startDate, new DateInterval('P1D'), $endDate
            );
            $output = array();
            $start = $startDate->format('Y-m');
            $end = $endDate->format('Y-m');
            $my_shift = Workdays::model()->findAll(array(
                'condition' => 'user_id = :user_id AND DATE_FORMAT( effect_date,  "%Y-%m" )  BETWEEN :date1 AND :date2',
                'params' => array(
                    ':user_id' => Yii::app()->user->id,
                    ':date1' => $start,
                    ':date2' => $end,
                )
            ));

            foreach ($period as $date) {
                $day = strtolower($date->format("D"));
                $month_year = $date->format("Y-m");
                $is_in = false;
                foreach ($my_shift as $shift) {
                    $shift_day = date('Y-m', strtotime($shift->effect_date));
                    $secs = strtotime($shift->min_time) - strtotime("00:00:00");
                    $start_time = date("H:i:s", strtotime($shift->start_work));
                    $end_time = date("H:i:s", strtotime($shift->start_work) + $secs);
                    if ($day == $shift->work_day && $shift_day == $month_year) {
                        $is_in = true;
                    }
                }
                if ($is_in) {
                    $output[] = array(
                        'title' => $start_time . ' - ' . $end_time,
                        'start' => $date->format("Y-m-d") . ' ' . $start_time,
                        'end' => $date->format("Y-m-d") . ' ' . $end_time,
                    );
                } else {
                    $output[] = array(
                        'title' => "Not working day",
                        'start' => $date->format("Y-m-d"),
                        'color' => 'red',
                        'textColor' => 'white',
                    );
                }
            }
        }
        

        echo CJSON::encode($output);
    }

}
