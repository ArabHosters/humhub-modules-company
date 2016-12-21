<?php

/**
 * EntryController used to display, edit or delete employee leaves entries
 */
class EntryController extends ContentContainerController {

    public function actionView() {
        $this->checkContainerAccess();
        $calendarEntry = EmployeeLeaves::model()->findByPk(Yii::app()->request->getQuery('id'));

        if ($calendarEntry == null) {
            throw new CHttpException('404', "Leave request not found!");
        }

        if ($calendarEntry->content->canRead() || Yii::app()->user->isAdmin()) {
            $leaveMatrix = $calendarEntry->AvailableLeaveMatrixForEmployeeLeaveType();

            $leaves = array();
            $leaves['totalLeaves'] = floatval($leaveMatrix[0]);
            $leaves['pendingLeaves'] = floatval($leaveMatrix[1]);
            $leaves['approvedLeaves'] = floatval($leaveMatrix[2]);
            $leaves['rejectedLeaves'] = floatval($leaveMatrix[3]);
            $leaves['availableLeaves'] = $leaves['totalLeaves'] - $leaves['pendingLeaves'] - $leaves['approvedLeaves'];

            $empLeaveDay = EmployeeLeaveDays::model()->findAllByAttributes(array(
                'employee_leave' => $calendarEntry->id
            ));

            $logsTemp = EmployeeLeaveLog::model()->findAllByAttributes(array(
                'employee_leave' => $calendarEntry->id
            ));
            $leaveLogs = array();
            foreach ($logsTemp as $empLeaveLog) {
                $t = array();
                $t['time'] = $empLeaveLog->created;
                $t['status_from'] = $empLeaveLog->status_from;
                $t['status_to'] = $empLeaveLog->status_to;
                $userName = null;
                if (!empty($empLeaveLog->user_id)) {
                    $userName = $empLeaveLog->user->displayName;
                }

                if (!empty($userName)) {
                    $t['note'] = $empLeaveLog->data . " (by: " . $userName . ")";
                } else {
                    $t['note'] = $empLeaveLog->data;
                }

                $leaveLogs[] = $t;
            }

            $this->renderPartial('view', array('calendarEntry' => $calendarEntry, 'leaves' => $leaves, 'empLeaveDay' => $empLeaveDay, 'leaveLogs' => $leaveLogs), false, true);
        } else {
            throw new CHttpException('403', "You don't have permission to access Employee Leave");
        }
    }

    public function actionRespond() {

        $this->checkContainerAccess();

        $entryId = (int) Yii::app()->request->getParam('id');
        $type = (int) Yii::app()->request->getParam('type');

        $calendarEntry = EmployeeLeaves::model()->findByPk($entryId);

        if ($calendarEntry == null) {
            throw new CHttpException('404', Yii::t('CalendarModule.base', "Event not found!"));
        }

        if (!$calendarEntry->content->canRead()) {
            throw new CHttpException('403', Yii::t('CalendarModule.base', "You don't have permission to access this event!"));
        }

        $this->redirect($this->createContainerUrl('view', array('id' => $calendarEntry->id)));
    }

