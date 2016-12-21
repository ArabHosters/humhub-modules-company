<?php

/**
 * LeaveNotification is fired to the user request leave to admin/supervisor
 *
 */
class LeaveNotification extends Notification {

    // Path to Web View of this Notification
    public $webView = "company.views.notifications.userLeave";
    // Path to Mail Template for this notification
    public $mailView = "application.modules.company.views.notifications.userLeave_mail";

    public function redirectToTarget() {
        Yii::app()->getController()->redirect(Yii::app()->createUrl('//company/employeeLeaves'));
    }
    
}

?>
