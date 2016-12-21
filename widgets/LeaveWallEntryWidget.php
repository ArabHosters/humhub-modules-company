<?php

class LeaveWallEntryWidget extends HWidget
{

    public $calendarEntry;

    public function run()
    {
        $calendarEntry = $this->calendarEntry;
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
        
        $this->render('wallEntry', array(
            'calendarEntry' => $this->calendarEntry, 'leaves' => $leaves, 'empLeaveDay' => $empLeaveDay, 'leaveLogs' => $leaveLogs
        ));
    }

}

?>