    public function actionEdit() {
        $this->checkContainerAccess();

        $calendarEntry = EmployeeLeaves::model()->contentContainer($this->contentContainer)->findByPk(Yii::app()->request->getParam('id'));

        if ($calendarEntry == null) {

            if (!$this->contentContainer->canWrite()) {
                throw new CHttpException('403', Yii::t('CalendarModule.base', "You don't have permission to create events!"));
            }

            $calendarEntry = new EmployeeLeaves;

            if (Yii::app()->request->getParam('fullCalendar') == 1) {

                if ((Yii::app()->request->getParam('date_start', '') != '')) {
                    $startTime = new DateTime(Yii::app()->request->getParam('date_start', ''));
                    $calendarEntry->date_start = $startTime->format('Y-m-d H:i:s');
                }
                if ((Yii::app()->request->getParam('date_end', '') != '')) {
                    $endTime = new DateTime(Yii::app()->request->getParam('date_end', ''));

                    $calendarEntry->date_end = $endTime->format('Y-m-d H:i:s');
                }
            }
        } else {

            if (!$calendarEntry->content->canWrite()) {
                throw new CHttpException('403', Yii::t('CalendarModule.base', "You don't have permission to edit this event!"));
            }
        }

        $calendarEntry->scenario = 'edit';

        if (isset($_POST['EmployeeLeaves'])) {

            $calendarEntry->content->container = $this->contentContainer;
            $calendarEntry->attributes = Yii::app()->input->stripClean($_POST['EmployeeLeaves']);

            $startDate = new DateTime($calendarEntry->date_start);
            $endDate = new DateTime($calendarEntry->date_end);
            $calendarEntry->date_start = $startDate->format('Y-m-d') . " 00:00:00";
            $calendarEntry->date_end = $endDate->format('Y-m-d') . " 23:59:59";

            // Avoid "required" error, when fields are not used
            $calendarEntry->employee = Yii::app()->user->id;

            if ($calendarEntry->validate()) {
                $employeeId = $calendarEntry->employee;
                $days = $calendarEntry->days;
                $dayMap = array();
                foreach ($days as $day) {
                    $dayMap[$day] = $calendarEntry->getDayWorkTime($day, $employeeId);
                }
                $leaveMatrix = $calendarEntry->AvailableLeaveMatrixForEmployeeLeaveType();
                $leaves = array();
                if (!empty($leaveMatrix)) {
                    $leaves['totalLeaves'] = floatval($leaveMatrix[0]);
                    $leaves['pendingLeaves'] = floatval($leaveMatrix[1]);
                    $leaves['approvedLeaves'] = floatval($leaveMatrix[2]);
                    $leaves['rejectedLeaves'] = floatval($leaveMatrix[3]);
                    $leaves['availableLeaves'] = $leaves['totalLeaves'] - $leaves['pendingLeaves'] - $leaves['approvedLeaves'];
                } else {
                    $this->renderPartial('noentries', array(), false, true);
                    return;
                }
                $this->renderPartial('leavedays', array('calendarEntry' => $calendarEntry, 'dayMap' => $dayMap, 'leaves' => $leaves), false, true);
                return;
            }
        }

        if (isset($_POST['EmployeeLeaveDays'])) {
            $employee_days = $_POST['EmployeeLeaveDays'];
            $calendarEntry->content->container = $this->contentContainer;
            $calendarEntry->date_start = Yii::app()->request->getParam('date_start');
            $calendarEntry->date_end = Yii::app()->request->getParam('date_end');
            $calendarEntry->employee = Yii::app()->request->getParam('employee');
            $calendarEntry->details = Yii::app()->request->getParam('details');
            $calendarEntry->leave_type = Yii::app()->request->getParam('leave_type');
            if ($calendarEntry->save()) {
                $leave_id = $calendarEntry->id;
                $days = $calendarEntry->days;
                $dayMap = array();
                foreach ($days as $day) {
                    if (isset($employee_days[$day])) {
                        $EmployeeLeaveDays = new EmployeeLeaveDays;
                        $EmployeeLeaveDays->employee_leave = $leave_id;
                        $EmployeeLeaveDays->leave_date = $day;
                        $EmployeeLeaveDays->leave_type = $employee_days[$day];
                        $EmployeeLeaveDays->save(false);
                    }
                }
                //send leave request notification for admins and supervisors
                $admins = User::model()->findAllByAttributes(array('super_admin' => 1));
                foreach ($admins as $admin) {
                    $notification = new Notification();
                    $notification->class = "LeaveNotification";
                    $notification->user_id = $admin->id; // Assigned User
                    $notification->source_object_model = 'User';
                    $notification->source_object_id = $calendarEntry->employee;
                    $notification->target_object_model = 'User';
                    $notification->target_object_id = $calendarEntry->employee;
                    $notification->save();
                }
            }
            $this->renderModalClose();
            // After closing modal refresh calendar or page
            print "<script>";
            print 'if(typeof $("#calendar").fullCalendar != "undefined") { $("#calendar").fullCalendar("refetchEvents"); } else { location.reload(); }';
            print "</script>";

            return;
        }

        $this->renderPartial('edit', array('calendarEntry' => $calendarEntry), false, true);
    }

    public function actionEditAjax() {
        $this->checkContainerAccess();

        $calendarEntry = EmployeeLeaves::model()->contentContainer($this->contentContainer)->findByPk(Yii::app()->request->getQuery('id'));

        if ($calendarEntry == null) {
            throw new CHttpException('404', "Leave request not found!");
        }

        if (!$calendarEntry->content->canRead()) {
            throw new CHttpException('403', "You don't have permission to edit Employee Leave");
        }

        if ((Yii::app()->request->getParam('date_start', '') != '')) {
            $startTime = new DateTime(Yii::app()->request->getParam('date_start', ''));
            $calendarEntry->date_start = $startTime->format('Y-m-d');
        }
        if ((Yii::app()->request->getParam('date_end', '') != '')) {
            $endTime = new DateTime(Yii::app()->request->getParam('date_end', ''));

            $calendarEntry->date_end = $endTime->format('Y-m-d');
        }

        $calendarEntry->save();
    }

