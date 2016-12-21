<?php

/**
 * AdminSwapNotification notify admin for shift swap requests
 *
 */
class AdminSwapNotification extends Notification {

    // Path to Web View of this Notification
    public $webView = "company.views.notifications.adminSwap";
    // Path to Mail Template for this notification
    public $mailView = "application.modules.company.views.notifications.adminSwap_mail";

    public function redirectToTarget() {
        Yii::app()->getController()->redirect(Yii::app()->createUrl('//company/employeeSwaps'));
    }
    
}

?>
