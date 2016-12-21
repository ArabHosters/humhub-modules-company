<?php

class AttendenaceController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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

    public function actionPunchout() {
        $this->forcePostRequest();
        $curent = date("Y-m-d H:i:s", time());
        $attendance_id = Yii::app()->request->getParam('id');
        $attendance = Attendance::model()->findByPk($attendance_id);
        $attendance->out_time = $curent;

        if ($attendance->save()) {
            $this->renderJson(array('wallEntryId' => ''));
        } else {
            $this->renderJson(array('errors' => $attendance->getErrors()), false);
        }
    }

    public function actionPunch() {
        $this->forcePostRequest();
        $curent = date("Y-m-d H:i:s", time());
        $day = date('D', time());
        $effect_date = date('Y-m');
        $today_checkedin = Attendance::model()->find(array(
            'condition' => 'user_id = :user_id AND DATE_FORMAT( in_time,  "%Y-%m" ) =:currdate',
            'params' => array(
                ':user_id' => Yii::app()->user->id,
                ':currdate' => $effect_date
            )
        ));
        // user first time checked in for this day
        if ($today_checkedin == NULL) {
            $current_shift = Workdays::model()->find(array(
                'condition' => 'user_id = :user_id AND work_day = :work_day and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
                'params' => array(
                    ':work_day' => $day,
                    ':user_id' => Yii::app()->user->id,
                    ':currdate' => $effect_date
                )
            ));
            if ($current_shift) {
                // get allowed hours for late check in
                $late_attendance_from = HSetting::Get('late_attendance_from', 'company');
                $secs = strtotime($late_attendance_from) - strtotime("00:00:00");
                $allowed_hours = ($secs/(60*60))%24;
                
                // calculate total hours past from start of the shift till current time
                $date1 = new DateTime($current_shift->start_work);
                $date2 = new DateTime();
                if ($date1 > $date2)
                    $date1->sub(new DateInterval('P1D'));

                $diff = $date2->diff($date1);
                $hours = $diff->h;
                $past_hours = $hours + ($diff->days * 24);
                
                // check if user exceed max allowed hour for check in
                if ($past_hours > $allowed_hours) {
                    // increment late attendance counter for user 
                    $late_attendance_count = Yii::app()->user->getModel()->getSetting('late_attendance_count', 'company');
                    Yii::app()->user->getModel()->setSetting('late_attendance_count', $late_attendance_count+1, 'company');
                    
                    //send warning notification for user
                    $notification = new Notification();
                    $notification->class = "EmployeeWarninng";
                    $notification->user_id = Yii::app()->user->id; // Assigned User
                    $notification->source_object_model = 'User';
                    $notification->source_object_id = 1;
                    $notification->target_object_model = 'User';
                    $notification->target_object_id = Yii::app()->user->id;
                    $notification->save();
                }
            }
        }

        $attendance_type = Yii::app()->request->getParam('type');
        if ($attendance_type == 'checkin') {
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->status = 'Approved';
        } elseif ($attendance_type == 'checkout') {
            $attendance_id = Yii::app()->request->getParam('id');
            $attendance = Attendance::model()->findByPk($attendance_id);
            $attendance->out_time = $curent;
        } elseif ($attendance_type == 'continue') {
            $attendance_id = Yii::app()->request->getParam('id');
            $break = Attendance::model()->findByPk($attendance_id);
            $break->out_time = $curent;
            $break->save();
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->status = 'Approved';
        } else {
            $attendance_id = Yii::app()->request->getParam('id');
            $break = Attendance::model()->findByPk($attendance_id);
            $break->out_time = $curent;
            $break->save();
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->type = 2;
            $attendance->status = 'Approved';
        }
        if ($attendance->save()) {
            $this->renderPartial('_ajaxUpdate', array('attendance' => $attendance), false, true);
        } else {
            $this->renderJson(array('errors' => $attendance->getErrors()), false);
        }
    }

    public function actionPunchHeader() {
        $this->forcePostRequest();
        $curent = date("Y-m-d H:i:s", time());
        $day = date('D', time());
        $effect_date = date('Y-m');
        $today_checkedin = Attendance::model()->find(array(
            'condition' => 'user_id = :user_id AND DATE_FORMAT( in_time,  "%Y-%m" ) =:currdate',
            'params' => array(
                ':user_id' => Yii::app()->user->id,
                ':currdate' => $effect_date
            )
        ));
        // user first time checked in for this day
        if ($today_checkedin == NULL) {
            $current_shift = Workdays::model()->find(array(
                'condition' => 'user_id = :user_id AND work_day = :work_day and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
                'params' => array(
                    ':work_day' => $day,
                    ':user_id' => Yii::app()->user->id,
                    ':currdate' => $effect_date
                )
            ));
            if ($current_shift) {
                // get allowed hours for late check in
                $late_attendance_from = HSetting::Get('late_attendance_from', 'company');
                $secs = strtotime($late_attendance_from) - strtotime("00:00:00");
                $allowed_hours = ($secs/(60*60))%24;
                
                // calculate total hours past from start of the shift till current time
                $date1 = new DateTime($current_shift->start_work);
                $date2 = new DateTime();
                if ($date1 > $date2)
                    $date1->sub(new DateInterval('P1D'));

                $diff = $date2->diff($date1);
                $hours = $diff->h;
                $past_hours = $hours + ($diff->days * 24);
                
                // check if user exceed max allowed hour for check in
                if ($past_hours > $allowed_hours) {
                    // increment late attendance counter for user 
                    $late_attendance_count = Yii::app()->user->getModel()->getSetting('late_attendance_count', 'company');
                    Yii::app()->user->getModel()->setSetting('late_attendance_count', $late_attendance_count+1, 'company');
                    
                    //send warning notification for user
                    $notification = new Notification();
                    $notification->class = "EmployeeWarninng";
                    $notification->user_id = Yii::app()->user->id; // Assigned User
                    $notification->source_object_model = 'User';
                    $notification->source_object_id = 1;
                    $notification->target_object_model = 'User';
                    $notification->target_object_id = Yii::app()->user->id;
                    $notification->save();
                }
            }
        }

        $attendance_type = Yii::app()->request->getParam('type');
        if ($attendance_type == 'checkin') {
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->status = 'Approved';
        } elseif ($attendance_type == 'checkout') {
            $attendance_id = Yii::app()->request->getParam('id');
            $attendance = Attendance::model()->findByPk($attendance_id);
            $attendance->out_time = $curent;
        } elseif ($attendance_type == 'continue') {
            $attendance_id = Yii::app()->request->getParam('id');
            $break = Attendance::model()->findByPk($attendance_id);
            $break->out_time = $curent;
            $break->save();
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->status = 'Approved';
        } else {
            $attendance_id = Yii::app()->request->getParam('id');
            $break = Attendance::model()->findByPk($attendance_id);
            $break->out_time = $curent;
            $break->save();
            $attendance = new Attendance();
            $attendance->user_id = Yii::app()->user->id;
            $attendance->in_time = $curent;
            $attendance->type = 2;
            $attendance->status = 'Approved';
        }
        if ($attendance->save()) {
            $this->renderPartial('_ajaxUpdate_header', array('attendance' => $attendance), false, true);
        } else {
            $this->renderJson(array('errors' => $attendance->getErrors()), false);
        }
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Attendance the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Attendance::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Attendance $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'candidates-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddmanual() {

        $attendance = new Attendance('manual_time');

        if (isset($_POST['Attendance'])) {
            $attendance->attributes = Yii::app()->input->stripClean($_POST['Attendance']);
            $attendance->user_id = Yii::app()->user->id;
            $attendance->manual_time = 1;
            if ($attendance->validate()) {
                $attendance->save();
                $this->renderModalClose();
            }
        }

        $this->renderPartial('manualtime', array('attendance' => $attendance), false, true);
    }

    public function actionEditAttendance() {

        $attendance = Attendance::model()->findByPk(Yii::app()->request->getQuery('id'));

        if (isset($_POST['Attendance'])) {
            $attendance->attributes = Yii::app()->input->stripClean($_POST['Attendance']);
            if ($attendance->validate()) {
                $attendance->save();
                $this->renderModalClose();
                print "<script>";
                print 'if(jQuery("#employee-attendance-grid")) { jQuery("#employee-attendance-grid").yiiGridView("update"); }';
                print "</script>";
            }
        }

        $this->renderPartial('edittime', array('attendance' => $attendance), false, true);
    }

}