    public function actionDelete() {

        $this->checkContainerAccess();
        $calendarEntry = EmployeeLeaves::model()->findByPk(Yii::app()->request->getQuery('id'));

        if ($calendarEntry == null) {
            throw new CHttpException('404', Yii::t('CalendarModule.base', "Event not found!"));
        }

        if ($calendarEntry->content->canDelete() || Yii::app()->user->isAdmin()) {
            $calendarEntry->delete();

            if (Yii::app()->request->isAjaxRequest) {
                $this->renderModalClose();
            } else {
                $this->redirect($this->createContainerUrl('view/index'));
            }
        } else {
            throw new CHttpException('403', Yii::t('CalendarModule.base', "You don't have permission to delete this event!"));
        }
    }

    public function actionChangeStatus() {
        $this->checkContainerAccess();

        $calendarEntry = EmployeeLeaves::model()->findByPk(Yii::app()->request->getParam('id'));

        if ($calendarEntry == null) {
            throw new CHttpException('404', "Leave request not found!");
        }

        if ($calendarEntry->content->canRead() || Yii::app()->user->isAdmin()) {
            $employeeLeaveLog = new EmployeeLeaveLog;
            $leave_status = Yii::app()->request->getParam('leave_status');
            if ($leave_status != '' && $leave_status != $calendarEntry->status) {
                $oldLeaveStatus = $calendarEntry->status;
                $calendarEntry->status = Yii::app()->request->getParam('leave_status');
                $calendarEntry->save();

                if ((Yii::app()->request->getParam('leave_reason') != '')) {
                    $employeeLeaveLog->data = Yii::app()->request->getParam('leave_reason');
                } else {
                    $employeeLeaveLog->data = '';
                }
                $employeeLeaveLog->employee_leave = $calendarEntry->id;
                $employeeLeaveLog->user_id = Yii::app()->user->id;
                $employeeLeaveLog->status_from = $oldLeaveStatus;
                $employeeLeaveLog->status_to = $calendarEntry->status;
                $employeeLeaveLog->created = date("Y-m-d H:i:s");

                if ($employeeLeaveLog->validate()) {
                    $employeeLeaveLog->save();
                    $notification = new Notification();
                    $notification->class = "LeaveLogNotification";
                    $notification->user_id = $calendarEntry->employee; // Assigned User
                    $notification->source_object_model = 'EmployeeLeaveLog';
                    $notification->source_object_id = $employeeLeaveLog->id;
                    $notification->target_object_model = 'User';
                    $notification->target_object_id = $calendarEntry->employee;
                    $notification->save();
                    $this->renderModalClose();
                    print "<script>";
                    print 'if(jQuery("#employee-leaves-grid")) { jQuery("#employee-leaves-grid").yiiGridView("update"); }';
                    print "</script>";
                    return;
                }
            }

            $this->renderPartial('changestatus', array('calendarEntry' => $calendarEntry, 'employeeLeaveLog' => $employeeLeaveLog), false, true);
        } else {
            throw new CHttpException('403', "You don't have permission to access Employee Leave");
        }
    }

