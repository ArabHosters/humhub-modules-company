<?php

/**
 * LeaveLogNotification is fired to the user request leave to admin/supervisor
 *
 */
class LeaveLogNotification extends Notification {

    // Path to Web View of this Notification
    public $webView = "company.views.notifications.userLeaveLog";
    // Path to Mail Template for this notification
    public $mailView = "application.modules.company.views.notifications.userLeaveLog_mail";

    public function redirectToTarget() {
        $user = $this->getTargetObject();
        Yii::app()->getController()->redirect(Yii::app()->createUrl('//company/leaveManagment/index', array('uguid' => $user->guid)));
    }
    
}

?>