    public function actionShiftswap() {

        $shiftEntry = WorkdaysSwap::model()->findByPk(Yii::app()->request->getParam('id'));

        if ($shiftEntry == null) {
            $shiftEntry = new WorkdaysSwap;
        }

        if (isset($_POST['WorkdaysSwap'])) {
            $shiftEntry->attributes = Yii::app()->input->stripClean($_POST['WorkdaysSwap']);

            if ($shiftEntry->user_id == '') {
                $shiftEntry->user_id = Yii::app()->user->id;
            }

            if ($shiftEntry->validate()) {
                $days = $shiftEntry->days;
                $user_id = $shiftEntry->swap_with;
                $dayMap = array();
                foreach ($days as $day) {
                    $dayMap[$day] = $shiftEntry->getDayWorkTime($day, $user_id);
                }
                $this->renderPartial('swapdays', array('shiftEntry' => $shiftEntry, 'dayMap' => $dayMap), false, true);
                // After closing modal refresh calendar or page
                print "<script>";
                print "$('body').find(':checkbox, :radio').flatelements();";
                print "</script>";
                return;
            }
        }

        if (isset($_POST['WorkdaysSwapdays'])) {
            $employee_days = $_POST['WorkdaysSwapdays'];
            $shiftEntry->date_start = Yii::app()->request->getParam('date_start');
            $shiftEntry->date_end = Yii::app()->request->getParam('date_end');
            $shiftEntry->user_id = Yii::app()->request->getParam('user_id');
            $shiftEntry->swap_with = Yii::app()->request->getParam('swap_with');
            $shiftEntry->details = Yii::app()->request->getParam('details');
            if ($shiftEntry->save()) {
                $leave_id = $shiftEntry->id;
                $days = $shiftEntry->days;
                $dayMap = array();
                foreach ($days as $day) {
                    if (isset($employee_days[$day])) {
                        $WorkdaysSwapdays = new WorkdaysSwapdays;
                        $WorkdaysSwapdays->Workdays_swap = $leave_id;
                        $WorkdaysSwapdays->request_date = $day;
                        $WorkdaysSwapdays->save();
                    }
                }
                //send swap request notification for admins and supervisors
                $admins = User::model()->findAllByAttributes(array('super_admin' => 1));
                foreach ($admins as $admin) {
                    $notification = new Notification();
                    $notification->class = "AdminSwapNotification";
                    $notification->user_id = $admin->id; // Assigned User
                    $notification->source_object_model = 'User';
                    $notification->source_object_id = $shiftEntry->user_id;
                    $notification->target_object_model = 'User';
                    $notification->target_object_id = $shiftEntry->swap_with;
                    $notification->save();
                }
                //send swap request notification for requested user
                $notification = new Notification();
                $notification->class = "SwapNotification";
                $notification->user_id = $shiftEntry->swap_with; // Assigned User
                $notification->source_object_model = 'User';
                $notification->source_object_id = $shiftEntry->user_id;
                $notification->target_object_model = 'User';
                $notification->target_object_id = $shiftEntry->swap_with;
                $notification->save();
            }
            $this->renderModalClose();

            return;
        }


        $this->renderPartial('shiftswap', array('shiftEntry' => $shiftEntry), false, true);
    }

    public function actionChangeSwapStatus() {
        $this->checkContainerAccess();

        $WorkdaysSwap = WorkdaysSwap::model()->findByPk(Yii::app()->request->getParam('id'));

        if ($WorkdaysSwap == null) {
            throw new CHttpException('404', "Shift Swap request not found!");
        }

        if (Yii::app()->user->isAdmin()) {
            $leave_status = Yii::app()->request->getParam('leave_status');

            if ($leave_status != '' && $leave_status != $WorkdaysSwap->status) {
                if (isset($_POST['WorkdaysSwap'])) {
                    $employee_swap = $_POST['WorkdaysSwap'];
                }
                $WorkdaysSwap->status = Yii::app()->request->getParam('leave_status');
                $WorkdaysSwap->comment = $employee_swap['comment'];
                $WorkdaysSwap->save();
                $this->renderModalClose();
                print "<script>";
                print 'if(jQuery("#employee-leaves-grid")) { jQuery("#employee-leaves-grid").yiiGridView("update"); }';
                print "</script>";
                return;
            }

            $this->renderPartial('swapstatus', array('WorkdaysSwap' => $WorkdaysSwap), false, true);
        } else {
            throw new CHttpException('403', "You don't have permission to access Employee Leave");
        }
    }

    public function actionLoanRequest() {
        $this->checkContainerAccess();

        $model = new EmployeeLoan();

        if (isset($_POST['EmployeeLoan'])) {
            $model->attributes = Yii::app()->input->stripClean($_POST['EmployeeLoan']);
            $model->user_id = Yii::app()->user->id;
            if ($model->validate()) {
                $model->save();
                $this->renderModalClose();
            }
        }


        $this->renderPartial('loan', array('model' => $model), false, true);
    }

    public function actionFeedback() {
        $feedback = new UserFeedback;
        if (isset($_POST['UserFeedback'])) {
            $feedback->attributes = $_POST['UserFeedback'];
            $feedback->user_id = Yii::app()->user->id;
            $feedback->save();
            $this->renderModalClose();
        }
        $this->renderPartial('feedback', array('feedback' => $feedback), false, true);
    }

}
